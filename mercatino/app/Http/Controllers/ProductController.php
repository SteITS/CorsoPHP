<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
{
    $search = $request->get('search');
    $categoryId = $request->get('category');

    $categories = Category::all();

    $query = Product::query();

    if ($categoryId) {
        $query->where('category_id', $categoryId);
    }

    if ($search) {
        $query->where('name', 'like', '%' . $search . '%');
    }

    $products = $query->get();

    return view('products.index', compact('products', 'categories'));
}

public function personal()
{
    $userId = auth()->id(); // Get the logged-in user's ID
    $products = Product::where('user_id', $userId)->get(); // Fetch products by this user

    return view('products.personal', compact('products'));
}

public function show($id)
{
    $product = Product::with(['category', 'user'])->findOrFail($id);
    return view('products.show', compact('product'));
}

    public function create()
{
    $categories = Category::all();
    return view('products.create', compact('categories'));
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|max:100',
        'description' => 'nullable',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|max:2048'
    ]);

    $productData = $request->only(['name', 'description', 'price', 'category_id']);
    $productData['user_id'] = auth()->id();

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $filename);
        $productData['image'] = 'uploads/' . $filename;
    }

    Product::create($productData);

    return redirect()->route('products.index')->with('success', 'Product added successfully!');
}
public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);
    if ($product->user_id !== auth()->id()) {
        abort(403, 'Unauthorized action.');
    }

    $request->validate([
        'name' => 'required|string|max:100',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    ]);

    // Update product fields
    $product->name = $request->name;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->category_id = $request->category_id;

    // Handle image upload
    if ($request->hasFile('image')) {
        // Delete old image if exists
        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }

        // Upload new image
        $imagePath = $request->file('image')->store('uploads', 'public');
        $product->image = '/storage/' . $imagePath;
    }

    $product->save();

    return redirect()->route('products.show', $product->id)->with('success', 'Product updated successfully.');
}
public function edit($id)
{
    $product = Product::findOrFail($id);
    if ($product->user_id !== auth()->id()) {
        abort(403, 'Unauthorized action.');
    }
    $categories = Category::all();
    return view('products.edit', compact('product', 'categories'));
}
public function destroy($id)
{
    $product = Product::findOrFail($id);
    if ($product->user_id !== auth()->id()) {
        abort(403, 'Unauthorized action.');
    }
    // Delete the product image if it exists
    if ($product->image && file_exists(public_path($product->image))) {
        unlink(public_path($product->image));
    }

    $product->delete();

    return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
}
public function userProducts($id)
{
    $user = User::findOrFail($id); // Retrieve the user
    $products = Product::where('user_id', $id)->get(); // Fetch their products

    return view('products.user_products', compact('user', 'products'));
}


}
