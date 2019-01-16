@extends('layouts.master')

@section('title','LRI | Modifier un stage')

@section('header_page')

      <h1>
        Stage
        <small>Nouveau</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{url('stages')}}">Evénèment</a></li>
        <li class="active">Nouveau</li>
      </ol>

@endsection

@section('asidebar')

@endsection

@section('content')



    <div class="row">
      <div class="col-xs-12">
        <div class="box">

          <div class="container col-xs-12">
            <form class="well form-horizontal" method="POST" action="{{url('stages/'. $stage->id) }}" id="contact_form" enctype="multipart/form-data">
              <input type="hidden" name="_method" value="PUT">
              {{ csrf_field() }}

              <fieldset class="row">

                <!-- Form Name -->
                <legend><center><h2><b>Modifier stage</b></h2></center></legend><br>

                <!-- Text input-->
                <center>
                    <div class="col-md-6 col-md-offset-3">

                      <div class="form-group ">
                        <label class="col-md-3 control-label">Date du stage</label>
                        <div class="col-md-9 inputGroupContainer @if($errors->get('from')) has-error @endif">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lg fa-calendar"></i></span>
                            <input type="text" class="form-control" name="from" id="event-date2" value="{{$stage->from}} A {{$stage->to}}"/>
                           </div>
                            <span class="help-block">
                                @if($errors->get('from'))
                                  @foreach($errors->get('from') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                        </div>
                      </div>


                      <div class="form-group">
                          <label class="col-md-3 control-label">Participant*</label>
                                <div class="col-md-9 inputGroupContainer @if($errors->get('participant')) has-error @endif">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lg fa-user"></i></span>
                                        <select class="form-control" style="width:100%" name="participant">
                                          @foreach($participants as $participant)
                                            @if($participant->id ==$stage->user_id)
                                              <option value="{{$participant->id}}" selected>{{$participant->name}} {{$participant->prenom}}</option>
                                            @else
                                              <option value="{{$participant->id}}" >{{$participant->name}} {{$participant->prenom}}</option>
                                            @endif

                                          @endforeach
                                        </select>
                                      </div>
                                      <span class="help-block">
                                        @if($errors->get('participant'))
                                            @foreach($errors->get('participant') as $message)
                                              <li> {{ $message }} </li>
                                            @endforeach
                                          @endif
                                        </span>
                                      </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-3 control-label">Partenaire*</label>
                                <div class="col-md-9 inputGroupContainer @if($errors->get('partenaire')) has-error @endif">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lg fa-handshake-o"></i></span>
                                        <select class="form-control" style="width:100%" name="partenaire">
                                          @foreach($partenaires as $partenaire)
                                            @if($partenaire->id ==$stage->partenaire_id)
                                                <option value="{{$partenaire->id}}">{{$partenaire->nom}}</option>
                                            @else
                                                <option value="{{$partenaire->id}}">{{$partenaire->nom}}</option>
                                            @endif

                                          @endforeach
                                        </select>
                                      </div>
                                      <span class="help-block">
                                        @if($errors->get('partenaire'))
                                            @foreach($errors->get('partenaire') as $message)
                                              <li> {{ $message }} </li>
                                            @endforeach
                                          @endif
                                        </span>
                                      </div>
                      </div>

                      <div class="form-group ">
                        <label class="col-md-3 control-label">Description *</label>
                        <div class="col-md-9 inputGroupContainer @if($errors->get('description')) has-error @endif">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lg fa-tag"></i></span>
                            <textarea name="description"  class="form-control">
                              {{$stage->description}}
                            </textarea>
                           </div>
                            <span class="help-block">
                                @if($errors->get('description'))
                                  @foreach($errors->get('description') as $message)
                                    <li> {{ $message }} </li>
                                  @endforeach
                                @endif
                            </span>
                        </div>
                      </div>










                    </div>
                </center>


              </fieldset>

              <div style="padding-top: 30px; margin-left: 35%;">
              <a href="{{url('stages')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
               <button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Valider</button>
                  </div>
            </form>
          </div>
         </div><!-- /.container -->
       </div>
      </div>

  @endsection
