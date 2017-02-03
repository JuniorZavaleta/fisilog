@extends('backend.layout.base')

@section('content')

<script src="{{ url('js/attendances/students/main.js') }}"></script>

<div class="ui basic center aligned segment">
  <h2>Registro de Asistencia</h2>
</div>

<table class="ui compact table">
  <thead>
    <th>Nombre del Curso</th><th>Horario</th><th>Aula</th><th>Dia</th>
  </thead>
  <tbody>
    <tr>
      <td>{{ $clase->course_name }}</td><td>{{ $clase->schedule }}</td><td>{{ $clase->classroom_name }}</td><td>{{ Carbon\Carbon::now()->format('l') }}</td>
    </tr>
  </tbody>
</table>

<div class="ui form">
  <div class="ui grid">
    <div class="eight wide column">
      <div class="two fields">
        <div class="field">
          {{ csrf_field() }}
          <label>Tipo de documento</label>
          <select name="document_type" id="document_type">
            @foreach ($document_types as $document_type)
            <option value="{{ $document_type->id }}">{{ $document_type->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="field">
          <label class="control-label">Número de Documento</label>
          <input class="form-control" type="text" name="document_code" id="document_code" placeholder="Ingrese el número de documento">
        </div>
      </div>

      <div class="field">
        <a class="ui blue button" id="button_pre_register">Registrar asistencia</a>
        <a class="ui green button" id="button_register">Confirmar</a>
        <a class="ui red button" id="button_cancel">Cancelar</a>
      </div>
    </div>

    <div class="eight wide column" id="student_data" hidden>
      <p><label>Foto del estudiante</label></p>
      <img class="ui image" id="student_photo" src="" height="200px">
    </div>
  </div>
</div>

<div class="ui basic segment">
  <h3 class="panel-title">Alumnos</h3>
</div>

<script type="text/javascript">
  var student_ids = new Array();
</script>

<!-- Lista de alumnos -->
<div class="panel-body">
  <table class="ui compact table">
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

@endsection
