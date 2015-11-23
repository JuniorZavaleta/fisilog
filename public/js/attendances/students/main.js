$(function  () {
  var button_pre_register = $('#button_pre_register');
  var input_document_code = $('#document_code');
  var input_document_type = $('#document_type');
  var input_token = $('input[name="_token"');
  var div_student_data = $('#student_data');
  var img_student_photo = $('#student_photo');
  var base_url = $('#base_url');

  button_pre_register.on('click', function(){
    var url = window.location.href;
    $.post(url,{
      document_type: input_document_type.val(),
      document_code: input_document_code.val(),
      _token: input_token.val()
    },function(data){
      img_student_photo.attr('src', base_url.val() + '/' +data.photo_url);
      div_student_data.show();
    });
  });
});