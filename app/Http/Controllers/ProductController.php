<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    function viewProductList(): View {

        $products = Product::all();
        $categories =Category::all();
        return view('pages.product.product-list', ['products' => $products, ['categories' => $categories]]);
    }
    
    function viewProductAdd(): View {
        return view('pages.product.product-add');
    }

    function store(Request $request): RedirectResponse {

        $validation = Validator::make($request->all(), [
            'child_category_id' => ['nullable', 'numeric'],
            'name' => ['required', 'string', 'min:5', 'max:100', 'unique:categories'],
            'quantity' => ['nullable', 'integer'],
            'price_original' => ['nullable', 'numeric'],
            'price_discounted' => ['nullable', 'numeric'],
            'availability' => ['nullable', 'string'],
            'summary' => ['required', 'string', 'min:1', 'max:500'],
            'thumbnail_image' => ['nullable', 'file', 'mimes:jpg,png,webp,jpeg'],
        ]);

        if($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $product = new Product();
        $product->child_category_id = $request->input('child_category_id');
        $product->name = $request->input('name');
        $product->quantity = $request->input('quantity');
        $product->price_original = $request->input('price_original');
        $product->price_discounted = $request->input('price_discounted');
        $product->availability = $request->input('availability');
        $product->summary = $request->input('summary');
        if($request->hasFile('thumbnail_image')) {
            $product->thumbnail_image = $request->file('thumbnail_image')->store('product');
        }
        $result = $product->save();
    
        if($result) {
            return redirect()->route('view.product.list')->with('message', 'Product Successfully Added');
        } else {
            return abort(500);
        }

    }
}
