@extends('layouts.master')

@section('title','LRI | Erreur 500')

@section('header_page')

      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> dashboard</a></li>
        <li><a href="{{url('theses')}}">Thèses</a></li>
        <li class="active">500 error</li>
      </ol>

@endsection

@section('asidebar')

@endsection

@section('content')

<div class="error-page">

  <br><br><br><br><br><br>
        <h2 class="headline text-red">500</h2>

        <div class="error-content">
          <h3><i class="fa fa-warning text-red"></i> Oops! Something went wrong.</h3>

        </div>
      </div>
      <!-- /.error-page -->


@endsection
