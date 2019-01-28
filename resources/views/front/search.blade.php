@extends('layouts.front')
@extends('layouts.search')
@section('title','Resultas de Recherche')
@section('content')
<div class="container">

    <hgroup class="mb20">
		<h1>Résultats de recherche</h1>
		<h2 class="lead"> Resultats recherche pour <strong class="text-danger">{{$q}}</strong></h2>
	</hgroup>
 <?php if ($users != null || $articles != null || $projets != null  ): ?>


    <section class="col-xs-12 col-sm-6 col-md-12">
  @foreach($users as $user)

    <article class="search-result row">
			<div class="col-xs-12 col-sm-12 col-md-3">
				<a href="profile/{{$user->id}}" title="Lorem ipsum" class="thumbnail"><img src="{{asset($user->photo)}}" alt="Lorem ipsum" width="150" height="150" /></a>
			</div>

  			<div class="col-xs-12 col-sm-12 col-md-7 excerpet">
				<h3><a href="profile/{{$user->id}}" title="">{{$user->name}}  {{$user->prenom}}</a></h3>
				<p>{{$user->grade}}</p>
                <span class="plus"><a href="profile/{{$user->id}}" title="Lorem ipsum"><i class="glyphicon glyphicon-plus"></i></a></span>
			</div>
			<span class="clearfix borda"></span>
		</article>
@endforeach

@foreach($articles as $article)

  <article class="search-result row">
    <div class="col-xs-12 col-sm-12 col-md-3">
      <a href="articles/{{$article->id}}" title="Lorem ipsum" class="thumbnail"><img src="{{asset($article->photo)}}" alt="Lorem ipsum" width="150" height="150" /></a>
    </div>

      <div class="col-xs-12 col-sm-12 col-md-7 excerpet">
      <h3><a href="articles/{{$article->id}}" title="">{{$article->titre}} </a></h3>
      <p>  <?php echo str_limit(strip_tags($article->resume, '<b><a><i><img>'), $limit = 100, $end = '...') ?></p>
              <span class="plus"><a href="articles/{{$article->id}}" title="Lorem ipsum"><i class="glyphicon glyphicon-plus"></i></a></span>
    </div>
    <span class="clearfix borda"></span>
  </article>
@endforeach

@foreach($projets as $projet)

  <article class="search-result row">
    <div class="col-xs-12 col-sm-12 col-md-3">
      <a href="projets/{{$projet->id}}" title="Lorem ipsum" class="thumbnail"><img src="{{asset($projet->photo)}}" alt="Lorem ipsum" width="150" height="150" /></a>
    </div>

      <div class="col-xs-12 col-sm-12 col-md-7 excerpet">
      <h3><a href="projets/{{$projet->id}}" title="">{{$projet->intitule}} </a></h3>
      <p>  <?php echo str_limit(strip_tags($projet->resume, '<b><a><i><img>'), $limit = 100, $end = '...') ?></p>
              <span class="plus"><a href="projets/{{$projet->id}}" title="Lorem ipsum"><i class="glyphicon glyphicon-plus"></i></a></span>
    </div>
    <span class="clearfix borda"></span>
  </article>
@endforeach
<?php else: ?>
          	<p>Pas De Resultats Trouvés</p>
 <?php endif; ?>


	</section>
</div>

@endsection
