@extends('backend.layout.base')

<link rel="stylesheet" type="text/css" href="{{ asset('css/table-results.css') }}">

@section('content')

<div class="row">
   <div class="col-xs-12">
      <h2>Buscar clase</h2>
   </div>
</div>

@include('backend.show_errors')

<div class="row">
   <input type="hidden" id="_token" value="<?php echo csrf_token(); ?>">
   <div class="col-sm-5 col-md-4 col-lg-3">

      <div class="form-container">

         <!-- Start facultad -->
         <div class="form-group">

            <select class="form-control" name="facultad_id" id="facultad">
               <option value="">Seleccione una facultad</option>
            @foreach($facultades as $facultad)
               <option value="{{ $facultad->getId() }}" {{ old('facultad_id') == $facultad->getId() ? 'selected' : '' }}>{{ $facultad->getName() }}</option>
            @endforeach
            </select>

         </div>
         <!-- End facultad -->

         <!-- Start EAP -->
         <div class="form-group">

            <select class="form-control" name="eap" id="eap">
               <option value="">Seleccione una EAP</option>
            </select>

         </div>
         <!-- End EAP -->

         <!-- Start ciclo -->
         <div class="form-group">

            <select class="form-control" name="ciclo" id="ciclo">
               <option value="-">Seleccione una ciclo</option>
            @for($i = 0; $i <= 10; $i++)
               <option value="{{ $i }}">Ciclo {{ $i }}</option>
            @endfor
            </select>

         </div>
         <!-- End ciclo -->

         <!-- Start Curso -->
         <div class="form-group">

            <select class="form-control" name="curso" id="curso">
               <option value="">Seleccione un Curso</option>
            </select>

         </div>
         <!-- End Curso -->
      </div>
      <!-- End form container -->

      <!-- Start Action buttons -->
      <div id="action-buttons">
         <button type="button" class="btn btn-danger" data-toggle="modal" id="cancel_button">Cancelar clase</button>
      </div>
      <!-- End Action buttons -->
   </div>
</div>
<div class="row">
   <!-- Start col-md-9 col-lg-9 -->
   <div class="hidden-xs ">
      <table class="table table-bordered" id="resultados">
         <thead>
            <th>Grupo</th>
            <th>Docente</th>
            <th>Dia</th>
            <th>Horario</th>
            <th>Tipo</th>
            <th>Aula</th>
            <th>Estado</th>
            <th>Tiempo tolerancia</th>
         </thead>
         <tbody>

         </tbody>
      </table>
   </div>
   <div class="visible-xs" id="resultados-movil">

   </div>
   <!-- End col-sm-7 col-md-8 col-lg-9 -->
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-cancel">
   <div class="modal-dialog modal-sm">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Cancelar clase</h4>
         </div>
         <div class="modal-body" id="modal-cancel-content">

         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" id="exit_cancel_button" >No, Cerrar</button>
            <button type="button" class="btn btn-danger" id="confirm_cancel_button">Si, Cancelar clase</button>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-confirmation-cancel">
   <div class="modal-dialog modal-sm">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Cancelar clase - Confirmación de contraseña</h4>
         </div>
         <div class="modal-body" id="modal-cancel-content">
            <div class="input-group">
               <input type="password" class="form-control" name="password" placeholder="Contraseña">
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" id="password_confirmation_cancel">Si, Cancelar clase</button>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript" src="{{ asset('js/classes/search.js') }}"></script>

@endsection