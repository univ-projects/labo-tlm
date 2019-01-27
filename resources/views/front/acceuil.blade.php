@extends('layouts.front')

@section('title','Acceuil')

@section('content')

<div class="fullwidth-block">
  <div class="container">
    <div class="row">


      <div class="col-md-3 col-sm-6">
        <div class="feature">
          <img src="public/images/icons/icon-chimie.png" alt="" class="feature-image">
          <h2 class="feature-title">Chimie</h2>
          <p>Le LRI, Laboratoire Mixte de Recherche de l'Université de Tlemcen, est un laboratoire de recherche en informatique ...</p>
          <a href="labo.html" class="button">Visiter le laboratoire !</a>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="feature">
          <img src="public/images/icons/icon-medecine.png" alt="" class="feature-image">
          <h2 class="feature-title">Medecine</h2>
          <p>Le LRI, Laboratoire Mixte de Recherche de l'Université de Tlemcen, est un laboratoire de recherche en informatique ...</p>
          <a href="labo.html" class="button">Visiter le laboratoire !</a>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="feature">
          <img src="public/images/icons/icon-mathematiques.png" alt="" class="feature-image">
          <h2 class="feature-title">Mathématiques</h2>
          <p>
            Le LRI, Laboratoire Mixte de Recherche de l'Université de Tlemcen, est un laboratoire de recherche en informatique ...
          </p>
          <a href="labo.html" class="button">Visiter le laboratoire !</a>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="feature">
          <img src="public/images/icons/icon-Informatique.png" alt="" class="feature-image">
          <h2 class="feature-title">Informatique</h2>
          <p>
            Le LRI, Laboratoire Mixte de Recherche de l'Université de Tlemcen, est un laboratoire de recherche en informatique ...
          </p>
          <a href="{{url('front/lrit')}}" class="button">Visiter le laboratoire !</a>
        </div>
      </div>
      <!-- hidden items -->
      <div id="text" class="col-xs-12">
        <div class="col-md-3 col-sm-6">
          <div class="feature">
            <img src="public/images/icons/icon-Informatique.png" alt="" class="feature-image">
            <h2 class="feature-title">Informatique</h2>
            <p>Le LRI, Laboratoire Mixte de Recherche de l'Université de Tlemcen, est un laboratoire de recherche en informatique ...</p>
            <a href="labo.html" class="button">Visiter le laboratoire !</a>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="feature">
            <img src="public/images/icons/icon-Informatique.png" alt="" class="feature-image">
            <h2 class="feature-title">Informatique</h2>
            <p>Le LRI, Laboratoire Mixte de Recherche de l'Université de Tlemcen, est un laboratoire de recherche en informatique ...</p>
            <a href="labo.html" class="button">Visiter le laboratoire !</a>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="feature">
            <img src="public/images/icons/icon-Informatique.png" alt="" class="feature-image">
            <h2 class="feature-title">Informatique</h2>
            <p>Le LRI, Laboratoire Mixte de Recherche de l'Université de Tlemcen, est un laboratoire de recherche en informatique ...</p>
            <a href="labo.html" class="button">Visiter le laboratoire !</a>
          </div>
        </div>
      </div>

    </div> <!-- .row -->
    <div align="center">
        <button id="toggle" class="pulse-button tooltip2"><span class="tooltiptext">Voir plus</span>&#x25BC;</button>
    </div>

  </div> <!-- .container -->
</div> <!-- .fullwidth-block -->

