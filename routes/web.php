<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');


use App\Http\Controllers\PersonaController;

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

use App\Http\Controllers\BrandController;
Route::get('/brands',[BrandController::class, 'show'])->name('brands');
Route::get('/brands/delete/{id}', [BrandController::class, 'delete'])->name('brandDelete');
 Route::get('/brands/form/{id?}',[BrandController::class, 'create'])->name('brandCrear');
 Route::post('brands/save', [BrandController::class, 'save'])->name('brand.save');
 Auth::routes();
 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


 use App\Http\Controllers\CategoryController;
Route::get('/category',[CategoryController::class, 'show'])->name('category');
Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('categoryDelete');
 Route::get('/category/form/{id?}',[CategoryController::class, 'create'])->name('categoryCrear');
 Route::post('category/save', [CategoryController::class, 'save'])->name('category.save');
 Auth::routes();
 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\ProductController;
Route::get('/products',[ProductController::class, 'show'])->name('products');

/*se le pasa el name cuando se usa de otra manera al llamrlo en el boton*/
Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('prodDelete');
/*la forma al llamarlo con el name desde la ruta*/
  //<a href="{{ route('prodDelete', ['id' =>$product->id]) }}" class="btn btn-danger">Borrar</a>*/
 //<a href="/product/delete/{{ $product->id}}" class="btn btn-danger">Borrar</a>

 Route::get('/product/form/{id?}',[ProductController::class, 'create'])->name('prodCrear');
/*para el envio del formualrio*/
 Route::post('product/save', [ProductController::class, 'save'])->name('product.save');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\InvoiceController;
Route::get('/invoice/{id}', [InvoiceController:: class, 'show']);

