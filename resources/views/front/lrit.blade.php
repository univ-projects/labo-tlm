@extends('layouts.front')

@section('title','Acceuil')

@section('content')


  <div class="page-head" data-bg-image="" style="border-top: 2px solid #edf2f4;border-bottom: 2px solid #edf2f4;margin-bottom:25px;padding:0px;" >
    <a href="#"><img src="public/images/images/img/labo-info.jpg" alt=""></a>
  </div>

  <main class="main-content">


    <div class="fullwidth-block">
      <div class="container">
        <?php $i=-1; ?>
        @foreach($actualites as $actualite )
        <?php $i++; ?>
        <h2 class="section-title">Articles récents</h2>
        <div class="row">
          <div class="col-sm-12 col-md-6 col-lg-6  py-0 pl-3 pr-1 featcard" >
             <div id="featured" class="carousel slide carousel-fade" data-ride="carousel" >
             <div class="carousel-inner">
                  <div class="carousel-item active">
                    	  <div class="card bg-dark text-white">
                          <img  src="{{asset($actualite->photo)}}" height="400px" alt="">
                          <div class="card-img-overlay d-flex linkfeat">
                            <a href="article2.html" class="align-self-end">
                              <h4 class="card-title"><?php echo $actualite->titre ?></h4>
                              <p class="textfeat" style="display: none;">
                                The 2015 International Conference on Advanced Communication Systems and Signal Processing (ICOSIP 2015) will be held in the beautiful city of Tlemcen...
                            </p>
                          </a>
                      </div>
                    </div>
                  </div>
                <div class="carousel-item ">
                      <div class="card bg-dark text-white">
                        <img class="card-img" src="public/images/img/labo-post6.jpg" height="400px" alt="">
                        <div class="card-img-overlay d-flex linkfeat">
                          <a href="article2.html" class="align-self-end">
                            <h4 class="card-title">APPEL À COMMUNICATION ICOSIP2015</h4>
                            <p class="textfeat" style="display: none;">
                              The 2015 International Conference on Advanced Communication Systems and Signal Processing (ICOSIP 2015) will be held in the beautiful city of Tlemcen...
                          </p>
                        </a>
                    </div>
                  </div>
                </div>
                <div class="carousel-item ">
                      <div class="card bg-dark text-white">
                        <img  src="public/images/img/labo-post7.jpg" height="400px" alt="">
                        <div class="card-img-overlay d-flex linkfeat">
                          <a href="article2.html" class="align-self-end">
                            <h4 class="card-title">APPEL À COMMUNICATION ICOSIP2015</h4>
                            <p class="textfeat" style="display: none;">
                              The 2015 International Conference on Advanced Communication Systems and Signal Processing (ICOSIP 2015) will be held in the beautiful city of Tlemcen...
                          </p>
                        </a>
                    </div>
                  </div>
                </div>
                <div class="carousel-item ">
                      <div class="card bg-dark text-white">
                        <img  src="public/images/img/labo-post8.jpg" height="400px" alt="">
                        <div class="card-img-overlay d-flex linkfeat">
                          <a href="article2.html" class="align-self-end">
                            <h4 class="card-title">APPEL À COMMUNICATION ICOSIP2015</h4>
                            <p class="textfeat" style="display: none;">
                              The 2015 International Conference on Advanced Communication Systems and Signal Processing (ICOSIP 2015) will be held in the beautiful city of Tlemcen...
                          </p>
                        </a>
                    </div>
                  </div>
                </div>
                <div class="carousel-item ">
                      <div class="card bg-dark text-white">
                        <img  src="public/images/img/labo-post5.jpg" height="400px" alt="">
                        <div class="card-img-overlay d-flex linkfeat">
                          <a href="article2.html" class="align-self-end">
                            <h4 class="card-title">APPEL À COMMUNICATION ICOSIP2015</h4>
                            <p class="textfeat" style="display: none;">
                              The 2015 International Conference on Advanced Communication Systems and Signal Processing (ICOSIP 2015) will be held in the beautiful city of Tlemcen...
                          </p>
                        </a>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>


          <div class="col-6 py-0 px-1 d-none d-lg-block">
            <div class="row">
              <div class="col-6 pb-2 mg-1	">
                <div class="card bg-dark text-white">
                    <img  src="public/images/img/labo-post5.jpg" height="200px" alt="">
                    <div class="card-img-overlay d-flex linkfeat2">
                      <a href="article2.html" class="align-self-end">
                        <h6 class="card-title">APPEL À COMMUNICATION ICOSIP2015</h6>
                      </a>
                    </div>
                    </div>
                </div>
                    <div class="col-6 pb-2 mg-2	">
                      <div class="card bg-dark text-white">
                          <img  src="public/images/img/labo-post6.jpg " height="200px" alt="">
                          <div class="card-img-overlay d-flex linkfeat2">
                            <a href="article2.html" class="align-self-end">
                              <h6 class="card-title">APPEL À COMMUNICATION ICOSIP2015</h6>
                            </a>
                          </div>
                        </div>
                    </div>
                    <div class="col-6 pb-2 mg-3	">
                      <div class="card bg-dark text-white">
                          <img  src="public/images/img/labo-post7.jpg" height="200px" alt="">
                          <div class="card-img-overlay d-flex linkfeat2">
                            <a href="article2.html" class="align-self-end">
                              <h6 class="card-title">APPEL À COMMUNICATION ICOSIP2015</h6>
                            </a>
                          </div>
                          </div>
                  </div>
                    <div class="col-6 pb-2 mg-4	">
                      <div class="card bg-dark text-white">
                          <img  src="public/images/img/labo-post8.jpg" height="200px" alt="">
                          <div class="card-img-overlay d-flex linkfeat2">
                            <a href="article2.html" class="align-self-end">
                              <h6 class="card-title">APPEL À COMMUNICATION ICOSIP2015</h6>
                            </a>
                          </div>
                          </div>
              </div>
                  </div>
          </div>
          @endforeach





      </div>
    </div>




