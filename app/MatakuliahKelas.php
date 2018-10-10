<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatakuliahKelas extends Model
{
    protected $table ='matakuliahkelas';


	public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class);
    }
    
    public function angkatan()
    {
        return $this->belongsTo(Angkatan::class);
    }
}
