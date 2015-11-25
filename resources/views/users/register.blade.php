@extends('app')
@section('content')
  <title>Registro de Usuario</title>
  <style type="text/css">
  .form-horizontal .control-label{
    text-align: left;
  }
  </style>
  {!! Html::script('js/users/register/main.js') !!}
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h2>Registrar usuario</h2>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      {!! Form::open(
        array(
          'route'=>'user.register.process',
          'class'=>'form-horizontal',
          'method'=>'POST',
          'files'=>true,
        )
      ) !!}
      <div class="col-sm-6">
        <div class="form-container">
          <div class="form-group">
            <div class="col-sm-4">
              <label class="control-label">Nombre</label>
            </div>
            <div class="col-sm-8">
              {!! Form::text('name', null ,['class'=>'form-control','placeholder'=>'Ingrese sus nombres']) !!}
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-4">
              <label class="control-label">Apellidos</label>
            </div>
            <div class="col-sm-8">
              {!! Form::text('lastname', null ,['class'=>'form-control','placeholder'=>'Ingrese sus apellidos']) !!}
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-4">
              <label class="control-label">Tipo Usuario</label>
            </div>
            <div class="col-sm-8">
              {!! Form::select('user_type',
              [ 0 => 'Seleccione el tipo de Usuario',
                1 => 'Alumno',
                2 => 'Docente',
              ] , 0,
              ['class'=>'form-control', 'id' => 'user_type']) !!}
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-4">
              <label class="control-label">Tipo de documento</label>
            </div>
            <div class="col-sm-8">
              <select name="document_type" class="form-control">
                <option value="0" selected>Seleccione un tipo de Documento</option>
                @foreach($document_types as $document_type)
                  <option value="{{$document_type->getId()}}">{{$document_type->getName()}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-4">
              <label class="control-label">Número de Documento</label>
            </div>
            <div class="col-sm-8">
              {!! Form::text('document_id', null ,['class'=>'form-control','placeholder'=>'Ingrese el número de documento']) !!}
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-4">
              <label class="control-label">Telefono</label>
            </div>
            <div class="col-sm-8">
              {!! Form::text('phone', null ,['class'=>'form-control','placeholder'=>'Ingrese sus telefono']) !!}
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-4">
              <label class="control-label">E-mail</label>
            </div>
            <div class="col-sm-8">
              {!! Form::text('email', null ,['class'=>'form-control','placeholder'=>'Ingrese su e-mail']) !!}
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <div class="col-sm-3">
            <label class="control-label">Foto</label>
          </div>
          <div class="col-sm-9">
            {!! Form::file('photo', ['style'=>'width:100%']) !!}
          </div>
        </div>
        <div class="form-group student-field" hidden>
          <div class="col-sm-3">
            <label class="control-label">EAP</label>
          </div>
          <div class="col-sm-9">
            <select name="school_id" class="form-control">
              <option value="0" selected>Seleccione la EAP del alumno</option>
              @foreach($schools as $school)
                <option value="{{$school->getId()}}">{{$school->getName()}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group student-field" hidden>
          <div class="col-sm-3">
            <label class="control-label">Código</label>
          </div>
          <div class="col-sm-9">
            {!! Form::text('student_code', null ,['class'=>'form-control','placeholder'=>'Ingrese el código de alumno del estudiante']) !!}
          </div>
        </div>
        <div class="form-group student-field" hidden>
          <div class="col-sm-3">
            <label class="control-label">Año de ingreso</label>
          </div>
          <div class="col-sm-9">
            {!! Form::text('year_of_entry', null ,['class'=>'form-control','placeholder'=>'Ingrese el año de ingreso del estudiante']) !!}
          </div>
        </div>
        <div class="form-group professor-field" hidden>
          <div class="col-sm-3">
            <label class="control-label">Tipo de profesor</label>
          </div>
          <div class="col-sm-9">
            <select name="professor_type" class="form-control">
              <option value="0" selected>Seleccione el tipo de profesor</option>
              @foreach($professor_types as $id => $name)
                <option value="{{$id}}">{{$name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group professor-field" hidden>
          <div class="col-sm-3">
            <label class="control-label">Dep. Academico</label>
          </div>
          <div class="col-sm-9">
            <select name="academic_department_id" class="form-control">
              <option value="0" selected>Seleccione el Dep. Academico del profesor</option>
              @foreach($academic_departments as $academic_department)
                <option value="{{$academic_department->getId()}}">{{$academic_department->getName()}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-6">
            <button class="btn btn-primary" name="registerButton" type="submit" value="register">Registrar</button>
          </div>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@endsection