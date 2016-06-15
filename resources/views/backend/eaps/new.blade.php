@extends('backend.layout.base')

@section('content')

<div class="row">
   <div class="col-xs-12">
      <h2>Registrar EAP</h2>
   </div>
</div>

@include('backend.show_errors')

<div class="row">
   <form class="form-horizontal" action="{{ route('eaps.store') }}" method="POST">
      {!! csrf_field() !!}

      <div class="form-container">

         <!-- Start nombre -->
         <div class="form-group">

            <div class="col-xs-3 col-xs-offset-1 col-sm-2">
               <label class="control-label">Nombre</label>
            </div>

            <div class="col-xs-6 col-sm-8 col-lg-6">
               <input type="text" class="form-control" name="name" placeholder="Ingrese el nombre de la eap" value="{{ old('name') }}">
            </div>
         </div>
         <!-- End nombre -->

         <!-- Start code -->
         <div class="form-group">

            <div class="col-xs-3 col-xs-offset-1 col-sm-2">
               <label class="control-label">Código</label>
            </div>

            <div class="col-xs-6 col-sm-8 col-lg-6">
               <input type="text" class="form-control" name="code" placeholder="Ingrese el código de la eap" value="{{ old('code') }}">
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
               @foreach($facultades as $facultad)
                  <option value="{{ $facultad->getId() }}" {{ old('facultad_id') == $facultad->getId() ? 'selected' : '' }}>{{ $facultad->getName() }}</option>
               @endforeach
               </select>
            </div>

         </div>
         <!-- End facultad -->

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