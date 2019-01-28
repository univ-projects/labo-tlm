@extends('layouts.front')

@section('title','Article')
@section('content')

<div class="site-content">

  <div class="page-head" style="background-image:
          linear-gradient(to right bottom,
           rgba(105, 172, 199, 0.2),
           rgba(11, 125, 218, 0.8)),
          url({{asset('images/images/img/labo-l.jpg')}});

          background-size:cover;">
    <div class="container">
      <h2 class="page-title">Articles</h2>
      <small>Voir tout les articles du notre laboratoire de recherche </small>
    </div>
  </div>


  <main class="main-content">
    <div class="fullwidth-block">
      <div class="container">
        <h2 class="section-title">Liste des Articles</h2>

      </div>
    </div>

    <div class="fullwidth-block">
      <div class="container">
        <div class="project-list">
            @foreach($articles as $projet)
          <div class="project">
            <div class="project-content">
              <figure class="project-image"><img src="{{asset($projet->photo)}}" alt="Project"></figure>
              <h3 class="project-title">{{$projet->titre}}</h3>
              <p>  <?php echo str_limit(strip_tags($projet->resume, '<b><a><i><img>'), $limit = 100, $end = '...') ?></p>
              <a href="{{ url('front/'.$lab.'/articles/'.$projet->id)}}" class="button">Voir détails</a> 
            </div>
          </div>
            @endforeach
        </div>
      </div>
    </div>

  </main> <!-- .main-content -->


</div>

@endsection
