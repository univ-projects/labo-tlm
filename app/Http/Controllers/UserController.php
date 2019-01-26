<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\userRequest;
use App\Http\Requests\userEditRequest;
use App\Parametre;
use App\User;
use App\Equipe;
use App\Role;
use Auth;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

     public function index()
    {
        $membres = User::select(DB::raw('*,equipes.id as teamId,users.id as userId'))
        ->join('equipes','equipes.id','=','users.equipe_id')
        ->where('labo_id',Auth::user()->equipe->labo->id)->get();
        $labo = $this->getCurrentLabo();
        $laboratoires=Parametre::all();

        return view('membre.index')->with([
          'laboratoires' => $laboratoires,
          'membres'=>$membres,
          'labo'=>$labo
        ]);
    }

    public function trombi()
    {
      // $membres = User::all()->orderBy('name');
      $labo = $this->getCurrentLabo();
      $membres = DB::table('users')->distinct('id')->orderBy('name')->get();
      $membres = User::select(DB::raw('*,equipes.id as teamId,users.id as userId,users.photo as photoUser'))
      ->join('equipes','equipes.id','=','users.equipe_id')
      ->where('labo_id',Auth::user()->equipe->labo->id)->get();
      $laboratoires=Parametre::all();

      return view('membre.trombinoscope')->with([
        'laboratoires' => $laboratoires,
        'membres'=>$membres,
        'labo'=>$labo
      ]);

    }

    public function details($id)
    {
        $membre = User::find($id);
        $equipes = Equipe::all();
        $roles = Role::all();
        $labo = $this->getCurrentLabo();

        if($membre){
          return view('membre.details')->with([
              'membre' => $membre,
              'equipes' => $equipes,
              'roles' => $roles,
              'labo'=>$labo,

          ]);
        }
        else {
          return view('errors.404');
        }
    }

    public function create()
    {
        $labo = $this->getCurrentLabo();
        $laboratoires=Parametre::all();

        if( Auth::user()->role->nom == 'admin')
            {
                $equipes = Equipe::all();

                return view('membre.create')->with([
                    'laboratoires' => $laboratoires,
                    'equipes' => $equipes,
                    'labo'=>$labo,
                ]);;
            }
            else{
                return view('errors.403',['labo'=>$labo]);
            }
    }

    public function store(userRequest $request)
    {
        $membre = new User();
        $labo = $this->getCurrentLabo();
        if($request->hasFile('img')){
            $file = $request->file('img');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/photo/users'),$file_name);

        }
        else{
            $file_name="userDefault.png";
        }

            $membre->name = $request->input('name');
            $membre->prenom = $request->input('prenom');
            $membre->email = $request->input('email');
            $membre->date_naissance = $request->input('date_naissance');
            $membre->grade = $request->input('grade');
            $membre->password = Hash::make($request->input('password'));
            $membre->equipe_id = $request->input('equipe');
            $membre->num_tel = $request->input('num_tel');
            // $membre->autorisation_public_linkedin = $request->input('autorisation_public_linkedin');
            $membre->autorisation_public_num_tel = $request->input('autorisation_public_num_tel');
            $membre->autorisation_public_photo = $request->input('autorisation_public_photo');
            $membre->autorisation_public_date_naiss = $request->input('autorisation_public_date_naiss');
            // $membre->autorisation_public_rg = $request->input('autorisation_public_rg');
            $membre->lien_rg = $request->input('lien_rg');
            $membre->lien_linkedin = $request->input('lien_linkedin');
            $membre->photo = 'uploads/photo/users/'.$file_name;


            $membre->save();
        return redirect('membres');

    }

    public function edit($id)
    {

        $membre = User::find($id);
        $equipes = Equipe::all();
        $roles = Role::all();
        $labo = $this->getCurrentLabo();

        if($membre){
        if(Auth::user()->role->nom == 'admin' || Auth::user()->id===$membre->id ){
          return view('membre.edit')->with([
              'membre' => $membre,
              'equipes' => $equipes,
              'roles' => $roles,
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

    public function update(userEditRequest $request , $id)
    {

        $membre = User::find($id);
        if($membre){
        $labo = $this->getCurrentLabo();

        if($request->hasFile('img')){
            $file = $request->file('img');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/photo/users'),$file_name);
              $membre->photo = 'uploads/photo/users/'.$file_name;
          }


        $membre->name = $request->input('name');
        $membre->prenom = $request->input('prenom');
        $membre->email = $request->input('email');
        $membre->date_naissance = $request->input('date_naissance');
        $membre->grade = $request->input('grade');
                if((Auth::id() == $membre->id))
                {
                $membre->password =Hash::make($request->input('password'));
                }
        $membre->equipe_id = $request->input('equipe_id');
        $membre->num_tel = $request->input('num_tel');

        $membre->autorisation_public_num_tel = $request->input('autorisation_public_num_tel');
        $membre->autorisation_public_photo = $request->input('autorisation_public_photo');
        $membre->autorisation_public_date_naiss = $request->input('autorisation_public_date_naiss');

        $membre->lien_rg = $request->input('lien_rg');
        $membre->lien_linkedin = $request->input('lien_linkedin');
        if ((Auth::user()->role->nom == 'admin')&& (Auth::id() != $membre->id))
            {
          $membre->role_id = $request->role_id;
            }


        $membre->save();

        return redirect('membres/'.$id.'/details');
      }
      else {
        return view('errors.404');
      }

    }


    public function destroy($id)
    {
        if( Auth::user()->role->nom == 'admin')
            {
              $membre = User::find($id);
              if($membre){
                $membre->delete();
                return redirect('membres');
              }
              else {
                return view('errors.404');
              }
            }
    }




    public function postMembres1(Request $request)
    {
      if($request->labo_selected!=0)
          $response=Parametre::find($request->labo_selected);
      else
          $response=Parametre::all();

          $output='';
          $labId=$request->labo_selected;

          $membres=User::all();

          // $output.='
          //         <table id="example1" class="table table-bordered table-striped">
          //           <thead>
          //           <tr>
          //             <th>Nom</th>
          //             <th>Prénom</th>
          //             <th>Laboratoire</th>
          //             <th>Equipe</th>
          //             <th>Email</th>
          //             <th>Grade</th>
          //             <th>Action</th>
          //           </tr>
          //           </thead> <tbody> ';

            foreach($membres as $membre){
              if((isset($membre->equipe->labo_id) && $membre->equipe->labo_id==$labId ) || $labId==0){

                $output.='    <tr>
                  <td>';
                  $output.=$membre->name;
                  $output.='</td>
                  <td>';
                  $output.=$membre->prenom;
                  $output.='</td>
                  <td>';
                  if($membre->equipe){
                  $output.='<a href="laboratoires/';
                  $output.=$membre->equipe->labo_id;
                  $output.='/details">';
                    $output.=$membre->equipe->labo['achronymes'];
                  $output.='</a>';
                }
                  $output.='</td>
                  <td> ';
                    if($membre->equipe){
                  $output.='<a href="equipes/';
                  $output.=$membre->equipe_id;
                  $output.='/details">';
                     $output.=$membre->equipe->achronymes;
                  $output.='</a>';
                }
                  $output.='</td>
                  <td>';
                  $output.=$membre->email;
                  $output.='</td>
                  <td>';
                  $output.=$membre->grade;
                  $output.='</td>
                  <td>
                    <div class="btn-group">

                      <form action="';
                      $output.= url('membres/'.$membre->id);
                      $output.='" method="post">';
                          $output.=csrf_field();
                          $output.=method_field('DELETE');

                          $output.='<a href="';
                          $output.=url('membres/'.$membre->id.'/details');
                          $output.='" class="btn btn-info">
                            <i class="fa fa-eye"></i>
                          </a>';

                             if(Auth::id() == $membre->id || Auth::user()->role->nom == 'admin' ||
                              ( Auth::user()->role->nom == 'directeur' && isset($membre->equipe->labo->directeur) && Auth::user()->id==$membre->equipe->labo->directeur) )
                              {
                            $output.='<a href="';
                            $output.=url('membres/'.$membre->id.'/edit');
                            $output.='" class="btn btn-default">
                              <i class="fa fa-edit"></i>
                            </a>';



                            $output.='<a href="#supprimer';
                            $output.= $membre->id;
                            $output.='Modal" role="button" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                    <div class="modal fade" id="supprimer';
                    $output.= $membre->id;
                    $output.='Modal" tabindex="-1" role="dialog" aria-labelledby="supprimer';
                    $output.= $membre->id ;
                    $output.='ModalLabel" aria-hidden="true">
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
                                    $output.= url('membres/'.$membre->id);
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
                  $output.='    </form>
                  </div>
                  </td>
                </tr> ';
            }
          }
          // $output.='</tbody>  <tfoot>
          //   <tr>
          //     <th>Nom</th>
          //     <th>Prénom</th>
          //     <th>Laboratoire</th>
          //     <th>Equipe</th>
          //     <th>Email</th>
          //     <th>Grade</th>
          //     <th>Action</th>
          //   </tr>
          //   </tfoot>
          // </table>';
         return response()->json($output);


    }

    public function postMembres2(Request $request)
    {
      if($request->labo_selected!=0)
          $response=Parametre::find($request->labo_selected);
      else
          $response=Parametre::all();

          $output='';
          $labId=$request->labo_selected;

                $membres=User::all();

          foreach($membres as $membre){
            if((isset($membre->equipe->labo_id) && $membre->equipe->labo_id==$labId )|| $labId==0){
            $output.='<div class="col-md-2 col-sm-4 col-xs-6" style="padding-top: 30px;" >';
            $output.='<a href="';
            $output.=url('membres/'.$membre->id.'/details');
            $output.='">
               <img style="height: 200px width:200px; " class="img-thumbnail img-responsive img-circle" src="';
               $output.=asset($membre->photo);
               $output.='" alt="User profile picture" title="';
               $output.='('.$membre->name.') ('.$membre->prenom.')';
               $output.='"></a></div>';

            }
          }

         return response()->json($output);


    }


    public function postMembres3(Request $request)
    {
      if($request->labo_selected!=0)
          {

          $output='';
          $labId=$request->labo_selected;

          $equipes=Equipe::where('labo_id',$labId)->get();
          $output.='<div class="form-group">
            <label class="col-md-3 control-label">Equipe </label>
              <div class="col-md-9 selectContainer">
                <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    <select name="equipe" class="form-control selectpicker">
                      <option></option>';

          foreach($equipes as $e){
                        $output.='<option value="';
                        $output.=$e->id;
                        $output.='">';
                        $output.=$e->intitule;
                        $output.='</option>';
                      }

                    $output.='  </select>
                  </div>
                </div>
          </div>';



         return response()->json($output);
       }

    }





}
