<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
     protected $table ='chat';

public function mahasiswa()
{
return $this->belongsTo(Mahasiswa::class);
}

public function kelas()
{
return $this->belongsTo(Kelas::class);
}

public function chat()
{
return $this->belongsTo(ChatMhs::class);
}

public function dosen()
{
return $this->belongsTo(Dosen::class);
}

public function angkatan()
{
return $this->belongsTo(Angkatan::class);
}


}
