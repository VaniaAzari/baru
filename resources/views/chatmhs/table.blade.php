  
        @foreach($chatmhs3 as $value)
            <div class="col-md-12 col-sm-12">
                        <div class="panel panel-primary">
                           <div class="panel-heading">
                               <h3>{!! $value->topik !!}</h3>
                                 <h5>Dosen: {{ $value->dosen->nama }}</h5>
                                  <h6>Kelas: {{ $value->kelas->nama_kelas }}</h6> 
                                  <h6>Angkatan: {{ $value->angkatan->nama_angkatan }}</h6>                                                        
                            </div>                
                            <div class="panel-body"> 
                            @foreach($chatmhs2 as $value)  
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
                          
                          
                            @endforeach


                                                       
                        
                                              