<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\ProductPutRequest;
use App\Http\Resources\ProductResource;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class CartController extends Controller
{
    public function index()
    {
//        $query = Users::select('users.id', 'users.first_name', 'users.last_name', 'users.email', DB::raw("CONCAT(phones.country_code,'',phones.area_code,'',phones.phone) AS phone"), 'users.created_at');

        $cartDetails = DB::table('cart')
            ->select(DB::raw("product.id AS product_id"), 'product.title', 'product.image', 'product.author', 'cart.quantity', 'product.price')
            ->leftJoin('product', 'product.id', '=', 'cart.product_id')
            ->where('cart.user_id', '=', Auth::user()->id)
            ->get();
        $totalPrice=0;
        foreach ($cartDetails as $cartDetail)
        {
            $totalPrice+= $cartDetail->price * $cartDetail->quantity;
        }



        return view('panel.cart')->with(['cartDetails'=> $cartDetails,'totalPrice'=> $totalPrice]);
    }

    public function store($productId)
    {
        $product = Product::findOrFail($productId);
        $user = User::findOrFail(Auth::user()->id);
        $cart = new Cart();
        $cart->user_id = $user->id;
        $cart->product_id = $product->id;
        $cart->quantity = 1;
        $cart->save();
        return redirect()->route('book-detail', ['id' => $product->id]);
    }

//    public function setQuantity() {
//        error_log('worked');
//    }

//    public function calculateAllProducts()
//    {
//        $total = $user->cart->sum(function ($item) {
//        return $item->price * $item->qty;
//    });
//    }
//
//    public function cart()
//    {
//        return $this->hasMany('App\Cart')->where('complete', 0);
//    }

    public function destroy($productId)
{
    try {
        Cart::destroy($productId);
    } catch (\Exception $e) {
        throw new \Exception($e->getMessage(), $e->getCode());
    }
    return Response::success()
        ->message("The product has successfully deleted.")
        ->response();
}
}
