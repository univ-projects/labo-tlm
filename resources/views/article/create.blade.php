@extends('layouts.master')

@section('title','LRI | Ajouter un article')

@section('header_page')

      <h1>
        Article
        <small>Nouveau</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{url('articles')}}">Articles</a></li>
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

            <form class="well form-horizontal" action="{{ url('articles') }}" method="post"  id="contact_form" enctype="multipart/form-data">
              {{ csrf_field() }}
              <fieldset>

                <!-- Form Name -->
                <legend><center><h2><b>Nouvel article</b></h2></center></legend><br>

                  <div class="form-group ">
                        <label class="col-xs-3 control-label">Titre (*)</label>
                        <div class="col-xs-9 inputGroupContainer  @if($errors->get('titre')) has-error @endif">
                          <div style="width: 70%">
                            <input  name="titre" class="form-control" placeholder="Titre" type="text" value="{{old('titre')}}">
                            <span class="help-block">
                                @if($errors->get('titre'))
                                  @foreach($errors->get('titre') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>

                          </div>
                        </div>
                  </div>

                  <div class="form-group">
                      <label class="col-md-3 control-label">Résumé (*)</label>
                      <div class="col-md-9 inputGroupContainer  @if($errors->get('resume')) has-error @endif">
                        <div style="width: 70%">
                          <textarea name="resume" class="form-control" rows="3" placeholder="Résumé ...">{{old('resume')}}</textarea>
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

                  <div class="form-group ">
                        <label class="col-xs-3 control-label">Type (*)</label>
                        <div class="col-xs-9 inputGroupContainer @if($errors->get('type')) has-error @endif">
                          <div style="width: 70%">
                            <select name="type" class="form-control select">
                              <option></option>
                              <option>Poster</option>
                              <option>Article court</option>
                              <option>Article long</option>
                              <option>Publication(Revue)</option>
                              <option>Chapitre d'un livre</option>
                              <option>Livre</option>
                              <option>Brevet</option>
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

                 <div class="form-group ">
                        <label class="col-xs-3 control-label">Membres internes (*)</label>
                        <div class="col-xs-9 inputGroupContainer @if($errors->get('membre[]')) has-error @endif">
                          <div style="width: 70%">
                            <select name="membre[]" class="form-control select2" multiple="multiple">

                               @foreach($membres as $membre)
                              <option value="{{$membre->id}}">
                                {{$membre->name}} {{$membre->prenom}}
                              </option>
                               @endforeach
                            </select>
                            <span class="help-block">
                                @if($errors->get('membre[]'))
                                  @foreach($errors->get('membre[]') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                          </div>
                        </div>
                  </div>


                  <div class="form-group ">
                         <label class="col-xs-3 control-label">Partenaires </label>
                         <div class="col-xs-9 inputGroupContainer ">
                           <div style="width: 70%">
                             <select name="partenaire_type" class="form-control select2 partenaire_type" multiple="multiple">

                                @foreach($partenaires as $partenaire)
                               <option value="{{$partenaire->id}}">
                                 {{$partenaire->nom}}
                               </option>
                                @endforeach
                             </select>

                           </div>
                         </div>
                   </div>

                  <div class="form-group ">
                    <label class="col-xs-3 control-label">Membres éxternes </label>
                    <div class="col-xs-9 inputGroupContainer ">
                      <div style="width: 70%">
                        <select name="membres_ext[]" class="form-control select2" multiple="multiple" id="contact_result">

                        </select>
                      </div>
                    </div>
                   </div>




                  <div class="form-group ">
                        <label class="col-xs-3 control-label">Ville (*)</label>
                        <div class="col-xs-9 inputGroupContainer @if($errors->get('ville')) has-error @endif">
                          <div style="width: 70%">
                            <input  name="ville" class="form-control" placeholder="Lieu " type="text" value="{{old('ville')}}">
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

                  <div class="form-group ">
                        <label class="col-xs-3 control-label">Pays (*)</label>
                        <div class="col-xs-9 inputGroupContainer @if($errors->get('pays')) has-error @endif">
                          <div style="width: 70%">
                            <input  name="pays" class="form-control" placeholder="Lieu" type="text" value="{{old('pays')}}">
                            <span class="help-block">
                                @if($errors->get('pays'))
                                  @foreach($errors->get('pays') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                          </div>
                        </div>
                  </div>

                  <div class="form-group ">
                        <label class="col-xs-3 control-label">Nom de la conférence</label>
                        <div class="col-xs-9 inputGroupContainer">
                          <div style="width: 70%">
                            <input  name="conference" class="form-control" type="text" value="{{old('conference')}}">
                          </div>
                        </div>
                  </div>

                  <div class="form-group ">
                        <label class="col-xs-3 control-label">Nom du journal</label>
                        <div class="col-xs-9 inputGroupContainer">
                          <div style="width: 70%">
                            <input  name="journal" class="form-control" type="text" value="{{old('journal')}}">
                          </div>
                        </div>
                  </div>

                  <div class="form-group ">
                        <label class="col-xs-3 control-label">ISSN</label>
                        <div class="col-xs-9 inputGroupContainer">
                          <div style="width: 70%">
                            <input  name="issn" class="form-control" type="numbers" value="{{old('issn')}}">
                          </div>
                        </div>
                  </div>

                  <div class="form-group ">
                        <label class="col-xs-3 control-label">ISBN</label>
                        <div class="col-xs-9 inputGroupContainer">
                          <div style="width: 70%">
                            <input  name="isbn" class="form-control" type="numbers" value="{{old('isbn')}}">
                          </div>
                        </div>
                  </div>


                  <div class="form-group ">
                        <label class="col-xs-3 control-label">Date (*)</label>
                        <div class="col-xs-9 inputGroupContainer @if($errors->get('date')) has-error @endif">
                          <div style="width: 70%">
                            <input type="date" name="date" class="form-control pull-right" value="{{old('date')}}">
                            <span class="help-block">
                                @if($errors->get('date'))
                                  @foreach($errors->get('date') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
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

                  <div class="form-group ">
                        <label class="col-xs-3 control-label">DOI</label>
                        <div class="col-xs-9 inputGroupContainer">
                          <div style="width: 70%">
                            <input  name="doi" class="form-control" placeholder="URL" type="text" value="{{old('doi')}}">
                          </div>
                        </div>
                  </div>

                  <div class="form-group">
                      <label class="col-md-3 control-label">Détails</label>
                      <div class="col-md-9 inputGroupContainer">
                        <div style="width: 70%">
                          <input name="detail" type="file" id="exampleInputFile" value="{{old('detail')}}">
                        </div>
                      </div>
                  </div>


              </fieldset>

              <div class="row" style="padding-top: 30px; margin-left: 35%;">
              <a href="{{url('articles')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
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
