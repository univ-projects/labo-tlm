@extends('layouts.front')

@section('title','Contact')  

@section('content')


			<div class="page-head" style="    background-image:
			        linear-gradient(to right bottom,
			         rgba(105, 172, 199, 0.2),
			         rgba(11, 125, 218, 0.8)),
			        url({{asset('images/images/img/contact.jpg')}});

			        background-size:cover;">
				<div class="container">
					<h2 class="page-title">Contact</h2>
					<small>Entrez en contact avec le laboratoire de recherche Tlemcen</small>
				</div>
			</div>

			<main class="main-content">

				<div class="fullwidth-block">
					<div class="container">
						<div class="mapouter col-md-12" style="margin-bottom:15px">
							<div class="gmap_canvas">
								<iframe width="1200" height="350" id="gmap_canvas" src="https://maps.google.com/maps?q=universit%C3%A9%20de%20tlemcen&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">

								</iframe>
								</div>


							</div>

						 <div class="map" data-latitude="34.919784" data-longitude="-1.302313"></div>

						 <div class="row">

							 <div class="col-md-7 contact-form" style="padding-right:60px">
								 <form  class="form-horizontal" action="" method="" >

                        <div  class="form-group required">
                            <label  class="control-label requiredField col-md-2"> Nom<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-10 ">
                                <input class="textinput textInput form-control"   name="username" placeholder="Votre nom" style="margin-bottom: 10px" type="text" />
                            </div>
                        </div>
                        <div class="form-group required">
                            <label  class="control-label requiredField col-md-2"> E-mail<span class="asteriskField">*</span> </label>
														<div class="controls col-md-10">
																		<input class="emailinput form-control "  name="email" placeholder="Votre e-mail" style="margin-bottom: 10px" type="email" />
														</div>
                        </div>

												<div class="form-group firl-group">
													<label  class="control-label requiredField col-md-2"> Message<span class="asteriskField">*</span> </label>
													<div class="controls col-md-10">
														<textarea name="" placeholder="Message"></textarea>
													</div>
												</div>

                        <div class="form-group">
                               <input type="submit" name="envoyer" value="Envoyer le message !" class="col-md-12" />
                        </div>


                    </form>

							 </div>

							 <div class="col-md-5 boxed-content">
								 <h2 class="section-title">Contact</h2>
								 <address>
									 <h3>Addresse:</h3>
									 <p>22, Rue Abi Ayed Abdelkrim Fg Pasteur B.P 119 13000, Tlemcen, Algérie</p>
								 </address>
								 <address>
									 <h3>Téléphone:</h3>
									 <p>043.41.11.89</p>
								 </address>
								 <address>
									 <h3>Fax:</h3>
									 <p>043.41.11.91</p>
								 </address>
								 <address>
									 <h3>Email:</h3>
									 <p>univ-tlm@gmail.com</p>
								 </address>
							 </div>

						 </div>

					</div>
				</div>



			</main> <!-- .main-content -->

      @endsection