<div class="fullwidth-block" data-bg-color="#edf2f4">
  <div class="container">
    <h2 class="section-title">Articles récents</h2>
    <div class="row">
      <div class="col-md-4">
        <div class="post">
          <figure class="featured-image"><img src="public/images/img/labo-post1.png" alt=""></figure>
          <h2 class="entry-title"><a href="article.html">Appel à création de nouveaux laboratoires de recherches</a></h2>
          <small class="date">19-02-2018</small>
          <p>
            La Direction Générale de la Recherche Scientifique et du Développement Technologique lance un appel ...
          </p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="post">
          <figure class="featured-image"><img src="public/images/img/labo-post2.jpg" alt=""></figure>
          <h2 class="entry-title"><a href="article.html">Collaboration entre les enseignants de l'UABT et Coréens</a></h2>
          <small class="date">15-05-2017</small>
          <p>
            Dans le cadre de la collaboration entre les enseignants chercheurs de l’université de Tlemcen et nos collègues Sud Coréens ...
          </p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="post">
          <figure class="featured-image"><img src="public/images/img/labo-post3.jpg" alt=""></figure>
          <h2 class="entry-title"><a href="article.html">Contrôle de Conformité des Laboratoires et des Unités de Recherche</a></h2>
          <small class="date">2 oct 2014</small>
          <p>
            Nous avons l’honneur de vous transmettre le programme de contrôle de conformité des structures de recherche ...
          </p>
        </div>
      </div>
      <div class="col-md-12" align="center">
        <a href="actualites.html" class="button home-actualite">articles plus anciens</a>
      </div>
    </div> <!-- .row -->
  </div> <!-- .container -->
</div> <!-- .fullwidth-block -->

