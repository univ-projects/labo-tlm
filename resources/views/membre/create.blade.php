@extends('layouts.master')

@section('title','LRI | Ajouter un membre')

@section('header_page')

      <h1>
        Membres
        <small>Nouveau</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{url('membres')}}">Membres</a></li>
        <li class="active">Nouveau</li>
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
      <div class="col-xs-12">
        <div class="box">

          <div class="container col-xs-12">

            <form class="well form-horizontal" method="POST" action="{{url('membres')}}" id="contact_form" enctype="multipart/form-data">
              {{ csrf_field() }}
              <fieldset>

                <!-- Form Name -->
                <legend><center><h2><b>Nouveau Membre</b></h2></center></legend><br>

                <!-- Text input-->
                    <div class="col-md-5">

                      <div class="form-group ">
                        <label class="col-md-3 control-label">Nom *</label>
                        <div class="col-md-9 inputGroupContainer @if($errors->get('name')) has-error @endif">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input  name="name" placeholder="Nom" class="form-control"  type="text" value="{{old('name')}}">
                           </div>
                            <span class="help-block">
                                @if($errors->get('name'))
                                  @foreach($errors->get('name') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                        </div>
                      </div>


                       <!-- Text input-->

                      <div class="form-group">
                        <label class="col-md-3 control-label">Prénom *</label>
                        <div class="col-md-9 inputGroupContainer @if($errors->get('prenom')) has-error @endif">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input  name="prenom" placeholder="Prénom" class="form-control"  type="text" value="{{old('prenom')}}">
                          </div>
                            <span class="help-block">
                                @if($errors->get('prenom'))
                                  @foreach($errors->get('prenom') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                        </div>
                      </div>


                       <div class="form-group">
                          <label class="col-md-3 control-label">Grade *</label>
                            <div class="col-md-9 selectContainer @if($errors->get('grade')) has-error @endif">
                              <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
                                  <select name="grade" class="form-control selectpicker">
                                    <option>{{old('grade')}}</option>
                                    <option>MAA</option>
                                    <option>MAB</option>
                                    <option>MCA</option>
                                    <option>MCB</option>
                                    <option>Doctorant</option>
                                    <option>Professeur</option>
                                  </select>

                              </div>
                              <span class="help-block">
                                @if($errors->get('grade'))
                                  @foreach($errors->get('grade') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                            </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label">Laboratoire </label>
                            <div class="col-md-9 selectContainer">
                              <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-flask"></i></span>
                                  <select name="labo" class="form-control selectpicker" id="laboEquipe">
                                    <option></option>
                                     @foreach($laboratoires as $l)
                                    <option value="{{$l->id}}">{{$l->nom}}</option>
                                    @endforeach
                                  </select>

                              </div>
                            </div>
                      </div>

                      <div id="laboEquipeResult">
                        
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label">E-Mail *</label>
                          <div class="col-md-9 inputGroupContainer @if($errors->get('email')) has-error @endif">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input name="email" type="email" class="form-control" placeholder="Email" value="{{old('email')}}" >
                            </div>
                            <span class="help-block">
                                @if($errors->get('email'))
                                  @foreach($errors->get('email') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                          </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label">Password *</label>
                          <div class="col-md-9 inputGroupContainer @if($errors->get('password')) has-error @endif">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa  fa-lock"></i></span>
                                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <span class="help-block">
                                @if($errors->get('password'))
                                  @foreach($errors->get('password') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                          </div>
                      </div>

                    </div>


                <div class="col-md-7">
                    <div class="row">
                      <div class="col-md-9">
                      <div class="form-group">
                            <label class="col-md-4 control-label">Date De Naissance</label>
                            <div class="col-md-8 inputGroupContainer input-group Date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input name="date_naissance"type="text" class="form-control pull-right" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask id="datepicker" value="{{old('date_naissance')}}">
                            </div>
                      </div>
                      </div>
                      <div class="col-md-3">
                      <div class="form-group">
                            <label class="col-md-4 control-label" title="publique?">
                              <input name="autorisation_public_date_naiss" type="checkbox" class="flat-red" value="0" >
                            </label>
                            <label class="control-label">publique ?</label>
                           </div>
                         </div>
                    </div>

                    <div class="row">
                      <div class="col-md-9">
                      <div class="form-group">
                              <label class="col-md-4 control-label">N° Téléphone</label>
                                <div class="col-md-8 input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-phone"></i>
                                </div>
                                <input name="num_tel" type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask value="{{old('num_tel')}}">
                              </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                      <div class="form-group">
                            <label class="col-md-4 control-label" title="publique?">
                              <input name="autorisation_public_num_tel" type="checkbox" class="flat-red" value="0">
                            </label>
                            <label class="control-label">publique ?</label>
                           </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-9">
                      <div class="form-group">
                              <label class="col-md-4 control-label">Linkedin</label>
                                <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="fa  fa-linkedin-square"></i></span>
                                <input name="lien_linkedin" type="text" class="form-control" placeholder="URL" value="{{old('lien_linkedin')}}">
                              </div>
                              </div>
                        </div>
                     </div>
                    <!--  <div class="col-md-3">
                      <div class="form-group">
                            <label class="col-md-4 control-label" title="publique?">
                              <input name="autorisation_public_linkedin" type="checkbox" class="flat-red" value="1">
                            </label>
                            <label class="control-label">publique ?</label>
                           </div>
                         </div> -->
                    </div>

                    <div class="row">
                      <div class="col-md-9">
                      <div class="form-group">
                              <label class="col-md-4 control-label">ResearshGate</label>
                                <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"></span>
                                <input name="lien_rg" type="text" class="form-control" placeholder="URL" value="{{old('lien_rg')}}">
                              </div>
                              </div>
                          </div>
                     </div>
                     <!-- <div class="col-md-3">
                      <div class="form-group">
                            <label class="col-md-4 control-label" title="publique?">
                              <input name="autorisation_public_rg" type="checkbox" class="flat-red" value="1">
                            </label>
                            <label class="control-label">publique ?</label>
                           </div>
                         </div> -->
                    </div>

                    <div class="row">
                         <div class="col-md-9">
                           <div class="form-group">
                               <label class="col-md-3 control-label">Photo</label>

                                   <div class="col-md-9 inputGroupContainer">
                                     <div id='actualite-upload'>
                                       <div class="hvr-profile-img">
                                         <input type="file" name="img" id='actualite-photo'  class="upload w180" title="Dimensions 180 X 180" id="imag">
                                       </div>
                                       <i class="fa fa-camera"> <h4>Importer une photo de profile</h4></i>
                                     </div>

                                   </div>
                           </div>

                          </div>

                         <div class="col-md-3">
                           <div class="form-group">
                            <label class="col-md-4 control-label">
                              <input name="autorisation_public_photo" type="checkbox" class="flat-red" value="0">
                            </label>
                            <label class="control-label">publique ?</label>
                           </div>
                         </div>

                     </div>

                 </div>

              </fieldset>

              <div style="padding-top: 30px; margin-left: 35%;">
              <a href="{{url('membres')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
               <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Valider</button>
                  </div>
            </form>
          </div>
         </div><!-- /.container -->
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
