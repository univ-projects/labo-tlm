
@extends('layouts.master')

@section('title','LRI | Liste des materiels')

@section('header_page')
      <h1>
        Materiels
        <small>Liste</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('materiels')}}">Materiels</a></li>
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
              <h3 class="box-title">Liste des materiels</h3>
            </div>

          </div>
          </div>

            <!-- /.box-header -->
            <div class="box-body">
              @if(Auth::user()->role->nom == 'admin' )
              <div class=" pull-right">
                <a href="{{url('materiels/create')}}" type="button" class="btn btn-block btn-success btn-lg"><i class="fa fa-plus"></i> Nouveau materiel</a>
              </div>
               @endif
<!--
               <div>
                 <button href="{{('excel')}}">Excel</button>
               </div> -->
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Photo</th>
                    <th>Libéllé</th>
                    <th>Description</th>
                    <th>Quantité</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($materiels as $materiel)
                  <tr>
                    <td> <img src="{{$materiel->photo}}" alt="{{$materiel->photo}}" name="" width="250px" height="200px"> </td>
                    <td>{{$materiel->libelle}}</td>
                    <td style="width:250px">{{ str_limit($materiel->description, $limit = 60, $end = '...') }}</td>

                    <td style="text-align:center">
                      {{$materiel->quantity}}
                    </td>


                    <td>
                      <div class="btn-group">

                        <form action="{{ url('materiels/'.$materiel->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}

                            <a href="{{ url('materiels/'.$materiel->id.'/details')}}" class="btn btn-info">
                              <i class="fa fa-eye"></i>
                            </a>
                             @if(Auth::user()->role->nom == 'admin' )
                            <a href="{{url('materiels/'.$materiel->id.'/edit')}}" class="btn btn-default">
                              <i class="fa fa-edit"></i>
                            </a>
                            @endif
                            @if(Auth::user()->role->nom != 'membre' )
                            <!-- <button  type="submit" class="btn btn-danger ">
                                <i class="fa fa-trash-o"></i>
                            </button> -->

                             <a href="#supprimer{{ $materiel->id }}Modal" role="button" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                             <div class="modal fade" id="supprimer{{ $materiel->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="supprimer{{ $materiel->id }}ModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                    <!--   <h5 class="modal-title" id="supprimer{{ $materiel->id }}ModalLabel">Supprimer</h5> -->
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body text-center">
                                      Voulez-vous vraiment effectuer la suppression ?
                                  </div>
                                  <div class="modal-footer">
                                      <form class="form-inline" action="{{ url('materiels/'.$materiel->id)}}"  method="POST">
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
                            <style media="screen">

                              #affect-btn{
                                background:rgba(0,0,0,0);border-radius:10px;color:#428bca;border:1px solid #428bca
                              }
                              #affect-btn:hover{
                                background: #428bca;
                                color:#fff;
                              }
                            </style>


                            <form action="{{url('materiels/'.$materiel->id.'/edit')}}">
                                <input type="submit" value="+ Affecter" id="affect-btn"/>
                            </form>

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
                  <th>Description</th>
                  <th>Quantité</th>
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
