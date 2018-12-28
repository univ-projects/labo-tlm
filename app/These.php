<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class These extends Model
{
     use SoftDeletes;

     protected $dates = ['deleted_at'];

     public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function contact()
   {
       return $this->belongsTo('App\Contact','coencadreur_ext');
   }
   public function encadreur()
  {
      return $this->belongsTo('App\User','encadreur_int');
  }
  public function coencadreur_intern()
 {
     return $this->belongsTo('App\User','coencadreur_int');
 }
}
