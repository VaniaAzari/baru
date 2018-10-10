<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prodi;
use Yajra\Datatables\Datatables;
use App\Http\Requests\FormRequestProdiStore;

class ProdiController extends Controller
{
    public function index()
    {        
        return view('prodi.index');
    }

    public function getdata(Prodi $prodi)
    {
        $prodi = Prodi::get();
        return Datatables::of($prodi)
              ->addColumn('action', function ($prodi) {
            return '<a href="/prodi/edit/'.$prodi->id.'" class="btn btn-sm btn-warning" ><i class="fa fa-edit"></i>&nbsp;Edit</a>
                     <a href="#" class="btn btn-sm btn-danger btn-icon btn-circle delete">
                        <i class="fa fa-trash"></i>&nbsp;Hapus
                    </a>';
        })
       ->addIndexColumn()->make(true);
    }  

    public function create()
    {
        \LogActivity::addToLog('Admin Menambahkan Data Prodi');
        return view('prodi.form',['action'=>"simpan"]);
    }

    public function simpan(FormRequestProdiStore $request)
    {
        $prodi = new Prodi;
        $prodi->nama_prodi = $request->nama_prodi;
        $prodi->save();
        return redirect('/prodi')->with(['success' => 'Data Prodi Berhasil Di Save']);
    }  

    public function edit($id)
    {
        \LogActivity::addToLog('Admin Mengedit Data Prodi');
        $prodi = Prodi::find($id);
        return view('prodi.edit',['action'=>"update",'prodi'=>$prodi]);
    }
    
    public function update(Request $request, $id)
    {
        $prodi = Prodi::find($id);
        $prodi->nama_prodi = $request->nama_prodi;
        $prodi->save();
        return redirect('/prodi')->with(['success' => 'Data Prodi Berhasil Di Update']);
    }

    public function deleteGroup(Request $request)
    {
        \LogActivity::addToLog('Admin Menghapus Data Prodi');
        $prodi = Prodi::find($request->id);
        $prodi->delete();
        
        return $prodi ? response()->json(['message' => 'Prodi Berhasil Di Hapus'], 200)
                          : response()->json(['message' => 'Prodi Gagal Di Hapus'], 400);
    }

 

}
