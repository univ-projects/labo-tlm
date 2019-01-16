<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
  public function participant()
   {
       return $this->belongsTo('App\User','user_id');
   }

   public function partenaire()
    {
        return $this->belongsTo('App\Partenaire');
    }

}
