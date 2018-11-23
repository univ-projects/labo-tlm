@extends('layouts.master')

 @section('title','LRI | Détails évènement')

@section('header_page')
      <h1>
        Evenement
        <small>Détails</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{url('evenements')}}">Evènements</a></li>
        <li class="active">Détails</li>
      </ol>
@endsection

@section('asidebar')

@endsection

@section('content')

<style media="screen">
  .labo-users img{
    display: inline-block;
  }

  .labo-users.other-users{
    border: 1px solid #69acc7;
    border-radius: 7px;
    padding: 10px 0 10px 0;
  }
</style>



<div class="row">
      <div class="col-md-12">
           <div class="box box-primary">

            <div class="box-header with-border">
              <h3 class="box-title">Informations</h3>
            </div>
            <!-- /.box-header -->
              <div class="box-body">

                  <div class="row" style="margin-left:25px;margin-bottom:25px">

                          <?php $exist="non" ?>
                          @foreach($participants as $participant)
                            @if($participant->id===Auth::user()->id)
                              <?php $exist="oui" ?>
                            @endif
                          @endforeach
                          @if($exist==="non")
                              <a href="{{url('evenements/'.$evenement->id.'/participe')}}" class="button back">Participer à l'évévenement  </a>
                          @else
                              <a href="{{url('evenements/'.$evenement->id.'/pasParticipe')}}" class="button back">Ne pas participer  </a>
                          @endif

                        <div class="labo-users col-md-8" >
                            <h4>Membres participants</h4>
                            <?php $i=0; ?>
                            @foreach($participants as $participant)
                              <a href="{{url('membres/'.$participant->id.'/details')}}"  data-toggle="tooltip" data-placement="bottom" title="{{$participant->name}} {{$participant->prenom}}">
                                <img src="{{asset($participant->photo)}}" alt="{{asset($participant->name)}}" width="50px" height="50px"  class="img img-responsive img-circle">
                              </a>
                              <?php $i++; ?>
                              @if($i>=10)
                              <?php $j=0;$list=""; ?>
                                @foreach($participants as $p)
                                  <?php $j++; ?>
                                  @if($j>10)
                                    <?php $list.="$p->name $p->prenom </br>" ?>
                                  @endif
                                @endforeach
                                @if($j>10)
                                  <span class="other-users" data-toggle="tooltip" data-placement="bottom"
                                                title="{{$list}}"
                                          data-html="true"
                                          style="color:#67acc9">
                                               + {{$j-10}} autres membres

                                  </span>
                                  @endif
                                  @break
                              @endif
                            @endforeach
                            @if($i===0)
                              <small class="label label-danger">Aucun participant pour l'instant</small>
                            @endif

                          </div>
                  </div>





                  <div class="row">
                    <div class="col-md-6">
                      <figure>
                        <img src="{{asset($evenement->photo)}}" alt="{{$evenement->titre}}" width="100%">
                      </figure>
                    </div>
                    <div class="col-md-6">
                      <h2 class="entry-title">{{$evenement->titre}}</h2>
                      <small class="date">@if($evenement->created_at==$evenement->updated_at) {{$evenement->created_at}} @else {{$evenement->updated_at}} @endif</small>
                      <p>
                        {{$evenement->contenu}}
                      </p>

                  </div>
                </div>




            <!-- /.box-body -->
            </div>

         </div><!-- /.container -->
      </div>
</div>
@endsection
