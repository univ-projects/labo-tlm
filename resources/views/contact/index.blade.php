
@extends('layouts.master')

@section('title','LRI | Liste des contacts')

@section('header_page')
      <h1>
        contacts
        <small>Liste</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('contacts')}}">Contacts</a></li>
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
              <h3 class="box-title">Liste des contacts</h3>
            </div>

          </div>
          </div>

            <!-- /.box-header -->
            <div class="box-body">

              <div class=" pull-right">
                <a href="{{url('contacts/create')}}" type="button" class="btn btn-block btn-success btn-lg"><i class="fa fa-plus"></i> Nouveau contact</a>
              </div>

<!--
               <div>
                 <button href="{{('excel')}}">Excel</button>
               </div> -->
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                  <tr>
										<th>Partenaire</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Fonction</th>
										<th>Email</th>
										<th>Téléphone</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($contacts as $contact)
                  <tr>

										<td> <a href="partenaires/{{$contact->partenaire_id}}/details"> {{$contact->partenaire_contact->nom}} </a></td>
                    <td>{{$contact->nom}}</td>
										<td>{{$contact->prenom}}</td>
										<td>{{$contact->fonction}}</td>
										<td>{{$contact->email}}</td>
										<td>{{$contact->num_tel}}</td>



                    <td>
                      <div class="btn-group">

                        <form action="{{ url('contacts/'.$contact->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}

                            <a href="{{ url('contacts/'.$contact->id.'/details')}}" class="btn btn-info">
                              <i class="fa fa-eye"></i>
                            </a>
                            @if(Auth::user()->role->nom == 'admin' || Auth::user()->id===$contact->created_by)
                            <a href="{{url('contacts/'.$contact->id.'/edit')}}" class="btn btn-default">
                              <i class="fa fa-edit"></i>
                            </a>
                            @endif
                            @if(Auth::user()->role->nom == 'admin' || Auth::user()->id===$contact->created_by)
                            <!-- <button  type="submit" class="btn btn-danger ">
                                <i class="fa fa-trash-o"></i>
                            </button> -->

                             <a href="#supprimer{{ $contact->id }}Modal" role="button" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                             <div class="modal fade" id="supprimer{{ $contact->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="supprimer{{ $contact->id }}ModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                    <!--   <h5 class="modal-title" id="supprimer{{ $contact->id }}ModalLabel">Supprimer</h5> -->
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body text-center">
                                      Voulez-vous vraiment effectuer la suppression ?
                                  </div>
                                  <div class="modal-footer">
                                      <form class="form-inline" action="{{ url('contacts/'.$contact->id)}}"  method="POST">
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
									<th>Partenaire</th>
									<th>Nom</th>
									<th>Prénom</th>
									<th>Fonction</th>
									<th>Email</th>
									<th>Téléphone</th>
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
