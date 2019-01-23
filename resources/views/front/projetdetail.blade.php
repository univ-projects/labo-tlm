@extends('layouts.front')
@extends('layouts.projetdetail')

@section('title','Projets')
@section('content')

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


<div class="page-head" style="    background-image:
            linear-gradient(to right bottom,
             rgba(105, 172, 199, 0.2),
             rgba(11, 125, 218, 0.8)),
            url({{asset('images/images/img/team.jpg')}});
            background-position: center;
            background-size:cover;">
      <div class="container">
        <h2 class="page-title">{{$projet->intitule}}</h2>
        <small>{{$equipe[0]->intitule}}</small>
      </div>
    </div>


  <main class="main-content">
    <div class="fullwidth-block">
      <div class="container">
        <a href="." class="button back"><img src="{{asset('images/images/icons/arrow-back.png')}}" alt="">Retour aux projets</a>
        <div class="row">
          <div class="col-md-6">
            <figure>
              <img src="{{asset($projet->photo)}}" alt="" style="width: 500px;height:350px;">
            </figure>
          </div>
          <div class="col-md-6">
            <h2 class="section-title">{{$projet->intitule}}</h2>
            <ul class="project-info">
              <li><strong>Date:</strong> 06/10/14</li>
              <li><strong>Client:</strong> Lorem ipsum</li>
              <li><strong>Manager:</strong> Howard Brown</li>
              <li><strong>Equipe: {{$equipe[0]->intitule}}</li>
              <li><strong>But:</strong> Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</li>

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


    <section id="team" class="pb-5">
        <div class="container">
            <h5 class="section-title h1">Equipe de Recherche</h5>
            <div class="row">
                <!-- Team member -->
                @foreach($membres as $membre)
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                        <div class="mainflip">
                            <div class="frontside">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <p><img class=" img-fluid" src="{{asset($membre->photo)}}" alt="card image"></p>
                                      <a href="profil/{{$membre->id}}"> <h4 class="card-title">{{$membre->name}} {{$membre->prenom}}</h4></a>
                                        <p class="card-text">Docteur à Abou Bakr Belkaid University of Tlemcen</p>
                                        <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="backside">
                                <div class="card">
                                    <div class="card-body text-center mt-4">
                                        <a href="profil/{{$membre->id}}">   <h4 class="card-title">{{$membre->name}} {{$membre->prenom}}</h4></a>
                                        <p class="card-text">Docteur à Abou Bakr Belkaid University of Tlemcen</p>
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
                  @endforeach
                <!-- ./Team member -->

            </div>
        </div>
    </section>

    <div class="fullwidth-block">
      <div class="container">
            <h5 class="section-title h1">telecharger details</h5>
        <div class="row">

          <div class="col medium-10 small-12 large-10">
            <div class="team">
              <div class="w3-content w3-display-container">
            <a href="{{asset($projet->detail)}}" download>  <button class="btn"><i class="fa fa-download"></i> Download</button> </a>

</div>


            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="fullwidth-block" data-bg-color="#edf2f4">
      <div class="container">

        <div class="row">

          <div class="col medium-10 small-12 large-10">
            <div class="team">
              <h2 style="text-align: center;">
                <span style="font-size: 130%;color: #542a44;" >Partenaire <br><br></span>
              </h2>
              <div id="team" name="team">
            <div class="container">
              <div class="row centered">

                <div class="col-md-4 centered"> <a href="partenaire.html" class="button back"><img class="img img-circle lt-box" src="https://www.lapyramideduloup.com/wp-content/uploads/2018/03/logo-auxerre.jpg" height="120px" width="120px" alt=""> </a>
                  <div class="rt-box"><h4><strong>AUXERRE</strong></h4>

              </div>
                 </div>


            </div>
            <!-- row -->
          </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>



  </main> <!-- .main-content -->

@endsection
