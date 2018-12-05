@extends('layouts.master')

@section('title','LRI | Ajouter un contact')

@section('header_page')

      <h1>
        Contactes
        <small>Nouveau</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{url('contacts')}}">Contacts</a></li>
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

            <form class="well form-horizontal" action=" {{url('contacts')}} " method="post"  id="contact_form" enctype="multipart/form-data">
              {{ csrf_field() }}
              <fieldset>

                <!-- Form Name -->
                <legend><center><h2><b>Nouveau contact</b></h2></center></legend><br>


                  <div class="form-group">
                        <label class="col-xs-3 control-label">Nom (*)</label>
                        <div class="col-xs-9 inputGroupContainer @if($errors->get('name')) has-error @endif">
                          <div style="width: 70%">
                            <input  name="name" class="form-control" placeholder="Nom" type="text" value="{{old('name')}}">
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


                  <div class="form-group">
                        <label class="col-xs-3 control-label">Prénom (*)</label>
                        <div class="col-xs-9 inputGroupContainer @if($errors->get('prenom')) has-error @endif">
                          <div style="width: 70%">
                            <input  name="prenom" class="form-control" placeholder="Prénom" type="text" value="{{old('prenom')}}">
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
                      <label class="col-md-3 control-label">Partenaire</label>
                        <div class="col-md-9 selectContainer @if($errors->get('partenaire_id')) has-error @endif">
                          <div class="input-group" style="width: 70%">
                              <select name="partenaire_id" class="form-control selectpicker">
                                <option></option>
                                @foreach($partenaires as $partenaire)
                                <option value="{{$partenaire->id}}">{{$partenaire->nom}}</option>
                                @endforeach

                              </select>
                              <span class="help-block">
                            @if($errors->get('partenaire_id'))
                              @foreach($errors->get('partenaire_id') as $message)
                                <li> {{ $message }} </li>
                              @endforeach
                            @endif
                        </span>
                          </div>
                        </div>
                  </div>


                  <div class="form-group">
                        <label class="col-xs-3 control-label">Fonction</label>
                        <div class="col-xs-9 inputGroupContainer ">
                          <div style="width: 70%">
                            <input  name="fonction" class="form-control"  type="text" value="{{old('fonction')}}">
                          </div>
                        </div>
                  </div>



                  <div class="form-group">
                        <label class="col-xs-3 control-label">Email (*)</label>
                        <div class="col-xs-9 inputGroupContainer @if($errors->get('email')) has-error @endif">
                          <div style="width: 70%">
                            <input  name="email" class="form-control" placeholder="exemple@xyz.a" type="email" value="{{old('email')}}">
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

      

                  <div class="form-group">
                          <label class="col-md-3 control-label">N° Téléphone</label>
                            <div class="col-md-9 inputGroupContainer">
                              <div class="input-group" style="width: 70%">
                                <input name="num_tel" type="text" class="form-control" data-inputmask='"mask": "(999) 999-999-999"' data-mask value="">
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
                              <i class="fa fa-camera"> <h4>Importer une photo</h4></i>
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
