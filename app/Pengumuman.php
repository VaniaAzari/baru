<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $table ='pengumuman';

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
}
