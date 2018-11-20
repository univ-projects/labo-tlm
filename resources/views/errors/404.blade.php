@extends('layouts.master')

@section('title','LRI | Erreur 404')

@section('header_page')

      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> dashboard</a></li>
        <li class="active">404 error</li>
      </ol>

@endsection

@section('asidebar')

@endsection

@section('content')

<div class="error-page">

<br><br><br><br><br><br>
        <h2 class="headline text-yellow"> 404</h2>

        <div class="error-content">
          <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>

        </div>
        <!-- /.error-content -->
      </div>


@endsection
