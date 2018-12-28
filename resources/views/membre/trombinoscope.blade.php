
@extends('layouts.master')

@section('title','LRI | Trombinoscope')

@section('header_page')
    <h1>
        Membres
        <small>Trombinoscope</small>
   </h1>
       <ol class="breadcrumb">
          <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li><a href="{{url('membres')}}">Membres</a></li>
          <li class="active">Trombinoscope</li>
        </ol>
@endsection

@section('asidebar')

@endsection

@section('content')


                <legend><center><h2><b>TROMBINOSCOPE</b></h2></center></legend><br>
                <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-lg fa-flask"></i></span>
                          <select name="membres2_labo_select" class="form-control membres2_labo_select">
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
    <div class="row">
      <div class="col-md-12">
        <div style="padding-top: 30px" id="membres2_table">

         @foreach($membres as $membre)
            <div class="col-md-2 col-sm-4 col-xs-6" style="padding-top: 30px;" >

               <a href="{{url('membres/'.$membre->id.'/details')}}">
                <img style="height: 200px width:200px; " class="img-thumbnail img-responsive img-circle" src="{{asset($membre->photo)}}" alt="User profile picture" title="{{($membre->name)}} {{($membre->prenom)}}"></a>

            </div>
        @endforeach

        </div>
      </div>
    </div>
    @endsection
