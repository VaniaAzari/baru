<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TugasMhs extends Model
{
     protected $table ='tugasmahasiswa';

public function mahasiswa()
{
return $this->belongsTo(Mahasiswa::class);
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

public function tugas()
{
return $this->hasMany(Tugas::class);
}

}
