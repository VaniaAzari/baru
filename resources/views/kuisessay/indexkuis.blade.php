@extends('layouts.layouts3')

@section('content')
<section class="content">
	<h4 class="page-head-line">Soal Essay</h4>
	<div class="row">
		<div class="col-12">
			<div class="panel panel-default">
				<div class="panel-heading text-right">
                    <button type="button" class="btn btn-md btn-info" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i>&nbsp;Tambah Data</a>
				</div>
				<br>
							
				<div class="panel-body" >
					<table class="table table-bordered" id="dataTable">
                        <thead>
                            <th>No</th>
                            <th>Soal</th>                            
                            <th>Aksi</th>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
				</div>
			</div>
		</div>
	</div>	
</section>
<div id="addModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Kuis Baru</h4>
      </div>
	  <form method="POST" action="#" id="formAdd">
      	<div class="modal-body">
            {{ csrf_field() }}
            <input type="hidden" name="group_kuis_id" value="{{$id}}">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Soal</label>
                        <textarea name="pertanyaan" class="form-control" placeholder="Masukan Pertanyaan" style="margin: 0px 10px 0px 0px; width: 558px; height: 212px;"></textarea>
                    </div>
                </div>                
            </div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-success pull-right btn-save" >Simpan</button>
		</div>
	</form>
    </div>
  </div>
</div>

<div id="editModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Group Kuis Baru</h4>
      </div>
      <form method="PUT" action="#" id="formEdit">
        <input type="hidden" value="" id="id_edit" name="id">
        <div class="modal-body">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Pertanyaan</label>
                <textarea id="pertanyaan_edit" name="pertanyaan" class="form-control" placeholder="Masukan Pertanyaan" style="margin: 0px 10px 0px 0px; width: 558px; height: 212px;"></textarea>
               
            </div>          
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success pull-right btn-update" >Simpan</button>
        </div>
    </form>
    </div>
  </div>
</div>


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
				url :'{{ route('kuis.essay.list', ['id' => $id]) }}',
				data: { '_token' : '{{csrf_token() }}'},
				type: 'POST',
            },
            columns: [
                { data: 'DT_Row_Index', orderable: false, searchable: false, "width": "30px"},
                { data: 'pertanyaan', name: 'pertanyaan' },               
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
                    value == 'execute' ? deleteData(data.id, $('input[name="_token"]').val(), "{{ route('kuis.essay.delete') }}")
                    : null
                });
                
            }else if($(this).hasClass('edit')) {
                $('#id_edit').val(data.id);
                $('#pertanyaan_edit').val(data.pertanyaan);              
                $('#editModal').modal('show');
            }
        });
		
		$('.btn-save').click(function() {
            $.ajax({
				headers: {
					'X-CSRF-Token': $('input[name="_token"]').val()
				},
				url: "{{ route('kuis.essay.save') }}", 
				type: "POST",             
				data: $('#formAdd').serialize(),        
				success: function(result)  
				{
					$('#formAdd')[0].reset();
					$('#addModal').modal('hide')
					$.smkAlert({
						text: result.message,
						type: 'success'
					});
					$('#dataTable').DataTable().ajax.reload();
				},
				error: function(err)
				{
					$('#addModal').modal('hide')
					$.smkAlert({
						text: err.message,
						type: 'danger'
					});
					$('#dataTable').DataTable().ajax.reload();
				}
			});
		});
		
		$('.btn-update').click(function() {
            $.ajax({
				headers: {
					'X-CSRF-Token': $('input[name="_token"]').val()
				},
				url: "{{ route('kuis.essay.update') }}", 
				type: "PUT",             
				data: $('#formEdit').serialize(),        
				success: function(result)  
				{
					$('#formEdit')[0].reset();
					$('#editModal').modal('hide')
					$.smkAlert({
						text: result.message,
						type: 'success'
					});
					$('#dataTable').DataTable().ajax.reload();
				},
				error: function(err)
				{
					$('#editModal').modal('hide')
					$.smkAlert({
						text: err.message,
						type: 'danger'
					});
					$('#dataTable').DataTable().ajax.reload();
				}
			});
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