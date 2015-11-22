@extends('app')
@section('content')
<title>Registro de asistencia</title>
<style type="text/css">
  #view-student {
    margin-top: 20px;
  }
</style>
<div class="container">
  <div class="row" style="text-align: center;">
    <h2>Registro de Asistencia</h2>
  </div>
</div>
<div class="container">
  <div class="row">
    <table class="table table-hover">
    <thead>
      <th>Nombre del Curso</th>
      <th>Horario</th>
      <th>Aula</th>
      <th>Dia</th>
    </thead>
    <tbody>
        <tr>
          <td>{{$class->getGroup()->getCourseOpened()->getCourse()->getName()}}</td>
          <td>{{$class->getSchedule()->getStartHour()." - ".$class->getSchedule()->getEndHour()}}</td>
          <td>{{$class->getClassRoom()->getName()}}</td>
          <td>{{$class->getSchedule()->getDayOfTheWeek()}}</td>
        </tr>
    </tbody>
    </table>
  </div>
</div>
<div class="container">
  {!! Form::open(array('route'=>'user.register.process', 'class'=>'form-horizontal', 'method'=>'POST')) !!}
  <div class="form-group">
    <div class="col-sm-2">
      <label class="control-label">Tipo de documento</label>
    </div>
    <div class="col-sm-4">
      <select name="document_type" class="form-control">
        <option value="0" selected>Seleccione un tipo de Documento</option>
      </select>
    </div>
    <div class="col-sm-2">
      <label class="control-label">Número de Documento</label>
    </div>
    <div class="col-sm-4">
      {!! Form::text('document_id', null ,['class'=>'form-control','placeholder'=>'Ingrese el número de documento']) !!}
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-4">
      <button class="btn btn-primary" id="Registrar asistencia">Registrar asistencia</button>
    </div>
  </div>
  {!! Form::close() !!}
</div>
<div class="container">
  <div class="row">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Alumnos</h3>
      </div>  
    <!-- Lista de clases -->
      <div class="panel-body">
      </div>
    </div>
  </div>
</div>
@endsection