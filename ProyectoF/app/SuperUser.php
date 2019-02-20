<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SuperUser extends Authenticatable
{
    //
     use Notifiable;
    protected $guard = 'superuser';

     protected $fillable = [
        'email','password',
    ];
     protected $hidden = [
        'password', 'remember_token',
    ];
}
