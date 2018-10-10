<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dosen;
use App\Kelas;
use App\Chat;
use App\ChatMhs;
use App\ChatDosen;
use Yajra\Datatables\Datatables;
use App\Http\Requests\FormRequestStore;
use Auth;
use App\Angkatan;
use Carbon;


class ChatController extends Controller
{
    public function index()
    {       
      
        return view('chat.index'); 
             
    }

    public function getdata(Chat $chat)
    {
        $chat = Chat::where('dosen_id', Auth::guard('dosen')->user()->id)->get();
        return Datatables::of($chat) 
        ->addColumn('topik', function ($data) {
                 return strip_tags($data->topik) ;
          })   
        ->addColumn('action', function ($data) {
        return '<a href="/chat/detail/'.$data->id.'/'.$data->kelas_id.'/'.$data->angkatan_id.'" class="btn btn-sm btn-primary" ><i class="fa fa-edit"></i>&nbsp;Buka Forum</a>
                <a href="/chat/edit/'.$data->id.'" class="btn btn-sm btn-warning" ><i class="fa fa-edit"></i>&nbsp;Edit</a>
                <a href="#" class="btn btn-sm btn-danger btn-icon btn-circle delete">
                        <i class="fa fa-trash"></i>&nbsp;Hapus
                </a>';
        })
         ->addColumn('kelas_id', function ($data) {
        return $data->kelas->nama_kelas;
        })
          ->addColumn('angkatan_id', function ($data) {
        return $data->angkatan->nama_angkatan;
        })
        ->addIndexColumn()->make(true);
    }  

    public function create()
    {
       \LogActivity::addToLog('Dosen Menambahkan Chat Forum');
        $kelas = Kelas::all(['id', 'nama_kelas']);
        $angkatan = Angkatan::all(['id', 'nama_angkatan']);
        return view('chat.form',['action'=>"simpan",'kelas'=>$kelas,'angkatan'=>$angkatan]);
    }
  
    public function simpan (Request $request)
    { 
          
        $chat = new Chat;
        $chat->topik= $request->topik;
        $chat->kelas_id= $request->kelas_id;
        $chat->angkatan_id= $request->angkatan_id;
        $chat->dosen_id= Auth::guard('dosen')->user()->id;        
        $chat->save();
         return redirect('/chat')->with(['success' => 'Data Forum Berhasil Di Save']);

    }
  
    public function edit($id)
    {
          \LogActivity::addToLog('Dosen Mengedit Chat Forum');
          $kelas = Kelas::all(['id', 'nama_kelas']);
          $angkatan = Angkatan::all(['id', 'nama_angkatan']);
          $chat = Chat::find($id);        
          return view('chat.edit',['action'=>"update",'chat'=>$chat,'kelas'=>$kelas,'angkatan'=>$angkatan]);
    }

    //    public function edit2($id, $kelas_id,$angkatan_id)
    // {
    //     $chatdosen = Chat::find($id);
    //     return view('chat.edit2',['action'=>"update2",'chatdosen'=>$chatdosen]);
    // }

 
       public function detail($id, $kelas_id,$angkatan_id)
    {
         
          $chat = Chat::find($id); 
          $chatmhs = ChatMhs::orderBy('kelas_id','chat_id','angkatan_id') 
           ->where('chat_id', '=', $id)        
           ->where('angkatan_id', '=', $angkatan_id)
           ->where('kelas_id', '=', $kelas_id)->get();
            $chatdosen = Chat::find($id);
                      
          return view('chat.detail',['chat'=>$chat,'chatmhs'=>$chatmhs,'action'=>"update2",'chatdosen'=>$chatdosen]);
    }
    
    public function update(Request $request, $id)
    {
       
        $chat = Chat::find($id);
        $chat->topik = $request->topik;       
        $chat->kelas_id = $request->kelas_id;
        $chat->angkatan_id = $request->angkatan_id;
        $chat->save();
        return redirect('/chat')->with(['success' => 'Data Forum Berhasil Di Update']);
    } 

     public function update2(Request $request, $id, $kelas_id,$angkatan_id)
    {
      \LogActivity::addToLog('Dosen Menambahkan Pesan di Chat Forum');
        $chatdosen = Chat::find($id);
        $chatdosen = new ChatMhs;
        $chatdosen->dosen_id = Auth::guard('dosen')->user()->id;
        $chatdosen->kelas_id = $request->kelas_id; 
        $chatdosen->angkatan_id = $request->angkatan_id; 
        $chatdosen->chat_id = $request->id; 
        $chatdosen->type = $request->type;           
        $chatdosen->komentar = $request->komentar;        
        $chatdosen->save();
         return redirect()->route('chat.list', [$id, $kelas_id,$angkatan_id]);
    }

      public function deleteGroup(Request $request)
    {
      \LogActivity::addToLog('Dosen Menghapus Chat Forum');
        $chat = Chat::find($request->id);
        $chat->delete();
        
        return $chat ? response()->json(['message' => 'Chat Berhasil Di Hapus'], 200)
                          : response()->json(['message' => 'Chat Gagal Di Hapus'], 400);
    }

}
