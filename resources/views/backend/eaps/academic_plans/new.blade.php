@extends('backend.layout.base')

@section('content')

<div class="row">
  <div class="col-xs-12">
    <h2>Registrar Plan de Estudios para {{ $eap->name }}</h2>
  </div>
</div>

@include('backend.show_errors')

<div class="row">
  <form class="form-horizontal" action="{{ route('eaps.academic_plans.store', ['eap_id' => $eap->id ]) }}" method="POST">
    {!! csrf_field() !!}

    <div class="form-container">
      <!-- Start nombre -->
      <div class="form-group">
        <div class="col-xs-3 col-xs-offset-1 col-sm-3">
          <label class="control-label">Nombre</label>
        </div>

        <div class="col-xs-6 col-sm-8 col-lg-6">
          <input type="text" class="form-control" name="name" placeholder="Ingrese el nombre de la eap" value="{{ old('name') }}">
        </div>
      </div>
      <!-- End nombre -->

      <!-- Start año de publicacion -->
      <div class="form-group">
        <div class="col-xs-3 col-xs-offset-1 col-sm-3">
          <label class="control-label">Año de publicación</label>
        </div>

        <div class="col-xs-6 col-sm-8 col-lg-6">
          <input type="text" class="form-control" name="year_of_publication" placeholder="Ingrese el año del plan académico" value="{{ old('year_of_publication') }}">
        </div>
      </div>
      <!-- End año de publicacion -->

      <!-- Start code -->
      <div class="form-group">
        <div class="col-xs-3 col-xs-offset-1 col-sm-2">
          <div class="checkbox">
            <label>
              <input type="checkbox" name="is_active" {{ old('is_active') ? 'checked' : ''}}> ¿Está activo?
            </label>
          </div>
        </div>
      </div>
      <!-- End code -->

      <!-- Start registrar -->
      <div class="form-group">
        <div class="col-xs-6 col-xs-offset-1">
          <button class="btn btn-primary" name="registerButton" type="submit" value="register">Registrar</button>
        </div>
      </div>
      <!-- End registrar -->
    </div>
  </form>
</div>

@endsection
