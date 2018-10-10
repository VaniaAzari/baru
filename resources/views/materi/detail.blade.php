@extends('layouts.layouts3')

@section('content')
<section class="content">
	<h4 class="page-head-line">Materi</h4>
		<div class="row">
		<div class="col-12">
			<div class="panel panel-default">				    									
				<div class="panel-body" >
			Berikut ini file materi yang tersedia seperti di bawah ini: 
			<table id="tabel_data" class="table table-bordered table-striped table-hover">
			<thead>
			<tr>
				<th>No.</th>
				<th>Filename</th>				
			</tr>
			</thead>
			<tbody>
			@if(!empty($materifile))
				@foreach($materifile as $key => $value)
				<tr>
					<td>{{ $key+1 }}</td>
					<td>{{ $value['filename'] }}</td>		
				</tr>
				@endforeach
			@else
				<tr>
					<td colspan="7">Data Masih Kosong</td>
				</tr>
			@endif
		</tbody>
		<tfoot>
			
		</tfoot>
	</table>
 			</div>
		</div>
	</div>
	<div class="modal-footer">
                        <a href="{{ URL::previous() }}" class="btn btn-default">Kembali</a>
                     
                    </div>	
</div>
</section>
@endsection
