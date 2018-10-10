@extends('layouts.layouts3')

@section('content')
<section class="content">
		 <h4 class="page-head-line">Forum</h4>
	   <div class="row">
		 <div class="col-12">		
						<div class="col-md-12 col-sm-12">
                    		<div class="panel panel-primary">
                       		 <div class="panel-heading">
                          		<h3>{!! $chat->topik !!}</h3>
                              <h5>Dosen: {{ $chat->dosen->nama }}</h5>
                              <h6>Kelas: {{ $chat->kelas->nama_kelas }}</h6>
                              <h6>Angkatan: {{ $chat->angkatan->nama_angkatan }}</h6>
                       		 </div>             
                        <div class="panel-body"> 
                            @foreach($chatmhs as $value)  
                            @if($value->type=="Mahasiswa")                              
                          <table>
                            <tr width="100%">
                              <td width="20%"> <img src="{{ url('uploads/gambar/'.$value->mahasiswa->file_name) }}" alt="" style="width:40px" class="img-circle"></td>
                              <td width="80%">
                                <table>                                 
                                  <tr>
                                  <td> &nbsp; {{ $value->mahasiswa->nama }}</td>                                   
                                  </tr> 
                                  <tr>
                                  <td> &nbsp; {{ $value->created_at->format('d/M/Y') }}</td>                                   
                                  </tr>                                          
                                </table>
                              </td>
                            </tr>
                          </table>                
                        <div class="alert alert-success">
                          <table>
                            <tr width="100%">
                               <td width="98%"> {!! $value->komentar !!} </td>
                               <td width="2%"> <h6>{{ $value->created_at->format('H:i') }} </td></h6>
                            </tr>                           
                          </table>
                            </div> 
                            @else
                            <table>
                            <tr width="100%">
                              <td width="20%"> <img src="{{ url('uploads/gambar/'.$value->dosen->file_name) }}" alt="" style="width:40px" class="img-circle"></td>
                              <td width="80%">
                                <table>                                 
                                  <tr>
                                  <td> &nbsp; {{ $value->dosen->nama }}</td>                                   
                                  </tr> 
                                  <tr>
                                  <td> &nbsp; {{ $value->created_at->format('d/M/Y') }}</td>   
                                  </tr>                                          
                                </table>
                              </td>
                            </tr>
                            </table>                
                        <div class="alert alert-success">
                           <table>
                            <tr width="100%">
                               <td width="98%"> {!! $value->komentar !!} </td>
                               <td width="2%"> <h6>{{ $value->created_at->format('H:i') }} </td></h6>
                            </tr>                           
                          </table>
                            </div>      
                            @endif                    
                            @endforeach 
                                <form class="form-horizontal" method="POST" action="/chat/{{ $action }}{{($action!='detail')? '/'.$chatdosen['id'] : ''}}{{($action!='edit2')? '/'.$chatdosen['kelas_id'] : ''}}{{($action!='edit2')? '/'.$chatdosen['angkatan_id'] : ''}}" enctype="multipart/form-data">
                                  {{ csrf_field() }}       
                                    <div class="modal-body">
                                    <div class="row">
                                    <div class="col-12">
                                      <input type="hidden" class="form-control" name="kelas_id"  value="{{$chatdosen['kelas_id']}}">                
                                      <input type="hidden" class="form-control" name="angkatan_id"  value="{{$chatdosen['angkatan_id']}}">  
                                      <textarea name="komentar" class="form-control" name="komentar"  value="{{ ($action!='detail') ? $chatdosen['komentar'] : '' }}" placeholder="Ketik disini..."></textarea>
                                      @if(Auth::guard('dosen'))
                                      <input type="hidden" class="form-control" name="type"  value="Dosen">
                                      @else
                                      <input type="hidden" class="form-control" name="type"  value="Mahasiswa">
                                      @endif                 
                                    </div>
                                    </div>    
                                    <div class="modal-footer">
                                      <a href="{{ URL::previous() }}" class="btn btn-default">Kembali</a>
                                      <button type="submit" class="btn {{($action!='delete')? 'btn-success' : 'btn-danger' }} pull-right" >Kirim</button>
                                    </div>
                                </form>  
                                </div>                                                             
                            </div> 
                      </div>              
            			</div>
            		</div>
            	</div>	
            </section>
            @endsection
                  

               
                          