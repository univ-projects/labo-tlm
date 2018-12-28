<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  public function category()
   {
       return $this->hasMany('App\Materiel','category_id');
   }
   public function laboratory()
    {
        return $this->belongsTo('App\Parametre','laboratoire');
    }
}
