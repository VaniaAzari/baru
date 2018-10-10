@extends('layouts.layouts3')

@section('content')
<section class="content">
	<h4 class="page-head-line">Kuis Essay</h4>
	<div class="row">
		<div class="col-12">
			<div class="panel panel-default">				
				<div class="panel-heading text-right">
                    <button type="button" class="btn btn-md btn-info" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i>&nbsp;Tambah Data</a>
				</div>
				<br>							
				<div class="panel-body" >
					<table class="table table-bordered table-striped table-hover" id="dataTable">
                        <thead>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Angkatan</th>
                            <th>MataKuliah</th>
                            <th>Jumlah Soal</th>
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
        <h4 class="modal-title">Tambah Group Kuis Baru</h4>
      </div>
	  <form method="POST" action="#" id="formAdd">
      	<div class="modal-body">
			{{ csrf_field() }}
			<div class="form-group">
				<label>Nama</label>
				<input type="text" class="form-control" name="name" placeholder="Nama Group kuis">
			</div>
			<div class="form-group">
				<label>Kelas</label>
				<select name="kelas_id" class="form-control">
					<option value="" disabled selected>Silakan Pilih Kelas</option>
					@foreach($kelasList as $kelas)
						<option value="{{$kelas->id}}">{{$kelas->nama_kelas}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label>Angkatan</label>
				<select name="angkatan_id" class="form-control">
					<option value="" disabled selected>Silakan Pilih Angkatan</option>
					@foreach($angkatanList as $angkatan)
						<option value="{{$angkatan->id}}">{{$angkatan->nama_angkatan}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label>Matakuliah</label>
				<select name="matkul_id" class="form-control">
					<option value="" disabled selected>Silakan Pilih MataKuliah</option>
					@foreach($matkulList as $matkul)
						<option value="{{$matkul->id}}">{{$matkul->nama_matkul}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label>Jumlah Soal</label>
				<input type="text" class="form-control" name="jumlah_soal" placeholder="Jumlah Soal">
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
				<label>Nama</label>
				<input id="nama_edit" type="text" class="form-control" name="name" placeholder="Nama Group kuis">
			</div>
			<div class="form-group">
				<select name="kelas_id" class="form-control" id="id_kelas_edit">
					<option value="" disabled selected>Silakan Pilih Kelas</option>
					@foreach($kelasList as $kelas)
						<option value="{{$kelas->id}}">{{$kelas->nama_kelas}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<select name="angkatan_id" class="form-control" id="angkatan_id_edit">
					<option value="" disabled selected>Silakan Pilih Angkatan</option>
					@foreach($angkatanList as $angkatan)
						<option value="{{$angkatan->id}}">{{$angkatan->nama_angkatan}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<select name="matkul_id" class="form-control" id="id_matakuliah_edit">
					<option value="" disabled selected>Silakan Pilih Mata Kuliah</option>
					@foreach($matkulList as $matkul)
						<option value="{{$matkul->id}}">{{$matkul->nama_matkul}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label>Jumlah Soal</label>
				<input id="soal_edit" type="text" class="form-control" name="jumlah_soal" placeholder="Jumlah Soal">
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
				url :'{{ route('kuis.group.essay.list') }}',
				data: { '_token' : '{{csrf_token() }}'},
				type: 'POST',
            },
            columns: [
                { data: 'DT_Row_Index', orderable: false, searchable: false, "width": "25px"},
                { data: 'name', name: 'name' },
                { data: 'kelas', name: 'kelas' },
                { data: 'angkatan', name: 'angkatan' },
                { data: 'matakuliah', name: 'matakuliah' },
                { data: 'jumlah_soal', name: 'jumlah_soal' },
                { data: 'action', name: 'action', "width" : "350px" },
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
                    value == 'execute' ? deleteData(data.id, $('input[name="_token"]').val(), "{{ route('kuis.group.essay.delete') }}")
                    : null
                });
                
            }else if($(this).hasClass('edit')) {
                $('#id_edit').val(data.id);
                $('#nama_edit').val(data.name);
                $('#id_kelas_edit').val(data.kelas_id);
                $('#angkatan_id_edit').val(data.angkatan_id);
                $('#id_matakuliah_edit').val(data.matkul_id);
                $('#soal_edit').val(data.jumlah_soal);
                $('#editModal').modal('show');
            }
        });
		
		$('.btn-save').click(function() {
            $.ajax({
				headers: {
					'X-CSRF-Token': $('input[name="_token"]').val()
				},
				url: "{{ route('kuis.group.essay.save') }}", 
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
				url: "{{ route('kuis.group.essay.update') }}", 
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