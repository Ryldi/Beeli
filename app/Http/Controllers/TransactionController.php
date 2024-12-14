<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionHeader;
use App\Models\TransactionDetail;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Address;

class TransactionController extends Controller
{

    public function add_transaction(Request $request)
    {
        if($request->address_id == null) {
            return redirect()->route('checkout.view')->with('error', 'Select an address');
        }

        // dd($request);
        $products = json_decode($request->input('selected_products'), true);

        $transaction = TransactionHeader::create([
            'status' => 'Unpaid',
            'student_id' => session('student')->id,
            'total_price' => $request->total_price,
            'address_id' => $request->address_id,
            'shipping_fee' => 10000,
            'grand_total' => $request->total_price + 10000
        ]);

        foreach ($products as $product) {
            TransactionDetail::create([
                'product_id' => $product['id'],
                'transaction_id' => $transaction->id,
                'quantity' => $product['quantity']
            ]);

            Cart::where('product_id', $product['id'])->where('student_id', session('student')->id)->delete();
        }

        $address = Address::find($request->address_id);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;


        $transaction_details = array(
            'order_id' => $transaction->id,
            'gross_amount' => $transaction->grand_total , // no decimal allowed for creditcard
        );

        // $item_details = [];

        // foreach ($products as $product) {
        //     $product_obj = Product::find($product['id']);
        //     // dd($product_obj);
        //     $item_details[] = array(
        //         'id' => $product['id'],
        //         'price' => $product_obj->price * $product['quantity'],
        //         'quantity' => $product['quantity'],
        //         'name' => $product_obj->name
        //     );
        // } // gapakai karna shopping fee ga bakal keitung di midtrans dan gross amount ketimpa
        
        $address = Address::find($request->address_id);
        
        // Optional
        $shipping_address = array(
            'first_name'    => $address->recipient_name,
            'address'       => $address->street,
            'city'          => $address->city,
            'postal_code'   => $address->postal_code,
            'phone'         => $address->phone,
            'country_code'  => 'IDN'
        );
        
        // Optional
        $customer_details = array(
            'first_name'    => session('student')->username,
            'email'         => session('student')->email,
            'phone'         => session('student')->phone,
            'shipping_address' => $shipping_address
        );
        
        // Fill SNAP API parameter
        $params = array(
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
            // 'item_details' => $item_details,
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $transaction->snap_token = $snapToken;
        $transaction->save();

        return redirect()->route('order.view', ['id' => $transaction->id])->with('success', 'Checkout Success, Please click your order to pay');

    }

    public function get_all_transactions()
    {
        $transactions = TransactionHeader::with('details.product.organization.university')->where('student_id', session('student')->id)->orderBy('created_at', 'desc')->get();

        // dd($transactions);

        return view('pages.order', compact('transactions'));
    }

    public function get_transaction_detail($id)
    {
        $transaction = TransactionHeader::with('details.product.organization.university')->find($id);
        $address = Address::find($transaction->address_id);
        return view('pages.order_detail', compact('transaction', 'address'));
    }

    public function update_transaction( $id)
    {
        $transaction = TransactionHeader::find($id);
        $transaction->status = 'Paid';
        $transaction->save();
        return redirect()->route('order_detail.view', ['id' => $transaction->id])->with('success', 'Payment Success');
    }
}
