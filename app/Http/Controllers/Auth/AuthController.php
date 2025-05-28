<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthAdminRequest;
use App\Http\Requests\AuthKRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function AuthAdmin(AuthAdminRequest $requestAdmin) {
        $credentials = $requestAdmin->only('email', 'password');
        if(Auth::attempt($credentials)) {
            $requestAdmin->session()->regenerate();
            return redirect()->intended('admin/dashboard');
        } else {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
                ])->onlyInput('email');
        }
    }

    public function AuthKaryawan(AuthKRequest $requestKaryawan) {
        dd($requestKaryawan->all());
    }
}
