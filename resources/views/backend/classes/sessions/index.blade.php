@extends('backend.layout.base')

@section('content')

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

         <a class="btn btn-success" id="button_register">Confirmar</a>

         <a class="btn btn-danger" id="button_cancel">Cancelar</a>

      </div>

   </div>

   <div class="col-md-6" id="student_data" hidden>
      <p><label>Foto del estudiante</label></p>
      <img id="student_photo" src="" height="360px">
   </div>

</div>

<div class="row">
   <div class="alert alert-success" id="response_success" hidden>
      Asistencia registrada exitosamente.
   </div>
   <div class="alert alert-danger" id="response_error" hidden>

   </div>
</div>

<div class="row">

   <div class="panel panel-green">

      <div class="panel-heading">
         <h3 class="panel-title">Alumnos</h3>
      </div>

      <script type="text/javascript">
         var student_ids = new Array();
      </script>

      <!-- Lista de alumnos -->
      <div class="panel-body">

         <table class="table">

            <thead>
               <th>Nombre</th>
               <th>Asistencia</th>
            </thead>

            <tbody>
            @foreach($students as $student)
               <tr>
                  <td>{{ $student->getName() }}</td>
                  <td id="marca_{{ $student->getId() }}">Falta</td>
               </tr>

               <script type="text/javascript">
                  student_ids.push({{ $student->getId() }});
               </script>
            @endforeach
            </tbody>

         </table>

      </div>

   </div>

</div>

@endsection