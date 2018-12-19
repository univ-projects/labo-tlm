<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/png" href="{{asset('easy.png')}}"/>
  <title>
    @yield('title')
  </title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('labo/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('labo/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('labo/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('labo/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('labo/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('labo/dist/css/skins/_all-skins.min.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('labo/bower_components/morris.js/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('labo/bower_components/jvectormap/jquery-jvectormap.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('labo/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('labo/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">

  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('labo/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{asset('labo/plugins/iCheck/all.css')}}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{asset('labo/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{asset('labo/plugins/timepicker/bootstrap-timepicker.min.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('labo/bower_components/select2/dist/css/select2.min.css')}}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flagstrap/1.0/css/flags.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header" style="position: fixed; width: 100%">
    <!-- Logo -->
    <a href="{{url('dashboard')}}" class="logo">
      @if(isset($labo->logo))
    <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="{{asset($labo->logo)}}" style="width: 50px;"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="{{asset($labo->logo)}}" style="width: 90px;height:50px"></span>
      @else
      <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src="{{asset('uploads/photo/labos/laboImgDefault.png')}}" style="width: 50px;"></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="{{asset('uploads/photo/labos/laboImgDefault.png')}}" style="width: 90px;height:50px"></span>
      @endif
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset(Auth::user()->photo)}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{Auth::user()->name}} {{Auth::user()->prenom}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset(Auth::user()->photo)}}" class="img-circle" alt="User Image">

                <p>
                {{Auth::user()->name}} {{Auth::user()->prenom}}
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ url('membres/'.Auth::user()->id.'/details')}}" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                  <!-- <a href="login_page/login.php" class="btn btn-default btn-flat">Déconnéxion</a> -->
                  <button class="btn btn-default btn-flat" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Déconnecter') }}
                  </button>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar" style="position: fixed;">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="padding-top: 10px;">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset(Auth::user()->photo)}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}} <br>  <smal>{{Auth::user()->prenom}} </smal> </p>
        </div>
      </div>

      <!-- search form -->
      <form action="/search" method="POST" class="sidebar-form" role="search">
      {{ csrf_field() }}
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Rechercher ...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- sidebar menu: : style can be found in sidebar.less -->

      <ul class="sidebar-menu" data-widget="tree">

              <li {{{ (Request::is('dashboard/*') ? 'class=active' : '') }}} {{{ (Request::is('dashboard') ? 'class=active' : '') }}}>
                <a href="{{url('dashboard')}}">
                  <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
              </li>

              @if(isset($labo->id))
              <li {{{ (Request::is('laboratoires/'.$labo->id.'/details') ? 'class=active' : '') }}}>
                <a href="{{url('laboratoires/'.$labo->id.'/details')}}">
                  <i class="fa fa-flask"></i> <span>{{$labo->achronymes}}</span>
                </a>
              </li>
              @endif

              <li class="treeview {{{ (Request::is('parametre/*') ? 'active' : '') }}} {{{ (Request::is('parametre') ? 'active' : '') }}}">
                <a href="#">
                  <i class="fa fa-gears"></i> <span>Laboratoires</span>
                  <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                </a>
                <ul class="treeview-menu">
                  <li {{{ (Request::is('labos-trombinoscope/*') ? 'class=active' : '') }}} {{{ (Request::is('labos-trombinoscope') ? 'class=active' : '') }}}>
                    <a href="{{url('labos-trombinoscope')}}"><i class="fa fa-id-badge"></i> Trombinoscope</a>
                  </li>
                  <li {{{ (Request::is('laboratoires/*') ? 'class=active' : '') }}} {{{ (Request::is('laboratoires') ? 'class=active' : '') }}}>
                    <a href="{{url('laboratoires')}}"><i class="fa fa-list"></i> Liste</a>
                  </li>
                </ul>
              </li>

              @if(Auth::user()->role->nom == 'admin' )
              <li {{{ (Request::is('materiels/*') ? 'class=active' : '') }}} {{{ (Request::is('materiels') ? 'class=active' : '') }}}>
                <a href="{{url('materiels')}}">
                  <i class="fa fa-flask"></i>
                  <span>Matériels</span>
                </a>
              </li>
              @endif

              <li class="treeview {{{ (Request::is('partenaires/*') ? 'class=active' : '') }}} {{{ (Request::is('partenaires') ? 'class=active' : '') }}} {{{ (Request::is('contacts/*') ? 'class=active' : '') }}} {{{ (Request::is('contacts') ? 'class=active' : '') }}}">
                <a href="#">
                  <i class="fa fa-handshake-o"></i> <span>Partenaires</span>
                  <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                </a>
                <ul class="treeview-menu">
                  <li {{{ (Request::is('partenaires/*') ? 'class=active' : '') }}} {{{ (Request::is('partenaires') ? 'class=active' : '') }}}>
                    <a href="{{url('partenaires')}}"><i class="fa fa-id-badge"></i> Liste des partenaires</a>
                  </li>
                  <li {{{ (Request::is('contacts/*') ? 'class=active' : '') }}} {{{ (Request::is('contacts') ? 'class=active' : '') }}}>
                    <a href="{{url('contacts')}}"><i class="fa fa-list"></i> Liste des contacts</a>
                  </li>
                </ul>
              </li>

              <!-- <li {{{ (Request::is('equipes/*') ? 'class=active' : '') }}} {{{ (Request::is('equipes') ? 'class=active' : '') }}}>
                <a href="{{url('equipes')}}">
                  <i class="fa fa-group"></i>
                  <span>Equipes</span>
                </a>
              </li> -->

              <li class="treeview {{{ (Request::is('membres/*') ? 'active' : '') }}} {{{ (Request::is('membres') ? 'active' : '') }}}{{{ (Request::is('trombinoscope/*') ? 'active' : '') }}} {{{ (Request::is('trombinoscope') ? 'active' : '') }}}">
                <a href="#">
                  <i class="fa fa-user"></i> <span>Membres</span>
                  <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                </a>
                <ul class="treeview-menu">
                  <li {{{ (Request::is('trombinoscope/*') ? 'class=active' : '') }}} {{{ (Request::is('trombinoscope') ? 'class=active' : '') }}}>
                    <a href="{{url('trombinoscope')}}"><i class="fa fa-id-badge"></i> Trombinoscope</a>
                  </li>
                  <li {{{ (Request::is('membres/*') ? 'class=active' : '') }}} {{{ (Request::is('membres') ? 'class=active' : '') }}}>
                    <a href="{{url('membres')}}"><i class="fa fa-list"></i> Liste</a>
                  </li>
                </ul>
              </li>

              <li {{{ (Request::is('theses/*') ? 'class=active' : '') }}} {{{ (Request::is('theses') ? 'class=active' : '') }}}>
                <a href="{{url('theses')}}">
                  <i class="fa fa-file-pdf-o"></i>
                  <span>Thèses</span>
                </a>
              </li>

              <li {{{ (Request::is('articles/*') ? 'class=active' : '') }}} {{{ (Request::is('articles') ? 'class=active' : '') }}}>
                <a href="{{url('articles')}}">
                  <i class="fa fa-file-text-o"></i>
                  <span>Articles</span></a>
                </li>

              <li {{{ (Request::is('projets/*') ? 'class=active' : '') }}} {{{ (Request::is('projets') ? 'class=active' : '') }}}>
                <a href="{{url('projets')}}">
                  <i class="fa fa-folder-open-o"></i>
                  <span>Projets</span>
                </a>
              </li>

              <li {{{ (Request::is('actualites/*') ? 'class=active' : '') }}} {{{ (Request::is('actualites') ? 'class=active' : '') }}}>
                <a href="{{url('actualites')}}">
                  <i class="fa fa-newspaper-o"></i>
                  <span>Actualités</span></a>
              </li>

                <li {{{ (Request::is('evenements/*') ? 'class=active' : '') }}} {{{ (Request::is('evenements') ? 'class=active' : '') }}}>
                  <a href="{{url('evenements')}}">
                    <i class="fa fa-calendar"></i>
                    <span>Evènements</span></a>
                </li>







                  @if(Auth::user()->role->nom == 'admin' || Auth::user()->role->nom == 'directeur')
                <li class="treeview {{{ (Request::is('parametre/*') ? 'active' : '') }}} {{{ (Request::is('parametre') ? 'active' : '') }}}{{{ (Request::is('trombinoscope/*') ? 'active' : '') }}} {{{ (Request::is('trombinoscope') ? 'active' : '') }}}">
                  <a href="#">
                    <i class="fa fa-user"></i> <span>Paramètres</span>
                    <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                      </span>
                  </a>
                  <ul class="treeview-menu">
                    <li {{{ (Request::is('trombinoscope/*') ? 'class=active' : '') }}} {{{ (Request::is('trombinoscope') ? 'class=active' : '') }}}>
                      <a href="{{url('trombinoscope')}}"><i class="fa fa-id-badge"></i> Rôles</a>
                    </li>
                    <li {{{ (Request::is('membres/*') ? 'class=active' : '') }}} {{{ (Request::is('membres') ? 'class=active' : '') }}}>
                      <a href="{{url('membres')}}"><i class="fa fa-list"></i> EasyLab</a>
                    </li>
                  </ul>
                </li>

                @endif
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>


   <!-- statistiques start  -->
  <div class="content-wrapper" style="padding-top: 50px">

    <!-- Content Header (Page header) -->
        <section class="content-header" >
             @yield('header_page')
         </section>

    <!-- Main content -->
    <section class="content" style="padding-top: 30px">
      <!-- Small boxes (Stat box) -->
      @yield('content')
    </section>
  </div>


  <!-- Content Wrapper. Contains page content -->

      <!-- /.row (main row) -->

  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark " style="position: fixed;">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">

        <!-- /.control-sidebar-menu -->
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>

  <div class="control-sidebar-bg"></div>
  <!-- ./wrapper -->



<!-- jQuery 3 -->
<script src="{{ asset('labo/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('labo/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('labo/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('labo/bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('labo/bower_components/morris.js/morris.min.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{asset('labo/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- bootstrap time picker -->
<script src="{{asset('labo/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>

<!-- Sparkline -->
<script src="{{ asset('labo/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('labo/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('labo/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('labo/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('labo/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('labo/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('labo/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('labo/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('labo/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('labo/bower_components/fastclick/lib/fastclick.js') }}"></script>
<script src="{{ asset('labo/bower_components/Chart.js/Chart.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('labo/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('labo/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('labo/dist/js/demo.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('labo/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('labo/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- Select2 -->
<script src="{{ asset('labo/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<!-- InputMask -->
<script src="{{ asset('labo/plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{ asset('labo/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{ asset('labo/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
<!-- date-range-picker -->
<script src="{{ asset('labo/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{ asset('labo/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{ asset('labo/plugins/iCheck/icheck.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flagstrap/1.0/js/jquery.flagstrap.js" charset="utf-8"></script>


<script>
    $('#txt').wysihtml5();
    $('#txt2').wysihtml5();

  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
    $('#datepicker2').datepicker({
      autoclose: true
    })
    $('#event-date').daterangepicker({
    timePicker: true,
    timePicker24Hour: true,

    locale: {
      format: 'YYYY-MM-DD HH:mm',
      "separator": " A ",
       "applyLabel": "Confirmer",
       "cancelLabel": "Annuler",
       "fromLabel": "De",
       "toLabel": "A",
       "customRangeLabel": "Modifier",
       "daysOfWeek": [
           "Dim",
           "Lun",
           "Mar",
           "Mer",
           "Jeu",
           "Ven",
           "Sam"
       ],
       "monthNames": [
           "Janvier",
           "Février",
           "Mars",
           "Avril",
           "Mai",
           "Juin",
           "Juillet",
           "Août",
           "Septembre",
           "Octobre",
           "Novembre",
           "Décembre"
       ],
       "firstDay": 1
    }
  });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>

<script>
  $(function () {
    $('#example1').DataTable({
      "language": {
         "lengthMenu": "afficher _MENU_ résultats",
         "zeroRecords": "Aucun résultat trouvé",
         "info": "affichage de la page _PAGE_ pour _PAGES_",
         "infoEmpty": "Aucun résultat trouvé",
         "infoFiltered": "Trier de _MAX_ résultats)",
         "search":"Recherche:",
         "paginate": {
           "previous": "Précédent",
           "next":"Suivant"
       }
     }
    });
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      "order": [ 2, 'asc' ],//    'order' => array('created'=>'DESC')
      "language": {
         "lengthMenu": "afficher _MENU_ résultats",
         "zeroRecords": "Aucun résultat trouvé",
         "info": "affichage de la page _PAGE_ pour _PAGES_",
         "infoEmpty": "Aucun résultat trouvé",
         "infoFiltered": "Trier de _MAX_ résultats)",
         "search":"Recherche:",
         "paginate": {
           "previous": "Précédent",
           "next":"Suivant"
       }
     }
    })
    $('#example3').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      "order": [ 2, 'desc' ],//    'order' => array('created'=>'DESC')
      "language": {
         "lengthMenu": "afficher _MENU_ résultats",
         "zeroRecords": "Aucun résultat trouvé",
         "info": "affichage de la page _PAGE_ pour _PAGES_",
         "infoEmpty": "Aucun résultat trouvé",
         "infoFiltered": "Trier de _MAX_ résultats)",
         "search":"Recherche:",
         "paginate": {
           "previous": "Précédent",
           "next":"Suivant"
       }
     }
    })
  })
