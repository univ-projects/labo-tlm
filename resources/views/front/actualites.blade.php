@extends('layouts.front')
@extends('layouts.actualitescript')
@section('title','Actualités')


@section('content')
<div class="page-head" style="    background-image:
        linear-gradient(to right bottom,
         rgba(105, 172, 199, 0.2),
         rgba(11, 125, 218, 0.8)),
      url({{asset('images/images/img/actu.jpg')}}); 

        background-size:cover;">
  <div class="container">
    <h2 class="page-title">Actualités</h2>
    <small>Suivez tout ce qui concerne le laboratoire de recherche Tlemcen </small>
  </div>
</div>

<div class="fullwidth-block">
        <div class="container">
          <div class="project-list" >

            @foreach($actualites as $actualite)
            <div class="project">
              <div class="project-content">
                <figure class="featured-image"><img src="{{asset($actualite->photo)}}" alt="{{$actualite->titre}}"></figure>
                <h2 class="entry-title"><a href="{{ url('front/'.$lab.'/actualites/'.$actualite->id)}}">{{$actualite->titre}}</a></h2>
                <small class="date">{{$actualite->created_at}}</small>
                <p>
                  <?php echo str_limit(strip_tags($actualite->contenu,'<b><a><i><img>'), $limit = 100, $end = '...') ?>
                </p>
                <a href="{{ url('front/'.$lab.'/actualites/'.$actualite->id)}}" class="button">Voir plus</a>
              </div>
            </div>

              <div id="text">
                <div class="project">
                  <div class="project-content">
                    <figure class="featured-image"><img src="asset({{$actualite->photo}})" alt="{{$actualite->titre}}"></figure>
                    <h2 class="entry-title"><a href="{{url('EasyLab/actualite/'.$actualite->id)}}">{{$actualite->titre}}</a></h2>
                    <small class="date">19-02-2018</small>
                    <p>
                      <?php echo str_limit(strip_tags($actualite->contenu, '<b><a><i><img>'), $limit = 100, $end = '...') ?>
                    </p>
                    <a href="{{url('EasyLab/actualite/'.$actualite->id)}}" class="button">Voir plus</a>
                  </div>
                </div>
              </div>
            @endforeach



          </div>
        </div>

      </div>

@endsection
