@extends('backend.layout.base')

@section('content')

<div class="row">
  <div class="col-xs-12">
    <h2>Lista de Salones - {{ $facultad->name }}</h2>
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
      <th>Acciones</th>
    </thead>
    <tbody>
      @foreach ($facultad->classrooms as $classroom)
      <tr>
        <td>{{ $classroom->name }}</td>
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
