@extends('layouts.master')

 @section('title','LRI | Détails partenaire')

@section('header_page')

       <h1>
        Partenaires
        <small>Détails</small>
      </h1>
        <ol class="breadcrumb">
          <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li><a href="{{url('partenaires')}}">Partenaires</a></li>
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
                @if(Auth::user()->role->nom == 'admin' || Auth::user()->id===$partenaire->created_by)

              <li><a href="#modifier" data-toggle="tab">Modifier</a></li>
              <li><a href="#contact" data-toggle="tab">Contacts</a></li>
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
                  {{$partenaire->nom}}
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
              <i class=" fa fa-building-o bg-blue"></i>

              <div class="timeline-item">


                <h3 class="timeline-header no-border"><a>Type </a></h3>
                <div class="timeline-body">
                  {{$partenaire->type}}
                </div>
              </div>
            </li>
            <!-- END timeline item -->

            <li>
              <i class="fa fa-flag bg-green"></i>

              <div class="timeline-item">


                <h3 class="timeline-header no-border"><a>Pays </a></h3>
                <div class="timeline-body">
                  {{$partenaire->pays}}
                </div>
              </div>
            </li>

            <li>
              <i class="fa fa-map-marker bg-aqua"></i>

              <div class="timeline-item">


                <h3 class="timeline-header no-border"><a>Ville </a></h3>
                <div class="timeline-body">
                  {{$partenaire->ville}}
                </div>
              </div>
            </li>

            <li>
              <i class="fa fa-link bg-aqua"></i>

              <div class="timeline-item">


                <h3 class="timeline-header no-border"><a>Lien </a></h3>
                <div class="timeline-body">
                  {{$partenaire->lien}}
                </div>
              </div>
            </li>
            <!-- timeline item -->
            <li>
              <i class="fa fa-comment bg-yellow"></i>

              <div class="timeline-item">
              <h3 class="timeline-header"><a >Résumé</a></h3>

                <div class="timeline-body">
                    <?php echo strip_tags($partenaire->description, '<b><a><i>') ?>
                </div>
              </div>
            </li>


          </ul>
        </div>
      </div>


      <div class="tab-pane" id="modifier">
          <form class="well form-horizontal" action="{{url('partenaires/'. $partenaire->id) }} " method="post"  id="contact_form" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
              {{ csrf_field() }}
              <fieldset>



                      <div class="form-group ">
                        <label class="col-md-3 control-label">Intitulé (*)</label>
                        <div class="col-md-9 inputGroupContainer">
                          <div class="input-group" style="width: 70%">
                            <input  name="intitule" class="form-control" value="{{$partenaire->nom}}" type="text">
                          </div>
                        </div>
                      </div>


                                        <div class="form-group">
                                              <label class="col-xs-3 control-label">Type (*)</label>
                                              <div class="col-xs-9 inputGroupContainer @if($errors->get('type')) has-error @endif">
                                                <div style="width: 70%">
                                                  <select class="form-control" name="type">
                                                    <?php $selected=""; ?>
                                                    @if($partenaire->type=="organisme")
                                                      <option value="organisme" selected>Organisme</option>
                                                      <option value="laboratoire">Laboratoire</option>
                                                      <option value="entreprise">Entreprise</option>
                                                      <option value="administration">Administration</option>
                                                      <option value="autre">Autre</option>
                                                    @elseif($partenaire->type=="laboratoire")
                                                      <option value="laboratoire" selected>Laboratoire</option>
                                                      <option value="organisme" >Organisme</option>
                                                      <option value="entreprise">Entreprise</option>
                                                      <option value="administration">Administration</option>
                                                      <option value="autre">Autre</option>
                                                    @elseif($partenaire->type=="entreprise")
                                                    <option value="laboratoire">Laboratoire</option>
                                                    <option value="organisme" >Organisme</option>
                                                    <option value="entreprise" selected>Entreprise</option>
                                                    <option value="administration">Administration</option>
                                                    <option value="autre">Autre</option>
                                                    @elseif($partenaire->type=="administration")
                                                    <option value="laboratoire">Laboratoire</option>
                                                    <option value="organisme" >Organisme</option>
                                                    <option value="entreprise">Entreprise</option>
                                                    <option value="administration" selected>Administration</option>
                                                    <option value="autre">Autre</option>
                                                    @elseif($partenaire->type=="autre")
                                                    <option value="laboratoire" >Laboratoire</option>
                                                    <option value="organisme" >Organisme</option>
                                                    <option value="entreprise">Entreprise</option>
                                                    <option value="administration">Administration</option>
                                                    <option value="autre" selected>Autre</option>
                                                    @endif





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
                                              <div id="select-country" data-input-name="pays" data-selected-country="{{$partenaire->pays}}"></div>
                                            </div>
                                        </div>

                      <div class="form-group">
                            <label class="col-xs-3 control-label">Ville (*)</label>
                            <div class="col-xs-9 inputGroupContainer @if($errors->get('ville')) has-error @endif">
                              <div style="width: 70%">
                                <input  name="ville" class="form-control" placeholder="Ville" type="text" value="{{$partenaire->ville}}">
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
                              <textarea name="resume" class="form-control" rows="3" placeholder="Entrez ..." id="txt">{{$partenaire->description}}</textarea>

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
                          <label class="col-md-3 control-label">Photo*</label>

                              <div class="col-md-9 inputGroupContainer">
                                <div id='actualite-upload' style="background-image:url('{{asset($partenaire->logo)}}')">
                                  <div class="hvr-profile-img">
                                    <input type="file" name="img" id='actualite-photo'  class="upload w180" title="Dimensions 180 X 180" id="imag">
                                  </div>
                                  <i class="fa fa-camera"> <h4>Importer le logo du partenaire</h4></i>
                                </div>

                              </div>
                      </div>




              </fieldset>

              <div style="padding-top: 30px; margin-left: 35%;">
              <a href="{{url('partenaires/'.$partenaire->id.'/details')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
               <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Modifier</button>
              </div>
            </form>
      </div>

      <div class="tab-pane" id="contact" style="padding:25px 0 25px 0">



        <table id="example2" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th><i class="fa fa-lg fa-user margin-r-5"></i>Nom</th>
              <th><i class="fa fa-lg fa-user margin-r-5"></i>Prénom</th>
              <th><i class="fa fa-lg fa-tasks margin-r-5"></i>Fonction</th>
              <th><i class="fa fa-lg fa-envelope margin-r-5"></i>Email</th>
              <th><i class="fa fa-lg fa-phone margin-r-5"></i>Téléphone</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($contacts as $contact)
            <tr>

              <td>{{$contact->nom}}</td>
              <td>{{$contact->prenom}}</td>
              <td>{{$contact->fonction}}</td>
              <td>{{$contact->email}}</td>
              <td>{{$contact->telephone}}</td>
              <td>
                <div class="btn-group">

                      <a href="{{ url('contacts/'.$contact->id.'/details')}}" class="btn btn-info">
                        <i class="fa fa-eye"></i>
                      </a>
                    </div>
                </td>

            </tr>
            @endforeach

          </tbody>
          <tfoot>
            <tr>
              <th><i class="fa fa-lg fa-user margin-r-5"></i>Nom</th>
              <th><i class="fa fa-lg fa-user margin-r-5"></i>Prénom</th>
              <th><i class="fa fa-lg fa-tasks margin-r-5"></i>Fonction</th>
              <th><i class="fa fa-lg fa-envelope margin-r-5"></i>Email</th>
              <th><i class="fa fa-lg fa-phone margin-r-5"></i>Téléphone</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>


      </div>
      </div>
    </div>

    <div class="col-md-4">
      <!-- USERS LIST -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Logo du partenaire</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <img src="{{asset($partenaire->logo)}}" alt="partenaire photo" width="100%" height="100%">
        </div>
        <!-- /.box-body -->
      </div>
      <!--/.box -->
    </div>

            <div class="col-md-4">
              <!-- USERS LIST -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Contacts du partenaires</h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  @if(reset($contacts))
                  <ul class="users-list clearfix">
                    @foreach($contacts as $contact)
                    <li>
                      <a  href="{{url('contacts/'.$contact->id.'/details')}}">
                      <img src="{{asset($contact->photo)}}" alt="User Image">
                        <span class="users-list-name"> {{$contact->nom}}</span>
                      <span class="users-list-date">{{$contact->prenom}}</span>
                      </a>
                    </li>
                    @endforeach
                  </ul>
                  @else
                  <b>Aucun contact trouvé</b>
                  @endif
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
