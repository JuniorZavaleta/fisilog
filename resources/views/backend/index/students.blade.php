@extends('backend.layout.base')

@section('content')

<div class="row">
   <div class="panel panel-primary">
     <!-- Default panel contents -->
      <div class="panel-heading">
         <h2>Clases del dia</h2>
      </div>
     <!-- Table -->
     <table class="table table-striped">
       <thead>
           <tr>
               <th>Nombre</th>
               <th>Grupo</th>
               <th>Horario</th>
               <th>Aula</th>
               <th>Estado</th>
           </tr>
       </thead>
       <tbody>
           @foreach($classes as $class)
           <tr>
              <td>{{ '' }}</td>
              <td>{{ $class->getGroupNumber() }}</td>
              <td>{{ $class->getSchedule() }}</td>
              <td>{{ $class->getClassRoomName() }}</td>
              <td>{{ '' }}</td>
           </tr>
           @endforeach
       </tbody>
     </table>
   </div>
</div>

@endsection