@extends('layouts.layouts4')

@section('content')
<section class="content">
	<h4 class="page-head-line">Kuis Pilihan Ganda</h4>
	<div class="row">
		<div class="col-12">
			<div class="panel panel-default">	
				<div class="panel-body" >
                    <form action="{{ route('kuis.mahasiswa.hitung') }}" id="form-kuis" method="POST">
                        <input type="hidden" name="group_id" value="{{ $listkuis->group_kuis_id }}">
                        <input type="hidden" name="id" value="{{ $listkuis->id }}">
                        <div class="row">
                            {{ csrf_field() }}
                            <div class="col-md-12">
                                <div class="panel-kuis"> 
                                    <p>{{ $listkuis->pertanyaan}}</p>
                                </div>
                                <div class="panel-jawaban">
                                    <ul class="list-jawaban">
                                        <?php $letter = 'A'; ?>
                                        @foreach($listkuis->kuisJawaban as $jawaban)
                                            <?php 
                                                $jawaban[$letter] = $jawaban;
                                                ?>
                                            <div class="radio">
                                               <input type="radio" name="jawaban" value="{{ $jawaban->value }}">{{ $letter }}. {{ $jawaban->value }}
                                            </div>
                                                <?php $letter++; ?>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                       <button type="submit" class="btn btn-info">Jawab</button>
                    </form>
				</div>
			</div>
		</div>
	</div>	
</section>
<script>
    $( document ).ready(function() {
		$( ".next-button" ).click(function(e) {
            e.preventDefault()
            $('#form-kuis').submit();
        });
	});	
</script>
@endsection
