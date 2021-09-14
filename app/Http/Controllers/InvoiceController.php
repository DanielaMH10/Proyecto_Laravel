<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{

    function show(){
        $invoices = Invoice::all();
        return view('invoice.list',['invoices'=>$invoices]);
    }
    
}