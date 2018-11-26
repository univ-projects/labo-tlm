<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parametre extends Model
{
  public function directeu()
   {
       return $this->belongsTo('App\User','directeur');
   }


}
