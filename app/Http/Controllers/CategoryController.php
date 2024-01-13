<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    function viewCategory(): View
    {
        return view('pages.category.category-list');
    }

    function viewAdd(): View
    {
        $categories = Category::all();
        return view('pages.category.category-add', [
            'categories' => $categories
        ]);
    }

    function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'category_id' => ['nullable', 'numeric', 'exists:categories,id'],
            'name' => ['required', 'string', 'min:5', 'max:100', 'unique:categories'],
            'summary' => ['required', 'string', 'min:1', 'max:500'],
            'thumbnail_image' => ['required', 'file', 'mimes:jpg,png,webp,jpeg'],
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $category = new Category();
        $category->category_id = $request->input('category_id');
        $category->name = $request->input('name');
        $category->summary = $request->input('summary');
        $category->thumbnail_image = $request->file('thumbnail_image')->store('categories');
        $result = $category->save();

        if ($result) {
            return redirect()->route('view.category.list')->with('message', 'Category Successfully Added');
        } else {
            echo "error";
        }

    }
}
