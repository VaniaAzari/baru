<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/admin','login@index')->middleware('auth:admin');
// 	Route::get('/admin', 'HomeAdminController@hitung')->middleware('auth:admin');
// 		Route::get('caridosen', 'DosenController@search')->middleware('auth:admin');
// Route::group(['prefix'=>'dosen'],function(){
// 	Route::get('/', 'DosenController@index');
// 	Route::get('/create', 'DosenController@create');
// 	Route::post('/simpan', 'DosenController@simpan');
// 	Route::get('/edit/{id}', 'DosenController@edit');
// 	Route::get('show/{id}', 'DosenController@show');
// 	Route::post('update/{id}', 'DosenController@update');
// 	Route::post('delete/{id}', 'DosenController@destroy');
// });

Route::group(['middleware' => 'auth:admin'], function(){


Route::get('/admin', 'HomeAdminController@hitung');
Route::get('/bantuan', 'HomeAdminController@help');
Route::get('logActivity', 'HomeAdminController@logActivity');

Route::group(['prefix'=>'dosen'],function(){
	Route::get('/', 'DosenController@index');
	Route::post('/getdata', 'DosenController@getdata')->name('dosen.getdata');
	Route::get('/create', 'DosenController@create');
	Route::post('/simpan', 'DosenController@simpan');
	Route::get('/edit/{id}', 'DosenController@edit');	
	Route::post('update/{id}', 'DosenController@update');
	Route::delete('/delete','DosenController@deleteGroup')->name('dosen.delete');

});
Route::group(['prefix'=>'mahasiswa'],function(){
	Route::get('/', 'MahasiswaController@index');
	Route::post('/getdata', 'MahasiswaController@getdata')->name('mahasiswa.getdata');
	Route::get('/create', 'MahasiswaController@create');
	Route::post('/simpan', 'MahasiswaController@simpan');
	Route::get('/edit/{id}', 'MahasiswaController@edit');	
	Route::post('update/{id}', 'MahasiswaController@update');
	Route::delete('/delete','MahasiswaController@deleteGroup')->name('mahasiswa.delete');
});
Route::group(['prefix'=>'prodi'],function(){
	Route::get('/', 'ProdiController@index')->name('prodi');
	Route::post('/getdata', 'ProdiController@getdata')->name('prodi.getdata');
	Route::get('/create', 'ProdiController@create');
	Route::post('/simpan', 'ProdiController@simpan');
	Route::get('/edit/{id}', 'ProdiController@edit');
	Route::get('show/{id}', 'ProdiController@show');
	Route::post('update/{id}', 'ProdiController@update');
	Route::delete('/delete/group','ProdiController@deleteGroup')->name('prodi.delete');
	
});
Route::group(['prefix'=>'kelas'],function(){
	Route::get('/', 'KelasController@index');
	Route::post('/getdata', 'KelasController@getdata')->name('kelas.getdata');
	Route::get('/create', 'KelasController@create');
	Route::post('/simpan', 'KelasController@simpan');
	Route::get('/edit/{id}', 'KelasController@edit');	
	Route::post('update/{id}', 'KelasController@update');
	Route::delete('/delete','KelasController@deleteGroup')->name('kelas.delete');
});
Route::group(['prefix'=>'matakuliah'],function(){
	Route::get('/', 'MatakuliahController@index');
	Route::post('/getdata', 'MatakuliahController@getdata')->name('matakuliah.getdata');
	Route::get('/create', 'MatakuliahController@create');
	Route::post('/simpan', 'MatakuliahController@simpan');
	Route::get('/edit/{id}', 'MatakuliahController@edit');
	Route::post('update/{id}', 'MatakuliahController@update');
	Route::delete('/delete','MatakuliahController@deleteGroup')->name('matakuliah.delete');
});

Route::group(['prefix'=>'matakuliahkelas'],function(){
	Route::get('/', 'MatakuliahKelasController@index');
	Route::post('/getdata', 'MatakuliahKelasController@getdata')->name('matakuliahkelas.getdata');
	Route::get('/create', 'MatakuliahKelasController@create');
	Route::post('/simpan', 'MatakuliahKelasController@simpan');
	Route::get('/edit/{id}', 'MatakuliahKelasController@edit');
	Route::post('update/{id}', 'MatakuliahKelasController@update');
	Route::delete('/delete','MatakuliahKelasController@deleteGroup')->name('matakuliahkelas.delete');

});
Route::group(['prefix'=>'angkatan'],function(){
	Route::get('/', 'AngkatanController@index');
	Route::post('/getdata', 'AngkatanController@getdata')->name('angkatan.getdata');
	Route::get('/create', 'AngkatanController@create');
	Route::post('/simpan', 'AngkatanController@simpan');
	Route::get('/edit/{id}', 'AngkatanController@edit');	
	Route::post('update/{id}', 'AngkatanController@update');
	Route::delete('/delete','AngkatanController@deleteGroup')->name('angkatan.delete');
	
});



});

						Route::group(['middleware' => 'auth:dosen'], function(){


						Route::get('logActivity2', 'HomeDosenController@logActivity');	
						Route::get('/homedosen', 'HomeDosenController@hitungdosen');
						Route::get('/helpdosen', 'HomeDosenController@help');
						Route::get('carimateri', 'MateriController@search');
						Route::get('caritugas', 'TugasController@search');	

						Route::group(['prefix'=>'bahanajardosen'],function(){
							Route::get('/','BahanAjarDosenController@index');
							Route::post('/getdata', 'BahanAjarDosenController@getdata')->name('bahanajardosen.getdata');	
						});	

						Route::group(['prefix'=>'bahanajartugasdosen'],function(){
							Route::get('/','BahanAjarTugasDosenController@index');
							Route::post('/getdata', 'BahanAjarTugasDosenController@getdata')->name('bahanajartugasdosen.getdata');	
						});					
					
						Route::group(['prefix'=>'pengumuman'],function(){
							Route::get('/', 'PengumumanController@index');
							Route::post('/getdata', 'PengumumanController@getdata')->name('pengumuman.getdata');
							Route::get('/create', 'PengumumanController@create');
							Route::post('/simpan', 'PengumumanController@simpan');
							Route::get('/edit/{id}', 'PengumumanController@edit');						
							Route::post('update/{id}', 'PengumumanController@update');
							Route::delete('/delete','PengumumanController@deleteGroup')->name('pengumuman.delete');
							
						});
						Route::group(['prefix'=>'materi'],function(){
							Route::get('/{matakuliah_id}/{kelas_id}/{angkatan_id}', 'MateriController@index')->name('materi');
							Route::post('/getdata/{matakuliah_id}/{kelas_id}/{angkatan_id}', 'MateriController@getdata')->name('materi.getdata');
							Route::get('/create/{matakuliah_id}/{kelas_id}/{angkatan_id}', 'MateriController@create');
							Route::post('/simpan/{matakuliah_id}/{kelas_id}/{angkatan_id}', 'MateriController@simpan');
							Route::get('/edit/{id}/{matakuliah_id}/{kelas_id}/{angkatan_id}', 'MateriController@edit');							
							Route::post('update/{id}/{matakuliah_id}/{kelas_id}/{angkatan_id}', 'MateriController@update');							
							Route::delete('/delete','MateriController@deleteGroup')->name('materi.delete');
							Route::get('/detail/{id}', 'MateriController@detail');		
						});
						
						Route::group(['prefix'=>'tugas'],function(){
							Route::get('/{matakuliah_id}/{kelas_id}/{angkatan_id}', 'TugasController@index')->name('tugas');
							Route::post('/getdata/{matakuliah_id}/{kelas_id}/{angkatan_id}', 'TugasController@getdata')->name('tugas.getdata');
							Route::get('/create/{matakuliah_id}/{kelas_id}/{angkatan_id}', 'TugasController@create');
							Route::get('/detail/{id}/{matakuliah_id}/{kelas_id}/{tanggal_masuk}/{angkatan_id}', 'TugasController@detail')->name('tugas.detail');
							Route::post('/simpan/{matakuliah_id}/{kelas_id}/{angkatan_id}', 'TugasController@simpan');
							Route::get('/edit/{id}/{matakuliah_id}/{kelas_id}/{angkatan_id}', 'TugasController@edit');
							Route::get('show/{id}/{matakuliah_id}/{kelas_id}/{angkatan_id}', 'TugasController@show');
							Route::post('update/{id}/{matakuliah_id}/{kelas_id}/{angkatan_id}', 'TugasController@update');
							Route::delete('/delete','TugasController@deleteGroup')->name('tugas.delete');
							Route::get('/editnilai/{id}/{matakuliah_id}/{kelas_id}/{angkatan_id}', 'TugasController@editnilai');
							Route::post('updatenilai/{id}/{matakuliah_id}/{kelas_id}/{angkatan_id}', 'TugasController@updatenilai');
							Route::get('/pdf/{matakuliah_id}/{kelas_id}/{tanggal_masuk}/{angkatan_id}', 'TugasController@pdf');
							

						});
						
						Route::group(['prefix' => 'kuis'], function () {
							Route::get('/group','KuisController@indexGroup')->name('kuis.group');
							Route::post('/save/group','KuisController@saveGroup')->name('kuis.group.save');
							Route::put('/save/group','KuisController@updateGroup')->name('kuis.group.update');
							Route::post('/list/group','KuisController@listGroup')->name('kuis.group.list');
							Route::delete('/delete/group','KuisController@deleteGroup')->name('kuis.group.delete');

							Route::get('/{id}','KuisController@indexKuis')->name('kuis');
							Route::post('/save','KuisController@saveKuis')->name('kuis.save');
							Route::post('/list/{id}','KuisController@listKuis')->name('kuis.list');
							Route::delete('/delete','KuisController@deleteKuis')->name('kuis.delete');

						});

						Route::group(['prefix' => 'kuisessay'], function () {
							Route::get('/group','KuisEssayController@indexGroup')->name('kuis.group.essay');
							Route::post('/save/group','KuisEssayController@saveGroup')->name('kuis.group.essay.save');
							Route::put('/save/group','KuisEssayController@updateGroup')->name('kuis.group.essay.update');
							Route::post('/list/group','KuisEssayController@listGroup')->name('kuis.group.essay.list');
							Route::delete('/delete/group','KuisEssayController@deleteGroup')->name('kuis.group.essay.delete');
							Route::get('/detail/{id}', 'KuisEssayController@detail');
							Route::get('/editnilai/{id}', 'KuisEssayController@editnilai');
							Route::post('updatenilai/{id}', 'KuisEssayController@updatenilai');


							Route::get('/{id}','KuisEssayController@indexKuis')->name('kuisessay');
							Route::post('/save','KuisEssayController@saveKuis')->name('kuis.essay.save');
							Route::post('/list/{id}','KuisEssayController@listKuis')->name('kuis.essay.list');
							Route::put('/save/kuis','KuisEssayController@updateKuis')->name('kuis.essay.update');
							Route::delete('/delete','KuisEssayController@deleteKuis')->name('kuis.essay.delete');


						});

						Route::group(['prefix'=>'profiledosen'],function(){
							Route::get('/', 'ProfilController@profileDosen');
							Route::get('/edit/{id}', 'ProfilController@editDosen');																
							Route::post('update/{id}', 'ProfilController@updateDosen');
																											
						});

						Route::group(['prefix'=>'chat'],function(){
							Route::get('/', 'ChatController@index');
							Route::post('/getdata', 'ChatController@getdata')->name('chat.getdata');						
							Route::get('/create', 'ChatController@create');
							Route::post('/simpan', 'ChatController@simpan');
							Route::get('/edit/{id}', 'ChatController@edit');							
							Route::get('/detail/{id}/{kelas_id}/{angkatan_id}', 'ChatController@detail')->name('chat.list');							
							Route::post('update/{id}', 'ChatController@update');
							Route::post('update2/{id}/{kelas_id}/{angkatan_id}', 'ChatController@update2');
							Route::delete('/delete','ChatController@deleteGroup')->name('chat.delete');
						});

						


							
						});

														Route::group(['middleware' => 'auth:mahasiswa'], function(){

															Route::get('/homemahasiswa', 'HomeMahasiswaController@hitungmahasiswa');
															Route::get('/helpmahasiswa', 'HomeMahasiswaController@help');
															Route::get('caribahan', 'DownloadController@search');
															Route::get('viewAlldownloadfile/{matakuliah_id}/{kelas_id}/{angkatan_id}','DownloadController@downfunc');
															Route::get('logActivity3', 'HomeMahasiswaController@logActivity');	

															Route::group(['prefix' => 'kuis'], function () {
																Route::get('/','KuisController@indexKuisMahasiswa')->name('kuis.mahasiswa');
																Route::get('/soal/{id}','KuisController@indexKuisSoalMahasiswa')->name('kuis.mahasiswa.soal');
																Route::post('/hitung','KuisController@hitungJawaban')->name('kuis.mahasiswa.hitung');
															});		

															Route::group(['prefix' => 'kuisessay'], function () {
																Route::get('/','KuisEssayController@indexKuisMahasiswa')->name('kuisessay.mahasiswa');
																Route::get('/soalessay/{id}','KuisEssayController@indexSoalMahasiswa')->name('kuisessay.mahasiswa.soal');
																Route::post('update/{id}/', 'KuisEssayController@update');
																Route::get('/selesai', 'KuisEssayController@selesaiujian');
																Route::get('/detailnilai/{id}', 'KuisEssayController@detailnilai');
																
															});														
															
															Route::group(['prefix'=>'bahanajar'],function(){
																Route::get('/','BahanAjarController@index');
																Route::post('/getdata', 'BahanAjarController@getdata')->name('bahanajar.getdata');	
															});
															Route::group(['prefix'=>'bahanajartugas'],function(){
																Route::get('/','BahanAjarTugasController@index');
																Route::post('/getdata', 'BahanAjarTugasController@getdata')->name('bahanajartugas.getdata');	
															});													
															
															Route::group(['prefix'=>'tugasmahasiswa'],function(){
																Route::get('/{matakuliah_id}/{kelas_id}/{angkatan_id}', 'TugasMahasiswaController@index')->name('tugasmahasiswa');
																Route::get('/detail/{id}/{tanggal_masuk}/{matakuliah_id}/{kelas_id}/{angkatan_id}', 'TugasMahasiswaController@detail');
																Route::post('/simpan', 'TugasMahasiswaController@simpan');
																Route::get('/edit/{id}/{matakuliah_id}/{kelas_id}/{angkatan_id}', 'TugasMahasiswaController@edit');
																Route::get('show/{id}/{matakuliah_id}/{kelas_id}/{angkatan_id}', 'TugasMahasiswaController@show');
																Route::post('update/{id}/{matakuliah_id}/{kelas_id}/{angkatan_id}', 'TugasMahasiswaController@update');
																Route::post('delete/{id}', 'TugasMahasiswaController@destroy');																
															});
															
															Route::group(['prefix'=>'profile'],function(){
																Route::get('/', 'ProfilController@profileMhs');
																Route::get('/edit/{id}', 'ProfilController@edit');																
																Route::post('update/{id}', 'ProfilController@update');																											
															});

															Route::group(['prefix'=>'chatmhs'],function(){
																Route::get('/', 'ChatMhsController@listgroup');																																													
																Route::post('/simpan', 'ChatMhsController@simpan');
																Route::get('/list/{kelas_id}/{dosen_id}/{chat_id}/{angkatan_id}', 'ChatMhsController@edit')->name('chatmhs.list');	
																Route::get('show/{id}', 'ChatMhsController@show');
																Route::post('update/{kelas_id}/{dosen_id}/{id}/{angkatan_id}', 'ChatMhsController@update');
																Route::post('delete/{id}', 'ChatMhsController@destroy');																
															});

															});
														


Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Route::post('/kirimdata','login@masuk');

Route::get('/keluar','login@keluar');

Route::get('/customerss','CustomerController@index2');
Route::get('/customers','CustomerController@index')->name('pdf');

Route::get('add-to-log', 'HomeAdminController@myTestAddToLog');
Route::get('logActivity', 'HomeAdminController@logActivity');



	

