@extends('layouts.layouts4')

@section('content')
<section class="content">
		 <h4 class="page-head-line">Bantuan</h4>
	<div class="row">
		<div class="col-12">
			<div class="panel panel-default">
				<div class="panel-heading text-right">								
				</div>	
				<div class="panel-body">
					<p> <b> Langkah-langkah melihat materi matakuliah : </b> </p>
				<ul>
					<li> Pilih menu <b> "Matakuliah" </b> </li>									
					<li> Klik tombol <b> "Lihat Materi" </b> pada matakuliah yang diinginkan </li>
					<li> Jika user ingin mendownload materi yang diberikan, klik tombol <b> "Download" </b> </li>
				</ul>
				<p> <b> Langkah-langkah melihat tugas matakuliah : </b> </p>
				<ul>
					<li> Pilih menu <b> "Tugas" </b> </li>
					<li> Klik tombol <b> "Lihat Tugas" </b> pada matakuliah yang diinginkan </li>
					<li> Jika user ingin mengupload tugas maka klik tombol <b> "Upload"	</b> </li>	
					<li> Jika user sudah mengupload tugas, user bisa melihat bukti upload dan nilai tugas dengan klik tombol <b> "Detail" </b> </li>		
				</ul>
				<p> <b> Langkah-langkah mengerjakan kuis: </b> </p>		
				<ul>
					<li> Pilih menu <b> "Kuis" </b> </li>
					<li> Pilih kuis </li>					
					<li> Klik tombol <b> "Kerjakan" </b> </li>					
					<li> Untuk lanjut ke soal kuis berikutnya, klik tombol <b> "Jawab" </b> </li>
					<li> Setelah kuis selesai, user bisa melihat skor jawaban <b> benar </b> dan jawaban <b> salah </b> </li>
				</ul>				
				<p> <b> Langkah-langkah menambah chat forum : </b> </p>	
				<ul>
					<li> Klik link <b> "Chat forum" </b> pada halaman beranda </li>
					<li> Untuk memulai chat forum, user terlebih dahulu memilih topik pembicaraan </li>					
					<li> Jika user ingin memulai chat forum antara dosen dan mahasiswa maka klik tombol <b> "Open Forum" </b> </li>
				</ul>
				</div>
			</div>
		</div>
	</div>	
</section>
@endsection
