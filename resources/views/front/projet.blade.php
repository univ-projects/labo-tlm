@extends('layouts.front')

@section('title','Projets')
@section('content')

<div class="site-content">

  <div class="page-head" style="background-image:
          linear-gradient(to right bottom,
           rgba(105, 172, 199, 0.2),
           rgba(11, 125, 218, 0.8)),
          url({{asset('images/images/img/lab-about.jpg')}});

          background-size:cover;">
    <div class="container">
      <h2 class="page-title">Projets</h2>
      <small>Voir tout les projets du laboratoire de recherche informatique Tlemcen</small>
    </div>
  </div>


  <main class="main-content">
    <div class="fullwidth-block">
      <div class="container">
        <h2 class="section-title">Liste des projets</h2>
        <p>
          Le laboratoire de recherche a pour mission de réaliser des objectifs de recherche et de développement, exécuter des études et travaux de recherche et contribuer à l`acquisition du savoir, à l'amélioration des connaissances, la formation pour et par la recherche et à la diffusion de l'information scientifique et des résultats obtenus. Dirigé par un Directeur élu, il doit être constitué d'au moins quatre équipes de recherche, chacune dirigée par un chercheur qualifié et constituée d'au moins trois chercheurs.

Le laboratoire de recherche est doté d'un conseil de laboratoire chargé d`élaborer des programmes et d'établir des états prévisionnels des recettes et des dépenses  présentés par le directeur du laboratoire. Il est doté de l'autonomie de gestion et soumis au contrôle financier à posteriori.
        </p>
      </div>
    </div>

    <div class="fullwidth-block">
      <div class="container">
        <div class="project-list">
            @foreach($projets as $projet)
          <div class="project">
            <div class="project-content">
              <figure class="project-image"><img src="{{asset($projet->photo)}}" alt="Project"></figure>
              <h3 class="project-title">{{$projet->intitule}}</h3>
              <p>  <?php echo str_limit(strip_tags($projet->resume, '<b><a><i><img>'), $limit = 100, $end = '...') ?></p>
              <a href="projets/{{$projet->id}}" class="button">Voir détails</a>
            </div>
          </div>
            @endforeach
        </div>
      </div>
    </div>


    <div class="fullwidth-block" data-bg-color="#edf2f4">
      <div class="container">
        <div class="subscribe-form">
          <h2>Join our newsletter</h2>
          <form action="#">
            <input type="text" placeholder="Enter your email">
            <input type="submit" value="Subscribe">
          </form>
        </div>
      </div>
    </div>

  </main> <!-- .main-content -->


</div>

@endsection
