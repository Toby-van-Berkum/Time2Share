<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Products::all();
        return view('products.index', compact('products'));
    }

    public function create() {
        return view('products.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'images' => 'nullable|json'
        ]);

        $product = new Product([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'images' => $request->images
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
            'images' => 'nullable|json'
        ]);

        $product->update($request->all());

        return redirect()->route('products.index');
    }

    public function destroy(Product $product) {
        $product->delete();
        return redirect()->route('products.index');
    }
}
