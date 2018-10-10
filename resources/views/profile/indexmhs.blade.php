@extends('layouts.layouts4')

@section('content')
	@foreach($mhs as $value)
		<h4 class="page-head-line">Profil</h4>
			<div class="row">
				<div class="col-12">
				</div>
			</div>	
			 <div class="col-md-12 col-sm-12">
                    <div class="panel panel-info">
                        <div class="panel-heading"> 
                        Profil {{ $value->nama }}                       
                        </div>
                        <div class="panel-body">
                        	<center><h3></h3>   
                        	<table>
                        		<tr width="100%">
                        			<td width="20%"><img src="{{ url('uploads/gambar/'.$value->file_name) }}" alt="" style="width:80%"></td>
                        			<td width="80%">
                        				<table>                        					
				                        	<tr>
				                        		<td> Nama </td>
				                        		<td> : </td>
				                        		<td> &nbsp; {{ $value->nama }} </td>
				                        	</tr>
				                        	<tr>
				                        		<td> NIM </td>
				                        		<td> : </td>
				                        		<td> &nbsp; {{ $value->username }} </td>
				                        	</tr>      
				                        	<tr>
				                        		<td> Jenis Kelamin &nbsp; </td>
				                        		<td> : </td>
				                        		<td> &nbsp; {{ $value->jenis_kelamin }} </td>
				                        	</tr>
				                        	<tr>
				                        		<td> Prodi </td>
				                        		<td> : </td>
				                        		<td> &nbsp; {{ $value->prodi->nama_prodi }} </td>    
				                        	</tr>
				                        	<tr>
				                        		<td> Kelas </td>
				                        		<td> : </td>
				                        		<td> &nbsp; {{ $value->kelas->nama_kelas }} </td>    
				                        	</tr>
				                        	<tr>
				                        		<td> Angkatan </td>
				                        		<td> : </td>
				                        		<td> &nbsp; {{ $value->angkatan->nama_angkatan }} </td>    
				                        	</tr>				                        	
			                        	</table>
                        			</td>
                        		</tr>
                        	</table>                        	                      	
                          	</center>
                          	<div class="panel-heading text-right">
                          	<a href="/profile/edit/{{$value['id']}}" class="btn btn-sm btn-primary" ><i class="fa fa-edit"></i>&nbsp;Update Data Profile</a> 
                          </div>
				        </div>
                        <div class="panel-footer">  
                        Politeknik Caltex Riau                          
                        </div>
                    </div>
                </div>
		
@endforeach
@endsection