<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
  protected $table = 'cities';
  protected $fillable = [
      'name', 'country_id',
  ];
  public function embassadors()
  {
      return $this->hasMany('App\Embassador','city','id');
  }
  public function partners()
  {
      return $this->hasMany('App\Partner','city','id');
  }
}
