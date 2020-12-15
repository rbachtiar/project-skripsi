<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
