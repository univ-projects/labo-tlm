@extends('layouts.master')

 @section('title','LRI | Détails projet')

@section('header_page')
      <h1>
        Projet
        <small>Détails</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{url('projets')}}">Projets</a></li>
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
                      {{$projet->intitule}}

                    </p>
                  </div>
                </div>
                <div class="row container">
                  <div class="col-md-3">
                    <strong>Résumé</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                     {{$projet->resume}}
                    </p>
                  </div>
                </div>
                <div class="row container">
                  <div class="col-md-3">
                    <strong>Type</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{$projet->type}}
                    </p>
                  </div>
                </div>
                <div class="row container">
                  <div class="col-md-3">
                    <strong>Date début</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{$projet->date_debut}}
                    </p>
                  </div>
                </div>
                @if(isset($projet->date_fin))
                <div class="row container">
                  <div class="col-md-3">
                    <strong>Date fin</strong>
                  </div>
                  <div class="col-md-9">
                    <p class="text-muted">
                      {{$projet->date_fin}}
                    </p>
                  </div>
                </div>
                @endif




                  <strong><i class="margin-r-5"></i></strong>
                <hr>
                <div class="col-md-3">
                  <strong><i class="fa fa-user  margin-r-5"></i>Chef du projet</strong>
                 </div>
                  <div class="col-md-9">
                    <a href="{{url('membres/'.$projet->chef_id.'/details')}}">{{$projet->chef->name}} {{$projet->chef->prenom}}</a>
                  </div>

                <strong><i class="margin-r-5"></i></strong>
                  <hr>

                <div class="col-md-3">
                  <strong><i class="fa fa-group  margin-r-5"></i>Membres du projet</strong>
                 </div>
                  <div class="col-md-9">
                    @foreach($membres as $membre)
                    <ul>
                        <li><a href="{{url('membres/'.$membre->id.'/details')}}">{{ $membre->name }} {{ $membre->prenom }}</a></li>
                    </ul>
                    @endforeach

                  </div>


                  @if(reset($membres_ext))

                    <div class="col-md-3 " style="padding-top: 20px">
                      <strong><i class="fa fa-handshake-o margin-r-5"></i>Partenaires</strong>
                    </div>
                    <div class="col-md-9" style="padding-top: 20px">
                    @foreach($membres_ext as $membre)
                    <ul>
                        <li>
                          <a href="{{url('contacts/'.$membre->id.'/details')}}"> {{$membre->contactNom}} {{$membre->prenom}}</a>
                          (<a href="{{url('partenaires/'.$membre->id.'/details')}}"> {{$membre->nom}}</a>)
                        </li>
                    </ul>

                    @endforeach
                    </div>

                  @endif

                  <strong><i class="margin-r-5"></i></strong>
                <hr>
                @if(strpos($projet->photo, 'Default') == false)
                <div class="row">
                <div class="col-md-3">
                  <strong><i class="fa fa-link  margin-r-5"></i>Image</strong>
                 </div>
                  <div class="col-md-9">
                    <img src="{{asset($projet->photo)}}" alt="{{$projet->intitule}}">
                  </div>
                </div>
                @endif


                  <strong><i class="margin-r-5"></i></strong>
                <hr>
                @if($projet->lien)
                <div class="row">
                <div class="col-md-3">
                  <strong><i class="fa fa-link  margin-r-5"></i>Lien</strong>
                 </div>
                  <div class="col-md-9">
                    <a href="#">{{$projet->lien}}</a>
                  </div>
                </div>
                @endif
                @if($projet->detail)
                <div class="row" style="margin-top: 10px">
                <div class="col-md-3">
                  <strong><i class="fa fa-link  margin-r-5"></i>Details</strong>
                 </div>
                  <div class="col-md-9">
                    <a href="{{asset($projet->detail)}}">Lien fichier</a>
                  </div>
                </div>
                @endif


            <!-- /.box-body -->
            </div>

         </div><!-- /.container -->
      </div>
</div>
@endsection
