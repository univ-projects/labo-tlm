<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actualite extends Model
{
  public function auteurUser()
   {
       return $this->belongsTo('App\User','auteur');
   }
}
