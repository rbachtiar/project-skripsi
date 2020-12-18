<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            $value = Crypt::encryptString('login true');
            return redirect('/a')->cookie(
                'login', $value, 3600
            );
        } else {
            return redirect()->back()->with(['login' => 'false']);
        }
    }
}
