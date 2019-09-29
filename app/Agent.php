<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Traits\VerifyUserTrait;
class Agent extends Authenticatable
{
    use VerifyUserTrait;
    use Notifiable;

    protected $guard = 'agent';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','phone','phone_key',
          'country','city','birth_date','password','admin_id',
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

    public function ambassadors()
    {
        return $this->hasMany('App\Ambassador','agent_id');
    }
    
}
