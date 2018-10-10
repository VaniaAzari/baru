@extends('layouts.layouts3')

@section('content')
<section class="content">
		 <h4 class="page-head-line">Bantuan</h4>
	<div class="row">
		<div class="col-12">
			<div class="panel panel-default">
				<div class="panel-heading text-right">								
				</div>	
				<div class="panel-body">
					<p> <b> Langkah-langkah menambah pengumuman : </b> </p>
				<ul>
					<li> Pilih menu <b> "Pengumuman" </b> </li>									
					<li> Untuk menambahkan pengumuman, klik tombol <b> "Add Data" </b> </li>
					<li> Isi title dan konten pengumuman </li>					
					<li> Jika user ingin mengedit data pengumuman maka klik tombol <b> "Update" </b> </li>
					<li> Jika user ingin menghapus data pengumuman maka klik tombol <b> "Delete" </b> </li>
				</ul>
				<p> <b> Langkah-langkah menambah materi pada masing-masing matakuliah : </b> </p>
				<ul>
					<li> Pilih menu <b> "Materi" </b> </li>
					<li> Pilih matakuliah </li>					
					<li> Klik tombol <b> "Lihat Materi" </b> </li>					
					<li> Untuk menambahkan materi, klik tombol <b> "Add Data" </b> </li>
					<li> Isi title materi, konten materi, upload file materi 
					<b> (*doc,*pdf, *xls, *ppt, *mp4) </b> </li>
					<li> Jika user ingin mengedit data materi maka klik tombol <b> "Update" </b> </li>
					<li> Jika user ingin menghapus data materi maka klik tombol <b> "Delete" </b> </li>
				</ul>
				<p> <b> Langkah-langkah menambah tugas pada masing-masing matakuliah: </b> </p>		
				<ul>
					<li> Pilih menu <b> "Tugas" </b> </li>
					<li> Pilih matakuliah </li>					
					<li> Klik tombol <b> "Lihat Tugas" </b> </li>					
					<li> Untuk menambah tugas, klik tombol <b> "Add Data" </b> </li>
					<li> Muncul form tugas dan user mengisi seperti title tugas, konten tugas, file, tanggal masuk dan tanggal akhir </li>
					<li> Jika user ingin mengedit data tugas maka klik tombol <b> "Update" </b> </li>
					<li> Jika user ingin menghapus data tugas maka klik tombol <b> "Delete" </b> </li>
					<li> Jika user ingin melihat nama-nama mahasiswa yang sudah upload tugas maka klik tombol <b> "Detail" </b> </li>
				</ul>
				<p> <b> Langkah-langkah menambah kuis : </b> </p>	
				<ul>
					<li> Pilih menu <b> "Kuis" </b> </li>
					<li> Klik tombol <b> "Add Data" </b> </li>
					<li> User terlebih dahulu memasukkan nama kuis,kelas dan matakuliah </li>
					<li> Jika user ingin mengedit data materi maka klik tombol <b> "Update" </b> </li>
					<li> Jika user ingin menghapus data materi maka klik tombol <b> "Delete" </b> </li> 
					<li> Jika user ingin memasukkan soal berupa pilihan ganda maka klik tombol <b> "Manage Soal" </b> </li>
					<li> Klik tombol <b> "Add Data" </b> untuk memasukkan pertanyaan dan pilihan jawaban A,B,C dan D </li>
					<li> Jika user ingin menghapus pertanyaan dan jawaban maka klik tombol <b> "Delete" </b> </li>
				</ul>
				<p> <b> Langkah-langkah menambah chat forum : </b> </p>	
				<ul>
					<li> Klik link <b> "Chat forum" </b> pada halaman beranda </li>
					<li> Untuk memulai chat forum, user terlebih dahulu membuat topik pembicaraan </li>
					<li> Isi topik, kelas dan angkatan </li>
					<li> Jika user ingin mengedit topik chat forum maka klik tombol <b> "Update" </b> </li>
					<li> Jika user ingin menghapus topik chat forum maka klik tombol <b> "Delete" </b> </li>
					<li> Jika user ingin memulai chat forum antara dosen dan mahasiswa maka klik tombol <b> "Open Forum" </b> </li>
				</ul>
				</div>
			</div>
		</div>
	</div>	
</section>
@endsection
