@extends('layouts.layouts2')


@section('content')

<section class="content">
	 <h4 class="page-head-line">Log History</h4>
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Subject</th>
			<th>URL</th>				
			<th width="300px">Platform</th>
			<th>User</th>
			
		</tr>
		@if($logs->count())
			@foreach($logs as $key => $log)
			<tr>
				<td>{{ ++$key }}</td>
				<td>{{ $log->subject }}</td>
				<td class="text-success">{{ $log->url }}</td>							
				<td class="text-danger">{{ $log->agent }}</td>
				<td>{{ $log->user_id }}</td>
				
			</tr>
			@endforeach
		@endif
	</table>
</div>

</section>
@endsection