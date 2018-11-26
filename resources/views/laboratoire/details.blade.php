@extends('layouts.master')

 @section('title','LRI | Détails labo')

@section('header_page')

       <h1>
        Laboratoires
        <small>Détails</small>
      </h1>
        <ol class="breadcrumb">
          <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li><a href="{{url('laboratoires')}}">laboratoires</a></li>
          <li class="active">Détails</li>
        </ol>

@endsection

@section('asidebar')

@endsection

@section('content')


<style media="screen">
  #labo-logo-upload ,#labo-photo-upload{
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
  #labo-logo-upload:hover input.upload ,#labo-photo-upload:hover input.upload{
  display:block;
  }
  #labo-logo-upload:hover .hvr-profile-img ,#labo-photo-upload:hover .hvr-profile-img{
  display:inline-block;
  }
  #labo-logo-upload .fa ,#labo-photo-upload .fa{   margin: auto;
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
  #labo-logo-upload:hover .fa ,#labo-photo-upload:hover .fa{
   opacity:1;
   -webkit-transform: scale(1);
  }
  #labo-logo-upload input.upload ,#labo-photo-upload input.upload {
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

  #labo-logo-upload .hvr-profile-img ,#labo-photo-upload .hvr-profile-img {
  width:100%;
  height:100%;
  display: none;
  position:absolute;
  vertical-align: middle;
  position: relative;
  background: transparent;
  }
  #labo-logo-upload .fa:after ,#labo-photo-upload .fa:after {
    content: "";
    position:absolute;
    bottom:0; left:0;
    width:100%; height:0px;
    background:rgba(0,0,0,0.3);
    z-index:-1;
    transition: height 0.3s;
    }

  #labo-logo-upload:hover .fa:after ,#labo-photo-upload:hover .fa:after{ height:100%; }
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
                  {{$laboDetail->nom}}
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-user bg-aqua"></i>

              <div class="timeline-item">


                <h3 class="timeline-header no-border"><a>Directeur du laboratoire </a></h3>
                <div class="timeline-body">
                 <a href="{{url('membres/'.$laboDetail->directeur.'/details')}}">
									 @if(isset($laboDetail->directeu))
									 {{$laboDetail->directeu->name}} {{$laboDetail->directeu->prenom}}
									@endif
                  </a>
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-comment bg-yellow"></i>

              <div class="timeline-item">
              <h3 class="timeline-header"><a >A propos</a></h3>

                <div class="timeline-body">
                  {{$laboDetail->apropos}}
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
          <form class="well form-horizontal" action="{{url('laboratoires/'. $laboDetail->id) }} " method="post"  id="contact_form">
            <input type="hidden" name="_method" value="PUT">
              {{ csrf_field() }}
              <fieldset>

                      <div class="form-group ">
                        <label class="col-md-3 control-label">Intitulé *</label>
                        <div class="col-md-9 inputGroupContainer">
                          <div class="input-group" style="width: 70%">
                            <input  name="intitule" class="form-control" value="{{$laboDetail->nom}}" type="text">
                          </div>
                        </div>
                      </div>

                      <div class="form-group ">
                        <label class="col-md-3 control-label">Achronymes *</label>
                        <div class="col-md-9 inputGroupContainer">
                          <div class="input-group" style="width: 70%">
                            <input  name="achronymes" class="form-control" value="{{$laboDetail->achronymes}}" type="text">
                          </div>
                        </div>
                      </div>

											<div class="form-group">
													<label class="col-md-3 control-label">Logo</label>

															<div class="col-md-9 inputGroupContainer">
																<div id='labo-logo-upload' style="background-image:url('{{asset($laboDetail->logo)}}')">
																	<div class="hvr-profile-img">
																		<input type="file" name="logo" id='labo-logo'  class="upload w180" title="Dimensions 180 X 180" id="imag">
																	</div>
																	<i class="fa fa-camera"> <h4>Importer un logo</h4></i>
																</div>
															</div>
											</div>

											<div class="form-group">
		                      <label class="col-md-3 control-label">A propos (*)</label>
		                      <div class="col-md-9 inputGroupContainer @if($errors->get('apropos')) has-error @endif" >
		                        <div style="width: 70%">
		                          <textarea name="apropos" class="form-control" rows="3" placeholder="Entrez ...">{{$laboDetail->apropos}}</textarea>

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

		                  <div class="form-group ">
		                        <label class="col-xs-3 control-label">Directeur du laboratoire</label>
		                        <div class="col-xs-9 inputGroupContainer @if($errors->get('directeur')) has-error @endif">
		                          <div >
		                            <select name="directeur" class="form-control select2" style="width:300px">
		                              <option></option>
		                               @foreach($membres as $membre)
																	 @if($membre->id===$laboDetail->directeur)
																			<?php $a='selected'; ?>
																		@else
																			<?php $a=''; ?>
																		@endif
		                              	<option value="{{$membre->id}}">{{$membre->name}} {{$membre->prenom}}</option>
		                               @endforeach
		                            </select>

		                            <span class="help-block">
		                                @if($errors->get('directeur'))
		                                  @foreach($errors->get('directeur') as $message)
		                                    <li> {{ $message }} </li>
		                                  @endforeach
		                                @endif
		                            </span>

		                          </div>
		                        </div>
		                  </div>

		                  <div class="form-group" >
		                      <label class="col-md-3 control-label">Photo</label>

		                          <div class="col-md-9 inputGroupContainer" >
		                            <div id='labo-photo-upload' style="background-image:url('{{asset($laboDetail->photo)}}')">
		                              <div class="hvr-profile-img">
		                                <input type="file" name="img" id='labo-photo'  class="upload w180" title="Dimensions 180 X 180" id="imag">
		                              </div>
		                              <i class="fa fa-camera"> <h4>Importer une photo</h4></i>
		                            </div>
		                          </div>
		                  </div>


              </fieldset>

              <div style="padding-top: 30px; margin-left: 35%;">
              <a href="{{url('laboratoires/'.$laboDetail->id.'/details')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
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
					<h3 class="box-title">Membres du {{$laboDetail->achronymes}}</h3>

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

            <div class="col-md-4">
              <!-- USERS LIST -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Membres du {{$laboDetail->achronymes}}</h3>

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
				document.getElementById('labo-logo').addEventListener('change', readURL, true);
				function readURL(){
					var file = document.getElementById("labo-logo").files[0];
					var reader = new FileReader();
					reader.onloadend = function(){
							document.getElementById('labo-logo-upload').style.backgroundImage = "url(" + reader.result + ")";
					}
					if(file){
							reader.readAsDataURL(file);
					}else{
					}
				}

				document.getElementById('labo-photo').addEventListener('change', readURL2, true);
				function readURL2(){
					var file = document.getElementById("labo-photo").files[0];
					var reader = new FileReader();
					reader.onloadend = function(){
							document.getElementById('labo-photo-upload').style.backgroundImage = "url(" + reader.result + ")";
					}
					if(file){
							reader.readAsDataURL(file);
					}else{
					}
				}
		</script>

@endsection