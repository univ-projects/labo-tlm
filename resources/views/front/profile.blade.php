
@extends('layouts.profile')
@section('content')

<!--Header_section-->

<section id="aboutUs"><!--Aboutus-->
<div class="inner_wrapper aboutUs-container fadeInLeft animated wow">
  <div class="container">
    <h2>{{$membre->name}} {{$membre->prenom}}</h2>
	<h6>Abou Bakr Belkaid University of Tlemcen · ({{$labo->nom}})
</h6>
    <div class="inner_section">
	  <div class="row">
						<div class="col-lg-12 about-us">
							<div class="row">
							<div class="col-md-6"> <img class="img-responsive" src="{{asset($membre->photo)}}" align=""> </div><!-- /.col-md-6 -->
								<div class="col-md-6">
							<!--	<h3>I Design Awesome Web Apps</h3> -->
									<p>
                    Actuellement enseignant a l'universite Abou Bakr Belkaid de Tlemcen Departement d'informatique  <!--  bref-->
									</p>

									<ul class="about-us-list">
                    <li class="points">Université de Nantes 2007-2008 </li>
                    <li class="points">Ecole nationale Superieure d'Informatique 2008-2012 </li>
                    <li class="points">Universite de Tlemcen  2012 - 2018 </li>
										<li class="points">Recherche D'intérêts : Environnement Intelligent - Traitement et analyse d’images</li>
										<li class="points">7 Recherches </li>
										<li class="points">2 Projets Fini  </li>

									</ul><!-- /.about-us-list -->

								</div><!-- /.col-md-6 -->

							</div><!-- /.row -->
						</div><!-- /.col-lg-12 -->
					</div>

    </div>
  </div>
  </div>
</section>
<!--Aboutus-->


<!--Service-->

<!--Service-->




<!-- Portfolio -->
<section id="Portfolio" class="content">

  <!-- Container -->
  <div class="container portfolio_title">

    <!-- Title -->
    <div class="section-title">
      <h2>Projets</h2>
	<h6>Mes Recherches</h6>

    </div>
    <!--/Title -->

  </div>
  <!-- Container -->

  <div class="portfolio-top"></div>

  <!-- Portfolio Filters -->
  <div class="portfolio">

    <div id="filters" class="sixteen columns">
      <ul class="clearfix">
        <li><a id="all" href="#" data-filter="*" class="active">
          <h5>Tout</h5>
          </a></li>
        <li><a class="" href="#" data-filter=".prototype">
          <h5>Article</h5>
          </a></li>
        <li><a class="" href="#" data-filter=".design">
          <h5>Projet</h5>
          </a></li>

      </ul>
    </div>
    <!--/Portfolio Filters -->

    <!-- Portfolio Wrapper -->
    <div class="isotope fadeInLeft animated wow grid" style="position: relative; overflow: hidden; height: 480px;" id="portfolio_wrapper">

      <!--article-->
    @foreach ($article as $articl)


      <figure style="position: absolute; left: 0px; top: 0px; transform: translate3d(1011px, 0px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;" class="portfolio-item one-four  android  prototype web isotope-item effect-oscar">
        <div class="portfolio_img"> <img src="{{asset($articl->photo)}}" alt="Portfolio 1"> </div>
         <figcaption>
        <div>
          <a href="../project.html" class="fancybox">
          <h2> {{$articl->titre}} </h2>
              <p><?php echo str_limit(strip_tags($articl->resume, '<b><a><i><img>'), $limit = 40, $end = '...'); ?></p>
          </a>
        </div>
      </figcaption>
      </figure>
   @endforeach


          <!-- Projet -->
@foreach ($projets as $projet)
      <figure style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 240px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;" class="portfolio-item one-four  design isotope-item effect-oscar">
        <div class="portfolio_img"> <img src="{{asset($projet->photo)}}" alt="Portfolio 1"> </div>
       <figcaption>
				<div>
				  <a href="../project.html" class="fancybox">
					<h2>{{$projet->intitule}}</h2>
							<p><?php echo str_limit(strip_tags($projet->resume, '<b><a><i><img>'), $limit = 50, $end = '...'); ?></p>
				  </a>
				</div>
			</figcaption>
      </figure>
@endforeach

    </div>
    <!--/Portfolio Wrapper -->

  </div>
  <!--/Portfolio Filters -->

  <div class="portfolio_btm"></div>




</section>
<!--/Portfolio -->


<!--client_logos-->

<section class="page_section team" id="team"><!--main-section team-start-->
  <div class="container">
    <h2>J'ai Travaillé Avec</h2>
  <!--  <h6>Lorem ipsum dolor sit amet, consectetur adipiscing.</h6> -->

		<div id="team" name="team">
  <div class="container">
    <div class="row centered">
            @foreach($avecs as $avec)
      <a href="{{$avec->id}}">  <div class="col-md-4 centered"> <img class="img img-circle lt-box" src="{{asset($avec->photo)}}" height="120px" width="120px" alt="">
            <div class="rt-box"><h4><strong>{{$avec->name}}  {{$avec->prenom}}</strong></h4>
                  <p>{{$avec->grade}}</p><br/>
		        </div>
          </div></a>
       @endforeach

  </div>
  <!-- row -->
</div>
	</div>
</section>
<!--/Team-->
<!--Footer-->

<footer class="footer_wrapper" id="contact">
  <div class="container">
    <section class="page_section contact" id="contact">
      <div class="contact_section">
        <h2>Entrez en contact</h2>
  <!--	<h6>Lorem ipsum dolor sit amet, consectetur Morbi sagittis, sem quisci ipsum</h6> -->

      </div>
      <div class="row">

        <div class="col-lg-12 wow fadeInLeft delay-06s">
          <div class="form">
            <input class="input-text" type="text" name="" value="Nom complet" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
            <input class="input-text" type="text" name="" value="E-mail" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
            <textarea class="input-text text-area" cols="0" rows="0" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">Votre Message </textarea>
          <a href="mailto:{{$membre->email}}">  <input class="input-btn col-md-4" type="submit" value="envoyer le message" ></a>
          </div>
        </div>
      </div>
    </section>
  </div>

</footer>

@endsection
