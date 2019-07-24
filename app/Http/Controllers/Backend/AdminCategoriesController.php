<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\ProductImage;

//use Faker\Provider\File;
//use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Category;


use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;


/**
 * @method validate(Request $request, array $array)
 */
class AdminCategoriesController extends Controller
{
//    something problem
//    public function __construct()
//    {
//        $this->middleware('auth:admin');
//    }

    public function category_create()
    {
        $main_categories = Category::orderBY('name', 'desc')->where('parent_id', null)->get();
        return view('backend.pages.category.create', compact('main_categories'));
    }

    public function manage_categories()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('backend.pages.category.index', compact('categories'));
    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function category_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image'
        ],
            [
                'name.required' => 'Please provide a Category name',
                'image.image' => 'Please provide a valid image with .jpg, .png, .gif, .jpeg .'
            ]);
        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;


        //ProductImage Model insert image

        if ($request->hasFile('image')) {
            //insert that image
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/categories/' . $img);
            Image::make($image)->save($location);
            $category->image = $img;
        }
        $category->save();

        session()->flash('success', 'Category created successfully!');
        return redirect()->route('admin.categories.create');

    }

    public function categories_edit($id)
    {
        $main_categories = Category::orderBY('name', 'desc')->where('parent_id', null)->get();
        $category = Category::find($id);
        if (!is_null($category)) {
            return view('backend.pages.category.edit', compact('category', 'main_categories'));
        } else {
            return redirect()->route('admin.categories');
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function category_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image'
        ],
            [
                'name.required' => 'Please provide a Category name',
                'image.image' => 'Please provide a valid image with .jpg, .png, .gif, .jpeg .'
            ]);
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;


        //ProductImage Model insert image

        if ($request->hasFile('image')) {
            //delete the old image from file
            if (File::exists('images/categories/' . $category->image)) {
                File::delete('images/categories/' . $category->image);
            }
            //insert that image
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/categories/' . $img);
            Image::make($image)->save($location);
            $category->image = $img;
        }
        $category->save();

        session()->flash('success', 'Category has Updated successfully!');
        return redirect()->route('admin.categories');
    }

    public function category_delete($id)
    {
        $category = Category::find($id);
        if (!is_null($category)) {
            //if it is primary category, then all its sub category
            if ($category->parent_id == null) {
                $sub_categories = Category::orderBY('name', 'desc')->where('parent_id', $category->id)->get();

                foreach ($sub_categories as $sub) {
                    //delete category image
                    if (File::exists('images/categories/' . $sub->image)) {
                        File::delete('images/categories/' . $sub->image);
                    }
                    $sub->delete();
                }
            }
            //delete category image
            if (File::exists('images/categories/' . $category->image)) {
                File::delete('images/categories/' . $category->image);
            }
            $category->delete();
        }
        session()->flash('success', 'product has been deleted successfully!');
        return back();
    }
}
