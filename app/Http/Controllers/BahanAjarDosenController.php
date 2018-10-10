<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MatakuliahKelas;
use Auth;
use Yajra\Datatables\Datatables;

class BahanAjarDosenController extends Controller
{
    public function index()
    {                    
        return view('bahanajardosen.index');   
    }

     public function getdata(MatakuliahKelas $matakuliahkelas)
    {
        $matakuliahkelas = MatakuliahKelas::where('dosen_id', Auth::guard('dosen')->user()->id)->get();     
        return Datatables::of($matakuliahkelas)     
        ->addColumn('action', function ($data) {
        return '<a href="/materi/'.$data->matakuliah_id.'/'.$data->kelas_id.'/'.$data->angkatan_id.'">
				<button type="button" class="btn btn-info"><span class="glyphicon glyphicon-book"></span> &nbsp; Lihat Materi</button></a>';
        }) 
        ->addColumn('matakuliah_id', function ($data) {
        return $data->matakuliah->nama_matkul;
        })  
        ->addColumn('kelas_id', function ($data) {
        return $data->kelas->nama_kelas;
        }) 
        ->addColumn('angkatan_id', function ($data) {
        return $data->angkatan->nama_angkatan;
        })  
        ->addIndexColumn()->make(true);
    }
}