<div class="fullwidth-block" style="background:#edf2f4">
    <div class="container" >
      <h2 class="section-title">Articles plus anciens</h2>
      <div class="project-list" >
        <div class="project" >
          <div class="project-content" style="background:#fff" >
            <figure class="featured-image"><img src="public/images/img/labo-post1.png" alt=""></figure>
            <h2 class="entry-title"><a href="article2.html">Appel à création de nouveaux laboratoires de recherches</a></h2>
            <small class="date">19-02-2018</small>
            <p>
              La Direction Générale de la Recherche Scientifique et du Développement Technologique lance ...
            </p>
            <a href="article2.html" class="button">Voir plus</a>
          </div>
        </div>
        <div class="project">
          <div class="project-content" style="background:#fff" >
            <figure class="featured-image"><img src="public/images/img/labo-post3.jpg" alt=""></figure>
            <h2 class="entry-title"><a href="article2.html">Contrôle de Conformité des Laboratoires et des Unités de Recherche</a></h2>
            <small class="date">19-02-2018</small>
            <p>
              Nous avons l’honneur de vous transmettre le programme de contrôle de conformité des ...
            </p>
            <a href="article2.html" class="button">Voir plus</a>
          </div>
        </div>
        <div class="project">
          <div class="project-content" style="background:#fff" >
            <figure class="featured-image"><img src="public/images/img/labo-post2.jpg" alt=""></figure>
            <h2 class="entry-title"><a href="article2.html">Collaboration entre les enseignants de l'UABT et Coréens</a></h2>
            <small class="date">15-05-2017</small>
            <p>
              Dans le cadre de la collaboration entre les enseignants chercheurs de l’université ...
            </p>
            <a href="article2.html" class="button">Voir plus</a>
          </div>
        </div>


        <div id="text">
          <div class="project">
            <div class="project-content" style="background:#fff">
              <figure class="featured-image"><img src="public/images/img/labo-post1.png" alt=""></figure>
              <h2 class="entry-title"><a href="article2.html">Appel à création de nouveaux laboratoires de recherches</a></h2>
              <small class="date">19-02-2018</small>
              <p>
                La Direction Générale de la Recherche Scientifique et du Développement Technologique lance ...
              </p>
              <a href="article2.html" class="button">Voir plus</a>
            </div>
          </div>
          <div class="project">
            <div class="project-content" style="background:#fff">
              <figure class="featured-image"><img src="public/images/img/labo-post3.jpg" alt=""></figure>
              <h2 class="entry-title"><a href="article2.html">Contrôle de Conformité des Laboratoires et des Unités de Recherche</a></h2>
              <small class="date">2 oct 2014</small>
              <p>
                Nous avons l’honneur de vous transmettre le programme de contrôle de conformité des ...
              </p>
              <a href="article2.html" class="button">Voir plus</a>
            </div>
          </div>
          <div class="project">
            <div class="project-content" style="background:#fff">
              <figure class="featured-image"><img src="public/images/img/labo-post2.jpg" alt=""></figure>
              <h2 class="entry-title"><a href="article2.html">Collaboration entre les enseignants de l'UABT et Coréens</a></h2>
              <small class="date">15-05-2017</small>
              <p>
                Dans le cadre de la collaboration entre les enseignants chercheurs de l’université ...
              </p>
              <a href="article2.html" class="button">Voir plus</a>
            </div>
          </div>
          <div class="project">
            <div class="project-content" style="background:#fff">
              <figure class="project-image"><img src="public/images/img/labo-post4.jpg" alt="Project"></figure>
              <h2 class="entry-title">Nouvelles publications/ Laboratoire de la modernisation de la grammaire Arabe</h2>
              <p>
                  La revue de modernisation de la leçon linguistique arabe, est une revue ...
              </p>
              <a href="article2.html" class="button">Voir plus</a>
            </div>
          </div>
          <div class="project">
            <div class="project-content" style="background:#fff">
              <figure class="featured-image"><img src="public/images/img/labo-post1.png" alt=""></figure>
              <h2 class="entry-title"><a href="article2.html">Appel à création de nouveaux laboratoires de recherches</a></h2>
              <small class="date">19-02-2018</small>
              <p>
                La Direction Générale de la Recherche Scientifique et du Développement Technologique lance ...
              </p>
              <a href="article2.html" class="button">Voir plus</a>
            </div>
          </div>
          <div class="project">
            <div class="project-content" style="background:#fff">
              <figure class="featured-image"><img src="public/images/img/labo-post1.png" alt=""></figure>
              <h2 class="entry-title"><a href="article2.html">Appel à création de nouveaux laboratoires de recherches</a></h2>
              <small class="date">19-02-2018</small>
              <p>
                La Direction Générale de la Recherche Scientifique et du Développement Technologique lance ...
              </p>
              <a href="article2.html" class="button">Voir plus</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div align="center">
        <button id="toggle" class="pulse-button tooltip2"><span class="tooltiptext">Voir plus</span>&#x25BC;</button>
    </div>
