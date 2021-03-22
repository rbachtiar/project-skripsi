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

    public function diagnosa(Request $request)
    {
        $kode_penyakit = $request->kode;
        $rule = DB::table('rules')
        ->where('ya', $kode_penyakit)
        ->where('tidak', $kode_penyakit)
        ->get();
        $a = 0;
        $gejala1 = null;
        $gejala[0] = $rule[0]->kode_gejala;
        while ($a <= 50) {
            $gejala1 = DB::table('rules')
            ->where('ya', $gejala[$a])
            ->orWhere('tidak', $gejala[$a])
            ->value('kode_gejala');
            if(!$gejala1) {
                $a = 51;
            }
            $gejala[$a+1] = $gejala1;
            $a++;
        }
        unset($gejala[52]);
        $gejala[count($gejala)] = $kode_penyakit;
        //cari rules
        for ($i=0; $i < count($gejala); $i++) { 
            $gejala2Array[] = DB::table('rules')
            ->where('ya', $gejala[$i])
            ->value('kode_gejala');
        }
        $gejala3Array = array();
        for ($i=0; $i < count($gejala2Array); $i++) { 
            $checkGejala = $gejala2Array[$i];
            if($checkGejala) {
                array_push($gejala3Array, $checkGejala);
            }
        }
        if(session('id') == "") {
            return redirect('pre');
        }
        $id = session('id');
        $gejalaUser = DB::table('gejala_user')->where('id_pengunjung', $id)->get();
        $gejalaUserArray = null;
        for ($i=0; $i < count($gejalaUser); $i++) { 
            $gejalaUserArray[] = $gejalaUser[$i]->kode_gejala;
        }
        $jumlah_gejala = count($gejala3Array);
        $jumlah_gejala_user = count($gejalaUserArray);
        if($jumlah_gejala == $jumlah_gejala_user) {
            $status_penyakit_ditemukan = true;
        } else {
            $status_penyakit_ditemukan = false;
        }
        if(!$status_penyakit_ditemukan) {
            $penyakit = "0";
        } else {
            $penyakit = $kode_penyakit;
        }
        //update pengunjung
        $kode = [
            'kode_penyakit' => $penyakit,
        ];
        DB::table('pengunjung')->where('id', $id)->update($kode);
        if($penyakit == "0") {
            $data = DB::table('pengunjung')->where('id', $id)
            ->get();
        } else {
            $data = DB::table('pengunjung')->where('id', $id)
            ->join('penyakit' ,'pengunjung.kode_penyakit', '=', 'penyakit.kode_penyakit')
            ->select('pengunjung.*', 'penyakit.*')
            ->get();
        }
        return view('diagnosa', compact('data', 'gejalaUser'));
    }

    public function pre()
    {
        return view('preKonsultasi');
    }
}
