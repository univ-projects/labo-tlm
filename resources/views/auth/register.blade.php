@extends('layouts.front')

@section('title','Inscription')

@section('content')


    <style media="screen">
          /*custom font*/
        @import url(https://fonts.googleapis.com/css?family=Montserrat);


        .main-content {
          margin:0px;
          height:900px;
        	/*background = gradient + image pattern combo*/
          padding:50px;

          background-image:
          	  linear-gradient(to right bottom,
               rgba(105, 172, 199, 0.2),
               rgba(11, 125, 218, 0.8)),
              url({{asset('images/images/img/labo-bg.jpg')}});

              background-size:cover;
								position:relative

        }

        /*form styles*/
        #msform {
        	width: 600px;
        	margin: 0px auto;
        	text-align: center;
        	position: relative;
        }
        #msform fieldset {
        	background: white;
        	border: 0 none;
        	border-radius: 3px;
        	box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
        	padding: 20px 30px;
        	box-sizing: border-box;
        	width: 80%;
        	margin: 0 10%;

        	/*stacking fieldsets above each other*/
        	position: relative;
        }
        /*Hide all except first fieldset*/
        #msform fieldset:not(:first-of-type) {
        	display: none;
        }
        /*inputs*/
        #msform input, #msform textarea {
        	padding: 15px;
        	border: 1px solid #ccc;
        	border-radius: 3px;
        	margin-bottom: 10px;
        	width: 100%;
        	box-sizing: border-box;
        	font-family: montserrat;
        	color: #2C3E50;
        	font-size: 13px;
        }
        /*buttons*/
        #msform .action-button {
        	width: 100px;
        	font-weight: bold;

        	border: 0 none;
        	border-radius: 5px;
        	cursor: pointer;
        	padding: 10px 5px;
        	margin: 10px 5px;
        }
        /*headings*/
        .fs-title {
        	font-size: 15px;
        	text-transform: uppercase;
        	color: #2C3E50;
        	margin-bottom: 10px;
        }
        .fs-subtitle {
        	font-weight: normal;
        	font-size: 13px;
        	color: #666;
        	margin-bottom: 20px;
        }
        /*progressbar*/
        #progressbar {
        	margin-bottom: 30px;
        	overflow: hidden;
        	/*CSS counters to number the steps*/
        	counter-reset: step;
        }
        #progressbar li {
        	list-style-type: none;
        	color: white;
        	text-transform: uppercase;
        	font-size: 9px;
        	width: 33.33%;
        	float: left;
        	position: relative;
        }
        #progressbar li:before {
        	content: counter(step);
        	counter-increment: step;
        	width: 20px;
        	line-height: 20px;
        	display: block;
        	font-size: 10px;
        	color: #333;
        	background: white;
        	border-radius: 3px;
        	margin: 0 auto 5px auto;
        }
        /*progressbar connectors*/
        #progressbar li:after {
        	content: '';
        	width: 100%;
        	height: 2px;
        	background: white;
        	position: absolute;
        	left: -50%;
        	top: 9px;
        	z-index: 1; /*put it behind the numbers*/
        }
        #progressbar li:first-child:after {
        	/*connector not needed before the first step*/
        	content: none;

        }
        /*marking active/completed steps green*/
        /*The number of the step and the connector before it = green*/
        #progressbar li.active2:before,  #progressbar li.active2:after{
        	background: #0b7dda;
        	color: white;
        }




    </style>

	   <style media="screen">
					.inputGroup  label .row{
								background: rgba(242,246,248,1);
					background: -moz-linear-gradient(top, rgba(242,246,248,1) 0%, rgba(242,246,248,1) 50%, rgba(224,239,249,1) 78%, rgba(224,239,249,1) 79%);
					background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(242,246,248,1)), color-stop(50%, rgba(242,246,248,1)), color-stop(78%, rgba(224,239,249,1)), color-stop(79%, rgba(224,239,249,1)));
					background: -webkit-linear-gradient(top, rgba(242,246,248,1) 0%, rgba(242,246,248,1) 50%, rgba(224,239,249,1) 78%, rgba(224,239,249,1) 79%);
					background: -o-linear-gradient(top, rgba(242,246,248,1) 0%, rgba(242,246,248,1) 50%, rgba(224,239,249,1) 78%, rgba(224,239,249,1) 79%);
					background: -ms-linear-gradient(top, rgba(242,246,248,1) 0%, rgba(242,246,248,1) 50%, rgba(224,239,249,1) 78%, rgba(224,239,249,1) 79%);
					background: linear-gradient(to bottom, rgba(242,246,248,1) 0%, rgba(242,246,248,1) 50%, rgba(224,239,249,1) 78%, rgba(224,239,249,1) 79%);
					filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f2f6f8', endColorstr='#e0eff9', GradientType=0 );
					}
					.inputGroup {
						background-color: #fff;
						display: block;

						position: relative; }
						.inputGroup label {

							width: 100%;
							display: block;
							text-align: left;
							color: #3C454C;
							cursor: pointer;
							position: relative;
							z-index: 2;
							transition: color 200ms ease-in;
							overflow: hidden; }
							.inputGroup label:before {
								width: 10px;
								height: 10px;
								border-radius: 50%;
								content: '';
								background-color: #5562eb;
								position: absolute;
								left: 50%;
								top: 50%;
								transform: translate(-50%, -50%) scale3d(1, 1, 1);
								transition: all 300ms cubic-bezier(0.4, 0, 0.2, 1);
								opacity: 0;
								z-index: -1; }
							.inputGroup label:after {
								width: 32px;
								height: 32px;
								content: '';
								border: 2px solid #D1D7DC;
								background-color: #fff;
								background-image: url("data:image/svg+xml,%3Csvg width='32' height='32' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M5.414 11L4 12.414l5.414 5.414L20.828 6.414 19.414 5l-10 10z' fill='%23fff' fill-rule='nonzero'/%3E%3C/svg%3E ");
								background-repeat: no-repeat;
								background-position: 2px 3px;
								border-radius: 50%;
								z-index: 2;
								position: absolute;
								right: 30px;
								top: 50%;
								transform: translateY(-50%);
								cursor: pointer;
								transition: all 200ms ease-in; }

							.inputGroup input:checked ~ label:before {
								transform: translate(-50%, -50%) scale3d(56, 56, 1);
								opacity: 1; }
							.inputGroup input:checked ~ label:after {
								background-color: #54E0C7;
								border-color: #54E0C7; }
						.inputGroup input {
							width: 32px;
							height: 32px;
							order: 1;
							z-index: 2;
							position: absolute;
							right: 30px;
							top: 50%;
							transform: translateY(-50%);
							cursor: pointer;
							visibility: hidden; }

					.form {
						padding: 0 16px;
						max-width: 550px;
						margin: 50px auto;
						font-size: 18px;
						font-weight: 600;
						line-height: 36px; }



					code {
						background-color: #9AA3AC;
						padding: 0 8px; }

					/*# sourceMappingURL=output.css.map */

		</style>





        <!-- multistep form -->
        <form id="msform" action="{{url('pendingMembres')}}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <!-- progressbar -->
          <ul id="progressbar">
            <li class="active2">Informations</li>
            <li>Grade</li>
            <li>Paramètres du compte</li>
          </ul>
          <!-- fieldsets -->
          <fieldset>
            <h2 class="fs-title">Vos informations</h2>
            <h3 class="fs-subtitle">Veuillez remplir vos indormations</h3>
            <input type="text" name="name" placeholder="Nom" />
            <input type="text" name="prenom" placeholder="Prénom" />
            <input type="date" name="date_naissance" value="">
            <input type="text" name="phone" placeholder="Téléphone" />

            <input type="button" name="next" class="next action-button" value="Suivant" /></br>
            <a href="{{url('front/'.$lab.'/connexion')}}">Vous avez déja un compte ?</a>
          </fieldset>

          <fieldset>
            <h2 class="fs-title">Grade</h2>
            <h3 class="fs-subtitle">Séléctionner votre proffession</h3>
							<div class="inputGroup" >
								<input id="radio1" name="grade" type="radio" value="Doctorant"/>
								<label for="radio1">
									<div class="row" >
										<img src="{{asset('images/images/img/student.png')}}"  class="col-md-3">
										<div class="col-md-6">
											<h4>Doctorant</h4>
											<small>Etudiant doctorant</small>
										</div>
									</div>
								</label>
							</div>
							<div class="inputGroup">
								<input id="radio2" name="grade" type="radio" value="MAA"/>
								<label for="radio2">
									<div class="row">
										<img src="{{asset('images/images/img/docteur.png')}}"  class="col-md-3">
										<div class="col-md-6">
											<h4>MAA</h4>
											<small>Enseignant MAA</small>
										</div>
									</div>
								</label>
							</div>
              <div class="inputGroup">
                <input id="radio4" name="grade" type="radio" value="MAB"/>
                <label for="radio4">
                  <div class="row">
                    <img src="{{asset('images/images/img/docteur.png')}}"  class="col-md-3">
                    <div class="col-md-6">
                      <h4>MAB</h4>
                      <small>Enseignant MAB</small>
                    </div>
                  </div>
                </label>
              </div>
              <div class="inputGroup">
                <input id="radio5" name="grade" type="radio" value="MCA"/>
                <label for="radio5">
                  <div class="row">
                    <img src="{{asset('images/images/img/docteur.png')}}"  class="col-md-3">
                    <div class="col-md-6">
                      <h4>MCA</h4>
                      <small>Enseignant MCA</small>
                    </div>
                  </div>
                </label>
              </div>
              <div class="inputGroup">
                <input id="radio6" name="grade" type="radio" value="MCB"/>
                <label for="radio6">
                  <div class="row">
                    <img src="{{asset('images/images/img/docteur.png')}}"  class="col-md-3">
                    <div class="col-md-6">
                      <h4>MCB</h4>
                      <small>Enseignant MCB</small>
                    </div>
                  </div>
                </label>
              </div>
							<div class="inputGroup">
								<input id="radio3" name="grade" type="radio" value="Professeur"/>
								<label for="radio3">
									<div class="row">
										<img src="{{asset('images/images/img/prof.png')}}"  class="col-md-3">
										<div class="col-md-6">
											<h4>Professeur</h4>
											<small>Professeur</small>
										</div>
									</div>
								</label>
							</div>


									<input type="button" name="previous" class="previous action-button" value="Précédent" style="margin:0 0 0 50px" />
									<input type="button" name="next" class="next action-button" style="margin:0 50px 0 0" value="Suivant" />

								<a href="{{url('front/'.$lab.'/connexion')}}"	class="col-md-12">Vous avez déja un compte ?</a>



          </fieldset>

          <fieldset>
            <h2 class="fs-title">Paramètres du compte</h2>
            <h3 class="fs-subtitle">Veuillez entrez un email et un mot de passe</h3>
            <input type="text" name="email" placeholder="Email" />
            <input type="password" name="password" placeholder="Mot de passe" />

            <input type="button" name="previous" class="previous action-button" value="Précédent" />
            <input type="submit" name="submit" class="submit action-button-login " value="S'inscrire"/>
            <a href="{{url('front/'.$lab.'/connexion')}}">Vous avez déja un compte ?</a>
          </fieldset>

        </form>


@endsection


@section('script')
<!-- jQuery 3 -->
<script src="{{ asset('labo/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('labo/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<script type="text/javascript">


  //jQuery time
  var current_fs, next_fs, previous_fs; //fieldsets
  var left, opacity, scale; //fieldset properties which we will animate
  var animating; //flag to prevent quick multi-click glitches

  $(".next").click(function(){
  	if(animating) return false;
  	animating = true;

  	current_fs = $(this).parent();
  	next_fs = $(this).parent().next();

  	//activate next step on progressbar using the index of next_fs
  	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active2");

  	//show the next fieldset
  	next_fs.show();
  	//hide the current fieldset with style
  	current_fs.animate({opacity: 0}, {
  		step: function(now, mx) {
  			//as the opacity of current_fs reduces to 0 - stored in "now"
  			//1. scale current_fs down to 80%
  			scale = 1 - (1 - now) * 0.2;
  			//2. bring next_fs from the right(50%)
  			left = (now * 50)+"%";
  			//3. increase opacity of next_fs to 1 as it moves in
  			opacity = 1 - now;
  			current_fs.css({
          'transform': 'scale('+scale+')',
          'position': 'absolute'
        });
  			next_fs.css({'left': left, 'opacity': opacity});
  		},
  		duration: 800,
  		complete: function(){
  			current_fs.hide();
  			animating = false;
  		},
  		//this comes from the custom easing plugin
  		easing: 'easeInOutBack'
  	});
  });

  $(".previous").click(function(){
  	if(animating) return false;
  	animating = true;

  	current_fs = $(this).parent();
  	previous_fs = $(this).parent().prev();

  	//de-activate current step on progressbar
  	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active2");

  	//show the previous fieldset
  	previous_fs.show();
  	//hide the current fieldset with style
  	current_fs.animate({opacity: 0}, {
  		step: function(now, mx) {
  			//as the opacity of current_fs reduces to 0 - stored in "now"
  			//1. scale previous_fs from 80% to 100%
  			scale = 0.8 + (1 - now) * 0.2;
  			//2. take current_fs to the right(50%) - from 0%
  			left = ((1-now) * 50)+"%";
  			//3. increase opacity of previous_fs to 1 as it moves in
  			opacity = 1 - now;
  			current_fs.css({'left': left});
  			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
  		},
  		duration: 800,
  		complete: function(){
  			current_fs.hide();
  			animating = false;
  		},
  		//this comes from the custom easing plugin
  		easing: 'easeInOutBack'
  	});
  });




</script>

@endsection
