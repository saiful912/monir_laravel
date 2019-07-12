<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'product_id'=>'required',
        ],[
            'product_id.required'=>'please give a product'
        ]);

        if (Auth::check()){
            $cart=Cart::where('user_id',Auth::id())->where('product_id',$request->product_id)->first();
        }else{
            $cart=Cart::where('ip_address',request()->ip())->where('product_id',$request->product_id)->first();
        }


        if (!is_null($cart)){
            $cart->increment('product_quantity');
        }else{
            $cart= new Cart();
            if (Auth::check()){
                $cart->user_id=Auth::id();
            }
            $cart->ip_address=request()->ip();
            $cart->product_id=$request->product_id;
            $cart->save();

        }


        session()->flash('success','Product has added to cart');
        return back();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

}
