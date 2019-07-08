<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\ProductImage;

//use Faker\Provider\File;
//use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Brand;


use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;


/**
 * @method validate(Request $request, array $array)
 */
class AdminBrandsController extends Controller
{

    public function brand_create()
    {

        return view('backend.pages.brand.create');
    }

    public function manage_brands()
    {
        $brands = Brand::orderBy('id', 'desc')->get();
        return view('backend.pages.brand.index', compact('brands'));
    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function brand_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image'
        ],
            [
                'name.required' => 'Please provide a Brand name',
                'image.image' => 'Please provide a valid image with .jpg, .png, .gif, .jpeg .'
            ]);
        $brand = new Brand;
        $brand->name = $request->name;
        $brand->description = $request->description;



        //ProductImage Model insert image

        if ($request->hasFile('image')) {
            //insert that image
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/brands/' . $img);
            Image::make($image)->save($location);
            $brand->image = $img;
        }
        $brand->save();

        session()->flash('success', 'Brands created successfully!');
        return redirect()->route('admin.brands.create');

    }

    public function brands_edit($id)
    {

        $brand = Brand::find($id);
        if (!is_null($brand)) {
            return view('backend.pages.brand.edit', compact('brand'));
        } else {
            return redirect()->route('admin.brands');
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function brand_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image'
        ],
            [
                'name.required' => 'Please provide a Brands name',
                'image.image' => 'Please provide a valid image with .jpg, .png, .gif, .jpeg .'
            ]);
        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->description = $request->description;



        //ProductImage Model insert image

        if ($request->hasFile('image')) {
            //delete the old image from file
            if (File::exists('images/brands/' . $brand->image)) {
                File::delete('images/brands/' . $brand->image);
            }
            //insert that image
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/brands/' . $img);
            Image::make($image)->save($location);
            $brand->image = $img;
        }
        $brand->save();

        session()->flash('success', 'Brands has Updated successfully!');
        return redirect()->route('admin.brands');
    }

    public function brand_delete($id)
    {
        $brand = Brand::find($id);
        if (!is_null($brand)) {
            //delete category image
            if (File::exists('images/brands/' . $brand->image)) {
                File::delete('images/brands/' . $brand->image);
            }
            $brand->delete();
        }
        session()->flash('success', 'Brands has been deleted successfully!');
        return back();
    }
}
