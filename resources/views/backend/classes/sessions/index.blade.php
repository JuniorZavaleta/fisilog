@extends('backend.layout.base')

@section('content')

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

   .success-message {
      color: green;
      font-size: 1em;
   }
</style>

{!! Html::script('js/attendances/students/main.js') !!}

<div class="row" style="text-align: center;">
   <h2>Registro de Asistencia</h2>
</div>

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
            <td>{{ $clase->getCourseName() }}</td>
            <td>{{ $clase->getSchedule() }}</td>
            <td>{{ $clase->getClassRoomName() }}</td>
            <td>{{ $clase->getDayOfTheWeek() }}</td>
         </tr>
    </tbody>
    </table>
</div>

<div class="row">
   <div class="col-md-6">
      {!! Form::token() !!}
      <div class="form-group">

         <label class="control-label">Tipo de documento</label>

         <select name="document_type" class="form-control" id="document_type">
            <option value="0" selected>Seleccione un tipo de Documento</option>
         @foreach($document_types as $document_type)
            <option value="{{ $document_type->getId() }}">{{ $document_type->getName() }}</option>
         @endforeach
         </select>

      </div>

      <div class="form-group">

         <label class="control-label">Número de Documento</label>

         {!! Form::text('document_code', null ,['id'=>'document_code', 'class'=>'form-control','placeholder'=>'Ingrese el número de documento']) !!}
      </div>

      <div class="form-group">

         <a class="btn btn-primary" id="button_pre_register">Registrar asistencia</a>

         <a class="btn btn-success hidden" id="button_register">Confirmar</a>

         <a class="btn btn-danger hidden" id="button_cancel">Cancelar</a>

      </div>

      <div class="form-group">
         <label class="error-message" id="response_error" hidden></label>
      </div>

      <div class="form-group">
         <label class="success-message" id="response_success" hidden>Asistencia registrada correctamente.</label>
      </div>

   </div>

   <div class="col-md-6" id="student_data" hidden>
      <p><label>Foto del estudiante</label></p>
      <img id="student_photo" src="" height="360px">
   </div>

</div>

<div class="row">
   <div class="panel panel-green">
      <div class="panel-heading">
         <h3 class="panel-title">Alumnos</h3>
      </div>
      <!-- Lista de alumnos -->
      <div class="panel-body">
      @foreach($students as $student)
      <p>{{ $student->getName() }}</p>
      @endforeach
      </div>
   </div>
</div>

@endsection