</script>

@yield('scripts')

<script>


  // $(function () {
  //
  //
  //
  //
  //   $.ajax({
  //     type:'get',
  //     url:'/statistics',
  //     success:function(data,status){
  //        console.log(data.annee);
  //        //areaChartData.labels = data.res;
  //        var areaChartData = {
  //     labels  : data.annee,
  //     datasets: [
  //       {
  //         label               : 'Electronics',
  //         fillColor           : 'rgba(210, 214, 222, 1)',
  //         strokeColor         : 'rgba(210, 214, 222, 1)',
  //         pointColor          : 'rgba(210, 214, 222, 1)',
  //         pointStrokeColor    : '#c1c7d1',
  //         pointHighlightFill  : '#fff',
  //         pointHighlightStroke: 'rgba(220,220,220,1)',
  //         data                : data.these
  //       },
  //       {
  //         label               : 'Digital Goods',
  //         fillColor           : 'rgba(60,141,188,0.9)',
  //         strokeColor         : 'rgba(60,141,188,0.8)',
  //         pointColor          : '#3b8bba',
  //         pointStrokeColor    : 'rgba(60,141,188,1)',
  //         pointHighlightFill  : '#fff',
  //         pointHighlightStroke: 'rgba(60,141,188,1)',
  //         data                : data.article
  //       }
  //     ]
  //   }
  //
  //
  //   var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
  //   var barChart                         = new Chart(barChartCanvas)
  //   var barChartData                     = areaChartData
  //   barChartData.datasets[1].fillColor   = '#00a65a'
  //   barChartData.datasets[1].strokeColor = '#00a65a'
  //   barChartData.datasets[1].pointColor  = '#00a65a'
  //   var barChartOptions                  = {
  //     //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
  //     scaleBeginAtZero        : true,
  //     //Boolean - Whether grid lines are shown across the chart
  //     scaleShowGridLines      : true,
  //     //String - Colour of the grid lines
  //     scaleGridLineColor      : 'rgba(0,0,0,.05)',
  //     //Number - Width of the grid lines
  //     scaleGridLineWidth      : 1,
  //     //Boolean - Whether to show horizontal lines (except X axis)
  //     scaleShowHorizontalLines: true,
  //     //Boolean - Whether to show vertical lines (except Y axis)
  //     scaleShowVerticalLines  : true,
  //     //Boolean - If there is a stroke on each bar
  //     barShowStroke           : true,
  //     //Number - Pixel width of the bar stroke
  //     barStrokeWidth          : 2,
  //     //Number - Spacing between each of the X value sets
  //     barValueSpacing         : 5,
  //     //Number - Spacing between data sets within X values
  //     barDatasetSpacing       : 1,
  //     //String - A legend template
  //     legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
  //     //Boolean - whether to make the chart responsive
  //     responsive              : true,
  //     maintainAspectRatio     : true
  //   }
  //
  //   barChartOptions.datasetFill = false
  //   barChart.Bar(barChartData, barChartOptions)
  //     }
  //   });
  //
  // })

