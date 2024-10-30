<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\ProductHistory;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('admin.products.create', ['products' => $products, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $productData = $request->validate([
            'title' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'in_stock' => 'required|integer',
            'price' => 'required|numeric',
            'photo' => 'nullable|string',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('products', 'public');
            $productData['photo'] = $path;

        }

        Product::create($productData);
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $productData = $request->validate([
            'title' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'in_stock' => 'required|integer',
            'price' => 'required|numeric',
            'photo' => 'nullable|image|max:2048',
        ]);

        // Handle photo update
        if ($request->hasFile('photo')) {
            if ($product->photo) {
                // Ensure the correct disk is used for deleting the old photo
                Storage::disk('public')->delete($product->photo);
            }
            // Store the new photo in the same disk as in the store method
            $path = $request->file('photo')->store('products', 'public');
        } else {
            $path = $product->photo; // Keep existing photo if not updated
        }

        // Update product data
        $product->update([
            'title' => request('title'),
            'brand' => request('brand'),
            'category_id' => request('category_id'),
            'in_stock' => request('in_stock'),
            'price' => request('price'),
            'photo' => $path // Update photo path
        ]);

        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->photo) {
            Storage::disk('public')->delete($product->photo);
        }
        $product->delete();
        return redirect('/products ');
    }

    public function showProductHistory()
    {
        $productHistories = ProductHistory::all();
        return view('admin.products.product-history', compact('productHistories'));
    }
}
