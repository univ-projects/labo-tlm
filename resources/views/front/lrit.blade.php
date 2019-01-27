@extends('layouts.front')

@section('title','lrit')

@section('content')


  <?php
  
  use App\Actualite;
  use App\Evenement;

  $actualites = Actualite::orderByDesc('created_at')->get();
  $evenements = Evenement::orderBy('from')->get();
  


  ?>
<!------ Include the above in your HEAD tag ---------->

<div class="site-content">
  

  <div class="page-head" data-bg-image="" style="border-top: 2px solid #edf2f4;border-bottom: 2px solid #edf2f4;margin-bottom:25px;padding:0px;" >
    <a href="lrit"><img src="{{asset('images/images/img/labo-info.jpg')}}" alt=""></a>
  </div>

  <!--Header_section-->
  
  <!--Header_section-->

  <main class="main-content">


    <div class="fullwidth-block">
      <div class="container">
        <h2 class="section-title">Actualités récents</h2>
        
        <div class="row">
          <div class="col-sm-12 col-md-6 col-lg-6  py-0 pl-3 pr-1 featcard" >
             <div id="featured" class="carousel slide carousel-fade" data-ride="carousel" >
             <div class="carousel-inner">
                  <div class="carousel-item active">
                        <div class="card bg-dark text-white">
                          <img  src="{{asset($actualites[0]->photo)}}" height="400px" alt="">
                          <div class="card-img-overlay d-flex linkfeat">
                            <a href="{{url('front/'.$lab.'/actualites/'.$actualites[0]->id.'')}}" class="align-self-end">
                              <h4 class="card-title"><?php echo $actualites[0]->titre ?></h4>
                              <p class="textfeat" style="display: none;">
                                <?php echo substr($actualites[0]->contenu,0,250) ."..." ?>
                            </p>
                          </a>
                      </div>
                    </div>
                  </div>
                <div class="carousel-item ">
                      <div class="card bg-dark text-white">
                          <img  src="{{asset($actualites[1]->photo)}}" height="400px" alt="">
                          <div class="card-img-overlay d-flex linkfeat">
                            <a href="{{url('front/'.$lab.'/actualites/'.$actualites[1]->id.'')}}" class="align-self-end">
                              <h4 class="card-title"><?php echo $actualites[1]->titre ?></h4>
                              <p class="textfeat" style="display: none;">
                                <?php echo substr($actualites[1]->contenu,0,250) ."..." ?>
                            </p>
                          </a>
                      </div>
                    </div>
                </div>
                <div class="carousel-item ">
                      <div class="card bg-dark text-white">
                        <img  src="{{asset($actualites[2]->photo)}}" height="400px" alt="">
                          <div class="card-img-overlay d-flex linkfeat">
                            <a href="{{url('front/'.$lab.'/actualites/'.$actualites[2]->id.'')}}" class="align-self-end">
                              <h4 class="card-title"><?php echo $actualites[2]->titre ?></h4>
                              <p class="textfeat" style="display: none;">
                                <?php echo substr($actualites[2]->contenu,0,250) ."..." ?>
                            </p>
                          </a>
                    </div>
                  </div>
                </div>
                <div class="carousel-item ">
                      <div class="card bg-dark text-white">
                        <img  src="{{asset($actualites[3]->photo)}}" height="400px" alt="">
                          <div class="card-img-overlay d-flex linkfeat">
                            <a href="{{url('front/'.$lab.'/actualites/'.$actualites[3]->id.'')}}" class="align-self-end">
                              <h4 class="card-title"><?php echo $actualites[3]->titre ?></h4>
                              <p class="textfeat" style="display: none;">
                                <?php echo substr($actualites[3]->contenu,0,250) ."..." ?>
                            </p>
                          </a>
                    </div>
                  </div>
                </div>
                <div class="carousel-item ">
                      <div class="card bg-dark text-white">
                        <img  src="{{asset($actualites[0]->photo)}}" height="400px" alt="">
                          <div class="card-img-overlay d-flex linkfeat">
                            <a href="{{url('front/'.$lab.'/actualites/'.$actualites[0]->id.'')}}" class="align-self-end">
                              <h4 class="card-title"><?php echo $actualites[0]->titre ?></h4>
                              <p class="textfeat" style="display: none;">
                                <?php echo substr($actualites[0]->contenu,0,250) ."..." ?>
                            </p>
                          </a>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>


          <div class="col-6 py-0 px-1 d-none d-lg-block">
            <div class="row">
              <div class="col-6 pb-2 mg-1 ">
                <div class="card bg-dark text-white">
                    <img  src="{{asset($actualites[0]->photo)}}" height="200px" alt="">
                    <div class="card-img-overlay d-flex linkfeat2">
                      <a href="{{url('front/'.$lab.'/actualites/'.$actualites[0]->id.'')}}" class="align-self-end">
                        <h6 class="card-title"><?php echo $actualites[0]->titre ?></h6>
                      </a>
                    </div>
                    </div>
                </div>
                    <div class="col-6 pb-2 mg-2 ">
                      <div class="card bg-dark text-white">
                    <img  src="{{asset($actualites[1]->photo)}}" height="200px" alt="">
                    <div class="card-img-overlay d-flex linkfeat2">
                      <a href="{{url('front/'.$lab.'/actualites/'.$actualites[1]->id.'')}}" class="align-self-end">
                        <h6 class="card-title"><?php echo $actualites[1]->titre ?></h6>
                      </a>
                    </div>
                    </div>
                    </div>
                    <div class="col-6 pb-2 mg-3 ">
                      <div class="card bg-dark text-white">
                           <img  src="{{asset($actualites[2]->photo)}}" height="200px" alt="">
                    <div class="card-img-overlay d-flex linkfeat2">
                      <a href="{{url('front/'.$lab.'/actualites/'.$actualites[2]->id.'')}}" class="align-self-end">
                        <h6 class="card-title"><?php echo $actualites[2]->titre ?></h6>
                      </a>
                          </div>
                          </div>
                  </div>
                    <div class="col-6 pb-2 mg-4 ">
                      <div class="card bg-dark text-white">
                           <img  src="{{asset($actualites[3]->photo)}}" height="200px" alt="">
                    <div class="card-img-overlay d-flex linkfeat2">
                      <a href="{{url('front/'.$lab.'/actualites/'.$actualites[3]->id.'')}}" class="align-self-end">
                        <h6 class="card-title"><?php echo $actualites[3]->titre ?></h6>
                      </a>
                          </div>
                          </div>
              </div>
                  </div>
          </div>





      </div>
    </div>




