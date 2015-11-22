$(function  () {
	var button_login_email = $('#email_type');
	var button_login_document = $('#document_type');
	var email_fields = $('.email-field');
	var document_fields = $('.document-field');
	var email_type = 1;
	var document_type = 2;

	button_login_email.on('click', function(){
		email_fields.show();
		document_fields.hide();
	});

	button_login_document.on('click', function(){
		document_fields.show();
		email_fields.hide();
	});

})
