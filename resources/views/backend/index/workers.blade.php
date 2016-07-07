@extends('backend.layout.base')

@section('content')

<div class="row">
   <div class="panel panel-primary">
     <!-- Default panel contents -->
      <div class="panel-heading">
         <h2>Asistencias por verificar</h2>
      </div>
     <!-- Table -->
     <table class="table table-striped">
       <thead>
           <tr>
               <th>Docente</th>
               <th>Curso</th>
               <th>Horario</th>
               <th>Aula</th>
               <th>Acciones</th>
           </tr>
       </thead>
       <tbody>
           @foreach($classes as $class)
           <tr>
               <td>{{ $class->getProfessorFullName() }}</td>
               <td>{{ $class->getCourseName() }}</td>
               <td>{{ $class->getSchedule() }}</td>
               <td>{{ $class->getClassRoomName() }}</td>
               <td>
                 <a href="{{ route('classes.show', ['class' => $class->getId()]) }}" title="Validar asistencia"><i class="fa-check fa-fw" aria-hidden="true"></i></a>
              </td>
           </tr>
           @endforeach
       </tbody>
     </table>
   </div>
</div>

@endsection