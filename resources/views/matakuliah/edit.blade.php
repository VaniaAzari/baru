@extends('layouts.layouts2')

@section('content')
	<section class="content">
		<div class="row ">
			<div class="col-12">
				<form class="form-horizontal" method="POST" action="/matakuliah/{{ $action }}{{($action!='simpan')? '/'.$matakuliah['id'] : ''}}">
					{{ csrf_field() }}				
						 <h4 class="page-head-line">Form Edit Matakuliah</h4>					
					<div class="modal-body">
						@if($action=="delete")
							<div class="alert alert-danger">
	  							<strong>Perhatian!</strong> Menekan tombol delete akan menghapus data.
							</div>
						@endif
						<div class="form-group">
							<label class="col-sm-4 control-label">Kode</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="kode" placeholder="Kode Matakuliah" value="{{ ($action!='simpan') ? $matakuliah['kode'] : '' }}">
							</div>
						</div>		
						<div class="form-group">
							<label class="col-sm-4 control-label">Nama Matakuliah</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="nama_matkul" placeholder="Nama Matakuliah" value="{{ ($action!='simpan') ? $matakuliah['nama_matkul'] : '' }}">
								<input type="hidden" class="form-control" name="id" value="{{ ($action!='simpan') ? $matakuliah['id'] : '' }}">
							</div>
						</div>													
					</div>
					<div class="modal-footer">
						<a href="{{ URL::previous() }}" class="btn btn-default">Back</a>
						<button type="submit" class="btn {{($action!='delete')? 'btn-success' : 'btn-danger' }} pull-right" >{{ ucwords($action) }}</button>
					</div>
				</form>
			</div>
		</div>	
	</section>
@endsection