@extends('app')
@section('content')
<title>Registro de asistencia</title>
<style type="text/css">
  #view-student {
    margin-top: 20px;
  }
  .form-group {
    margin-top: 6.5px;
  }
  .error-message {
    color: red;
    font-size: 1em;
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
  <div class="col-md-6">
    {!! Form::token() !!}
    <div class="row form-group">
      <div class="col-sm-4">
        <label class="control-label">Tipo de documento</label>
      </div>
      <div class="col-sm-6">
        <select name="document_type" class="form-control" id="document_type">
          <option value="0" selected>Seleccione un tipo de Documento</option>
          @foreach($document_types as $document_type)
            <option value="{{$document_type->getId()}}">{{$document_type->getName()}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="row form-group">
      <div class="col-sm-4">
        <label class="control-label">Número de Documento</label>
      </div>
      <div class="col-sm-6">
        {!! Form::text('document_code', null ,['id'=>'document_code', 'class'=>'form-control','placeholder'=>'Ingrese el número de documento']) !!}
      </div>
    </div>
    <div class="row form-group">
      <div class="col-sm-4">
        <button class="btn btn-primary" id="button_pre_register">Registrar asistencia</button>
      </div>
      <div class="col-sm-3">
        <button class="btn btn-success" id="button_register">Confirmar</button>
      </div>
      <div class="col-sm-3">
        <button class="btn btn-danger" id="button_cancel">Cancelar</button>
      </div>
    </div>
    <div class="row">
      <label class="error-message" id="response_error" hidden></label>
    </div>
  </div>
  <div class="col-md-6" id="student_data" hidden>
    <p><label>Foto del estudiante</label></p>
    <img id="student_photo" src="" height="360px">
  </div>
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