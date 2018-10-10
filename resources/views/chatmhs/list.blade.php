@extends('layouts.layouts4')

@section('content')
<section class="content">
<h4 class="page-head-line">Forum</h4>
	<div class="row">
		<div class="col-12">
			<div class="panel panel-default">		
				<div class="panel-body">
				<div class="table-responsive">
				<table id="tabel_data" class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
						<th>Topik</th>
						<th>Dosen</th>					
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@if (!$chatmhs->isEmpty()) 
						@foreach($chatmhs as $key => $value)
						<tr>
							<td>{{ $key+1 }}</td>
							<td>{!! $value['topik'] !!}</td>
							<td>{{ $value->dosen->nama }}</td>	
							<td>
							<span class="btn btn-group">
							<a href="/chatmhs/list/{{$value['kelas_id']}}/{{$value['dosen_id']}}/{{$value['id']}}/{{$value['angkatan_id']}}" class="btn btn-sm btn-primary" ><i class="fa fa-edit"></i>&nbsp;Buka forum</a>
							</span>
							</td>
						</tr>							
					@endforeach
				@else
				<tr>
					<td colspan="8">No data available in table</td>
				</tr>
				@endif
				</tbody>
				<tfoot>			
				</tfoot>
				</table>	
				</div>			
				</div>
			</div>
		</div>
	</div>	
</section>
@endsection
