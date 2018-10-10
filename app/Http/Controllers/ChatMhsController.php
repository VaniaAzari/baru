<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;
use App\ChatMhs;
use Auth;
use App\ChatDosen;


class ChatMhsController extends Controller
{
   
    public function listgroup(){
        $chatmhs = Chat::where('kelas_id', Auth::guard('mahasiswa')->user()->kelas_id)
        ->where('angkatan_id', Auth::guard('mahasiswa')->user()->angkatan_id)
        ->get();  
        return view('chatmhs.list',['chatmhs'=>$chatmhs]);
    }

    public function show($id)
    {
        $chatmhs = Chat::find($id);        
        return view('chatmhs.edit',['action'=>"delete",'chatmhs'=>$chatmhs]);
    }

    public function edit($kelas_id, $dosen_id, $id, $angkatan_id)
    {
        $chatmhs = Chat::find($id);
       
        $chatmhs3 = Chat::orderBy('id','kelas_id','dosen_id','angkatan_id')
         ->where('id', '=', $id)
         ->where('dosen_id', '=', $dosen_id)
         ->where('angkatan_id', '=', $angkatan_id)
        ->where('kelas_id', Auth::guard('mahasiswa')->user()->kelas_id)->get();   
        $chatmhs2 = ChatMhs::orderBy('kelas_id','chat_id','angkatan_id') 
        ->where('chat_id', '=', $id)      
        ->where('kelas_id', '=', $kelas_id)
        ->where('angkatan_id', '=', $angkatan_id)
        ->where('kelas_id', Auth::guard('mahasiswa')->user()->kelas_id)->get();  
        return view('chatmhs.edit',['action'=>"update",'chatmhs'=>$chatmhs,'chatmhs2'=>$chatmhs2,'chatmhs3'=>$chatmhs3]);
    }

    public function update(Request $request,$kelas_id, $dosen_id, $id, $angkatan_id )
    {
        \LogActivity::addToLog('Mahasiswa Menambahkan Pesan di Chat Forum');
        $chatmhs = Chat::find($id);
        $chatmhs = new ChatMhs;
        $chatmhs->mahasiswa_id = Auth::guard('mahasiswa')->user()->id;        
        $chatmhs->chat_id =  $request->id;
        $chatmhs->kelas_id = $request->kelas_id; 
        $chatmhs->angkatan_id = $request->angkatan_id;    
        $chatmhs->type = $request->type;        
        $chatmhs->komentar = $request->komentar;        
        $chatmhs->save();
        return redirect()->route('chatmhs.list', [$kelas_id, $dosen_id,$id, $angkatan_id]);
    }
}
