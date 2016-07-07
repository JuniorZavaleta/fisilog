$(function(){
   var facultad = $('#facultad');
   var eap_select = $('#eap');
   var ciclo = $('#ciclo');
   var curso_select = $('#curso');
   var resultados = $('#resultados');
   var last_row = $('#resultados > tbody:last-child');
   var resultados_movil = $('#resultados-movil');
   var clase_id_selected = 0;
   var session_id_selected = 0;
   var token = $('#_token');

   var cancel_button = $('#cancel_button');
   var confirm_cancel_button = $('#confirm_cancel_button');
   var password_confirmation_cancel = $('#password_confirmation_cancel');

   var modal_cancel_content = $('#modal-cancel-content');

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

   var render_row_result = function(clase) {
      return '<tr class="clickable-row" data-clase-id='+ clase.id +' data-session-id='+ clase.session_id +'>'+
               '<td>' + clase.group_number + '</td>'+
               '<td>' + clase.professor_name + '</td>' +
               '<td>' + clase.day_of_the_week + '</td>' +
               '<td>' + clase.schedule + '</td>' +
               '<td>' + clase.class_type + '</td>' +
               '<td>' + clase.classroom + '</td>' +
               '<td>' + clase.status + '</td>' +
               '<td>' + clase.deadline + '</td>' +
            '</tr>';
   };

   var render_row_result_mobile = function(clase) {
      return '<div class="col-xs-12">' +
               'Grupo: ' + clase.group_number + '<br>' +
               'Profesor: ' + clase.professor_name + '<br>' +
               '-- ' + clase.day_of_the_week + ' - ' + clase.schedule + '<br>' +
               'Tipo: ' + clase.class_type + ' Salon: ' + clase.classroom + '<br>' +
             '</div>';
   };

   curso_select.change(function() {
      var url = base_url + '/classes/getByCourse/' + curso_select.val();

      $.get(url, {},
         function(classes) {

            if (window.innerWidth > 768) {
               $('#resultados > tbody').html('');

               $.each(classes, function(index, clase) {
                  last_row.append( render_row_result(clase) );
               });
            } else {
               $.each(classes, function(index, clase) {
                  resultados_movil.append( render_row_result_mobile(clase) );
               });
            }
         }
      );
   });

   resultados.on('click', 'tr', function(){
      var clase_id = $(this).data('clase-id');
      var session_id = $(this).data('session-id');

      if (clase_id > 0) {
         $(this).addClass('selected').siblings().removeClass('selected');
         clase_id_selected = clase_id;
         session_id_selected = session_id;
      }
   });

   cancel_button.click(function(){
      if (clase_id_selected > 0) {
         var class_selected = $("#resultados tr.selected");
         var group = class_selected.find('td:eq(0)').text();
         var professor = class_selected.find('td:eq(1)').text();
         var schedule = class_selected.find('td:eq(3)').text();
         var course = curso_select.find(':selected').text()

         var message = '<p>¿Esta seguro que desea cancelar la clase de ' + course +
                       ' con el profesor <strong>' + professor + '</strong>' +
                       ' en el horario de ' + schedule + ' del grupo ' + group +' ?</p>';

         modal_cancel_content.html(message);
         $('#modal-cancel').modal('show');
      }
   });

   confirm_cancel_button.click(function()
   {
      $('#modal-cancel').modal('hide');
      $('#modal-confirmation-cancel').modal('show');
      }
   );

   password_confirmation_cancel.click(function()
   {
      if (clase_id_selected > 0) {
         if (session_id_selected > 0) {
            var url = base_url + '/classes/' + clase_id_selected + '/sessions_class/' + session_id_selected + '/cancel';
            $.post(url,
               {
                  _token: token.val(),
               },
               function(response)
               {
                  alert('Sesion cancelada');
               }
            );
         } else {
            alert("No hay una sesion valida");
         }
      } else {
         alert("Seleccione la clase que desea cancelar");
      }
   });

});