<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MatakuliahKelas;
use Auth;
use Yajra\Datatables\Datatables;

class BahanAjarController extends Controller
{
    public function index()
    {
                   
        return view('bahanajar.index');    
    }

    public function getdata(MatakuliahKelas $matakuliahkelas)
    {
      $matakuliahkelas = MatakuliahKelas::where('kelas_id', Auth::guard('mahasiswa')->user()->kelas_id)
        ->where('angkatan_id', Auth::guard('mahasiswa')->user()->angkatan_id)
        ->get(); 
        return Datatables::of($matakuliahkelas)     
        ->addColumn('action', function ($data) {
        return '<a href="/viewAlldownloadfile/'.$data->matakuliah_id.'/'.$data->kelas_id.'/'.$data->angkatan_id.'">
				<button type="button" class="btn btn-info"><span class="glyphicon glyphicon-book"></span> &nbsp; Lihat Materi</button></a>';
        }) 
        ->addColumn('matakuliah_id', function ($data) {
        return $data->matakuliah->nama_matkul;
        })  
        ->addColumn('dosen_id', function ($data) {
        return $data->dosen->nama;
        })  
        ->addIndexColumn()->make(true);
    }
}
	