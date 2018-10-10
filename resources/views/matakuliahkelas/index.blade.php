@extends('layouts.layouts2')

@section('content')
<section class="content">
	 <h4 class="page-head-line">Data Matakuliah Kelas</h4>
	<div class="row">
		<div class="col-12">
			
			<div class="panel panel-default">
				  <ul class="nav nav-tabs">
                        <li class=""><a href="{{ URL::to('/prodi') }}">Prodi</a>
                        </li>
                        <li class=""><a href="{{ URL::to('/kelas') }}">Kelas</a>
                        </li>
                         <li class=""><a href="{{ URL::to('/angkatan') }}">Angkatan</a>
                        </li>
                        <li class=""><a href="{{ URL::to('/matakuliah') }}">Matakuliah</a>
                        </li>
                        <li class="active"><a href="{{ URL::to('/matakuliahkelas') }}">Matakuliah Kelas</a>
                        </li>
                    </ul>
					<br>
				<div class="panel-heading text-right">
					<a href="/matakuliahkelas/create" class="btn btn-md btn-info" ><i class="fa fa-plus"></i>&nbsp;Tambah Data</a>
					      {{ csrf_field() }}
				</div>				
				<div class="panel-body" >
					@if ($message = Session::get('success'))
					  <div class="alert alert-success alert-block">
						<button type="button" class="close" data-dismiss="alert">×</button>	
						  <strong>{{ $message }}</strong>
					  </div>
					@endif
					<table id="dataTable" class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th>No.</th>
                                <th>Kode</th>    
								<th>Nama Matakuliah</th>	
								<th>Kelas</th>
								<th>Angkatan</th>
								<th>Dosen</th>	
								<th>Aksi</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>	
</section>
<script>
    $( document ).ready(function() {
		var dt = $('#dataTable').DataTable({
            orderCellsTop: true,
            responsive: true,
            processing: true,
            serverSide: true,
            searching: true,
            autoWidth: false,
            ajax: {
				url :'{{ route('matakuliahkelas.getdata') }}',
				data: { '_token' : '{{csrf_token() }}'},
				type: 'POST',
            },
            columns: [
                { data: 'DT_Row_Index', orderable: false, searchable: false, "width": "30px"},
                { data: 'kode', name: 'kode' }, 
                { data: 'matakuliah_id', name: 'matakuliah_id' }, 
                { data: 'kelas_id', name: 'kelas_id' },              
                { data: 'angkatan_id', name: 'angkatan_id' },
                { data: 'dosen_id', name: 'dosen_id' },
                { data: 'action', name: 'action', "width" : "200px" },
            ]
		});

		$('table#dataTable tbody').on( 'click', 'td>a', function (e) {
            var mode = $(this).attr("data-mode");
            var parent = $(this).parent().get( 0 );
            var parent1 = $(parent).parent().get( 0 );
            var row = dt.row(parent1);
            var data = row.data();

            if($(this).hasClass('delete')) {
                swal({
                    title: "Konfirmasi",
                    text: "Apakah Anda Yakin Untuk Menghapus Data Ini ?",
                    buttons: {
                        cancel: "Tidak",
                        execute: "Iya",
                    }
                }).then((value) => {
                    value == 'execute' ? deleteData(data.id, $('input[name="_token"]').val(), "{{ route('matakuliahkelas.delete') }}")
                    : null
                });
                
            }else if($(this).hasClass('edit')) {
            	console.log(data);
                $('#id_edit').val(data.id);
                $('#matakuliah_edit').val(data.matakuliah_id);  
                $('#kelas_edit').val(data.kelas_id);            
				$('#angkatan_edit').val(data.angkatan_id); 
                $('#dosen_edit').val(data.dosen_id); 
                $('#editModal').modal('show');
            }
        });
	
	});

	function deleteData(id, token, url) {
        $.ajax({
            method: 'DELETE',
            headers: {
                'X-CSRF-Token': token
            },
            url: url,
            dataType: 'JSON',
            cache: false,
            data: {id: id},
            success: function(result) {
                $('#dataTable').DataTable().ajax.reload();
                $.smkAlert({
                    text: result.message,
                    type: 'success'
                });
            },
            error: function(err)
            {
                $.smkAlert({
                    text: err.message,
                    type: 'danger'
                });
            }
        });
	}
	
</script>
@endsection