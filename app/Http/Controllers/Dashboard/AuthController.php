<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('dashboard.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required|min:6'
        ]);

        if (auth()->attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard.index');
        }

        return back()->with([
            'status'    => 'danger',
            'message'   => 'Invalid login details'
        ]);
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('dashboard.login');
    }
}
