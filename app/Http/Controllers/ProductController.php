<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(){
        $productList = Product::limit(10)->orderBy('id', 'desc')->get();
        return view('product.index', [
            'misProductos' => $productList
        ]);
    }

    public function create(){
        $categoryList = Category::all();
        return view('product.create', [
            'categories' => $categoryList
        ]);
    }

    public function store(Request $request){
        $newProduct = new Product();
        $newProduct->name        = $request->get('nombre');
        $newProduct->description = $request->input('descripcion');
        $newProduct->price       = $request->input('precio');
        $newProduct->category_id = $request->input('categoria');

        if($request->hasFile('imagen')) {
            $ruta = $request->file('imagen')->store('images', 'public');
            $newProduct->image = $ruta;
        }

        $newProduct->save();

        return redirect()->route('product.index');
    }

    public function show(){
        return view('product.show');
    }
}
