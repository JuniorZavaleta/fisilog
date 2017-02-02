@extends('backend.layout.base')

@section('content')

<div class="row">
  <div class="col-xs-12">
    <h2>Lista de EAPs</h2>
  </div>
</div>

@if (session('message'))
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
      <th>Facultad</th>
      <th>Código</th>
      <th>Acciones</th>
    </thead>
    <tbody>
    @foreach ($eaps as $eap)
      <tr>
        <td>{{ $eap->name }}</td>
        <td>{{ $eap->facultad_name }}</td>
        <td>{{ $eap->code }}</td>
        <td>
          <a href="{{ route('eaps.edit', ['eap' => $eap->id ]) }}" title="Editar"><i class="fa fa-pencil-square-o fa-fw"></i></a>
          <a href="{{ route('eaps.academic_plans.index', ['eap' => $eap->id ]) }}" title="Planes de Estudio"><i class="fa fa-bars fa-fw"></i></a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>

<div class="row">
  <div class="form-group">
    <a href="{{ route('eaps.create') }}" class="btn btn-success">Registrar nueva eap</a>
  </div>
</div>

@endsection
