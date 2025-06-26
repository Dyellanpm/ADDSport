<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PembeliController extends Controller
{
    public function beranda()
    {
        $products = Product::latest()->take(8)->get();
        return view('pembeli.pembeli', compact('products'));
    }

    public function index()
    {
        return view('pembeli.section');
    }

    public function checkout()
    {
        return view('pembeli.checkout');
    }
}
