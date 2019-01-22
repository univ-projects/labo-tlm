@extends('layouts.master')

 @section('title',"EasyLab | $laboDetail->achronymes")

@section('header_page')

       <h1>
        Laboratoires
        <small>{{$laboDetail->achronymes}}</small>
      </h1>
        <ol class="breadcrumb">
          <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li><a href="{{url('laboratoires')}}">laboratoires</a></li>
          <li class="active">{{$laboDetail->achronymes}}</li>
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
              <li><a href="#apropos" data-toggle="tab">A propos</a></li>
                @if(Auth::user()->role->nom == 'admin' || (Auth::user()->role->nom == 'directeur' && Auth::user()->id==$laboDetail->directeur))
                  <li class="active"><a href="#modifier" data-toggle="tab">Modifier</a></li>
                @endif
                <li><a href="#teams" data-toggle="tab">Equipes</a></li>
                <li><a href="#membres" data-toggle="tab">Membres</a></li>
                <li><a href="#stats" data-toggle="tab">Statitiques</a></li>

            </ul>

      <div class="tab-content">

        <div class="tab-pane" id="apropos">
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

									 @if(isset($laboDetail->directeu))
									    <a href="{{url('membres/'.$laboDetail->directeur.'/details')}}">
                         {{$laboDetail->directeu->name}} {{$laboDetail->directeu->prenom}}
                       </a>
                   @else
                   <b> Pas encore désigné </b>
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
                  <?php echo strip_tags($laboDetail->apropos, '<b><a><i><u>') ?>
                </div>
              </div>
            </li>



            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
        </div>
        </div>

        <div class="tab-pane active" id="modifier">
          <form class="well form-horizontal" action="{{url('laboratoires/'. $laboDetail->id) }} " method="post"  id="contact_form" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
              {{ csrf_field() }}
              <fieldset>

                      <div class="form-group ">
                        <label class="col-md-3 control-label">Intitulé *</label>
                        <div class="col-md-9 inputGroupContainer">
                          <div class="input-group" style="width: 70%">
                            <input  name="nom" class="form-control" value="{{$laboDetail->nom}}" type="text">
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
		                          <textarea name="apropos" class="form-control" rows="3" placeholder="Entrez ..." id="txt">{{$laboDetail->apropos}}</textarea>

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
																	 @if($membre->user_id==$laboDetail->directeur)
																			<?php $a='selected'; ?>
																		@else
																			<?php $a=''; ?>
																		@endif
		                              	<option value="{{$membre->user_id}}" <?php echo $a ?>>{{$membre->name}} {{$membre->prenom}}</option>
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

        <div class="tab-pane" id="teams">
          <table id="example2" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th><i class="fa fa-lg fa-tag margin-r-5"></i>Intitule</th>
                <th><i class="fa fa-lg fa-tag margin-r-5"></i>Achronymes</th>
                <th><i class="fa fa-lg fa-user margin-r-5"></i>Chef</th>
                <th><i class="fa fa-lg fa-users margin-r-5"></i>Membres</th>
                <th><i class="fa fa-lg fa-message margin-r-5"></i>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($equipes as $equipe)
              <tr>
                <td>{{$equipe->nom}}</td>
                <td>{{$equipe->achronymes}}</td>
                <td><a href="{{url('membres/'.$equipe->chef_id.'/details')}}">{{$equipe->name}} {{$equipe->prenom}}</a> </td>
                <td></td>
                <td style="width:250px"><?php echo str_limit(strip_tags($equipe->resume, '<b><a><i>'), $limit = 60, $end = '...') ?></td>

                <td>
                  <div class="btn-group">

                    <form action="{{ url('equipes/'.$equipe->id)}}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}

                        <a href="{{ url('equipes/'.$equipe->id.'/details')}}" class="btn btn-info">
                          <i class="fa fa-eye"></i>
                        </a>

                        @if(Auth::user()->role->nom == 'admin' || (Auth::user()->role->nom == 'directeur' && Auth::user()->id==$laboDetail->directeur) || (Auth::user()->id==$equipe->chef_id))


                        <a href="{{url('equipes/'.$equipe->equipe_id.'/details')}}" class="btn btn-default">
                          <i class="fa fa-edit"></i>
                        </a>


                         <a href="#supprimer{{ $equipe->id }}Modal" role="button" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                          <div class="modal fade" id="supprimer{{ $equipe->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="supprimer{{ $equipe->id }}ModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">

                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body text-center">
                                          Voulez-vous vraiment effectuer la suppression ?
                                      </div>
                                      <div class="modal-footer">
                                          <form class="form-inline" action="{{ url('equipes/'.$equipe->id)}}"  method="POST">
                                              @method('DELETE')
                                              @csrf
                                          <button type="button" class="btn btn-light" data-dismiss="modal">Non</button>
                                              <button type="submit" class="btn btn-danger">Oui</button>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          @endif

                    </form>
                  </div>
                </td>
              </tr>
              @endforeach

            </tbody>
            <tfoot>
              <tr>
                <th><i class="fa fa-lg fa-tag margin-r-5"></i>Intitule</th>
                <th><i class="fa fa-lg fa-tag margin-r-5"></i>Achronymes</th>
                <th><i class="fa fa-lg fa-user margin-r-5"></i>Chef</th>
                <th><i class="fa fa-lg fa-users margin-r-5"></i>Membres</th>
                <th><i class="fa fa-lg fa-message margin-r-5"></i>Description</th>
                <th>Action</th>
              </tr>
            </tfoot>
          </table>

        </div>

        <div class="tab-pane" id="membres">
          <table id="example3" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th><i class="fa fa-lg fa-user margin-r-5"></i>Nom</th>
                <th><i class="fa fa-lg fa-user margin-r-5"></i>Prénom</th>
                <th><i class="fa fa-lg fa-users margin-r-5"></i>Equipe</th>
                <th><i class="fa fa-lg fa-email margin-r-5"></i>Email</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($membres as $membre)
              <tr>
                <td>{{$membre->name}}</td>
                <td>{{$membre->prenom}}</td>
                <td><a href="{{url('equipes/'.$membre->equipe_id.'/details')}}">{{$membre->team}}</a> </td>
                <td>{{$membre->email}}</td>


                <td>
                  <div class="btn-group">

                    <form action="{{ url('membres/'.$membre->id)}}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}

                        <a href="{{ url('membres/'.$membre->id.'/details')}}" class="btn btn-info">
                          <i class="fa fa-eye"></i>
                        </a>

                        @if(Auth::user()->role->nom == 'admin' || (Auth::user()->role->nom == 'directeur' && Auth::user()->id==$laboDetail->directeur) || (Auth::user()->id==$membre->id))


                        <a href="{{url('membres/'.$membre->id.'/edit')}}" class="btn btn-default">
                          <i class="fa fa-edit"></i>
                        </a>


                         <a href="#supprimer{{ $membre->id }}Modal" role="button" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                          <div class="modal fade" id="supprimer{{ $membre->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="supprimer{{ $membre->id }}ModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">

                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body text-center">
                                          Voulez-vous vraiment effectuer la suppression ?
                                      </div>
                                      <div class="modal-footer">
                                          <form class="form-inline" action="{{ url('membres/'.$membre->id)}}"  method="POST">
                                              @method('DELETE')
                                              @csrf
                                          <button type="button" class="btn btn-light" data-dismiss="modal">Non</button>
                                              <button type="submit" class="btn btn-danger">Oui</button>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          @endif

                    </form>
                  </div>
                </td>
              </tr>
              @endforeach

            </tbody>
            <tfoot>
              <tr>
                <th><i class="fa fa-lg fa-user margin-r-5"></i>Nom</th>
                <th><i class="fa fa-lg fa-user margin-r-5"></i>Prénom</th>
                <th><i class="fa fa-lg fa-users margin-r-5"></i>Equipe</th>
                <th><i class="fa fa-lg fa-email margin-r-5"></i>Email</th>
                <th>Action</th>
              </tr>
            </tfoot>
          </table>

        </div>

        <div class="tab-pane" id="stats">
          <div class="box-body">
            <div class="chart">
              <canvas id="pieChart" style="height:230px"></canvas>
            </div>
          </div>
        </div>

      </div>
      </div>
    </div>

