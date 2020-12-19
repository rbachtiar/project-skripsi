<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class PenyakitController
{
    public function index()
    {
        $data = DB::table('penyakit')->orderBy('kode_penyakit', 'desc')->get();
      return Datatables::of($data)
      ->addIndexColumn()
      ->addColumn('aksi', function($row){
          $btn = '<a href="javascript:void(0)" data-id="'.$row->kode_penyakit.'" class="btn-edit-penyakit" style="font-size: 18pt; text-decoration: none;" class="mr-3">
          <i class="fas fa-pen-square"></i>
          </a>';
          $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->kode_penyakit.'" class="btn-delete-penyakit" style="font-size: 18pt; text-decoration: none; color:red;">
          <i class="fas fa-trash"></i>
          </a>';
          return $btn;
        })
      ->rawColumns(['aksi'])
      ->make(true);
    }

    public function loadTable()
    {
      return view('datatable.penyakit');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $save = DB::table('penyakit')->insert([$data]);
        if($save) {
            return response()->json([
                'store' => 'success',
                'data' => $data
                ]);
        }
    }
    public function edit($kode)
    {
        $data = DB::table('penyakit')->where('kode_penyakit', $kode)->get();
        if($data) {
            return response()->json([
                'data' => $data
            ]);
        }
    }

    public function update(Request $request, $kode)
    {
        $gejala = $request->penyakit_edit;
        $save = DB::table('penyakit')->where('kode_penyakit', $kode)->update(['penyakit' => $penyakit]);
        if($save) {
            return response()->json([
                'update' => 'success',
                ]);
        }
    }



    public function destroy($kode)
    {
        DB::table('penyakit')->where('kode_penyakit', $kode)->delete();
        return response()->json([
            'delete' => 'success',
            ]);
    }
}
