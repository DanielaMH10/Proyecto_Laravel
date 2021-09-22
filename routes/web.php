<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InvoiceController;


Route::get('/', function () {
    return view('welcome');
})->middleware('auth');


Route::get('/form/{id?}' , 
[PersonaController::class, "mostrarForm"]
)->where('id','[0-9]+');

//use Illuminate\Support\Facades\DB;
/*use App\Models\Product;
Route::get('/products', function(){
    // $products = DB::table('product')->get();
    $products = Product::get();
    return dd($products); //var_dump
});*/


//Brand
Route::get('/brands',[BrandController::class, 'show'])->name('brands');
Route::get('/brands/delete/{id}', [BrandController::class, 'delete'])->name('brandDelete');
Route::get('/brands/form/{id?}',[BrandController::class, 'create'])->name('brandCrear');
Route::post('brands/save', [BrandController::class, 'save'])->name('brand.save');

 //Categories
Route::get('/category',[CategoryController::class, 'show'])->name('category');
Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('categoryDelete');
Route::get('/category/form/{id?}',[CategoryController::class, 'create'])->name('categoryCrear');
Route::post('category/save', [CategoryController::class, 'save'])->name('category.save');


//Products
Route::get('/products',[ProductController::class, 'show'])->name('products');
Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('prodDelete');
Route::get('/product/form/{id?}',[ProductController::class, 'create'])->name('prodCrear');
Route::post('product/save', [ProductController::class, 'save'])->name('product.save');

//invoice
Route::get('/invoice', [InvoiceController:: class, 'show']);
Route::get('/invoice/form/{id?}', [InvoiceController:: class, 'form'])->name('invoice.form');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

