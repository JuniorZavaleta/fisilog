@extends('backend.layout.base')

@section('content')

<div class="row">
   <div class="col-xs-12">
      <h2>Registrar Facultad</h2>
   </div>
</div>

@include('backend.show_errors')

<div class="row">
   <form class="form-horizontal" action="{{ route('facultades.store') }}" method="POST">
      {!! csrf_field() !!}

      <div class="form-container">

         <!-- Start nombre -->
         <div class="form-group">

            <div class="col-xs-3 col-xs-offset-1 col-sm-2">
               <label class="control-label">Nombre</label>
            </div>

            <div class="col-xs-6 col-sm-4">
               <input type="text" class="form-control" name="name" placeholder="Ingrese el nombre de la facultad" value="{{ old('name') }}">
            </div>
         </div>
         <!-- End nombre -->

         <!-- Start code -->
         <div class="form-group">

            <div class="col-xs-3 col-xs-offset-1 col-sm-2">
               <label class="control-label">Código</label>
            </div>

            <div class="col-xs-6 col-sm-4">
               <input type="text" class="form-control" name="code" placeholder="Ingrese el código de la facultad" value="{{ old('code') }}">
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