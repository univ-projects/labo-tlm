
@extends('layouts.master')

@section('title','LRI | Liste des actualités')

@section('header_page')
      <h1>
        Actualités
        <small>Liste</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('actualites')}}">Actualités</a></li>
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
              <h3 class="box-title">Liste des actualités</h3>
            </div>

          </div>
          </div>

            <!-- /.box-header -->
            <div class="box-body">

              <div class=" pull-right">
                <a href="{{url('actualites/create')}}" type="button" class="btn btn-block btn-success btn-lg"><i class="fa fa-plus"></i> Nouvelle actualité</a>
              </div>

<!--
               <div>
                 <button href="{{('excel')}}">Excel</button>
               </div> -->
              <table id="example3" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Titre</th>
                  <th>Auteur</th>
                  <th>Date d'ajout</th>
                  <th>Etat</th>
                  <th>Contenu</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($actualites as $actualite)
                  <tr>
                    <td>{{$actualite->titre}}</td>
                    <td>
                      @if($actualite->auteurUser)
                        <a href="{{url('membres/'.$actualite->auteur.'/details')}}">@if(Auth::user()->id===$actualite->auteurUser->id)Moi @else {{$actualite->auteurUser->name}} {{$actualite->auteurUser->prenom}} @endif</a>
                      @endif
                    </td>
                    <td>@if($actualite->created_at==$actualite->updated_at) {{$actualite->created_at}} @else {{$actualite->updated_at}} @endif</td>
                    <td><span class="label  @if($actualite->status) label-success @else label-default @endif">@if($actualite->status) En ligne @else Hors-ligne @endif</span></td>
                    <td style="width:250px">{{ str_limit($actualite->contenu, $limit = 60, $end = '...') }}</td>


                    <td>
                      <div class="btn-group">

                        <form action="{{ url('actualites/'.$actualite->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}

                            <a href="{{ url('actualites/'.$actualite->id.'/details')}}" class="btn btn-info">
                              <i class="fa fa-eye"></i>
                            </a>
                             @if(Auth::user()->role->nom == 'admin' || Auth::user()->id===$actualite->auteurUser->id )
                            <a href="{{url('actualites/'.$actualite->id.'/edit')}}" class="btn btn-default">
                              <i class="fa fa-edit"></i>
                            </a>
                            @endif
                             @if(Auth::user()->role->nom == 'admin' || Auth::user()->id===$actualite->auteurUser->id )
                            <!-- <button  type="submit" class="btn btn-danger ">
                                <i class="fa fa-trash-o"></i>
                            </button> -->

                             <a href="#supprimer{{ $actualite->id }}Modal" role="button" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                      <div class="modal fade" id="supprimer{{ $actualite->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="supprimer{{ $actualite->id }}ModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                    <!--   <h5 class="modal-title" id="supprimer{{ $actualite->id }}ModalLabel">Supprimer</h5> -->
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body text-center">
                                      Voulez-vous vraiment effectuer la suppression ?
                                  </div>
                                  <div class="modal-footer">
                                      <form class="form-inline" action="{{ url('actualites/'.$actualite->id)}}"  method="POST">
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
                  <th>Photo</th>
                  <th>Libéllé</th>
                  <th>description</th>
                  <th>Numéro</th>
                  <th>propriétaire</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

      </div>

    </div>

@endsection
