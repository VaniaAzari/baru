<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dosen;
use App\Mahasiswa;
use App\Kelas;
use App\Angkatan;
use App\Prodi;
use Auth;

class ProfilController extends Controller
{
    public function profileDosen()
    {
    	 $dosen = Dosen::where('nama', Auth::guard('dosen')->user()->nama)->get();
    	 return view('profile.indexdosen',['dosen'=>$dosen]);
    }

    public function profileMhs()
    {
    	$mhs = Mahasiswa::where('nama', Auth::guard('mahasiswa')->user()->nama)->get();
    	return view('profile.indexmhs',['mhs'=>$mhs]);
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $kelas = Kelas::all(['id', 'nama_kelas']);
        $prodi = Prodi::all(['id', 'nama_prodi']);
        $angkatan = Angkatan::all(['id', 'nama_angkatan']);
        return view('profile.editMhs',['action'=>"update",'mahasiswa'=>$mahasiswa,'kelas'=>$kelas,'prodi'=>$prodi,'angkatan'=>$angkatan]);
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
            unlink('uploads/gambar/'.$mahasiswa->file_name); //menghapus file lama
            $file_name = $request->file('file_name');
            $ext = $file_name->getClientOriginalName();
            $newName = $ext;
            $file_name->move('uploads/gambar',$newName);
            $mahasiswa->file_name = $newName;
        }
        $mahasiswa->save();
        return redirect('/profile');
    }

    public function editDosen($id)
    {
        $dosen = Dosen::find($id);
        return view('profile.editDosen',['action'=>"update",'dosen'=>$dosen]);
    }
   
    public function updateDosen(Request $request, $id)
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
            unlink('uploads/gambar/'.$dosen->file_name); //menghapus file lama
            $file_name = $request->file('file_name');
            $ext = $file_name->getClientOriginalName();
            $newName = $ext;
            $file_name->move('uploads/gambar',$newName);
            $dosen->file_name = $newName;
        }
        $dosen->save();
        return redirect('/profiledosen');
    }
   
}
