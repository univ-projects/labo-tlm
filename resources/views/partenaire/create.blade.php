@extends('layouts.master')

@section('title','LRI | Ajouter une équipe')

@section('header_page')

      <h1>
        Partenaires
        <small>Nouveau</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{url('partenaires')}}">Partenaires</a></li>
        <li class="active">Ajouter</li>
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

            <form class="well form-horizontal" action=" {{url('partenaires')}} " method="post"  id="contact_form" enctype="multipart/form-data">
              {{ csrf_field() }}
              <fieldset>

                <!-- Form Name -->
                <legend><center><h2><b>Nouveau partenaire</b></h2></center></legend><br>


                  <div class="form-group">
                        <label class="col-xs-3 control-label">Intitulé (*)</label>
                        <div class="col-xs-9 inputGroupContainer @if($errors->get('intitule')) has-error @endif">
                          <div style="width: 70%">
                            <input  name="intitule" class="form-control" placeholder="intitule" type="text" value="{{old('titre')}}">
                              <span class="help-block">
                                @if($errors->get('intitule'))
                                  @foreach($errors->get('intitule') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>

                          </div>
                        </div>
                  </div>

                  <div class="form-group">
                        <label class="col-xs-3 control-label">Type (*)</label>
                        <div class="col-xs-9 inputGroupContainer @if($errors->get('type')) has-error @endif">
                          <div style="width: 70%">
                            <select class="form-control" name="type">
                                <option value="organisme">Organisme</option>
                                <option value="laboratoire">Laboratoire</option>
                                <option value="entreprise">Entreprise</option>
                                <option value="administration">Administration</option>
                                <option value="autre">Autre</option>
                            </select>
                              <span class="help-block">
                                @if($errors->get('type'))
                                  @foreach($errors->get('type') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>

                          </div>
                        </div>
                  </div>


                  <div class="form-group">
                      <label class="col-md-3 control-label">Pays (*)</label>
                      <div class="col-md-9 inputGroupContainer" >
                        <div id="select-country" data-input-name="pays" data-selected-country="DZ"></div>
                      </div>
                  </div>


                  <div class="form-group">
                        <label class="col-xs-3 control-label">Ville (*)</label>
                        <div class="col-xs-9 inputGroupContainer @if($errors->get('ville')) has-error @endif">
                          <div style="width: 70%">
                            <input  name="ville" class="form-control" placeholder="Ville" type="text" value="{{old('ville')}}">
                              <span class="help-block">
                                @if($errors->get('ville'))
                                  @foreach($errors->get('ville') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>

                          </div>
                        </div>
                  </div>


                  <div class="form-group">
                      <label class="col-md-3 control-label">Résumé</label>
                      <div class="col-md-9 inputGroupContainer @if($errors->get('resume')) has-error @endif" >
                        <div style="width: 70%">
                          <textarea name="resume" class="form-control" rows="3" placeholder="Entrez ..." id="txt">{{old('resume')}}</textarea>

                            <span class="help-block">
                                @if($errors->get('resume'))
                                  @foreach($errors->get('resume') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>

                        </div>
                      </div>
                  </div>


                  <div class="form-group">
                        <label class="col-xs-3 control-label">Lien</label>
                        <div class="col-xs-9 inputGroupContainer ">
                          <div style="width: 70%">
                            <input  name="lien" class="form-control" placeholder="http://" type="text" value="{{old('lien')}}">
                          </div>
                        </div>
                  </div>

                  <div class="form-group">
                      <label class="col-md-3 control-label">Photo</label>

                          <div class="col-md-9 inputGroupContainer">
                            <div id='actualite-upload'>
                              <div class="hvr-profile-img">
                                <input type="file" name="img" id='actualite-photo'  class="upload w180" title="Dimensions 180 X 180" id="imag">
                              </div>
                              <i class="fa fa-camera"> <h4>Importer le logo du partenaire</h4></i>
                            </div>

                          </div>
                  </div>




              </fieldset>

              <div class="row" style="padding-top: 30px; margin-left: 35%;">
              <a href="{{url('partenaires')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
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
