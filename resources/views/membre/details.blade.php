@extends('layouts.master')

@section('title','LRI | Profil')

@section('header_page')

	  <h1>
        Profil

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Profil</li>
      </ol>

@endsection

@section('asidebar')

 @endsection

@section('content')

<style media="screen">
  #actualite-upload{
    background-image:url('');
    background-size:cover;
    background-position: center;
    height: 250px; width: 250px;
    border: 1px solid #bbb;
    position:relative;
  border-radius:30px;
  overflow:hidden;
  color:#007bff
  }
  #actualite-upload:hover input.upload{
  display:block;
  }
  #actualite-upload:hover .hvr-profile-img{
  display:inline-block;
  }
  #actualite-upload .fa{   margin: auto;
    position: absolute;
    bottom: -4px;
    left: 0;
    text-align: center;
    right: 0;
    padding: 6px;
   opacity:1;
  transition:opacity 1s linear;
   -webkit-transform: scale(.75);


  }
  #actualite-upload:hover .fa{
   opacity:1;
   -webkit-transform: scale(1);
  }
  #actualite-upload input.upload {
    z-index:1;
    left: 0;
    margin: 0;
    bottom: 0;
    top: 0;
    padding: 0;
    opacity: 0;
    outline: none;
    cursor: pointer;
    position: absolute;
    background:#ccc;
    width:100%;
    display:none;
  }

  #actualite-upload .hvr-profile-img {
  width:100%;
  height:100%;
  display: none;
  position:absolute;
  vertical-align: middle;
  position: relative;
  background: transparent;
  }
  #actualite-upload .fa:after {
    content: "";
    position:absolute;
    bottom:0; left:0;
    width:100%; height:0px;
    background:rgba(0,0,0,0.3);
    z-index:-1;
    transition: height 0.3s;
    }

  #actualite-upload:hover .fa:after { height:100%; }
</style>

