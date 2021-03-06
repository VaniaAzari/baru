@extends('layouts.layouts2')

@section('content')
<section class="content">
    <h4 class="page-head-line">Prodi</h4>
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">
                <ul class="nav nav-tabs">
                        <li class="active"><a href="{{ URL::to('/prodi') }}">Prodi</a>
                        </li>
                        <li class=""><a href="{{ URL::to('/kelas') }}">Kelas</a>
                        </li>
                         <li class=""><a href="{{ URL::to('/angkatan') }}">Angkatan</a>
                        </li>
                        <li class=""><a href="{{ URL::to('/matakuliah') }}">Matakuliah</a>
                        </li>
                        <li class=""><a href="{{ URL::to('/matakuliahkelas') }}">Matakuliah Kelas</a>
                        </li>
                    </ul>
               <div class="panel-heading text-right">
                    <a href="/prodi/create" class="btn btn-md btn-info" ><i class="fa fa-plus"></i>&nbsp;Tambah Data</a>
                      {{ csrf_field() }}
                </div>   
                <br>
                            
                <div class="panel-body" >
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <th>No</th>
                            <th>Nama</th>                          
                            <th>Action</th>
                        </thead>
                        <tbody>

                        </tbody>
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
                url :'{{ route('prodi.getdata') }}',
                data: { '_token' : '{{csrf_token() }}'},
                type: 'POST',
            },
            columns: [
                { data: 'DT_Row_Index', orderable: false, searchable: false, "width": "30px"},
                { data: 'nama_prodi', name: 'nama_prodi' },               
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
                    value == 'execute' ? deleteData(data.id, $('input[name="_token"]').val(), "{{ route('prodi.delete') }}")
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