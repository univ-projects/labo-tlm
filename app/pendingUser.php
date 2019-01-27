<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pendingUser extends Model
{
  public function equipe()
  {
      return $this->belongsTo('App\Equipe');
  }
}
