<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Login_admin extends Authenticatable
{
   protected $table = 'admin';
}
