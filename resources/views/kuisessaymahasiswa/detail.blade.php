@extends('layouts.layouts4')

@section('content')

  <section class="content">
    <div class="row ">
      <div class="col-12">      
             <h4 class="page-head-line">Detail Nilai Kuis</h4>
         <div class="row">
           <div class="col-12">
              <div class="col-md-12 col-sm-12">
                        <div class="panel panel-primary">
                           <div class="panel-heading">
                               <h4>{{ $groupKuis->name}}</h4>
                               <h5>Kelas : {{ $groupKuis->kelas->nama_kelas}}</h5>
                               <h5>Angkatan : {{ $groupKuis->angkatan->nama_angkatan}}</h5>
                               <h5>Matakuliah : {{ $groupKuis->matkul->nama_matkul}}</h5>         
                           </div>
                          </div>   
                          <h4><b>Soal : </b></h4>  
                          @foreach($soal as $key => $value)                       
                               {!! $value->pertanyaan !!} <br>
                             @endforeach  
                           @if (!$jawaban->isEmpty())  
                           @foreach($jawaban as $key => $value)   
                               <h4><b>Jawaban : </b></h4>  
                               {!! $value->komentar !!}           
                               <h5><b>Nilai Kuis : {{ $value->nilai}}</b></h5>
                           @endforeach  
                           @else
                           <table>
                            <tr>
                              <td> <h4><b> Jawaban </b></h4></td>
                              <td> <h4><b> &nbsp; : </b></h4></td>
                              <td> <h4><b> &nbsp; - </b></h4></td>
                            </tr>
                              <tr>
                              <td> <h5><b> Nilai Kuis</b></h5> </td>
                              <td> <h5><b> &nbsp; : </b></h5> </td>
                              <td> <h5><b> &nbsp; 0 </b></h5> </td>
                            </tr>
                           </table>                                 
                            @endif                               
                    </div>
                  </div>
                </div>
                <br>                   
          <div class="modal-footer"> 
            <a href="{{ URL::previous() }}" class="btn btn-default">Kembali</a>
          </div>
      </div>
    </div>  
  </section>
@endsection
                               
                          
