@extends('layouts.front')

@section('title','Connexion')

@section('content')

    <style media="screen">
          /*custom font*/
        @import url(https://fonts.googleapis.com/css?family=Montserrat);


        .main-content {
          margin:0px;
          height:600px;
        	/*background = gradient + image pattern combo*/
          padding:50px;

          background-image:
          	  linear-gradient(to right bottom,
               rgba(105, 172, 199, 0.2),
               rgba(11, 125, 218, 0.8)),
              url({{asset('images/images/img/labo-bg.jpg')}});

              background-size:cover;

        }


        body {
        	font-family: montserrat, arial, verdana;
        }
        /*form styles*/
        #msform {
        	width: 400px;
        	margin: 0px auto;
        	text-align: center;
        	position: relative;
					top:25%;
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



    </style>

<!-- multistep form -->

<form id="msform" method="POST" action="{{ route('login')}}">
      @csrf

  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Se connecter</h2>
    <!-- <input id="email" type="email" class=" form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus   /> -->
    <div class=" validate-input" data-validate = "Valid email is required: ex@abc.xyz">

      <input id="email" type="email" class="input100 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus style="height:40px">
        <div class="col-md-6">

                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
    </div>


    <div class="validate-input" data-validate="Password is required">

        <input  id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Mot de passe" style="height:40px">
        <div class="col-md-6">

                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
    </div>
    <!-- <input type="password" name="pass" placeholder="Mot de passe" /> -->
     <input type="submit" name="submit" class="submit action-button-login " value="Se connecter"/>
     <div class="flex-sb-m w-full p-t-3 p-b-32">
         <!-- <div class="contact100-form-checkbox">
             <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
             <label>
                 <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Se souvenir de moi') }}
             </label>
         </div> -->

         <div>
             <a class="btn btn-link" href="{{ route('password.request') }}">
                 {{ __('Mot de passe oublié?') }}
             </a>
         </div>
     </div>
  </fieldset>

</form>



<script src="public/js/jquery-3.3.1.min.js"></script>
<script src="public/js/jqueryui.js"></script>


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

  $(".submit").click(function(){
  	return false;
  })


</script>

@endsection
