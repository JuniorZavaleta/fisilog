<!DOCTYPE html>
<html>
<head>
  <title>Registro de Documento</title>
  <link rel="stylesheet" type="text/css" href={{asset('css/bootstrap.min.css')}}>
  <script type="text/javascript" src={{asset('js/jquery-1.11.3.min.js')}}></script>
  <script type="text/javascript" src={{asset('js/bootstrap.min.js')}}></script>
  <script type="text/javascript" src={{asset('js/users/register/main.js')}}></script>
  <style type="text/css">
  .container {
    padding: 10px;
  }
  </style>
</head>
<body class="container">
  <div class="container">
    @if(count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        </ul>
      </div>
    @endif
  </div>
  <div class="container">
    <div class="row">
      <h2>Registrar nuevo documento</h2>
    </div>
    <div class="row">
      <div class="form-container">
        {!! Form::model($user, array('route'=>['user.register.document', $user->id], 'class'=>'form-horizontal', 'method'=>'POST')) !!}
        <div class="form-group">
          <div class="col-sm-2">
            <label class="control-label">Tipo de documento</label>
          </div>
          <div class="col-sm-4">
            <select name="document_type" class="form-control">
              <option value="0" selected>Seleccione un tipo de Documento</option>
              @foreach($document_types as $document_type)
                <option value="{{$document_type->id}}">{{$document_type->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-2">
            <label class="control-label">Número de Documento</label>
          </div>
          <div class="col-sm-4">
            {!! Form::text('document_id', null ,['class'=>'form-control','placeholder'=>'Ingrese el número de documento']) !!}
          </div>
        </div>
      
        <div class="form-group">
          <div class="col-sm-2">
            <button class="btn btn-primary" name="save" type="submit" value="save">Guardar</button>
          </div>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</body>
</html>