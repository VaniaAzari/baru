<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KuisJawabanEssay extends Model
{
     protected $table ='kuis_jawaban_essay';

      public function kuisEssay()
    {
        return $this->belongsTo(KuisEssay::class);
    }

      public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

}