<div class="fullwidth-block" style="background:#edf2f4">
    <div class="container" >
      <h2 class="section-title">Actualités plus anciens</h2>
      <div class="project-list" >
        @for ($i = 0; $i < 3  ; $i++)
            <div class="project" >
          <div class="project-content" style="background:#fff" >
            <figure class="featured-image"><img src="{{asset($actualites[$i]->photo)}}" height="50px" width="50px" alt=""></figure>
            <h2 class="entry-title"><a href="{{url('front/'.$lab.'/actualites/'.$actualites[$i]->id.'')}}"><?php echo $actualites[$i]->titre ?></a></h2>
            <small class="date"><?php echo $actualites[$i]->created_at ?></small>
            <p><b>
              <?php echo substr($actualites[$i]->contenu,0,100)." ..." ?>
            </b></p>
            <a href="{{url('front/'.$lab.'/actualites/'.$actualites[$i]->id.'')}}" class="button">Voir plus</a>
          </div>
        </div>

          @endfor

         
        
        


        
      </div>
    </div>
    <div  align="center" style="margin-bottom:25px">
  <a href="{{url('front/'.$lab.'/actualites')}}" class="button home-actualite">Voir tout les actualités</a>
</div>
</div>

<!-- Flickity HTML init -->
<div class="fullwidth-block" >


    <div class="container">
            <div class="row blog">
              <h2 class="section-title">Prochains événements</h2>
                <div class="col-md-12">
                    <div id="blogCarousel" class="carousel slide" data-ride="carousel">

                        <ol class="carousel-indicators">
                            <li data-target="#blogCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#blogCarousel" data-slide-to="1"></li>
                        </ol>

                        <!-- Carousel items -->
                       <div class="carousel-inner">

                            <div class="carousel-item active">
                                <div class="row center">
                                  @for ($j = 0; $j < 3; $j++)
                                    <div class="col-md-3">
                                        <a href="../evenements/{{$evenements[$j]->id}}">
                                          <p class="calendar">
                                            <?php
                                            $d = new DateTime($evenements[$j]->from);
                                           echo $d->format('d');
                                            ?>
                                             <em>
                                              <?php
                                              $d   = DateTime::createFromFormat('!m', $d->format('m'));
                                              echo $d->format('F');
                                               ?>
                                               </em></p>
                                            <img src="{{asset($evenements[$j]->photo)}}" alt="Image" style="max-width:100%;">
                                            <div class="card-img-overlay d-flex linkfeata" style="color:#fff">
                                              <a href="../evenements/{{$evenements[$j]->id}}" class="align-self-end">
                                                <h4 class="card-title"><?php echo $evenements[$j]->titre ?></h4>
                                                <p class="textfeata" style="display: none;">
                                                   <?php echo substr($evenements[$j]->contenu,0,75)." ..." ?>
                                              </p>
                                            </a>
                                        </div>
                                        </a>
                                    </div>
                                    @endfor
                                    
                                </div>
                                <!--.row-->
                            </div>
                            <!--.item-->

                            <div class="carousel-item">
                                <div class="row">
                                    @for ($j = 0; $j < 3; $j++)
                                    <div class="col-md-3">
                                        <a href="../evenement/{{$evenements[$j]->id}}">
                                          <p class="calendar">
                                            <?php
                                            $d = new DateTime($evenements[$j]->from);
                                           echo $d->format('d');
                                            ?>
                                             <em>
                                              <?php
                                              $d   = DateTime::createFromFormat('!m', $d->format('m'));
                                              echo $d->format('F');
                                               ?>
                                               </em></p>
                                            <img src="{{asset($evenements[$j]->photo)}}" alt="Image" style="max-width:100%;">
                                            <div class="card-img-overlay d-flex linkfeata" style="color:#fff">
                                              <a href="../evenements/{{$evenements[$j]->id}}" class="align-self-end">
                                                <h4 class="card-title"><?php echo $evenements[$j]->titre ?></h4>
                                                <p class="textfeata" style="display: none;">
                                                   <?php echo substr($evenements[$j]->contenu,0,75)." ..." ?>
                                              </p>
                                            </a>
                                        </div>
                                        </a>
                                    </div>
                                    @endfor
                                </div>
                                <!--.row-->
                            </div>
                            <!--.item-->

                        </div>
                        <!--.carousel-inner-->
                    </div>
                    <!--.Carousel-->

                </div>
            </div>
  </div>
