<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\MatakuliahKelas;
use App\Materi;
use App\Tugas;
use App\Pengumuman;
use Auth;
use App\Matakuliah;
use App\GroupKuis;

class HomeMahasiswaController extends Controller
{
    public function hitungmahasiswa()
    {
        $mahasiswa = Mahasiswa::all();       
        $hitungmatakuliah = MatakuliahKelas::where('kelas_id', Auth::guard('mahasiswa')->user()->kelas_id)
        ->where('angkatan_id', Auth::guard('mahasiswa')->user()->angkatan_id)
        ->count();
        $hitungmateri = Materi::where('kelas_id', Auth::guard('mahasiswa')->user()->kelas_id)
        ->where('angkatan_id', Auth::guard('mahasiswa')->user()->angkatan_id)            
        ->count();         
        $hitungtugas = Tugas::where('kelas_id', Auth::guard('mahasiswa')->user()->kelas_id)
        ->where('angkatan_id', Auth::guard('mahasiswa')->user()->angkatan_id)        
        ->count();
        $hitungkuis = GroupKuis::where('id_kelas', Auth::guard('mahasiswa')->user()->kelas_id)
        ->where('angkatan_id', Auth::guard('mahasiswa')->user()->angkatan_id)    
        ->count();
        $pengumuman = Pengumuman::where('kelas_id', Auth::guard('mahasiswa')->user()->kelas_id)
        ->where('angkatan_id', Auth::guard('mahasiswa')->user()->angkatan_id)    
        ->get();
        return view('homemahasiswa.indexmahasiswa',['mahasiswa'=>$mahasiswa,'hitungtugas'=>$hitungtugas,'hitungmateri'=>$hitungmateri,
            'hitungmatakuliah'=>$hitungmatakuliah,'pengumuman'=>$pengumuman,'hitungkuis'=>$hitungkuis]);    
    }

    public function help()
    {
        return view('help.helpmhs');
    }

   
}
