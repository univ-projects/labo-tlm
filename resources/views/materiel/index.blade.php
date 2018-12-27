
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
              <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lg fa-flask"></i></span>
                        <select name="materiels_labo_select" class="form-control materiels_labo_select">
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
                    @if( Auth::user()->role->nom == 'admin')
                      <th>Laboratoire</th>
                    @endif
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="materiels_table">

                  @foreach($materiels as $materiel)
                  @if($materiel->laboratory->id==Auth::user()->equipe->labo_id)
                  <tr>
                    <td> <img src="{{asset($materiel->photo)}}" alt="{{$materiel->libelle}}" name="" width="250px" height="200px"> </td>
                    <td>{{$materiel->libelle}}</td>
                    <td style="width:250px">{{ str_limit($materiel->description, $limit = 60, $end = '...') }}</td>

                    <td style="text-align:center">
                      {{$materiel->quantity}}
                      <div class=" pull-right">
                        <a href="#add{{ $materiel->id }}Modal" role="button" data-toggle="modal"><i class="fa fa-plus margin-r-5" style="color:green"></i></a>
                        <div class="modal fade" id="add{{ $materiel->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="add{{ $materiel->id }}ModalLabel" aria-hidden="true">
                         <div class="modal-dialog">
                             <div class="modal-content">
                                 <div class="modal-header">
                                   <!--   <h5 class="modal-title" id="supprimer{{ $materiel->id }}ModalLabel">Supprimer</h5> -->
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                   </button>
                               </div>
                               <div class="modal-body text-center">
                                   <h2>Ajouter un exemplaire de ce materiel</h2>
                               </div>
                               <div class="modal-footer">
                                   <form class="well" action="{{ url('exemplaires/'.$materiel->id)}}"  method="POST" >
                                       {{ csrf_field() }}
                                        <fieldset style="text-align:center" id="{{$materiel->id}}">


                                          <div class="form-group">
                                              <label class="col-md-3 control-label">Numéro * </label>
                                                <div class="col-md-9 @if($errors->get('numero')) has-error @endif">
                                                  <div class="input-group">
                                                  <span class="input-group-addon"><i class="fa fa-lg fa-barcode"></i></span>
                                                  <input name="numero" placeholder="numéro" class="form-control"  type="text" value="{{old('numero')}}">

                                                  </div>
                                                  <span class="help-block">
                                                    @if($errors->get('numero'))
                                                      @foreach($errors->get('numero') as $message)
                                                        <li> {{ $message }} </li>
                                                      @endforeach
                                                    @endif
                                                </span>
                                                </div>
                                            </div>
                                            <!-- <input type="hidden" id="categoryId" value="{{$materiel->id}}"> -->

                                          <div class="form-group">
                                              <label class="col-md-3 control-label">Type proprietaire </label>
                                                <div class="col-md-9 selectContainer">
                                                  <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-lg fa-user"></i></span>
                                                    <select name="type_proprietaire" class="form-control proprietaire_type">
                                                      <option value="" selected></option>
                                                      <option value="membre">Membre</option>
                                                      <option value="equipe">Equipe</option>
                                                    </select>
                                                  </div>
                                                </div>
                                              </div>


                                          <div class="form-group" id="proprietaire_result{{$materiel->id}}">

                                          </div>

                                      </fieldset>



                                        <div class="row" style="text-align:center;padding-top: 30px; ">
                                             <button type="button" class="btn btn-light" data-dismiss="modal">Annuler</button>
                                             <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Ajouter</button>
                                        </div>


                                   </form>
                               </div>
                           </div>
                       </div>
                      </div>
                      </div>

                    </td>
                    @if( Auth::user()->role->nom == 'admin')
                      <td style="text-align:center">
                        <a href="{{url('laboratoires/'.$materiel->laboratory['id'].'/details')}}"> {{$materiel->laboratory['achronymes']}}</a>
                      </td>
                    @endif


                    <td>
                      <div class="btn-group">

                        <form action="{{ url('materiels/'.$materiel->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}

                            <a href="{{ url('materiels/'.$materiel->id.'/details')}}" class="btn btn-info">
                              <i class="fa fa-eye"></i>
                            </a>
                             @if(Auth::user()->role->nom == 'admin' || Auth::user()->role->nom == 'directeur')
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
                          


                        </form>
                    </div>
                    </td>
                  </tr>
                  @endif
                  @endforeach

                </tbody>
                <tfoot>
                <tr>
                  <th>Photo</th>
                  <th>Libéllé</th>
                  <th>Description</th>
                  <th>Quantité</th>
                  @if( Auth::user()->role->nom == 'admin')
                    <th>Laboratoire</th>
                  @endif
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
