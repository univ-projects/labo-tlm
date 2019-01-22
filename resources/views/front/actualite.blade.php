@extends('layouts.front')

<!--@section('title','Acceuil')    hadi ta3ach -->

@section('content')



<main class="main-content">
				<div class="fullwidth-block">
					<div class="container">
<<<<<<< HEAD
						<a href="." class="button back"><img src="public/images/icons/arrow-back.png" alt="">Revenir a la page d'actualités</a>
=======
						<a href="{{url('EasyLab/actualites')}}" class="button back"><img src="public/images/icons/arrow-back.png" alt="">Revenir a la page d'actualités</a>
>>>>>>> 9f4e911c54eef96e4f3567e7e0cff0ae6a9196e0
							<div class="col-md-12" align="center">
								<figure>
									<img src="{{asset($actualite->photo)}}" alt="" >
								</figure>
							</div>

						<div class="row">
							<div class="col-md-12">
								<h2 class="entry-title"><a href="">{{$actualite->titre}}</a></h2>
								<small class="date" style="font-style:italic">{{$actualite->auteurUser->name}} {{$actualite->auteurUser->prenom}}</small>
								<p>

<<<<<<< HEAD
										<?php echo strip_tags($actualite->contenu,'<b><a><i><img>') ;?>
=======
										<?php echo strip_tags($actualite->contenu, '<b><a><i><img>') ?>
>>>>>>> 9f4e911c54eef96e4f3567e7e0cff0ae6a9196e0
								</p>
							</div>

					</div>
				</div>


@endsection
