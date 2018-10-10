<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigration;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Prodi;
use App\Angkatan;
use App\Dosen;
use App\Kelas;
use App\Matakuliah;
use App\Mahasiswa;


class CrudTest extends TestCase
{
	use DatabaseTransactions;
	use WithoutMiddleware;
   
    public function testDosenStore()
    {
    	 $this->withoutMiddleware();
    	$dosen = Dosen::create([
    		'username' => '129007',
    		'nama' => 'Indah Lestari',
    		'jenis_kelamin' => 'Perempuan',
    		'email' => 'indah@pcr.ac.id',
    		'password' => '129007',
    		'file_name' => 'indah.JPG',
    	]);
    	$found_dosen = Dosen::orderBy('created_at')->first();
    	$this->assertEquals($found_dosen->username,"129007");
    	$this->assertEquals($found_dosen->nama,"Indah Lestari");
    	$this->assertDatabaseHas('dosen',['nama'=>'Indah Lestari']);

	}

	public function testDosenDelete()
	{
		$nama = null;
		$found_dosen = Dosen::orderBy('created_at')->first();
		$nama = $found_dosen->nama;
		$fi = Dosen::find($found_dosen->id);
		$fi->forceDelete();
		$this->assertDatabaseMissing('dosen',['id'=> $found_dosen->id, 'nama'=>$nama]);
	}

	public function testDosenUpdate()
	{
		$dosen = Dosen::create([
    		'username' => '159025',
    		'nama' => 'Dini Hidayatul Qudsi',
    		'jenis_kelamin' => 'Perempuan',
    		'email' => 'dinihq@pcr.ac.id',
    		'password' => '159025',
    		'file_name' => 'dinihq.JPG',
    	]);

		$found_dosen = Dosen::where('username','159025')->first();

		$this->assertEquals($found_dosen->username,"159025");
		$this->assertEquals($found_dosen->nama,"Dini Hidayatul Qudsi");
		$this->assertDatabaseHas('dosen',['nama'=>'Dini Hidayatul Qudsi']);

		$found_dosen->nama = "Dini Hidayatul Qudsi, S.S.T., M.I.T";
		$found_dosen->save();
		$this->assertDatabaseMissing('dosen',['nama'=>'Dini Hidayatul Qudsi']);
		$this->assertDatabaseHas('dosen',['nama'=>'Dini Hidayatul Qudsi, S.S.T., M.I.T']);

		$nama = null;
		$found_dosen = Dosen::orderBy('created_at')->first();
		$nama = $found_dosen->nama;
		$fi = Dosen::find($found_dosen->id);
		$fi->forceDelete();
	}

	public function testKelasStore()
    {
    	$this->withoutMiddleware();
    	$kelas = Kelas::create([
    		'nama_kelas' => 'SI-A',    		
    	]);
    	$found_kelas = Kelas::orderBy('created_at')->first();
    	$this->assertEquals($found_kelas->nama_kelas,"SI-A");    	
    	$this->assertDatabaseHas('kelas',['nama_kelas'=>'SI-A']);

	}

	public function testKelasDelete()
	{
		$nama_kelas = null;
		$found_kelas= Kelas::orderBy('created_at')->first();
		$nama_kelas = $found_kelas->nama_kelas;
		$fi = Kelas::find($found_kelas->id);
		$fi->forceDelete();
		$this->assertDatabaseMissing('kelas',['id'=> $found_kelas->id, 'nama_kelas'=>$nama_kelas]);
	}

	public function testKelasUpdate()
	{
		$kelas = Kelas::create([
    		'nama_kelas' => 'SI-F',
    	]);

		$found_kelas = Kelas::where('nama_kelas','SI-F')->first();

		$this->assertEquals($found_kelas->nama_kelas,"SI-F");		
		$this->assertDatabaseHas('kelas',['nama_kelas'=>'SI-F']);

		$found_kelas->nama_kelas = "SI-G";
		$found_kelas->save();
		$this->assertDatabaseMissing('kelas',['nama_kelas'=>'SI-F']);
		$this->assertDatabaseHas('kelas',['nama_kelas'=>'SI-G']);

		$nama_kelas = null;
		$found_kelas = Kelas::orderBy('created_at')->first();
		$nama_kelas = $found_kelas->nama_kelas;
		$fi = Kelas::find($found_kelas->id);
		$fi->forceDelete();
	}

