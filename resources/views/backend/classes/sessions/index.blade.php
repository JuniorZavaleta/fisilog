@extends('backend.layout.base')

@section('content')

<script src="{{ url('js/attendances/students/main.js') }}"></script>

<div class="row" style="text-align: center;">
  <h2>Registro de Asistencia</h2>
</div>

<div class="row">
  <table class="table table-hover">
    <thead>
      <th>Nombre del Curso</th><th>Horario</th><th>Aula</th><th>Dia</th>
    </thead>
    <tbody>
      <tr>
        <td>{{ $clase->course_name }}</td><td>{{ $clase->schedule }}</td><td>{{ $clase->classroom_name }}</td><td>{{ Carbon\Carbon::now()->format('l') }}</td>
      </tr>
    </tbody>
  </table>
</div>

<div class="row">
  <div class="col-md-6">
    {{ csrf_field() }}
    <div class="form-group">
      <label class="control-label">Tipo de documento</label>
      <select name="document_type" class="form-control" id="document_type">
        <option value="0" selected>Seleccione un tipo de Documento</option>
        @foreach ($document_types as $document_type)
        <option value="{{ $document_type->id }}">{{ $document_type->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label class="control-label">Número de Documento</label>
      <input class="form-control" type="text" name="document_code" id="document_code" placeholder="Ingrese el número de documento">
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
        @foreach ($students as $student)
          <tr>
            <td>{{ $student->user->name }}</td>
            <td id="marca_{{ $student->id }}">Falta</td>
          </tr>
          <script type="text/javascript">
            student_ids.push({{ $student->id }});
          </script>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
