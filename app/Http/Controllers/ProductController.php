<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::all(), 200);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'photo' => 'nullable|string',
                'title' => 'required|string',
                'brand' => 'required|string',
                'category_id' => 'required|exists:categories,id',
                'in_stock' => 'required|integer',
                'price' => 'required|numeric',
            ]);

            $product = Product::create($request->all());

            return response()->json($product, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create product', 'message' => $e->getMessage()], 500);
        }
    }

    public function show(Product $product)
    {
        return response()->json($product, 200);
    }

    public function update(Request $request, Product $product)
    {
        try {
            $request->validate([
                'photo' => 'nullable|string',
                'title' => 'required|string',
                'brand' => 'required|string',
                'category_id' => 'required|exists:categories,id',
                'in_stock' => 'required|integer',
                'price' => 'required|numeric',
            ]);

            $product->update($request->all());

            return response()->json($product, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update product', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();

            return response()->noContent();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete product', 'message' => $e->getMessage()], 500);
        }
    }
}
