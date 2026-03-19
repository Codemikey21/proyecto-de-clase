<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categorias = Category::withCount('products')->get();
        return view('admin.categorias.index', compact('categorias'));
    }

    public function create(){
        return view('admin.categorias.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|min:2|max:100|unique:categories,name',
        ]);

        Category::create(['name' => $request->name]);

        return redirect()->route('categoria.index')
                         ->with('success', 'Categoría creada correctamente');
    }

    public function edit(Category $categoria){
        return view('admin.categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Category $categoria){
        $request->validate([
            'name' => 'required|min:2|max:100|unique:categories,name,'.$categoria->id,
        ]);

        $categoria->update(['name' => $request->name]);

        return redirect()->route('categoria.index')
                         ->with('success', 'Categoría actualizada correctamente');
    }

    public function destroy(Category $categoria){
        $categoria->delete();
        return redirect()->route('categoria.index')
                         ->with('success', 'Categoría eliminada correctamente');
    }
}
