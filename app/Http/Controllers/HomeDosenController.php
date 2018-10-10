<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dosen;
use App\MatakuliahKelas;
use App\Tugas;
use App\Pengumuman;
use Auth;
use App\GroupKuis;

class HomeDosenController extends Controller
{
     public function hitungdosen()
    {
        $dosen = Dosen::all();        
        $hitungmateri = MatakuliahKelas::where('dosen_id', Auth::guard('dosen')->user()->id)->count();
        $hitungtugas = Tugas::where('dosen_id', Auth::guard('dosen')->user()->id)->count();
        $pengumuman = Pengumuman::where('dosen_id', Auth::guard('dosen')->user()->id)->get();
        $hitungkuis = GroupKuis::where('dosen_id', Auth::guard('dosen')->user()->id)->count();
        $hitungpengumuman = Pengumuman::where('dosen_id', Auth::guard('dosen')->user()->id)->count();      
        return view('homedosen.indexdosen',['dosen'=>$dosen,'hitungtugas'=>$hitungtugas,'hitungmateri'=>$hitungmateri,
            'pengumuman'=>$pengumuman,'hitungpengumuman'=>$hitungpengumuman,'hitungkuis'=>$hitungkuis]);    
    }

    public function help()
    {
        return view('help.helpdosen');
    }

      public function logActivity()
    {
        $logs = \LogActivity::logActivityLists();
        return view('logActivity2',compact('logs'));
    }
}
