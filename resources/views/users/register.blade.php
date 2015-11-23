<!DOCTYPE html>
<html>
<head>
  <title>Registro de Usuario</title>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/users/register/main.js"></script>
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
      <h2>Registrar usuario</h2>
    </div>
    <div class="row">
      <div class="form-container">
        {!! Form::open(
          array(
            'route'=>'user.register.process',
            'class'=>'form-horizontal',
            'method'=>'POST',
            'files'=>true,
          )
        ) !!}
        <div class="form-group">
          <div class="col-sm-2">
            <label class="control-label">Nombre</label>
          </div>
          <div class="col-sm-4">
            {!! Form::text('name', null ,['class'=>'form-control','placeholder'=>'Ingrese sus nombres']) !!}
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-2">
            <label class="control-label">Apellidos</label>
          </div>
          <div class="col-sm-4">
            {!! Form::text('lastname', null ,['class'=>'form-control','placeholder'=>'Ingrese sus apellidos']) !!}
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-2">
            <label class="control-label">Tipo Usuario</label>
          </div>
          <div class="col-sm-4">
            {!! Form::select('user_type',
            [ 0 => 'Seleccione el tipo de Usuario',
              1 => 'Alumno',
              2 => 'Docente',
            ] , 0,
            ['class'=>'form-control', 'id' => 'user_type']) !!}
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-2">
            <label class="control-label">Tipo de documento</label>
          </div>
          <div class="col-sm-4">
            <select name="document_type" class="form-control">
              <option value="0" selected>Seleccione un tipo de Documento</option>
              @foreach($document_types as $document_type)
                <option value="{{$document_type->getId()}}">{{$document_type->getName()}}</option>
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
            <label class="control-label">Telefono</label>
          </div>
          <div class="col-sm-4">
            {!! Form::text('phone', null ,['class'=>'form-control','placeholder'=>'Ingrese sus telefono']) !!}
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-2">
            <label class="control-label">E-mail</label>
          </div>
          <div class="col-sm-4">
            {!! Form::text('email', null ,['class'=>'form-control','placeholder'=>'Ingrese su e-mail']) !!}
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-2">
            <label class="control-label">Foto</label>
          </div>
          <div class="col-sm-4">
            {!! Form::file('photo', ['class'=>'form-control']) !!}
          </div>
        </div>
        <div class="form-group student-field" hidden>
          <div class="col-sm-2">
            <label class="control-label">EAP</label>
          </div>
          <div class="col-sm-4">
            <select name="school_id" class="form-control">
              <option value="0" selected>Seleccione la EAP del alumno</option>
              @foreach($schools as $school)
                <option value="{{$school->getId()}}">{{$school->getName()}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group student-field" hidden>
          <div class="col-sm-2">
            <label class="control-label">Código del alumno</label>
          </div>
          <div class="col-sm-4">
            {!! Form::text('student_code', null ,['class'=>'form-control','placeholder'=>'Ingrese el código de alumno del estudiante']) !!}
          </div>
        </div>
        <div class="form-group student-field" hidden>
          <div class="col-sm-2">
            <label class="control-label">Año de ingreso</label>
          </div>
          <div class="col-sm-4">
            {!! Form::text('year_of_entry', null ,['class'=>'form-control','placeholder'=>'Ingrese el año de ingreso del estudiante']) !!}
          </div>
        </div>
        <div class="form-group professor-field" hidden>
          <div class="col-sm-2">
            <label class="control-label">Tipo de profesor</label>
          </div>
          <div class="col-sm-4">
            <select name="professor_type" class="form-control">
              <option value="0" selected>Seleccione el tipo de profesor</option>
              @foreach($professor_types as $id => $name)
                <option value="{{$id}}">{{$name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group professor-field" hidden>
          <div class="col-sm-2">
            <label class="control-label">Dep. Academico</label>
          </div>
          <div class="col-sm-4">
            <select name="academic_department_id" class="form-control">
              <option value="0" selected>Seleccione el Dep. Academico del profesor</option>
              @foreach($academic_departments as $academic_department)
                <option value="{{$academic_department->getId()}}">{{$academic_department->getName()}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-2">
            <button class="btn btn-primary" name="registerButton" type="submit" value="register">Registrar</button>
          </div>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</body>
</html>