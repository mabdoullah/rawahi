<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Partner extends Authenticatable
{
    use Notifiable;

    protected $guard = 'partner';
    protected $fillable = ['ambassador_id'
        , 'partner_type'
        , 'legal_name'
        , 'email'
        , 'subscription_type'
        , 'phone'
        , 'map_address'
        , 'postel_code'
        , 'lat'
        , 'lng'
        , 'city'
        , 'password'
        , 'about'
        , 'facebook'
        , 'instagram'
        , 'twitter',
    ];



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

    public function citydata()
    {
        return $this->belongsTo('App\City','city','id');
    }

    public function ambassadors()
    {
        return $this->belongsTo('App\Ambassador','ambassador_id','id');
    }
}
