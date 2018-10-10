<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table ='dosen';
    protected $fillable = ['username','nama','jenis_kelamin','email','password','file_name'];
}
