<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('/semantic.min.css') }}">
  <script src="{{ asset('/jquery-3.1.1.min.js') }}"></script>
  <script src="{{ asset('/semantic.min.js') }}"></script>
  <script src="{{ url('js/auth/login.js') }}"></script>
</head>

<body>
  <div class="ui one column stackable center aligned page grid">
    <div class="sixteen wide mobile ten wide tablet eight wide computer column">
      <div class="ui basic segment">
        <div class="ui equal width padded grid">
          <div class="row">
          <div class="column">
          <a class="ui fluid large primary button" id="by_email"><i class="at icon"></i>Email</a>
          </div>
          <div class="column">
            <a class="ui fluid large grey button" id="by_document"><i class="credit card alternative icon"></i> Document</a>
          </div>
          </div>
        </div>
      </div>

      <div class="email-field" id="withEmail">
        <form class="ui form" role="form" method="POST" action="{{ route('authenticate.email') }}">
          {!! csrf_field() !!}
          <div class="field {{ $errors->has('email') ? 'has-error' : '' }}">
            <input type="text" name="email" placeholder="Ingrese su e-mail">

            @if ($errors->has('email'))
            <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
          </div>

          <div class="field {{ $errors->has('password') ? 'has-error' : '' }}">
            <input type="password" name="password" placeholder="Ingrese su contraseña">

            @if ($errors->has('password'))
            <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
          </div>

          <button class="ui fluid large blue button" name="submit" type="submit">Iniciar Sesión</button>
        </form>
      </div>

      <div class="document-field" id="withDocument" hidden>
        <form class="ui form" role="form" method="POST" action="{{ route('authenticate.document') }}">
          {!! csrf_field() !!}
          <div class="field {{ $errors->has('document_type') ? ' has-error' : '' }}">
            <select name="document_type" class="form-control">
              <option value="0" selected>Seleccione un tipo de Documento</option>
                @foreach ($document_types as $document_type)
                <option value="{{ $document_type->id }}">{{ $document_type->name }}</option>
                @endforeach
            </select>

            @if ($errors->has('document_type'))
            <span class="help-block">
              <strong>{{ $errors->first('document_type') }}</strong>
            </span>
            @endif
          </div>

          <div class="field {{ $errors->has('document_id') ? 'has-error' : '' }}">
            <input type="text" name="document_id" placeholder="Ingrese el número de documento">

            @if ($errors->has('document_id'))
            <span class="help-block">
              <strong>{{ $errors->first('document_id') }}</strong>
            </span>
            @endif
          </div>

          <div class="field {{ $errors->has('password') ? 'has-error' : '' }}">
            <input class="form-control" type="password" name="password" placeholder="Ingrese su contraseña">

            @if ($errors->has('password'))
            <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
          </div>

          <button class="ui fluid large blue button" name="submit" type="submit">Iniciar Sesión</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
