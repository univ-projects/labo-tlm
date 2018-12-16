<?php

namespace App\Http\Controllers;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\equipeRequest;
use App\Parametre;
use App\Equipe;
use App\User;
use Auth;

class EquipeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
    $labo = $this->getCurrentLabo();
    $equipes = Equipe::all();
     // $nbr = DB::table('users')
     //            ->groupBy('equipe_id')
     //            ->count('equipe_id');

    $nbr = DB::table('users')
             ->select( DB::raw('count(*) as total,equipe_id'))
             ->groupBy('equipe_id')
             ->get();

        return view('equipe.index')->with([
            'equipes' => $equipes,
            'nbr' => $nbr,
            'labo'=>$labo,
        ]);;
    }

    public function create()
    {
        $labo = $this->getCurrentLabo();
        $labos= Parametre::all();

        if( Auth::user()->role->nom == 'admin')
            {
            	$membres = User::all();
              return view('equipe.create')->with([
                  'labos' => $labos,
                  'membres' => $membres,
                  'labo'=>$labo,
              ]);
            }
            else{
                return view('errors.403' ,['labo'=>$labo]);
            }
    }

    public function details($id)
    {
        $labo = $this->getCurrentLabo();
          $labos= Parametre::all();
        $equipe = Equipe::find($id);
        $membres = User::where('equipe_id', $id)->get();

        return view('equipe.details')->with([
            'equipe' => $equipe,
            'membres' => $membres,
            'labo'=>$labo,
            'labos'=>$labos
        ]);
    }

    public function store(equipeRequest $request)
    {
        $labo = $this->getCurrentLabo();

        $equipe = new equipe();

        if($request->hasFile('img')){
            $file = $request->file('img');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/photo/equipes'),$file_name);

        }
        else{
            $file_name="materielDefault.png";
        }

        $equipe->labo_id = $request->input('labo');
        $equipe->intitule = $request->input('intitule');
        $equipe->resume = $request->input('resume');
        $equipe->achronymes = $request->input('achronymes');
        $equipe->axes_recherche = $request->input('axes_recherche');
        $equipe->chef_id = $request->input('chef_id');
        $equipe->photo = 'uploads/photo/equipes/'.$file_name;

        $equipe->save();

        return redirect('equipes');

    }

    public function update(equipeRequest $request,$id)
    {
        $labo = $this->getCurrentLabo();
        $equipe = Equipe::find($id);

        if( Auth::user()->role->nom == 'admin')
            {

              if($request->hasFile('img')){
                  $file = $request->file('img');
                  $file_name = time().'.'.$file->getClientOriginalExtension();
                  $file->move(public_path('/uploads/photo/equipes'),$file_name);

              }
              else{
                  $file_name="materielDefault.png";
              }

            $equipe->labo_id = $request->input('labo');
            $equipe->intitule = $request->input('intitule');
            $equipe->resume = $request->input('resume');
            $equipe->achronymes = $request->input('achronymes');
            $equipe->axes_recherche = $request->input('axes_recherche');
            $equipe->chef_id = $request->input('chef_id');
            $equipe->photo = 'uploads/photo/equipes/'.$file_name;

            $equipe->save();

            return redirect('equipes/'.$id.'/details');
            }
        else{
                return view('errors.403',['labo'=>$labo]);
            }

    }

    public function destroy($id)
    {
        if( Auth::user()->role->nom == 'admin')
            {
        $equipe = Equipe::find($id);
        $equipe->delete();
        return redirect('equipes');
        }
    }

}
