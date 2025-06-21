<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6'
        ], [
            'email.exists' => 'Email Tidak Terdaftar',
            'email.required' => 'Email Harus Diisi',
            'password.required' => 'Password Harus Diisi',
            'password.min' => 'Password Minimal 6 Karakter'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput(['email']);
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('staff.index')->with('success', 'Login Berhasil');
        }

        return back()->withErrors(['password' => 'Password Salah'])->withInput(['email']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