</div>

<!-- Flickity HTML init -->
<div class="fullwidth-block" >


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
                                        <a href="event2.html">
                                          <p class="calendar">7 <em>Aout</em></p>
                                            <img src="public/images/img/labo-event.jpg" alt="Image" style="max-width:100%;">
                                            <div class="card-img-overlay d-flex linkfeata" style="color:#fff">
                                              <a href="event2.html" class="align-self-end">
                                                <h4 class="card-title">Pr KADRI Nadir Université de Karolinska Institutet-Stockholm- Suède</h4>
                                                <p class="textfeata" style="display: none;">
                                                  Dans le cadre d’une collaboration effective émanant de la formation académique relative au Master «nutri...
                                              </p>
                                            </a>
                                        </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="event2.html">
                                          <p class="calendar">8 <em>Novembre</em></p>
                                            <img src="public/images/img/labo-event4.jpg" alt="Image" style="max-width:100%;">
                                            <div class="card-img-overlay d-flex linkfeatb" style="color:#fff">
                                              <a href="event2.html" class="align-self-end">
                                                <h4 class="card-title">Pr KADRI Nadir Université de Karolinska Institutet-Stockholm- Suède</h4>
                                                <p class="textfeatb" style="display: none;">
                                                  Dans le cadre d’une collaboration effective émanant de la formation académique relative au Master «nutri...
                                              </p>
                                            </a>
                                        </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="event2.html">
                                          <p class="calendar">11 <em>Novembre</em></p>
                                            <img src="public/images/img/labo-event2.jpg" alt="Image" style="max-width:100%;">
                                            <div class="card-img-overlay d-flex linkfeatc" style="color:#fff">
                                              <a href="event2.html" class="align-self-end">
                                                <h4 class="card-title">Pr KADRI Nadir Université de Karolinska Institutet-Stockholm- Suède</h4>
                                                <p class="textfeatc" style="display: none;">
                                                  Dans le cadre d’une collaboration effective émanant de la formation académique relative au Master «nutri...
                                              </p>
                                            </a>
                                        </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="event2.html">
                                          <p class="calendar">11 <em>Novembre</em></p>
                                            <img src="public/images/img/labo-event3.jpg" alt="Image" style="max-width:100%;">
                                            <div class="card-img-overlay d-flex linkfeatd" style="color:#fff">
                                              <a href="event2.html" class="align-self-end">
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
                                        <a href="event2.html">
                                          <p class="calendar">11 <em>Novembre</em></p>
                                            <img src="public/images/img/labo-event.jpg" alt="Image" style="max-width:100%;">
                                            <div class="card-img-overlay d-flex linkfeate" style="color:#fff">
                                              <a href="event2.html" class="align-self-end">
                                                <h4 class="card-title">Pr KADRI Nadir Université de Karolinska Institutet-Stockholm- Suède</h4>
                                                <p class="textfeate" style="display: none;">
                                                  Dans le cadre d’une collaboration effective émanant de la formation académique relative au Master «nutri...
                                              </p>
                                            </a>
                                        </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="event2.html">
                                          <p class="calendar">11 <em>Novembre</em></p>
                                            <img src="public/images/img/labo-event4.jpg" alt="Image" style="max-width:100%;">
                                            <div class="card-img-overlay d-flex linkfeatf" style="color:#fff">
                                              <a href="event2.html" class="align-self-end">
                                                <h4 class="card-title">Pr KADRI Nadir Université de Karolinska Institutet-Stockholm- Suède</h4>
                                                <p class="textfeatf" style="display: none;">
                                                  Dans le cadre d’une collaboration effective émanant de la formation académique relative au Master «nutri...
                                              </p>
                                            </a>
                                        </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="event2.html">
                                          <p class="calendar">11 <em>Novembre</em></p>
                                            <img src="public/images/img/labo-event3.jpg" alt="Image" style="max-width:100%;">
                                            <div class="card-img-overlay d-flex linkfeatg" style="color:#fff">
                                              <a href="event2.html" class="align-self-end">
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
                                        <a href="event2.html">
                                            <img src="public/images/img/labo-event2.jpg" alt="Image" style="max-width:100%;">
                                            <div class="card-img-overlay d-flex linkfeath" style="color:#fff">
                                              <a href="event2.html" class="align-self-end">
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
	<a href="events2.html" class="button home-actualite">Voir tout les événements</a>
