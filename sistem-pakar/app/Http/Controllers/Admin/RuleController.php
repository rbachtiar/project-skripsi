<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Illuminate\Support\Collection;

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

    public function data()
    {
        $gejala = DB::table('gejala')->get();
        $penyakit = DB::table('penyakit')->get();
        return response()->json(['gejala' => $gejala, 'penyakit' => $penyakit]);
    }

    public function detailGejala($kode)
    {
        $gejala = DB::table('gejala')->where('kode_gejala', $kode)->get();
        return response()->json(['gejala' => $gejala]);
    }

    public function getRules()
    {
        $data = DB::table('rules')->get();
        return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('aksi', function($row){
            $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" class="btn-edit-rule" style="font-size: 18pt; text-decoration: none;" class="mr-3">
            <i class="fas fa-pen-square"></i>
            </a>';
            $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" class="btn-delete-rule" style="font-size: 18pt; text-decoration: none; color:red;">
            <i class="fas fa-trash"></i>
            </a>';
            return $btn;
            })
        ->rawColumns(['aksi'])
        ->make(true);
    }

    public function loadTable()
    {
      return view('datatable.rule');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $save = DB::table('rules')->insert([$data]);
        if($save) {
            return response()->json(['store' => 'success']);
        }
    }

    public function edit($id)
    {
        $data = DB::table('rules')->where('id', $id)->get();
        return response()->json(['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $data = [
            'ya' => $request->ya,
            'tidak' => $request->tidak
        ];
        // dd($data);
        $save = DB::table('rules')->where('id', $id)->update($data);
        if($save) {
            return response()->json(['store' => 'success']);
        }
    }

    public function destroy($id)
    {
        DB::table('rules')->where('id', $id)->delete();
        return response()->json([
            'delete' => 'success',
        ]);
    }
}
