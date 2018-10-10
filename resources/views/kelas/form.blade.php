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
				<form class="form-horizontal" method="POST" action="/kelas/{{ $action }}{{($action!='simpan')? '/'.$kelas['id'] : ''}}">
					{{ csrf_field() }}					
						 <h4 class="page-head-line">Form Tambah Kelas</h4>					
					<div class="modal-body">
						@if($action=="delete")
							<div class="alert alert-danger">
	  							<strong>Perhatian!</strong> Menekan tombol delete akan menghapus data.
							</div>
						@endif
						<div class="form-group">
							<label class="col-sm-4 control-label">Nama Kelas</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="nama_kelas" placeholder="Nama Kelas" value="{{ ($action!='simpan') ? $kelas['nama_kelas'] : '' }}">
								<input type="hidden" class="form-control" name="id" value="{{ ($action!='simpan') ? $kelas['id'] : '' }}">
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

