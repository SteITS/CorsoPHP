<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductControllerApi extends Controller
{
    // Fetch all products with optional search and category filter
    public function index(Request $request)
    {
        $search = $request->query('search');
        $categoryId = $request->query('category');

        $query = Product::query();

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $products = $query->get();
        return response()->json($products);
    }

    // Show a single product's details
    public function show($id)
    {
        $product = Product::with(['category', 'user'])->findOrFail($id);
        return response()->json($product);
    }

    // Store a new product
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:10240', // optional image
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            $validated['image'] = $imagePath;
        }

        $product = Product::create($validated);

        return response()->json($product, 201); // 201 Created
    }

    // Update an existing product
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:10240', // optional image
        ]);

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            $validated['image'] = $imagePath;
        }

        $product->update($validated);

        return response()->json($product);
    }

    // Delete a product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully']);
    }
}
