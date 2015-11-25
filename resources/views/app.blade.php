<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href={{asset('css/bootstrap.min.css')}}>
    <link rel="stylesheet" type="text/css" href={{asset('css/font-awesome.min.css')}}>

    <!-- Scripts -->
    {!! Html::script('js/jquery-1.11.3.min.js') !!}
    {!! Html::script('js/bootstrap.min.js') !!}
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">FisiLog</a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="/">Home</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        @if (Auth::guest())
          <li><a href="{{route('auth.login')}}">Iniciar Sesión</a></li>
          <li><a href="{{route('user.register.index')}}">Registrarse</a></li>
        @else
          <li><a href="#">{{ Auth::user()->name }}</a></li>
          <li><a href="{{route('auth.logout')}}">Cerrar Sesión</a></li>
        @endif
        </ul>
      </div>
    </div>
  </nav>
    @if (Session::has('errors'))
      <div class="container">
        <div class="alert alert-warning" role="alert">
          <ul>
            <strong>Oops! Something went wrong : </strong>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      </div>
    @endif
    <input type="hidden" value="{{URL::to('/')}}" id="base_url">
    @yield('content')
</body>
</html>  