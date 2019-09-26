<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

use App\Traits\VerifyUserTrait;

class Ambassador extends Authenticatable
{
    use VerifyUserTrait;
    use Notifiable;
    protected $guard = 'ambassador';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'ambassadors';
    protected $fillable = [
        'first_name', 'second_name', 'email','phone','phone_key',
        'country','city','birth_date','password','generate_id','agent_id',
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


    public function citydata()
    {
        return $this->belongsTo('App\City','city','id');
    }

    public function agent()
    {
        return $this->belongsTo('App\Agent','agent_id');
    }
    public function partners()
    {
        return $this->hasMany('App\Partner','ambassador_id');
    }
    


}
