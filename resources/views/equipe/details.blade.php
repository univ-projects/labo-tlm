@extends('layouts.master')

 @section('title','LRI | Détails equipe')

@section('header_page')

       <h1>
        Equipes
        <small>Détails</small>
      </h1>
        <ol class="breadcrumb">
          <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li><a href="{{url('equipes')}}">Equipes</a></li>
          <li class="active">Détails</li>
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

            <div class="col-md-8">
      <div class="nav-tabs-custom">
       <ul class="nav nav-tabs">
              <li class="active"><a href="#apropos" data-toggle="tab">A propos</a></li>
              @if(Auth::user()->role->nom == 'admin' )

              <li><a href="#modifier" data-toggle="tab">Modifier</a></li>
              @endif
            </ul>

      <div class="tab-content">

        <div class="active tab-pane" id="apropos">
          <div class="box-body">
          <!-- The time line -->
          <ul class="timeline" style="padding-top: 30px;">
            <!-- timeline time label -->

            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa  fa-tag bg-red"></i>

              <div class="timeline-item">

                <h3 class="timeline-header"><a >Intitulé</a></h3>

                <div class="timeline-body">
                  {{$equipe->intitule}}
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-user bg-aqua"></i>

              <div class="timeline-item">


                <h3 class="timeline-header no-border"><a>Chef de l'équipe </a></h3>
                <div class="timeline-body">
                 <a href="{{url('membres/'.$equipe->chef_id.'/details')}}"> {{$equipe->chef->name}} {{$equipe->chef->prenom}}
                  </a>
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-comment bg-yellow"></i>

              <div class="timeline-item">
              <h3 class="timeline-header"><a >Résumé</a></h3>

                <div class="timeline-body">
                    <?php echo strip_tags($equipe->resume, '<b><a><i>') ?>
                </div>
              </div>
            </li>

            <li>
              <i class="fa fa-search bg-purple"></i>

              <div class="timeline-item">
              <h3 class="timeline-header"><a >Axes de recherche</a></h3>

                <div class="timeline-body">
                  {{$equipe->axes_recherche}}
                </div>
              </div>
            </li>

            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
        </div>
      </div>

      <div class="tab-pane" id="modifier">
          <form class="well form-horizontal" action="{{url('equipes/'. $equipe->id) }} " method="post"  id="contact_form" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
              {{ csrf_field() }}
              <fieldset>

                    <div class="form-group ">
                      <label class="col-md-3 control-label">Laboratoire</label>
                      <div class="col-md-9 inputGroupContainer">
                        <div class="input-group" style="width: 70%">
                          <select class="form-control" name="labo">
                            <option></option>

                            @foreach($labos as $l)
                              <option value="{{$l->id}}">$l->nom</option>
                            @endforeach
                          </select>

                        </div>
                      </div>
                    </div>

                      <div class="form-group ">
                        <label class="col-md-3 control-label">Intitulé</label>
                        <div class="col-md-9 inputGroupContainer">
                          <div class="input-group" style="width: 70%">
                            <input  name="intitule" class="form-control" value="{{$equipe->intitule}}" type="text">
                          </div>
                        </div>
                      </div>

                      <div class="form-group ">
                        <label class="col-md-3 control-label">Achronyme</label>
                        <div class="col-md-9 inputGroupContainer">
                          <div class="input-group" style="width: 70%">
                            <input  name="achronymes" class="form-control" value="{{$equipe->achronymes}}" type="text">
                          </div>
                        </div>
                      </div>

                      <div class="form-group ">
                        <label class="col-xs-3 control-label">Chef de l'équipe</label>
                        <div class="col-xs-9 inputGroupContainer">
                          <div class="input-group" style="width: 70%">

                            <select name="chef_id" class="form-control select2">
                              <option value="{{$equipe->chef->id}}">{{$equipe->chef->name}} {{$equipe->chef->prenom}}</option>
                               @foreach($membres as $membre)
                              <option value="{{$membre->id}}">{{$membre->name}} {{$membre->prenom}}</option>
                               @endforeach
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-3 control-label">Résumé</label>
                        <div class="col-md-9 inputGroupContainer">
                          <div style="width: 70%">
                            <textarea name="resume" class="form-control" rows="3" placeholder="Entrez ..." id="txt">{{$equipe->resume}}</textarea>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label">Photo*</label>

                              <div class="col-md-9 inputGroupContainer">
                                <div id='actualite-upload' style="background-image:url('{{asset($equipe->photo)}}')">
                                  <div class="hvr-profile-img">
                                    <input type="file" name="img" id='actualite-photo'  class="upload w180" title="Dimensions 180 X 180" id="imag">
                                  </div>
                                  <i class="fa fa-camera"> <h4>Importer une photo</h4></i>
                                </div>

                              </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label">Axes de recherche</label>
                          <div class="col-md-9 inputGroupContainer">
                            <div style="width: 70%">
                              <textarea name="axe_recherche" class="form-control" rows="3" placeholder="Entrez ..." id="txt2">{{$equipe->axes_recherche}}</textarea>
                            </div>
                          </div>
                      </div>


              </fieldset>

              <div style="padding-top: 30px; margin-left: 35%;">
              <a href="{{url('equipes/'.$equipe->id.'/details')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
               <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Modifier</button>
              </div>
            </form>
      </div>
      </div>
      </div>
    </div>

    <div class="col-md-4">
      <!-- USERS LIST -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Photo de l'équipe</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <img src="{{asset($equipe->photo)}}" alt="equipe photo" width="100%" height="100%">
        </div>
        <!-- /.box-body -->
      </div>
      <!--/.box -->
    </div>

            <div class="col-md-4">
              <!-- USERS LIST -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Membres de l'équipe</h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    @foreach($membres as $membre)
                    <li>
                      <img src="{{asset($membre->photo)}}" alt="User Image">
                      <a class="users-list-name" href="{{url('membres/'.$membre->id.'/details')}}">{{$membre->name}}</a>
                      <span class="users-list-date">{{$membre->prenom}}</span>
                    </li>
                    @endforeach
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
              </div>
              <!--/.box -->
            </div>

            <!-- timeLine start -->


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
