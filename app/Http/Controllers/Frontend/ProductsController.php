<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(3);
        return view('frontend.pages.product.index')->with('products', $products);
    }

    public function show($slug)
    {
        $products = Product::where('slug', $slug)->first();
        if (!is_null($products)) {
            return view('frontend.pages.product.show', compact('products'));
        } else {
            session()->flash('errors', 'Sorry || There is no product by this url..');
            return redirect()->route('products');
        }
    }
}
