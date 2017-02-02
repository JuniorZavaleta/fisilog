@extends('backend.layout.base')

@section('content')

<div class="row">
  <div class="col-xs-12">
    <h2>Lista de Periodos Academicos de {{ $facultad->name }}</h2>
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
      <th>Fecha de Inicio</th>
      <th>Fecha de Fin</th>
      <th>Acciones</th>
    </thead>
    <tbody>
      @foreach ($academic_periods as $academic_period)
      <tr>
        <td>{{ $academic_period->name }}</td>
        <td>{{ $academic_period->start_date->format('d/m/Y') }}</td>
        <td>{{ $academic_period->end_date->format('d/m/Y') }}</td>
        <td>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection
