@extends('layouts.master')

@section('title','LRI | Dashboard')

@section('header_page')
    <h1>
        Dashboard
   </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      </ol>
@endsection

@section('asidebar')


@endsection

@section('content')

<style media="screen">
    /* carousel */
  .media-carousel
  {
    margin-bottom: 0;
    padding: 0 40px 30px 40px;
    margin-top: 30px;
  }
  /* Previous button  */
  .media-carousel .carousel-control.left
  {
    left: -12px;
    background-image: none;
    background: none repeat scroll 0 0 #222222;
    border: 4px solid #FFFFFF;
    border-radius: 23px 23px 23px 23px;
    height: 40px;
    width : 40px;
    margin-top: 30px
  }
  /* Next button  */
  .media-carousel .carousel-control.right
  {
    right: -12px !important;
    background-image: none;
    background: none repeat scroll 0 0 #222222;
    border: 4px solid #FFFFFF;
    border-radius: 23px 23px 23px 23px;
    height: 40px;
    width : 40px;
    margin-top: 30px
  }
  /* Changes the position of the indicators */
  .media-carousel .carousel-indicators
  {
    right: 50%;
    top: auto;
    bottom: 0px;
    margin-right: -19px;
  }
  /* Changes the colour of the indicators */
  .media-carousel .carousel-indicators li
  {
    background: #c0c0c0;
  }
  .media-carousel .carousel-indicators .active
  {
    background: #333333;
  }
  .media-carousel img
  {
    width: 250px;
    height: 100px
  }
  /* here is custom styling */
  .web_disigner {
    background: #edf2f4;
    min-height: 400px; }


  /* End carousel */
</style>

  <div class="row" style="padding-bottom: 30px">
        <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
           <div class="small-box bg-aqua">
                <div class="inner">
                   <h3>{{$membres}}</h3>
                   <p>Membres</p>
                </div>
            <div class="icon">
            <i class="ion-person"></i>
            </div>
           <a href="{{url('membres')}}" class="small-box-footer">Détails <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
                              <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
               <h3>{{$equipes}}<sup style="font-size: 20px"></sup></h3>
               <p>Equipes</p>
            </div>
            <div class="icon">
               <i class="ion-ios-people"></i>
            </div>
            <a href="{{url('equipes')}}" class="small-box-footer">Détails <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
                          <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
           <div class="small-box bg-yellow">
              <div class="inner">
                 <h3>{{$theses}}</h3>
                 <p>Thèses en cours</p>
              </div>
              <div class="icon">
               <i class="fa fa-clipboard"></i>
              </div>
              <a href="{{url('theses')}}" class="small-box-footer">Détails <i class="fa fa-arrow-circle-right"></i></a>
           </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$articles}}</h3>

              <p>Articles</p>
            </div>
            <div class="icon">
              <i class="ion-ios-paper"></i>
            </div>
            <a href="{{url('articles')}}" class="small-box-footer">Détails <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


                          <!-- ./col -->
  </div>

  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">Statistiques générales (thèses,thèsards,articles)</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      <div class="chart">
        <canvas id="barChart" style="height:230px"></canvas>
      </div>
    </div>



  </div>




  <section class="web_disigner" style="padding:30px">
    <div class="web_disigner_contain">
      <div>
      <h2 class="section-title">Laboratoires</h2>
      <div >
        <div >
          <div class="carousel slide media-carousel" id="media">
            <div class="carousel-inner">
              <div class="item  active">
                <div class="row">
                  <?php $i=0;$j=0; ?>
                  @foreach($laboratoires as $lab)
                    <div class="col-md-3 ">
                      <div class="team">
                        <a href="{{url('laboratoires/'.$lab->id.'/details')}}" style="color:#000">
                          <img src="{{asset($lab->logo)}}" alt="{{$lab->achronymes}}" class="team-image">
                          <h3 class="team-name" style="text-align:center">{{$lab->achronymes}}</h3>
                        </a>
                        <p style="text-align:center">{{$lab->nom}}</p>
                     </div>
                    </div>
                    <?php $i++; if($i==3) break; ?>
                  @endforeach
                </div>
              </div>
              <div class="item">
                <div class="row">

                  @foreach($laboratoires as $lab)
                  @if($j>3)
                    <div class="col-md-3 ">
                      <div class="team">
                        <a href="profile/profil.html" style="color:#000">
                          <img src="{{asset($lab->logo)}}" alt="{{$lab->achronymes}}" class="team-image">
                          <h3 class="team-name" style="text-align:center">{{$lab->achronymes}}</h3>
                        </a>
                        <p style="text-align:center">{{$lab->nom}}</p>
                     </div>
                    </div>
                  @endif
                  <?php $j++; ?>
                  @endforeach


                </div>
              </div>

            </div>
            @if($j!=0)
              <a data-slide="prev" href="#media" class="left carousel-control">‹</a>
              <a data-slide="next" href="#media" class="right carousel-control">›</a>
            @endif
          </div>
        </div>
      </div>
    </div>
    </div>

  </section>




<div class="row">

  <div class="col-md-8">
    <div class="box box-success" class="col-md-8">
      <div class="box-header with-border">
        <h3 class="box-title">Statistiques générales (Membres)</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="chart">
          <canvas id="lineChart" style="height:230px"></canvas>
        </div>
      </div>

    </div>
  </div>

  <div class="col-md-4">
    <div class="box box-success" class="col-md-8">
      <div class="box-header with-border">
        <h3 class="box-title">Statistiques générales (Type d'article)</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="chart">
          <canvas id="pieChart" style="height:230px"></canvas>
        </div>
      </div>

    </div>
  </div>

</div>

@endsection

@section('scripts')
<script src="{{url( 'js/Chart.min.js' )}}"></script>
  <script src="{{url( 'js/create-charts.js' )}}"></script>
    <script src="{{url( 'js/create-charts2.js' )}}"></script>
      <script src="{{url( 'js/create-charts3.js' )}}"></script>
@endsection
