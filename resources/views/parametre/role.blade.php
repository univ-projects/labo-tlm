@extends('layouts.master')

@section('title','LRI | Rôles')

@section('header_page')
      <h1>
        laboratoires
        <small>Liste</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('laboratoires')}}">Paramètres</a></li>
        <li class="active">Rôles</li>
      </ol>

@endsection

@section('asidebar')

  @endsection

@section('content')
  <div class="row">
      <div class="col-xs-12">
        <div class="box col-xs-12">
          <div class="container" style="padding-top: 30px">
          <div class="row" style="padding-bottom: 20px">
            <div class="box-header col-xs-9">
              <h3 class="box-title">Rôles</h3>
            </div>

          </div>
          </div>

            <!-- /.box-header -->
            <div class="box-body">

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Logo</th>
                    <th>Nom</th>
                    <th>Achronymes</th>
                    <th>Directeur</th>
                    <th>Equipes</th>
                    <th>Membres</th>
                    <th>Modifier</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($laboratoires as $laboratoire)
                  <tr>
                    <td> <img src="{{$laboratoire->logo}}" alt="{{$laboratoire->achronymes}}" width="100px" height="100px"></td>
                    <td>{{$laboratoire->nom}}</td>
                    <td>{{$laboratoire->achronymes}}</td>
                    <td>@if(isset($laboratoire->directeu))<a href="{{url('membres/'.$laboratoire->directeur.'/details')}}">{{$laboratoire->directeu->name}} {{$laboratoire->directeu->prenom}}</a>@endif</td>

                    <td style="text-align:center">
                      <?php $zeroEquipe=true; ?>
                       @foreach($nbrEquipes as $nbrs)
                      @if($nbrs->labo_id == $laboratoire->id)
                       {{$nbrs->total}}
                       <?php $zeroEquipe=false;break; ?>
                       @endif
                       @endforeach
                       @if($zeroEquipe)
                        0
                       @endif
                    </td>

                    <td style="text-align:center">
                      <?php $zeroMembre=true; ?>
                      @foreach($nbrMembres as $nbrs)
                        @if($nbrs->labo_id == $laboratoire->id)
                          {{$nbrs->total}}
                          <?php $zeroMembre=false ?>
                        @endif
                      @endforeach
                      @if($zeroMembre)
                        0
                      @endif

                    </td>
                    <td>
                      <div class="btn-group">

                        <form action="{{ url('laboratoires/'.$laboratoire->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}


                            <a href="{{url('laboratoires/'.$laboratoire->id.'/edit')}}" class="btn btn-info">
                              <i class="fa fa-edit" style="margin-right:8px"></i><span>Désigner le directeur</span>
                            </a>




                        </form>
                      </div>
                    </td>
                  </tr>
                  @endforeach

                </tbody>
                <tfoot>
                  <tr>
                    <th>Logo</th>
                    <th>Nom</th>
                    <th>Achronymes</th>
                    <th>Directeur</th>
                    <th>Equipes</th>
                    <th>Membres</th>
                    <th>Modifier</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

      </div>

    </div>

@endsection
