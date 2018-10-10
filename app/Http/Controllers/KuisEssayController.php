<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GroupKuisEssay;
use App\Kelas;
use App\Angkatan;
use App\Matakuliah;
use App\KuisEssay;
use Yajra\Datatables\Datatables;
use Auth;
use App\KuisJawabanEssay;
use Session;
use App\Http\Requests\FormRequestNilai;

class KuisEssayController extends Controller
{
     public function indexGroup(Kelas $kelas, Matakuliah $matakuliah, Angkatan $angkatan)
    {
        $kelasList = Kelas::get();
        $matkulList = Matakuliah::get();
        $angkatanList = Angkatan::get();
        return view('KuisEssay.index')
            ->with('kelasList',$kelasList)
            ->with('angkatanList',$angkatanList)
            ->with('matkulList',$matkulList);
    }

    public function saveGroup(Request $request)
    {
        \LogActivity::addToLog('Dosen Menambahkan Data Kuis Essay');
        $groupKuis = new GroupKuisEssay;
        $groupKuis->name = $request->name;
        $groupKuis->kelas_id = $request->kelas_id;
        $groupKuis->angkatan_id = $request->angkatan_id;
        $groupKuis->dosen_id = Auth::guard('dosen')->user()->id;
        $groupKuis->matkul_id = $request->matkul_id;
        $groupKuis->jumlah_soal = $request->jumlah_soal;
        $groupKuis->save();

        return $groupKuis ? response()->json(['message' => 'Group Kuis Berhasil Di Tambah'], 200)
                          : response()->json(['message' => 'Group Kuis Gagal Di Tambah'], 400);
    }

    public function listGroup(GroupKuisEssay $groupKuis)
    {
        $data = GroupKuisEssay::where('dosen_id', Auth::guard('dosen')->user()->id)->get();
        return Datatables::of($data)
        ->addColumn('kelas', function ($model) {
            return $model->kelas->nama_kelas;
        })
         ->addColumn('angkatan', function ($model) {
            return $model->angkatan->nama_angkatan;
        })
        ->addColumn('matakuliah', function ($model) {
            return $model->matkul->nama_matkul;
        })
        ->addColumn('action', function ($model) {
            return '<a href="'.route("kuisessay", ['id' => $model->id]).'" class="btn btn-info btn-icon btn-circle edit">
                        <i class="fa fa-newspaper-o"></i>&nbsp;Tambah Soal
                    </a>
                    <a href="/kuisessay/detail/'.$model->id.'" 
                        class="btn btn-success" ><span class="glyphicon glyphicon-tasks"></span>&nbsp;Detail
                        </a>
                    <a href="#" class="btn btn-warning btn-icon btn-circle edit">
                        <i class="fa fa-edit"></i>&nbsp;Edit
                    </a>
                  
                    <a href="#" class="btn btn-danger btn-icon btn-circle delete">
                        <i class="fa fa-trash"></i>&nbsp;Hapus
                    </a>';
        })->addIndexColumn()->make(true);
    }

    public function updateGroup(Request $request)
    {
        \LogActivity::addToLog('Dosen Mengedit Data Kuis Essay');
        $groupKuis = GroupKuisEssay::find($request->id);
        $groupKuis->name = $request->name;
        $groupKuis->kelas_id = $request->kelas_id;
        $groupKuis->angkatan_id = $request->angkatan_id;
        $groupKuis->matkul_id = $request->matkul_id;
        $groupKuis->jumlah_soal = $request->jumlah_soal;
        $groupKuis->save();

        return $groupKuis ? response()->json(['message' => 'Group Kuis Berhasil Di Edit'], 200)
                          : response()->json(['message' => 'Group Kuis Gagal Di Edit'], 400);
    }

    public function deleteGroup(Request $request)
    {
        \LogActivity::addToLog('Dosen Menghapus Data Kuis Essay');
        $kelas = GroupKuisEssay::find($request->id);
        $kelas->delete();
        
        return $kelas ? response()->json(['message' => 'Group Kuis Berhasil Di Hapus'], 200)
                          : response()->json(['message' => 'Group Kuis Gagal Di Hapus'], 400);
    }

    public function indexKuis($id)
    {
      
        return view('KuisEssay.indexkuis', compact('id'));
    }

    public function saveKuis(Request $request)
    {
        \LogActivity::addToLog('Dosen Menambahkan Data Pertanyaan Kuis Essay');
        $kuis = new KuisEssay;
        $kuis->pertanyaan = $request->pertanyaan;
        $kuis->group_kuis_id = $request->group_kuis_id;
        $kuis->save();
        
        return $kuis ? response()->json(['message' => 'Kuis Berhasil Di Tambah'], 200)
                          : response()->json(['message' => 'Kuis Gagal Di Tambah'], 400);
    }

