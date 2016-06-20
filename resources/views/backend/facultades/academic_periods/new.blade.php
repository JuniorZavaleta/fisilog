@extends('backend.layout.base')

@section('content')

<div class="row">
   <div class="col-xs-12">
      <h2>Registrar Periodo Academico para {{ $facultad->getName() }}</h2>
   </div>
</div>

<style type="text/css">
   $('#date_datepicker').bootstrapDP({
      todayBtn: "linked",
      autoclose: true,
      format: 'dd/mm/yyyy'
   });
</style>

@include('backend.show_errors')

<div class="row">
   <form class="form-horizontal" action="{{ route('facultades.academic_periods.store', ['facultad' => $facultad->getId() ]) }}" method="POST">
      {!! csrf_field() !!}

      <div class="form-container">

         <!-- Start nombre -->
         <div class="form-group">

            <div class="col-xs-3 col-xs-offset-1 col-sm-2">
               <label class="control-label">Nombre</label>
            </div>

            <div class="col-xs-6 col-sm-8 col-lg-6">
               <input type="text" class="form-control" name="name" placeholder="Ingrese el nombre del periodo academico" value="{{ old('name') }}">
            </div>

         </div>
         <!-- End nombre -->

         <!-- Start fecha de inicio del periodo -->
         <div class="form-group">

            <div class="col-xs-3 col-xs-offset-1 col-sm-2">
               <label class="control-label">Fecha de Inicio</label>
            </div>

            <div class="col-xs-6 col-sm-8 col-lg-6">
               <input type="text" class="form-control" id="date_datepicker" name="start_date" placeholder="Ingrese la fecha de inicio del periodo academico" value="{{ old('start_date') }}">
            </div>

         </div>
         <!-- End fecha de inicio de periodo -->

         <!-- Start fecha de inicio del periodo -->
         <div class="form-group">

            <div class="col-xs-3 col-xs-offset-1 col-sm-2">
               <label class="control-label">Fecha de Fin</label>
            </div>

            <div class="col-xs-6 col-sm-8 col-lg-6">
               <input type="text" class="form-control" id="date_datepicker" name="end_date" placeholder="Ingrese la fecha de fin del periodo academico" value="{{ old('end_date') }}">
            </div>

         </div>
         <!-- End fecha de inicio de periodo -->

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