<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    function viewLogin(): View {
        return view('pages.auth.login');
    }
}
