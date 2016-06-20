@extends('backend.layout.base')

@section('content')

<div class="row">
   <div class="col-xs-12">
      <h2>Registrar EAP</h2>
   </div>
</div>

@include('backend.show_errors')

<div class="row">
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
   </div>
</div>

<script type="text/javascript">
   $(function(){
      var facultad = $('#facultad');
      var eap_select = $('#eap');
      var ciclo = $('#ciclo');
      var curso_select = $('#curso');

      var btn_search = $('#search');

      facultad.change(function(){
         var url = base_url + '/facultades/' + facultad.val() + '/eaps';

         $.get(url, {},
            function(eaps){
               eap_select.html('<option value="">Seleccione una EAP</option>');

               $.each(eaps, function(index, eap) {
                  $('<option>', {
                     value: eap.id,
                     text: eap.name,
                  }).appendTo(eap_select);
               });
            }
         );
      });

      ciclo.change(function(){
         var url = base_url + '/eaps/' + eap_select.val() + '/courses/' + ciclo.val();
         $.get(url, {},
            function(courses){
               curso_select.html('<option value="">Seleccione un Curso</option>');

               $.each(courses, function(index, course) {
                  $('<option>', {
                     value: course.id,
                     text: course.name + " - " + course.academic_plan,
                  }).appendTo(curso_select);
               });
            }
         );
      });

      btn_search.click(function(){
         window.location.href = base_url + '/classes/search?eap=' + eap_select.val();
      });

   });
</script>

@endsection