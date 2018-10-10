<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tugas;
use App\Kelas;
use App\Matakuliah;
use App\MatakuliahKelas;
use App\TugasMhs;
use Auth;
use Yajra\Datatables\Datatables;
use App\Http\Requests\FormRequestTugasStore;
use App\Http\Requests\FormRequestTugasMhsStore;
use PDF;

class TugasController extends Controller
{
    public function index($matakuliah_id,$kelas_id,$angkatan_id)
    {
      
        $matakuliahkelas = MatakuliahKelas::orderBy('matakuliah_id','kelas_id','angkatan_id')
            ->where('matakuliah_id','=',$matakuliah_id)
            ->where('kelas_id','=',$kelas_id)
            ->where('angkatan_id','=',$angkatan_id)
            ->get();       
        return view('tugas.index',['matakuliahkelas'=>$matakuliahkelas], compact('matakuliah_id','kelas_id','angkatan_id'));
    }

      public function getdata($matakuliah_id, $kelas_id, $angkatan_id)
    {
        $tugas = Tugas::orderBy('matakuliah_id','kelas_id','angkatan_id')
        ->where('matakuliah_id','=',$matakuliah_id)
        ->where('kelas_id','=',$kelas_id)
        ->where('angkatan_id','=',$angkatan_id)
        ->where('dosen_id', Auth::guard('dosen')->user()->id)
        ->get();
        return Datatables::of($tugas)
        ->addColumn('action', function ($data) {
        return ' <a href="/tugas/detail/'.$data->id.'/'.$data->matakuliah_id.'/'.$data->kelas_id.'/'.$data->angkatan_id.'/'.$data->tanggal_masuk.'" 
                class="btn btn-sm btn-info" ><span class="glyphicon glyphicon-tasks"></span>&nbsp;Detail</a>
                 <a href="/tugas/pdf/'.$data->matakuliah_id.'/'.$data->kelas_id.'/'.$data->tanggal_masuk.'/'.$data->angkatan_id.'" 
                class="btn btn-sm btn-success" ><img src="/img/pdf.png" width="15px">&nbsp;PDF</a>
                <a href="/tugas/edit/'.$data->id.'/'.$data->matakuliah_id.'/'.$data->kelas_id.'/'.$data->angkatan_id.'" class="btn btn-sm btn-warning" ><i class="fa fa-edit"></i>&nbsp;Edit</a>
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
        ->addColumn('tanggal_masuk', function ($data) {
        return date('d-m-Y', strtotime($data->tanggal_masuk));
        })
         ->addColumn('tanggal_akhir', function ($data) {
        return date('d-m-Y', strtotime($data->tanggal_akhir));
        })
             
       ->addIndexColumn()->make(true);
    }


    public function detail($id,$matakuliah_id,$kelas_id,$angkatan_id,$tanggal_masuk)
    {
        \LogActivity::addToLog('Dosen Melihat Data Tugas Mahasiswa');
        $tugas = Tugas::find($id);
        $tugasmahasiswa = TugasMhs::orderBy('matakuliah_id','kelas_id','angkatan_id')        
        ->where('matakuliah_id','=',$matakuliah_id)
        ->where('tanggal_masuk','=',$tanggal_masuk)
        ->where('kelas_id','=',$kelas_id)
        ->where('angkatan_id','=',$angkatan_id)
        ->get(); 
        $hitungmahasiswa = TugasMhs::orderBy('matakuliah_id','kelas_id')  
        ->where('tanggal_masuk','=',$tanggal_masuk)      
        ->where('matakuliah_id','=',$matakuliah_id)
        ->where('kelas_id','=',$kelas_id)
        ->where('angkatan_id','=',$angkatan_id)
        ->count();
      
        return view('tugas.detail',['action'=>"update",'tugas'=>$tugas,'tugasmahasiswa'=>$tugasmahasiswa,'hitungmahasiswa'=>$hitungmahasiswa]);
    }
    
    public function create($matakuliah_id,$kelas_id,$angkatan_id)
    {
        \LogActivity::addToLog('Dosen Menambahkan Data Tugas');
          $matakuliahkelas = MatakuliahKelas::orderBy('matakuliah_id','kelas_id','angkatan_id')
            ->where('matakuliah_id','=',$matakuliah_id)
            ->where('kelas_id','=',$kelas_id)
            ->where('angkatan_id','=',$angkatan_id)
            ->get();
        return view('tugas.form',['action'=>"simpan",'matakuliahkelas'=>$matakuliahkelas], compact('matakuliah_id','kelas_id','angkatan_id'));
    }

    public function simpan(FormRequestTugasStore $request,$matakuliah_id,$kelas_id,$angkatan_id)
    {
        $tugas = new Tugas;
        $tugas->matakuliah_id = $request->matakuliah_id;
        $tugas->kelas_id = $request->kelas_id;
        $tugas->angkatan_id = $request->angkatan_id;
        $tugas->konten = $request->konten;
        if (empty($request->file('file_name'))){
            $tugas->file_name = null;
        }
        else{
        $file_name = $request->file('file_name');
        $ext = $file_name->getClientOriginalName();
        $newName = $ext;
        $file_name->move('uploads/tugas',$newName);
        $tugas->file_name = $newName;
        }        
        $tugas->tanggal_masuk = $request->tanggal_masuk;
        $tugas->tanggal_akhir = $request->tanggal_akhir;
        $tugas->dosen_id =  Auth::guard('dosen')->user()->id; 
        $tugas->save();
       return redirect()->route('tugas', [$matakuliah_id,$kelas_id,$angkatan_id])->with('status', 'Data Tugas Berhasil Di Save');
    }  
 
    public function edit($id)
    {
        \LogActivity::addToLog('Dosen Mengedit Data Tugas');
        $tugas = Tugas::find($id);       
        return view('tugas.edit',['action'=>"update",'tugas'=>$tugas]);
    }
    
    public function update(Request $request, $id,$matakuliah_id,$kelas_id,$angkatan_id)
    {
        $tugas = Tugas::find($id);       
        $tugas->konten = $request->konten;
        if (empty($request->file('file_name'))){
            $tugas->file_name = $tugas->file_name;
        }
        else{
            // unlink('uploads/tugas/'.$tugas->file_name); //menghapus file lama
            $file_name = $request->file('file_name');
            $ext = $file_name->getClientOriginalName();
            $newName = $ext;
            $file_name->move('uploads/tugas',$newName);
            $tugas->file_name = $newName;
        }
        $tugas->tanggal_masuk = $request->tanggal_masuk;
        $tugas->tanggal_akhir = $request->tanggal_akhir;
        $tugas->save();
         return redirect()->route('tugas', [$matakuliah_id,$kelas_id,$angkatan_id])->with('status', 'Data Tugas Berhasil Di Update');
    }

    public function search(Request $request){
        $cari = $request->get('search');
        $tugas = Tugas::where('matakuliah_id','LIKE','%'.$cari.'%')->paginate(10);
        return view('tugas.index',['action'=>"cari",'tugas'=>$tugas]);
    }

    public function editnilai($id)
    {
        \LogActivity::addToLog('Dosen Mengelola Data Nilai Tugas Mahasiswa');
        $tugas = TugasMhs::find($id);       
        return view('tugas.edit2',['action'=>"updatenilai",'tugas'=>$tugas]);
    }

    public function updatenilai(Request $request, $id,$matakuliah_id,$kelas_id,$angkatan_id)
    {
        $tugas = TugasMhs::find($id);       
        $tugas->nilai = $request->nilai;
        $tugas->save();
        return redirect()->route('tugas', [$matakuliah_id,$kelas_id,$angkatan_id])->with('status', 'Nilai Berhasil Di Save');
    } 

        public function pdf($matakuliah_id,$kelas_id,$tanggal_masuk,$angkatan_id)
    {
       
        $tugasmahasiswa = TugasMhs::orderBy('tanggal_masuk','matakuliah_id','kelas_id')
        ->where('tanggal_masuk','=',$tanggal_masuk)
        ->where('matakuliah_id','=',$matakuliah_id)
        ->where('kelas_id','=',$kelas_id)
        ->where('angkatan_id','=',$angkatan_id)
        ->get(); 
      
         $pdf = PDF::loadView('tugas.coba', compact('tugasmahasiswa'));
        return $pdf->download('rekaptugasmhs.pdf');
        
    }

       public function deleteGroup(Request $request)
    {
        \LogActivity::addToLog('Dosen Menghapus Data Tugas');
        $tugas = Tugas::find($request->id);
        $tugas->delete();
        
        return $tugas ? response()->json(['message' => 'Tugas Berhasil Di Hapus'], 200)
                          : response()->json(['message' => 'Tugas Gagal Di Hapus'], 400);
    }


    

}