<div class="col-md-4" style="padding:0px">



    <div class="col-md-12">
      <!-- USERS LIST -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Logo du {{$laboDetail->achronymes}}</h3>

        </div>
        <!-- /.box-header -->


        <div class="box-body no-padding" style="text-align:center">
          <img src="{{$laboDetail->logo}}" alt="{{$laboDetail->achronymes}}" width="200px" height="200px">
          <!-- /.users-list -->
        </div>
        <!-- /.box-body -->
      </div>
      <!--/.box -->
    </div>


    <div class="col-md-12"  >
    			<!-- USERS LIST -->
    			<div class="box box-primary">
    				<div class="box-header with-border">
    					<h3 class="box-title">Equipes du {{$laboDetail->achronymes}}</h3>

    				</div>
    				<!-- /.box-header -->
    				<div class="box-body no-padding">
              @if(reset($equipes))
    					<ul class="users-list clearfix">
    						@foreach($equipes as $equipe)
    						<li>
                  <a  href="{{url('equipes/'.$equipe->id.'/details')}}">
      							<img src="{{asset($equipe->team_photo)}}" alt="Equipe Image" height="100px" width="100px">
      				  		<span class="users-list-name"> {{$equipe->achronymes}}</span>
                  </a>
    						</li>
    						@endforeach
    					</ul>
              @else
                <b>Aucune équipe pour l'instant</b>
              @endif
    					<!-- /.users-list -->
    				</div>
    				<!-- /.box-body -->
    			</div>
    			<!--/.box -->
    		</div>




		<div class="col-md-12">
			<!-- USERS LIST -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Membres du {{$laboDetail->achronymes}}</h3>

				</div>
				<!-- /.box-header -->


        <style media="screen">
          .other-users{
            border: 1px solid #69acc7;
            border-radius: 7px;
            padding: 10px 0 10px 0;
          }
      </style>

				<div class="box-body no-padding">
          <?php $i=0; ?>
          @if(reset($membres))
					<ul class="users-list clearfix">
						@foreach($membres as $membre)
              <?php if ($i<6): ?>

    						<li>
                  <a  href="{{url('membres/'.$membre->user_id.'/details')}}">
      							<img src="{{asset($membre->photo_user)}}" alt="User Image">
      				  		<span class="users-list-name"> {{$membre->name}}</span>
      							<span class="users-list-date">{{$membre->prenom}}</span>
                  </a>
    						</li>

              <?php $i++; endif; ?>
              @if($i>=6)
              <?php $j=0;$list=""; ?>
                @foreach($membres as $m)
                  <?php $j++; ?>
                  @if($j>6)
                    <?php $list.="$m->name $m->prenom </br>" ?>
                  @endif
                @endforeach
                @if($j>6)
                  <span class="other-users" data-toggle="tooltip" data-placement="bottom"
                                title="{{$list}}"
                          data-html="true"
                          style="color:#67acc9">
                               + {{$j-6}} autres membres

                  </span>
                  @endif
                  @break
              @endif
            @endforeach
					</ul>
          @else
            <b>Aucun membres pour l'instant</b>
          @endif
					<!-- /.users-list -->
				</div>
				<!-- /.box-body -->
			</div>
			<!--/.box -->
		</div>

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



@section('scripts')
<script src="{{url( 'js/Chart.min.js' )}}"></script>
  <script src="{{url( 'js/create-charts2.js' )}}"></script>
@endsection