</script>


<script type="text/javascript">
$(document).ready(function(){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $('.proprietaire_type').change(function(){
    if($(this).val() != '')
    {

      var type_proprietaire = $(this).val();


      $.ajax({
        url: '/postajaxTypeProprietaire',
        type: 'POST',
                      /* send the csrf-token and the input to the controller */
          data: {_token: CSRF_TOKEN, type_proprietaire:type_proprietaire},
          dataType: 'JSON',
          success: function (data) {
                        $('#proprietaire_result').html(data);

                    }
      })
    }
    else{
      $('#proprietaire_result').html('');
    }
  });
});
</script>

<script type="text/javascript">
$(document).ready(function(){
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $('.edit_proprietaire_type').change(function(){
    if($(this).val() != '')
    {

      var type_proprietaire = $(this).val();


      $.ajax({
        url: '/postajaxTypeProprietaire',
        type: 'POST',
                      /* send the csrf-token and the input to the controller */
          data: {_token: CSRF_TOKEN, type_proprietaire:type_proprietaire},
          dataType: 'JSON',
          success: function (data) {
                        $('.edit_proprietaire_result').html(data);

                    }
      })
    }
    else{
      $('#edit_proprietaire_result').html('');
    }
  });
});
</script>

<script type="text/javascript">
$(document).ready(function(){

  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $('.partenaire_type').change(function(){
    if($(this).val() != '')
    {

      var type_partenaire = $(this).val();



      $.ajax({

        url: '/postajaxPartenaireContact',
        type: 'POST',
                      /* send the csrf-token and the input to the controller */
          data: {_token: CSRF_TOKEN, type_partenaire:type_partenaire},
          dataType: 'JSON',
          success: function (data) {
                      $('#contact_result').html(data);
                    }

      })
    }
    else{
      $('#contact_result').html('');
    }
  });
});
</script>

