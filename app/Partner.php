<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Partner extends Authenticatable
{
   use Notifiable;
    
   protected $guard = 'partner';    
   protected $fillable= ['embassador_id'
                ,'partner_type'
                ,'legal_name'
                ,'email'
                ,'subscription_type'
                ,'phone'
                ,'map_address'
                ,'postel_code' 
                ,'lat'
                ,'lng'
                ,'city'
                ,'password'
                ,'about'
                ,'facebook'
                ,'instagram'
                ,'twitter'
];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'partners';

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
