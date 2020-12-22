<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController
{
    public function index()
    {
        $pengunjung = DB::table('pengunjung')->get();
        $gejala = DB::table('gejala')->get();
        $penyakit = DB::table('penyakit')->get();
        $rules = DB::table('rules')->get();
        $data = [];
        $data[0] = count($pengunjung);
        $data[1] = count($gejala);
        $data[2] = count($penyakit);
        $data[3] = count($rules);
        return view('admin.dashboard', compact('data'));
    }

    public function gejala()
    {
        return view('admin.gejala');
    }

    public function penyakit()
    {
        return view('admin.penyakit');
    }
}
