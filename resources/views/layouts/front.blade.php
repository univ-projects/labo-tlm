<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

		<title>@yield('title')</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('labo/bower_components/font-awesome/css/font-awesome.min.css') }}">

    <!-- Bootstrap 3.3.7 -->
      <link rel="stylesheet" href="{{ asset('labo/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">

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


			<!-- <div class="hero" >
				<ul class="slides" style="height:700px;overflow:hidden">
					<li  style="background:url('public/images/img/labo1.jpg');  background-repeat:no-repeat;">
						<div class="slide-content">
							<div class="container">
								<h2 class="slide-title">Bienvenue au Laboratoires de recherche Tlemcen !</h2>
								<p>Laboratoires de recherche de l'Université Abou bekr belkaid Tlemcen est parmis les meilleurs laboratoires en continent africain</p>
								<a href="about.html" class="button homebtn">Découvrir le laboratoire !</a>

							</div>
						</div>
					</li>
					<li data-bg-image="public/images/img/labo2.png">
						<div class="slide-content">
							<div class="container">
								<h2 class="slide-title">Bienvenue au Laboratoires de recherche Tlemcen !</h2>
								<p>Laboratoires de recherche de l'Université Abou bekr belkaid Tlemcen est parmis les meilleurs laboratoires en continent africain</p>
								<a href="about.html" class="button homebtn">Découvrir le laboratoire !</a>
							</div>
						</div>
					</li>
					<li data-bg-image="public/images/img/labo3.jpg">
						<div class="slide-content">
							<div class="container">
								<h2 class="slide-title">Bienvenue au Laboratoires de recherche Tlemcen !</h2>
								<p>Laboratoires de recherche de l'Université Abou bekr belkaid Tlemcen est parmis les meilleurs laboratoires en continent africain</p>
								<a href="about.html" class="button homebtn">Découvrir le laboratoire !</a>
							</div>
						</div>
					</li>
				</ul>
			</div> -->

			<main class="main-content">
        @yield('content')

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
