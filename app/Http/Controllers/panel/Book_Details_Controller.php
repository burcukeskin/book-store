<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Exception;

class Book_Details_Controller extends Controller
{
    public function show($id)
    {
        try {
            $product = Product::findOrFail($id);
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), $e->getCode());
        }
        return view('panel.book-detail')->with('product', $product);
    }
}
