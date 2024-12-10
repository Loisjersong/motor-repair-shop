<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class WelcomeController extends Controller
{
    public function index()
    {
        $products = Product::limit(6)->get();
        return view('welcome', compact('products'));
    }

    public function showAll(Request $request)
    {
        $query = Product::query();

        // Search through title and brand
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', "%$search%")
                ->orWhere('brand', 'like', "%$search%");
        }

        // Filter by category
        if ($request->filled('category')) {
            $category = $request->input('category');
            $query->whereHas('category', function ($q) use ($category) {
                $q->where('name', $category);
            });
        }

        // Auth-based product fetching
        $products = \Illuminate\Support\Facades\Auth::check() ? $query->inRandomOrder()->get() : $query->get();

        // Get all categories for the dropdown
        $categories = Category::all();

        return view('products', compact('products', 'categories'));
    }

}
