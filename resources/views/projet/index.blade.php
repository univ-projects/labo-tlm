@extends('layouts.master')

@section('title','LRI | Liste des projets')

@section('header_page')

      <h1>
        Projets
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="{{url('projets')}}">Projets</a></li>
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
              <h3 class="box-title">Liste des membres</h3>
            </div>
          </div>
          </div>

            <!-- /.box-header -->
            <div class="box-body">
               @if(Auth::user()->role->nom != 'membre' )
              <div class=" pull-right">
                <a href="{{url('projets/create')}}" type="button" class="btn btn-block btn-success btn-lg"><i class="fa fa-plus"></i> Nouveau Projet</a>
              </div>
             @endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Intitulé</th>
                  <th>Type</th>
                  <th>Partenaires</th>
                  <th>Chef</th>
                  <th>Membres</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                  @foreach($projets as $projet)
                  <tr>
                    <td>{{ $projet->intitule }}</td>
                    <td>{{ $projet->type }}</td>
                    <td>
                      <?php $samePartenaire=array(); ?>
                      @foreach ($projet->contacts as $contact)
                        @if (!in_array($contact->partenaire_contact->id,$samePartenaire))
                        <ul>
                            <li><a href="{{url('contacts/'.$contact->id.'/details')}}">{{ $contact->partenaire_contact->nom }} </a></li>
                        </ul>
                        <?php array_push($samePartenaire,$contact->partenaire_contact->id) ?>
                        @endif
                        @endforeach
                    </td>
                    <td><a href="{{url('membres/'.$projet->chef_id.'/details')}}">{{ $projet->chef->name}} {{ $projet->chef->prenom}}</a></td>
                    <td>
                      @foreach ($projet->users as $user)
                      <ul>
                          <li><a href="{{url('membres/'.$user->id.'/details')}}">{{ $user->name }} {{ $user->prenom }}</a></li>
                      </ul>
                    @endforeach

                    </td>
                    <td>


                      <form action="{{ url('projets/'.$projet->id)}}" method="post">

                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                      <a href="{{ url('projets/'.$projet->id.'/details')}} " class="btn btn-info">
                        <i class="fa fa-eye"></i>
                      </a>
                      @if(Auth::user()->role->nom == 'admin' )
                      <a href="{{ url('projets/'.$projet->id.'/edit')}}" class="btn btn-default">
                        <i class="fa fa-edit"></i>
                      </a>
                      @endif
                      @if(Auth::user()->role->nom == 'admin' )
                      <!-- <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash-o"></i>
                      </button> -->
                       <a href="#supprimer{{ $projet->id }}Modal" role="button" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                      <div class="modal fade" id="supprimer{{ $projet->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="supprimer{{ $projet->id }}ModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                    <!--   <h5 class="modal-title" id="supprimer{{ $projet->id }}ModalLabel">Supprimer</h5> -->
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body text-center">
                                      Voulez-vous vraiment effectuer la suppression ?
                                  </div>
                                  <div class="modal-footer">
                                      <form class="form-inline" action="{{ url('projets/'.$projet->id)}}"  method="POST">
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
                  <th>Intitulé</th>
                  <th>Type</th>
                  <th>Partenaires</th>
                  <th>Chef</th>
                  <th>Membres</th>
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
