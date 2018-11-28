<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Affecter extends Model
{
    protected $table = "affecter";

    public function userAffect()
    {
      return $this->belongsTo('App\User','user_id');
    }
}
