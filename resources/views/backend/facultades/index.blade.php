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
        <td>{{ $facultad->name }}</td>
        <td>{{ $facultad->code }}</td>
        <td>
          <a href="{{ route('facultades.edit', ['id' => $facultad->id ]) }}" title="Editar"><i class="fa fa-pencil-square-o fa-fw"></i></a>
          <a href="{{ route('facultades.classrooms.index', ['id' => $facultad->id ]) }}" title="Salones"><i class="fa fa-cubes fa-fw"></i></a>
        </td>
     </tr>
    @endforeach
    </tbody>
  </table>
</div>

<div class="row">
  <div class="form-group">
    <a href="{{ route('facultades.create') }}" class="btn btn-success">Registrar nuevo usuario</a>
  </div>
</div>

@endsection
