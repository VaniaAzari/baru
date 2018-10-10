@extends('layouts.layouts3')

@section('content')
	<section class="content">
		<div class="row ">
			<div class="col-12">
				<form class="form-horizontal" method="POST" action="/tugas/{{ $action }}{{($action!='editnilai')? '/'.$tugas['id'] : ''}}{{($action!='editnilai')? '/'.$tugas['matakuliah_id'] : ''}}{{($action!='editnilai')? '/'.$tugas['kelas_id'] : ''}}{{($action!='editnilai')? '/'.$tugas['angkatan_id'] : ''}}" enctype="multipart/form-data">
					{{ csrf_field() }}					
						<h4 class="page-head-line">Form Nilai</h4>				
					<div class="modal-body">
						@if($action=="delete")
							<div class="alert alert-danger">
	  							<strong>Perhatian!</strong> Menekan tombol delete akan menghapus data.
							</div>
						@endif				
						<div class="form-group">
							<label class="col-sm-4 control-label">Nilai</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="nilai" value="{{ ($action!='editnilai') ? $tugas['nilai'] : '' }}">
							</div>
						</div>
					<div class="modal-footer">
						<a href="{{ URL::previous() }}" class="btn btn-default">Kembali</a>
						<button type="submit" class="btn {{($action!='delete')? 'btn-success' : 'btn-danger' }} pull-right" >Simpan</button>
					</div>
				</form>
			</div>
		</div>	
	</section>
@endsection
