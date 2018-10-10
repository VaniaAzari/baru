<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
     protected $table ='tugas';

public function dosen()
{
return $this->belongsTo(Dosen::class);
}

public function kelas()
{
return $this->belongsTo(Kelas::class);
}
public function angkatan()
{
return $this->belongsTo(Angkatan::class);
}
public function matakuliah()
{
return $this->belongsTo(Matakuliah::class);
}

public function mahasiswa()
{
return $this->belongsTo(Mahasiswa::class);
}

public function tugasmhs()
{
return $this->belongsTo(TugasMhs::class);
}


}
