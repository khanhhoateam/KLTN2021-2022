<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt(['email' => $email, 'password' => $password, 'level' => 0])) {
            $request->session()->regenerate();

            return redirect()->route('index');
        }elseif (Auth::attempt(['email' => $email, 'password' => $password, 'level' => 1])) {
            $request->session()->regenerate();

            return redirect()->route('indexUser');
        }

        return back()->withErrors([
            'error' => 'Không đúng Email hoặc mật khẩu',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
            
        return redirect('/login');
    }
}
