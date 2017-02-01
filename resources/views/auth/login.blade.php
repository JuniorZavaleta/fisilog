<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Iniciar Sesion</title>

  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/metisMenu.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/sb-admin-2.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

  <script src="{{ url('js/jquery-1.11.3.min.js') }}"></script>
  <script src="{{ url('js/bootstrap.min.js') }}"></script>
  <script src="{{ url('js/metisMenu.min.js') }}"></script>
  <script src="{{ url('js/sb-admin-2.js') }}"></script>
  <script src="{{ url('js/auth/login.js') }}"></script>
</head>

<body>
  <div class="container">
    <div class="row">
     <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
      <div class="login-panel panel panel-default">

        <div class="panel-heading">
          <div class="form-group">
            <div class="text-center">
              <a class="btn btn-primary" id="by_email">By Email</a>
              <a class="btn btn-default" id="by_document">By Document</a>
            </div>
          </div>
        </div>

        <div class="panel-body">
          <div class="email-field" id="withEmail">

           <form role="form" method="POST" action="{{ route('authenticate.email') }}">
            {!! csrf_field() !!}
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
              <input class="form-control" type="text" name="email" placeholder="Ingrese su e-mail">

              @if ($errors->has('email'))
              <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
              @endif
            </div>

            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
              <input class="form-control" type="password" name="password" placeholder="Ingrese su contraseña">

              @if ($errors->has('password'))
              <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
              @endif
            </div>

            <div class="form-group">
              <button class="btn btn-lg btn-success btn-block" name="submit" type="submit">Iniciar Sesión</button>
            </div>

           </form>
          </div>

          <div class="document-field" id="withDocument" hidden>
           <form role="form" method="POST" action="{{ route('authenticate.document') }}">
            {!! csrf_field() !!}
            <div class="form-group {{ $errors->has('document_type') ? ' has-error' : '' }}">
              <select name="document_type" class="form-control">
                <option value="0" selected>Seleccione un tipo de Documento</option>
                @foreach($document_types as $document_type)
                <option value="{{$document_type->getId()}}">{{$document_type->getName()}}</option>
                @endforeach
              </select>

              @if ($errors->has('document_type'))
              <span class="help-block">
                <strong>{{ $errors->first('document_type') }}</strong>
              </span>
              @endif
            </div>

            <div class="form-group {{ $errors->has('document_id') ? 'has-error' : '' }}">
              <input class="form-control" type="text" name="document_id" placeholder="Ingrese el número de documento">

              @if ($errors->has('document_id'))
              <span class="help-block">
                <strong>{{ $errors->first('document_id') }}</strong>
              </span>
              @endif
            </div>

            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
              <input class="form-control" type="password" name="password" placeholder="Ingrese su contraseña">

              @if ($errors->has('password'))
              <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
              @endif
            </div>

            <div class="form-group">
              <button class="btn btn-lg btn-success btn-block" name="submit" type="submit">Iniciar Sesión</button>
            </div>

           </form>
          </div>
         </div>
         <!-- end panel body -->
      </div>
      <!-- end login panel -->
     </div>
     <!-- end col-md-4 -->
    </div>
    <!-- end row -->
   </div>
   <!--- end container -->
</body>

</html>