</div>




<div class="fullwidth-block" style="background:#edf2f4">
    <div class="container" >
      <h2 class="section-title">Equipes</h2>
      <div class="project-list" >

        <div class="project" >
          <div class="project-content row" style="background:#fff" >
            <h2 class="entry-title col-md-12"><a href="equipe.html">Systèmes d'information et de connaissance</a></h2>

						<div class="col-md-12">
								<a href="profil.html">
									<img src="public/images/users/tadlaoui.jpg" alt="" class="img img-responsive rounded-circle" width="150px" height="150px">
								</a>
						</div>
						<a href="profil.html" class="col-md-12" style="margin-bottom:20px;color:black;">
							<small >Chef d'équipe: Mr Tadlaoui Mohammed</small>
						</a>
            <p>
								Dans les nouveaux contextes de traitement de l’information les données numériques sont devenues souvent:
								hétérogènes
								non ou partiellement structurées
								volumineuses
								distribuées/réparties...
            </p>
						<div class="labo-users">

								<h4>Membres</h4>
								<a href="profile/profil.html"  data-toggle="tooltip" data-placement="top" title="Messabihi Mohammed"><img src="public/images/users/messabihi.jpg" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
								<a href="profile/profil.html"  data-toggle="tooltip" data-placement="top" title="Tadlaoui Mohammed"><img src="public/images/users/tadlaoui.jpg" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
								<a href="profile/profil.html"  data-toggle="tooltip" data-placement="top" title="chikh azzedine"><img src="public/images/users/user.png" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
								<a href="profile/profil.html"  data-toggle="tooltip" data-placement="top" title="didi fedoua"><img src="public/images/users/didi.jpg" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
								<a href="profile/profil.html"  data-toggle="tooltip" data-placement="top" title="Messabihi Mohammed"><img src="public/images/users/messabihi.jpg" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
								<a href="profile/profil.html"  data-toggle="tooltip" data-placement="top" title="Messabihi Mohammed"><img src="public/images/users/messabihi.jpg" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
								<a href="labo.html">
									 +13 autres membres
								</a>

							</div>


            <a href="equipe.html" class="button col-md-12">Voir le groupe !</a>
          </div>
        </div>

				<div class="project" >
          <div class="project-content row" style="background:#fff" >
            <h2 class="entry-title col-md-12"><a href="equipe.html">Ingénieurie des logiciels sûrs</a></h2>

						<div class="col-md-12">
								<a href="profil.html">
									<img src="public/images/users/messabihi.jpg" alt="" class="img img-responsive rounded-circle" width="150px" height="150px">
								</a>
						</div>
						<a href="profil.html" class="col-md-12" style="margin-bottom:20px;color:black;">
							<small >Chef d'équipe: Mr Messabihi Mohammed</small>
						</a>
            <p>
							Omniprésence des systèmes informatiques dans la vie quotidienne
							Systèmes critiques : vérification du bon fonctionnement
							Complexité croissante des systèmes
							-Conception et vérification complexes
							Ingénierie des exigences:
							-Modèles et langages pour la spécification des exigence...
            </p>
						<div class="labo-users">

								<h4>Membres</h4>
								<a href="profile/profil.html"  data-toggle="tooltip" data-placement="top" title="Messabihi Mohammed"><img src="public/images/users/messabihi.jpg" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
								<a href="profile/profil.html"  data-toggle="tooltip" data-placement="top" title="Tadlaoui Mohammed"><img src="public/images/users/tadlaoui.jpg" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
								<a href="profile/profil.html"  data-toggle="tooltip" data-placement="top" title="chikh azzedine"><img src="public/images/users/user.png" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
								<a href="profile/profil.html"  data-toggle="tooltip" data-placement="top" title="didi fedoua"><img src="public/images/users/didi.jpg" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
								<a href="profile/profil.html"  data-toggle="tooltip" data-placement="top" title="Messabihi Mohammed"><img src="public/images/users/messabihi.jpg" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
								<a href="profile/profil.html"  data-toggle="tooltip" data-placement="top" title="Messabihi Mohammed"><img src="public/images/users/messabihi.jpg" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
								<a href="labo.html">
									 +13 autres membres
								</a>

							</div>


            <a href="equipe.html" class="button col-md-12">Voir le groupe !</a>
          </div>
        </div>

				<div class="project" >
          <div class="project-content row" style="background:#fff" >
            <h2 class="entry-title col-md-12"><a href="equipe.html">Réseau,services et systèmes distribués</a></h2>

						<div class="col-md-12">
								<a href="profil.html">
									<img src="public/images/users/user.png" alt="" class="img img-responsive rounded-circle" width="150px" height="150px">
								</a>
						</div>
						<a href="profil.html" class="col-md-12" style="margin-bottom:20px;color:black;">
							<small >Chef d'équipe: Mr Chikh Azzedine</small>
						</a>
            <p>
							Omniprésence des systèmes informatiques dans la vie quotidienne
							Systèmes critiques : vérification du bon fonctionnement
							Complexité croissante des systèmes
							-Conception et vérification complexes
							Ingénierie des exigences:
							-Modèles et langages ...
            </p>
						<div class="labo-users">

								<h4>Membres</h4>
								<a href="profile/profil.html"  data-toggle="tooltip" data-placement="top" title="Messabihi Mohammed"><img src="public/images/users/messabihi.jpg" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
								<a href="profile/profil.html"  data-toggle="tooltip" data-placement="top" title="Tadlaoui Mohammed"><img src="public/images/users/tadlaoui.jpg" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
								<a href="profile/profil.html"  data-toggle="tooltip" data-placement="top" title="chikh azzedine"><img src="public/images/users/user.png" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
								<a href="profile/profil.html"  data-toggle="tooltip" data-placement="top" title="didi fedoua"><img src="public/images/users/didi.jpg" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
								<a href="profile/profil.html"  data-toggle="tooltip" data-placement="top" title="Messabihi Mohammed"><img src="public/images/users/messabihi.jpg" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
								<a href="profile/profil.html"  data-toggle="tooltip" data-placement="top" title="Messabihi Mohammed"><img src="public/images/users/messabihi.jpg" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
								<a href="labo.html">
									 +13 autres membres
								</a>

							</div>


            <a href="equipe.html" class="button col-md-12">Voir le groupe !</a>
          </div>
        </div>

        <div id="text2">
					<div class="project" >
						<div class="project-content row" style="background:#fff" >
							<h2 class="entry-title col-md-12"><a href="equipe.html">Systèmes d'information et de connaissance</a></h2>

							<div class="col-md-12">
									<a href="profil.html">
										<img src="public/images/users/tadlaoui.jpg" alt="" class="img img-responsive rounded-circle" width="150px" height="150px">
									</a>
							</div>
							<a href="profil.html" class="col-md-12" style="margin-bottom:20px;color:black;">
								<small >Chef d'équipe: Mr Tadlaoui Mohammed</small>
							</a>
							<p>
									Dans les nouveaux contextes de traitement de l’information les données numériques sont devenues souvent:
									hétérogènes
									non ou partiellement structurées
									volumineuses
									distribuées/réparties...
							</p>
							<div class="labo-users">

									<h4>Membres</h4>
									<a href="profile/profil.html"  data-toggle="tooltip" data-placement="top" title="Messabihi Mohammed"><img src="public/images/users/messabihi.jpg" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
									<a href="profile/profil.html"  data-toggle="tooltip" data-placement="top" title="Tadlaoui Mohammed"><img src="public/images/users/tadlaoui.jpg" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
									<a href="profile/profil.html"  data-toggle="tooltip" data-placement="top" title="chikh azzedine"><img src="public/images/users/user.png" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
									<a href="profile/profil.html"  data-toggle="tooltip" data-placement="top" title="didi fedoua"><img src="public/images/users/didi.jpg" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
									<a href="profile/profil.html"  data-toggle="tooltip" data-placement="top" title="Messabihi Mohammed"><img src="public/images/users/messabihi.jpg" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
									<a href="profile/profil.html"  data-toggle="tooltip" data-placement="top" title="Messabihi Mohammed"><img src="public/images/users/messabihi.jpg" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
									<a href="labo.html">
										 +13 autres membres
									</a>

								</div>


							<a href="equipe.html" class="button col-md-12">Voir le groupe !</a>
						</div>
					</div>

					<div class="project" >
						<div class="project-content row" style="background:#fff" >
							<h2 class="entry-title col-md-12"><a href="equipe.html">Ingénieurie des logiciels sûrs</a></h2>

							<div class="col-md-12">
									<a href="profil.html">
										<img src="public/images/users/messabihi.jpg" alt="" class="img img-responsive rounded-circle" width="150px" height="150px">
									</a>
							</div>
							<a href="profil.html" class="col-md-12" style="margin-bottom:20px;color:black;">
								<small >Chef d'équipe: Mr Messabihi Mohammed</small>
							</a>
							<p>
								Omniprésence des systèmes informatiques dans la vie quotidienne
								Systèmes critiques : vérification du bon fonctionnement
								Complexité croissante des systèmes
								-Conception et vérification complexes
								Ingénierie des exigences:
								-Modèles et langages pour la spécification des exigence...
							</p>
							<div class="labo-users">

									<h4>Membres</h4>
									<a href="profile/profil.html"  data-toggle="tooltip" data-placement="top" title="Messabihi Mohammed"><img src="public/images/users/messabihi.jpg" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
									<a href="profile/profil.html"  data-toggle="tooltip" data-placement="top" title="Tadlaoui Mohammed"><img src="public/images/users/tadlaoui.jpg" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
									<a href="profile/profil.html"  data-toggle="tooltip" data-placement="top" title="chikh azzedine"><img src="public/images/users/user.png" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
									<a href="profile/profil.html"  data-toggle="tooltip" data-placement="top" title="didi fedoua"><img src="public/images/users/didi.jpg" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
									<a href="profile/profil.html"  data-toggle="tooltip" data-placement="top" title="Messabihi Mohammed"><img src="public/images/users/messabihi.jpg" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
									<a href="profile/profil.html"  data-toggle="tooltip" data-placement="top" title="Messabihi Mohammed"><img src="public/images/users/messabihi.jpg" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
									<a href="labo.html">
										 +13 autres membres
									</a>

								</div>


							<a href="equipe.html" class="button col-md-12">Voir le groupe !</a>
						</div>
					</div>

					<div class="project" >
						<div class="project-content row" style="background:#fff" >
							<h2 class="entry-title col-md-12"><a href="equipe.html">Réseau,services et systèmes distribués</a></h2>

							<div class="col-md-12">
									<a href="profil.html">
										<img src="public/images/users/user.png" alt="" class="img img-responsive rounded-circle" width="150px" height="150px">
									</a>
							</div>
							<a href="profil.html" class="col-md-12" style="margin-bottom:20px;color:black;">
								<small >Chef d'équipe: Mr Chikh Azzedine</small>
							</a>
							<p>
								Omniprésence des systèmes informatiques dans la vie quotidienne
								Systèmes critiques : vérification du bon fonctionnement
								Complexité croissante des systèmes
								-Conception et vérification complexes
								Ingénierie des exigences:
								-Modèles et langages ...
							</p>
							<div class="labo-users">

									<h4>Membres</h4>
									<a href="profile/profil.html"  data-toggle="tooltip" data-placement="top" title="Messabihi Mohammed"><img src="public/images/users/messabihi.jpg" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
									<a href="profile/profil.html"  data-toggle="tooltip" data-placement="top" title="Tadlaoui Mohammed"><img src="public/images/users/tadlaoui.jpg" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
									<a href="profile/profil.html"  data-toggle="tooltip" data-placement="top" title="chikh azzedine"><img src="public/images/users/user.png" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
									<a href="profile/profil.html"  data-toggle="tooltip" data-placement="top" title="didi fedoua"><img src="public/images/users/didi.jpg" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
									<a href="profile/profil.html"  data-toggle="tooltip" data-placement="top" title="Messabihi Mohammed"><img src="public/images/users/messabihi.jpg" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
									<a href="profile/profil.html"  data-toggle="tooltip" data-placement="top" title="Messabihi Mohammed"><img src="public/images/users/messabihi.jpg" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
									<a href="labo.html">
										 +13 autres membres
									</a>

								</div>


							<a href="equipe.html" class="button col-md-12">Voir le groupe !</a>
						</div>
					</div>
        </div>


      </div>
    </div>
    <div align="center">
        <button id="toggle2" class="pulse-button tooltip2"><span class="tooltiptext">Voir plus</span>&#x25BC;</button>
    </div>
