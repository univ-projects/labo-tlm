<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\These;
use App\Parametre;
use App\User;
use App\Partenaire;
use Auth;
use App\Http\Requests\theseRequest;
use Illuminate\Http\UploadedFile;



class TheseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $theses = These::all();
        $laboratoires=Parametre::all();
        $labo = $this->getCurrentLabo();

        return view('these.index')->with([
          'laboratoires' => $laboratoires,
          'theses'=>$theses,
          'labo'=>$labo
        ]);
    }

    public function details($id)
    {
        $these = These::find($id);
        if($these){
        $labo = $this->getCurrentLabo();
        return view('these.details', ['these' => $these], ['labo'=>$labo]);
      }
      else {
          return view('errors.404');
        }
    }

    public function create()
    {
        if( Auth::user()->role->nom == 'admin')
            {
                $membres = User::all();
                $these = These::all();
                $labo = $this->getCurrentLabo();
                $partenaires=Partenaire::all();
                return view('these.ajouter')->with([
                  'membres' => $membres,
                  'partenaires'=>$partenaires,
                    'labo'=>$labo,
                ]);

            }
            else{
                $labo = $this->getCurrentLabo();
                return view('errors.403', ['labo'=>$labo]);
            }

    }

    public function store(theseRequest $request)
    {
        $labo = $this->getCurrentLabo();
        $these = new These();

         if($request->hasFile('detail')){

            $file = $request->file('detail');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/these/'),$file_name);
            $these->detail = '/uploads/these/'.$file_name;

        }

        $these->titre = $request->input('titre');
        $these->sujet = $request->input('sujet');

        $dateBadFormat = explode("-",$request->input('date_debut'));
        // print_r(  $dateBadFormat);die();
        // $date=$dateBadFormat[0].'-'.$dateBadFormat[1].'-'.$dateBadFormat[0];
        $these->date_debut =$request->input('date_debut');

        $these->date_soutenance = $request->input('date_soutenance');
        $these->encadreur_int = $request->input('encadreur_int');
        $these->coencadreur_ext = $request->input('membres_ext');
        $these->coencadreur_int = $request->input('coencadreur_int');
        $these->user_id = $request->input('user_id');



        $these->save();

        return redirect('theses');

    }

    public function edit($id)
    {
      $labo = $this->getCurrentLabo();
        //if(Auth::id() == $membre->id || Auth::user()->role->nom == 'admin')
            {
        $these = These::find($id);
        if($these){
        $membres = User::all();
        $partenaires=Partenaire::all();

        $this->authorize('update', $these);

        return view('these.edit')->with([
            'these' => $these,
            'membres'=>$membres,
            'partenaires'=>$partenaires,
            'labo'=>$labo,
        ]);;
      }
      else {
          return view('errors.404');
        }
      }
    }
    public function update(theseRequest $request , $id)
    {
        $these = These::find($id);
        if($these){
        $labo = $this->getCurrentLabo();

         if($request->hasFile('detail')){

            $file = $request->file('detail');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/these/'),$file_name);
            $these->detail = '/uploads/these/'.$file_name;

        }

        $these->titre = $request->input('titre');
        $these->sujet = $request->input('sujet');
        $these->date_debut = $request->input('date_debut');
        $these->date_soutenance = $request->input('date_soutenance');
        $these->encadreur_int = $request->input('encadreur_int');
        $these->coencadreur_ext = $request->input('membres_ext');
        $these->coencadreur_int = $request->input('coencadreur_int');
        $these->user_id = $request->input('user_id');

        $these->save();

        return redirect('theses');
      }
      else {
          return view('errors.404');
        }

    }

    public function postType(Request $request)
    {

         $partenaires_ext = $request->type_partenaire;

           if (isset($partenaires_ext)) {

                 $cpt=0;
                 $contacts=array();

                $contacts=DB::table('contacts')
                            ->where('partenaire_id', $partenaires_ext)
                            ->get();

              $contacts=reset($contacts);


           }


          $output='';
         if(isset($contacts)){

                 foreach ($contacts as $contact) {
                   $output.=" <option value=\"$contact->id\">$contact->nom $contact->prenom</option>";
                 }

         }

         return response()->json($output);
    }



    public function destroy($id)
    {

        $these = These::find($id);
        if($these){
        $this->authorize('delete', $these);

        $these->delete();
        return redirect('theses');
       }
        else {
            return view('errors.404');
          }
    }


    public function postTheses(Request $request)
    {
      if($request->labo_selected!=0)
          $response=Parametre::find($request->labo_selected);
      else
          $response=Parametre::all();

          $output='';
          $labId=$request->labo_selected;

                $theses=These::all();

            foreach($theses as $these){
              if($these->user->equipe->labo_id==$labId || $labId==0){
                  $output.="  <tr><td>";
                  $output.=$these->titre;
                  $output.="</td><td>";
                  $output.=$these->sujet;
                  $output.="</td><td>";
                  $output.=$these->name.' ';
                  $output.=$these->prenom;
                  $output.="</td>
                  <td>";
                  if($these->encadreur) {
                    $output.=  "<li> <a href=\"";
                    $output.=url('membres/'.$these->encadreur->id.'/details');
                    $output.="\">";
                    $output.=  $these->encadreur->name.' '.$these->encadreur->prenom;
                    $output.=  "</a></li>";
                  }
                  $output.="</td>
                  <td>";
                  if($these->coencadreur_intern) {
                    $output.=  "<li> <a href=\"";
                    $output.=url('membres/'.$these->coencadreur_intern->id.'/details');
                    $output.="\">";
                    $output.=  $these->coencadreur_intern->name.' '.$these->coencadreur_intern->prenom;
                    $output.=  "</li>";
                  }
                  if($these->contact) {
                    $output.=  "<li> <a href=\"";
                    $output.=url('contacts/'.$these->contact->id.'/details');
                    $output.="\">";
                    $output.=  $these->contact->nom.' '.$these->contact->prenom;
                    $output.=  "</li>";
                  }

                  $output.='</td>
                  <td>';
                  $output.=$these->date_soutenance;
                  $output.='</td>
                  <td>

                    <form action="';
                    $output.= url('theses/'.$these->id);
                    $output.=' method="post">';

                    $output.=  csrf_field();
                    $output.=  method_field('DELETE');
                  $output.='  <a href=" ';
                    $output.=url('theses/'.$these->id.'/details');
                    $output.='" class="btn btn-info">
                      <i class="fa fa-eye"></i>
                    </a>';
                    if(Auth::id() == $these->user_id || Auth::user()->role->nom == 'admin' ){
                    $output.='<a href="';
                    $output.= url('theses/'.$these->id.'/edit');
                    $output.='"class="btn btn-default">
                      <i class="fa fa-edit"></i>
                    </a>';
                    }
                     if(Auth::id() != $these->user_id && Auth::user()->role->nom != 'membre' ){

                    $output.= "<a href=\"#supprimer $these->id Modal\" role=\"button\" class=\"btn btn-danger\" data-toggle=\"modal\"><i class=\"fa fa-trash-o\"></i></a>
                    <div class=\"modal fade\" id=\"supprimer $these->id Modal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"supprimer $these->id ModalLabel\" aria-hidden=\"true\">";
                    $output.='
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center">
                                    Voulez-vous vraiment effectuer la suppression ?
                                </div>
                                <div class="modal-footer">
                                    <form class="form-inline" action="';
                                    $output.= url('theses/'.$these->id);
                                    $output.='"  method="POST">
                                        @method(\'DELETE\')
                                        @csrf
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Non</button>
                                        <button type="submit" class="btn btn-danger">Oui</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>';
                  }
                  $output.='
                    </form>
                  </div>
                  </td>
                </tr>
              ';
            }
          }

         return response()->json($output);


    }




}
