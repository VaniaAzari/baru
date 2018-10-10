@extends('layouts.layouts4')

@section('content')

	<section class="content">
		<div class="row ">
			<div class="col-12">
				<form class="form-horizontal" method="POST" action="/tugasmahasiswa/{{ $action }}{{($action!='detail')? '/'.$tugasmahasiswa['id'] : ''}}" enctype="multipart/form-data">
					{{ csrf_field() }}
						 <h4 class="page-head-line">Tugas</h4>
							 <div class="row">
           						<div class="col-12">
              						<div class="col-md-12 col-sm-12">
                        				<div class="panel panel-primary">
                           					<div class="panel-heading">
                               					<h3>{{ $tugasmahasiswa->matakuliah->nama_matkul}}</h3>
                               					<h5>Dosen: {{ $tugasmahasiswa->dosen->nama }} </h5>
							 					<h6>Kelas: {{ $tugasmahasiswa->kelas->nama_kelas }} </h6>
                           					</div>
                          				</div>
                                        <h5>  {!! $tugasmahasiswa['konten'] !!}</h5>
                                        @if (!$tugasmahasiswa2->isEmpty()) 
                               			@foreach($tugasmahasiswa2 as $value)										
										<label class="control-label">File &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;  : </label>
										<span class="glyphicon glyphicon-file  text-warning" ></span><a> &nbsp; {{ $value['file_name']}} </a>
										<h5><b>Nilai &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp;  &nbsp; : {{ $value['nilai']}} </b></h5>
										@endforeach 
										@else
       										<span class="glyphicon glyphicon-file  text-warning" ></span> No file available    
										@endif	                                       
                            	</div>
                            </div>
                        </div>                              
                        <div class="modal-footer"> 
							<a href="{{ URL::previous() }}" class="btn btn-default">Back</a>
						</div>
				</form>
			</div>
		</div>	
	</section>
@endsection

