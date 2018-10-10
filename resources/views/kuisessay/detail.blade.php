@extends('layouts.layouts3')

@section('content')

  <section class="content">
    <div class="row ">
      <div class="col-12">      
             <h4 class="page-head-line">Detail Kuis</h4>
         <div class="row">
           <div class="col-12">
              <div class="col-md-12 col-sm-12">
                        <div class="panel panel-primary">
                           <div class="panel-heading">
                                <h4>Nama Kuis : {{ $groupKuis->name}}</h4>
                               <h5>Kelas : {{ $groupKuis->kelas->nama_kelas}}</h5>
                               <h5>Angkatan : {{ $groupKuis->angkatan->nama_angkatan}}</h5>
                               <h5>Matakuliah : {{ $groupKuis->matkul->nama_matkul}}</h5>    
                           </div>
                          </div>                      
                    </div>
                  </div>
                </div>
                 <h4><b>Soal : </b></h4>  
                  @foreach($soal as $key => $value)   
                     {!! $value->pertanyaan !!} <br>              
                  @endforeach   
                  <br>
                 <div class="table-responsive">
                  <table id="tabel_data" class="table table-bordered table-striped table-hover">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama Mahasiswa</th>
                        <th style="width: 600px;">Jawaban </th>   
                        <th>Tanggal </th> 
                        <th>Nilai </th> 
                        <th style="width: 50px;">Aksi </th>                           
                      </tr>
                    </thead>
                    <tbody>
                      @if (!$jawaban->isEmpty()) 
                         @foreach($jawaban as $key => $value)
                                <tr>
                                  <td>{{ $key+1 }}</td>
                                  <td>{{ $value->mahasiswa->nama }}</td>
                                  <td>{!! $value->komentar !!} </td> 
                                  <td>{!! $value->created_at->format('d/M/Y')!!}</td>
                                  <td>{{ $value->nilai }}</td> 
                                  <td>
                                <a href="/kuisessay/editnilai/{{$value['id']}}" class="btn btn-sm btn-primary" 
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
                              
                               
                                                               
                          
