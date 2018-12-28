@extends('layouts.master')

@section('title','LRI | Liste des thèses')

@section('header_page')

      <h1>
        Thèses
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="{{url('theses')}}">Thèses</a></li>
      </ol>

@endsection

@section('asidebar')

@endsection

@section('content')

    <div class="row">
      <div class="col-md-12">
        <div class="box col-xs-12">
          <div class="container" style="padding-top: 30px">
          <div class="row" style="padding-bottom: 20px">
             <div class="box-header col-xs-9">
              <h3 class="box-title">Liste des thèses</h3>
            </div>

          </div>
          </div>

            <!-- /.box-header -->
            <div class="box-body">

              <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lg fa-flask"></i></span>
                        <select name="theses_labo_select" class="form-control theses_labo_select">
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
              <a href="{{url('theses/create')}}" type="button" class="btn btn-block btn-success btn-lg"><i class="fa fa-plus"></i> Nouvelle thèse</a>
            </div>
            @endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Titre</th>
                  <th>Sujet</th>
                  <th>Doctorant</th>
                  <th>Encadreur</th>
                  <th>CoEncadreur</th>
                  <th>Date Soutenance</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody id="theses_table">
                  @foreach($theses as $these)
                  @if($these->user->equipe->labo_id==Auth::user()->equipe->labo_id)
                  <tr>
                    <td>{{$these->titre}}</td>
                    <td>{{$these->sujet}}</td>
                    <td><a href="{{url('membres/'.$these->user->id.'/details')}}">
                      {{$these->user->name}} {{$these->user->prenom}}</a></td>
                    <td>
                      @if($these->encadreur)
                        <li> <a href="{{url('membres/'.$these->encadreur->id.'/details')}}">
                          {{$these->encadreur->name}} {{$these->encadreur->prenom}}</a> </li>
                      @endif
                    </td>
                    <td>
                      @if($these->coencadreur_intern)
                        <li><a href="{{url('membres/'.$these->coencadreur_intern->id.'/details')}}">
                          {{$these->coencadreur_intern->name}} {{$these->coencadreur_intern->prenom}}</a></li>
                      @endif
                      @if($these->contact)
                        <li><a href="{{url('contacts/'.$these->contact->id.'/details')}}">
                          {{$these->contact->nom}} {{$these->contact->prenom}}</a></li>
                      @endif
                      </td>
                    <td>{{$these->date_soutenance}}</td>
                    <td>

                      <form action="{{ url('theses/'.$these->id)}}" method="post">

                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                      <a href="{{ url('theses/'.$these->id.'/details')}}" class="btn btn-info">
                        <i class="fa fa-eye"></i>
                      </a>
                      @if(Auth::id() == $these->user->id || Auth::user()->role->nom == 'admin' )
                      <a href="{{ url('theses/'.$these->id.'/edit')}}" class="btn btn-default">
                        <i class="fa fa-edit"></i>
                      </a>
                      @endif
                       @if(Auth::id() != $these->user->id && Auth::user()->role->nom != 'membre' )
                      <!-- <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash-o"></i>
                      </button> -->

                       <a href="#supprimer{{ $these->id }}Modal" role="button" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                      <div class="modal fade" id="supprimer{{ $these->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="supprimer{{ $these->id }}ModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                    <!--   <h5 class="modal-title" id="supprimer{{ $these->id }}ModalLabel">Supprimer</h5> -->
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body text-center">
                                      Voulez-vous vraiment effectuer la suppression ?
                                  </div>
                                  <div class="modal-footer">
                                      <form class="form-inline" action="{{ url('theses/'.$these->id)}}"  method="POST">
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
                  @endif
                  @endforeach
                 </tbody>
                <tfoot>
                <tr>
                  <th>Titre</th>
                  <th>Sujet</th>
                  <th>Doctorant</th>
                  <th>Encadreur</th>
                  <th>CoEncadreur</th>
                  <th>Date_Soutenance</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

      </div>

    </div>

 @endsection
