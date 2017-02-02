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
               <th>Tipo</th>
               <th>Horario</th>
               <th>Aula</th>
               <th>Acciones</th>
           </tr>
       </thead>
       <tbody>
           @foreach ($classes as $class)
           <tr>
              <td>{{ $class->professor_fullname }}</td>
              <td>{{ $class->group_number }}</td>
              <td>{{ $class->type }}</td>
              <td>{{ $class->schedule }}</td>
              <td>{{ $class->classroom_name }}</td>
              <td>
                 <a href="{{ route('classes.show', ['class' => $class->id]) }}" title="Ver datos de la clase"><i class="fa fa-eye fa-fw" aria-hidden="true"></i></a>
                 <a href="{{ route('classes.attendances.index', ['class' => $class->id]) }}" title="Ver registro de asistencias"><i class="fa fa-database fa-fw" aria-hidden="true"></i></a>
              </td>
           </tr>
           @endforeach
       </tbody>
     </table>
   </div>
</div>

@endsection