<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function Showlogin()
    {
        return view('auth.login');
    }

    public function storeLogin(Request $request)
    {
        $data = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        return redirect('/')
            ->with('success', 'Login berhasil');
    }
}