<div class="row">
        <div class="col-md-3">


          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src=" {{asset($membre->photo)}}" alt="User profile picture">

              <h3 class="profile-username text-center">{{$membre->name}} {{$membre->prenom}}</h3>

              <p class="text-muted text-center">{{$membre->grade}}</p>
              <div class="text-center">
                <div class="btn-group">
              <a href="{{$membre->lien_linkedin}}" class="btn btn-social-icon btn-linkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a>
              <a href="{{$membre->lien_rg}}" class="btn btn-social-icon" title="Researchgate"><img src="{{asset('/rg.png')}}"></a>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>

        </div>
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">A propos</a></li>
              @if(Auth::id() == $membre->id || Auth::user()->role->nom == 'admin' )
              <li><a href="#activity1" data-toggle="tab">Modifier</a></li>
              @endif
              <li><a href="#timeline" data-toggle="tab">Articles</a></li>
            </ul>

            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <div class="box-body">
                  @if($membre->date_naissance && ( $membre->autorisation_public_date_naiss || Auth::user()->role->nom == 'admin' || Auth::id() == $membre->id))
                  <div class="row">
                  <div class="col-md-3">
                    <strong>Date de naissance</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{$membre->date_naissance}}
                    </p>
                  </div>
                  </div>
                  @endif

                  @if($membre->num_tel && ( $membre->autorisation_public_date_naiss || Auth::user()->role->nom == 'admin' || Auth::id() == $membre->id))
                  <div class="row" style="margin-top: 10px">
                  <div class="col-md-3">
                    <strong>N° de télépone</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{$membre->num_tel}}
                    </p>
                  </div>
              	  </div>
                  @endif

									@if($membre->equipe_id)
								<div class="row" style="margin-top: 10px">
								<div class="col-md-3">
									<strong><i class="fa fa-flask  margin-r-5"></i>Laboratoire</strong>
								 </div>
									<div class="col-md-9">
										<a href="{{url('laboratoires/'.$membre->equipe->labo_id.'/details')}}">{{$membre->equipe->labo['nom']}}</a>
									</div>
								</div>
								@endif

                  @if(isset($membre->equipe_id))
                <div class="row" style="margin-top: 10px">
                <div class="col-md-3">
                  <strong><i class="fa fa-group  margin-r-5"></i>Equipe</strong>
                 </div>
                  <div class="col-md-9">

                    <a href="{{url('equipes/'.$membre->equipe_id.'/details')}}">{{$membre->equipe->intitule}}</a>
                  </div>
                </div>
                @endif

                <div class="row" style="margin-top: 10px">
                 <div class="col-md-3" style="padding-top: 10px">
                   <strong><i class="fa fa-envelope margin-r-5"></i>Email</strong>
                 </div>
                 <div class="col-md-9" style="padding-top: 10px">
                   {{$membre->email}}
                 </div>
                </div>


              <strong><i class="margin-r-5"></i></strong>
              <hr>
              @if($membre->these)
                <div class="col-md-3">
                  <strong><i class="fa fa-graduation-cap margin-r-5"></i> Thèse </strong>
                 </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      <strong> Titre : </strong> {{$membre->these->titre}}
                      </p>
                    <p class="text-muted">

                      <strong>Résumé :</strong>  {{$membre->these->sujet}}
                    </p>
                     <p class="text-muted">
                      <strong>Encadreur :</strong> {{$membre->these->encadreur_int}}{{$membre->these->encadreur_ext}}
                      </p>
                      <p class="text-muted">
                     <strong>Coencadreur :</strong> {{$membre->these->coencadreur_int}}{{$membre->these->coencadreur_ext}}
                     </p>

                  </div>
                @endif

            </div>
              </div>




              <div class="tab-pane" id="timeline">
                 <div class="box-body" style="padding-top: 30px;">

                  <div class="pull-right">
                <a href="{{url('articles/create')}}" type="button" class="btn btn-block btn-success btn-lg"><i class="fa fa-plus"> Nouvel article</i></a>
              </div>

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Type</th>
                  <th>Titre</th>
                  <th>Année</th>
                  @if((Auth::id() != $membre->id))
                  <th>Actions</th>
                  @endif
                </tr>
                </thead>
                <tbody>
                  @foreach ($membre->articles as $article)
                  <tr>
                    <td>{{$article->type}}</td>
                    <td>{{$article->titre}}</td>

                    <td>{{$article->annee}}</td>
                    <td>

                      <div class="btn-group">
                        <form action="{{ url('articles/'.$article->id)}}" method="post">

                          {{csrf_field()}}
                          {{method_field('DELETE')}}

                        <a href="{{ url('articles/'.$article->id.'/details')}}" class="btn btn-info">
                            <i class="fa fa-eye"></i>
                        </a>
                        @if(Auth::user()->role->nom == 'admin' || Auth::user()->id == $article->deposer)
                        <a href="{{ url('articles/'.$article->id.'/edit')}}" class="btn btn-default">
                          <i class="fa fa-edit"></i>
                        </a>
                        @endif
                        @if( Auth::user()->role->nom != 'membre' || Auth::user()->id == $article->deposer)
                        <button type="submit" class="btn btn-danger ">
                            <i class="fa fa-trash-o"></i>
                        </button>
                        @endif
                        </form>
                      </div>

                    </td>
                  </tr>
                  @endforeach
                 </tbody>
                <tfoot>
                <tr>
                  <th>Titre</th>
                  <th>Type</th>

                  <th>Année</th>
                  @if((Auth::id() != $membre->id))
                  <th>Actions</th>
                  @endif
                </tr>
                </tfoot>
              </table>
            </div>
              </div>





          <div class="tab-pane" id="activity1">
            <form class="well form-horizontal" action=" {{url('membres/'. $membre->id) }} " method="post"  id="contact_form" enctype="multipart/form-data">

            	<input type="hidden" name="_method" value="PUT">
              {{ csrf_field() }}

              <fieldset>

                      <div class="form-group ">
                        <label class="col-md-3 control-label">Nom</label>
                        <div class="col-md-9 inputGroupContainer @if($errors->get('name')) has-error @endif">
                          <div class="input-group"  style="width: 40%">
                            <input  name="name" class="form-control" value="{{$membre->name}}" type="text">
                            <span class="help-block">
                                @if($errors->get('name'))
                                  @foreach($errors->get('name') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                          </div>
                        </div>
                      </div>

                       <!-- Text input-->

                      <div class="form-group">
                        <label class="col-md-3 control-label">Prénom</label>
                        <div class="col-md-9 inputGroupContainer @if($errors->get('prenom')) has-error @endif">
                          <div class="input-group"  style="width: 40%">
                            <input  name="prenom" value="{{$membre->prenom}}" class="form-control"  type="text">
                            <span class="help-block">
                                @if($errors->get('prenom'))
                                  @foreach($errors->get('prenom') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                          </div>
                        </div>
                      </div>


                       <div class="form-group">
                          <label class="col-md-3 control-label">Grade</label>
                            <div class="col-md-9 selectContainer @if($errors->get('grade')) has-error @endif">
                              <div class="input-group" style="width: 40%">
                                  <select name="grade" class="form-control selectpicker">
                                  	<option>{{$membre->grade}}</option>
                                    <option>MAA</option>
                                    <option>MAB</option>
                                    <option >MCA</option>
                                    <option >MCB</option>
                                    <option>Doctorant</option>
                                    <option >Professeur</option>
                                  </select>
                                  <span class="help-block">
                                @if($errors->get('grade'))
                                  @foreach($errors->get('grade') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                              </div>
                            </div>
                      </div>

                      @if((Auth::user()->role->nom == 'admin') && (Auth::id() != $membre->id))
                      <div class="form-group">
                         <label class="col-md-3 control-label">Role</label>
                             <div class="col-md-9 inputGroupContainer">
                               <div class="input-group"  style="width: 40%">
                                  <select class="form-control" id="role_id" lass="form-control" name="role_id">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}" {{ ($membre->role_id == $role->id) ? 'selected' : '' }}>{{ $role->nom }}</option>
                                        @endforeach
                                  </select>
                                </div>
                              </div>
                          </div>
                        @endif


                      <div class="form-group">
                          <label class="col-md-3 control-label">Equipe</label>
                            <div class="col-md-9 selectContainer @if($errors->get('equipe')) has-error @endif">
                              <div class="input-group"  style="width: 40%">
                                  <select name="equipe_id" class="form-control selectpicker">
																		@if(isset($membre->equipe))
                                    	<option value="{{$membre->equipe_id}}">{{$membre->equipe->intitule}}</option>
																		@endif
                                    @foreach($equipes as $equipe)
                                    <option value="{{$equipe->id}}">{{$equipe->intitule}}</option>
                                    @endforeach

                                  </select>
                                  <span class="help-block">
                                @if($errors->get('equipe_id'))
                                  @foreach($errors->get('equipe_id') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                              </div>
                            </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label">E-Mail</label>
                          <div class="col-md-9 inputGroupContainer @if($errors->get('email')) has-error @endif">
                            <div class="input-group"  style="width: 40%">
                                <input name="email" type="email" class="form-control" value="{{$membre->email}}">
                                <span class="help-block">
                                @if($errors->get('email'))
                                  @foreach($errors->get('email') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                            </div>
                          </div>
                      </div>
                       @if((Auth::id() == $membre->id))
                      <div class="form-group">
                        <label class="col-md-3 control-label">Password</label>
                          <div class="col-md-9 inputGroupContainer">
                            <div class="input-group"  style="width: 40%">
                                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder ="Entrez un nouveau mot de passe">
                            </div>
                          </div>
                      </div>
                      @endif

                    <div class="row">
                      <div class="col-md-7">
                      <div class="form-group">
                            <label class="col-md-6 control-label">Date_Naissance</label>
                            <div class="col-md-6 inputGroupContainer input-group Date">
                              <input name="date_naissance" type="text" class="form-control pull-right" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask id="datepicker" value="{{$membre->date_naissance}}">
                            </div>
                      </div>
                      </div>
                      <div class="col-md-1">
                      <div class="form-group" title="Publique?">
                            <label class="col-md-4 control-label">
                              <input name="autorisation_public_date_naiss" type="checkbox" class="flat-red" value="{{$membre->autorisation_public_date_naiss}}" @if($membre->autorisation_public_date_naiss) checked @endif>
                            </label>
                           </div>
                         </div>
                    </div>

                    <div class="row">
                      <div class="col-md-7">
                      <div class="form-group">
                              <label class="col-md-6 control-label">N° Téléphone</label>
                                <div class="col-md-6 input-group">
                                <input name="num_tel" type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask value="{{$membre->num_tel}}">
                              </div>
                        </div>
                      </div>
                      <div class="col-md-1">
                      <div class="form-group" title="Publique?">
                            <label class="col-md-4 control-label">
                              <input name="autorisation_public_num_tel" type="checkbox" class="flat-red" value="{{$membre->autorisation_public_num_tel}}" @if($membre->autorisation_public_num_tel) checked @endif >
                            </label>
                           </div>
                         </div>
                    </div>

                    <div class="row">
                      <div class="col-md-7">
                      <div class="form-group">
                              <label class="col-md-6 control-label">Linkedin</label>
                                <div class="col-md-6 inputGroupContainer">
                                <div class="input-group">
                                <input name="lien_linkedin" type="text" class="form-control" value ="{{$membre->lien_linkedin}}">
                              </div>
                              </div>
                        </div>
                     </div>
                     <!-- <div class="col-md-1">
                      <div class="form-group" title="Publique?">
                            <label class="col-md-4 control-label">
                              <input name="autorisation_public_linkedin" type="checkbox" class="flat-red" value="{{$membre->autorisation_public_linkedin}}">
                            </label>
                           </div>
                         </div> -->
                    </div>

                    <div class="row">
                      <div class="col-md-7">
                      <div class="form-group">
                              <label class="col-md-6 control-label">ResearshGate</label>
                                <div class="col-md-6 inputGroupContainer">
                                <div class="input-group">
                                <input name="lien_rg" type="email" class="form-control" value="{{$membre->lien_rg}}">
                              </div>
                              </div>
                          </div>
                     </div>
                     <!-- <div class="col-md-1">
                      <div class="form-group" title="Publique?">
                            <label class="col-md-4 control-label">
                              <input name="autorisation_public_rg" type="checkbox" class="flat-red" value= "{{$membre->autorisation_public_linkedin}}">
                            </label>
                           </div>
                         </div> -->
                    </div>

										 @if(Auth::id() == $membre->id)
										<div class="form-group">
												<label class="col-md-3 control-label">Photo</label>

														<div class="col-md-9 inputGroupContainer">
															<div id='actualite-upload' style="background-image:url('{{asset($membre->photo)}}')">
																<div class="hvr-profile-img">
																	<input type="file" name="img" id='actualite-photo'  class="upload w180" title="Dimensions 180 X 180" id="imag">
																</div>
																<i class="fa fa-camera"> <h4>Importer une photo de profile</h4></i>
															</div>

														</div>
										</div>
										@endif

              </fieldset>

              <div style="padding-top: 30px; margin-left: 35%;">
              <a href="{{url('membres')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
               <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Valider</button>
                  </div>
            </form>
          </div>

              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
      </div>

			<script type="text/javascript">
					document.getElementById('actualite-photo').addEventListener('change', readURL, true);
					function readURL(){
						var file = document.getElementById("actualite-photo").files[0];
						var reader = new FileReader();
						reader.onloadend = function(){
								document.getElementById('actualite-upload').style.backgroundImage = "url(" + reader.result + ")";
						}
						if(file){
								reader.readAsDataURL(file);
						}else{
						}
					}
		</script>

@endsection
