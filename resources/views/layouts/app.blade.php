<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="icon" href="{{ url('/') }}/_asset/favicon.png">

    <title>{{ config('app.name', 'e-Latihan') }}</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Styles -->

    <link rel="stylesheet" type="text/css" href="{{('/daterangepicker.css') }}" />
    <link href="{{ url('_asset/fullcalendar') }}/fullcalendar.min.css" rel="stylesheet">
    <link href="{{ url('_asset/fullcalendar') }}/fullcalendar.css " rel='stylesheet'>
    <script src='lib/jquery.min.js'></script>
    <script src='lib/moment.min.js'></script>
      <link href="{{ url('_asset/fullcalendar') }}/fullcalendar.js " rel='stylesheet'>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>
<body>



    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container" >
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <!-- <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'e-Latihan UKM') }}
                    </a> -->
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;

                        <li><a href="{{ url('/') }}">Halaman Utama</a></li>

                        <li><a href="{{ url('/catalog') }}">Jadual</a></li>

                        <li><a href="{{ url('/calendar') }}">Kalender</a></li>

                        <li class="dropdown" >
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pengguna<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu" >
                                <li>
                                    <a href="{{ url('/tempahan') }}">Tempahan</a></li>
                                    </ul>



                        <li class="dropdown" >
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Penganjur <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu" >
                                <li><a href="{{ url('/pendaftaran') }}">Pendaftaran Latihan</a></li>
                                <li><a href="{{ url('/listalltempahan') }}">Senarai Tempahan</a></li>
                                    </ul>
</li>


                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pentadbir <span class="caret"></span></a>
                              <ul class="dropdown-menu" role="menu" >

                                    <li><a href="{{ url('/listLatihan') }}">Pengesahan</a></li>
                                    <li><a href="{{ url('/janalaporan') }}">Laporan</a></li>

                                    </ul>
                                    </li>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Log Masuk</a></li>
                            <li><a href="{{ route('register') }}">Daftar Akaun</a></li>
                        @else
                            <li class="dropdown" >
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu" >
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
  <div class="row">
  <div class="col-md-12">
  @if (session()->has('message'))
  <div class="alert alert-success">
  {{ session()->get('message') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>
  @endif
  @if (isset($errors))
  @foreach ($errors->all() as $error)
  <div class="alert alert-danger">
  {{ $error }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>
  @endforeach
  @endif
  </div>
  </div>
  <div class="row">
  <div class="col-md-12">
  @yield('content')
  </div>
  </div>
  </div>
  </div>
  <!-- Scripts -->

  <footer class="footer">
   </footer>
   <!-- Scripts -->
  <!--  <script src="{{ asset('js/app.js') }}"></script> -->
  <!-- <script src="{{ asset('js/app.js') }}"></script>
  <script>
  $(document).on("click", "#confirm-modal", function(e) {
  window.console&&console.log('foo');
  var url = $(this).attr("href");
  window.console&&console.log(url);
  e.preventDefault();
  $('#destroy-form').attr('action', url);
  $('#destroy-modal').modal({ show: true });
  });
  </script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <script type="text/javascript" src="{{ ('/moment.min.js') }}"></script>
  <script type="text/javascript" src="{{ ('/daterangepicker.js') }}"></script>
  <script type="text/javascript">
  $(function () {
      $('input[name="time"]').daterangepicker({
          "minDate": moment('<?php echo date('Y-m-d G')?>'),
          "timePicker": true,
          "timePicker24Hour": true,
          "timePickerIncrement": 15,
          "autoApply": true,
          "locale": {
              "format": "DD/MM/YYYY HH:mm:ss",
              "separator": " - ",
          }
      });
  });
  </script>
  <!--  <script src="{{ url('_asset/fullcalendar/lib') }}/moment.min.js"></script> -->



       @yield('js')
</body>
</html>
