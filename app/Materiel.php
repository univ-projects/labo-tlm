<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
  public function proprietaireUser()
   {
       return $this->belongsTo('App\User','proprietaire');
   }
   public function proprietaire_equipe()
    {
        return $this->belongsTo('App\Equipe','proprietaireEquipe');
    }
   public function category()
    {
        return $this->belongsTo('App\Category','category_id');
    }
}
