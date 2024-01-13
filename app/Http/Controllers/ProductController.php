<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function viewProductList(): View {
        return view('pages.product.product-list');
    }
}
