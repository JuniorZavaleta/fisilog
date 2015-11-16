$(function () {
  var select_user_types = $('#user_type');
  var student_fields = $('.student-field');
  var professor_fields = $('.professor-field');
  var student_type = 1;
  var professor_type = 2;

  select_user_types.on('change', function(){
    var element = $(this);
    if(element.val() == student_type) {
      show_student_fields();
      hide_professor_fields();
    } else if(element.val() == professor_type) {
      show_professor_fields();
      hide_student_fields();
    } else {
      hideAll();
    }
  });

  function show_student_fields() {
    student_fields.show();
  }
  function hide_student_fields() {
    student_fields.hide();
  }
  function show_professor_fields() {
    professor_fields.show();
  }
  function hide_professor_fields() {
    professor_fields.hide();
  }
});