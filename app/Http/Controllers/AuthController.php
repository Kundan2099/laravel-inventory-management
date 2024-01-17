<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function viewLogin(): View
    {
        return view('pages.auth.login');
    }

    function handleLogin(Request $request): RedirectResponse
    {
        try {

            $validation = Validator::make($request->all(), [
                'email' => ['required', 'email', 'string', 'min:10', 'max:100', 'exists:admins'],
                'password' => ['required', 'string', 'min:6', 'max:20']
            ]);

            if ($validation->fails()) {
                return redirect()->back()->withErrors($validation)->withInput();
            }

            if (Auth::guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
                return redirect()->to(RouteServiceProvider::ADMIN_DASHBOARD);
            }
            else {
                return redirect()->back()->withErrors([
                    'password' => ['Wrong Password']
                ])->withInput();
            }
        } catch (Exception $exception) {
            return redirect()->back()->with('message', $exception->getMessage());
        }
    }

    function viewRegister(): View
    {
        return view('pages.auth.register');
    }

    function handleRegister(Request $request): RedirectResponse
    {
        try {

            $validation = Validator::make($request->all(), [
                'name' => ['required', 'string', 'min:5', 'max:100'],
                'email' => ['required', 'email', 'string', 'min:10', 'max:100', 'unique:admins'],
                'phone' => ['required', 'numeric', 'digits:10', 'unique:admins'],
                'password' => ['required', 'string', 'min:6', 'max:20', 'confirmed']
            ]);

            if ($validation->fails()) {
                return redirect()->back()->withErrors($validation)->withInput();
            }

            $admin = new Admin();
            $admin->name = $request->input('name');
            $admin->email = $request->input('email');
            $admin->phone = $request->input('phone');
            $admin->password = Hash::make($request->input('password'));
            $admin->save();

            return redirect()->route('view.login')->with('message', 'Admin successfully registred');

        } catch (Exception $exception) {
            return redirect()->back()->with('message', $exception->getMessage());
        }
    }
}
