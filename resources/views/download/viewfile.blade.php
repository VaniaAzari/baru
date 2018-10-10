@extends('layouts.layouts4')

@section('content')
<section class="content">
	<h4 class="page-head-line">Materi</h4>
		<div class="row">
		<div class="col-12">
			<div class="panel panel-default">				    									
				<div class="panel-body" >
				@includeif('download.table')
 			</div>
		</div>
	</div>	
</div>
</section>
@endsection
