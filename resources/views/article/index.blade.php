
 @extends('layouts.master')

 @section('title','LRI | Liste des articles')

@section('header_page')

      <h1>
        Articles
        <small>Liste</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Articles</a></li>
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
              <h3 class="box-title">Liste des articles</h3>
            </div>
          </div>
          </div>

            <!-- /.box-header -->
            <div class="box-body">

              <div class="pull-right">
                <a href="{{url('articles/create')}}" type="button" class="btn btn-block btn-success btn-lg"><i class="fa fa-plus"> Nouvel article</i></a>
              </div>

              <table id="example3" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Type</th>
                  <th style="width:300px">Titre</th>
                  <th>Publié par</th>
                  <th>Membres</th>
                  <th style="width:90px">Date</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($articles as $article)
                  <tr>
                    <td>{{$article->type}}</td>
                    <td>{{$article->titre}}</td>
                    <td> <a href="{{url('membres/'.$article->deposer->id.'/details')}}">
                      {{$article->deposer->name}} {{$article->deposer->prenom}}</a></td>
                    <td>
                      @foreach ($article->users as $user)
                      <ul>
                          <li><a href="{{url('membres/'.$user->id.'/details')}}">{{ $user->name }} {{ $user->prenom }}</a></li>
                      </ul>
                    @endforeach
                    @foreach ($article->contacts as $user)
                    <ul>
                        <li><a href="{{url('contacts/'.$user->id.'/details')}}">{{ $user->nom }} {{ $user->prenom }}</a>
                          <a href="{{url('partenaires/'.$user->partenaire_id.'/details')}}">(éxterne)</a>
                        </li>
                    </ul>
                    @endforeach
                    </td>
                    <td>{{$article->date}}</td>
                    <td>
                      <div class="btn-group">
                        <form action="{{ url('articles/'.$article->id)}}" method="post">

                          {{csrf_field()}}
                          {{method_field('DELETE')}}

                        <a href="{{ url('articles/'.$article->id.'/details')}}" class="btn btn-info">
                            <i class="fa fa-eye"></i>
                        </a>
                        @if(Auth::user()->role->nom == 'admin' || Auth::user()->id == $article->publicateur )
                        <a href="{{ url('articles/'.$article->id.'/edit')}}" class="btn btn-default">
                          <i class="fa fa-edit"></i>
                        </a>
                        @endif
                        @if( Auth::user()->role->nom != 'membre' || Auth::user()->id == $article->publicateur )
                        <!-- <button type="submit" class="btn btn-danger ">
                            <i class="fa fa-trash-o"></i>
                        </button> -->

                         <a href="#supprimer{{ $article->id }}Modal" role="button" class="btn btn-danger" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
                      <div class="modal fade" id="supprimer{{ $article->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="supprimer{{ $article->id }}ModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                    <!--   <h5 class="modal-title" id="supprimer{{ $article->id }}ModalLabel">Supprimer</h5> -->
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body text-center">
                                      Voulez-vous vraiment effectuer la suppression ?
                                  </div>
                                  <div class="modal-footer">
                                      <form class="form-inline" action="{{ url('articles/'.$article->id)}}"  method="POST">
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
                  <th>Titre</th>
                  <th>Type</th>

                  <th>Date</th>
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
