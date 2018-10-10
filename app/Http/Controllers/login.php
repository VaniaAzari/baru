<?php

namespace App\Http\Controllers;
use App\admin;
use App\dosen;
use App\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class login extends Controller
{
    function masuk(Request $kiriman){
    	$data1 = admin::where('username',$kiriman->username)->where('password',$kiriman->password)->get();
    	$data2 = dosen::where('username',$kiriman->username)->where('password',$kiriman->password)->get();
    	$data3 = mahasiswa::where('username',$kiriman->username)->where('password',$kiriman->password)->get();

    if(count($data1)>0){
    	//berhasil login untuk admin
    	Auth::guard('admin')->LoginUsingId($data1[0]['id']);
    	return redirect('/admin');

    }else if(count($data2)>0){
    	//berhasil login untuk dosen
    	Auth::guard('dosen')->LoginUsingId($data2[0]['id']);
    	return redirect('/homedosen');

    }elseif(count($data3)>0){
    	//berhasil login untuk mahasiswa
    	Auth::guard('mahasiswa')->LoginUsingId($data3[0]['id']);
    	return redirect('/homemahasiswa');

    }else{
    	//gagal login
    	return redirect('/');
    }

    }

    function keluar(){

    	if(Auth::guard('admin')->check()){
    		Auth::guard('admin')->logout();
    	}
    	else if(Auth::guard('dosen')->check()){
    		Auth::guard('dosen')->logout();
    	}
    	else if(Auth::guard('mahasiswa')->check()){
    		Auth::guard('mahasiswa')->logout();
    	}
    	return redirect('/');
    }
}
