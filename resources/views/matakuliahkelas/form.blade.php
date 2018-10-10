@extends('layouts.layouts2')

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
				<form class="form-horizontal" method="POST" action="/matakuliahkelas/{{ $action }}{{($action!='simpan')? '/'.$matakuliahkelas['id'] : ''}}">
					{{ csrf_field() }}					
					 <h4 class="page-head-line">Form Tambah Matakuliah Kelas</h4>					
					<div class="modal-body">
						@if($action=="delete")
							<div class="alert alert-danger">
	  							<strong>Perhatian!</strong> Menekan tombol delete akan menghapus data.
							</div>
						@endif
						<div class="form-group">
							<label class="col-sm-4 control-label">Nama Matakuliah</label>
							<div class="col-sm-8">
								<select name="matakuliah_id" class="form-control" >
    								  	<option value="" disabled selected>Pilih Matakuliah</option>
   									 @foreach($matakuliah as $value)
    									  <option value="{{$value->id}}">{{$value->kode}} - {{$value->nama_matkul}}</option>
  									  @endforeach
 									 </select>
								<input type="hidden" class="form-control" name="id" value="{{ ($action!='simpan') ? $matakuliahkelas['id'] : '' }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Kelas</label>
							<div class="col-sm-8">
    								<select name="kelas_id" class="form-control" >
    								  	<option value="" disabled selected>Pilih Kelas</option>
   									 @foreach($kelas as $value)
    									 <option value="{{$value->id}}">{{$value->nama_kelas}}</option>
  									  @endforeach
 									 </select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Angkatan</label>
							<div class="col-sm-8">
    								<select name="angkatan_id" class="form-control" >
    								  	<option value="" disabled selected>Pilih Angkatan</option>
   									 @foreach($angkatan as $value)
    									 <option value="{{$value->id}}">{{$value->nama_angkatan}}</option>
  									  @endforeach
 									 </select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Dosen</label>
							<div class="col-sm-8">
    								<select name="dosen_id" class="form-control" >
    								  	<option value="" disabled selected>Pilih Dosen</option>
   									 @foreach($dosen as $value)
    									 <option value="{{$value->id}}">{{$value->nama}}</option>
  									  @endforeach
 									 </select>
							</div>
						</div>						
					</div>
					<div class="modal-footer">
						<a href="{{ URL::previous() }}" class="btn btn-default">Kembali</a>
						<button type="submit" class="btn {{($action!='delete')? 'btn-success' : 'btn-danger' }} pull-right" >{{ ucwords($action) }}</button>
					</div>
				</form>
			</div>
		</div>	
	</section>
@endsection