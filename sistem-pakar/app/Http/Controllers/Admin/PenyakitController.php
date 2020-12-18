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
          $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" class="btn-edit-berita" style="font-size: 18pt; text-decoration: none;" class="mr-3">
          <i class="fas fa-pen-square"></i>
          </a>';
          $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->judul.'" class="btn-delete-berita" style="font-size: 18pt; text-decoration: none; color:red;">
          <i class="fas fa-trash"></i>
          </a>';
          $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->judul.'" class="btn-show-berita" style="font-size: 18pt; text-decoration: none; color:green;">
          <i class="fas fa-eye"></i>
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
}
