@extends('layouts.layouts4')

@section('content')

	<section class="content">
 			<h4 class="page-head-line">Forum</h4>		
				<div class="row ">	
				 <div class="col-12">			
					@includeif('chatmhs.table')					
				<form class="form-horizontal" method="POST" action="/chatmhs/{{ $action }}{{($action!='edit')? '/'.$chatmhs['kelas_id'] : ''}}{{($action!='edit')? '/'.$chatmhs['dosen_id'] : ''}}{{($action!='edit')? '/'.$chatmhs['id'] : ''}}{{($action!='edit')? '/'.$chatmhs['angkatan_id'] : ''}}" enctype="multipart/form-data">
					{{ csrf_field() }}				
				<div class="modal-body">
				  <div class="row">
                  <div class="col-12">                             				        
								<input type="hidden" class="form-control" name="kelas_id"  value="{{$chatmhs['kelas_id']}}">	
								<input type="hidden" class="form-control" name="chat_id"  value="{{$chatmhs['chat_id']}}">	
								<input type="hidden" class="form-control" name="angkatan_id"  value="{{$chatmhs['angkatan_id']}}">								
								<textarea name="komentar" class="form-control" name="komentar"  value="{{ ($action!='edit') ? $chatmhs['komentar'] : '' }}" placeholder="Ketik disini.."></textarea>
						</div>	
						</div>
						</div>							        						
                        @if(Auth::guard('mahasiswa'))
                          		<input type="hidden" class="form-control" name="type"  value="Mahasiswa">
                        @else
                                <input type="hidden" class="form-control" name="type"  value="Dosen">
                         @endif
							
					<div class="modal-footer">
						<a href="{{ URL::previous() }}" class="btn btn-default">Kembali</a>
						<button type="submit" class="btn {{($action!='delete')? 'btn-success' : 'btn-danger' }} pull-right" >Kirim</button>
					</div>
				</form>
			</div>
		</div>	
	</section>
@endsection

                                            
             		 		 					
							
