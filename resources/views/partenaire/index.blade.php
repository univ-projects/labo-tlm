@extends('layouts.master')

@section('title','LRI | Liste des partenaires')

@section('header_page')
	<h1>
        Partenaires
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Partenaires</li>
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
              <legend><center><h2><b>PARTENAIRES</b></h2></center></legend>
            </div>

          </div>
          </div>

            <!-- /.box-header -->
          <div class="box-body">


            <div class=" pull-right" style="padding-bottom: 20px">
                <a href="{{url('partenaires/create')}}" type="button" class="btn btn-block btn-success btn-lg"><i class="fa fa-plus"></i> <i class="fa fa-handshake-o"></i> Nouveau partenaire</a>
            </div>


            <div class="row" >
              <div class="col-xs-12">
              @foreach($partenaires as $partenaire)


                <div class="col-xs-6">
                  <div class="box box-widget widget-user">
                    <div class="box-tools pull-right">
                      @if(Auth::user()->role->nom == 'admin' || Auth::user()->id===$partenaire->created_by)

                 <!--      <form action="{{ url('partenaires/'.$partenaire->id)}}" method="post">

                          {{csrf_field()}}
                          {{method_field('DELETE')}}
                      <button type="submit" class="btn btn-box-tool"><i class="fa fa-times"></i>
                      </button>
                      </form> -->


                      <a href="#supprimer{{ $partenaire->id }}Modal" role="button" class="btn btn-box-tool" data-toggle="modal"><i class="fa fa-times"></i></a>
                      <div class="modal fade" id="supprimer{{ $partenaire->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="supprimer{{ $partenaire->id }}ModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                    <!--   <h5 class="modal-title" id="supprimer{{ $partenaire->id }}ModalLabel">Supprimer</h5> -->
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body text-center">
                                      Voulez-vous vraiment effectuer la suppression ?
                                  </div>
                                  <div class="modal-footer">
                                      <form class="form-inline" action="{{ url('partenaires/'.$partenaire->id)}}"  method="POST">
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
                      <a class="users-list-name1" href="{{ url('partenaires/'.$partenaire->id.'/details')}}"><h3 class="widget-user-username">{{$partenaire->nom}}</h3></a>
                      <h5 class="widget-user-desc">{{$partenaire->achronymes}}</h5>
                    </div>
                    <div class="widget-user-image">

											@if(isset($partenaire->logo))
												<img class="img-circle" src="{{asset($partenaire->logo)}}" alt="partenaire logo">
											@else
												<img class="img-circle" src="{{asset('uploads/photo/materiels/materielDefault.png')}}" alt="Partenaire logo">
											@endif
                    </div>
                    <div class="box-footer">
                      <div class="row">

												<?php $notZero=false; ?>
                        @foreach($nbr as $nbrs)
													@if($nbrs->partenaire_id == $partenaire->id)
                        <div class="col-sm-4 border-right">
                          <div class="description-block">
                            <h5 class="description-header">

														{{$notZero=true}}
                             <?php $notZero=true; ?>

                          </h5>
                            <span class="description-text">Contacts</span>
                          </div>
                        </div>
													@endif

                         @endforeach
												 @if($notZero==false)
												 <div class="col-sm-4 border-right">
													 <div class="description-block">
														 <h5 class="description-header">
															 0
													 </h5>
														 <span class="description-text">Contacts</span>
													 </div>
												 </div>
												 @endif

												 <?php $notZero=false; ?>
												 @foreach($nbr_particip_article as $nbrs)
													 @if($nbrs->partenaire_id == $partenaire->id)
													<div class="col-sm-4 border-right">
														<div class="description-block">
															<h5 class="description-header">
																{{$nbrs->total}}
																<?php $notZero=true; ?>
														</h5>
															<span class="description-text">Articles</span>
														</div>
													</div>

												@endif

											 @endforeach
											 @if($notZero==false)
											 <div class="col-sm-4 border-right">
												 <div class="description-block">
													 <h5 class="description-header">
														 0
												 </h5>
													 <span class="description-text">Articles</span>
												 </div>
											 </div>
											 @endif


												<?php $notZero=false; ?>
												@foreach($nbr_particip_proj as $nbrs)
													@if($nbrs->partenaire_id == $partenaire->id)
                        <div class="col-sm-4">
                          <div class="description-block">
                            <h5 class="description-header">{{$nbrs->total}}<?php $notZero=true; ?></h5>
                            <span class="description-text">Projets</span>
                          </div>
                        </div>
												@endif

											 @endforeach
											 @if($notZero==false)
											 <div class="col-sm-4 border-right">
												 <div class="description-block">
													 <h5 class="description-header">
														 0
												 </h5>
													 <span class="description-text">Projets</span>
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
