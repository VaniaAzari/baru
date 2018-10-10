@extends('layouts.layouts3')

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="alert alert-info">
            Selamat datang di <b> E-learning Politeknik Caltex Riau </b><br>
            <b> Alamat</b>: Jl. Umban Sari ( Patin ) No. 1, Rumbai, Kota Pekanbaru, Riau 28265
            &nbsp; <b>  Phone </b>: (0761) 53939
            </div>
        </div>
    </div>
        <div class="col-md-3 col-sm-3 col-xs-6">
            <div class="dashboard-div-wrapper bk-clr-two" style="height: 134px;width: 230px;">
                <div class="dashboard-div-wrapper bk-clr-three" style=" height: 84px; width: 211px;"> 
                <h1><b>{{ $hitungpengumuman }}</b></h1></div>
                <h5> <a href="{{ URL::to('/pengumuman') }} "><font color="#fffff">Pengumuman</font></a> </h5>                    
                </div>
            </div>
        <div class="col-md-3 col-sm-3 col-xs-6">
            <div class="dashboard-div-wrapper bk-clr-two" style="height: 134px;width: 230px;">
                <div class="dashboard-div-wrapper bk-clr-three" style=" height: 84px; width: 211px;"> 
                <h1><b>{{ $hitungmateri }}</b></h1></div>
                <h5> <a href="{{ URL::to('/bahanajardosen') }}"><font color="#fffff">Matakuliah</font></a> </h5>
                </div>
            </div>
        <div class="col-md-3 col-sm-3 col-xs-6">
            <div class="dashboard-div-wrapper bk-clr-two" style="height: 134px;width: 230px;">
                <div class="dashboard-div-wrapper bk-clr-three" style=" height: 84px; width: 211px;"> 
                <h1><b>{{ $hitungtugas }}</b></h1></div>
                <h5><a href="{{ URL::to('/bahanajartugasdosen') }}"> <font color="#fffff">Tugas</font></a> </h5>
                </div>
            </div>
        <div class="col-md-3 col-sm-3 col-xs-6">
            <div class="dashboard-div-wrapper bk-clr-two" style="height: 134px;width: 230px;">
                <div class="dashboard-div-wrapper bk-clr-three" style=" height: 84px; width: 211px;">                     
                <h1><b>{{ $hitungkuis }}</b></h1></div>
                <h5> <a href="{{ route('kuis.group') }}"><font color="#fffff">Kuis</font></a> </h5>
                </div>
            </div>
            <br><br><br><br><br><br>
        <div class="notice-board">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        Pengumuman
                        </div>
                            <div class="panel-body">
                                @foreach($pengumuman as $key => $value)
                                   <span class="glyphicon glyphicon-comment  text-warning" ></span>
                                    <b>{{ $value->judul }}</b>
                                    <h5>{{ $value->dosen->nama }}</h5>
                                     <h5>Kelas: {{ $value->kelas->nama_kelas }}</h5>
                                    <h5>{!! $value->created_at->format('d/M/Y')!!}</h5>
                                    <h5>{!! $value->isi !!}</h5>                                
                                @endforeach                                
                            </div>
                    </div>
                </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            Forum
                            </div>
                                <div class="panel-body">
                                <span class="glyphicon glyphicon-comment  text-warning" ></span> &nbsp;  <a href="{{ URL::to('/chat') }}">Forum </a>
                                </div>                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            Log History
                            </div>
                                <div class="panel-body">
                                Waktu Terakhir Login, {{ auth()->user()->last_sign_in_at }} <br>                                     
                                Waktu Sekarang Login, {{ auth()->user()->current_sign_in_at }} 
                                </div>                            
                        </div>
                    </div>
            </div>
        </div>          
@endsection