@extends('layouts.master')

@section('title','LRI | Ajouter un materiel')

@section('header_page')

      <h1>
        Materiels
        <small>Nouveau</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{url('materiels')}}">Materiel</a></li>
        <li class="active">Nouveau</li>
      </ol>

@endsection

@section('asidebar')

@endsection

@section('content')

<style media="screen">
  #materiel-upload{
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
  #materiel-upload:hover input.upload{
  display:block;
  }
  #materiel-upload:hover .hvr-profile-img{
  display:inline-block;
  }
  #materiel-upload .fa{   margin: auto;
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
  #materiel-upload:hover .fa{
   opacity:1;
   -webkit-transform: scale(1);
  }
  #materiel-upload input.upload {
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

  #materiel-upload .hvr-profile-img {
  width:100%;
  height:100%;
  display: none;
  position:absolute;
  vertical-align: middle;
  position: relative;
  background: transparent;
  }
  #materiel-upload .fa:after {
    content: "";
    position:absolute;
    bottom:0; left:0;
    width:100%; height:0px;
    background:rgba(0,0,0,0.3);
    z-index:-1;
    transition: height 0.3s;
    }

  #materiel-upload:hover .fa:after { height:100%; }
</style>

    <div class="row">
      <div class="col-xs-12">
        <div class="box">

          <div class="container col-xs-12">

            <form class="well form-horizontal" method="POST" action="{{url('materiels')}}" id="contact_form" enctype="multipart/form-data">
              {{ csrf_field() }}
              <fieldset>

                <!-- Form Name -->
                <legend><center><h2><b>Nouveau materiel</b></h2></center></legend><br>

                <!-- Text input-->
                    <div class="col-md-6">

                      <div class="form-group ">
                        <label class="col-md-3 control-label">Libéllé *</label>
                        <div class="col-md-9 inputGroupContainer @if($errors->get('libelle')) has-error @endif">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lg fa-tag"></i></span>
                            <input  name="libelle" placeholder="Libéllé" class="form-control"  type="text" value="{{old('libelle')}}">
                           </div>
                            <span class="help-block">
                                @if($errors->get('libelle'))
                                  @foreach($errors->get('libelle') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                        </div>
                      </div>

                      <div class="form-group ">
                        <label class="col-md-3 control-label">Laboratoire</label>
                        <div class="col-md-9 inputGroupContainer @if($errors->get('laboratoire')) has-error @endif">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lg fa-flask "></i></span>
                            <select name="laboratoire" class="form-control">
                              @foreach($laboratoires as $lab)
                                <option value="{{$lab->id}}">{{$lab->nom}}</option>
                              @endforeach
                             </select>
                           </div>
                            <span class="help-block">
                                @if($errors->get('laboratoire'))
                                  @foreach($errors->get('laboratoire') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                        </div>
                      </div>

                      <div class="form-group ">
                        <label class="col-md-3 control-label">Quantité</label>
                        <div class="col-md-9 inputGroupContainer @if($errors->get('quantite')) has-error @endif">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lg fa-sort-amount-asc "></i></span>
                            <input type="number" name="quantite"  min="0" class="form-control"  type="text" value="0" >
                           </div>
                            <span class="help-block">
                                @if($errors->get('quantite'))
                                  @foreach($errors->get('quantite') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                        </div>
                      </div>

                      <!-- <div class="form-group">
                         <label class="col-md-3 control-label">Numéro * </label>
                           <div class="col-md-9 selectContainer @if($errors->get('numero')) has-error @endif">
                             <div class="input-group">
                             <span class="input-group-addon"><i class="fa fa-lg fa-barcode"></i></span>
                             <input name="numero" placeholder="numéro" class="form-control"  type="number" value="{{old('numero')}}">

                             </div>
                             <span class="help-block">
                               @if($errors->get('numero'))
                                 @foreach($errors->get('numero') as $message)
                                   <li> {{ $message }} </li>
                                 @endforeach
                               @endif
                           </span>
                           </div>
                         </div> -->

                      <div class="form-group">
                          <label class="col-md-3 control-label">Description</label>
                                <div class="col-md-9 inputGroupContainer @if($errors->get('description')) has-error @endif">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lg fa-info-circle"></i></span>
                                        <textarea name="description" rows="5" style="width:100%"></textarea>
                                      </div>
                                      <span class="help-block">
                                        @if($errors->get('description'))
                                            @foreach($errors->get('description') as $message)
                                              <li> {{ $message }} </li>
                                            @endforeach
                                          @endif
                                        </span>
                                      </div>
                      </div>



                    </div>


                <div class="col-md-6">

                    <!-- <div class="form-group">
                      <label class="col-md-3 control-label">Proprietaire </label>
                        <div class="col-md-9 selectContainer @if($errors->get('proprietaire')) has-error @endif">
                          <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-users"></i></span>
                              <select name="proprietaire" class="form-control selectpicker">
                                <option></option>
                                 @foreach($proprietaires as $proprietaire)
                                <option value="{{$proprietaire->id}}">{{$proprietaire->name}}&nbsp;{{$proprietaire->prenom}}</option>
                                @endforeach
                              </select>

                          </div>

                          <span class="help-block">
                            @if($errors->get('proprietaire'))
                              @foreach($errors->get('proprietaire') as $message)
                                <li> {{ $message }} </li>
                              @endforeach
                            @endif
                        </span>

                        </div>
                      </div> -->
                    <div class="form-group">
                        <label class="col-md-3 control-label">Photo</label>

                            <div class="col-md-9 inputGroupContainer">
                              <div id='materiel-upload'>
                                <div class="hvr-profile-img">
                                  <input type="file" name="img" id='materiel-photo'  class="upload w180" title="Dimensions 180 X 180" id="imag">
                                </div>
                                <i class="fa fa-camera"> <h4>Importer une photo</h4></i>
                              </div>
                            </div>
                    </div>

                </div>

              </fieldset>

              <div style="padding-top: 30px; margin-left: 35%;">
              <a href="{{url('materiels')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
               <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Valider</button>
                  </div>
            </form>
          </div>
         </div><!-- /.container -->
       </div>
      </div>

  <script type="text/javascript">
      document.getElementById('materiel-photo').addEventListener('change', readURL, true);
      function readURL(){
        var file = document.getElementById("materiel-photo").files[0];
        var reader = new FileReader();
        reader.onloadend = function(){
            document.getElementById('materiel-upload').style.backgroundImage = "url(" + reader.result + ")";
        }
        if(file){
            reader.readAsDataURL(file);
        }else{
        }
      }
</script>

  @endsection
