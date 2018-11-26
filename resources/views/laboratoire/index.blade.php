@extends('layouts.master')

@section('title','LRI | Liste des laboratoires')

@section('header_page')
      <h1>
        Laboratoires
        <small>Liste</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('laboratoires')}}">Laboratoires</a></li>
        <li class="active">Liste</li>
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
              <h3 class="box-title">Liste des laboratoires</h3>
            </div>

          </div>
          </div>

            <!-- /.box-header -->
            <div class="box-body">

              <div class=" pull-right">
                <a href="{{url('laboratoires/create')}}" type="button" class="btn btn-block btn-success btn-lg"><i class="fa fa-user-plus"></i> Nouveau laboratoire</a>
              </div>

<!--
               <div>
                 <button href="{{('excel')}}">Excel</button>
               </div> -->
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Logo</th>
                    <th>Nom</th>
                    <th>Achronymes</th>
                    <th>Directeur</th>
                    <th>Equipes</th>
                    <th>Membres</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($labos as $labo)
                  <tr>
                    <td> <img src="{{$labo->logo}}" alt="{{$labo->achronymes}}"></td>
                    <td>{{$labo->nom}}</td>
                    <td>{{$labo->achronymes}}</td>
                    <td>@if(isset($labo->directeu))<a href="{{url('membres/'.$labo->directeur.'/details')}}">{{$labo->directeu->name}} {{$labo->directeu->prenom}}</a>@endif</td>

                    <td style="text-align:center">
                      <?php $zeroEquipe=true; ?>
                       @foreach($nbrEquipes as $nbrs)
                      @if($nbrs->labo_id == $labo->id)
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
                       	@foreach($equipes as $e)
                      	@if($nbrs->equipe_id == $e->id AND $labo->id == $e->labo_id)
                        {{$nbrs->total}}
                        <?php $zeroMembre=false;break; ?>
                       @endif
                      @endforeach
                       <?php if(!$zeroMembre) break; ?>
                      @endforeach
                      @if($zeroMembre)
                        0
                       @endif
                    </td>
                    <td>
                      <div class="btn-group">

                        <form action="{{ url('laboratoires/'.$labo->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}

                            <a href="{{ url('laboratoires/'.$labo->id.'/details')}}" class="btn btn-info">
                              <i class="fa fa-eye"></i>
                            </a>

                            <a href="{{url('laboratoires/'.$labo->id.'/edit')}}" class="btn btn-default">
                              <i class="fa fa-edit"></i>
                            </a>


                             <a href="#supprimer{{ $labo->id }}Modal" role="button" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                      <div class="modal fade" id="supprimer{{ $labo->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="supprimer{{ $labo->id }}ModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                    <!--   <h5 class="modal-title" id="supprimer{{ $labo->id }}ModalLabel">Supprimer</h5> -->
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body text-center">
                                      Voulez-vous vraiment effectuer la suppression ?
                                  </div>
                                  <div class="modal-footer">
                                      <form class="form-inline" action="{{ url('laboratoires/'.$labo->id)}}"  method="POST">
                                          @method('DELETE')
                                          @csrf
                                      <button type="button" class="btn btn-light" data-dismiss="modal">Non</button>
                                          <button type="submit" class="btn btn-danger">Oui</button>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>


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
                    <th>Action</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

      </div>

    </div>

@endsection
