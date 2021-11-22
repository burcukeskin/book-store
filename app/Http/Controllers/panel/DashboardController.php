<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class DashboardController extends Controller
{
    public function index(){
        $bestSellingBooks = Product::latest()->take(20)->get();

        return view('panel.dashboard')->with('bestSellingBooks', $bestSellingBooks);
    }
}
