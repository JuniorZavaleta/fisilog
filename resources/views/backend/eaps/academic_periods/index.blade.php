@extends('backend.layout.base')

@section('content')

<div class="row">
   <div class="col-xs-12">
      <h2>Lista de Periodos Academicos de {{ $facultad->getName() }}</h2>
   </div>
</div>

@if( session()->has('message') )
<div class="row">
   <div class="alert alert-success">
      {{ session('message') }}
   </div>
</div>
@endif

<div class="row">

   <table class="table">
      <thead>
         <th>Nombre</th>
         <th>Fecha de Inicio</th>
         <th>Fechad de Fin</th>
         <th>Acciones</th>
      </thead>
      <tbody>
         @foreach($academic_perios as $academic_period)
         <tr>
            <td>{{ $academic_period->getName() }}</td>
            <td>{{ $academic_period->getStartDate() }}</td>
            <td>{{ $academic_period->getEndDate()</td>
            <td>

            </td>
         </tr>
         @endforeach
      </tbody>
   </table>

</div>

@endsection