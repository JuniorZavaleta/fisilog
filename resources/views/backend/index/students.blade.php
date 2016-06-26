@extends('backend.layout.base')

@section('content')

<div class="row">
   <div class="panel panel-primary">
     <!-- Default panel contents -->
      <div class="panel-heading">
         <h2>Clases del ciclo</h2>
      </div>
     <!-- Table -->
     <table class="table table-striped">
       <thead>
           <tr>
               <th>Nombre</th>
               <th>Grupo</th>
               <th>Horario</th>
               <th>Aula</th>
               <th>Acciones</th>
           </tr>
       </thead>
       <tbody>
           @foreach($classes as $class)
           <tr>
              <td>{{ $class->getProfessorFullName() }}</td>
              <td>{{ $class->getGroupNumber() }}</td>
              <td>{{ $class->getSchedule() }}</td>
              <td>{{ $class->getClassRoomName() }}</td>
              <td>
                 <a href="{{ route('classes.show', ['class' => $class->getId()]) }}"><i class="fa fa-eye fa-fw" aria-hidden="true"></i></a>
              </td>
           </tr>
           @endforeach
       </tbody>
     </table>
   </div>
</div>

@endsection