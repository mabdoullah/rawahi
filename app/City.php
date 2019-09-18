<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
  protected $fillable = [
      'name', 'country_id',
  ];
  public function embassadors()
  {
      return $this->hasMany('App\Embassador','city');
  }
}
