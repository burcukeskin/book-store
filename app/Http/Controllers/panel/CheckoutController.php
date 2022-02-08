<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Checkout;
use App\Models\Product;
use App\Models\User;
use CreateCheckoutTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CheckoutController extends Controller
{
    public function index()
    {
        $orders = DB::table('cart')
            ->select(DB::raw("product.title AS product_title"), 'product.price')
            ->leftJoin('product', 'product.id', '=', 'cart.product_id')
            ->where('cart.user_id', '=', Auth::user()->id)
            ->get();
        $totalPrice=0;
        foreach ($orders as $order)
        {
            $totalPrice+= $order->price ;
        }

        return view('panel.checkout')->with(['orders'=> $orders,'totalPrice'=> $totalPrice]);

    }

    public function placeOrder(Request $request)
    {
        $data_ = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'notes' => $request->notes,
        ];
        Checkout::create($data_);

        return view('panel.checkout');
    }
}
