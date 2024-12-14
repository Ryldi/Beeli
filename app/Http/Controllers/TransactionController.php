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

        // // Set your Merchant Server Key
        // \Midtrans\Config::$serverKey = 'SB-Mid-server-ZE3JsMqJiKwS4wLhDnjngh3q';
        // // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        // \Midtrans\Config::$isProduction = false;
        // // Set sanitization on (default)
        // \Midtrans\Config::$isSanitized = true;
        // // Set 3DS transaction for credit card to true
        // \Midtrans\Config::$is3ds = true;

        // $params = array(
        //     'transaction_details' => array(
        //         'order_id' => rand(),
        //         'gross_amount' => 10000,
        //     )
        // );

        // try {
        //     $snapToken = \Midtrans\Snap::getSnapToken($params);
        //     dd($snapToken);
        // } catch (\Throwable $th) {
        //     throw $th;
        // }
        
        // try {
        //     // Get Snap Payment Page URL
        //     $paymentUrl = \Midtrans\Snap::createTransaction($params)->redirect_url;
            
        //     dd($paymentUrl);
        //     // Redirect to Snap Payment Page
        //     header('Location: ' . $paymentUrl);
        //   }
        //   catch (Exception $e) {
        //     echo $e->getMessage();
        // }

        // $transaction->snap_token = $snapToken;
        // $transaction->save();

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
