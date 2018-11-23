@extends('layouts.master')

 @section('title','LRI | Détails actualité')

@section('header_page')
      <h1>
        Actualité
        <small>Détails</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{url('actualites')}}">actualités</a></li>
        <li class="active">Détails</li>
      </ol>
@endsection

@section('asidebar')

@endsection

@section('content')
<div class="row">
      <div class="col-md-12">
           <div class="box box-primary">

            <div class="box-header with-border">
              <h3 class="box-title">Informations</h3>
            </div>
            <!-- /.box-header -->
              <div class="box-body">
                <div class="row container">
                  <div class="col-md-3">
                    <strong>Titre</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{$actualite->titre}}

                    </p>
                  </div>
                </div>

                <div class="row container">
                  <div class="col-md-3">
                    <strong>Photo</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      <img  src=" {{asset($actualite->photo)}}" alt="Photo Actualité" width="300px" height="250px">
                    </p>
                  </div>
                </div>

                  <strong><i class="margin-r-5"></i></strong>
                  <hr>

                  <div class="col-md-3">
                    <strong><i class="fa fa-group  margin-r-5"></i>Auteur</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
											@if($actualite->auteurUser)
												<a href="{{url('membres/'.$actualite->auteur.'/details')}}">@if(Auth::user()->id===$actualite->auteurUser->id)Moi @else {{$actualite->auteurUser->name}} {{$actualite->auteurUser->prenom}} @endif</a>
											@endif
                    </p>
                  </div>

                  <strong><i class="margin-r-5"></i></strong>
                <hr>
                <div class="col-md-3">
                  <strong><i class="fa fa-user  margin-r-5"></i>Etat</strong>
                 </div>
                  <div class="col-md-9">
                    <span class="label  @if($actualite->status) label-success @else label-default @endif">@if($actualite->status) En ligne @else Hors-ligne @endif</span>
                  </div>

                <strong><i class="margin-r-5"></i></strong>
                  <hr>

									<div class="col-md-3">
										<strong><i class="fa fa-user  margin-r-5"></i>Date d'ajout</strong>
									 </div>
										<div class="col-md-9">
											<p> @if($actualite->created_at==$actualite->updated_at) {{$actualite->created_at}} @else {{$actualite->updated_at}} @endif </p>
										</div>

									<strong><i class="margin-r-5"></i></strong>
										<hr>

		                  <div class="col-md-3">
		                    <strong>Contenu</strong>
		                  </div>
		                  <div class="col-md-9" style="border:1px solid #007bff; border-radius:5px">
		                     {{$actualite->contenu}}
		                    </p>
		                  </div>



            <!-- /.box-body -->
            </div>

         </div><!-- /.container -->
      </div>
</div>
@endsection
