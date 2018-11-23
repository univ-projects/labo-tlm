<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
  public function users()
 {
     return $this->belongsToMany('App\User');
 }

 public function auteurUser()
  {
      return $this->belongsTo('App\User','auteur');
  }
  
}
