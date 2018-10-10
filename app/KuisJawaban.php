<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KuisJawaban extends Model
{
    protected $table ='kuis_jawaban';

    protected $fillable = [
        'value', 'ket', 'kuis_id'
    ];

    public function kuis()
    {
        return $this->belongsTo('App\Kuis','kuis_id');
    }
}
