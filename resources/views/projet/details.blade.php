@extends('layouts.master')

 @section('title','LRI | Détails actualités')

@section('header_page')
      <h1>
        Actualité
        <small>Détails</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{url('actualites')}}">Actualités</a></li>
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
                    <strong>Contenu</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                     {{$actualite->contenu}}
                    </p>
                  </div>
                </div>
                <div class="row container">
                  <div class="col-md-3">
                    <strong>Photo</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      <img src="{{asset($actualite->photo)}}" alt="Actualité photo">
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
                      {{$actualite->proprietaireUser->name}} {{$actualite->proprietaireUser->prenom}}
                    </p>
                  </div>

                  <strong><i class="margin-r-5"></i></strong>
                <hr>
                <div class="col-md-3">
                  <strong><i class="fa fa-user  margin-r-5"></i>Chef du actualite</strong>
                 </div>
                  <div class="col-md-9">
                    <a href="{{url('membres/'.$actualite->chef_id.'/details')}}">{{$actualite->chef->name}} {{$actualite->chef->prenom}}</a>
                  </div>

                <strong><i class="margin-r-5"></i></strong>
                  <hr>

                <div class="col-md-3">
                  <strong><i class="fa fa-group  margin-r-5"></i>Membres du actualite</strong>
                 </div>
                  <div class="col-md-9">
                    @foreach($membres as $membre)
                    <ul>
                        <li><a href="{{url('membres/'.$membre->id.'/details')}}">{{ $membre->name }} {{ $membre->prenom }}</a></li>
                    </ul>
                    @endforeach

                  </div>

                  <strong><i class="margin-r-5"></i></strong>
                <hr>
                @if($actualite->lien)
                <div class="row">
                <div class="col-md-3">
                  <strong><i class="fa fa-link  margin-r-5"></i>Lien</strong>
                 </div>
                  <div class="col-md-9">
                    <a href="#">{{$actualite->lien}}</a>
                  </div>
                </div>
                @endif
                @if($actualite->detail)
                <div class="row" style="margin-top: 10px">
                <div class="col-md-3">
                  <strong><i class="fa fa-link  margin-r-5"></i>Details</strong>
                 </div>
                  <div class="col-md-9">
                    <a href="{{asset($actualite->detail)}}">Lien fichier</a>
                  </div>
                </div>
                @endif


            <!-- /.box-body -->
            </div>

         </div><!-- /.container -->
      </div>
</div>
@endsection
