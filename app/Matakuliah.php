<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    protected $table ='matakuliah';
    protected $fillable = ['nama_matkul'];

public function matakuliahkelas()
{
   return $this->hasMany(MatakuliahKelas::class);
}
public function materi()
{
   return $this->hasMany(Materi::class);
}
public function tugas()
{
   return $this->hasMany(Tugas::class);
}
public function tugasmahasiswa()
{
	return $this->hasMany(TugasMhs::class);
}
public function groupKuis()
{
    return $this->hasMany(GroupKuis::class);
}



}
