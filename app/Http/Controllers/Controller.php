<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;
use App\Parametre;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getCurrentLabo()
    {
      if(Auth::user()){
      $labo= DB::table('parametres')
               ->select( DB::raw('equipes.labo_id,users.equipe_id,users.id,parametres.id as id'))
               ->leftjoin('equipes', 'equipes.labo_id', '=', 'parametres.id')
               ->leftjoin('users', 'equipes.id', '=', 'users.equipe_id')
               ->where('users.id',Auth::user()->id)
               ->get();

     $labo=reset($labo);
     $labo=reset($labo);
     return (isset($labo->id))?Parametre::find($labo->id):'';
      }
    }

}
