@extends('layouts.layouts3')

@section('content')
	<section class="content">
		<div class="row ">
			<div class="col-12">
				<form class="form-horizontal" method="POST" action="/kuisessay/{{ $action }}{{($action!='editnilai')? '/'.$kuisjawaban['id'] : ''}}" enctype="multipart/form-data">
					{{ csrf_field() }}					
						<h4 class="page-head-line">Form Nilai</h4>
						@if($errors->any())
						<div class="alert alert-danger">
							@foreach($errors->all() as $err)
							<li><span>{{ $err }}</span></li>
							@endforeach
						</div>
						@endif			
						<div class="form-group">
							<label class="col-sm-1 control-label">Nilai</label>
							<div class="col-sm-11">
								<input type="text" class="form-control" name="nilai" value="{{ ($action!='editnilai') ? $kuisjawaban['nilai'] : '' }}">
							</div>
						</div>
					<div class="modal-footer">
						<a href="{{ URL::previous() }}" class="btn btn-default">Kembali</a>
						<button type="submit" class="btn {{($action!='delete')? 'btn-success' : 'btn-danger' }} pull-right" >Simpan</button>
					</div>
				</div>
				</form>
			</div>
		</div>	
	</section>
@endsection
											
