@extends('layouts.master')

@section('title','LRI | Liste des laboratoires')

@section('header_page')
	<h1>
        laboratoires
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">laboratoires</li>
      </ol>
@endsection

@section('asidebar')

@endsection

@section('content')


  <div class="row">
      <div class="col-xs-12">
        <div class="box col-xs-12">
          <div class="container" style="padding-top: 30px">
          <div class="row">
            <div class="box-header col-xs-11">
              <legend><center><h2><b>Laboratoires</b></h2></center></legend>
            </div>

          </div>
          </div>

            <!-- /.box-header -->
          <div class="box-body">


            <div class=" pull-right" style="padding-bottom: 20px">
                <a href="{{url('laboratoires/create')}}" type="button" class="btn btn-block btn-success btn-lg"><i class="fa fa-plus"></i> <i class="fa fa-group"></i> Nouveau laboratoire</a>
            </div>


            <div class="row" >
              <div class="col-xs-12">
              @foreach($labos as $labo)


                <div class="col-xs-6">
                  <div class="box box-widget widget-user">
                    <div class="box-tools pull-right">
                      @if(Auth::user()->role->nom == 'admin' )

                 <!--      <form action="{{ url('laboratoires/'.$labo->id)}}" method="post">

                          {{csrf_field()}}
                          {{method_field('DELETE')}}
                      <button type="submit" class="btn btn-box-tool"><i class="fa fa-times"></i>
                      </button>
                      </form> -->


                      <a href="#supprimer{{ $labo->id }}Modal" role="button" class="btn btn-box-tool" data-toggle="modal"><i class="fa fa-times"></i></a>
                      <div class="modal fade" id="supprimer{{ $labo->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="supprimer{{ $labo->id }}ModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                    <!--   <h5 class="modal-title" id="supprimer{{ $labo->id }}ModalLabel">Supprimer</h5> -->
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body text-center">
                                      Voulez-vous vraiment effectuer la suppression ?
                                  </div>
                                  <div class="modal-footer">
                                      <form class="form-inline" action="{{ url('laboratoires/'.$labo->id)}}"  method="POST">
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
                    </div>

                    <div class="widget-user-header bg-aqua-active">
                      <a class="users-list-name1" href="{{ url('laboratoires/'.$labo->id.'/details')}}"><h3 class="widget-user-username">{{$labo->nom}}</h3></a>
                      <h5 class="widget-user-desc">{{$labo->achronymes}}</h5>
                    </div>
                    <div class="widget-user-image">
                      <img class="img-circle" src="@if(isset($labo->directeu)){{$labo->directeu->photo}}@else {{asset('/uploads/photo/materiels/materielDefault.png')}} @endif" alt="User Avatar">
                    </div>
                    <div class="box-footer">
                      <div class="row">
												<?php $zeroEquipe=true; ?>
                        @foreach($nbrEquipes as $nbrs)
                        @if($nbrs->labo_id == $labo->id)
												<?php $zeroEquipe=false; ?>
                        <div class="col-sm-4 border-right">
                          <div class="description-block">
                            <h5 class="description-header">

                             {{$nbrs->total}}

                          </h5>
                            <span class="description-text">Equipes</span>
                          </div>
                        </div>
                        @endif
                         @endforeach
												 @if($zeroEquipe)
												 <div class="col-sm-4 border-right">
													 <div class="description-block">
														 <h5 class="description-header">

															0

													 </h5>
														 <span class="description-text">Equipes</span>
													 </div>
												 </div>
												 @endif

                        <div class="col-sm-4 border-right">
                          <div class="description-block">
                            <h5 class="description-header">Directeur</h5>
                            <span class="description-text">
															@if(isset($labo->directeu))
															<a href="{{url('membres/'.$labo->directeur.'/details')}}" style="color: black">
																{{$labo->directeu->name}} {{$labo->directeu->prenom}}</a>
																@else Pas encore désigné
															@endif
															</span>
                          </div>
                        </div>

												<?php $zeroMembre=true; ?>
												@foreach($nbrMembres as $nbrs)
													@foreach($equipes as $e)
														@if($nbrs->equipe_id == $e->id AND $labo->id == $e->labo_id)
														<div class="col-sm-4 border-right">
															<div class="description-block">
																<h5 class="description-header">

																 {{$nbrs->total}}

															</h5>
																<span class="description-text">Membres</span>
															</div>
														</div>
														<?php $zeroMembre=false;break; ?>
														@endif
													 @endforeach
													<?php if(!$zeroMembre) break; ?>
												 @endforeach
												 @if($zeroMembre)
												 <div class="col-sm-4 border-right">
													 <div class="description-block">
														 <h5 class="description-header">

															0

													 </h5>
														 <span class="description-text">Membres</span>
													 </div>
												 </div>
												 @endif
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                  </div>
                  <!-- /.widget-user -->
                </div>


              @endforeach
            </div>
          </div>
            <!-- /.box-body -->
        </div>

      </div>
    </div>
  </div>

@endsection
