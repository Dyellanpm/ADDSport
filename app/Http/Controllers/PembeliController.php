<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PembeliController extends Controller
{
    public function berandaPembeli()
    {
        $products = Product::latest()->take(6)->get();
        return view('pembeli.pembeli', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('pembeli.section', compact('product'));
    }
    

    public function checkout()
    {
        return view('pembeli.checkout');
    }

    public function saya()
    {
        return view('pembeli.pesanan-saya');
    }

    public function selesai()
    {
        return view('pembeli.pesanan-selesai');
    }
    
}