</div>
<div  align="center" style="margin-bottom:25px">
  <a href="{{url('front/'.$lab.'/Evenements')}}" class="button home-actualite">Voir tout les événements</a>
</div>





    
</div>

<div class="fullwidth-block" style="background:#eee" >
    <div class="container" >
      <h2 class="section-title">Equipes</h2>
      <div class="project-list" >
        <?php $i=-1; ?>
        @foreach($equipes as $equipe )
        <?php $i++; ?>
        <div class="project" >
          <div class="project-content row" style="background:#fff" >
            <h2 class="entry-title col-md-12"><a href="{{url('front/'.$lab.'/equipes/'.$equipe->id.'')}}">{{$equipe->intitule}}</a></h2>

            <div class="col-md-12">
                <a href="{{url('front/'.$lab.'/equipes/'.$equipe->id.'')}}">
                  <img src="{{asset($equipe->photo)}}" alt="" class="img img-responsive rounded-circle" width="150px" height="150px">
                </a>
            </div>
            <a href="{{url('front/'.$lab.'/profile/'.$chef[$i]->id.'')}}" class="col-md-12" style="margin-bottom:20px;color:black;">
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
                <a href="{{url('front/'.$lab.'/profile/'.$membre->id.'')}}"  data-toggle="tooltip" data-placement="top" title="{{$membre->name}} {{$membre->prenom}}"><img src="{{asset($membre->photo)}}" alt="" width="50px" height="50px"  class="img img-responsive rounded-circle"></a>
              <?php $j++; endif; ?>
                  @endforeach
                    <?php if($j>5): ?>
                <a href="labo.html">
                  <br><br> Affiche Plus
                </a>  <?php endif; ?>

              </div>


            <a href="{{url('front/'.$lab.'/equipes/'.$equipe->id.'')}}" class="button col-md-12">Voir le groupe !</a>
          </div>
        </div>
 @endforeach




      </div>
    </div>

</div>





  </main> <!-- .main-content -->
  

</div>








@endsection
@section('script') <link rel="stylesheet" href="{{ asset('sass/libs/bootstrap4css.css') }}" id="bootstrap-css">
@endsection