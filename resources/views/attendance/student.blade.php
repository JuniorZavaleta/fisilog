@extends('app')
@section('content')
<title>Registro de asistencia</title>
<style type="text/css">
  #view-student {
    margin-top: 20px;
  }
</style>

{!! Html::script('js/attendances/students/main.js') !!}
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
  {!! Form::token() !!}
  <div class="form-group">
    <div class="col-sm-2">
      <label class="control-label">Tipo de documento</label>
    </div>
    <div class="col-sm-4">
      <select name="document_type" class="form-control" id="document_type">
        <option value="0" selected>Seleccione un tipo de Documento</option>
        @foreach($document_types as $document_type)
          <option value="{{$document_type->getId()}}">{{$document_type->getName()}}</option>
        @endforeach
      </select>
    </div>
    <div class="col-sm-2">
      <label class="control-label">Número de Documento</label>
    </div>
    <div class="col-sm-4">
      {!! Form::text('document_code', null ,['id'=>'document_code', 'class'=>'form-control','placeholder'=>'Ingrese el número de documento']) !!}
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-4">
      <button class="btn btn-primary" id="button_pre_register">Registrar asistencia</button>
    </div>
  </div>
</div>
<div class="container" id="student_data" hidden>
  <img id="student_photo" src="">
  <button class="btn btn-success">Confirmar</button>
  <button class="btn btn-danger">Cancelar</button>
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