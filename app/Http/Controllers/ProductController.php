<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class ProductController extends Controller
{

    
    use AuthenticatesUsers;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    //Listar Productos
    function show(){
        $productsList = Product::has('brand')->get();
        $productsList = Product::has('category')->get();
        return view('product/list',['productsList'=>$productsList]);
    }

    function delete($id){
        $producto = Product:: findOrFail($id);
        $producto->delete();
        //return redirect('/products');
        return redirect()->route('products');
    }

    function create($id = null){
        if($id == null){
            $product = new Product();
        }else {
            $product =  Product::findOrFail($id);
        }
        $brand = Brand::all();
        $category = Category::all();
        /*pasar variables a las vistas []*/
        return view('product/form',['product'=>$product, 'brand' => $brand, 'category' => $category]);
    }

    function save(Request $request){
        $product = new Product();

        if($request->id > 0){
            $product = Product::findOrFail($request->id);
        }
        $request->validate([
            'name' => 'required|max:50',
            'cost' => 'required',
            'price' => 'required',
            'quantity' => 'required|numeric',
            'brand_id' => 'required',
            'category_id' => 'required'
        ]);

        $product->name = $request->name;
        $product->cost = $request->cost;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;


        $product->save();
        return redirect('/products')->with('message', 'Product saved');;
    }
}
