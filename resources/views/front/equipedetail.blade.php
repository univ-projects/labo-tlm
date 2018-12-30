

@extends('layouts.front')

<!--@section('title','Acceuil')    hadi ta3ach -->

@section('content')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style media="screen">

@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
#team {
  background: #eee !important;
}

.btn-primary:hover,
.btn-primary:focus {
  background-color: #108d6f;
  border-color: #108d6f;
  box-shadow: none;
  outline: none;
}

.btn-primary {
  color: #fff;
  background-color: #007b5e;
  border-color: #007b5e;
}

section {
  padding: 60px 0;
}

section .section-title {
  text-align: center;
  color: #007b5e;
  margin-bottom: 50px;
  text-transform: uppercase;
}

#team .card {
  border: none;
  background: #ffffff;
}

.image-flip:hover .backside,
.image-flip.hover .backside {
  -webkit-transform: rotateY(0deg);
  -moz-transform: rotateY(0deg);
  -o-transform: rotateY(0deg);
  -ms-transform: rotateY(0deg);
  transform: rotateY(0deg);
  border-radius: .25rem;
}

.image-flip:hover .frontside,
.image-flip.hover .frontside {
  -webkit-transform: rotateY(180deg);
  -moz-transform: rotateY(180deg);
  -o-transform: rotateY(180deg);
  transform: rotateY(180deg);
}

.mainflip {
  -webkit-transition: 1s;
  -webkit-transform-style: preserve-3d;
  -ms-transition: 1s;
  -moz-transition: 1s;
  -moz-transform: perspective(1000px);
  -moz-transform-style: preserve-3d;
  -ms-transform-style: preserve-3d;
  transition: 1s;
  transform-style: preserve-3d;
  position: relative;
}

.frontside {
  position: relative;
  -webkit-transform: rotateY(0deg);
  -ms-transform: rotateY(0deg);
  z-index: 2;
  margin-bottom: 30px;
}

.backside {
  position: absolute;
  top: 0;
  left: 0;
  background: white;
  -webkit-transform: rotateY(-180deg);
  -moz-transform: rotateY(-180deg);
  -o-transform: rotateY(-180deg);
  -ms-transform: rotateY(-180deg);
  transform: rotateY(-180deg);
  -webkit-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
  -moz-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
  box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
}

.frontside,
.backside {
  -webkit-backface-visibility: hidden;
  -moz-backface-visibility: hidden;
  -ms-backface-visibility: hidden;
  backface-visibility: hidden;
  -webkit-transition: 1s;
  -webkit-transform-style: preserve-3d;
  -moz-transition: 1s;
  -moz-transform-style: preserve-3d;
  -o-transition: 1s;
  -o-transform-style: preserve-3d;
  -ms-transition: 1s;
  -ms-transform-style: preserve-3d;
  transition: 1s;
  transform-style: preserve-3d;
}

.frontside .card,
.backside .card {
  min-height: 312px;
}

.backside .card a {
  font-size: 18px;
  color: #007b5e !important;
}

.frontside .card .card-title,
.backside .card .card-title {
  color: #007b5e !important;
}

.frontside .card .card-body img {
  width: 120px;
  height: 120px;
  border-radius: 50%;
}
</style>

