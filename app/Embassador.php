<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Embassador extends Model
{
  protected $table = 'embassadors';
  protected $fillable = [
      'firstname', 'secoundname', 'email','phonenumber','code_phone','country','city','dateofbirth','password','confirmpassword',
  ];
}
