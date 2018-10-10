<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Login_dosen extends Authenticatable
{
   protected $table = 'dosen';

public function pengumuman()
{
   return $this->hasMany(Pengumuman::class);
}
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
public function chat()
{
   return $this->hasMany(Chat::class);
}

public function chatdosen()
{
return $this->hasMany(ChatMhs::class);
}




}
