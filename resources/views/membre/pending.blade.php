@extends('layouts.master')

@section('title','LRI | Demandes d\'ajouts')

@section('header_page')
      <h1>
        Demandes d'ajouts
        <small>Liste</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('pendingMembres')}}">pendingMembres</a></li>
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
              <h3 class="box-title">Liste des demandes d'ajouts</h3>
            </div>

          </div>
          </div>

      <div >



              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Laboratoire</th>
                  <th>Equipe</th>
                  <th>Email</th>
                  <th>Grade</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody >
                  @foreach($membres as $membre)
                  <tr>
                    <td>{{$membre->name}}</td>
                    <td>{{$membre->prenom}}</td>
                    <td>@if(isset($membre->equipe))
                      <a href="laboratoires/{{$membre->equipe->labo_id}}/details">
                      {{$membre->equipe->labo['achronymes']}}

                    </a>@endif</td>
                    <td>@if(isset($membre->equipe))
                       <a href="equipes/{{$membre->equipe_id}}/details">
                       {{$membre->equipe->achronymes}}
                    </a> @endif</td>
                    <td>{{$membre->email}}</td>
                    <td>{{$membre->grade}}</td>
                    <td>
                      <div class="btn-group">

                        <form action="{{ url('pendingMembres/'.$membre->id)}}" method="post">


                            <input type="hidden" name="_method" value="PUT">
                            {{ csrf_field() }}
                              <button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>

                          </form>

                          <form action="{{ url('pendingMembres/'.$membre->id)}}" method="post">
                              {{csrf_field()}}
                              {{method_field('DELETE')}}
                             <a href="#supprimer{{ $membre->id }}Modal" role="button" class="btn btn-danger" data-toggle="modal"><i class="fa fa-close"></i></a>
                      <div class="modal fade" id="supprimer{{ $membre->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="supprimer{{ $membre->id }}ModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                    <!--   <h5 class="modal-title" id="supprimer{{ $membre->id }}ModalLabel">Supprimer</h5> -->
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body text-center">
                                      Voulez-vous vraiment refuser la demande ?
                                  </div>
                                  <div class="modal-footer">
                                      <form class="form-inline" action="{{ url('pendingMembres/'.$membre->id)}}"  method="POST">
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
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Laboratoire</th>
                  <th>Equipe</th>
                  <th>Email</th>
                  <th>Grade</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>

        </div>
            </div>
            <!-- /.box-body -->
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
