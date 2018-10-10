<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table ='mahasiswa';
    protected $fillable = ['username','nama','jenis_kelamin','prodi_id','kelas_id','angkatan_id','password','file_name'];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function angkatan()
    {
        return $this->belongsTo(Angkatan::class);
    }
    public function chatmahasiswa()
    {
        return $this->hasMany(ChatMhs::class);
    }
    public function chat()
    {
        return $this->hasMany(Chat::class);
    }
  

}
