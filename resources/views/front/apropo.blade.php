<!DOCTYPE html>
@extends('layouts.front')

@section('title','A-propo')    

@section('content')





		<div class="site-content">


			<div class="page-head" style="background-image:
	            linear-gradient(to right bottom,
	             rgba(105, 172, 199, 0.2),
	             rgba(11, 125, 218, 0.8)),
	            url({{asset('images/images/img/lab-about.jpg')}});

	            background-size:cover;">
				<div class="container">
					<h2 class="page-title">A Propos de laboratoires de Tlemcen</h2>
					<small>Notre recherche avance, la vie progresse</small>
				</div>
			</div>

			<main class="main-content">


				<div class="fullwidth-block" data-bg-color="#edf2f4">
					<div class="container">

						<div class="row">
							<div class="col medium-1 small-12 large-1">
						    <div class="team">
						    </div>
						  </div>
						  <div class="col medium-10 small-12 large-10">
						    <div class="team">
						      <h2 style="text-align: center;">
						        <span style="font-size: 130%;">A Propos de nos laboratoires</span>
						      </h2>
									<br><br>

						      <p style="text-align: center;">
                          {{$labo->apropos}}

									 </p>
										<br><br><br><br>
								</div>
						  </div>
						  <div class="col medium-1 small-12 large-1">
						    <div class="team">
						  </div>
						</div>
							<div class="col-md-3">
									<div class="team">
										<p style="text-align: center;">
							      <strong>
							        <span style="font-size: 55px; padding-bottom: 0px; color: #69acc7;">{{$labosum}}</span></strong><br>
							        <strong style="color: #69acc7;">différents laboratoires </strong>
							      </p>
									</div>
								</div>
							<div class="col-md-3">
								<div class="team">
									<p style="text-align: center;">
				            <strong><span style="font-size: 55px; padding-bottom: 0px; color: #69acc7;">{{$pub}}</span></strong><br>
				            <strong style="color: #69acc7;">publications</strong>

				      </p>
								</div>
							</div>
							<div class="col-md-3">
								<div class="team">
									<p style="text-align: center;">
						        <strong>
						          <span style="font-size: 55px; padding-bottom: 0px; color: #69acc7;">+{{$membre}}</span>
						        </strong>
						        <br>
						        <strong style="color: #69acc7;">Membres</strong></p>
								</div>
							</div>
							<div class="col-md-3">
								<div class="team">
									<p style="text-align: center;"><strong><span style="font-size: 55px; padding-bottom: 0px; color: #69acc7;">+80</span>
					        </strong>
					          <br><strong style="color: #69acc7;">ans<br> éxpérience de recherche</strong>
					        </p>
								</div>
							</div>
						</div> <!-- .row -->
					</div> <!-- .container -->
				</div>

				<div class="fullwidth-block">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<div class="checked-box">
									<h3>Company Profile & Key Figures</h3>
									<p>With more than 200,000 people, the Group reported 2017 global revenues of EUR 12.8 billion.</p>
								</div>

								<div class="checked-box">
									<h3>Corporate Governance</h3>
									<p>A balanced governance, tailored to Capgemini’s specific requirements.</p>
								</div>


							</div>

							<div class="col-md-6">
								<div class="checked-box">
									<h3>Management Team – Group Executive Committee</h3>
									<p>Our Group Executive Committee leads the vision and direction of the company to achieve its overall ambitions.</p>
								</div>
								<div class="checked-box">
									<h3>Our Vision and Mission</h3>
									<p>At Capgemini, we live and breathe the philosophy that people matter and results count.</p>
								</div>


							</div>
						</div>
					</div>
				</div>



			</main> <!-- .main-content -->

			
		</div>

@endsection
