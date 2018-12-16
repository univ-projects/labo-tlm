@extends('layouts.master')

@section('title','LRI | Contact')

@section('header_page')

	  <h1>
        Contact

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Contact</li>
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
        <div class="col-md-3">


          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src=" {{asset($contact->photo)}}" alt="User profile picture">

              <h3 class="profile-username text-center">{{$contact->nom}} {{$contact->prenom}}</h3>

              <p class="text-muted text-center">{{$contact->fonction}}</p>

            </div>
            <!-- /.box-body -->
          </div>

        </div>
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">A propos</a></li>
            
							 @if(Auth::user()->role->nom == 'admin' || Auth::user()->id===$contact->created_by)
              <li ><a href="#activity1" data-toggle="tab">Modifier</a></li>
              @endif
              <li><a href="#timeline" data-toggle="tab">Participations</a></li>
            </ul>

            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <div class="box-body">


									@if($contact->partenaire_id)
								<div class="row" style="margin-top: 10px">
								<div class="col-md-3">
									<strong><i class="fa fa-group  margin-r-5"></i>Partenaire</strong>
								 </div>
									<div class="col-md-9">
										<a href="{{url('partenaires/'.$contact->partenaire_id.'/details')}}">{{$contact->partenaire_contact->nom}}</a>
									</div>
								</div>
								@endif

								<div class="row" style="margin-top: 10px">
								 <div class="col-md-3" style="padding-top: 10px">
									 <strong><i class="fa fa-tasks margin-r-5"></i>Fonction</strong>
								 </div>
								 <div class="col-md-9" style="padding-top: 10px">
									 {{$contact->fonction}}
								 </div>
							 </div>

								<div class="row" style="margin-top: 10px">
								 <div class="col-md-3" style="padding-top: 10px">
									 <strong><i class="fa fa-envelope margin-r-5"></i>Email</strong>
								 </div>
								 <div class="col-md-9" style="padding-top: 10px">
									 {{$contact->email}}
								 </div>
								</div>

                  @if($contact->num_tel)
                  <div class="row" style="margin-top: 10px">
                  <div class="col-md-3">
                    <strong><i class="fa fa-phone margin-r-5"></i>N° de télépone</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{$contact->num_tel}}
                    </p>
                  </div>
              	  </div>
                  @endif








            	</div>
              </div>


		          <div class=" tab-pane " id="activity1">
		            <form class="well form-horizontal" action=" {{url('contacts/'. $contact->id) }} " method="post"  id="contact_form" enctype="multipart/form-data">

		            	<input type="hidden" name="_method" value="PUT">
		              {{ csrf_field() }}

		              <fieldset>

		                      <div class="form-group ">
		                        <label class="col-md-3 control-label">Nom</label>
		                        <div class="col-md-9 inputGroupContainer @if($errors->get('name')) has-error @endif">
		                          <div class="input-group"  style="width: 40%">
		                            <input  name="name" class="form-control" value="{{$contact->nom}}" type="text">
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
		                            <input  name="prenom" value="{{$contact->prenom}}" class="form-control"  type="text">
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
																	<div class="input-group"  style="width: 40%">
																			<select name="partenaire_id" class="form-control selectpicker">
																				<option value="{{$contact->partenaire_id}}">{{$contact->partenaire_contact->nom}}</option>
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
																	<label class="col-md-3 control-label">Fonction</label>
																		<div class="col-md-9 inputGroupContainer">
																			<div class="input-group"  style="width: 40%">
																				<input name="fonction" type="text" class="form-control" data-mask value="{{$contact->fonction}}">
																			</div>
																	</div>
														</div>




													<div class="form-group">
		                        <label class="col-md-3 control-label">E-Mail</label>
		                          <div class="col-md-9 inputGroupContainer @if($errors->get('email')) has-error @endif">
		                            <div class="input-group"  style="width: 40%">
		                                <input name="email" type="email" class="form-control" value="{{$contact->email}}">
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
																			<div class="input-group" style="width: 40%">
																				<input name="num_tel" type="text" class="form-control" data-inputmask='"mask": "(999) 999-999-999"' data-mask value="{{$contact->num_tel}}">
																			</div>
		                              </div>
		                        </div>

														<div class="form-group">
																<label class="col-md-3 control-label">Photo</label>

																		<div class="col-md-9 inputGroupContainer">
																			<div id='materiel-upload' style="background-image:url('{{asset($contact->photo)}}')">
																				<div class="hvr-profile-img">
																					<input type="file" name="img" id='materiel-photo'  class="upload w180" title="Dimensions 180 X 180" id="imag">
																				</div>
																				<i class="fa fa-camera"> <h4>Importer une photo</h4></i>
																			</div>
																		</div>
														</div>






		              </fieldset>

		              <div style="padding-top: 30px; margin-left: 35%;">
		              <a href="{{url('contacts')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
		               <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Valider</button>
		                  </div>
		            </form>
		          </div>

							<div class="tab-pane" id="timeline" style="padding:25px 0 25px 0">



								<table id="example2" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th><i class="fa fa-lg fa-tasks margin-r-5"></i>Type</th>
											<th><i class="fa fa-lg fa-tag margin-r-5"></i>Titre</th>
											<th><i class="fa fa-lg fa-comment margin-r-5"></i>Déscription</th>
											<th>Voir</th>
										</tr>
									</thead>
									<tbody>
										@foreach($participants as $contact)
										<tr>
											<td style="width:100px">{{$contact->type}}</td>
											<td>{{ str_limit($contact->titre, $limit = 60, $end = '...') }}</td>
											<td>{{ str_limit($contact->resume, $limit = 60, $end = '...') }}</td>
											<td>
												<div class="btn-group">
															<a href="{{ url(strtolower($contact->type).'s/'.$contact->id.'/details')}}" class="btn btn-info">
																<i class="fa fa-eye"></i>
															</a>
														</div>
												</td>

										</tr>
										@endforeach

									</tbody>
									<tfoot>
										<tr>
											<th><i class="fa fa-lg fa-tasks margin-r-5"></i>Type</th>
											<th><i class="fa fa-lg fa-tag margin-r-5"></i>Titre</th>
											<th><i class="fa fa-lg fa-comment margin-r-5"></i>Déscription</th>
											<th>Voir</th>
										</tr>
									</tfoot>
								</table>
							</div>



              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
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
