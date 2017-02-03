@extends('backend.layout.base')

@section('content')

<div class="ui basic segment">
  <h2>Lista de Facultades</h2>
</div>

@if (session('message'))
<div class="row">
  <div class="alert alert-success">
    {{ session('message') }}
  </div>
</div>
@endif


<table class="ui compact table">
  <thead>
    <th>Nombre</th>
    <th>Código</th>
    <th>Acciones</th>
  </thead>
  <tbody>
  @foreach($facultades as $facultad)
    <tr>
      <td>{{ $facultad->name }}</td>
      <td>{{ $facultad->code }}</td>
      <td>
        <a href="{{ route('facultades.edit', ['id' => $facultad->id ]) }}" title="Editar"><i class="fa fa-pencil-square-o fa-fw"></i></a>
        <a href="{{ route('facultades.classrooms', ['id' => $facultad->id ]) }}" title="Salones"><i class="fa fa-cubes fa-fw"></i></a>
      </td>
   </tr>
  @endforeach
  </tbody>
</table>

<div class="ui center aligned basic segment">
  <a href="{{ route('facultades.create') }}" class="ui blue button">Registrar nuevo usuario</a>
</div>

@endsection
