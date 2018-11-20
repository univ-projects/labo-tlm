<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
  public function proprietaireUser()
   {
       return $this->belongsTo('App\User','proprietaire');
   }
}
