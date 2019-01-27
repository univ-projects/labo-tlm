<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\pendingUserRequest;
use App\PendingUser;
use App\User;
use Auth;

class PendingUserController extends Controller
{


  public function index()
 {
     $membres = PendingUser::all();
     $labo = $this->getCurrentLabo();
     // $laboratoires=Parametre::all();
   if(Auth::user() and Auth::user()->role->nom == 'admin'){
     return view('membre.pending')->with([
       // 'laboratoires' => $laboratoires,
       'membres'=>$membres,
       'labo'=>$labo
     ]);
   }
 }

 public function store(pendingUserRequest $request)
 {
     $membre = new PendingUser();
     $labo = $this->getCurrentLabo();

         $file_name="userDefault.png";
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

     return redirect('front');

 }


 public function update( $id)
 {

   $record = PendingUser::find($id);


      unset($record->id);
      $newMember = new User();
      $newMember->name   = $record->name;
      $newMember->prenom = $record->prenom;
      $newMember->email   = $record->email;
      $newMember->date_naissance = $record->date_naissance;
      $newMember->grade =  $record->grade;
      $newMember->equipe_id = $record->equipe_id;
      $newMember->password =  $record->password;
      $newMember->num_tel =  $record->num_tel;

      $newMember->photo = 'uploads/photo/users/userDefault.png';

        $newMember->role_id=2;//simple user

      if($newMember->save()){
        $this->destroy($id);
      }



        return redirect('pendingMembres');


 }




 public function destroy($id)
 {
     if( Auth::user()->role->nom == 'admin')
         {
           $membre = PendingUser::find($id);
           if($membre){
             $membre->delete();
            return redirect('pendingMembres');
           }
           else {
             return view('errors.404');
           }
         }
 }




}
