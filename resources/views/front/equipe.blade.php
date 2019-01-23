@extends('layouts.front')

@section('title','Equipes')  
@section('content')

<div class="fullwidth-block" style="background:#eee" >
    <div class="container" >
      <h2 class="section-title">Equipes</h2>
      <div class="project-list" >
        <?php $i=-1; ?>
        @foreach($equipes as $equipe )
        <?php $i++; ?>
        <div class="project" >
          <div class="project-content row" style="background:#fff" >
            <h2 class="entry-title col-md-12"><a href="equipes/{{$equipe->id}}">{{$equipe->intitule}}</a></h2>

						<div class="col-md-12">
								<a href="equipes/{{$equipe->id}}">
									<img src="{{asset($equipe->photo)}}" alt="" class="img img-responsive rounded-circle" width="150px" height="150px">
								</a>
						</div>
						<a href="profile/{{$chef[$i]->id}}" class="col-md-12" style="margin-bottom:20px;color:black;">
							<small >Chef d'équipe: Mr {{$chef[$i]->name}} {{$chef[$i]->prenom }} </small>
						</a>
            <p>
                  <?php echo str_limit(strip_tags($equipe->resume, '<b><a><i><img>'), $limit = 100, $end = '...') ?>
            </p>
						<div class="labo-users">

								<h4>Membres</h4>
<?php $j=0; ?>
                  @foreach($membres as $membre)
                <?php  if($membre->equipe_id == $equipe->id && $j<6): ?>
                <a href="profile/{{$membre->id}}"  data-toggle="tooltip" data-placement="top" title="{{$membre->name}} {{$membre->prenom}}"><img src="{{asset($membre->photo)}}" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
              <?php $j++; endif; ?>
                  @endforeach
                    <?php if($j>5): ?>
              	<a href="labo.html">
									<br><br> Affiche Plus
								</a>  <?php endif; ?>

							</div>


            <a href="equipes/{{$equipe->id}}" class="button col-md-12">Voir le groupe !</a>
          </div>
        </div>
 @endforeach




      </div>
    </div>

</div>


@endsection
