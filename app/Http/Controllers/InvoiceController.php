<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\Product;

class InvoiceController extends Controller
{

    function show(){
        $invoices = Invoice::all();
        return view('invoice.list',['invoices'=>$invoices]);
    }

    function form($id=NULL){
        if($id==NULL){
            $invoice = new Invoice();
        }else{
            $invoice = Invoice::findOrFail($id);
        }
        $products = Product::all();

        return view('invoice.form',['invoice'=>$invoice, 'products'=>$products]);
    }
    
}
