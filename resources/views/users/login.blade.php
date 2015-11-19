@extends('app')
@section('content')
    <title>Login</title>
     <div class="container">
     <div class="row">
      <div class="col-md-7 col-md-offset-2">
       <div class="panel panel-default">
         <div class="panel-heading">Login</div>
         <div class="panel-body">
          {!! Form::open(array('route'=>'user.register.process', 'class'=>'form-horizontal', 'method'=>'POST')) !!}

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
            <button class="btn btn-primary" name="registerButton" type="submit" value="register">Iniciar Sesión</button>
          </div>
        </div>

        {!! Form::close() !!}
         </div> 
       </div>
      </div>
     </div>
    </div>
@endsection