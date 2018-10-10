<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Angkatan;
use Yajra\Datatables\Datatables;
use App\Http\Requests\FormRequestAngkatanStore;

class AngkatanController extends Controller
{
    public function index()
    {        
        return view('angkatan.index');
    }

    public function getdata(Angkatan $angkatan)
    {
        $angkatan = Angkatan::get();
        return Datatables::of($angkatan)
              ->addColumn('action', function ($angkatan) {
            return '<a href="/angkatan/edit/'.$angkatan->id.'" class="btn btn-sm btn-warning" ><i class="fa fa-edit"></i>&nbsp;Edit</a>
                    <a href="#" class="btn btn-sm btn-danger btn-icon btn-circle delete">
                        <i class="fa fa-trash"></i>&nbsp;Hapus
                    </a>';
        })
         ->addIndexColumn()->make(true);
    }
    
    public function create()
    {
        \LogActivity::addToLog('Admin Menambahkan Data Angkatan');
        return view('angkatan.form',['action'=>"simpan"]);
    }

    public function simpan(FormRequestangkatanStore $request)
    {
        $angkatan = new Angkatan;
        $angkatan->nama_angkatan = $request->nama_angkatan;
        $angkatan->save();
        return redirect('/angkatan')->with(['success' => 'Data Angkatan Berhasil Di Save']);
    }  
    
    public function edit($id)
    {
        \LogActivity::addToLog('Admin Mengedit Data Angkatan');
        $angkatan = Angkatan::find($id);
        return view('angkatan.edit',['action'=>"update",'angkatan'=>$angkatan]);
    }

    public function update(Request $request, $id)
    {
        $angkatan = Angkatan::find($id);
        $angkatan->nama_angkatan = $request->nama_angkatan;
        $angkatan->save();
        return redirect('/angkatan')->with(['success' => 'Data Angkatan Berhasil Di Update']);
    }

     public function deleteGroup(Request $request)
    {
        \LogActivity::addToLog('Admin Menghapus Data Angkatan');
        $angkatan = Angkatan::find($request->id);
        $angkatan->delete();
        
        return $angkatan ? response()->json(['message' => 'Angkatan Berhasil Di Hapus'], 200)
                          : response()->json(['message' => 'Angkatan Gagal Di Hapus'], 400);
    }
    
   

  
}
