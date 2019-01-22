@extends('layouts.front')
@extends('layouts.actualitescript')
@section('title','Actualités')


@section('content')

<div class="fullwidth-block">
        <div class="container">
          <div class="project-list" >
            <?php $i=0; ?>
            @foreach($actualites as $actualite)
            <?php if ($i<6): ?>


            <div class="project">
              <div class="project-content">
                <figure class="featured-image"><img src="{{asset($actualite->photo)}}" alt="{{$actualite->titre}}"></figure>
                <h2 class="entry-title"><a href="{{ url('front/'.$lab.'/actualites/'.$actualite->id)}}">{{$actualite->titre}}</a></h2>
                <small class="date">{{$actualite->updated_at}}</small>
                <p>
                  <?php echo str_limit(strip_tags($actualite->contenu,'<b><a><i><img>'), $limit = 100, $end = '...') ?>
                </p>
                <a href="{{ url('front/'.$lab.'/actualites/'.$actualite->id)}}" class="button">Voir plus</a>
              </div>
            </div>
            <?php $i++; ?>
            <?php else: ?>
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
            <?php endif; ?>



            @endforeach



          </div>
        </div>
        <div align="center">
            <button id="toggle" class="pulse-button" data-toggle="tooltip" data-placement="bottom" title="Voir plus !">&#x25BC;</button>
        </div>
      </div>

@endsection
