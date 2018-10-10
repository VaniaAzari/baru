@extends('layouts.layouts3')

@section('content')
<section class="content">
	 <h4 class="page-head-line">Matakuliah</h4>

	<div class="row">
		<div class="col-12">
			<div class="panel panel-default">
				<div class="panel-heading text-right">					
				</div>							
				<div class="panel-body" >
				@if ($message = Session::get('success'))
					<div class="alert alert-success alert-block">
						<button type="button" class="close" data-dismiss="alert">×</button>	
						<strong>{{ $message }}</strong>
					</div>
					@endif					
				<table id="dosen_table" class="table table-bordered table-striped table-hover" style="width:100%" >
           		 <thead>
	              <tr>               
		            <th>No.</th>
					<th>Matakuliah</th>
					<th>Kelas</th>
					<th>Angkatan</th>
					<th>Aksi</th>			
				  </tr>     
	              </tr>
	             </thead>
	          	</table>
				</div>
			</div>
		</div>
	</div>	
</section>
@endsection
@section('script')
<script type="text/javascript">
$(document).ready(function() {
     $('#dosen_table').DataTable({
        "processing": true,
        "serverSide": true,
        "searching": true,
        "autoWidth": false,
        "orderCellsTop": true,
        "responsive": true,
        "ajax" : {
            url : '{{ route('bahanajardosen.getdata') }}',
            data: { '_token' : '{{csrf_token() }}'},
            type : "POST",
        },
        "columns":[
            { "data": "DT_Row_Index", orderable: false, searchable: false, "width": "30px"},
            { "data": "matakuliah_id" },
            { "data": "kelas_id" },      
            { "data": "angkatan_id" },                  
            { "data": "action", orderable: false, searchable: false, "width": "150px"}
        ]
     });
});
</script>
@endsection

