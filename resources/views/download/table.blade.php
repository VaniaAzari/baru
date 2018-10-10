@if (!$downloads->isEmpty()) 
@foreach($downloads as $value)
	<div class="col-md-12 col-sm-12">
    <div class="panel panel-primary">
       <div class="panel-heading">
          <h3>{{ $value->file_title }}</h3>
          <h5>{{ $value->dosen->nama }}</h5>
          <h5> {!! $value->created_at->format('d/M/Y')!!} </h5>
        </div>
					 <div class="panel-body">
              <h5>{!! $value->konten !!}</h5>    
            @foreach($value->materi_file as $file)     
            <a href="{{ url('photos/'.$file->filename) }}" download="{{$file->filename}}">  
                  <h5> <span class="glyphicon glyphicon-folder-open" ></span> &nbsp; {{ $file->filename }}</h5></a> 
                     @endforeach                                           
            </div>
                
           </div>
      </div>
@endforeach
@else
 <center> No data available in table   </center>  
@endif



						
            						
            						
		        
             
                        
                        
    