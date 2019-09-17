<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifyUser extends Model
{
 
    protected $fillable = ['user_id','user_type','token'];

 
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
