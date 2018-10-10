@extends('layouts.layouts3')

@section('content')

  <section class="content">
    <div class="row ">
      <div class="col-12">
        <form class="form-horizontal" method="POST" action="/tugas/{{ $action }}{{($action!='kirim')? '/'.$tugas['id'] : ''}}" >
          {{ csrf_field() }}
             <h4 class="page-head-line">Detail Tugas</h4>
         <div class="row">
           <div class="col-12">
              <div class="col-md-12 col-sm-12">
                        <div class="panel panel-primary">
                           <div class="panel-heading">
                               <h4>{{ $tugas->matakuliah->nama_matkul}}</h4>
                           </div>
                          </div>                         
                               <h5> {!! $tugas['konten'] !!}</h5> 
                               <h5>File : <span class="glyphicon glyphicon-file  text-warning" ></span> {!! $tugas['file_name'] !!}</h5>                                             
                          <div class="panel-footer">
                           <h6>{{ $tugas->kelas->nama_kelas }}</h6>
                        </div>
                    </div>
                  </div>
                </div>
          </form>
         
          <b>Total Mahasiswa yang mengumpulkan tugas : {{$hitungmahasiswa}}</b>
          <br>
                <div class="table-responsive">
                  <table id="tabel_data" class="table table-bordered table-striped table-hover">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama Mahasiswa</th>
                        <th>File</th>
                        <th>Tanggal</th>
                        <th>Nilai</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if (!$tugasmahasiswa->isEmpty()) 
                         @foreach($tugasmahasiswa as $key => $value)
                                <tr>
                                  <td>{{ $key+1 }}</td>
                                  <td>{{ $value->mahasiswa->nama }}</td>
                                  <td>{{ $value['file_name'] }}</td>
                                  <td>{!! $value->created_at->format('d/M/Y')!!}</td>
                                  <td>{{ $value['nilai'] }}</td>
                                  <td>  <a href="{{ url('upload/files/'.$value->file_name) }}" download="{{$value->file_name}}">
                                 <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-download"></span>&nbsp;Unduh 
                                 </button>
                                 </a> 
                                 <a href="/tugas/editnilai/{{$value['id']}}/{{$value['matakuliah_id']}}/{{$value['kelas_id']}}/{{$value['angkatan_id']}}" class="btn btn-sm btn-primary" 
                                 style="height: 33px;">
                                <i class="fa fa-plus"></i>&nbsp;Tambah Nilai</a>               
                                </td>                        
                                </tr>
                          @endforeach
                             @else
                              <tr>
                                <td colspan="8"><center>No data available in table</center></td>
                              </tr>
                            @endif
                    </tbody>
                </table>
              </div>  
          <div class="modal-footer"> 
            <a href="{{ URL::previous() }}" class="btn btn-default">Kembali</a>
          </div>
      </div>
    </div>  
  </section>
@endsection
