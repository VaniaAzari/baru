<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kuis extends Model
{
    protected $table ='kuis';

    protected $fillable = [
        'pertanyaan', 'group_kuis_id'
    ];

    public function kuisJawaban()
    {
        return $this->hasMany('App\KuisJawaban','kuis_id');
    }

    public function jawabanForDT()
    {
        $ul = '<ul>';
        // $ul = '<li>asda</li>';
        $kuises = $this->kuisJawaban;
        foreach($kuises as $data)
        {
            $li = '<li>'.$data->value.' '.$data->ket .'</li>';
        }
        $endul = '</ul>';
        return $ul.$li.$endul;
    }
}
