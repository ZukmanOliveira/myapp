<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Product;
use App\Http\Requests\ProductStoreRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class adminProductController extends Controller
{
    public function index(){

        $products = Products::all();


        return view('admin.products', compact('products'));
    }
    //Mostrar página de editar
    public function edite(Products $product){
        return view('admin.product_edit',[
            'product'=>$product,
        ]);
    }
    //Recebo requisação para dar update PUT
    public function update(Products $product, ProductStoreRequest $request){
        
        $input = $request->validated();
        
        if (!empty($S['cover']) && $input['cover']->isValid()){
            Storage::delete($product->cover ?? ' ');
            $file = $input['cover'];
            $path = $file->store('products');
            $input['cover'] = $path;
        }

        $product->fill($input);
        $product->save();
        return Redirect::route('admin.products');
    }
    // Mostra página de criar
    public function create(){
        return view('admin.product_create');
    }

    // Receber a requisição de criar POST
    public function store(ProductStoreRequest $request){
        $input = $request->validated();
     
    
        $input['slug'] = Str::slug($input['name']);

        if (!empty($input['cover']) && $input['cover']->isValid()){
            $file = $input['cover'];
            $path = $file->store('public/product');
            $input['cover'] = $path;
        }
       
        Products::create($input);
        
        return Redirect::route('admin.products.create');
    }

    public function destroy(Products $product){
        $product->delete();
        Storage::delete($product->cover ?? ' ');

        return Redirect::route('admin.products');
    }

    public function destroyImagen(Products $product){
        
        Storage::delete($product->cover);
        $product->cover = null;
        $product->save();

        return Redirect::back();
    }
}
