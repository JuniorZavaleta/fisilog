@extends('backend.layout.base')

@section('content')

<div class="row">
   <div class="col-xs-12">
      <h2>Lista de Facultades</h2>
   </div>
</div>

<div class="row">

   <table class="table">
      <thead>
         <th>Nombre</th>
         <th>Código</th>
         <th>Acciones</th>
      </thead>
      <tbody>
         @foreach($facultades as $facultad)
         <tr>
            <td>{{ $facultad->getName() }}</td>
            <td>{{ $facultad->getCode() }}</td>
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