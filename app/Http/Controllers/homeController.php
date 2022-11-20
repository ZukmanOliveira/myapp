<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;


class homeController extends Controller
{
    public function index(Request $request){
        

        $products = Products::query();

        $products->when($request->search, function($query,$vl){
            $query->where('name','like','%'.$vl.'%');

        });
            
        $products = $products->get();

        return view('home',[
           'products' => $products
        ]);
    }
}
