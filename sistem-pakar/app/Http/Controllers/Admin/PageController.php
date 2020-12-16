<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class PageController
{
    public function index()
    {
        return view('admin.dashboard');
    }
}
