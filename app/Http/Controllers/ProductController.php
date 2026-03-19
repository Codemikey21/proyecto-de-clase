<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(){
        $ProductList = Product::limit(20)->orderBy('id','desc')->get();
        return view('product.index',['misProductos'=>$ProductList]);
    }

    public function create(){
        $categoryList = Category::all();
        return view('product.create', [
            'categories' => $categoryList
        ]);
    }

    public function store(Request $request){
        $newproduct = new Product();
        $newproduct->name        = $request->get('nombre');
        $newproduct->description = $request->input('descripcion');
        $newproduct->price       = $request->input('precio');
        $newproduct->category_id = $request->input('categoria');

        if($request->hasFile('imagen')) {
            $ruta = $request->file('imagen')->store('images','public');
            $newproduct->image = $ruta;
        }

        $newproduct->save();

        return redirect()->route('product.index');
    }

    public function show(){
        return view('product.show');
    }
}
