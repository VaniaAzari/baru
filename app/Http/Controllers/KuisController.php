<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GroupKuis;
use App\Kelas;
use App\Angkatan;
use App\Kuis;
use App\KuisJawaban;
use App\Matakuliah;
use Yajra\Datatables\Datatables;
use Auth;
use Session;

class KuisController extends Controller
{
    public function indexGroup(Kelas $kelas, Matakuliah $matakuliah, Angkatan $angkatan)
    {
        $kelasList = Kelas::get();
        $matkulList = Matakuliah::get();
        $angkatanList = Angkatan::get();
        return view('Kuis.index')
            ->with('kelasList',$kelasList)
            ->with('angkatanList',$angkatanList)
            ->with('matkulList',$matkulList);
    }

    public function saveGroup(Request $request)
    {
        \LogActivity::addToLog('Dosen Menambah Data Kuis Pilihan Ganda');
        $groupKuis = new GroupKuis;
        $groupKuis->name = $request->name;
        $groupKuis->id_kelas = $request->id_kelas;
        $groupKuis->angkatan_id = $request->angkatan_id;
        $groupKuis->dosen_id = Auth::guard('dosen')->user()->id;
        $groupKuis->id_matakuliah = $request->id_matakuliah;
        $groupKuis->jumlah_soal = $request->jumlah_soal;
        $groupKuis->save();

        return $groupKuis ? response()->json(['message' => 'Group Kuis Berhasil Di Save'], 200)
                          : response()->json(['message' => 'Group Kuis Gagal Di Save'], 400);

    }

