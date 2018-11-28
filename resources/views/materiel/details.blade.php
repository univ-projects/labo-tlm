@extends('layouts.master')

@section('title','LRI | Materiel')

@section('header_page')

	  <h1>
        Materiel

      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Materiel</li>
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
        <div class="col-md-4">


          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img  src=" {{asset($materiel->photo)}}" alt="Materiel picture" width="300px" height="250px">

              <h3 class="profile-username text-center">{{$materiel->libelle}} </h3>



            </div>
            <!-- /.box-body -->
          </div>

        </div>
        <div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">A propos</a></li>
              <li><a href="#activity1" data-toggle="tab">Modifier</a></li>
							<li><a href="#activity2" data-toggle="tab">Exemplaires</a></li>
            </ul>

            <div class="tab-content">
              	<div class="active tab-pane" id="activity">
                <div class="box-body">

                  <div class="row">
                  <div class="col-md-3">
                    <strong><i class="fa fa-lg fa-flask margin-r-5"></i>Libéllé</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{$materiel->libelle}}
                    </p>
                  </div>
                  </div>



                  <div class="row" style="margin-top: 10px">
                  <div class="col-md-3">
                    <strong><i class="fa fa-lg fa-barcode margin-r-5"></i>Quantité </strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{$materiel->quantity}}
                    </p>
                  </div>
              	  </div>



	                <!-- <div class="row" style="margin-top: 10px">
	                	<div class="col-md-3">
	                  <strong><i class="fa fa-lg fa-group  margin-r-5"></i>Propriétaire</strong>
	                 </div>
	                  <div class="col-md-9">
											@if($materiel->proprietaire)
	                    	<a href="{{url('materiels/'.$materiel->proprietaire.'/details')}}">{{$materiel->proprietaireUser->name}} {{$materiel->proprietaireUser->prenom}}</a>
											@else
												Pas encore attribué a un membre
											@endif
										</div>
	                </div> -->
		      			<strong><i class="margin-r-5"></i></strong>
		              <hr>
		              @if($materiel->description)
		                <div class="col-md-3">
		                  <strong><i class="fa fa-lg fa-info-circle margin-r-5"></i> Description </strong>
		                 </div>
		                  <div class="col-md-9">
		                    <p class="text-muted">
		                       {{$materiel->description}}
		                    </p>

		                  </div>
		                @endif

		            </div>
              </div>






			          <div class="tab-pane" id="activity1">
									<form class="well form-horizontal" action=" {{url('materiels/'. $materiel->id) }}" method="post"  id="contact_form" enctype="multipart/form-data">
										<input type="hidden" name="_method" value="PUT">
										{{ csrf_field() }}
										<fieldset>

											<!-- Form Name -->
											<legend><center><h2><b>Modifier materiel</b></h2></center></legend><br>

											<!-- Text input-->
													<div class="col-md-6">

														<div class="form-group ">
															<label class="col-md-3 control-label">Libéllé *</label>
															<div class="col-md-9 inputGroupContainer @if($errors->get('libelle')) has-error @endif">
																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-lg fa-flask"></i></span>
																	<input  name="libelle" placeholder="Libéllé" class="form-control"  type="text" value="{{$materiel->libelle}}">
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

														<!-- <div class="form-group ">
															<label class="col-md-3 control-label">Quantité</label>
															<div class="col-md-9 inputGroupContainer @if($errors->get('quantite')) has-error @endif">
																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-lg fa-flask"></i></span>
																	<input type="number" name="quantite"  min="0" class="form-control"  type="text" value="{{$materiel->quantity}}">
																 </div>
																	<span class="help-block">
																			@if($errors->get('quantite'))
																				@foreach($errors->get('quantite') as $message)
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
																							<textarea name="description" rows="5" style="width:100%">{{$materiel->description}}</textarea>
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


													<div class="form-group">
														<div class="form-group">
																<label class="col-md-3 control-label">Photo</label>

																		<div class="col-md-9 inputGroupContainer">
																			<div id='materiel-upload' style="background-image:url('{{asset($materiel->photo)}}')">
																				<div class="hvr-profile-img">
																					<input type="file" name="img" id='materiel-photo'  class="upload w180" title="Dimensions 180 X 180" id="imag">
																				</div>
																				<i class="fa fa-camera"> <h4>Importer une photo</h4></i>
																			</div>
																		</div>
														</div>
													</div>

											</div>

										</fieldset>

										<div class="row" style="padding-top: 30px; margin-left: 35%;">
										<a href="{{ url('materiels')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
										 <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Modifier</button>
												</div>
									</form>
			          </div>


								<div class="tab-pane" id="activity2">
									<div class=" pull-right">

										<a href="#add{{ $materiel->id }}Modal" role="button" class="btn btn-block btn-success btn-lg " data-toggle="modal"><i class="fa fa-plus margin-r-5"></i>Nouveau éxemplaire</a>
										<div class="modal fade" id="add{{ $materiel->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="add{{ $materiel->id }}ModalLabel" aria-hidden="true">
											 <div class="modal-dialog">
													 <div class="modal-content">
															 <div class="modal-header">
																 <!--   <h5 class="modal-title" id="supprimer{{ $materiel->id }}ModalLabel">Supprimer</h5> -->
																 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		 <span aria-hidden="true">&times;</span>
																 </button>
														 </div>
														 <div class="modal-body text-center">
																 <h2>Ajouter un exemplaire de ce materiel</h2>
														 </div>
														 <div class="modal-footer">
																 <form class="form-inline" action="{{ url('exemplaires/'.$catId)}}"  method="POST">
																	   {{ csrf_field() }}

																	 <div class="col-md-6">
																		 <div class="form-group">
																				<label class="col-md-3 control-label">Numéro * </label>
																					<div class="col-md-9 selectContainer @if($errors->get('numero')) has-error @endif">
																						<div class="input-group">
																						<span class="input-group-addon"><i class="fa fa-lg fa-barcode"></i></span>
																						<input name="numero" placeholder="numéro" class="form-control"  type="text" value="{{old('numero')}}">

																						</div>
																						<span class="help-block">
																							@if($errors->get('numero'))
																								@foreach($errors->get('numero') as $message)
																									<li> {{ $message }} </li>
																								@endforeach
																							@endif
																					</span>
																					</div>
																				</div>
																	 </div>


																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="col-md-3 control-label">Proprietaire </label>
																					<div class="col-md-9 selectContainer @if($errors->get('proprietaire')) has-error @endif">
																						<div class="input-group">
																						<span class="input-group-addon"><i class="fa fa-lg fa-barcode"></i></span>
																						<select name="proprietaire" class="form-control">

																								<option></option>

																							 @foreach($proprietaires as $p)
																							<option value="{{$p->id}}">{{$p->name}} {{$p->prenom}}</option>
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
																				</div>
																			</div>



																			<div class="row" style="text-align:center;padding-top: 30px; ">
																					 <button type="button" class="btn btn-light" data-dismiss="modal">Annuler</button>
																					 <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Ajouter</button>
																			</div>


																 </form>
														 </div>
												 </div>
										 </div>
										</div>

									</div>

									<table id="example2" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th><i class="fa fa-lg fa-barcode margin-r-5"></i>Numéro</th>
												<th><i class="fa fa-lg fa-users margin-r-5"></i>Proprietaire</th>

												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											@foreach($exemplaires as $materiel)
											<tr>
												<td>{{$materiel->numero}}</td>

												<td style="text-align:center">
													@if($materiel->proprietaireUser)
													<a href="{{ url('membres/'.$materiel->proprietaireUser->id.'/details')}}">
														{{$materiel->proprietaireUser->name}} {{$materiel->proprietaireUser->prenom}}
													</a>
													@else
														Non affecté
													@endif
												</td>


												<td>
													<div class="btn-group">




														<a href="#detail{{ $materiel->id }}Modal" role="button" class="btn btn-info" data-toggle="modal"><i class="fa fa-eye"></i></a>
														<div class="modal fade" id="detail{{ $materiel->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="detail{{ $materiel->id }}ModalLabel" aria-hidden="true">
															 <div class="modal-dialog">
																	 <div class="modal-content">
																			 <div class="modal-header">
																				 <!--   <h5 class="modal-title" id="supprimer{{ $materiel->id }}ModalLabel">Supprimer</h5> -->
																				 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
																						 <span aria-hidden="true">&times;</span>
																				 </button>
																		 		</div>
																		 <div class="modal-body text-center">
																				 <h2>Detail de cet exemplaire</h2>
																				 <div class="row">
																				       <div class="col-md-12">
																				            <div class="box box-primary">
																											<div class="box-body">

																													<div class="row">
																														<div class="col-md-3">
																															<strong>Numéro</strong>
																														</div>
																														<div class="col-md-9">
																															<p class="text-muted">
																																{{$materiel->numero}}
																															</p>
																														</div>
																														</div>
																													<div class="row">
																														<div class="col-md-3">
																															<strong>Propriétaire</strong>
																														</div>
																														<div class="col-md-9">
																															<p class="text-muted">
																																@if($materiel->proprietaireUser)
																																	{{ $materiel->proprietaireUser->name }} {{ $materiel->proprietaireUser->prenom }}
																																@else
																																	Non affecté
																																@endif
																															</p>
																														</div>
																													</div>
																											</div>

																								</div>
																							</div>
																				</div>
																			</div>
																		 <div class="modal-footer">
																			 <div class="text-center">
																					 <h2>Anciennes affectation</h2>
																			 </div>
																			 <table id="example3" class="table table-bordered table-striped" style="text-align:center">
																				 <thead>
																					 <tr>
																						 <th>Propriétaires</th>
																						 <th>De</th>
																						 <th>A</th>

																					 </tr>
																				 </thead>
																				 <tbody>
																					 @foreach($affectations as $affectation)
																						 @if($affectation->materiel_id==$materiel->id)
																						 <tr>
																							 <td>
																								 <a href="{{url('membres/'.$affectation->user_id.'/details')}}">
																								 	{{$affectation->name}} {{$affectation->prenom}}
																								 </a>
																							 </td>
																							 <td>{{$affectation->from}}</td>

																							 <td>
																								{{$affectation->to}}
																							 </td>
																						 </tr>
																						 @endif
																					 @endforeach
																				 </tbody>
																			 </table>

																		 </div>
																 </div>
														 </div>
														</div>


																<a href="#edit{{ $materiel->id }}Modal" role="button" class="btn btn-default" data-toggle="modal"><i class="fa fa-edit"></i></a>
															 	<div class="modal fade" id="edit{{ $materiel->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="edit{{ $materiel->id }}ModalLabel" aria-hidden="true">
																	 <div class="modal-dialog">
																			 <div class="modal-content">
																					 <div class="modal-header">
																						 <!--   <h5 class="modal-title" id="supprimer{{ $materiel->id }}ModalLabel">Supprimer</h5> -->
																						 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
																								 <span aria-hidden="true">&times;</span>
																						 </button>
																				 </div>
																				 <div class="modal-body text-center">
																						 <h2>Modifier cet exemplaire</h2>
																				 </div>
																				 <div class="modal-footer">
																						 <form class="form-inline" action="{{ url('exemplaires/'.$materiel->id.'/'.$materiel->category_id)}}"  method="POST">
																								 @method('PUT')
																								 @csrf
																								 <div class="col-md-6">
																									 <div class="form-group">
 																											<label class="col-md-3 control-label">Numéro * </label>
 																												<div class="col-md-9 selectContainer @if($errors->get('numero')) has-error @endif">
 																													<div class="input-group">
 																													<span class="input-group-addon"><i class="fa fa-lg fa-barcode"></i></span>
 																													<input name="numero" placeholder="numéro" class="form-control"  type="number" value="{{$materiel->numero}}">

 																													</div>
 																													<span class="help-block">
 																														@if($errors->get('numero'))
 																															@foreach($errors->get('numero') as $message)
 																																<li> {{ $message }} </li>
 																															@endforeach
 																														@endif
 																												</span>
 																												</div>
 																											</div>
																								 </div>


																								 <div class="col-md-6" >

  																										<label class="col-md-3 ">Propriétaire </label>
  																											<div class="col-md-9 selectContainer @if($errors->get('proprietaire')) has-error @endif" >
  																												<div class="input-group " >
  																												<span class="input-group-addon"><i class="fa fa-lg fa-user"></i></span>
																													<select name="proprietaire" class="form-control">
																														@if($materiel->proprietaireUser)
																															<option value="{{$materiel->proprietaire}}" selected>{{$materiel->proprietaireUser->name}} {{$materiel->proprietaireUser->prenom}}</option>

																														@endif
																															<option></option>
																														 @foreach($proprietaires as $p)
																														<option value="{{$p->id}}">{{$p->name}} {{$p->prenom}}</option>
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

																								 </div>


 																									<div class="row" style="text-align: center;padding-top: 30px; ">
 																										   <button type="button" class="btn btn-light" data-dismiss="modal">Annuler</button>
 																										   <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Modifier</button>
 																									</div>


																						 </form>
																				 </div>
																		 </div>
																 </div>
															 	</div>



																 <a href="#supprimer{{ $materiel->id }}Modal" role="button" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
																	<div class="modal fade" id="supprimer{{ $materiel->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="supprimer{{ $materiel->id }}ModalLabel" aria-hidden="true">
																		<div class="modal-dialog">
																				<div class="modal-content">
																						<div class="modal-header">
																							<!--   <h5 class="modal-title" id="supprimer{{ $materiel->id }}ModalLabel">Supprimer</h5> -->
																							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																									<span aria-hidden="true">&times;</span>
																							</button>
																					</div>
																					<div class="modal-body text-center">
																							Voulez-vous vraiment effectuer la suppression ?
																					</div>
																					<div class="modal-footer">
																							<form class="form-inline" action="{{ url('exemplaires/'.$materiel->id.'/'.$materiel->category_id)}}"  method="POST">
																									@method('DELETE')
																									@csrf
																							<button type="button" class="btn btn-light" data-dismiss="modal">Non</button>
																									<button type="submit" class="btn btn-danger">Oui</button>
																							</form>
																					</div>
																			</div>
																		</div>
																	</div>


												</div>
												</td>
											</tr>
											@endforeach

										</tbody>
										<tfoot>
											<tr>
												<th><i class="fa fa-lg fa-barcode margin-r-5"></i>Numéro</th>
												<th><i class="fa fa-lg fa-users margin-r-5"></i>Propriétaire</th>
												<th>Action</th>
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
