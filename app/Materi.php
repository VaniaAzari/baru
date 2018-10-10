<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
     protected $table ='filetable';
      protected $fillable = ['dosen_id', 'file_title', 'matakuliah_id', 'kelas_id', 'angkatan_id', 'konten'];

     public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function angkatan()
    {
        return $this->belongsTo(Angkatan::class);
    }

    public function materi_file()
    {
         return $this->hasMany(MateriFile::class);
    }



}
