<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dosen;
use App\Mahasiswa;
use App\Kelas;
use App\Matakuliah;
use App\Pengumuman;

class HomeAdminController extends Controller
{         
    public function hitung()
    {
        $hitungdosen = Dosen::count();
        $hitungmahasiswa = Mahasiswa::count();
        $hitungkelas = Kelas::count();
    	$hitungmatakuliah = Matakuliah::count();
   		$pengumuman = Pengumuman::all(); 
        return view('home.index',['hitungdosen'=>$hitungdosen,'hitungmahasiswa'=>$hitungmahasiswa,
        	'hitungkelas'=>$hitungkelas,'hitungmatakuliah'=>$hitungmatakuliah,'pengumuman'=>$pengumuman]);          
    }

     public function help()
    {
        return view('help.helpadmin');
    }

     public function logActivity()
    {
        $logs = \LogActivity::logActivityLists();
        return view('logActivity',compact('logs'));
    }

   

    

   
}
