@extends('backend.layout.base')

@section('content')

<div class="row">
   <div class="col-xs-12">
      <h2>Asistencia de las Sesiones de 'X'</h2>
   </div>
</div>

<div class="row">

   <table class="table">
      <thead>
         <th>#</th>
         <th>Fecha</th>
         <th>Estado de la sesion</th>
         <th>Asistencia</th>
         <th>Hora de registro</th>
         <th>Acciones</th>
      </thead>
      <tbody>
         @for($i = 0; $i < count($attendances) ; $i++)
         <tr>
            <td>{{ ($i+1) }}</td>
            <td>{{ $attendances[$i]->getSessionClass()->getSessionDate() }}</td>
            <td>{{ $attendances[$i]->getSessionClass()->getStatus() }}</td>
            <td>{{ $attendances[$i]->verified ? 'Asistio' : 'No Asistio'}}</td>
            <td>{{ $attendances[$i]->getRegisterTime() }}</td>
            <td></td>
         </tr>
         @endfor
      </tbody>
   </table>

</div>

@endsection