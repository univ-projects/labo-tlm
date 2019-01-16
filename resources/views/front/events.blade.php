@extends('layouts.front')

@section('title','Evenements')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.css">
<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="{{ asset('labo/bower_components/fullcalendar/dist/stylecalendar.css') }}">







    <div class="page-head" style="    background-image:
            linear-gradient(to right bottom,
             rgba(105, 172, 199, 0.2),
             rgba(11, 125, 218, 0.8)),
              url({{asset('images/images/img/events.jpg')}});


            background-size:cover;">
      <div class="container">
        <h2 class="page-title">Evénements</h2>
        <small>Suivez tout les événement du laboratoire de recherche Tlemcen</small>
      </div>
    </div>

    <main class="main-content" style="height:800px">
      <div class="fullwidth-block">

          <div class="site-header-cal autocomplete">
            <div class="input-wrapper">
              <input type="text" placeholder="Rechercher..." class="search-field">
                <span class="close">Annuler</span>

              <div class="focus-background"></div>
            </div>
             <div class="dialog">
            </div>

          </div>


          <div id='calendar'></div>

          <div id="calendar-popup">

            <!-- <form id="event-form">
               <div class='calander_popip_title'><i class="fa fa-calendar" aria-hidden="true"></i>
              Ajouter événement</div>
              <ul>
                <li>
                  <label for="event-start"><i class="fa fa-bell-o" aria-hidden="true"></i>

          Du</label>
                  <input id="event-start"  class='form-control' type="datetime-local" name="start"/>
                </li>
                <li>
                  <label for="event-end"><i class="fa fa-bell-slash" aria-hidden="true"></i>

          Au</label>
                  <input id="event-end"  class='form-control' type="datetime-local" name="end"/>
                </li>
                <li>
                  <label for="event-title"><i class="fa fa-calendar-minus-o" aria-hidden="true"></i>
          Evénement</label>
                  <input id="event-title"  class='form-control' type="text" name="title"/>
                </li>
                <li>
                  <label for="event-location"><i class="fa fa-map-marker" aria-hidden="true"></i>
          Lieu</label>
                  <input id="event-location"   class='form-control' type="text" name="location"/>
                </li>
                <li>
                  <label for="event-details"><i class="fa fa-info-circle" aria-hidden="true"></i>
          Description</label>
                  <textarea id="event-details"  class='form-control' name="details"></textarea>
                </li>
                <div class="button">
                  <input type="submit"  class='form-control submit_btn'/>
                </div>
              </ul>
            </form> -->

            <div id="event">
              <header></header>
              <ul>
              <li class="start-time">
                <p>
            Commence à</p>
                  <time></time>
                </li>
                 <li class="end-time">
                <p>
           Termine à</p>
                  <time></time>
                </li>
                <li>
                  <p>
                    <i class="fa fa-map-marker" aria-hidden="true"></i>Lieu</p>
          <p class="location"></p>
                </li>
                <li>
                  <p><i class="fa fa-info" aria-hidden="true"></i>
          Details:</p>
                  <p class="details"></p>
                </li>
              </ul>

            </div>

            <!-- <div class="prong">
              <div class="bottom-prong-dk"></div>
              <div class="bottom-prong-lt"></div>
            </div> -->
          </div>


          <div id='search_result'>resultats</div>


    </div>
    </main>








@endsection
