@extends('backend.layout.base')

@section('content')

<div class="row">
   <div class="col-xs-12">
      <h2>Cursos - {{ $eap->getName(). ' - '. $academic_plan->getName() }}</h2>
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
         <th>Cantidad de créditos</th>
         <th>Ciclo</th>
         <th>Tipo</th>
         <th>Acciones</th>
      </thead>
      <tbody>
         @foreach($courses as $course)
         <tr>
            <td>{{ $course->getName() }}</td>
            <td>{{ $course->getQuantityOfCredits() }}</td>
            <td>{{ $course->getCiclo() }}</td>
            <td>{{ $course->getCourseTypeName() }}</td>
            <td>

            </td>
         </tr>
         @endforeach
      </tbody>
   </table>

</div>

<div class="row">
   <div class="form-group">

   </div>
</div>

@endsection