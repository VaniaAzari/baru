<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Prodi;
use App\Kelas;
use App\Angkatan;
use Yajra\Datatables\Datatables;
use App\Http\Requests\FormRequestMhsStore;

class MahasiswaController extends Controller
{
    public function index()
    {       
        return view('mahasiswa.index');
    }

    public function getdata(Mahasiswa $mahasiswa)
    {
        $mahasiswa = Mahasiswa::get();
        return Datatables::of($mahasiswa)         
        ->addColumn('kelas_id', function ($data) {
            return $data->kelas->nama_kelas;
        })
        ->addColumn('prodi_id', function ($data) {
            return $data->prodi->nama_prodi;
        })
         ->addColumn('angkatan_id', function ($data) {
            return $data->angkatan->nama_angkatan;
        })
        ->addColumn('action', function ($data) {
            return '<a href="/mahasiswa/edit/'.$data->id.'" class="btn btn-sm btn-warning" ><i class="fa fa-edit"></i>&nbsp;Edit</a>
                   <a href="#" class="btn btn-sm btn-danger btn-icon btn-circle delete">
                        <i class="fa fa-trash"></i>&nbsp;Hapus
                    </a>';
        })
        ->editColumn('file_name', function ($data) {
        return $data->file_name ? '<img src="/uploads/gambar/'.$data->file_name.'" width="70px" height="90px">'
        : null ;
        })
        ->rawColumns(['action','file_name', 'kelas_id', 'prodi_id', 'angkatan_id'])->addIndexColumn()->make(true);
    }
   
    public function create()
    {
         \LogActivity::addToLog('Admin Menambahkan Data Mahasiswa');
        $kelas = Kelas::all(['id', 'nama_kelas']);
        $prodi = Prodi::all(['id', 'nama_prodi']);
        $angkatan = Angkatan::all(['id', 'nama_angkatan']);
        return view('mahasiswa.form',['action'=>"simpan",'kelas'=>$kelas,'prodi'=>$prodi,'angkatan'=>$angkatan]);
    }

    public function simpan(FormRequestMhsStore $request)
    {
        $mahasiswa = new Mahasiswa;
        $mahasiswa->username = $request->username;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->jenis_kelamin = $request->jenis_kelamin;
        $mahasiswa->prodi_id = $request->prodi_id;
        $mahasiswa->kelas_id = $request->kelas_id;
        $mahasiswa->angkatan_id = $request->angkatan_id;
        $mahasiswa->password = $request->password;
         $file_name = $request->file('file_name');
        $ext = $file_name->getClientOriginalName();
        $newName = $ext;
        $file_name->move('uploads/gambar',$newName);
        $mahasiswa->file_name = $newName;
        $mahasiswa->save();
        return redirect('/mahasiswa')->with(['success' => 'Data Mahasiswa Berhasil Di Tambah']);
    }    
  
    public function edit($id)
    {
        \LogActivity::addToLog('Admin Mengedit Data Mahasiswa');
        $mahasiswa = Mahasiswa::find($id);
        $kelas = Kelas::all(['id', 'nama_kelas']);
        $prodi = Prodi::all(['id', 'nama_prodi']);
        $angkatan = Angkatan::all(['id', 'nama_angkatan']);
        return view('mahasiswa.edit',['action'=>"update",'mahasiswa'=>$mahasiswa,'kelas'=>$kelas,'prodi'=>$prodi,'angkatan'=>$angkatan]);
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->username = $request->username;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->jenis_kelamin = $request->jenis_kelamin;
        $mahasiswa->prodi_id = $request->prodi_id;
        $mahasiswa->kelas_id = $request->kelas_id;
        $mahasiswa->angkatan_id = $request->angkatan_id;
        $mahasiswa->password = $request->password;
        if (empty($request->file('file_name'))){
            $mahasiswa->file_name = $mahasiswa->file_name;
        }
        else{
           
            $file_name = $request->file('file_name');
            $ext = $file_name->getClientOriginalName();
            $newName = $ext;
            $file_name->move('uploads/gambar',$newName);
            $mahasiswa->file_name = $newName;
        }
        $mahasiswa->save();
        return redirect('/mahasiswa')->with(['success' => 'Data Mahasiswa Berhasil Di Edit']);
    }  
      
    public function deleteGroup(Request $request)
    {
        \LogActivity::addToLog('Admin Mengahpus Data Mahasiswa');
        $mahasiswa = Mahasiswa::find($request->id);
        $mahasiswa->delete();
        
        return $mahasiswa ? response()->json(['message' => 'Mahasiswa Berhasil Di Hapus'], 200)
                          : response()->json(['message' => 'Mahasiswa Gagal Di Hapus'], 400);
    }
 
}
