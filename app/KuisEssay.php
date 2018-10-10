<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KuisEssay extends Model
{
       protected $table ='kuis_essay';

       public function kuisJawabanEssay()
    {
        return $this->hasMany(KuisJawabanEssay::class);
    }
}