	public function testAngkatanStore()
    {
    	$this->withoutMiddleware();
    	$angkatan = Angkatan::create([
    		'nama_angkatan' => '2014',    		
    	]);
    	$found_angkatan = Angkatan::orderBy('created_at')->first();
    	$this->assertEquals($found_angkatan->nama_angkatan,"2014");    	
    	$this->assertDatabaseHas('angkatan',['nama_angkatan'=>'2014']);

	}

	public function testAngkatanDelete()
	{
		$nama_angkatan = null;
		$found_angkatan= Angkatan::orderBy('created_at')->first();
		$nama_angkatan = $found_angkatan->nama_angkatan;
		$fi = Angkatan::find($found_angkatan->id);
		$fi->forceDelete();
		$this->assertDatabaseMissing('angkatan',['id'=> $found_angkatan->id, 'nama_angkatan'=>$nama_angkatan]);
	}

	public function testAngkatanUpdate()
	{
		$angkatan = Angkatan::create([
    		'nama_angkatan' => '2020',
    	]);

		$found_angkatan = Angkatan::where('nama_angkatan','2020')->first();

		$this->assertEquals($found_angkatan->nama_angkatan,"2020");		
		$this->assertDatabaseHas('angkatan',['nama_angkatan'=>'2020']);

		$found_angkatan->nama_angkatan = "2021";
		$found_angkatan->save();
		$this->assertDatabaseMissing('angkatan',['nama_angkatan'=>'2020']);
		$this->assertDatabaseHas('angkatan',['nama_angkatan'=>'2021']);

		$nama_angkatan = null;
		$found_angkatan = Angkatan::orderBy('created_at')->first();
		$nama_angkatan = $found_angkatan->nama_angkatan;
		$fi = Angkatan::find($found_angkatan->id);
		$fi->forceDelete();
	}

	public function testProdiStore()
    {
    	$this->withoutMiddleware();
    	$prodi = Prodi::create([
    		'nama_prodi' => 'Sistem Informasi',    		
    	]);
    	$found_prodi = Prodi::orderBy('created_at')->first();
    	$this->assertEquals($found_prodi->nama_prodi,"Sistem Informasi");    	
    	$this->assertDatabaseHas('prodi',['nama_prodi'=>'Sistem Informasi']);

	}

	public function testProdiDelete()
	{
		$nama_prodi = null;
		$found_prodi= Prodi::orderBy('created_at')->first();
		$nama_prodi = $found_prodi->nama_prodi;
		$fi = Prodi::find($found_prodi->id);
		$fi->forceDelete();
		$this->assertDatabaseMissing('prodi',['id'=> $found_prodi->id, 'nama_prodi'=>$nama_prodi]);
	}

	public function testProdiUpdate()
	{
		$prodi = Prodi::create([
    		'nama_prodi' => 'Sistem Informatika',
    	]);

		$found_prodi = Prodi::where('nama_prodi','Sistem Informatika')->first();

		$this->assertEquals($found_prodi->nama_prodi,"Sistem Informatika");		
		$this->assertDatabaseHas('prodi',['nama_prodi'=>'Sistem Informatika']);

		$found_prodi->nama_prodi = "Farmasi";
		$found_prodi->save();
		$this->assertDatabaseMissing('prodi',['nama_prodi'=>'Sistem Informatika']);
		$this->assertDatabaseHas('prodi',['nama_prodi'=>'Farmasi']);

		$nama_prodi = null;
		$found_prodi = Prodi::orderBy('created_at')->first();
		$nama_prodi = $found_prodi->nama_prodi;
		$fi = Prodi::find($found_prodi->id);
		$fi->forceDelete();
	}