<div class="fullwidth-block">
  <div class="container">
          <div class="row blog">
            <h2 class="section-title">Prochains événements</h2>
              <div class="col-md-12">
                  <div id="blogCarousel" class="carousel slide" data-ride="carousel">

                      <ol class="carousel-indicators">
                          <li data-target="#blogCarousel" data-slide-to="0" class="active"></li>
                          <li data-target="#blogCarousel" data-slide-to="1"></li>
                      </ol>

                      <!-- Carousel items -->
                      <div class="carousel-inner">

                          <div class="carousel-item active">
                              <div class="row">
                                  <div class="col-md-3">
                                      <a href="event.html">
                                        <p class="calendar">7 <em>Aout</em></p>
                                          <img src="public/images/img/labo-event.jpg" alt="Image" style="max-width:100%;">
                                          <div class="card-img-overlay d-flex linkfeata" style="color:#fff">
                                            <a href="event.html" class="align-self-end">
                                              <h4 class="card-title">Pr KADRI Nadir Université de Karolinska Institutet-Stockholm- Suède</h4>
                                              <p class="textfeata" style="display: none;">
                                                Dans le cadre d’une collaboration effective émanant de la formation académique relative au Master «nutri...
                                            </p>
                                          </a>
                                      </div>
                                      </a>
                                  </div>
                                  <div class="col-md-3">
                                      <a href="event.html">
                                        <p class="calendar">8 <em>Novembre</em></p>
                                          <img src="public/images/img/labo-event4.jpg" alt="Image" style="max-width:100%;">
                                          <div class="card-img-overlay d-flex linkfeatb" style="color:#fff">
                                            <a href="event.html" class="align-self-end">
                                              <h4 class="card-title">Pr KADRI Nadir Université de Karolinska Institutet-Stockholm- Suède</h4>
                                              <p class="textfeatb" style="display: none;">
                                                Dans le cadre d’une collaboration effective émanant de la formation académique relative au Master «nutri...
                                            </p>
                                          </a>
                                      </div>
                                      </a>
                                  </div>
                                  <div class="col-md-3">
                                      <a href="event.html">
                                        <p class="calendar">11 <em>Novembre</em></p>
                                          <img src="public/images/img/labo-event2.jpg" alt="Image" style="max-width:100%;">
                                          <div class="card-img-overlay d-flex linkfeatc" style="color:#fff">
                                            <a href="event.html" class="align-self-end">
                                              <h4 class="card-title">Pr KADRI Nadir Université de Karolinska Institutet-Stockholm- Suède</h4>
                                              <p class="textfeatc" style="display: none;">
                                                Dans le cadre d’une collaboration effective émanant de la formation académique relative au Master «nutri...
                                            </p>
                                          </a>
                                      </div>
                                      </a>
                                  </div>
                                  <div class="col-md-3">
                                      <a href="event.html">
                                        <p class="calendar">11 <em>Novembre</em></p>
                                          <img src="public/images/img/labo-event3.jpg" alt="Image" style="max-width:100%;">
                                          <div class="card-img-overlay d-flex linkfeatd" style="color:#fff">
                                            <a href="event.html" class="align-self-end">
                                              <h4 class="card-title">Pr KADRI Nadir Université de Karolinska Institutet-Stockholm- Suède</h4>
                                              <p class="textfeatd" style="display: none;">
                                                Dans le cadre d’une collaboration effective émanant de la formation académique relative au Master «nutri...
                                            </p>
                                          </a>
                                      </div>
                                      </a>
                                  </div>
                              </div>
                              <!--.row-->
                          </div>
                          <!--.item-->

                          <div class="carousel-item">
                              <div class="row">
                                  <div class="col-md-3">
                                      <a href="event.html">
                                        <p class="calendar">11 <em>Novembre</em></p>
                                          <img src="public/images/img/labo-event.jpg" alt="Image" style="max-width:100%;">
                                          <div class="card-img-overlay d-flex linkfeate" style="color:#fff">
                                            <a href="event.html" class="align-self-end">
                                              <h4 class="card-title">Pr KADRI Nadir Université de Karolinska Institutet-Stockholm- Suède</h4>
                                              <p class="textfeate" style="display: none;">
                                                Dans le cadre d’une collaboration effective émanant de la formation académique relative au Master «nutri...
                                            </p>
                                          </a>
                                      </div>
                                      </a>
                                  </div>
                                  <div class="col-md-3">
                                      <a href="event.html">
                                        <p class="calendar">11 <em>Novembre</em></p>
                                          <img src="public/images/img/labo-event4.jpg" alt="Image" style="max-width:100%;">
                                          <div class="card-img-overlay d-flex linkfeatf" style="color:#fff">
                                            <a href="event.html" class="align-self-end">
                                              <h4 class="card-title">Pr KADRI Nadir Université de Karolinska Institutet-Stockholm- Suède</h4>
                                              <p class="textfeatf" style="display: none;">
                                                Dans le cadre d’une collaboration effective émanant de la formation académique relative au Master «nutri...
                                            </p>
                                          </a>
                                      </div>
                                      </a>
                                  </div>
                                  <div class="col-md-3">
                                      <a href="event.html">
                                        <p class="calendar">11 <em>Novembre</em></p>
                                          <img src="public/images/img/labo-event3.jpg" alt="Image" style="max-width:100%;">
                                          <div class="card-img-overlay d-flex linkfeatg" style="color:#fff">
                                            <a href="event.html" class="align-self-end">
                                              <h4 class="card-title">Pr KADRI Nadir Université de Karolinska Institutet-Stockholm- Suède</h4>
                                              <p class="textfeatg" style="display: none;">
                                                Dans le cadre d’une collaboration effective émanant de la formation académique relative au Master «nutri...
                                            </p>
                                          </a>
                                      </div>
                                      </a>
                                  </div>
                                  <div class="col-md-3">
                                    <p class="calendar">11 <em>Novembre</em></p>
                                      <a href="event.html">
                                          <img src="public/images/img/labo-event2.jpg" alt="Image" style="max-width:100%;">
                                          <div class="card-img-overlay d-flex linkfeath" style="color:#fff">
                                            <a href="event.html" class="align-self-end">
                                              <h4 class="card-title">Pr KADRI Nadir Université de Karolinska Institutet-Stockholm- Suède</h4>
                                              <p class="textfeath" style="display: none;">
                                                Dans le cadre d’une collaboration effective émanant de la formation académique relative au Master «nutri...
                                            </p>
                                          </a>
                                      </div>
                                      </a>
                                  </div>
                              </div>
                              <!--.row-->
                          </div>
                          <!--.item-->

                      </div>
                      <!--.carousel-inner-->
                  </div>
                  <!--.Carousel-->
              </div>
          </div>

    </div>
</div>
<div  align="center" style="margin-bottom:25px">
  <a href="events.html" class="button home-actualite">Voir tout les événements</a>
</div>

@endsection