    public function listKuis(KuisEssay $kuis,$id)
    {
        
        $data = KuisEssay::where('group_kuis_id','=',$id)->get(); 
        return Datatables::of($data)    
      
        ->addColumn('action', function ($model) {
            return '<a href="#" class="btn btn-warning btn-icon btn-circle edit">
                        <i class="fa fa-edit"></i>&nbsp;Edit
                    </a>
            		<a href="#" class="btn btn-danger btn-icon btn-circle delete">
                        <i class="fa fa-trash"></i>&nbsp; Hapus
                    </a>';
        })->addIndexColumn()->make(true);
    }

    public function updateKuis(Request $request)
    {
        \LogActivity::addToLog('Dosen Mengedit Data Pertanyaan Kuis Essay');
        $kuis = KuisEssay::find($request->id);
        $kuis->pertanyaan = $request->pertanyaan;
        $kuis->save();

        return $kuis ? response()->json(['message' => 'Group Kuis Berhasil Di Edit'], 200)
                          : response()->json(['message' => 'Group Kuis Gagal Di Edit'], 400);
    }

    public function deleteKuis(Request $request,KuisEssay $kuis)
    {
        \LogActivity::addToLog('Dosen Menghapus Data Pertanyaan Kuis Essay');
        $kuis = KuisEssay::findOrFail($request->id);  
        $kuis->delete();

        return $kuis ? response()->json(['message' => 'Kuis Berhasil Di Hapus'], 200)
                          : response()->json(['message' => 'Kuis Gagal Di Hapus'], 400);
    }

      public function indexKuisMahasiswa(GroupKuisEssay $groupKuis)
    {
        $listKuis = GroupKuisEssay::where('kelas_id', Auth::user()->kelas_id)
        ->where('angkatan_id', Auth::user()->angkatan_id)
        ->get();
        return view('KuisEssayMahasiswa.index')
            ->with('listkuis',$listKuis);
    }

    public function indexSoalMahasiswa (Request $request, $id)
    {
        \LogActivity::addToLog('Mahasiswa Melihat Kuis Essay');
       $list = KuisEssay::where('group_kuis_id', $id)->get();       
       $listessay = KuisEssay::find($id);
       return view ('KuisEssayMahasiswa.indexkuis',['action'=>"update",'listessay'=>$listessay,'list'=>$list]);
    }

    
    public function update(Request $request, $id)
    {
         \LogActivity::addToLog('Mahasiswa Mengerjakan Kuis Essay');
        $listessay = KuisEssay::find($id);
        $listessay = new KuisJawabanEssay;
        $listessay->mahasiswa_id = Auth::guard('mahasiswa')->user()->id;
        $listessay->group_kuis_id = $request->group_kuis_id;
        $listessay->komentar = $request->komentar;
        $listessay->save();
        return redirect()->route('kuisessay.mahasiswa.soal', [$id]);
        

    }

    public function detail($id)
    {
         \LogActivity::addToLog('Dosen Melihat Hasil Kuis Essay');
         $groupKuis = GroupKuisEssay::find($id);
         $jawaban = KuisJawabanEssay::orderBy('group_kuis_id')
         ->where('group_kuis_id','=',$id)->get();
         $soal = KuisEssay::orderBy('group_kuis_id')
         ->where('group_kuis_id','=',$id)->get();

         return view('kuisessay.detail',['groupKuis'=>$groupKuis,'jawaban'=>$jawaban,'soal'=>$soal]);
    }

    public function editnilai($id)
    {
         \LogActivity::addToLog('Dosen Menambah Nilai Kuis Essay');
        $kuisjawaban = KuisJawabanEssay::find($id);       
        return view('kuisessay.nilai',['action'=>"updatenilai",'kuisjawaban'=>$kuisjawaban]);
    }

    public function updatenilai(FormRequestNilai $request, $id)
    {
        $kuisjawaban = KuisJawabanEssay::find($id);       
        $kuisjawaban->nilai = $request->nilai;
        $kuisjawaban->save();
        return redirect()->route('kuis.group.essay')->with('status', 'Nilai Berhasil Di Save');
    } 

    public function selesaiujian()
    {
        return view('KuisEssayMahasiswa.selesai');
    }

     public function detailnilai($id)
    {
         \LogActivity::addToLog('Mahasiswa Melihat Hasil Kuis Essay');
         $soal = KuisEssay::orderBy('group_kuis_id')
         ->where('group_kuis_id','=',$id)->get();
         $groupKuis = GroupKuisEssay::find($id);
         $jawaban = KuisJawabanEssay::orderBy('group_kuis_id')
         ->where('mahasiswa_id', Auth::guard('mahasiswa')->user()->id)
         ->where('group_kuis_id','=',$id)->get();

         return view('KuisEssayMahasiswa.detail',['groupKuis'=>$groupKuis,'jawaban'=>$jawaban,'soal'=>$soal]);
    }


}

        
