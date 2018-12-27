<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\materielRequest;
use App\Http\Requests\exemplaireRequest;
use App\Parametre;
use App\Materiel;
use App\Category;
use App\User;
use App\Equipe;
use App\Affecter;


use Auth;


class MaterielController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

   public function index()
  {
      // $materiels = Materiel::all();
      $labo = $this->getCurrentLabo();

      // print_r($materiels);die();

        if(Auth::user()->role->nom == 'admin' || Auth::user()->role->nom == 'directeur')
          {
              $laboratoires=Parametre::all();
            //  return view('materiel.index', ['materiels' => $materiels],['labo'=>$labo]);
            if (Auth::user()->role->nom == 'admin') {
                $materiels = Category::all();
            }
            else{
                $materiels = Category::where('laboratoire',Auth::user()->equipe->labo->id)->get();
            }
              return view('materiel.index')->with([
                  'materiels' => $materiels,
                  'labo'=>$labo,
                  'laboratoires'=>$laboratoires
              ]);;
          }
          else{
              return view('errors.403',['labo'=>$labo]);
          }

  }



  public function details($id)
  {
      // $materiel = Materiel::find($id);
      $materiel = Category::find($id);


      $labo = $this->getCurrentLabo();
      $proprietaires = User::all();
      $equipes=Equipe::all();
      $exemplaires = Materiel::where('category_id', $id)->get();
      // print_r($materiel->category);die();
      $affectations = DB::table('affecter')
            ->leftjoin('users', 'users.id', '=', 'affecter.user_id')
            ->leftjoin('equipes', 'equipes.id', '=', 'affecter.proprietaireEquipe')
            ->join('materiels', 'materiels.id', '=', 'affecter.materiel_id')
            ->join('categories', 'categories.id', '=', 'materiels.category_id')
            ->where('categories.id',$id)
            ->get();
    // $affectations2 = DB::table('affecter')
    //               ->join('equipes', 'equipes.id', '=', 'affecter.proprietaireEquipe')
    //               ->join('materiels', 'materiels.id', '=', 'affecter.materiel_id')
    //               ->join('categories', 'categories.id', '=', 'materiels.category_id')
    //               ->where('categories.id',$id)
    //               ->get();
      // $affectations=array_merge($affectations1,$affectations2);

      // $affectations = Affecter::where($materiel->category, $id)->get();
      // print_r($affectations);die();

      if(Auth::user()->role->nom == 'admin' ){
        return view('materiel.details')->with([
            'materiel' => $materiel,
            'proprietaires'=>$proprietaires,
            'labo'=>$labo,
            'exemplaires'=>$exemplaires,
            'affectations'=>$affectations,
            'catId'=>$id,
            'equipes'=>$equipes

        ]);;
      }
      else{
        return view('errors.403',['labo'=>$labo]);
      }
  }

  public function create()
  {
      $labo = $this->getCurrentLabo();
      if( Auth::user()->role->nom == 'admin')
          {
              $proprietaires = User::all();
              $laboratoires = Parametre::all();
              return view('materiel.create')->with([
                  'proprietaires'=>$proprietaires,
                  'labo'=>$labo,
                  'laboratoires'=>$laboratoires

              ]);
              return view('materiel.create' , ['proprietaires' => $proprietaires],['labo'=>$labo]);
          }
          else{
              return view('errors.403',['labo'=>$labo]);
          }
  }

  public function store(materielRequest $request)
  {
      $materiel = new Category();
      $labo = $this->getCurrentLabo();
      if($request->hasFile('img')){
          $file = $request->file('img');
          $file_name = time().'.'.$file->getClientOriginalExtension();
          $file->move(public_path('/uploads/photo/materiels'),$file_name);

      }
      else{
          $file_name="materielDefault.png";
      }


          $materiel->libelle = $request->input('libelle');
          $materiel->laboratoire = $request->input('laboratoire');
          $materiel->quantity = $request->input('quantite');
          $qte=$materiel->quantity;
          $materiel->description = $request->input('description');
          // $materiel->proprietaire = $request->input('proprietaire');

          $materiel->photo = 'uploads/photo/materiels/'.$file_name;

          if($materiel->save()){//si category inséré
            for($i=0;$i<$qte;$i++){ //inserer dans materiel
              $materiels=new Materiel();
              $materiels->category_id=$materiel->id; //category id
              $materiels->numero=time().$i;
              $materiels->save();
            }
          }


      return redirect('materiels');

  }

  public function edit($id)
  {

      // $materiel = Materiel::find($id);
      $proprietaires = User::all();
      $labo = $this->getCurrentLabo();
      $materiel = Category::find($id);

      if(Auth::user()->role->nom == 'admin' ){
        return view('materiel.edit')->with([
            'materiel' => $materiel,
            'proprietaires' => $proprietaires,
            'labo'=>$labo,

        ]);;
      }
      else{
        return view('errors.403',['labo'=>$labo]);
      }

  }

  public function update(materielRequest $request , $id)
  {

      // $materiel = Materiel::find($id);
      $labo = $this->getCurrentLabo();
      $materiel = Category::find($id);

      if($request->hasFile('img')){
          $file = $request->file('img');
          $file_name = time().'.'.$file->getClientOriginalExtension();
          $file->move(public_path('/uploads/photo/materiels'),$file_name);
        }
        else{
          if(!isset($materiel->photo))
            $file_name="materielDefault.png";
        }

        $materiel->libelle = $request->input('libelle');
        $materiel->description = $request->input('description');

      if (isset($file_name)) {
          $materiel->photo = 'uploads/photo/materiels/'.$file_name;
      }




      $materiel->save();

    //  return redirect('materiels/'.$id.'/details');
    return redirect('materiels');

  }


  public function destroy($id)
  {
      if( Auth::user()->role->nom == 'admin')
          {
      // $materiel = Materiel::find($id);
      $materiel = Category::find($id);
      $materiel->delete();
      return redirect('materiels');
          }
  }

  public function editExemplaire(exemplaireRequest $request , $id,$catId)
  {


      $materiel = Materiel::find($id);
      $labo = $this->getCurrentLabo();


        $oldProprietaire=  $materiel->proprietaire;
        $oldProprietaireEquipe=  $materiel->proprietaireEquipe;



        $materiel->numero = $request->input('numero');
        if ($request->input('type_proprietaire')=="membre") {
          $materiel->proprietaire = $request->input('proprietaire');
          $materiel->proprietaireEquipe = NULL;
        }
        else{
          $materiel->proprietaireEquipe = $request->input('proprietaire');
          $materiel->proprietaire = NULL;
        }



        if (isset($materiel->proprietaireEquipe)) { // si c une equipe
          if($materiel->proprietaireEquipe!=$oldProprietaireEquipe){

            if($materiel->save()){
              $affect = new Affecter();
              $affect->materiel_id=$materiel->id;
              $affect->proprietaireEquipe=$materiel->proprietaireEquipe;
              $affect->from=$materiel->created_at;
              $affect->save();
            }
          }
        }
        else  if (isset($materiel->proprietaire)) { // si c un membre

            if($materiel->proprietaire!=$oldProprietaire){

              if($materiel->save()){
                $affect = new Affecter();
                $affect->materiel_id=$materiel->id;
                $affect->user_id=$materiel->proprietaire;
                $affect->from=$materiel->created_at;
                $affect->save();

              }
            }
          }
          else { //si proprietaire n'est pas défini
            $materiel->proprietaire=NULL;
            $materiel->proprietaireEquipe=NULL;
            $materiel->save();
          }

          if(isset($oldProprietaireEquipe)){
            $affectUpdate=Affecter::where('materiel_id', $id)
            ->where('proprietaireEquipe',$oldProprietaireEquipe)
            ->get();
          }
          else if(isset($oldProprietaire)){
            $affectUpdate=Affecter::where('materiel_id', $id)
            ->where('user_id',$oldProprietaire)
            ->get();
          }
          if(isset($affectUpdate)){
            foreach ($affectUpdate as $affected) {
              $affected->to=$materiel->updated_at;
              $affected->save();
            }
          }

    //
    // if(  $materiel->save()){
    //   if (isset($materiel->proprietaire)) {
    //     if (isset($oldProprietaire) || !isset($oldProprietaireEquipe)) {
    //       if($oldProprietaire!=$materiel->proprietaire){
    //           if(isset($materiel->proprietaire)){
    //               $affect = new Affecter();
    //               $affect->materiel_id=$materiel->id;
    //               $affect->user_id=$materiel->proprietaire;
    //               $affect->from=$materiel->created_at;
    //               $affect->save();
    //             }
    //             $affectUpdate=Affecter::where('materiel_id', $id)
    //             ->where('user_id',$oldProprietaire)
    //             ->get();
    //             foreach ($affectUpdate as $affected) {
    //               $affected->to=$materiel->updated_at;
    //               $affected->save();
    //             }
    //       }
    //     }
    //   }
    //   else if(isset($materiel->proprietaireEquipe)){
    //     if (isset($oldProprietaireEquipe) || !isset($oldProprietaire)) {
    //       if($oldProprietaireEquipe!=$materiel->proprietaireEquipe){
    //           if(isset($materiel->proprietaireEquipe)){
    //               $affect = new Affecter();
    //               $affect->materiel_id=$materiel->id;
    //               $affect->proprietaireEquipe=$materiel->proprietaireEquipe;
    //               $affect->from=$materiel->created_at;
    //               $affect->save();
    //             }
    //             $affectUpdate=Affecter::where('materiel_id', $id)
    //             ->where('proprietaireEquipe',$oldProprietaireEquipe)
    //             ->get();
    //             foreach ($affectUpdate as $affected) {
    //               $affected->to=$materiel->updated_at;
    //               $affected->save();
    //             }
    //       }
    //     }
    //   }

        // if($oldProprietaire!=$materiel->proprietaire){
        //     if(isset($materiel->proprietaire)){
        //       $affect = new Affecter();
        //       $affect->materiel_id=$materiel->id;
        //       $affect->user_id=$materiel->proprietaire;
        //       $affect->from=$materiel->created_at;
        //       $affect->save();
        //     }
        //   $affectUpdate=Affecter::where('materiel_id', $id)
        //   ->where('user_id',$oldProprietaire)
        //   ->get();
        //   foreach ($affectUpdate as $affected) {
        //     $affected->to=$materiel->updated_at;
        //     $affected->save();
        //   }
        // }
    //}

    return redirect('materiels/'.$catId.'/details');

  }

  public function addExemplaire(exemplaireRequest $request ,$catId)
  {

        $materiel = new Materiel();
    $labo = $this->getCurrentLabo();

        $materiel->numero = $request->input('numero');
        if ($request->input('type_proprietaire')=="membre") {
          $materiel->proprietaire = $request->input('proprietaire');
        }
        else{
          $materiel->proprietaireEquipe = $request->input('proprietaire');
        }

         $materiel->category_id = $catId;


    if(  $materiel->save()){
      $category = Category::find($catId);
      $qte=$category->quantity;
      $qte++;
      $category->quantity=$qte;
      $category->save();
      if(isset($materiel->proprietaire) || isset($materiel->proprietaireEquipe)){
        $affect = new Affecter();
        $affect->materiel_id=$materiel->id;
        if ($request->input('type_proprietaire')=="membre") {
          $affect->user_id = $request->input('proprietaire');
        }
        else{
          $affect->proprietaireEquipe = $request->input('proprietaire');
        }
        $affect->from=$materiel->created_at;
        $affect->save();
      }
    }



    return redirect('materiels/'.$catId.'/details');
    // return redirect('materiels');

  }


  public function deleteExemplaire($id,$catId)
  {
      if( Auth::user()->role->nom == 'admin')
          {
            $category = Category::find($catId);
            $qte=$category->quantity;
            $qte--;
            $category->quantity=$qte;
            $category->save();

            $materiel = Materiel::find($id);
            $materiel->delete();
            return redirect('materiels/'.$catId.'/details');
          }
  }

  public function postType(Request $request)
  {
    // $response = array(
    //        'status' => 'success',
    //        'type' => $request->type_proprietaire,
    //    );
      $cat=Category::find($request->category);


       if($request->type_proprietaire=="equipe"){
          // $response=Materiel::where('proprietaire', NULL)->get();
          $response=Equipe::where('labo_id',$cat['laboratoire'])->get();
       }
       else {
         $response = User::join('equipes', function ($join) {
                     $join->on('users.equipe_id', '=', 'equipes.id');
                 })
                  ->where('equipes.labo_id', '=', $cat['laboratoire'])
                 ->get();
         //$response=User::where('equipe->labo_id',$request->category)->get();
       }

       if(isset($response)){
         $output='';
         $output.="
         <label class=\"col-md-3 control-label\">Proprietaire </label>
          <div class=\"col-md-9 selectContainer\" >
            <div class=\"input-group\">
            <span class=\"input-group-addon\"><i class=";
              if($request->type_proprietaire=="equipe"){
                 $output.="\"fa fa-lg fa-users\"";
              }
              else{
                $output.="\"fa fa-lg fa-user\"";
              }
            $output.="></i></span>
            <select name=\"proprietaire\" class=\"form-control\">

                <option></option>";
                if($request->type_proprietaire=="equipe"){
                  foreach ($response as $p) {
                    $output.=" <option value=\"$p->id\">$p->intitule</option>";
                  }
                }
                else{
                  foreach ($response as $p) {
                    $output.=" <option value=\"$p->id\">$p->name $p->prenom</option>";
                  }
                }

              $output.="  </select>

            </div>

          </div>
         ";
       }

       return response()->json($output);
  }




