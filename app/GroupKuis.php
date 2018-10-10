<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupKuis extends Model
{
    protected $table ='group_kuis';

    protected $fillable = [
        'name', 'id_kelas', 'id_matakuliah', 'angkatan_id'
    ];

    public function kelas()
    {
        return $this->belongsTo('App\kelas','id_kelas');
    }

    public function matkul()
    {
        return $this->belongsTo('App\matakuliah','id_matakuliah');
    }

     public function angkatan()
    {
        return $this->belongsTo('App\angkatan','angkatan_id');
    }
   
}
