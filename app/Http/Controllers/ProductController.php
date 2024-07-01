<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create() {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $product = new Product([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'image' => 'images/'.$imageName
        ]);

        $product->save();

        return redirect()->route('products.index');
    }

    public function edit(Product $product) {
        return view('products.edit', compact('products'));
    }

    public function update(Request $request, Product $product) {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $product->update($request->all());

        return redirect()->route('products.index');
    }

    public function destroy(Product $product) {
        $product->delete();
        return redirect()->route('products.index');
    }

    public function home() {
        $categories = Category::all();
        return view('home', compact('categories'));
    }

    public function browse() {
        $categories = Category::all();
        $products = Product::all();
        return view('browse', compact('categories', 'products'));
    }
}
