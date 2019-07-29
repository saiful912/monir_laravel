<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class AdminControllers extends Controller
{
   // something problem authAdmin
//    public function __construct()
//    {
//        $this->middleware('auth:admin');
//    }


    public function index()
    {
        return view('backend.pages.index');
    }

    public function  loginProcess(Request $request){

    }

}
