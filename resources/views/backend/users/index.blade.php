@extends('backend.layout.base')

@section('content')

<div class="row">
  <div class="col-xs-12">
    <h2>Lista de Usuarios</h2>
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
      <th>Nombres</th>
      <th>Apellidos</th>
      <th>Email</th>
      <th>Acciones</th>
    </thead>
    <tbody>
    @foreach($users as $user)
      <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->lastname }}</td>
        <td>{{ $user->email }}</td>
        <td>
           <a href="{{ route('users.documents.index', ['user_id' => $user->id ]) }}" title="Documentos"><i class="fa fa-list-alt fa-fw"></i></a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>

<div class="row">
  <div class="form-group">
    <a href="{{ route('users.create') }}" class="btn btn-success">Registrar nuevo usuario</a>
  </div>
</div>

@endsection
