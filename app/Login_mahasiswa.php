<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Login_mahasiswa extends Authenticatable
{
   protected $table = 'mahasiswa';

public function tugasmahasiswa()
{
return $this->hasMany(TugasMhs::class);
}

public function chat()
{
   return $this->hasMany(Chat::class);
}

public function chatdosen()
{
return $this->hasMany(ChatMhs::class);
}

public function tugas()
{
return $this->hasMany(Tugas::class);
}

public function kuisjawabanessay()
{
return $this->hasMany(KuisJawabanEssay::class);
}


}
