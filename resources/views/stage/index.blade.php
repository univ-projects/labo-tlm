
@extends('layouts.master')

@section('title','LRI | Liste des stages')

@section('header_page')
      <h1>
        stages
        <small>Liste</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('stages')}}">Stages</a></li>
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
              <h3 class="box-title">Liste des Stages</h3>
            </div>

          </div>
          </div>

            <!-- /.box-header -->
            <div class="box-body">

              <div class=" pull-right">
                <a href="{{url('stages/create')}}" type="button" class="btn btn-block btn-success btn-lg"><i class="fa fa-plus"></i> Nouveau stage</a>
              </div>

<!--
               <div>
                 <button href="{{('excel')}}">Excel</button>
               </div> -->
              <table id="example3" class="table table-bordered table-striped">
                <thead>
                <tr>
                  @if(Auth::user()->role->nom == 'admin')
                    <th>Laboratoire</th>
                  @endif
                  <th>Participant</th>
                  <th>Partenaire</th>
                  <th>Date d'ajout</th>
                  <th>Etat</th>
                  <th>De</th>
                  <th>A</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($stages as $stage)
                  <tr>
                    @if(Auth::user()->role->nom == 'admin')
                      <td>{{$stage->participant->equipe->labo['achronymes']}}</td>
                    @endif
                    <td><a href="{{url('membres/'.$stage->participant.'/details')}}">{{$stage->participant->name}} {{$stage->participant->prenom}}</a></td>
                    <td><a href="{{url('partenaires/'.$stage->partenaire.'/details')}}">{{$stage->partenaire->nom}}</a></td>
                    <td>@if($stage->created_at==$stage->updated_at) {{$stage->created_at}} @else {{$stage->updated_at}} @endif</td>
                      <td><span class="label  @if($stage->to<date('Y-m-d')) label-success @else label-default @endif">@if($stage->to<date('Y-m-d')) Stage terminé @else En stage @endif</span></td>
                    <td>{{$stage->from}}</td>
                    <td>{{$stage->to}}</td>


                    <td>
                      <div class="btn-group">

                        <form action="{{ url('stages/'.$stage->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}

                            <a href="{{ url('stages/'.$stage->id.'/details')}}" class="btn btn-info">
                              <i class="fa fa-eye"></i>
                            </a>
                               @if(Auth::user()->role->nom == 'admin' || (Auth::user()->role->nom == 'directeur' && Auth::user()->id==$stage->participant->equipe->labo->directeur))
                            <a href="{{url('stages/'.$stage->id.'/edit')}}" class="btn btn-default">
                              <i class="fa fa-edit"></i>
                            </a>
                            @endif
                            @if(Auth::user()->role->nom == 'admin' || (Auth::user()->role->nom == 'directeur' && Auth::user()->id==$stage->participant->equipe->labo->directeur))
                            <!-- <button  type="submit" class="btn btn-danger ">
                                <i class="fa fa-trash-o"></i>
                            </button> -->

                             <a href="#supprimer{{ $stage->id }}Modal" role="button" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                      <div class="modal fade" id="supprimer{{ $stage->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="supprimer{{ $stage->id }}ModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                    <!--   <h5 class="modal-title" id="supprimer{{ $stage->id }}ModalLabel">Supprimer</h5> -->
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body text-center">
                                      Voulez-vous vraiment effectuer la suppression ?
                                  </div>
                                  <div class="modal-footer">
                                      <form class="form-inline" action="{{ url('stages/'.$stage->id)}}"  method="POST">
                                          @method('DELETE')
                                          @csrf
                                      <button type="button" class="btn btn-light" data-dismiss="modal">Non</button>
                                          <button type="submit" class="btn btn-danger">Oui</button>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>

                            @endif
                        </form>
                    </div>
                    </td>
                  </tr>
                  @endforeach

                </tbody>
                <tfoot>
                <tr>
                  @if(Auth::user()->role->nom == 'admin')
                    <th>Laboratoire</th>
                  @endif
                  <th>Participant</th>
                  <th>Partenaire</th>
                  <th>Date d'ajout</th>
                  <th>Etat</th>
                  <th>De</th>
                  <th>A</th>
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