<script type="text/javascript">
$(document).ready(function(){

  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $('.edit_partenaire_type').change(function(){
    if($(this).val() != '')
    {

      var type_partenaire = $(this).val();



      $.ajax({

        url: '/postajaxPartenaireContact',
        type: 'POST',
                      /* send the csrf-token and the input to the controller */
          data: {_token: CSRF_TOKEN, type_partenaire:type_partenaire},
          dataType: 'JSON',
          success: function (data) {

                      $('#edit_contact_result').html(data);
                    }

      })
    }
    else{
      $('#edit_contact_result').html('');
    }
  });
});
</script>



<script type="text/javascript">
$(document).ready(function(){

  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $('.partenaire_type2').change(function(){
    if($(this).val() != '')
    {

      var type_partenaire = $(this).val();



      $.ajax({

        url: '/postajaxPartenaireContact2',
        type: 'POST',
                      /* send the csrf-token and the input to the controller */
          data: {_token: CSRF_TOKEN, type_partenaire:type_partenaire},
          dataType: 'JSON',
          success: function (data) {
                      $('#contact_result2').html(data);
                    }

      })
    }
    else{
      $('#contact_result2').html('');
    }
  });
});
</script>

<script type="text/javascript">
$(document).ready(function(){

  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $('.edit_partenaire_type2').change(function(){
    if($(this).val() != '')
    {

      var type_partenaire = $(this).val();



      $.ajax({

        url: '/postajaxPartenaireContact2',
        type: 'POST',
                      /* send the csrf-token and the input to the controller */
          data: {_token: CSRF_TOKEN, type_partenaire:type_partenaire},
          dataType: 'JSON',
          success: function (data) {
                      $('#edit_contact_result2').html(data);
                    }

      })
    }
    else{
      $('#edit_contact_result2').html('');
    }
  });
});
</script>


