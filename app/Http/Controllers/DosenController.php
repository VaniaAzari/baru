<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dosen;
use Yajra\Datatables\Datatables;
use App\Http\Requests\FormRequestStore;
use Carbon\Carbon;

class DosenController extends Controller
{
    public function index()
    {       
        return view('dosen.index');
    }
    
    public function getdata(Dosen $dosen)
    {
        $dosen = Dosen::get();
        return Datatables::of($dosen)     
        ->addColumn('action', function ($model) {
        return '<a href="/dosen/edit/'.$model->id.'" class="btn btn-sm btn-warning" ><i class="fa fa-edit"></i>&nbsp;Edit</a>
                <a href="#" class="btn btn-sm btn-danger btn-icon btn-circle delete">
                        <i class="fa fa-trash"></i>&nbsp;Hapus
                    </a>';
        })
         ->editColumn('file_name', function ($data) {
        return $data->file_name ? '<img src="/uploads/gambar/'.$data->file_name.'" width="70px" height="80px">'
        : null ;
        })
        ->rawColumns(['action','file_name'])->addIndexColumn()->make(true);
    }
   
    public function create()
    {
        \LogActivity::addToLog('Admin Menambahkan Data Dosen');
        return view('dosen.form',['action'=>"simpan"]);
    }

    public function simpan(FormRequestStore $request)
    {
        $dosen = new Dosen;
        $dosen->username = $request->username;
        $dosen->nama = $request->nama;
        $dosen->jenis_kelamin = $request->jenis_kelamin;
        $dosen->email = $request->email;
        $dosen->password = $request->password;
        $file_name = $request->file('file_name');
        $ext = $file_name->getClientOriginalName();
        $newName = $ext;
        $file_name->move('uploads/gambar',$newName);
        $dosen->file_name = $newName;       
        $dosen->save();
        return redirect('/dosen')->with(['success' => 'Data Dosen Berhasil Di Tambah']);
    }

    public function show($id)
    {
        $dosen = Dosen::find($id);
        return view('dosen.edit',['action'=>"delete",'dosen'=>$dosen]);
    }
  
    public function edit($id)
    {
       \LogActivity::addToLog('Admin Mengedit Data Dosen');
        $dosen = Dosen::find($id);
        return view('dosen.edit',['action'=>"update",'dosen'=>$dosen]);
    }
   
    public function update(Request $request, $id)
    {
        $dosen = dosen::find($id);
        $dosen->username = $request->username;
        $dosen->nama = $request->nama;
        $dosen->jenis_kelamin = $request->jenis_kelamin;
        $dosen->email = $request->email;
        $dosen->password = $request->password;
         if (empty($request->file('file_name'))){
            $dosen->file_name = $dosen->file_name;
        }
        else{
           
            $file_name = $request->file('file_name');
            $ext = $file_name->getClientOriginalName();
            $newName = $ext;
            $file_name->move('uploads/gambar',$newName);
            $dosen->file_name = $newName;
        }
        $dosen->save();
        return redirect('/dosen')->with(['success' => 'Data Dosen Berhasil Di Edit']);
    }
    
    public function deleteGroup(Request $request)
    {
        \LogActivity::addToLog('Admin Menghapus Data Dosen');
        $kelas = Dosen::find($request->id);
        $kelas->delete();
        
        return $kelas ? response()->json(['message' => 'Dosen Berhasil Di Hapus'], 200)
                          : response()->json(['message' => 'Dosen Gagal Di Hapus'], 400);
    }


}
