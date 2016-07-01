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
    <div class="form-container">
      <div class="col-sm-6" style="text-align: center;">
        <button class="btn" id="btn-student">Estudiante</button>
      </div>
      <div class="col-sm-6" style="text-align: center;">
        <button class="btn" id="btn-professor">Docente</button>
      </div>
    </div>
  </div>
  <div class="row" id="view-student">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Clases</h3>
      </div>  
    <!-- Lista de clases -->
      <div class="panel-body">
        <table class="table table-hover">
        <thead>
          <th>Nombre del Curso</th>
          <th>Horario</th>
          <th>Aula</th>
          <th>Dia</th>
          <th>Marcar asistencia</th>
        </thead>
        <tbody>
          @foreach($classes as $clase)
            <tr>
              <td>{{$clase->getGroup()->getCourseOpened()->getCourse()->getName()}}</td>
              <td>{{$clase->getSchedule()->getStartHour()." - ".$clase->getSchedule()->getEndHour()}}
              <td>{{$clase->getClassRoom()->getName()}}</td>
              <td>{{$clase->getSchedule()->getDayOfTheWeek()}}</td>
              <td><a href="{{route('attendance.student.index',['clase_id'=>$clase->getId()])}}"><i class="fa fa-pencil"></i>
</a></td>
            </tr>
          @endforeach
        </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection