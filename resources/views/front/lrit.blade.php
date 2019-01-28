


  <?php
  
  use App\Actualite;
  use App\Evenement;

  $actualites = Actualite::orderByDesc('created_at')->get();
  $evenements = Evenement::orderBy('from')->get();
  


  ?>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
<link rel="shortcut icon" href="{{asset('easyLab.png')}}">
    <title>lrit</title>

    <!-- Loading third party fonts -->
    <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('labo/bower_components/font-awesome/css/font-awesome.min.css') }}">
    
    <!-- Bootstrap 3.3.7 -->
       <link rel="stylesheet" href="{{ asset('sass/libs/bootstrap4css.css') }}" id="bootstrap-css"> 

    <!-- Loading main css file -->
    <link rel="stylesheet" href="{{ asset('styles/main-home-style.css') }}">

      



    <style media="screen">

      .align-self-end, .align-self-end:focus , .align-self-end:hover{
        text-decoration: none;
        color: inherit;
      }
       .align-self-end:hover, .btn{
        outline:none!important;
      }


      /*FEATURED*/
      .mg-2, .mg-4{
        margin-left:-20px;
      }
      .linkfeat,.linkfeat2,.linkfeata,.linkfeatb,.linkfeatc,.linkfeatd,.linkfeate,.linkfeatf,.linkfeatg,.linkfeath{

        background: rgba(76,76,76,0);
        background: -moz-linear-gradient(top, rgba(76,76,76,0) 0%, rgba(48,48,48,0) 49%, rgba(19,19,19,1) 100%);
        background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(76,76,76,0)), color-stop(49%, rgba(48,48,48,0)), color-stop(100%, rgba(19,19,19,1)));
        background: -webkit-linear-gradient(top, rgba(76,76,76,0) 0%, rgba(48,48,48,0) 49%, rgba(19,19,19,1) 100%);
        background: -o-linear-gradient(top, rgba(76,76,76,0) 0%, rgba(48,48,48,0) 49%, rgba(19,19,19,1) 100%);
        background: -ms-linear-gradient(top, rgba(76,76,76,0) 0%, rgba(48,48,48,0) 49%, rgba(19,19,19,1) 100%);
        background: linear-gradient(to bottom, rgba(76,76,76,0) 0%, rgba(48,48,48,0) 49%, rgba(19,19,19,1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4c4c4c', endColorstr='#131313', GradientType=0 );
      }
    </style>

    <!--[if lt IE 9]>
    <script src="public/js/ie-support/html5.js"></script>
    <script src="public/js/ie-support/respond.js"></script>
    <![endif]-->

  </head>


  <body>
    <div class="site-content">

      <header class="site-header" data-bg-image="">

        <div class="container">
          <div class="header-bar">
            <a href="{{url('laboratoires/')}}" class="branding">
              <img src="{{asset('images/images/img/logo-univ_tlemcen.png')}}" alt="" class="logo">
              <div class="logo-type">
                <h1 class="site-title">Université Abou Bekr Belkaid</h1>
                <small class="site-description">Laboratoires de recherche</small>
              </div>
            </a>

            <nav class="main-navigation" style="margin-top:5px">
              @yield('asidebar')
              <button class="menu-toggle" style="float:right;"><i class="fa fa-bars"></i></button>
              <div class="row" style="padding:0;">
                  @if(Auth::user())
                  <div class="col-md-5 col-xs-12" style="padding:0;margin:0 0 0 50px">
                    <!-- <a>Bonjour {{Auth::user()->name}} {{Auth::user()->prenom}} !</a> -->
                    <a class="login btn"  href="{{url('home')}}" style="border-radius: 20px;width:120px">Dashboard</a>
                    <a class="login btn btn-circle " href="{{ route('logout') }}" style="border-radius: 20px;width:120px;">Se deconnecter</a>
                  </div>
                @else
                  <div class="col-md-5 col-xs-12" style="padding:0;margin:0 0 0 50px">
                    <a class="login btn"  href="{{url('front/'.$lab.'/register')}}" style="border-radius: 20px;width:120px">S'inscrire</a>
                    <a class="login btn btn-circle " href="{{url('front/'.$lab.'/connexion')}}" style="border-radius: 20px;width:120px;">Se connecter</a>
                  </div>
                    @endif

                  <div class="col-md-5 col-xs-12" >
                    <form class="example" action="{{url('front/'.$lab.'/search')}}" style="margin:0;max-width:300px;">
                      <input type="text" placeholder="Rechercher..." name="search" required>
                      <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                  </div>
              </div>


              <ul class="menu">
                <li class="home menu-item {{{ (Request::is('front') ? 'current-menu-item' : '') }}} {{{ (Request::is('front') ? 'current-menu-item' : '') }}}"><a href="{{url('front/'.$lab)}}"><img src="{{ asset('images/images/icons/home-icon.png') }}" alt="Home"/></a></li>
                <li class="menu-item {{{ (Request::is('front/'.$lab.'/A-propos/*') ? 'current-menu-item' : '') }}} {{{ (Request::is('front/'.$lab.'/A-propos') ? 'current-menu-item' : '') }}}"><a href="{{url('front/'.$lab.'/A-propos')}}">A propos</a></li>
                <li class="menu-item {{{ (Request::is('front/'.$lab.'/actualites/*') ? 'current-menu-item' : '') }}} {{{ (Request::is('front/'.$lab.'/actualites') ? 'current-menu-item' : '') }}}"><a href="{{url('front/'.$lab.'/actualites')}}">Actualités</a></li>
                <li class="menu-item {{{ (Request::is('front/'.$lab.'/equipes/*') ? 'current-menu-item' : '') }}} {{{ (Request::is('front/'.$lab.'/equipes') ? 'current-menu-item' : '') }}} "><a href="{{url('front/'.$lab.'/equipes')}}">Equipe</a></li>
                  <li class="menu-item {{{ (Request::is('front/'.$lab.'/projets/*') ? 'current-menu-item' : '') }}} {{{ (Request::is('front/'.$lab.'/projets') ? 'current-menu-item' : '') }}} "><a href="{{url('front/'.$lab.'/projets')}}">Projet</a></li>
                <li class="menu-item {{{ (Request::is('front/'.$lab.'/Evenements/*') ? 'current-menu-item' : '') }}} {{{ (Request::is('front/'.$lab.'/Evenements') ? 'current-menu-item' : '') }}} "><a href="{{url('front/'.$lab.'/Evenements')}}">Evénements</a></li>
                <li class="menu-item {{{ (Request::is('front/'.$lab.'/Contact/*') ? 'current-menu-item' : '') }}} {{{ (Request::is('front/'.$lab.'/Contact') ? 'current-menu-item' : '') }}}"><a href="{{url('front/'.$lab.'/Contact')}}">Contact</a></li>
              </ul>
            </nav>

            <div class="mobile-navigation"></div>
          </div>
        </div>
      </header>


      

      <main class="main-content">


    <div class="fullwidth-block">
      <div class="container">
        <h2 class="section-title">Actualités récents</h2>
        
        <div class="row">
          <div class="col-sm-12 col-md-6 col-lg-6  py-0 pl-3 pr-1 featcard" >
             <div id="featured" class="carousel slide carousel-fade" data-ride="carousel" >
             <div class="carousel-inner">
                  <div class="carousel-item active">
                        <div class="card bg-dark text-white">
                          <img  src="{{asset($actualites[0]->photo)}}" height="400px" alt="">
                          <div class="card-img-overlay d-flex linkfeat">
                            <a href="{{url('front/'.$lab.'/actualites/'.$actualites[0]->id.'')}}" class="align-self-end">
                              <h4 class="card-title"><?php echo $actualites[0]->titre ?></h4>
                              <p class="textfeat" style="display: none;">
                                <?php echo substr($actualites[0]->contenu,0,250) ."..." ?>
                            </p>
                          </a>
                      </div>
                    </div>
                  </div>
                <div class="carousel-item ">
                      <div class="card bg-dark text-white">
                          <img  src="{{asset($actualites[1]->photo)}}" height="400px" alt="">
                          <div class="card-img-overlay d-flex linkfeat">
                            <a href="{{url('front/'.$lab.'/actualites/'.$actualites[1]->id.'')}}" class="align-self-end">
                              <h4 class="card-title"><?php echo $actualites[1]->titre ?></h4>
                              <p class="textfeat" style="display: none;">
                                <?php echo substr($actualites[1]->contenu,0,250) ."..." ?>
                            </p>
                          </a>
                      </div>
                    </div>
                </div>
                <div class="carousel-item ">
                      <div class="card bg-dark text-white">
                        <img  src="{{asset($actualites[2]->photo)}}" height="400px" alt="">
                          <div class="card-img-overlay d-flex linkfeat">
                            <a href="{{url('front/'.$lab.'/actualites/'.$actualites[2]->id.'')}}" class="align-self-end">
                              <h4 class="card-title"><?php echo $actualites[2]->titre ?></h4>
                              <p class="textfeat" style="display: none;">
                                <?php echo substr($actualites[2]->contenu,0,250) ."..." ?>
                            </p>
                          </a>
                    </div>
                  </div>
                </div>
                <div class="carousel-item ">
                      <div class="card bg-dark text-white">
                        <img  src="{{asset($actualites[3]->photo)}}" height="400px" alt="">
                          <div class="card-img-overlay d-flex linkfeat">
                            <a href="{{url('front/'.$lab.'/actualites/'.$actualites[3]->id.'')}}" class="align-self-end">
                              <h4 class="card-title"><?php echo $actualites[3]->titre ?></h4>
                              <p class="textfeat" style="display: none;">
                                <?php echo substr($actualites[3]->contenu,0,250) ."..." ?>
                            </p>
                          </a>
                    </div>
                  </div>
                </div>
                <div class="carousel-item ">
                      <div class="card bg-dark text-white">
                        <img  src="{{asset($actualites[0]->photo)}}" height="400px" alt="">
                          <div class="card-img-overlay d-flex linkfeat">
                            <a href="{{url('front/'.$lab.'/actualites/'.$actualites[0]->id.'')}}" class="align-self-end">
                              <h4 class="card-title"><?php echo $actualites[0]->titre ?></h4>
                              <p class="textfeat" style="display: none;">
                                <?php echo substr($actualites[0]->contenu,0,250) ."..." ?>
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
              <div class="col-6 pb-2 mg-1 ">
                <div class="card bg-dark text-white">
                    <img  src="{{asset($actualites[0]->photo)}}" height="200px" alt="">
                    <div class="card-img-overlay d-flex linkfeat2">
                      <a href="{{url('front/'.$lab.'/actualites/'.$actualites[0]->id.'')}}" class="align-self-end">
                        <h6 class="card-title"><?php echo $actualites[0]->titre ?></h6>
                      </a>
                    </div>
                    </div>
                </div>
                    <div class="col-6 pb-2 mg-2 ">
                      <div class="card bg-dark text-white">
                    <img  src="{{asset($actualites[1]->photo)}}" height="200px" alt="">
                    <div class="card-img-overlay d-flex linkfeat2">
                      <a href="{{url('front/'.$lab.'/actualites/'.$actualites[1]->id.'')}}" class="align-self-end">
                        <h6 class="card-title"><?php echo $actualites[1]->titre ?></h6>
                      </a>
                    </div>
                    </div>
                    </div>
                    <div class="col-6 pb-2 mg-3 ">
                      <div class="card bg-dark text-white">
                           <img  src="{{asset($actualites[2]->photo)}}" height="200px" alt="">
                    <div class="card-img-overlay d-flex linkfeat2">
                      <a href="{{url('front/'.$lab.'/actualites/'.$actualites[2]->id.'')}}" class="align-self-end">
                        <h6 class="card-title"><?php echo $actualites[2]->titre ?></h6>
                      </a>
                          </div>
                          </div>
                  </div>
                    <div class="col-6 pb-2 mg-4 ">
                      <div class="card bg-dark text-white">
                           <img  src="{{asset($actualites[3]->photo)}}" height="200px" alt="">
                    <div class="card-img-overlay d-flex linkfeat2">
                      <a href="{{url('front/'.$lab.'/actualites/'.$actualites[3]->id.'')}}" class="align-self-end">
                        <h6 class="card-title"><?php echo $actualites[3]->titre ?></h6>
                      </a>
                          </div>
                          </div>
              </div>
                  </div>
          </div>





      </div>
    </div>




<div class="fullwidth-block" style="background:#edf2f4">
    <div class="container" >
      <h2 class="section-title">Actualités plus anciens</h2>
      <div class="project-list" >
        @for ($i = 4; $i < 7  ; $i++)
            <div class="project" >
          <div class="project-content" style="background:#fff" >
            <img class="img img-responsive" src="{{asset($actualites[$i]->photo)}}" height="150px" width="300px" alt="">
            <h2 class="entry-title"><a href="{{url('front/'.$lab.'/actualites/'.$actualites[$i]->id.'')}}"><?php echo $actualites[$i]->titre ?></a></h2>
            <small class="date"><?php echo $actualites[$i]->created_at ?></small>
            <p><b>
              <?php echo substr($actualites[$i]->contenu,0,100)." ..." ?>
            </b></p>
            <a href="{{url('front/'.$lab.'/actualites/'.$actualites[$i]->id.'')}}" class="button">Voir plus</a>
          </div>
        </div>

          @endfor

         
        
        


        
      </div>
    </div>
    <div  align="center" style="margin-bottom:25px">
  <a href="{{url('front/'.$lab.'/actualites')}}" class="button home-actualite">Voir tout les actualités</a>
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
                                <div class="row center">
                                  @for ($j = 0; $j < 4; $j++)
                                    <div class="col-md-3">
                                        <a href="{{url('front/'.$lab.'/Evenements/'.$evenements[$j]->id.'')}}">
                                          <p class="calendar">
                                            <?php
                                            $d = new DateTime($evenements[$j]->from);
                                           echo $d->format('d');
                                            ?>
                                             <em>
                                              <?php
                                              $d   = DateTime::createFromFormat('!m', $d->format('m'));
                                              echo $d->format('F');
                                               ?>
                                               </em></p>
                                            <img src="{{asset($evenements[$j]->photo)}}" alt="Image" style="max-width:100%;">
                                            <div class="card-img-overlay d-flex linkfeata" style="color:#fff">
                                              <a href="{{url('front/'.$lab.'/Evenements/'.$evenements[$j]->id.'')}}" class="align-self-end">
                                                <h4 class="card-title"><?php echo $evenements[$j]->titre ?></h4>
                                                <p class="textfeata" style="display: none;">
                                                   <?php echo substr($evenements[$j]->contenu,0,75)." ..." ?>
                                              </p>
                                            </a>
                                        </div>
                                        </a>
                                    </div>
                                    @endfor
                                    
                                </div>
                                <!--.row-->
                            </div>
                            <!--.item-->

                            <div class="carousel-item">
                                <div class="row">
                                    @for ($j = 0; $j < 4; $j++)
                                    <div class="col-md-3">
                                        <a href="{{url('front/'.$lab.'/Evenements/'.$evenements[$j]->id.'')}}">
                                          <p class="calendar">
                                            <?php
                                            $d = new DateTime($evenements[$j]->from);
                                           echo $d->format('d');
                                            ?>
                                             <em>
                                              <?php
                                              $d   = DateTime::createFromFormat('!m', $d->format('m'));
                                              echo $d->format('F');
                                               ?>
                                               </em></p>
                                            <img src="{{asset($evenements[$j]->photo)}}" alt="Image" style="max-width:100%;">
                                            <div class="card-img-overlay d-flex linkfeata" style="color:#fff">
                                              <a href="{{url('front/'.$lab.'/Evenements/'.$evenements[$j]->id.'')}}" class="align-self-end">
                                                <h4 class="card-title"><?php echo $evenements[$j]->titre ?></h4>
                                                <p class="textfeata" style="display: none;">
                                                   <?php echo substr($evenements[$j]->contenu,0,75)." ..." ?>
                                              </p>
                                            </a>
                                        </div>
                                        </a>
                                    </div>
                                    @endfor
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
  <a href="{{url('front/'.$lab.'/Evenements')}}" class="button home-actualite">Voir tout les événements</a>
</div>





    
</div>

<div class="fullwidth-block" style="background:#eee" >
    <div class="container" >
      <h2 class="section-title">Equipes</h2>
      <div class="project-list" >
        <?php $i=-1; ?>
        @foreach($equipes as $equipe )
        <?php $i++; ?>
        <div class="project" >
          <div class="project-content row" style="background:#fff" >
            <h2 class="entry-title col-md-12"><a href="{{url('front/'.$lab.'/equipes/'.$equipe->id.'')}}">{{$equipe->intitule}}</a></h2>

            <div class="col-md-12">
                <a href="{{url('front/'.$lab.'/equipes/'.$equipe->id.'')}}">
                  <img src="{{asset($equipe->photo)}}" alt="" class="img img-responsive rounded-circle" width="150px" height="150px">
                </a>
            </div>
            <a href="{{url('front/'.$lab.'/profile/'.$chef[$i]->id.'')}}" class="col-md-12" style="margin-bottom:20px;color:black;">
              <small >Chef d'équipe: Mr {{$chef[$i]->name}} {{$chef[$i]->prenom }} </small>
            </a>
            <p>
                  <?php echo str_limit(strip_tags($equipe->resume, '<b><a><i><img>'), $limit = 80, $end = '...') ?>
            </p>
            <div class="labo-users">

                <h4>Membres</h4>
<?php $j=0; ?>
                  @foreach($membres as $membre)
                <?php  if($membre->equipe_id == $equipe->id && $j<6): ?>
                <a href="{{url('front/'.$lab.'/profile/'.$membre->id.'')}}"  data-toggle="tooltip" data-placement="top" title="{{$membre->name}} {{$membre->prenom}}"><img src="{{asset($membre->photo)}}" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
              <?php $j++; endif; ?>
                  @endforeach
                    <?php if($j>5): ?>
                <a href="labo.html">
                  <br><br> Affiche Plus
                </a>  <?php endif; ?>

              </div>


            <a href="{{url('front/'.$lab.'/equipes/'.$equipe->id.'')}}" class="button col-md-12">Voir le groupe !</a>
          </div>
        </div>
 @endforeach




      </div>
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
                  <strong>Addresse:</strong>  22, Rue Abi Ayed Abdelkrim Fg Pasteur B.P 119 13000, Tlemcen, Algérie
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
                  <li><a href="article.html">Collaboration entre les enseignants de l'UABT et Coréens</a></li>
                  <li><a href="article.html">Contrôle de Conformité des Laboratoires et des Unités de Recherche</a></li>
                  <li><a href="article.html">Appel à création de nouveaux laboratoires de recherches</a></li>
                </ul>
              </div>
            </div>
            <div class="col-md-3">
              <div class="widget">
                <h3 class="widget-title">Prochains événements</h3>
                <ul class="arrow-list">
                  <li><a href="event.html">GDG : Android study Jams, Atelier Désign et séance de Lecture</a></li>
                    <li><a href="event.html">GDG : Android study Jams, Atelier Désign et séance de Lecture</a></li>
                    <li><a href="event.html">GDG : Android study Jams, Atelier Désign et séance de Lecture</a></li>
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



    <script src="{{ asset('labo/bower_components/jquery/dist/jquery-3.3.1.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.0/moment.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/locale/fr.js"></script>
    <script src="{{ asset('labo/bower_components/bootstrap/dist/js/bootstrap4js.js') }}"></script>
    <script src="{{ asset('labo/bower_components/plugins.js')}}"></script>
    <script src="{{ asset('labo/bower_components/app.js')}}"></script>

  <script src="{{ asset('js/bootstrap4js.js') }}"></script>

  <script src="{{ asset('js/popperjs.js') }}"></script>

  </body>

<script type="text/javascript">



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
});
</script>


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

<script src="{{ asset('labo/bower_components/fullcalendar/dist/scriptCalendar.js') }}"></script>

@yield('script')

</html>




