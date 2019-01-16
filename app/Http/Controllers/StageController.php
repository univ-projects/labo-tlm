<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Stage;
use App\User;
use App\Parametre;
use App\Partenaire;
use Auth;
use App\Http\Requests\stageRequest;

class StageController extends Controller
{

  public function __construct()
    {
        $this->middleware('auth');
    }


  //permet de lister les stages
    public function index(){

      $labo = $this->getCurrentLabo();
      if(Auth::user()->role->nom == 'admin')
        $listStages = Stage::all();
      else
        $listStages = Stage::join('users','users.id','=','stages.user_id')
                          ->join('equipes','equipes.id','=','users.equipe_id')
                          ->where('labo_id',Auth::user()->equipe->labo->id)->get();

      return view('stage.index' , ['stages' => $listStages] ,['labo'=>$labo]);

    }

    public function create()
    {
        $labo = $this->getCurrentLabo();
        if(Auth::user()->role->nom == 'admin')
          $participants = User::all();
        else
            $participants = User::join('equipes','equipes.id','=','users.equipe_id')
                              ->where('labo_id',Auth::user()->equipe->labo->id)->get();

        $partenaires = Partenaire::all();


        return view('stage.create')->with([
          'participants'=>$participants,
          'partenaires'=>$partenaires,
          'labo'=>$labo,
        ]);;
    }


    public function store(stageRequest $request)
    {
        $stage = new Stage();
        $labo = $this->getCurrentLabo();

            $stage->description = $request->input('description');
            $stage->user_id = $request->input('participant');
            $stage->partenaire_id = $request->input('partenaire');

            $allDate=explode(' A ',$request->input('from'));
            $stage->from = $allDate[0];
            $stage->to = $allDate[1];

            $stage->save();

        return redirect('stages');

    }


    public function edit($id)
    {

        $stage = Stage::find($id);
        if($stage){
        $labo = $this->getCurrentLabo();

        if(Auth::user()->role->nom == 'admin' || (Auth::user()->role->nom == 'directeur' && Auth::user()->id==$stage->participant->equipe->labo->directeur)){
          if(Auth::user()->role->nom == 'admin')
            $participants = User::all();
          else
              $participants = User::join('equipes','equipes.id','=','users.equipe_id')
                                ->where('labo_id',Auth::user()->equipe->labo->id)->get();

          $partenaires = Partenaire::all();


          return view('stage.edit')->with([
            'participants'=>$participants,
            'partenaires'=>$partenaires,
              'stage' => $stage,
              'labo'=>$labo,

          ]);;
        }
        else{

           return view('errors.403',['labo'=>$labo]);
        }
      }
      else {
          return view('errors.404');
        }


    }

    public function update(stageRequest $request , $id)
    {

        $stage = Stage::find($id);
          $labo = $this->getCurrentLabo();
          if($stage){

            $stage->description = $request->input('description');
            $stage->user_id = $request->input('participant');
            $stage->partenaire_id = $request->input('partenaire');

            $allDate=explode(' A ',$request->input('from'));
            $stage->from = $allDate[0];
            $stage->to = $allDate[1];

            $stage->save();


      //  return redirect('stages/'.$id.'/details');
      return redirect('stages');
    }
    else {
        return view('errors.404');
      }

    }





    public function destroy($id)
    {

              $stage = Stage::find($id);
              if($stage){
              $stage->delete();
              return redirect('stages');
            }
            else {
                return view('errors.404');
              }

    }

}
