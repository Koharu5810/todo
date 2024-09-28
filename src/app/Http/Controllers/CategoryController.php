<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        // return view('categories', compact('categories'));
        return view('category', compact('categories'));
    }
    public function store(CategoryRequest $request)
    {
        // $category = $request->only(['category']);
        $category = $request->only(['name']);
        Category::create($category);

        // return redirect('/category')->with('success', 'カテゴリを作成しました');
        return redirect('/categories')->with('success', 'カテゴリを作成しました');
    }
    public function update(CategoryRequest $request)
    {
        $category = $request->only('name');
        Category::find($request->id)->update($category);

        return redirect('/categories')->with('success', 'カテゴリを更新しました');
    }
}
