@extends('layouts.layouts3')

@section('content')
<section class="content">
	 <h4 class="page-head-line">Forum</h4>

	<div class="row">
		<div class="col-12">
			<div class="panel panel-default">
				<div class="panel-heading text-right">
					<a href="/chat/create" class="btn btn-md btn-info" ><i class="fa fa-plus"></i>&nbsp;Tambah Data</a>
                    {{ csrf_field() }}              
				</div>							
				<div class="panel-body" >
					@if ($message = Session::get('success'))
					  <div class="alert alert-success alert-block">
						<button type="button" class="close" data-dismiss="alert"></button>	
						  <strong>{{ $message }}</strong>
					  </div>
					@endif
				<table id="dataTable" class="table table-bordered table-striped table-hover" style="width:100%" >
            <thead>
              <tr>               
                <th>No.</th>
                <th>Topik</th>
                <th>Kelas</th>
                <th>Angkatan</th>
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
                url :'{{ route('chat.getdata') }}',
                data: { '_token' : '{{csrf_token() }}'},
                type: 'POST',
            },
            columns: [
                { data: 'DT_Row_Index', orderable: false, searchable: false, "width": "25px"},
                { data: 'topik', name: 'topik' },
                { data: 'kelas_id', name: 'kelas_id' },
                { data: 'angkatan_id', name: 'angkatan_id' },                                  
                { data: 'action', name: 'action', orderable: false, searchable: false, "width" : "250px" },                   
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
                    value == 'execute' ? deleteData(data.id, $('input[name="_token"]').val(), "{{ route('chat.delete') }}")
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




