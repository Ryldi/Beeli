<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Student;

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


    public function checkout(Request $request)
    {
        $request->validate([
            'selected_products' => 'required'
        ]);

        $products = json_decode($request->input('selected_products'), true);

        if (count($products) == 0) {
            return redirect()->route('cart.view')->with('error', 'Select at least one product');
        }

        $total_price = 0;

        $product_details = [];
        foreach ($products as $product) {
            $prod = Product::find($product['id']);
            $total_price += $prod->price * $product['quantity'];
            $product_details[] = [
                'product' => $prod,
                'quantity' => $product['quantity']
            ];
        }

        session(['student' => Student::with('addresses')->find(session('student')->id)]);

        session(['product_details' => $product_details, 'total_price' => $total_price]);

        return view('pages.checkout', compact('product_details', 'total_price'));

    }

    public function index_checkout()
    {
        $product_details = session('product_details');
        $total_price = session('total_price');
        
        return view('pages.checkout', compact('product_details', 'total_price'));
    }
}
