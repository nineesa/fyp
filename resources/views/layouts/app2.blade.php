<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
      <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ url('/') }}/_asset/favicon.png">

    <title>{{ config('app.name') }} - {{ $page_title or ''}}</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <!-- Custom styles for this template -->
    <!-- <link href="{{ url('_asset/css') }}/style.css" rel="stylesheet"> -->

  <link rel="stylesheet" type="text/css" href="{{('/daterangepicker.css') }}" />
	<link href="{{ url('_asset/fullcalendar') }}/fullcalendar.min.css" rel="stylesheet">
  <link href="{{ url('_asset/fullcalendar') }}/fullcalendar.css " rel='stylesheet'>
  <script src='lib/jquery.min.js'></script>
  <script src='lib/moment.min.js'></script>
  <link href="{{ url('_asset/fullcalendar') }}/fullcalendar.js " rel='stylesheet'>
  <!-- <script type="text/javascript" src="/jquery.min.js"></script>
<script type="text/javascript" src="/moment.min.js"></script> -->


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a> -->
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



                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Penganjur <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu" >
                        <li><a href="{{ url('/pendaftaran') }}">Pendaftaran Latihan</a></li>
                        <li><a href="{{ url('/listalltempahan') }}">Senarai Tempahan</a></li>
                            </ul>
</li>


                <li class="dropdown" >
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pentadbir <span class="caret"></span></a>
                      <ul class="dropdown-menu" role="menu" >

                            <li><a href="{{ url('/listLatihan') }}">Pengesahan</a></li>

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





<!-- Scripts -->
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


    <!-- /container -->

	<footer class="footer">

	</footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
 	<!-- <script src="{{ url('_asset/fullcalendar/lib') }}/moment.min.js"></script> -->
  <script type="text/javascript" src="{{ ('/moment.min.js') }}"></script>
   <script type="text/javascript" src="{{ ('/daterangepicker.js') }}"></script>

	@yield('js')

  </body>
</html>
