@extends('app')
@section('content')
    <title>Iniciar Sesión</title>
    <script type="text/javascript" src="js/users/login/main.js"></script>
    <style type="text/css">
    .padding-50 {
      padding: 50px;
    }
    </style>
      <div class="container">
        <div class="row">
          <h3 align="center">Seleccione una opción para iniciar sesión</h3>
        </div>

        <div class="form-group" align="left">
          <div class="col-sm-6 padding-50"  style="text-align:right">
            <button class="btn btn-primary" id="email_type" name="withEmailButton" type="submit" value="loginWithEmail">Iniciar Sesión con Email</button>
          </div>
          <div class="col-sm-6 padding-50" style="text-align:left">
            <button class="btn btn-primary" id="document_type" name="withDocumentButton" type="submit" value="loginWithDocument">Iniciar Sesión con Documento</button>
          </div>
        </div>

        <div class="container email-field" id="withEmail" hidden >
          {!! Form::open(array('route'=>'auth.login', 'class'=>'form-horizontal', 'method'=>'POST')) !!}

          <div class="form-group">
            <div class="col-sm-4">
              <label class="control-label">E-Mail</label>
            </div>
            <div class="col-sm-6">
              {!! Form::text('email', null ,['class'=>'form-control','placeholder'=>'Ingrese su e-mail']) !!}
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-4">
              <label class="control-label">Contraseña</label>
            </div>
            <div class="col-sm-6">
              {!! Form::password('password',['class'=>'form-control','placeholder' =>'Ingrese su contraseña']) !!}
            </div>     
          </div>

          <div class="form-group">
            <div class="col-sm-4">
              <button class="btn btn-primary" name="submit" type="submit">Iniciar Sesión</button>
            </div>
          </div>

          {!! Form::close() !!}
        </div> 

          <div class="container document-field" id="withDocument" hidden>
            {!! Form::open(array('route'=>'auth.login', 'class'=>'form-horizontal', 'method'=>'POST')) !!}

            <div class="form-group">
              <div class="col-sm-4">
              <label class="control-label">Tipo de documento</label>
            </div>

            <div class="col-sm-6">
              <select name="document_type" class="form-control">
                <option value="0" selected>Seleccione un tipo de Documento</option>
              </select>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-4">
                <label class="control-label">Número de Documento</label>
              </div>
              <div class="col-sm-6">
                {!! Form::text('document_id', null ,['class'=>'form-control','placeholder'=>'Ingrese el número de documento']) !!}
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-4">
                <label class="control-label">Contraseña</label>
              </div>
              <div class="col-sm-6">
                {!! Form::password('password',['class'=>'form-control','placeholder' =>'Ingrese su contraseña']) !!}
              </div>     
            </div>

            <div class="form-group">
              <div class="col-sm-4">
                <button class="btn btn-primary" name="submit" type="submit">Iniciar Sesión</button>
              </div>
            </div>

            {!! Form::close() !!}
             </div> 
      </div>
@endsection