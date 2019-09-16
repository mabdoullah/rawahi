<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Embassador extends Authenticatable
{
    use Notifiable;
    protected $guard = 'embassador';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'embassadors';
    protected $fillable = [
        'first_name', 'second_name', 'email','phone','phone_key',
        'country','city','birth_date','password','confirm_password',
    ];  

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
