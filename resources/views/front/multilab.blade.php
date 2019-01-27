@extends('layouts.multi')

@section('title','EasyLab')

@section('content')

    <section id="main-slider">
        <div class="owl-carousel">
            <div class="item" style="background-image: url(https://dylandimed.univ-tlemcen.dz/assets/uploads/20160614_131907.jpg);">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h2>   <span>Bienvenue au Laboratoires de recherche Tlemcen</span></h2>
                                      <p>Laboratoires de recherche de l'Université Abou bekr belkaid Tlemcen est parmis les meilleurs laboratoires en continent africain</p>
                                    <a class="btn btn-primary btn-lg" href="#about">Decouvrir Nous</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
             <div class="item" style="background-image: url(http://themes.webdevia.com/laboratory/wp-content/uploads/2014/09/slider.jpg);">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                  <h2>   <span>Bienvenue au Laboratoires de recherche Tlemcen</span></h2>
                                    <p>Laboratoires de recherche de l'Université Abou bekr belkaid Tlemcen est parmis les meilleurs laboratoires en continent africain</p>
                                  <a class="btn btn-primary btn-lg" href="#about">Decouvrir Nous</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
        </div><!--/.owl-carousel-->
    </section><!--/#main-slider-->

    <section id="about">
        <div class="container">

            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">A-Propos</h2>
                <!-- <p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p> -->
            </div>

            <div class="row">
                <div class="col-sm-6 wow fadeInLeft">
                    <h3 class="column-title">Video Intro</h3>
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe src="//player.vimeo.com/video/58093852?title=0&amp;byline=0&amp;portrait=0&amp;color=e79b39" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div>
                </div>

                <div class="col-sm-6 wow fadeInRight">
                    <h3 class="column-title">Easy Lab</h3>
                  <p>
