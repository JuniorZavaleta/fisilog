@extends('backend.layout.base')

@section('content')

<div class="row">
   <div class="col-xs-12">
      <h2>Lista de Salones - {{ $facultad->getName() }}</h2>
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
         <th>Acciones</th>
      </thead>
      <tbody>
         @foreach($classrooms as $classroom)
         <tr>
            <td>{{ $classroom->getName() }}</td>
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