@extends('layouts.master')

@section('title','LRI | Application')

@section('header_page')

      <h1>
        {{$app->titre}}
        <small>Modifier</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{url('parametres')}}">Paramètres</a></li>
        <li class="active">{{$app->titre}}</li>
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

<style >
    input[type=checkbox]{
    	height: 0;
    	width: 0;
    	visibility: hidden;
    }

    .toggle {
    	cursor: pointer;
    	text-indent: -9999px;
    	width: 50px;
    	height: 30px;
    	background: grey;
    	border-radius: 100px;

    }

      .toggle:after {
    	content: '';
    	position: absolute;
    	top: 5px;
    	left: 5px;
    	width: 25px;
    	height: 20px;
    	background: #fff;
    	border-radius: 90px;
    	transition: 0.3s;
    }

    input:checked +  .toggle {
    	background: #bada55;
    }

    input:checked +  .toggle:after {
    	left: calc(100% - 5px);
    	transform: translateX(-100%);
    }

    input .toggle:active:after {
    	width: 60px;
    }

</style>

    <div class="row">
      <div class="col-xs-12">
        <div class="box">

          <div class="container col-xs-12">

            <form class="well form-horizontal" method="POST" action="{{url('parametres/'.$app->id) }}" id="contact_form" enctype="multipart/form-data">
              <input type="hidden" name="_method" value="PUT">
              {{ csrf_field() }}
              <fieldset>

                <!-- Form Name -->
                <legend><center><h2><b>Modifier {{$app->titre}}</b></h2></center></legend><br>

                <!-- Text input-->
                    <div class="col-md-6">

                      <div class="form-group ">
                        <label class="col-md-3 control-label">Titre *</label>
                        <div class="col-md-9 inputGroupContainer @if($errors->get('titre')) has-error @endif">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lg fa-newspaper-o"></i></span>
                            <input  name="titre" placeholder="Titre" class="form-control"  type="text" value="{{$app->titre}}">
                           </div>
                            <span class="help-block">
                                @if($errors->get('titre'))
                                  @foreach($errors->get('titre') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                        </div>
                      </div>



                      <div class="form-group">
                          <label class="col-md-3 control-label">A propos *</label>
                                <div class="col-md-9 inputGroupContainer @if($errors->get('apropos')) has-error @endif">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lg fa-info-circle"></i></span>
                                        <textarea name="apropos" rows="5" style="width:100%" id="txt">{{$app->apropos}}</textarea>
                                      </div>
                                      <span class="help-block">
                                        @if($errors->get('apropos'))
                                            @foreach($errors->get('apropos') as $message)
                                              <li> {{ $message }} </li>
                                            @endforeach
                                          @endif
                                        </span>
                                      </div>
                      </div>



                    </div>


                <div class="col-md-6">


                    <div class="form-group">
                        <label class="col-md-3 control-label">Logo *</label>

                            <div class="col-md-9 inputGroupContainer">
                              <div id='actualite-upload' style="background-image:url('{{asset($app->logo)}}')">
                                <div class="hvr-profile-img">
                                  <input type="file" name="img" id='actualite-photo'  class="upload w180" title="Dimensions 180 X 180" id="imag">
                                </div>
                                <i class="fa fa-camera"> <h4>Importer une photo</h4></i>
                              </div>

                            </div>
                    </div>

                </div>

              </fieldset>

              <div style="padding-top: 30px; margin-left: 35%;">
              <a href="{{url('parametres')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
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