</div>





  </main> <!-- .main-content -->
	<footer class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="widget">
						<h3 class="widget-title">Contact</h3>
						<address>
							<strong>Addresse:</strong> 	22, Rue Abi Ayed Abdelkrim Fg Pasteur B.P 119 13000, Tlemcen, Algérie
						</address>
						<address>
							<strong>Téléphone:</strong> 043.41.11.89
						</address>
						<address>
							<strong>Fax:</strong> 043.41.11.91
						</address>
						<address>
							<strong>Email:</strong> univ-tlm@gmail.com
						</address>

					</div>
				</div>
				<div class="col-md-3">
					<div class="widget">
						<h3 class="widget-title">Articles récents</h3>
						<ul class="arrow-list">
							<li><a href="article2.html">Collaboration entre les enseignants de l'UABT et Coréens</a></li>
							<li><a href="article2.html">Contrôle de Conformité des Laboratoires et des Unités de Recherche</a></li>
							<li><a href="article2.html">Appel à création de nouveaux laboratoires de recherches</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3">
					<div class="widget">
						<h3 class="widget-title">Prochains événements</h3>
						<ul class="arrow-list">
							<li><a href="event2.html">GDG : Android study Jams, Atelier Désign et séance de Lecture</a></li>
							<li><a href="event2.html">GDG : Android study Jams, Atelier Désign et séance de Lecture</a></li>
							<li><a href="event2.html">GDG : Android study Jams, Atelier Désign et séance de Lecture</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3">
					<div class="widget">
						<h3 class="widget-title">Réseaux sociaux</h3>
						<p>Vous pouvez aussi suivre laboratoire de recherche Tlemcen sur les réseaux sociaux !</p>
						<div class="social-links">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-google-plus"></i></a>
							<a href="#"><i class="fa fa-pinterest"></i></a>
						</div>
					</div>
				</div>
			</div> <!-- .row -->
		</div> <!-- .container -->
	</footer>

