<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'e-Latihan') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>
<body>

  <div class="header_bg" >
<div class="container">

	<div class="row header">
		<div class="logo navbar-left">
      <br>
        <!-- <img src="images/VV.jpg"  width="1200" height="20%" alt="" class="img-responsive"> -->
      <!-- <h1><a href="{{ url('/') }}">e-Latihan </a></h1> -->
		</div>
		<div class="h_search navbar-right">
			<form>
        <br>
        <!-- <img src="images/logoUKM.png"  width="250" height="70" alt="" class="img-responsive"> -->
				<!-- <input type="text" class="text" value="Enter text here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter text here';}">
				<input type="submit" value="search"> -->
			</form>
		</div>
		<div class="clearfix"></div>
	</div>
  <br>

    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container" style="background-color:powderblue;">
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

                        <li class="dropdown" style="background-color:powderblue;">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pengguna<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu" style="background-color:powderblue;">
                                <li>
                                    <a href="{{ url('/tempahan') }}">Tempahan</a></li>
                                    </ul>



                        <li class="dropdown" style="background-color:powderblue;">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Penganjur <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu" style="background-color:powderblue;">
                                <li><a href="{{ url('/pendaftaran') }}">Pendaftaran Latihan</a></li>
                                <li><a href="{{ url('/listalltempahan') }}">Senarai Tempahan</a></li>
                                    </ul>
</li>


                        <li class="dropdown" style="background-color:powderblue;">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pentadbir <span class="caret"></span></a>
                              <ul class="dropdown-menu" role="menu" style="background-color:powderblue;">

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
                            <li class="dropdown" style="background-color:powderblue;">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu" style="background-color:powderblue;">
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
  </div><!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'e-Latihan UKM') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

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
            <div class="container style="background-color:powderblue;"">
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

                        <li class="dropdown" style="background-color:powderblue;">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pengguna<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu" style="background-color:powderblue;">
                                <li>
                                    <a href="{{ url('/tempahan') }}">Tempahan</a></li>
                                    </ul>



                        <li class="dropdown" style="background-color:powderblue;">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Penganjur <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu" style="background-color:powderblue;">
                                <li><a href="{{ url('/pendaftaran') }}">Pendaftaran Latihan</a></li>
                                <li><a href="{{ url('/listalltempahan') }}">Senarai Tempahan</a></li>
                                    </ul>
</li>
                                  

                        <li class="dropdown" style="background-color:powderblue;">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pentadbir <span class="caret"></span></a>
                              <ul class="dropdown-menu" role="menu" style="background-color:powderblue;">

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
                            <li class="dropdown" style="background-color:powderblue;">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu" style="background-color:powderblue;">
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
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
      $(document).on("click", "#confirm-modal", function(e) {
        window.console&&console.log('foo');
        var url = $(this).attr("href");
        window.console&&console.log(url);
        e.preventDefault();
        $('#destroy-form').attr('action', url);
        $('#destroy-modal').modal({ show: true });
      });
    </script>
</body>
</html>

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
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
      $(document).on("click", "#confirm-modal", function(e) {
        window.console&&console.log('foo');
        var url = $(this).attr("href");
        window.console&&console.log(url);
        e.preventDefault();
        $('#destroy-form').attr('action', url);
        $('#destroy-modal').modal({ show: true });
      });
    </script>
</body>
</html>
