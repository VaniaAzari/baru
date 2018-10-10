@extends('layouts.layouts3')

@section('content')
<section class="content">
		 <h4 class="page-head-line">Tugas</h4>
	<div class="row">
		<div class="col-12">
			<div class="panel panel-default">
				<div class="panel-heading text-right">
					 @foreach($matakuliahkelas as $value)
					 @endforeach
					<a href="/tugas/create/{{$value['matakuliah_id']}}/{{$value['kelas_id']}}/{{$value['angkatan_id']}}" class="btn btn-md btn-info " >
						<i class="fa fa-plus"></i>&nbsp;Tambah Data</a>
						{{ csrf_field() }}			
				</div>			
				<div class="panel-body">
					@if (session('status'))
					    <div class="alert alert-success">
					       <b> {{ session('status') }} </b>
					    </div>
					@endif
					<div class="table-responsive">
				<table id="dataTable" class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>No.</th>
							<th>Matakuliah</th>
							<th>Kelas</th>
							<th style="width: 280px;">Konten</th>
							<th>File</th>
							<th>Tanggal masuk</th>
							<th>Tanggal akhir</th>
							<th>Aksi</th>
						</tr>
					</thead>		
					<tfoot>			
					</tfoot>
				</table>	
			</div>						
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
                url :'{{ route('tugas.getdata', ['matakuliah_id' => $matakuliah_id,'kelas_id' => $kelas_id,'angkatan_id' => $angkatan_id]) }}',
                data: { '_token' : '{{csrf_token() }}'},
                type: 'POST',
            },
            columns: [
                { data: 'DT_Row_Index', orderable: false, searchable: false, "width": "25px"},
                { data: 'matakuliah_id', name: 'matakuliah_id' },
                { data: 'kelas_id', name: 'kelas_id' },
                { data: 'konten', name: 'konten' },
                { data: 'file_name', name: 'file_name' }, 
                { data: 'tanggal_masuk', name: 'tanggal_masuk' },  
                { data: 'tanggal_akhir', name: 'tanggal_akhir' },                    
                { data: 'action', name: 'action', orderable: false, searchable: false, "width" : "300px" },                   
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
                    value == 'execute' ? deleteData(data.id, $('input[name="_token"]').val(), "{{ route('tugas.delete') }}")
                    : null
                });
                
            }else if($(this).hasClass('edit')) {
                $('#id_edit').val(data.id);
                $('#nama_edit').val(data.nama_prodi);              
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




			
			