</div>


</body>




<script src="public/js/jquery-3.3.1.min.js"></script>
<script src="public/js/popperjs.js"></script>
<script src="public/js/bootstrap4js.js"></script>
<!-- <script type="text/javascript" src="profile/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="profile/js/bootstrap.min.js"></script>
<script type="text/javascript" src="profile/js/jquery-scrolltofixed.js"></script>
<script type="text/javascript" src="profile/js/jquery.nav.js"></script>
<script type="text/javascript" src="profile/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="profile/js/jquery.isotope.js"></script>
<script src="profile/js/fancybox/jquery.fancybox.pack.js" type="text/javascript"></script>
<script type="text/javascript" src="profile/js/wow.js"></script>
<script type="text/javascript" src="profile/js/custom.js"></script> -->



<script type="text/javascript">
  //FEATURED HOVER
  $(document).ready(function(){
    $(".linkfeat").hover(
      function () {
          $(".textfeat").show(500);
      },
      function () {
          $(".textfeat").hide(500);
      }
  );
  $(".linkfeata").hover(
    function () {
        $(".textfeata").show(500);
    },
    function () {
        $(".textfeata").hide(500);
    }
    );
    $(".linkfeatb").hover(
      function () {
          $(".textfeatb").show(500);
      },
      function () {
          $(".textfeatb").hide(500);
      }
    );
    $(".linkfeatc").hover(
      function () {
          $(".textfeatc").show(500);
      },
      function () {
          $(".textfeatc").hide(500);
      }
    );
    $(".linkfeatd").hover(
      function () {
          $(".textfeatd").show(500);
      },
      function () {
          $(".textfeatd").hide(500);
      }
    );
    $(".linkfeate").hover(
      function () {
          $(".textfeate").show(500);
      },
      function () {
          $(".textfeate").hide(500);
      }
    );
    $(".linkfeatf").hover(
      function () {
          $(".textfeatf").show(500);
      },
      function () {
          $(".textfeatf").hide(500);
      }
    );
    $(".linkfeatg").hover(
      function () {
          $(".textfeatg").show(500);
      },
      function () {
          $(".textfeatg").hide(500);
      }
    );
    $(".linkfeath").hover(
      function () {
          $(".textfeath").show(500);
      },
      function () {
          $(".textfeath").hide(500);
      }
    );
  });

