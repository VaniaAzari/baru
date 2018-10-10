<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matakuliah;
use Yajra\Datatables\Datatables;
use App\Http\Requests\FormRequestMatkulStore;

class MatakuliahController extends Controller
{
    public function index()
    {         
        return view('matakuliah.index');    
    }

    public function getdata(Matakuliah $matakuliah)
    {
        $matakuliah = Matakuliah::get();
        return Datatables::of($matakuliah)
              ->addColumn('action', function ($matakuliah) {
            return '<a href="/matakuliah/edit/'.$matakuliah->id.'" class="btn btn-sm btn-warning" ><i class="fa fa-edit"></i>&nbsp;Edit</a>
                   <a href="#" class="btn btn-sm btn-danger btn-icon btn-circle delete">
                        <i class="fa fa-trash"></i>&nbsp;Hapus
                    </a>';
        })
      ->addIndexColumn()->make(true);
    }
   
    public function create()
    {
        \LogActivity::addToLog('Admin Menambahkan Data Matakuliah');
        return view('matakuliah.form',['action'=>"simpan"]);
    }
    
    public function simpan(FormRequestMatkulStore $request)
    {
        $matakuliah = new Matakuliah;
        $matakuliah->kode = $request->kode;
        $matakuliah->nama_matkul = $request->nama_matkul;
        $matakuliah->save();
        return redirect('/matakuliah')->with(['success' => 'Data Matakuliah Berhasil Di Tambah']);
    }

    public function edit($id)
    {
         \LogActivity::addToLog('Admin Mengedit Data Matakuliah');
        $matakuliah = Matakuliah::find($id);
        return view('matakuliah.edit',['action'=>"update",'matakuliah'=>$matakuliah]);
    }
    
    public function update(Request $request, $id)
    {
        $matakuliah = Matakuliah::find($id);
        $matakuliah->kode = $request->kode;
        $matakuliah->nama_matkul = $request->nama_matkul;
        $matakuliah->save();
        return redirect('/matakuliah')->with(['success' => 'Data Matakuliah Berhasil Di Edit']);
    }

    public function deleteGroup(Request $request)
    {
        \LogActivity::addToLog('Admin Menghapus Data Matakuliah');
        $matakuliah = Matakuliah::find($request->id);
        $matakuliah->delete();
        
        return $matakuliah ? response()->json(['message' => 'Matakuliah Berhasil Di Hapus'], 200)
                          : response()->json(['message' => 'Matakuliah Gagal Di Hapus'], 400);
    }



 
   
}