    public function listGroup(GroupKuis $groupKuis)
    {
        $data = GroupKuis::where('dosen_id', Auth::guard('dosen')->user()->id)->get();
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
          ->addColumn('jumlah', function ($model) {
            return $model->jumlah_soal;
        })
        ->addColumn('action', function ($model) {
            return '<a href="'.route("kuis", ['id' => $model->id]).'" class="btn btn-info btn-icon btn-circle edit">
                        <i class="fa fa-newspaper-o"></i>&nbsp;Tambah Soal
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
        \LogActivity::addToLog('Dosen Mengedit Data Kuis Pilihan Ganda');
        $groupKuis = GroupKuis::find($request->id);
        $groupKuis->name = $request->name;
        $groupKuis->id_kelas = $request->id_kelas;
        $groupKuis->angkatan_id = $request->angkatan_id;
        $groupKuis->id_matakuliah = $request->id_matakuliah;
        $groupKuis->jumlah_soal = $request->jumlah_soal;
        $groupKuis->save();

        return $groupKuis ? response()->json(['message' => 'Group Kuis Berhasil Di Update'], 200)
                          : response()->json(['message' => 'Group Kuis Gagal Di Update'], 400);
    }

    public function deleteGroup(Request $request)
    {
        \LogActivity::addToLog('Dosen Menghapus Data Kuis Pilihan Ganda');
        $kelas = GroupKuis::find($request->id);
        $kelas->delete();
        
        return $kelas ? response()->json(['message' => 'Group Kuis Berhasil Di Delete'], 200)
                          : response()->json(['message' => 'Group Kuis Gagal Di Delete'], 400);
    }

    public function indexKuis($id)
    {
      
        return view('Kuis.indexkuis', compact('id'));
    }

    public function saveKuis(Request $request)
    {
        \LogActivity::addToLog('Dosen Menambahkan Data Pertanyaan dan Jawaban Kuis');
        $kuis = new Kuis;
        $kuis->pertanyaan = $request->pertanyaan;
        $kuis->group_kuis_id = $request->group_kuis_id;
        $kuis->save();

        foreach($request->jawaban as $key => $jawaban)
        {
            $kuisJawaban = New KuisJawaban;
            $kuisJawaban->value = $jawaban['value'];
            $kuisJawaban->ket = $request->status[$key]['ket'] == 'true' ? 1 : 0;
            $kuisJawaban->kuis_id = $kuis->id;
            $kuisJawaban->save();
        }

        return $kuisJawaban ? response()->json(['message' => 'Kuis Berhasil Di Save'], 200)
                          : response()->json(['message' => 'Kuis Gagal Di Save'], 400);
    }

    public function listKuis(Kuis $kuis, KuisJawaban $kuisJawaban,$id)
    {
        
        $data = Kuis::where('group_kuis_id','=',$id)->get(); 
        return Datatables::of($data)
        ->addColumn('jawaban', function ($model) {
            $jwbn = KuisJawaban::where('kuis_id',$model->id)->get();
            $ab = [];
            foreach($jwbn as $dt)
            {
                if($dt->ket)
                {
                    $val = '(Benar)';
                } else {
                    $val = ' ';
                }
                array_push($ab, $dt->value. ' '.$val);
            }
            return $ab;
        })
        ->addColumn('action', function ($model) {
            return '<a href="#" class="btn btn-danger btn-icon btn-circle delete">
                        <i class="fa fa-trash"></i>&nbsp; Hapus
                    </a>';
        })->addIndexColumn()->make(true);
    }

    public function deleteKuis(Request $request,Kuis $kuis, KuisJawaban $kuisJawaban)
    {
        \LogActivity::addToLog('Dosen Menghapus Data Pertanyaan dan Jawaban Kuis');
        $kuis = Kuis::findOrFail($request->id);
        $deleteJwbn = KuisJawaban::where('kuis_id',$kuis->id)->get();

        foreach($deleteJwbn as $delete)
        {
            $delete->delete();
        }
        $kuis->delete();

        return $kuis ? response()->json(['message' => 'Kuis Berhasil Di Delete'], 200)
                          : response()->json(['message' => 'Kuis Gagal Di Delete'], 400);
    }

    public function indexKuisMahasiswa(GroupKuis $groupKuis)
    {
        $listKuis = GroupKuis::where('id_kelas', Auth::user()->kelas_id)
        ->where('angkatan_id', Auth::user()->angkatan_id)
        ->get();
        return view('KuisMahasiswa.index')
            ->with('listkuis',$listKuis);
    }

    public function indexKuisSoalMahasiswa(Request $request,Kuis $kuis, $id)
    {
        \LogActivity::addToLog('Mahasiswa Mengerjakan Kuis Pilihan Ganda');
        $list = Kuis::where('group_kuis_id', $id)->with(array('kuisJawaban'=>function($query){
            $query->select('id','value','ket','kuis_id');
        }))->get();
           
        $key = count($list);
        $currentKey = $request->session()->get('currentKey');
        if(!$currentKey)
        {
            $arrayKey = 0;
        } else {
            $arrayKey = $currentKey;
        }
        if($key === $currentKey)
        {
            return view('KuisMahasiswa.indexselesai')
                ->with('correct',$request->session()->get('correct'))
                ->with('wrong',$request->session()->get('wrong'));
        }
        return view('KuisMahasiswa.indexkuis')
            ->with('listkuis', $list[$arrayKey]);
    }

    public function hitungJawaban(Request $request, KuisJawaban $kuisJawaban)
    {
        $getCorrect = $request->session()->get('correct');
        $getWrong = $request->session()->get('wrong');

        if(!$getCorrect)
        {
            $getCorrect = 0;
        }
        if(!$getWrong)
        {
            $getWrong = 0;
        }
        $checkAnswer = KuisJawaban::where('kuis_id', $request->id)
            ->where('value', $request->jawaban)->first();
        if($checkAnswer->ket == 1) {
            $nowCorrect = $getCorrect + 1 ;                    
            $request->session()->put('correct', $nowCorrect);
        } else {
            $nowWrong = $getWrong + 1;
            $request->session()->put('wrong', $nowWrong);
        }
        $checkSession = $request->session()->get('currentKey');
        if(!$checkSession)
        {
            $request->session()->put('currentKey', 1);
        } else {
            $request->session()->put('currentKey', $checkSession + 1);
        }

        return redirect()->route('kuis.mahasiswa.soal',['id' => $request->group_id]);
    }
}
