<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class productController extends Controller
{
    public function show(Products $product)
    {
        return view('product',[
            'product'=> $product
        ]);
    }
}
