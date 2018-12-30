@extends('layouts.front')

<!--@section('title','Acceuil')    hadi ta3ach -->

@section('content')



<main class="main-content">
				<div class="fullwidth-block">
					<div class="container">
						<a href="{{url('front/actualites')}}" class="button back"><img src="public/images/icons/arrow-back.png" alt="">Revenir a la page d'actualités</a>
							<div class="col-md-12" align="center">
								<figure>
									<img src="{{asset($actualite->photo)}}" alt="" >
								</figure>
							</div>

						<div class="row">
							<div class="col-md-12">
								<h2 class="entry-title"><a href="">{{$actualite->titre}}</a></h2>
								<small class="date">{{$actualite->auteur}}</small>
								<p>

										<?php echo strip_tags($actualite->contenu, '<b><a><i><img>' ?>
								</p>
							</div>

					</div>
				</div>


@endsection
