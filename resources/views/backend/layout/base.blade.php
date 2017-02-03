<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title')</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('/semantic.min.css') }}">
  <script src="{{ asset('/jquery-3.1.1.min.js') }}"></script>
  <script src="{{ asset('/semantic.min.js') }}"></script>
  <style type="text/css">
    .pusher { padding: 10px !important; }
    .pushable { height: auto; }
    #content { height: calc(100% - 42px) !important; margin-bottom: 0px !important;}
  </style>
  @stack('head')
</head>

<body>
  <div class="ui top attached menu">
    <a class="item" id="menu-button">
      <i class="sidebar icon"></i>
      Menu
    </a>
  </div>

  <div class="ui bottom attached segment pushable" id="content">
    @include('backend.layout.sidebar')

    <div class="pusher">
      <div class="ui container">
        @yield('content')
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script>
  var base_url = "{{ url('/') }}";
  $('#menu-button').click(function(){
    $('.ui.sidebar').sidebar({
      context: $('.bottom.segment')
    }).sidebar('toggle');
  });
  </script>
  @stack('scripts')
</body>
</html>