<div class="site-content">


  <div class="page-head" style="    background-image:
          linear-gradient(to right bottom,
           rgba(105, 172, 199, 0.2),
           rgba(11, 125, 218, 0.8)),
          url({{asset('images/images/img/team.jpg')}});
          background-position: center;
          background-size:cover;">
    <div class="container">
      <h2 class="page-title">{{$equipe->intitule}}</h2>
      <small>équipe {{$equipe->intitule}}</small>
    </div>
  </div>


  <main class="main-content">
    <div class="fullwidth-block">
      <div class="container">
          <a href="." class="button back"><img src="{{asset('images/images/icons/arrow-back.png')}}" alt="">Revenir aux Equipe</a>
        <div class="row">
          <div class="col-md-4">
            <h2 class="section-title">Présentation de l'équipe</h2>
            <ol class="circle">
              <li>
                <h3>Appellation</h3>
                <h4>{{$equipe->achronymes}}</h4>

              </li>
              <li>
                <h3>Chef d'équipe</h3>
                <div class="row">

                  <a href="../profile/{{$equipe->chef_id}}" style="color:black">
                    <div class="col-md-4">
                      <img src="{{asset($chef[0]->photo)}}" alt="" width="60px" height="60px" class="img img-responsivee" style="border-radius:20px">
                    </div>
                    <div class="col-md-8">
                      <p>{{$chef[0]->name}} {{$chef[0]->prenom}}</p>
                      <p>-Université de Tlemcen-</p>
                    </div>
                  </a>
                </div>
              </li>
              <li>
                <h3>Description</h3>
                <p>
                    <!-- {{$equipe->description}} -->
                </p>
              </li>
            </ol>
          </div>
          <div class="col-md-4">
            <h2 class="section-title">Axes de recherche</h2>
            <p>
              <span style="color:#67acc9">1-</span>
              {{$equipe->axes_recherche}}
              <br/>

            </p>
          </div>


          <div class="col-md-4">
            <h2 class="section-title">Récentes activités</h2>
            <ul class="arrow-list has-border">
              <li> <a href="project.html"> Vériﬁcation de contrats logiciels à l’aide de transformations de modèles Application à Kmeliai </a></li>
              <li> <a href="project.html"> Vériﬁcation de contrats logiciels à l’aide de transformations de modèles Application à Kmeliai </a></li>
              <li> <a href="project.html"> Vériﬁcation de contrats logiciels à l’aide de transformations de modèles Application à Kmeliai </a></li>
              <li> <a href="project.html"> Vériﬁcation de contrats logiciels à l’aide de transformations de modèles Application à Kmeliai </a></li>
              <li> <a href="project.html"> Vériﬁcation de contrats logiciels à l’aide de transformations de modèles Application à Kmeliais </a></li>
              <li> <a href="project.html"> Vériﬁcation de contrats logiciels à l’aide de transformations de modèles Application à Kmeliai </a></li>
              <li> <a href="project.html"> Vériﬁcation de contrats logiciels à l’aide de transformations de modèles Application à Kmeliai </a></li>
            </ul>
          </div>

      </div>
    </div>





    <section id="team" class="pb-5">
        <div class="container">
            <h5 class="section-title h1">OUR TEAM</h5>
            <div class="row">
                <!-- Team member -->
                @foreach($membres as $membre)
                <?php if ($equipe->chef_id != $membre->id): ?>


                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                        <div class="mainflip">
                            <div class="frontside">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <p><img class=" img-fluid" src="{{asset($membre->photo)}}" alt="card image"></p>
                                      <h4 class="card-title">{{$membre->name}} {{$membre->prenom}}</h4>
                                        <p class="card-text">{{$membre->grade}}</p>
                                        <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="backside">
                                <div class="card">
                                    <div class="card-body text-center mt-4">
                                    <a href="../../profile/{{$membre->id}}"><h4 class="card-title">{{$membre->name}} {{$membre->prenom}}</h4></a>
                                        <p class="card-text">{{$membre->grade}} à Abou Bakr Belkaid University of Tlemcen</p>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a class="social-icon text-xs-center" target="_blank" href="#">
                                                    <i class="fa fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a class="social-icon text-xs-center" target="_blank" href="#">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a class="social-icon text-xs-center" target="_blank" href="#">
                                                    <i class="fa fa-skype"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a class="social-icon text-xs-center" target="_blank" href="#">
                                                    <i class="fa fa-google"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php endif; ?>
                  @endforeach
                <!-- ./Team member -->

            </div>
        </div>
    </section>
    <!-- Team -->









  </main> <!-- .main-content -->


</div>

@endsection
