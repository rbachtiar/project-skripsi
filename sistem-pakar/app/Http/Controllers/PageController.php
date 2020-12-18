<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;

class PageController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function konsultasi()
    {
        return view('konsultasi');
    }
    public function info()
    {
        return view('info');
    }
    public function kontak()
    {
        return view('kontak');
    }

    public function login()
    {
        $cookie = Cookie::get('login');
        if($cookie != null) {
            $value = Crypt::decryptString($cookie);
            if($value == 'login true') {
                return redirect('admin');
            } 
        } else {
            return view('login');
        }
    }
}
