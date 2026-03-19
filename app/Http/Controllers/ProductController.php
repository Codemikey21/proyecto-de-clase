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
            'categoryList' => $categoryList
        ]);
    }

    public function store(Request $request){
        $newProduct = new Product();
        $newProduct->name = $request->get('name');
        $newProduct->description = $request->get('description');
        $newProduct->price = $request->get('price');
        $newProduct->category_id = $request->get('category_id');

        if($request->hasFile('image')) {
            $ruta = $request->file('image')->store('images', 'public');
            $newProduct->image = $ruta;
        }

        $newProduct->save();

        return redirect()->route('product.index')->with('success', 'Producto creado correctamente');
    }

   public function show(){
    return view('product.show');
}
}
