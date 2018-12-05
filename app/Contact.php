<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
  public function partenaire_contact()
   {
       return $this->belongsTo('App\Partenaire','partenaire_id');
   }
}
