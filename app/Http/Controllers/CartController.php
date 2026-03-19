<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        $items = CartItem::with('product')
                    ->where('user_id', Auth::id())
                    ->get();

        $total = $items->sum(fn($item) => $item->product->price * $item->quantity);

        return view('cart.index', compact('items', 'total'));
    }

    public function store(Request $request){
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'integer|min:1',
        ]);

        $existing = CartItem::where('user_id', Auth::id())
                            ->where('product_id', $request->product_id)
                            ->first();

        if($existing){
            $existing->increment('quantity', $request->quantity ?? 1);
        } else {
            CartItem::create([
                'user_id'    => Auth::id(),
                'product_id' => $request->product_id,
                'quantity'   => $request->quantity ?? 1,
            ]);
        }

        return redirect()->back()->with('success', 'Producto añadido al carrito');
    }

    public function destroy(CartItem $item){
        if($item->user_id !== Auth::id()){
            abort(403);
        }
        $item->delete();
        return redirect()->back()->with('success', 'Producto eliminado del carrito');
    }

    public function clear(){
        CartItem::where('user_id', Auth::id())->delete();
        return redirect()->back()->with('success', 'Carrito vaciado');
    }
}
