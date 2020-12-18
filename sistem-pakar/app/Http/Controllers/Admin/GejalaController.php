<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class GejalaController
{
    public function index()
    {
        $data = DB::table('gejala')->orderBy('kode_gejala', 'desc')->get();
      return Datatables::of($data)
      ->addIndexColumn()
      ->addColumn('aksi', function($row){
          $btn = '<a href="javascript:void(0)" data-id="'.$row->kode_gejala.'" class="btn-edit-gejala" style="font-size: 18pt; text-decoration: none;" class="mr-3">
          <i class="fas fa-pen-square"></i>
          </a>';
          $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->kode_gejala.'" class="btn-delete-gejala" style="font-size: 18pt; text-decoration: none; color:red;">
          <i class="fas fa-trash"></i>
          </a>';
          return $btn;
        })
      ->rawColumns(['aksi'])
      ->make(true);
    }

    public function loadTable()
    {
      return view('datatable.gejala');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $save = DB::table('gejala')->insert([$data]);
        if($save) {
            return response()->json([
                'store' => 'success',
                'data' => $data
                ]);
        }
    }

    public function edit($kode)
    {
        $data = DB::table('gejala')->where('kode_gejala', $kode)->get();
        if($data) {
            return response()->json([
                'data' => $data
            ]);
        }
    }

    public function update(Request $request, $kode)
    {
        $gejala = $request->gejala_edit;
        $save = DB::table('gejala')->where('kode_gejala', $kode)->update(['gejala' => $gejala]);
        if($save) {
            return response()->json([
                'update' => 'success',
                ]);
        }
    }

    public function destroy($kode)
    {
        DB::table('gejala')->where('kode_gejala', $kode)->delete();
        return response()->json([
            'delete' => 'success',
            ]);
    }
}
