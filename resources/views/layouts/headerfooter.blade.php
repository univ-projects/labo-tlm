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

  <!-- Loading main css file -->
  <!-- <link rel="stylesheet" href="{{ asset('styles/main-home-style.css') }}"> -->
<script src="public/js/bootstrapjs.js"></script>

  <!-- Loading main css file -->
  <!-- <link rel="stylesheet" href="style.css"> -->

	</head>

  <body>
    <header class="site-header" data-bg-image="">

      <div class="container">
        <div class="header-bar">
          <a href="index.html" class="branding">
            <img src="{{asset('images/img/logo-univ_tlemcen.png')}}" alt="" class="logo">
            <div class="logo-type">
              <h1 class="site-title">Université Abou Bekr Belkaid</h1>
              <small class="site-description">Laboratoires de recherche</small>
            </div>
          </a>

          <nav class="main-navigation" style="margin-top:5px">
            <button class="menu-toggle"><i class="fa fa-bars"></i></button>
            <div class="row" style="padding:0;">
                <div class="col-md-5 col-xs-12" style="padding:0;margin:0 0 0 50px">
                  <button class="login btn" onclick="window.location.href='register.html'" href="register.html" style="border-radius: 20px;width:120px">S'inscrire</button>
                  <button class="login btn btn-circle " onclick="window.location.href='login.html'" style="border-radius: 20px;width:120px;">Se connecter</button>
                </div>
                <div class="col-md-5 col-xs-12" >
                  <form class="example" action="recherche.html" style="margin:0;max-width:300px;">
                    <input type="text" placeholder="Rechercher..." name="search2" required>
                    <button type="submit"><i class="fa fa-search"></i></button>
                  </form>
                </div>
            </div>


            <ul class="menu">
              <li class="home menu-item "><a href="index.html"><img src="public/images/icons/home-icon.png" alt="Home"></a></li>
              <li class="menu-item"><a href="about.html">A propos</a></li>
              <li class="menu-item current-menu-item"><a href="actualites.html">Actualités</a></li>
              <li class="menu-item "><a href="laboratoires.html">Laboratoires</a></li>
              <li class="menu-item "><a href="events.html">Evénements</a></li>
              <li class="menu-item"><a href="contact.html">Contact</a></li>
            </ul>
          </nav>

          <div class="mobile-navigation"></div>
        </div>
      </div>
    </header>


    			<main class="main-content">
            @yield('content')

    			</main>


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


          <script src="public/js/jquery-3.3.1.min.js"></script>
        		<script  src="http://maps.google.com/maps/api/js?sensor=false&amp;language=fr"></script>
        		<script src="public/js/plugins.js"></script>
        		<script src="public/js/app.js"></script>

  </body>
