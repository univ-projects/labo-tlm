<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evenement;
use App\User;
use App\EvenementUser;
use App\Parametre;
use Auth;
use App\Http\Requests\evenementRequest;
use Illuminate\Http\UploadedFile;

class EvenementController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }


  //permet de lister les evenements
    public function index(){

      $labo = Parametre::find('1');
      $listevents = Evenement::all();
      return view('evenement.index' , ['evenements' => $listevents] ,['labo'=>$labo]);

    }

    public function details($id)
    {
      $labo = Parametre::find('1');
    $evenement = Evenement::find($id);
    $participants = Evenement::find($id)->users()->orderBy('name')->get();

    return view('evenement.details')->with([
      'evenement' => $evenement,
      'participants'=>$participants,
      'labo'=>$labo,
    ]);;
    }

    public function create()
    {
        $labo = Parametre::find('1');
        // if( Auth::user()->role->nom == 'admin')
        //     {

                return view('evenement.create' , ['labo'=>$labo]);
            //}
            // else{
            //     return view('errors.403',['labo'=>$labo]);
            // }
    }

    public function store(evenementRequest $request)
    {
        $evenement = new Evenement();
        $labo = Parametre::find('1');
        if($request->hasFile('img')){
            $file = $request->file('img');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/photo/evenements'),$file_name);

        }
        else{
            $file_name="evenementDefault.jpg";
        }



            $evenement->titre = $request->input('titre');
            $evenement->contenu = $request->input('contenu');
            $evenement->photo = $request->input('photo');
            $evenement->auteur = Auth::user()->id;
            $evenement->status = $request->input('status');
            $evenement->lieu = $request->input('lieu');

            $allDate=explode(' A ',$request->input('from'));
            $evenement->from = $allDate[0].':00';
            $evenement->to = $allDate[1].':00';

            $evenement->photo = 'uploads/photo/evenements/'.$file_name;
             // print_r($evenement);die();
            $evenement->save();
        return redirect('evenements');

    }



    public function edit($id)
    {

        $evenement = evenement::find($id);
        $labo = Parametre::find('1');

        if(Auth::user()->role->nom == 'admin' || Auth::user()->id===$evenement->auteurUser->id ){
          return view('evenement.edit')->with([
              'evenement' => $evenement,
              'labo'=>$labo,

          ]);;
        }
        else{
           return view('errors.403',['labo'=>$labo]);
        }


    }

    public function update(evenementRequest $request , $id)
    {

        $evenement = evenement::find($id);
        $labo = Parametre::find('1');

        if($request->hasFile('img')){
            $file = $request->file('img');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/photo/evenements'),$file_name);
          }
          else{
            if(!isset($evenement->photo))
              $file_name="evenementDefault.jpg";
          }


          $evenement->titre = $request->input('titre');
          $evenement->contenu = $request->input('contenu');
          $evenement->status = $request->input('status');
          $evenement->auteur = Auth::user()->id;
          $evenement->lieu = $request->input('lieu');

        if (isset($file_name)) {
            $evenement->photo = 'uploads/photo/evenements/'.$file_name;
        }

        $allDate=explode(' A ',$request->input('from'));
        $evenement->from = $allDate[0].':00';
        $evenement->to = $allDate[1].':00';


        $evenement->save();

      //  return redirect('evenements/'.$id.'/details');
      return redirect('evenements');

    }


    public function destroy($id)
    {

              $evenement = Evenement::find($id);
              $evenement->delete();
              return redirect('evenements');

    }


    public function participe($id)
    {
        $participant = new EvenementUser();
        $labo = Parametre::find('1');

        $participant->user_id=Auth::user()->id;
        $participant->evenement_id=$id;



        $participant->save();
        return redirect('evenements/'.$id.'/details');

    }

    public function pasParticipe($id)
    {


        $participation = EvenementUser::where([
          ['user_id', Auth::user()->id],
          ['evenement_id', $id]
          ])->delete();

        return redirect('evenements/'.$id.'/details');


    }


}
