<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view("welcome");
    }

    public function showRegisterForm()
    {
        return view("register");
    }

    public function register(Request $request)
    {
        User::create([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "phone" => $request->phone,
            "password" => Hash::make($request->password)
        ]);

        return redirect()->route("login.page");
    }

    public function showLoginForm()
    {
        return view("login");
    }

    public function login(Request $request)
    {
        if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
            return redirect()->route("dashboard");
        } else {
            return redirect()->route("login.page");
        }
    }

    public function dashboard()
    {
        return view("dashboard");
    }
}
