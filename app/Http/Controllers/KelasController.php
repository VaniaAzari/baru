<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use Yajra\Datatables\Datatables;
use App\Http\Requests\FormRequestKelasStore;

class KelasController extends Controller
{
    public function index()
    {      
        return view('kelas.index');
    }

    public function getdata(Kelas $kelas)
    {
        $kelas = Kelas::get();
        return Datatables::of($kelas)
        ->addColumn('action', function ($kelas) {
        return '<a href="/kelas/edit/'.$kelas->id.'" class="btn btn-sm btn-warning" ><i class="fa fa-edit"></i>&nbsp;Edit</a>
                <a href="#" class="btn btn-sm btn-danger btn-icon btn-circle delete">
                        <i class="fa fa-trash"></i>&nbsp;Hapus
                    </a>';
        })
       ->addIndexColumn()->make(true);
    }
    
    public function create()
    {
        \LogActivity::addToLog('Admin Menambahkan Data Kelas');
        return view('kelas.form',['action'=>"simpan"]);
    }
   
    public function simpan(FormRequestKelasStore $request)
    {        
        $kelas = new Kelas;
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->save();
        return redirect('/kelas')->with(['success' => 'Data Kelas Berhasil Di Tambah']);
    }

    public function edit($id)
    {
        \LogActivity::addToLog('Admin Mengedit Data Kelas');
         $kelas = Kelas::find($id);
        return view('kelas.edit',['action'=>"update",'kelas'=>$kelas]);
    }
    
    public function update(Request $request, $id)
    {
        $kelas = Kelas::find($id);
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->save();
        return redirect('/kelas')->with(['success' => 'Data Kelas Berhasil Di Edit']);
    }
  
   public function deleteGroup(Request $request)
    {
        \LogActivity::addToLog('Admin Menghapus Data Kelas');
        $kelas = Kelas::find($request->id);
        $kelas->delete();
        
        return $kelas ? response()->json(['message' => 'Kelas Berhasil Di Hapus'], 200)
                          : response()->json(['message' => 'Kelas Gagal Di Hapus'], 400);
    }
}
