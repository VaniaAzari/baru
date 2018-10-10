<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materi;
use App\Matakuliah;
use App\MatakuliahKelas;
use App\Kelas;
use App\MateriFile;
use Auth;
use Yajra\Datatables\Datatables;
use App\Http\Requests\FormRequestMateriStore;

class MateriController extends Controller
{
    public function index($matakuliah_id,$kelas_id,$angkatan_id)
    {
          
            $matakuliahkelas = MatakuliahKelas::orderBy('matakuliah_id','kelas_id','angkatan_id')
            ->where('matakuliah_id','=',$matakuliah_id)
            ->where('kelas_id','=',$kelas_id)
            ->where('angkatan_id','=',$angkatan_id)
            ->where('dosen_id', Auth::guard('dosen')->user()->id)
            ->get();
            return view('materi.index',['matakuliahkelas'=>$matakuliahkelas], compact('matakuliah_id','kelas_id','angkatan_id'));    
    }

    public function getdata($matakuliah_id, $kelas_id, $angkatan_id)
    {
            $materi = Materi::orderBy('matakuliah_id','kelas_id','angkatan_id')
            ->where('matakuliah_id','=',$matakuliah_id)
            ->where('kelas_id','=',$kelas_id)
            ->where('angkatan_id','=',$angkatan_id)
            ->where('dosen_id', Auth::guard('dosen')->user()->id)
            ->get();
        return Datatables::of($materi)
        ->addColumn('action', function ($data) {
        return '<a href="/materi/detail/'.$data->id.'" class="btn btn-sm btn-info" ><i class="fa fa-edit"></i>&nbsp;File Materi</a>
                <a href="/materi/edit/'.$data->id.'/'.$data->matakuliah_id.'/'.$data->kelas_id.'/'.$data->angkatan_id.'" class="btn btn-sm btn-warning" ><i class="fa fa-edit"></i>&nbsp;Edit</a>
                <a href="#" class="btn btn-sm btn-danger btn-icon btn-circle delete">
                        <i class="fa fa-trash"></i>&nbsp;Hapus
                </a>';
        })
         ->addColumn('matakuliah_id', function ($data) {
        return $data->matakuliah->nama_matkul;
        })
        ->addColumn('kelas_id', function ($data) {
        return $data->kelas->nama_kelas;
        })
        ->addColumn('konten', function ($data) {
        return strip_tags( $data->konten ) ;
        })
             
       ->addIndexColumn()->make(true);
    }

   

    public function create($matakuliah_id,$kelas_id,$angkatan_id)
    {
        \LogActivity::addToLog('Dosen Menambahkan Data Materi');
       $matakuliahkelas = MatakuliahKelas::orderBy('matakuliah_id','kelas_id','angkatan_id')
            ->where('matakuliah_id','=',$matakuliah_id)
            ->where('kelas_id','=',$kelas_id)
            ->where('angkatan_id','=',$angkatan_id)
            ->where('dosen_id', Auth::guard('dosen')->user()->id)
            ->get();
        // $matakuliah = Matakuliah::all(['id', 'nama_matkul']);
        // $kelas = Kelas::all(['id', 'nama_kelas']);
        return view('materi.form',['action'=>"simpan",'matakuliahkelas'=>$matakuliahkelas],compact('matakuliah_id','kelas_id','angkatan_id'));
    }
  
    public function simpan (FormRequestMateriStore $request,$matakuliah_id,$kelas_id,$angkatan_id)
    { 
          
        $materi = Materi::create($request->all());  
        foreach ($request->photos as $photo) {
            $filenames = $photo->getClientOriginalName();
            $filename = $photo->move('photos',$filenames);                     
            MateriFile::create([
                'materi_id' => $materi->id,
                'filename' => $filenames
            ]);
        }
        return redirect()->route('materi', [$matakuliah_id,$kelas_id,$angkatan_id])->with('status', 'Data Materi Berhasil di Save');

    }  
  
    public function edit($id)
    {
        \LogActivity::addToLog('Dosen Mengedit Data Materi');
          $materi = Materi::find($id);        
          return view('materi.edit',['action'=>"update",'materi'=>$materi]);
    }
    
    public function update(Request $request, $id, $matakuliah_id,$kelas_id,$angkatan_id)
    {
       
        $materi = Materi::find($id);
        $materi->file_title = $request->file_title;       
        $materi->konten = $request->konten;   
        $materi->save();
        return redirect()->route('materi', [$matakuliah_id,$kelas_id,$angkatan_id])->with('status', 'Data Materi Berhasil di Update');
    }

     public function deleteGroup(Request $request)
    {
        \LogActivity::addToLog('Admin Menghapus Data Materi');
        $materi = Materi::find($request->id);
        $materi->delete();
        
        return $materi ? response()->json(['message' => 'Materi Berhasil Di Hapus'], 200)
                          : response()->json(['message' => 'Materi Gagal Di Hapus'], 400);
    }

    public function detail($id)
    {
        $materi = Materi::find($id);
        $materifile = MateriFile::where('materi_id','=',$id)->get();

        return view('materi.detail',['materi'=>$materi,'materifile'=>$materifile]);

    }

   

}
