@extends('backend.layout.base')

@section('content')

<div class="row">
  <div class="col-xs-12">
    <h2>Editar EAP - {{ $eap->name }}</h2>
  </div>
</div>

@include('backend.show_errors')

<div class="row">
  <form class="form-horizontal" action="{{ route('eaps.update', ['eap' => $eap->id ]) }}" method="POST">
    {!! csrf_field() !!}

    <div class="form-container">
      <!-- Start nombre -->
      <div class="form-group">
        <div class="col-xs-3 col-xs-offset-1 col-sm-2">
          <label class="control-label">Nombre</label>
        </div>

        <div class="col-xs-6 col-sm-8 col-lg-6">
          <input type="text" class="form-control" name="name" value="{{ $eap->name }}">
        </div>
      </div>
      <!-- End nombre -->

      <!-- Start code -->
      <div class="form-group">
        <div class="col-xs-3 col-xs-offset-1 col-sm-2">
          <label class="control-label">Código</label>
        </div>

        <div class="col-xs-6 col-sm-8 col-lg-6">
          <input type="text" class="form-control" name="code" value="{{ $eap->code }}">
        </div>
      </div>
      <!-- End code -->

      <!-- Start facultad -->
      <div class="form-group">
        <div class="col-xs-3 col-xs-offset-1 col-sm-2">
          <label class="control-label">Facultad</label>
        </div>

        <div class="col-xs-6 col-sm-8 col-lg-6">
          <select class="form-control" name="facultad_id">
            <option value="">Seleccione una facultad</option>
            @foreach ($facultades as $facultad)
            <option value="{{ $facultad->id }}" {{ $eap->facultad_id == $facultad->id ? 'selected' : '' }}>{{ $facultad->name }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <!-- End facultad -->

      <!-- Start registrar -->
      <div class="form-group">
        <div class="col-xs-6 col-xs-offset-1">
          <button class="btn btn-primary" type="submit" value="register">Actualizar</button>
        </div>
      </div>
      <!-- End registrar -->
    </div>
  </form>
</div>

@endsection