@extends('backend.layout.base')

@section('content')

<div class="row">
   <div class="col-xs-12">
      <h2>Buscar clase</h2>
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
      <!-- End form container -->
   </div>
</div>
<div class="row">
   <!-- Start col-md-9 col-lg-9 -->
   <div class="hidden-xs ">
      <table class="table table-hover" id="resultados">
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

<script type="text/javascript">
   $(function(){
      var facultad = $('#facultad');
      var eap_select = $('#eap');
      var ciclo = $('#ciclo');
      var curso_select = $('#curso');
      var resultados = $('#resultados');
      var last_row = $('#resultados > tbody:last-child');
      var resultados_movil = $('#resultados-movil');

      facultad.change(function() {
         var url = base_url + '/facultades/' + facultad.val() + '/eaps';

         $.get(url, {},
            function(eaps) {
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

      ciclo.change(function() {
         var url = base_url + '/eaps/' + eap_select.val() + '/courses/' + ciclo.val();

         $.get(url, {},
            function(courses) {
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

      curso_select.change(function() {
         var url = base_url + '/classes/getByCourse/' + curso_select.val();

         $.get(url, {},
            function(classes) {

               if (window.innerWidth > 768) {
                  $('#resultados > tbody').html('');

                  $.each(classes, function(index, clase) {
                     var row =   '<tr>'+
                                    '<td>' + clase.group_number + '</td>'+
                                    '<td>' + clase.professor_name + '</td>' +
                                    '<td>' + clase.day_of_the_week + '</td>' +
                                    '<td>' + clase.schedule + '</td>' +
                                    '<td>' + clase.class_type + '</td>' +
                                    '<td>' + clase.classroom + '</td>' +
                                    '<td>' + clase.status + '</td>' +
                                    '<td>' + clase.deadline + '</td>' +
                                 '</tr>';

                     last_row.append(row);
                  });
               } else {
                  $.each(classes, function(index, clase) {
                     var row =   '<div class="col-xs-12">' +
                                    'Grupo: ' + clase.group_number + '<br>' +
                                    'Profesor: ' + clase.professor_name + '<br>' +
                                    '-- ' + clase.day_of_the_week + ' - ' + clase.schedule + '<br>' +
                                    'Tipo: ' + clase.class_type + ' Salon: ' + clase.classroom + '<br>' +
                                 '</div>';

                     resultados_movil.append(row);
                  });
               }
            }
         );
      });

   });
</script>

@endsection