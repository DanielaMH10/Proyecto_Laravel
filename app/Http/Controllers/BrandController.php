<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class BrandController extends Controller
{
    function show(){
        $brandsList = Brand::all();
        return view('brand/list',['List'=> $brandsList]);
    }

    
}