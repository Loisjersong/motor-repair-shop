<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class WelcomeController extends Controller
{
    public function index()
    {
        $products = Product::limit(6)->get();
        return view('welcome', compact('products'));
    }

    public function showAll(){

        if (\Illuminate\Support\Facades\Auth::check()) {
            $products = Product::inRandomOrder()->get();
        } else {
            $products = Product::all();
        }
        return view('products', compact('products'));
    }
}