</script>

<script type="text/javascript">
    $('[data-toggle="tooltip"]').tooltip();

    	$(document).ready(function() {



    	  $("#toggle").click(function() {
    	    var elem = $("#toggle").html();

    	    if (elem .includes( "\u25B2")) {
    	      //Stuff to do when btn is in the VOIR PLUS state
    	      $("#toggle").html("<span class=\"tooltiptext\">Voir plus</span>&#x25BC;");
            	$("#toggle span").html("voir plus");

    				$("#text").slideUp();
    	    } else {
    	      //Stuff to do when btn is in the read less state

    	      $("#toggle").html("<span class=\"tooltiptext\">Voir plus</span>&#x25B2");
            	$("#toggle span").html("voir moins");

    				$("#text").slideDown();
    	    }
    	  });

				$("#toggle2").click(function() {
					var elem = $("#toggle2").html();

					if (elem .includes( "\u25B2")) {
						//Stuff to do when btn is in the VOIR PLUS state
						$("#toggle2").html("<span class=\"tooltiptext\">Voir plus</span>&#x25BC;");
							$("#toggle2 span").html("voir plus");

						$("#text2").slideUp();
					} else {
						//Stuff to do when btn is in the read less state

						$("#toggle2").html("<span class=\"tooltiptext\">Voir plus</span>&#x25B2");
							$("#toggle2 span").html("voir moins");

						$("#text2").slideDown();
					}
				});
    	});
</script>


@endsection
