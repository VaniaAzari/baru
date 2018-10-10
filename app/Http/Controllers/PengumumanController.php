<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengumuman;
use App\Kelas;
use App\Angkatan;
use Auth;
use Yajra\Datatables\Datatables;
use App\Http\Requests\FormRequestPengumumanStore;


class PengumumanController extends Controller
{
    public function index()
    {     
        return view('pengumuman.index');   
    }

    public function getdata(Pengumuman $pengumuman)
    {
         
        $pengumuman = Pengumuman::where('dosen_id', Auth::guard('dosen')->user()->id)->get();
        return Datatables::of($pengumuman)
          ->addColumn('isi', function ($data) {
                return strip_tags($data->isi) ;
          })
          ->addColumn('angkatan', function ($data) {
                return  $data->angkatan->nama_angkatan;
          })
          ->addColumn('kelas', function ($data) {
                return  $data->kelas->nama_kelas;
          })
              ->addColumn('action', function ($data) {
            return '<a href="/pengumuman/edit/'.$data->id.'" class="btn btn-sm btn-warning" ><i class="fa fa-edit"></i>&nbsp;Edit</a>
                    <a h<a href="#" class="btn btn-sm btn-danger btn-icon btn-circle delete">
                        <i class="fa fa-trash"></i>&nbsp;Hapus
                    </a>';
        })
     ->addIndexColumn()->make(true);
    }  

    public function create()
    {
        \LogActivity::addToLog('Dosen Menambahkan Data Pengumuman');
        $kelas = Kelas::all(['id', 'nama_kelas']);
        $angkatan = Angkatan::all(['id', 'nama_angkatan']);
        return view('pengumuman.form',['action'=>"simpan",'kelas'=>$kelas,'angkatan'=>$angkatan]);
    } 

    public function simpan (FormRequestPengumumanStore $request)
    {
        $pengumuman = new Pengumuman;
        $pengumuman->judul= $request->judul;
        $pengumuman->angkatan_id= $request->angkatan_id;
        $pengumuman->kelas_id= $request->kelas_id;
        $pengumuman->isi= $request->isi;
        $pengumuman->dosen_id= Auth::guard('dosen')->user()->id; 
        $pengumuman->save();
        return redirect('/pengumuman')->with(['success' => 'Data Pengumuman Berhasil Di Save']);

    }  

    public function edit($id)
    {        
        \LogActivity::addToLog('Dosen Mengedit Data Pengumuman');
        $kelas = Kelas::all(['id', 'nama_kelas']);
        $angkatan = Angkatan::all(['id', 'nama_angkatan']);
        $pengumuman = Pengumuman::find($id);
        return view('pengumuman.edit',['action'=>"update",'pengumuman'=>$pengumuman,'kelas'=>$kelas,'angkatan'=>$angkatan]);
    }

    public function update(Request $request, $id)
    {
        $pengumuman = Pengumuman::find($id);
        $pengumuman->judul= $request->judul;
        $pengumuman->isi= $request->isi;
        $pengumuman->angkatan_id= $request->angkatan_id;
        $pengumuman->kelas_id= $request->kelas_id;
        $pengumuman->save();
        return redirect('/pengumuman')->with(['success' => 'Data Pengumuman Berhasil Di Update']);
    }

     public function deleteGroup(Request $request)
    {
          \LogActivity::addToLog('Dosen Menghapus Data Pengumuman');
        $pengumuman = Pengumuman::find($request->id);
        $pengumuman->delete();
        
        return $pengumuman ? response()->json(['message' => 'Pengumuman Berhasil Di Hapus'], 200)
                          : response()->json(['message' => 'Pengumuman Gagal Di Hapus'], 400);
    }
    
  
}
