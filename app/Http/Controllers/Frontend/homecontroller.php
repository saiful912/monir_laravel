<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class homecontroller extends Controller
{
    public function showHome()
    {
        $products = Product::orderBy('id', 'desc')->paginate(3);
        return view('frontend.index', compact('products'));
    }

    public function showAbout()
    {
        return view('about');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $products = Product::orWhere('title', 'like', '%'.$search.'%')
            ->orWhere('description','like','%'.$search.'%')
            ->orWhere('slug','like','%'.$search.'%')
            ->orWhere('price','like','%'.$search.'%')
            ->orWhere('quantity','like','%'.$search.'%')
            ->orderBy('id','desc')
            ->paginate(2);
        return view('frontend.pages.product.search',compact('products','search'));
    }

}
