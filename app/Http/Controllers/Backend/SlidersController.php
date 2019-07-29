<?php

namespace App\Http\Controllers\Backend;

//
//use Faker\Provider\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class SlidersController extends Controller
{
    //something problem
//    public function __construct()
//    {
//        $this->middleware('auth:admin');
//    }
    public function index()
    {
        $sliders = Slider::orderBy('priority', 'asc')->get();
        return view('backend.pages.sliders.index', compact('sliders'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|image',
            'priority' => 'required',
            'button_link' => 'nullable|url',
        ],
            [
                'title.required' => 'Please provide slider title',
                'priority.required' => 'Please provide slider priority',
                'image.required' => 'Please provide slider image',
                'image.image' => 'Please provide a valid slider image',
                'button_link.url' => 'Please provide a valid slider button link',
            ]);

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->priority = $request->priority;
        if ($request->hasFile('image')) {
            //insert that image
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/sliders/' . $img);
            Image::make($image)->save($location);
            $slider->image = $img;
        }

        $slider->save();

        session()->flash('success', 'A new Slider has created successfully ');
        return redirect()->route('admin.sliders');

    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'nullable|image',
            'priority' => 'required',
            'button_link' => 'nullable|url',
        ],
            [
                'title.required' => 'Please provide slider title',
                'priority.required' => 'Please provide slider priority',
                'image.image' => 'Please provide a valid slider image',
                'button_link.url' => 'Please provide a valid slider button link',
            ]);
        $slider = Slider::find($id);
        $slider->title = $request->title;
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->priority = $request->priority;
        if ($request->image > 0) {
            //delete the old image
            if (File::exists('image/sliders/' . $slider->image)) {
                File::delete('image/sliders/' . $slider->image);
            }
            $image = $request->file('image');
            $img = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/sliders/' . $img);
            Image::make($image)->save($location);
            $slider->image = $img;
        }

        $slider->save();

        session()->flash('success', 'A Sliders has Updated successfully ');
        return redirect()->route('admin.sliders');
    }

    public function delete($id)
    {
        $slider = Slider::find($id);
        if (!is_null($slider)) {
            if (File::exists('image/sliders/' . $slider->image)) {
                File::delete('image/sliders/' . $slider->image);
            }
            $slider->delete();
        }
        session()->flash('success', 'slider has deleted successfully ');
        return back();
    }

}
