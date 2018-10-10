<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MateriFile extends Model
{
     protected $table ='materi_file';
     protected $fillable = ['materi_id', 'filename'];

  
      public function materi()
    {
        return $this->belongsTo('App\Materi');
    }
}