public function postMateriels(Request $request)
  {
    if($request->labo_selected!=0)
        $response=Parametre::find($request->labo_selected);
    else
        $response=Parametre::all();

  $output='';
  $labId=$request->labo_selected;


    $materiels=Category::all();


    foreach($materiels as $materiel){
      if( $materiel->laboratory->id==$labId || $labId==0){
          $output.="  <tr><td><img src=\"";
          $output.=asset($materiel->photo);
          $output.="\" alt=\"";
          $output.=$materiel->libelle;
          $output.="\" name=\"\" width=\"250px\" height=\"200px\">";
          $output.="</td><td>";
          $output.=$materiel->libelle;
          $output.="</td><td style=\"250px\">";
          $output.=str_limit($materiel->description, $limit = 60, $end = '...');


          $output.='</td>
          <td style="text-align:center">';
          $output.=$materiel->quantity;
            $output.="<div class=\" pull-right\">
              <a href=\"#add";
              $output.= $materiel->id ;
              $output.="Modal\" role=\"button\" data-toggle=\"modal\"><i class=\"fa fa-plus margin-r-5\" style=\"color:green\"></i></a>
              <div class=\"modal fade\" id=\"add";
              $output.= $materiel->id ;
              $output.="Modal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"add";
              $output.= $materiel->id ;
              $output.="ModalLabel\" aria-hidden=\"true\">
               <div class=\"modal-dialog\">
                   <div class=\"modal-content\">
                       <div class=\"modal-header\">

                         <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                             <span aria-hidden=\"true\">&times;</span>
                         </button>
                     </div>
                     <div class=\"modal-body text-center\">
                         <h2>Ajouter un exemplaire de ce materiel</h2>
                     </div>
                     <div class=\"modal-footer\">
                         <form class=\"well\" action=\"";
                         $output.= url('exemplaires/'.$materiel->id);
                         $output.="\"  method=\"POST\" >";
                         $output.=csrf_field() ;
                         $output.="
                              <fieldset style=\"text-align:center\" id=\"";
                              $output.=$materiel->id;
                              $output.="  \">


                                <div class=\"form-group\">
                                    <label class=\"col-md-3 control-label\">Numéro * </label>
                                      <div class=\"col-md-9\">";

                                      $output.="
                                        <div class=\"input-group\">
                                        <span class=\"input-group-addon\"><i class=\"fa fa-lg fa-barcode\"></i></span>
                                        <input name=\"numero\" placeholder=\"numéro\" class=\"form-control\"  type=\"text\" value=\"";
                                        $output.=old('numero');
                                          $output.="\">

                                        </div>
                                        <span class=\"help-block\">";

                                      $output.="</span>
                                      </div>
                                  </div>

                                <div class=\"form-group\">
                                    <label class=\"col-md-3 control-label\">Type proprietaire </label>
                                      <div class=\"col-md-9 selectContainer\">
                                        <div class=\"input-group\">
                                          <span class=\"input-group-addon\"><i class=\"fa fa-lg fa-user\"></i></span>
                                          <select name=\"type_proprietaire\" class=\"form-control proprietaire_type\">
                                            <option value=\"\" selected></option>
                                            <option value=\"membre\">Membre</option>
                                            <option value=\"equipe\">Equipe</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>


                                <div class=\"form-group\" id=\"proprietaire_result";
                                $output.=$materiel->id;
                                $output.="\">

                                </div>

                            </fieldset>



                              <div class=\"row\" style=\"text-align:center;padding-top: 30px; \">
                                   <button type=\"button\" class=\"btn btn-light\" data-dismiss=\"modal\">Annuler</button>
                                   <button type=\"submit\" class=\" btn btn-lg btn-primary\"><i class=\"fa fa-check\"></i> Ajouter</button>
                              </div>


                         </form>
                     </div>
                 </div>
             </div>
            </div>
            </div>

          </td>
          ";

        //  if( Auth::user()->role->nom == 'admin'){
          $output.='  <td style="text-align:center">
              <a href="';
              $output.=url('laboratoires/'.$materiel->laboratory->id.'/details');
              $output.="\">";
              $output.=$materiel->laboratory->achronymes;
              $output.="</a>
            </td>
            ";
        //  }
        $output.='  <td>
            <div class="btn-group">

              <form action="';
              $output.= url('materiels/'.$materiel->id);
              $output.='" method="post">';
                  $output.=csrf_field();
                  $output.=method_field('DELETE');
                  $output.='
                  <a href="';
                  $output.= url('materiels/'.$materiel->id.'/details');
                  $output.='" class="btn btn-info">
                    <i class="fa fa-eye"></i>
                  </a>';
                   if(Auth::user()->role->nom == 'admin' || Auth::user()->role->nom == 'directeur'){
                      $output.='<a href="';
                      $output.=url('materiels/'.$materiel->id.'/edit');
                      $output.='" class="btn btn-default">
                        <i class="fa fa-edit"></i>
                      </a>';
                    }
                  if(Auth::user()->role->nom != 'membre' ){
                        $output.='
                         <a href="#supprimer';
                         $output.= $materiel->id ;
                         $output.='Modal" role="button" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                         <div class="modal fade" id="supprimer';
                         $output.= $materiel->id ;
                         $output.='Modal" tabindex="-1" role="dialog" aria-labelledby="supprimer';
                         $output.= $materiel->id;
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
                                      $output.= url('materiels/'.$materiel->id);
                                      $output.='"  method="POST">;
                                          @method(\'DELETE\');
                                          @csrf;

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
        </tr>';

      }
    }

       return response()->json($output);


  }


}
