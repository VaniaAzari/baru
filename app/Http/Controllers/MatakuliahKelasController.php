<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MatakuliahKelas;
use App\Matakuliah;
use App\Kelas;
use App\Dosen;
use App\Angkatan;
use Yajra\Datatables\Datatables;
use App\Http\Requests\FormRequestMtkKlsStore;


class MatakuliahKelasController extends Controller
{
    public function index()
    {
         $matakuliahkelas = MatakuliahKelas::all();       
        return view('matakuliahkelas.index',['matakuliahkelas'=>$matakuliahkelas]);    
    }

    public function getdata(MatakuliahKelas $matakuliahkelas)
    {
        $matakuliahkelas = MatakuliahKelas::get();
        return Datatables::of($matakuliahkelas)        
        ->addColumn('matakuliah_id', function ($matakuliahkelas) {
            return $matakuliahkelas->matakuliah->nama_matkul;
        })
         ->addColumn('kode', function ($matakuliahkelas) {
            return $matakuliahkelas->matakuliah->kode;
        })
        ->addColumn('kelas_id', function ($matakuliahkelas) {
            return $matakuliahkelas->kelas->nama_kelas;
        })
        ->addColumn('angkatan_id', function ($matakuliahkelas) {
            return $matakuliahkelas->angkatan->nama_angkatan;
        })
         ->addColumn('dosen_id', function ($matakuliahkelas) {
            return $matakuliahkelas->dosen->nama;
        })
              ->addColumn('action', function ($matakuliahkelas) {
            return '<a href="/matakuliahkelas/edit/'.$matakuliahkelas->id.'" class="btn btn-sm btn-warning" ><i class="fa fa-edit"></i>&nbsp;Edit</a>                    
                     <a href="#" class="btn btn-sm btn-danger btn-icon btn-circle delete">
                        <i class="fa fa-trash"></i>&nbsp;Hapus
                    </a>';
        })
        ->addIndexColumn()->make(true);
    }
   
    public function create()
    {
        \LogActivity::addToLog('Admin Menambahkan Data MatakuliahKelas');
        $matakuliah = Matakuliah::all(['id','kode','nama_matkul']);
        $kelas = Kelas::all(['id', 'nama_kelas']);
        $dosen = Dosen::all(['id', 'nama']);
        $angkatan = Angkatan::all(['id', 'nama_angkatan']);
        return view('matakuliahkelas.form',['action'=>"simpan",'matakuliah'=>$matakuliah,'kelas'=>$kelas,'dosen'=>$dosen,'angkatan'=>$angkatan]);
    }

    public function simpan(FormRequestMtkKlsStore $request)
    {
        $matakuliahkelas = new MatakuliahKelas;
        $matakuliahkelas->matakuliah_id = $request->matakuliah_id;
        $matakuliahkelas->kelas_id = $request->kelas_id;
        $matakuliahkelas->angkatan_id = $request->angkatan_id;
        $matakuliahkelas->dosen_id = $request->dosen_id;
        $matakuliahkelas->save();
        return redirect('/matakuliahkelas')->with(['success' => 'Data Matakuliah Kelas Berhasil Di Save']);
    }

    public function edit($id)
    {
            \LogActivity::addToLog('Admin Mengedit Data MatakuliahKelas');
           $matakuliahkelas = MatakuliahKelas::find($id);
           $matakuliah = Matakuliah::all(['id','kode','nama_matkul']);
       	   $kelas = Kelas::all(['id', 'nama_kelas']);
           $dosen = Dosen::all(['id', 'nama']);
           $angkatan = Angkatan::all(['id', 'nama_angkatan']);

        return view('matakuliahkelas.edit',['action'=>"update",'matakuliahkelas'=>$matakuliahkelas,'matakuliah'=>$matakuliah,
            'kelas'=>$kelas,'dosen'=>$dosen, 'angkatan'=>$angkatan]);
    }

    public function update(Request $request, $id)
    {
        $matakuliahkelas = MatakuliahKelas::find($id);
        $matakuliahkelas->matakuliah_id = $request->matakuliah_id;
        $matakuliahkelas->kelas_id = $request->kelas_id;
        $matakuliahkelas->dosen_id = $request->dosen_id;
        $matakuliahkelas->angkatan_id = $request->angkatan_id;
        $matakuliahkelas->save();
        return redirect('/matakuliahkelas')->with(['success' => 'Data Matakuliah Kelas Berhasil Di Update']);
    }

    public function deleteGroup(Request $request)
    {
        \LogActivity::addToLog('Admin Menghapus Data MatakuliahKelas');
        $matakuliahkelas = MatakuliahKelas::find($request->id);
        $matakuliahkelas->delete();
        
        return $matakuliahkelas ? response()->json(['message' => 'MatakuliahKelas Berhasil Di Hapus'], 200)
                          : response()->json(['message' => 'MatakuliahKelas Gagal Di Hapus'], 400);
    }


   
 
}
