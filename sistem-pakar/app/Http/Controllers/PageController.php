<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function konsultasi()
    {
        if(session('id') == "") {
            return redirect('pre');
        }
        return view('konsultasi');
    }
    public function info()
    {
        $data = DB::table('penyakit')->get();
        return view('info', compact('data'));
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
                return redirect('a');
            } 
        } else {
            return view('login');
        }
    }

    public function diagnosa()
    {
        if(session('id') == "") {
            return redirect('pre');
        }
        $id = session('id');
        $data = DB::table('pengunjung')->where('id', $id)
        ->join('penyakit' ,'pengunjung.kode_penyakit', '=', 'penyakit.kode_penyakit')
        ->select('pengunjung.*', 'penyakit.*')
        ->get();
        $gejala = DB::table('gejala_user')->where('id_pengunjung', $id)->get();
        // dd($data);
        return view('diagnosa', compact('data', 'gejala'));
    }

    public function pre()
    {
        return view('preKonsultasi');
    }
}
