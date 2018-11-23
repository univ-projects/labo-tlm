
@extends('layouts.master')

@section('title','LRI | Liste des évenements')

@section('header_page')
      <h1>
        Evenements
        <small>Liste</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('evenements')}}">Evenements</a></li>
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
              <h3 class="box-title">Liste des évenements</h3>
            </div>

          </div>
          </div>

            <!-- /.box-header -->
            <div class="box-body">

              <div class=" pull-right">
                <a href="{{url('evenements/create')}}" type="button" class="btn btn-block btn-success btn-lg"><i class="fa fa-plus"></i> Nouveau évènement</a>
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
                  <th>De</th>
                  <th>A</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($evenements as $evenement)
                  <tr>
                    <td>{{$evenement->titre}}</td>
                    <td>
                      @if($evenement->auteurUser)
                        <a href="{{url('membres/'.$evenement->auteur.'/details')}}">@if(Auth::user()->id===$evenement->auteurUser->id)Moi @else {{$evenement->auteurUser->name}} {{$evenement->auteurUser->prenom}} @endif</a>
                      @endif
                    </td>
                    <td>@if($evenement->created_at==$evenement->updated_at) {{$evenement->created_at}} @else {{$evenement->updated_at}} @endif</td>
                    <td><span class="label  @if($evenement->status) label-success @else label-default @endif">@if($evenement->status) En ligne @else Hors-ligne @endif</span></td>
                    <td>{{$evenement->from}}</td>
                    <td>{{$evenement->to}}</td>


                    <td>
                      <div class="btn-group">

                        <form action="{{ url('evenements/'.$evenement->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}

                            <a href="{{ url('evenements/'.$evenement->id.'/details')}}" class="btn btn-info">
                              <i class="fa fa-eye"></i>
                            </a>
                             @if(Auth::user()->role->nom == 'admin' || Auth::user()->id===$evenement->auteurUser->id )
                            <a href="{{url('evenements/'.$evenement->id.'/edit')}}" class="btn btn-default">
                              <i class="fa fa-edit"></i>
                            </a>
                            @endif
                             @if(Auth::user()->role->nom == 'admin' || Auth::user()->id===$evenement->auteurUser->id )
                            <!-- <button  type="submit" class="btn btn-danger ">
                                <i class="fa fa-trash-o"></i>
                            </button> -->

                             <a href="#supprimer{{ $evenement->id }}Modal" role="button" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                      <div class="modal fade" id="supprimer{{ $evenement->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="supprimer{{ $evenement->id }}ModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                    <!--   <h5 class="modal-title" id="supprimer{{ $evenement->id }}ModalLabel">Supprimer</h5> -->
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body text-center">
                                      Voulez-vous vraiment effectuer la suppression ?
                                  </div>
                                  <div class="modal-footer">
                                      <form class="form-inline" action="{{ url('evenements/'.$evenement->id)}}"  method="POST">
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
