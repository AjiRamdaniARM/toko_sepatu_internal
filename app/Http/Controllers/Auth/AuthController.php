<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthAdminRequest;
use App\Http\Requests\AuthKRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Login Admin
    public function AuthAdmin(AuthAdminRequest $requestAdmin)
    {
        $credentials = $requestAdmin->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            $requestAdmin->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    // Login Karyawan
    public function AuthKaryawan(AuthKRequest $requestKaryawan)
    {
        $credentials = $requestKaryawan->only('email', 'password');

        if (Auth::guard('karyawan')->attempt($credentials)) {
            $requestKaryawan->session()->regenerate();
            return redirect()->intended('karyawan/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    // Logout untuk Admin dan Karyawan
    public function logout()
    {
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }

        if (Auth::guard('karyawan')->check()) {
            Auth::guard('karyawan')->logout();
        }

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/'); // Atau ke login page
    }
}
