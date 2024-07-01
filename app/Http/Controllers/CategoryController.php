<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create() {
        $categories = Category::all();
        return view('categories.create', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate(['name' => 'required|string|max:255']);
        Category::create($request->all());
        return redirect()->route('categories.index');
    }

    public function edit(Category $category) {
        $categories = Category::all();
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category) {
        $request->validate(['name' => 'required|string|max:255']);
        $category->update($request->all());
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category) {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
