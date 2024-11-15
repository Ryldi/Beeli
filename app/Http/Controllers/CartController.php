<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function get_all_items()
    {
        $carts = Cart::with('product')->where('student_id', session('student')->id)->orderBy('created_at', 'desc')->get();
        return view('pages.cart', compact('carts'));
    }

    public function add_to_cart(Request $request)
    {

        $existingCart = Cart::where('product_id', '=', $request->product_id)
                        ->where('student_id', '=', session('student')->id)
                        ->first();

        if ($existingCart) {
            Cart::where('product_id', $request->product_id)
                ->where('student_id', session('student')->id)
                ->update([
                    'quantity' => $existingCart->quantity + 1,
                    'updated_at' => now()
                ]);
        
            return redirect()->route('product_detail.view', ['id' => $request->product_id])->with('success', 'Product quantity updated.');
        }

        $request->validate([
            'product_id' => 'required'
        ]);

        $cart = new Cart([
            'product_id' => $request->product_id,
            'student_id' => session('student')->id,
            'quantity' => 1
        ]);

        $cart->save();

        return redirect()->route('product_detail.view', ['id' => $request->product_id])->with('success', 'Product added to cart');
    }

    public function remove_item(Request $request)
    {
        Cart::where('product_id', $request->product_id)->where('student_id', session('student')->id)->delete();
        
        return redirect()->route('cart.view')->with('success', 'Product removed from cart');
    }

    public function update_item(Request $request)
    {
        Cart::where('product_id', $request->product_id)->where('student_id', session('student')->id)->update([
            'quantity' => $request->quantity
        ]);
        
        return redirect()->route('cart.view')->with('success', 'Product quantity updated');
    }
}
