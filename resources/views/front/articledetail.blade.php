@extends('layouts.front')
@extends('layouts.projetdetail')

@section('title','Article')

@section('content')



<div class="page-head" style="    background-image:
            linear-gradient(to right bottom,
             rgba(105, 172, 199, 0.2),
             rgba(11, 125, 218, 0.8)),
            url({{asset('images/images/img/team.jpg')}});
            background-position: center;
            background-size:cover;">
      <div class="container">
        <h2 class="page-title">{{$projet->titre}}</h2>
        <!-- <small>équipe Geni Logiciel</small> -->
      </div>
    </div>


  <main class="main-content">
    <div class="fullwidth-block">
      <div class="container">
        <a href="." class="button back"><img src="{{asset('images/images/icons/arrow-back.png')}}" alt="">Retour aux Articles</a>
        <div class="row">
          <div class="col-md-6">
            <figure>
              <img src="{{asset($projet->photo)}}" alt="" style="width: 500px;height:350px;">
            </figure>
          </div>
          <div class="col-md-6">
            <h2 class="section-title">{{$projet->titre}}</h2>
            <ul class="project-info">
              <li><strong>Type:</strong>{{$projet->type}}</li>
              <li><strong>Date:</strong> {{$projet->date}}</li>
              <li><strong>Pays et Ville </strong>{{$projet->lieu_pays}}  {{$projet->lieu_ville}} </li>
              <li><strong>Conference:</strong> {{$projet->conference}}</li>
              <li><strong>Journal: {{$projet->journal}}</li>
              <li><strong>Par:  </strong>  {{$par[0]->name}} {{$par[0]->prenom}}</li>

            </ul>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
              {{$projet->resume}}
          </div>

        </div>
      </div>
    </div>

</main> <!-- .main-content -->

@endsection
