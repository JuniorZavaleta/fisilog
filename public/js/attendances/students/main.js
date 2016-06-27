$(function  () {
  var button_pre_register = $('#button_pre_register');
  var button_register = $('#button_register');
  var button_cancel = $('#button_cancel');
  var input_document_code = $('#document_code');
  var input_document_type = $('#document_type');
  var input_token = $('input[name="_token"');
  var div_student_data = $('#student_data');
  var img_student_photo = $('#student_photo');
  var response_error = $('#response_error');
  var response_success = $('#response_success');


   button_pre_register.on('click', function() {
      var url = base_url + '/students/getByDocument';
      $.post(url,
         {
            document_type: input_document_type.val(),
            document_code: input_document_code.val(),
            _token: input_token.val()
         },
         function(data)
         {
            img_student_photo.attr('src', base_url.val() + '/' +data.photo_url);
            response_error.hide();
            div_student_data.show();
         }
      ).fail(function(data)
      {
         div_student_data.hide();
         response_error.show();
         response_error.html(data.responseJSON.error);
      });
   });

  button_register.on('click', function() {
    var url = window.location.href + "_verified";
    $.post(url,{
      document_type: input_document_type.val(),
      document_code: input_document_code.val(),
      _token: input_token.val()
    },function(data){
      response_error.hide();
      response_success.show();
    }).fail(function(data){
      div_student_data.hide();
      response_error.show();
      response_success.show();
      response_error.html(data.responseJSON.error);
    });;
  });

});