<script type="text/javascript">
$(document).ready(function(){

  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $('.partenaire_type3').change(function(){

    if($(this).val() != '')
    {

      var type_partenaire = $(this).val();
          alert(type_partenaire);


      $.ajax({

        url: '/postajaxPartenaireContact3',
        type: 'POST',
                      /* send the csrf-token and the input to the controller */
          data: {_token: CSRF_TOKEN, type_partenaire:type_partenaire},
          dataType: 'JSON',
          success: function (data) {
                      $('#contact_result3').html(data);
                    }

      })
    }
    else{
      $('#contact_result3').html('');
    }
  });
});
</script>


<script type="text/javascript">
$(document).ready(function(){

  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $('.edit_partenaire_type3').change(function(){
    if($(this).val() != '')
    {

      var type_partenaire = $(this).val();



      $.ajax({

        url: '/postajaxPartenaireContact3',
        type: 'POST',
                      /* send the csrf-token and the input to the controller */
          data: {_token: CSRF_TOKEN, type_partenaire:type_partenaire},
          dataType: 'JSON',
          success: function (data) {
                      $('#edit_contact_result3').html(data);
                    }

      })
    }
    else{
      $('#edit_contact_result3').html('');
    }
  });
});
</script>



<script type="text/javascript">
   $('#select-country').flagStrap();
</script>

</body>
</html>
