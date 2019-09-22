<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifyUser extends Model
{
 
    protected $fillable = ['user_id','token','guard'];

 
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
