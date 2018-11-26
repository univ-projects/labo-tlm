@extends('layouts.master')

 @section('title','LRI | Détails évènement')

@section('header_page')
      <h1>
        Evenement
        <small>Détails</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{url('evenements')}}">Evènements</a></li>
        <li class="active">Détails</li>
      </ol>
@endsection

@section('asidebar')

@endsection

@section('content')

<style media="screen">
  .labo-users img{
    display: inline-block;
  }

  .labo-users.other-users{
    border: 1px solid #69acc7;
    border-radius: 7px;
    padding: 10px 0 10px 0;
  }
</style>


<style media="screen">


    .participe-btn {
    background: #007bff;
    border-radius: 50px;
    padding: 10px;
    color: #fff;
    text-decoration: none;


    }

    /* Hover state animation applied here */
    .participe-btn:hover {
    -webkit-animation: hover 1200ms linear 2 alternate;
    animation: hover 1200ms linear 2 alternate;
    color:#007bff;
    background: rgba(0,0,0,0);
    border:2px solid #007bff
    }

    /* Active state animation applied here */
    .participe-btn:active {
    -webkit-animation: active 1200ms ease 1 alternate;
    animation: active 1200ms ease 1 alternate;
    background: #5F9BE0;
    color:#fff;
    }


    /* Active state animation keyframes below */

    @-webkit-keyframes active {
    0% {transform: scale(1,1);}
    90% {transform: scale(.9,.88);}
    100% {transform: scale(.92,.9);}
    }

    keyframes active {
    0% {transform: scale(1,1);}
    90% {transform: scale(.9,.88);}
    100% {transform: scale(.92,.9);}
    }

    /* Hover state animation keyframes below */

    @-webkit-keyframes hover {
    0% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    1.8% { -webkit-transform: matrix3d(1.016, 0, 0, 0, 0, 1.037, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.016, 0, 0, 0, 0, 1.037, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    3.5% { -webkit-transform: matrix3d(1.033, 0, 0, 0, 0, 1.094, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.033, 0, 0, 0, 0, 1.094, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    4.7% { -webkit-transform: matrix3d(1.045, 0, 0, 0, 0, 1.129, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.045, 0, 0, 0, 0, 1.129, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    5.31% { -webkit-transform: matrix3d(1.051, 0, 0, 0, 0, 1.142, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.051, 0, 0, 0, 0, 1.142, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    7.01% { -webkit-transform: matrix3d(1.068, 0, 0, 0, 0, 1.158, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.068, 0, 0, 0, 0, 1.158, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    8.91% { -webkit-transform: matrix3d(1.084, 0, 0, 0, 0, 1.141, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.084, 0, 0, 0, 0, 1.141, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    9.41% { -webkit-transform: matrix3d(1.088, 0, 0, 0, 0, 1.132, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.088, 0, 0, 0, 0, 1.132, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    10.71% { -webkit-transform: matrix3d(1.097, 0, 0, 0, 0, 1.107, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.097, 0, 0, 0, 0, 1.107, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    12.61% { -webkit-transform: matrix3d(1.108, 0, 0, 0, 0, 1.077, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.108, 0, 0, 0, 0, 1.077, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    14.11% { -webkit-transform: matrix3d(1.114, 0, 0, 0, 0, 1.067, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.114, 0, 0, 0, 0, 1.067, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    14.41% { -webkit-transform: matrix3d(1.115, 0, 0, 0, 0, 1.067, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.115, 0, 0, 0, 0, 1.067, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    16.32% { -webkit-transform: matrix3d(1.119, 0, 0, 0, 0, 1.077, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.119, 0, 0, 0, 0, 1.077, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    18.12% { -webkit-transform: matrix3d(1.121, 0, 0, 0, 0, 1.096, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.121, 0, 0, 0, 0, 1.096, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    18.72% { -webkit-transform: matrix3d(1.121, 0, 0, 0, 0, 1.102, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.121, 0, 0, 0, 0, 1.102, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    20.02% { -webkit-transform: matrix3d(1.121, 0, 0, 0, 0, 1.113, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.121, 0, 0, 0, 0, 1.113, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    21.82% { -webkit-transform: matrix3d(1.119, 0, 0, 0, 0, 1.119, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.119, 0, 0, 0, 0, 1.119, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    24.32% { -webkit-transform: matrix3d(1.115, 0, 0, 0, 0, 1.11, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.115, 0, 0, 0, 0, 1.11, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    25.53% { -webkit-transform: matrix3d(1.113, 0, 0, 0, 0, 1.102, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.113, 0, 0, 0, 0, 1.102, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    29.23% { -webkit-transform: matrix3d(1.106, 0, 0, 0, 0, 1.089, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.106, 0, 0, 0, 0, 1.089, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    29.93% { -webkit-transform: matrix3d(1.105, 0, 0, 0, 0, 1.09, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.105, 0, 0, 0, 0, 1.09, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    35.54% { -webkit-transform: matrix3d(1.098, 0, 0, 0, 0, 1.105, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.098, 0, 0, 0, 0, 1.105, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    36.64% { -webkit-transform: matrix3d(1.097, 0, 0, 0, 0, 1.106, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.097, 0, 0, 0, 0, 1.106, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    41.04% { -webkit-transform: matrix3d(1.096, 0, 0, 0, 0, 1.099, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.096, 0, 0, 0, 0, 1.099, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    44.04% { -webkit-transform: matrix3d(1.096, 0, 0, 0, 0, 1.097, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.096, 0, 0, 0, 0, 1.097, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    51.45% { -webkit-transform: matrix3d(1.099, 0, 0, 0, 0, 1.102, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.099, 0, 0, 0, 0, 1.102, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    52.15% { -webkit-transform: matrix3d(1.099, 0, 0, 0, 0, 1.102, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.099, 0, 0, 0, 0, 1.102, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    58.86% { -webkit-transform: matrix3d(1.101, 0, 0, 0, 0, 1.099, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.101, 0, 0, 0, 0, 1.099, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    63.26% { -webkit-transform: matrix3d(1.101, 0, 0, 0, 0, 1.1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.101, 0, 0, 0, 0, 1.1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    66.27% { -webkit-transform: matrix3d(1.101, 0, 0, 0, 0, 1.101, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.101, 0, 0, 0, 0, 1.101, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    73.77% { -webkit-transform: matrix3d(1.1, 0, 0, 0, 0, 1.1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.1, 0, 0, 0, 0, 1.1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    81.18% { -webkit-transform: matrix3d(1.1, 0, 0, 0, 0, 1.1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.1, 0, 0, 0, 0, 1.1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    85.49% { -webkit-transform: matrix3d(1.1, 0, 0, 0, 0, 1.1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.1, 0, 0, 0, 0, 1.1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    88.59% { -webkit-transform: matrix3d(1.1, 0, 0, 0, 0, 1.1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.1, 0, 0, 0, 0, 1.1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    96% { -webkit-transform: matrix3d(1.1, 0, 0, 0, 0, 1.1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.1, 0, 0, 0, 0, 1.1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    100% { -webkit-transform: matrix3d(1.1, 0, 0, 0, 0, 1.1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.1, 0, 0, 0, 0, 1.1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    }

    @keyframes hover {
    0% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    1.8% { -webkit-transform: matrix3d(1.016, 0, 0, 0, 0, 1.037, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.016, 0, 0, 0, 0, 1.037, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    3.5% { -webkit-transform: matrix3d(1.033, 0, 0, 0, 0, 1.094, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.033, 0, 0, 0, 0, 1.094, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    4.7% { -webkit-transform: matrix3d(1.045, 0, 0, 0, 0, 1.129, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.045, 0, 0, 0, 0, 1.129, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    5.31% { -webkit-transform: matrix3d(1.051, 0, 0, 0, 0, 1.142, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.051, 0, 0, 0, 0, 1.142, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    7.01% { -webkit-transform: matrix3d(1.068, 0, 0, 0, 0, 1.158, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.068, 0, 0, 0, 0, 1.158, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    8.91% { -webkit-transform: matrix3d(1.084, 0, 0, 0, 0, 1.141, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.084, 0, 0, 0, 0, 1.141, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    9.41% { -webkit-transform: matrix3d(1.088, 0, 0, 0, 0, 1.132, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.088, 0, 0, 0, 0, 1.132, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    10.71% { -webkit-transform: matrix3d(1.097, 0, 0, 0, 0, 1.107, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.097, 0, 0, 0, 0, 1.107, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    12.61% { -webkit-transform: matrix3d(1.108, 0, 0, 0, 0, 1.077, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.108, 0, 0, 0, 0, 1.077, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    14.11% { -webkit-transform: matrix3d(1.114, 0, 0, 0, 0, 1.067, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.114, 0, 0, 0, 0, 1.067, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    14.41% { -webkit-transform: matrix3d(1.115, 0, 0, 0, 0, 1.067, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.115, 0, 0, 0, 0, 1.067, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    16.32% { -webkit-transform: matrix3d(1.119, 0, 0, 0, 0, 1.077, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.119, 0, 0, 0, 0, 1.077, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    18.12% { -webkit-transform: matrix3d(1.121, 0, 0, 0, 0, 1.096, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.121, 0, 0, 0, 0, 1.096, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    18.72% { -webkit-transform: matrix3d(1.121, 0, 0, 0, 0, 1.102, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.121, 0, 0, 0, 0, 1.102, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    20.02% { -webkit-transform: matrix3d(1.121, 0, 0, 0, 0, 1.113, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.121, 0, 0, 0, 0, 1.113, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    21.82% { -webkit-transform: matrix3d(1.119, 0, 0, 0, 0, 1.119, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.119, 0, 0, 0, 0, 1.119, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    24.32% { -webkit-transform: matrix3d(1.115, 0, 0, 0, 0, 1.11, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.115, 0, 0, 0, 0, 1.11, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    25.53% { -webkit-transform: matrix3d(1.113, 0, 0, 0, 0, 1.102, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.113, 0, 0, 0, 0, 1.102, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    29.23% { -webkit-transform: matrix3d(1.106, 0, 0, 0, 0, 1.089, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.106, 0, 0, 0, 0, 1.089, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    29.93% { -webkit-transform: matrix3d(1.105, 0, 0, 0, 0, 1.09, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.105, 0, 0, 0, 0, 1.09, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    35.54% { -webkit-transform: matrix3d(1.098, 0, 0, 0, 0, 1.105, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.098, 0, 0, 0, 0, 1.105, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    36.64% { -webkit-transform: matrix3d(1.097, 0, 0, 0, 0, 1.106, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.097, 0, 0, 0, 0, 1.106, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    41.04% { -webkit-transform: matrix3d(1.096, 0, 0, 0, 0, 1.099, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.096, 0, 0, 0, 0, 1.099, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    44.04% { -webkit-transform: matrix3d(1.096, 0, 0, 0, 0, 1.097, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.096, 0, 0, 0, 0, 1.097, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    51.45% { -webkit-transform: matrix3d(1.099, 0, 0, 0, 0, 1.102, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.099, 0, 0, 0, 0, 1.102, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    52.15% { -webkit-transform: matrix3d(1.099, 0, 0, 0, 0, 1.102, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.099, 0, 0, 0, 0, 1.102, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    58.86% { -webkit-transform: matrix3d(1.101, 0, 0, 0, 0, 1.099, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.101, 0, 0, 0, 0, 1.099, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    63.26% { -webkit-transform: matrix3d(1.101, 0, 0, 0, 0, 1.1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.101, 0, 0, 0, 0, 1.1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    66.27% { -webkit-transform: matrix3d(1.101, 0, 0, 0, 0, 1.101, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.101, 0, 0, 0, 0, 1.101, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    73.77% { -webkit-transform: matrix3d(1.1, 0, 0, 0, 0, 1.1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.1, 0, 0, 0, 0, 1.1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    81.18% { -webkit-transform: matrix3d(1.1, 0, 0, 0, 0, 1.1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.1, 0, 0, 0, 0, 1.1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    85.49% { -webkit-transform: matrix3d(1.1, 0, 0, 0, 0, 1.1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.1, 0, 0, 0, 0, 1.1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    88.59% { -webkit-transform: matrix3d(1.1, 0, 0, 0, 0, 1.1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.1, 0, 0, 0, 0, 1.1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    96% { -webkit-transform: matrix3d(1.1, 0, 0, 0, 0, 1.1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.1, 0, 0, 0, 0, 1.1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    100% { -webkit-transform: matrix3d(1.1, 0, 0, 0, 0, 1.1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.1, 0, 0, 0, 0, 1.1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
    }


</style>


<div class="row">
      <div class="col-md-12">
           <div class="box box-primary">

            <div class="box-header with-border">
              <h3 class="box-title">Informations</h3>
            </div>
            <!-- /.box-header -->
              <div class="box-body">

                  <div class="row" style="margin-left:25px;margin-bottom:25px">

                          <?php $exist="non" ?>
                          @foreach($participants as $participant)
                            @if($participant->id===Auth::user()->id)
                              <?php $exist="oui" ?>
                            @endif
                          @endforeach
                          @if($exist==="non")
                              <a href="{{url('evenements/'.$evenement->id.'/participe')}}" class="button back participe-btn">Participer à l'évévenement  </a>
                          @else
                              <a href="{{url('evenements/'.$evenement->id.'/pasParticipe')}}" class="button back participe-btn">Ne pas participer  </a>
                          @endif

                        <div class="labo-users col-md-8" >
                            <h4>Membres participants</h4>
                            <?php $i=0; ?>
                            @foreach($participants as $participant)
                              <a href="{{url('membres/'.$participant->id.'/details')}}"  data-toggle="tooltip" data-placement="bottom" title="{{$participant->name}} {{$participant->prenom}}">
                                <img src="{{asset($participant->photo)}}" alt="{{asset($participant->name)}}" width="50px" height="50px"  class="img img-responsive img-circle">
                              </a>
                              <?php $i++; ?>
                              @if($i>=10)
                              <?php $j=0;$list=""; ?>
                                @foreach($participants as $p)
                                  <?php $j++; ?>
                                  @if($j>10)
                                    <?php $list.="$p->name $p->prenom </br>" ?>
                                  @endif
                                @endforeach
                                @if($j>10)
                                  <span class="other-users" data-toggle="tooltip" data-placement="bottom"
                                                title="{{$list}}"
                                          data-html="true"
                                          style="color:#67acc9">
                                               + {{$j-10}} autres membres

                                  </span>
                                  @endif
                                  @break
                              @endif
                            @endforeach
                            @if($i===0)
                              <small class="label label-danger">Aucun participant pour l'instant</small>
                            @endif

                          </div>
                  </div>





                  <div class="row">
                    <div class="col-md-6">
                      <figure>
                        <img src="{{asset($evenement->photo)}}" alt="{{$evenement->titre}}" width="100%">
                      </figure>
                    </div>
                    <div class="col-md-6">
                      <h2 class="entry-title">{{$evenement->titre}}</h2>
                      <small class="date">@if($evenement->created_at==$evenement->updated_at) {{$evenement->created_at}} @else {{$evenement->updated_at}} @endif</small>
                      <p>
                        {{$evenement->contenu}}
                      </p>

                  </div>
                </div>




            <!-- /.box-body -->
            </div>

         </div><!-- /.container -->
      </div>
</div>
@endsection
