@extends('layouts.layouts4')

@section('content')
<section class="content">
	<div class="row">
		<div class="col-12">
			<div class="panel panel-default">
				<div class="panel-body" >
					<center>
					<h3>
                    <p>Kuis Telah Selesai Anda Laksanakan</p>
                    <p>Jawaban Anda</p>
                	</h3>
                	<table>
                		<tr>
                			@if($correct==null)
                			<td> <b>Benar</b> </td>
                			<td> <b>&nbsp; : </b> </td>
                			<td> <b>&nbsp; 0 </b> </td>
                			@else
                			<td> <b>Benar</b> </td>
                			<td> <b>&nbsp; : </b> </td>
                			<td> <b>&nbsp; {{ $correct }} </b> </td>
                			@endif
                			
                		</tr>
                		<tr>
                			@if($wrong==null)
                			<td> <b>Salah</b> </td>
                			<td> <b>&nbsp; : </b> </td>
                			<td> <b>&nbsp; 0 </b> </td>
                			@else
                			<td> <b>Salah</b> </td>
                			<td> <b>&nbsp; : </b> </td>
                			<td> <b>&nbsp; {{ $wrong }}  </b> </td>
                			@endif
                		</tr>
                	</table>                  
                    </center>                    
				</div>
			</div>
		</div>
	</div>	
</section>
@endsection