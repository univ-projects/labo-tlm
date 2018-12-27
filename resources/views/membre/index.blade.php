
@extends('layouts.master')

@section('title','LRI | Liste des membres')

@section('header_page')
      <h1>
        Membres
        <small>Liste</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('membres')}}">Membres</a></li>
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
              <h3 class="box-title">Liste des membres</h3>
            </div>

          </div>
          </div>

            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lg fa-flask"></i></span>
                        <select name="membres1_labo_select" class="form-control membres1_labo_select">
                          <option value="0">Tout</option>
                          @foreach($laboratoires as $lab)
                            @if($lab->id==Auth::user()->equipe->labo_id)
                              <option value="{{$lab->id}}" selected>{{$lab->nom}}</option>
                              @else
                              <option value="{{$lab->id}}">{{$lab->nom}}</option>
                            @endif

                          @endforeach
                        </select>
                      </div>
                </div>

              @if(Auth::user()->role->nom == 'admin' )
              <div class=" pull-right">
                <a href="{{url('membres/create')}}" type="button" class="btn btn-block btn-success btn-lg"><i class="fa fa-user-plus"></i> Nouveau membre</a>
              </div>
               @endif
<!--
               <div>
                 <button href="{{('excel')}}">Excel</button>
               </div> -->
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
                <tbody id="membres1_table">
                  @foreach($membres as $membre)
                  <tr>
                    <td>{{$membre->name}}</td>
                    <td>{{$membre->prenom}}</td>
                    <td><a href="laboratoires/{{$membre->equipe->labo_id}}/details">
                      {{$membre->equipe->labo['achronymes']}}
                    </a></td>
                    <td> <a href="equipes/{{$membre->equipe_id}}/details">
                       {{$membre->equipe->achronymes}}
                    </a></td>
                    <td>{{$membre->email}}</td>
                    <td>{{$membre->grade}}</td>
                    <td>
                      <div class="btn-group">

                        <form action="{{ url('membres/'.$membre->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}

                            <a href="{{ url('membres/'.$membre->id.'/details')}}" class="btn btn-info">
                              <i class="fa fa-eye"></i>
                            </a>
                             @if(Auth::id() == $membre->id || Auth::user()->role->nom == 'admin' )
                            <a href="{{url('membres/'.$membre->id.'/edit')}}" class="btn btn-default">
                              <i class="fa fa-edit"></i>
                            </a>
                            @endif
                            @if(Auth::id() != $membre->id && Auth::user()->role->nom != 'membre' )
                            <!-- <button  type="submit" class="btn btn-danger ">
                                <i class="fa fa-trash-o"></i>
                            </button> -->

                             <a href="#supprimer{{ $membre->id }}Modal" role="button" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
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
                                      Voulez-vous vraiment effectuer la suppression ?
                                  </div>
                                  <div class="modal-footer">
                                      <form class="form-inline" action="{{ url('membres/'.$membre->id)}}"  method="POST">
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
            <!-- /.box-body -->
          </div>

      </div>

    </div>

@endsection
