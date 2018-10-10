<?php

namespace App\Http\Controllers;

use App\Materi;
use Illuminate\Http\Request;
use App\MatakuliahKelas;
use App\MateriFile;
use Auth;

class DownloadController extends Controller
{
    public function downfunc($matakuliah_id,$kelas_id,$angkatan_id)
    {
    	\LogActivity::addToLog('Mahasiswa Membuka Materi');
   		$downloads = Materi::orderBy('matakuliah_id','kelas_id','angkatan_id')
         ->where('matakuliah_id','=',$matakuliah_id)  
         ->where('kelas_id','=',$kelas_id)            
         ->where('angkatan_id','=',$angkatan_id)       
         ->get();          
      

   		return view('download.viewfile',['downloads'=>$downloads]);  

    }

  
    
}
