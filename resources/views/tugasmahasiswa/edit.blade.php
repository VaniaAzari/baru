@extends('layouts.layouts4')

@section('content')

	<section class="content">
		<div class="row ">
			<div class="col-12">
				@if($errors->any())
				<div class="alert alert-danger">
					@foreach($errors->all() as $err)
					<li><span>{{ $err }}</span></li>
					@endforeach
				</div>
				@endif
				<form class="form-horizontal" method="POST" action="/tugasmahasiswa/{{ $action }}{{($action!='edit')? '/'.$tugasmahasiswa['id'] : ''}}{{($action!='edit')? '/'.$tugasmahasiswa['matakuliah_id'] : ''}}{{($action!='edit')? '/'.$tugasmahasiswa['kelas_id'] : ''}}{{($action!='edit')? '/'.$tugasmahasiswa['angkatan_id'] : ''}}" enctype="multipart/form-data">
					{{ csrf_field() }}
				<div class="modal-header">
					<h3>Tugas</h3>
				</div>
					<div class="modal-body">
                    <div class="row">
           				<div class="col-12"><br>
              				<div class="col-md-12 col-sm-12">
                        		<div class="panel panel-primary">
                           			<div class="panel-heading">
                               			<h3>{{ $tugasmahasiswa->matakuliah->nama_matkul}}</h3>
                               			<h5>Dosen: {{ $tugasmahasiswa->dosen->nama }} </h5>
							 			<h6>Kelas: {{ $tugasmahasiswa->kelas->nama_kelas }} </h6>
                           			</div>
                          		</div>                          			
                               		<h5>  {!! $tugasmahasiswa['konten'] !!}</h5>
										<div class="form-group">
										<label class="col-sm-1 control-label">File</label>
										<div class="col-sm-11">
								<input type="hidden" class="form-control" name="kelas_id"  value="{{$tugasmahasiswa['kelas_id']}}">
								<input type="hidden" class="form-control" name="matakuliah_id"  value="{{$tugasmahasiswa['matakuliah_id']}}">
								<input type="hidden" class="form-control" name="tanggal_masuk"  value="{{$tugasmahasiswa['tanggal_masuk']}}">
								<input type="hidden" class="form-control" name="angkatan_id"  value="{{$tugasmahasiswa['angkatan_id']}}">
								<input type="file" class="form-control" name="file_name"  value="{{ ($action!='edit') ? $tugasmahasiswa['file_name'] : '' }}">
							</div>
						</div>					
						</div>
						</div>		
					<div class="modal-footer">
						<a href="{{ URL::previous() }}" class="btn btn-default">Back</a>
						<button type="submit" class="btn {{($action!='delete')? 'btn-success' : 'btn-danger' }} pull-right" >Upload</button>
					</div>
				</form>
			</div>
		</div>	
	</section>
@endsection
