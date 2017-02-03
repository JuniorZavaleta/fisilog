@extends('backend.layout.base')

@section('content')

<div class="ui basic segment">
  <h2>Lista de Usuarios</h2>
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
         <a href="{{ route('users.documents', ['user_id' => $user->id ]) }}" title="Documentos"><i class="fa fa-list-alt fa-fw"></i></a>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>

<div class="ui center aligned basic segment">
  <a href="{{ route('users.create') }}" class="ui blue button">Registrar nuevo usuario</a>
</div>

@endsection
