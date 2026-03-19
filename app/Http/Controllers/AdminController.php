<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class AdminController extends Controller
{
    public function __invoke()
    {
        $totalProductos = Product::count();
        $totalCategorias = Category::count();
        $ultimosProductos = Product::with('category')->latest()->limit(5)->get();
        $productosPorCategoria = Category::withCount('products')->get();

        return view('admin', compact(
            'totalProductos',
            'totalCategorias',
            'ultimosProductos',
            'productosPorCategoria'
        ));
    }
}
