<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RuleController
{
    public function index()
    {
        return view('admin.rule');
    }

    public function getGejala()
    {
        $data = DB::table('gejala')->orderBy('kode_gejala', 'desc')->get();
        return response()->json(['data' => $data]);
    }

    public function getPenyakit()
    {
        $data = DB::table('penyakit')->orderBy('kode_penyakit', 'desc')->get();
        return response()->json(['data' => $data]);
    }

    public function getRules()
    {
        $gejala = array();
        $data = DB::table('rules')
        ->join('penyakit', 'rules.kode_penyakit', '=', 'penyakit.kode_penyakit')
        // ->join('gejala', 'rules.kode_gejala', '=', 'gejala.kode_gejala')
        ->select('penyakit.penyakit', 'rules.kode_gejala')->orderBy('rules.kode_penyakit', 'asc')->get();
        // $gejala = DB::table('rules')->select('kode_gejala')->orderBy('kode_penyakit', 'asc')->get();
        for ($i=0; $i < count($data); $i++) { 
            $gejala = $data[$i]->kode_gejala;
        }
        // dd($penyakit);
        // $gejalaData = DB::table('')
        $gejala = json_decode($data);
        dd($gejala);
        // $response = [
        //     'success' => true,
        //     'data' => $data
        // ];
        // return response()->json($response);
    }

    public function loadTable()
    {
      return view('datatable.rule');
    }

    public function store(Request $request)
    {
        $data = $request->gejala;
        $penyakit = $request->penyakit;
        $save = DB::table('rules')->insert(['kode_penyakit' => $penyakit, 'kode_gejala' => json_encode($data)]);
        if($save) {
            return response()->json(['store' => 'success']);
        }
    }
}
