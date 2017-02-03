@extends('backend.layout.base')

@section('content')

<div class="ui one column stackable page grid">
  <div class="sixteen wide mobile ten wide tablet eight wide computer column">
    <div class="ui basic segment">
      <h2>Registrar Facultad</h2>
    </div>

    @include('backend.show_errors')

    <form class="ui form" action="{{ route('facultades.store') }}" method="POST">
      {!! csrf_field() !!}

      <div class="field">
        <label class="control-label">Nombre</label>
        <input type="text" name="name" placeholder="Ingrese el nombre de la facultad" value="{{ old('name') }}">
      </div>

      <div class="field">
        <label class="control-label">Código</label>
        <input type="text" class="form-control" name="code" placeholder="Ingrese el código de la facultad" value="{{ old('code') }}">
      </div>

      <div class="ui center aligned basic segment">
         <button class="ui blue button" type="submit">Registrar</button>
      </div>
    </form>
  </div>
</div>
@endsection
