@extends('backend.layout.base')

@section('content')

<div class="row">
   <div class="col-xs-12">
      <h2>Lista de EAPs</h2>
   </div>
</div>

<div class="row">

   <table class="table">
      <thead>
         <th>Nombre</th>
         <th>Facultad</th>
         <th>Código</th>
         <th>Acciones</th>
      </thead>
      <tbody>
         @foreach($eaps as $eap)
         <tr>
            <td>{{ $eap->getName() }}</td>
            <td>{{ $eap->getFacultadName() }}</td>
            <td>{{ $eap->getCode() }}</td>
            <td>

            </td>
         </tr>
         @endforeach
      </tbody>
   </table>

</div>

<div class="row">
   <div class="form-group">
      <a href="{{ route('users.create') }}" class="btn btn-success">Registrar nueva eap</a>
   </div>
</div>

@endsection