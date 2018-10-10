@extends('layouts.layouts4')

@section('content')
<section class="content">
		 <h4 class="page-head-line">Tugas</h4>
	<div class="row">
		<div class="col-12">
			<div class="panel panel-default">		
				<div class="panel-body">
					@if (session('status'))
					    <div class="alert alert-success">
					        {{ session('status') }}
					    </div>
					@endif
					@includeif('tugasmahasiswa.table')					
				</div>
			</div>
		</div>
	</div>	
</section>
@endsection