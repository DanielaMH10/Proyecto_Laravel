<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class CategoryController extends Controller
{
    function show(){
        $categoryList = Category::all();
        return view('category/list',['categoryList'=> $categoryList]);
    }
}