	public function testMatakuliahStore()
    {
    	$this->withoutMiddleware();
    	$matakuliah = Matakuliah::create([
    		'nama_matkul' => 'Kapita Selekta',    		
    	]);
    	$found_matkul = Matakuliah::orderBy('created_at')->first();
    	$this->assertEquals($found_matkul->nama_matkul,"Kapita Selekta");    	
    	$this->assertDatabaseHas('matakuliah',['nama_matkul'=>'Kapita Selekta']);

	}

	public function testMatakuliahDelete()
	{
		$nama_matkul = null;
		$found_matkul= Matakuliah::orderBy('created_at')->first();
		$nama_matkul = $found_matkul->nama_matkul;
		$fi = Matakuliah::find($found_matkul->id);
		$fi->forceDelete();
		$this->assertDatabaseMissing('matakuliah',['id'=> $found_matkul->id, 'nama_matkul'=>$nama_matkul]);
	}

	public function testMatakuliahUpdate()
	{
		$matakuliah = Matakuliah::create([
    		'nama_matkul' => 'Pemograman Web',
    	]);

		$found_matkul = Matakuliah::where('nama_matkul','Pemograman Web')->first();

		$this->assertEquals($found_matkul->nama_matkul,"Pemograman Web");		
		$this->assertDatabaseHas('matakuliah',['nama_matkul'=>'Pemograman Web']);

		$found_matkul->nama_matkul = "Pemograman Web 2";
		$found_matkul->save();
		$this->assertDatabaseMissing('matakuliah',['nama_matkul'=>'Pemograman Web']);
		$this->assertDatabaseHas('matakuliah',['nama_matkul'=>'Pemograman Web 2']);

		$nama_matkul = null;
		$found_matkul = Matakuliah::orderBy('created_at')->first();
		$nama_matkul = $found_matkul->nama_matkul;
		$fi = Matakuliah::find($found_matkul->id);
		$fi->forceDelete();
	}

	public function testMhsStore()
    {
    	$this->withoutMiddleware();
    	$mahasiswa = Mahasiswa::create([
    		'username' => '1457301093',
    		'nama' => 'Vania Azari',
    		'jenis_kelamin' => 'Perempuan',
    		'kelas_id' => '1',
    		'prodi_id' => '1',
    		'angkatan_id' => '1',
    		'password' => '1457301093',
    		'file_name' => 'vania.JPG',
    	]);
    	$found_mhs = Mahasiswa::orderBy('created_at')->first();
    	$this->assertEquals($found_mhs->username,"1457301093");
    	$this->assertEquals($found_mhs->nama,"Vania Azari");
    	$this->assertDatabaseHas('mahasiswa',['nama'=>'Vania Azari']);

	}

	public function testMhsDelete()
	{
		$nama = null;
		$found_mhs= Mahasiswa::orderBy('created_at')->first();
		$nama = $found_mhs->nama;
		$fi = Mahasiswa::find($found_mhs->id);
		$fi->forceDelete();
		$this->assertDatabaseMissing('mahasiswa',['id'=> $found_mhs->id, 'nama'=>$nama]);
	}

	public function testMhsUpdate()
	{
		$mahasiswa = Mahasiswa::create([
    		'username' => '1457301001',
    		'nama' => 'Aminah',
    		'jenis_kelamin' => 'Perempuan',
    		'kelas_id' => '1',
    		'prodi_id' => '1',
    		'angkatan_id' => '1',
    		'password' => '1457301001',
    		'file_name' => 'aminah.JPG',
    	]);

		$found_mhs = Mahasiswa::where('username','1457301001')->first();

		$this->assertEquals($found_mhs->username,"1457301001");
		$this->assertEquals($found_mhs->nama,"Aminah");
		$this->assertDatabaseHas('mahasiswa',['nama'=>'Aminah']);

		$found_mhs->nama = "Aminah Putri";
		$found_mhs->save();
		$this->assertDatabaseMissing('mahasiswa',['nama'=>'Aminah']);
		$this->assertDatabaseHas('mahasiswa',['nama'=>'Aminah Putri']);

		$nama = null;
		$found_mhs = Mahasiswa::orderBy('created_at')->first();
		$nama = $found_mhs->nama;
		$fi = Mahasiswa::find($found_mhs->id);
		$fi->forceDelete();
	}
}

	
