@extends('layouts.layouts4')

@section('content')
<section class="content">
	<h4 class="page-head-line">List Kuis Pilihan Ganda</h4>
	<div class="row">
		<div class="col-12">
			<div class="panel panel-default">
				<br>							
				<div class="panel-body" >
					<table class="table table-bordered table-striped table-hover" id="dataTable">
                        <thead>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Matakuliah</th> 
                            <th>Jumlah Soal</th>                     
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @if (!$listkuis->isEmpty()) 
                            @foreach($listkuis as $key => $kuis)
                                <tr>
                                    <td>{{ $key + 1}}</td>
                                    <td>{{ $kuis->name }}</td>
                                    <td>{{ $kuis->matkul->nama_matkul }}</td>
                                    <td>{{ $kuis->jumlah_soal }}</td>                                    
                                    <td><a href="{{ route('kuis.mahasiswa.soal', ['id' => $kuis->id] ) }}" class="btn btn-primary"><span class="glyphicon glyphicon-play"></span>&nbsp;Kerjakan</a></td>
                                </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td colspan="7"><center>No data available in table</center></td>
                                </tr>
                            @endif      
                        </tbody>
                    </table>                  
				</div>
			</div>
		</div>
	</div>	
</section>
@endsection