Créé en 2000, le laboratoire constitue au sein de la Direction générale de recherche scientifique et technologique un maillon important se référant à la fois à l’environnement et à la santé.
</p><p>
Le laboratoire est animé par une diversité de personnes qui mettent en commun leurs connaissances et leurs expériences pour développer la recherche, accompagner les formations et contribuer à la vie de l’université algérienne en général.  22 enseignants-chercheurs, trois ingénieurs du personnel de soutien accompagnent les étudiants de doctorat et de master dans leurs premiers pas dans la recherche.
</p><p>
Le laboratoire est issu de l’association de quatre équipes, il analyse les relations environnement-santé publique, avec un intérêt tout particulier pour l’écologie animale et l’écologie humaine. Il apporte une compétence forte dans plusieurs domaines clés : la biodiversité animale, l’évolution,  l’écologie globale, l’anthropologie, l’éco-toxicologie et les indicateurs environnementaux de santé. Les chercheurs utilisent et développent des approches modernes de biologie fondamentale ou appliquée et de modélisation.
</p>
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="nostyle">
                                <li><i class="fa fa-check-square"></i> assurer un développement durable de notre société</li>
                                <li><i class="fa fa-check-square"></i> assurer un développement durable de notre société</li>
                            </ul>
                        </div>

                        <div class="col-sm-6">
                            <ul class="nostyle">
                                <li><i class="fa fa-check-square"></i> assurer un développement durable de notre société</li>
                                <li><i class="fa fa-check-square"></i> assurer un développement durable de notre sociétén</li>
                            </ul>
                        </div>
                    </div>

                    <!-- <a class="btn btn-primary" href="#">Learn More</a> -->

                </div>
            </div>
        </div>
    </section><!--/#about-->

    <section id="services" >
        <div class="container">

            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Nos Laboratoires</h2>
                <!-- <p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p> -->
            </div>

            <div class="row">
                <div class="features">
                  @foreach($labs as $lab)
                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">
                        <div class="media service-box">
                            <div class="pull-left">
                              <img src="{{asset($lab->logo)}}" alt="Logo" style="width:70px; border-radius: 50%;">
                            </div>
                            <div class="media-body">
                              <a href="{{ url('front/'.$lab->id)}}"> <h4 class="media-heading">{{$lab->achronymes}}</h4></a>
                                <p>{{$lab->nom}}</p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->
                  @endforeach
                </div>
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->



    <section id="work-process">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Nos Statistics</h2>
                <!-- <p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p> -->
            </div>

            <div class="row text-center">
                <div class="col-md-2 col-md-4 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="icon-circle">
                            <span>{{count($labs)}}</span>
                            <i class="fa fa-flask fa-2x"></i>
                        </div>
                        <h3>LABORATOIRES</h3>
                    </div>
                </div>
                <div class="col-md-2 col-md-4 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="100ms">
                        <div class="icon-circle">
                            <span>{{$stat_eq[0]->c}}</span>
                            <i class="fa fa-users fa-2x"></i>
                        </div>
                        <h3>EQUIPES</h3>
                    </div>
                </div>
                <div class="col-md-2 col-md-4 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="200ms">
                        <div class="icon-circle">
                            <span>{{$stat_m[0]->c}}</span>
                            <i class="fa fa-user fa-2x"></i>
                        </div>
                        <h3>MEMBRES</h3>
                    </div>
                </div>
                <div class="col-md-2 col-md-4 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="300ms">
                        <div class="icon-circle">
                            <span>{{$stat_p[0]->c}}</span>
                            <i class="fa fa-folder-open-o  fa-2x"></i>
                        </div>
                        <h3>PROJETS</h3>
                    </div>
                </div>
                <div class="col-md-2 col-md-4 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="400ms">
                        <div class="icon-circle">
                            <span>{{$stat_ar[0]->c}}</span>
                            <i class="fa fa-file-text-o fa-2x"></i>
                        </div>
                        <h3>ARTICLE</h3>
                    </div>
                </div>
                <div class="col-md-2 col-md-4 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="500ms">
                        <div class="icon-circle">
                            <span>{{$stat_th[0]->c}}</span>
                            <i class="fa fa-file-pdf-o  fa-2x"></i>
                        </div>
                        <h3>THESE</h3>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#work-process-->

    <section id="blog">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Dernières Actualites</h2>
            </div>
              <?php if(isset($accs[0]) and isset($accs[2]) ): ?>
            <div class="row">
                <div class="col-sm-6">
                    <div class="blog-post blog-large wow fadeInLeft" data-wow-duration="300ms" data-wow-delay="0ms">
                        <article>
                            <header class="entry-header">
                                <div class="entry-thumbnail">
                                    <img class="img-responsive" src="images/blog/01.jpg" alt="">
                                    <span class="post-format post-format-video"><i class="fa fa-film"></i></span>
                                </div>
                                <div class="entry-date">{{$accs[0]->created_at}}</div>
                                <h2 class="entry-title"><a href="#">{{$accs[0]->titre}}</a></h2>
                            </header>

                            <div class="entry-content">
                                <p><?php echo str_limit(strip_tags($accs[0]->contenu,'<b><a><i><img>'), $limit = 100, $end = '...') ?></p><a class="btn btn-primary" href="{{ url('front/'.$labss[0]->labo_id.'/actualites/'.$accs[0]->id)}}">Lire plus</a>
                            </div>

                        </article>
                    </div>
                </div><!--/.col-sm-6-->
                <div class="col-sm-6">
                    <div class="blog-post blog-media wow fadeInRight" data-wow-duration="300ms" data-wow-delay="100ms">
                        <article class="media clearfix">
                            <div class="entry-thumbnail pull-left">
                                <img class="img-responsive" src="images/blog/02.jpg" alt="">
                                <span class="post-format post-format-gallery"><i class="fa fa-image"></i></span>
                            </div>
                            <div class="media-body">
                                <header class="entry-header">
                                    <div class="entry-date">{{$accs[1]->created_at}}</div>
                                    <h2 class="entry-title"><a href="#">{{$accs[1]->titre}}</a></h2>
                                </header>

                                <div class="entry-content">
                                  <p><?php echo str_limit(strip_tags($accs[1]->contenu,'<b><a><i><img>'), $limit = 100, $end = '...') ?></p><a class="btn btn-primary" href="{{ url('front/'.$labss[1]->labo_id.'/actualites/'.$accs[1]->id)}}">Lire plus</a>
                                </div>


                            </div>
                        </article>
                    </div>
                    <div class="blog-post blog-media wow fadeInRight" data-wow-duration="300ms" data-wow-delay="200ms">
                        <article class="media clearfix">
                            <div class="entry-thumbnail pull-left">
                                <img class="img-responsive" src="images/blog/03.jpg" alt="">
                                <span class="post-format post-format-audio"><i class="fa fa-music"></i></span>
                            </div>
                            <div class="media-body">
                                <header class="entry-header">
                                    <div class="entry-date">{{$accs[2]->created_at}}</div>
                                    <h2 class="entry-title"><a href="#">{{$accs[2]->titre}}</a></h2>
                                </header>

                                <div class="entry-content">
                                  <p><?php echo str_limit(strip_tags($accs[2]->contenu,'<b><a><i><img>'), $limit = 100, $end = '...') ?></p><a class="btn btn-primary" href="{{ url('front/'.$labss[2]->labo_id.'/actualites/'.$accs[2]->id)}}">Lire plus</a>
                                </div>

                            </div>
                        </article>
                    </div>
                </div>
            </div>

          <?php endif; ?>
        </div>
    </section>

    <section id="portfolio">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Nos Evenements</h2>
                <!-- <p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p> -->
            </div>

            <div class="text-center">
                <ul class="portfolio-filter">
                    <li><a class="active" href="#" data-filter="*">Tous les Evénement</a></li>
                    <li><a href="#" data-filter=".creative">Evénement à venir</a></li>
                    <li><a href="#" data-filter=".corporate">Evénement précédent</a></li>
                </ul><!--/#portfolio-filter-->
            </div>

            <div class="portfolio-items">
              @foreach($ups as $up)
                <div class="portfolio-item creative">
                    <div class="portfolio-item-inner">
                        <img class="img-responsive" src="{{asset($up->photo)}}" alt="">
                        <div class="portfolio-info">
                            <h3>{{$up->titre}}</h3>
                            {{$up->lieu}}
                            <a class="preview" href="{{asset($up->photo)}}" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </div><!--/.portfolio-item-->
                @endforeach
                @foreach($last as $las)
                <div class="portfolio-item corporate">
                    <div class="portfolio-item-inner">
                        <img class="img-responsive" src="{{asset($las->photo)}}" alt="">
                        <div class="portfolio-info">
                            <h3>{{$las->titre}}</h3>
                            {{$las->lieu}}
                            <a class="preview" href="{{asset($las->photo)}}" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </div><!--/.portfolio-item-->
                @endforeach
            </div>
        </div><!--/.container-->
    </section><!--/#portfolio-->

    <section id="get-in-touch">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">ENTRER EN CONTACT</h2>
                <!-- <p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p> -->
            </div>
        </div>
    </section><!--/#get-in-touch-->

    <section id="contact">
        <div id="google-map" style="height:650px" data-latitude="34.893939" data-longitude="-1.355106"></div> ,
        <div class="container-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-8">
                        <div class="contact-form">
                            <h3>Contact Info</h3>

                            <address>
                            22, Rue Abi Ayed Abdelkrim Fg Pasteur B.P 119 <br>13000, Tlemcen, Algérie <br>
                              <abbr title="Phone">P:</abbr> (213) 43 411 189
                            </address>

                            <form id="main-contact-form" name="contact-form" method="post" action="#">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Nom" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="subject" class="form-control" placeholder="Objet" required>
                                </div>
                                <div class="form-group">
                                    <textarea name="message" class="form-control" rows="8" placeholder="Message" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Envoyer le message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#bottom-->

@endsection
