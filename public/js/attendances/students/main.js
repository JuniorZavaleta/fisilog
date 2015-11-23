$(function  () {
	var button_pre_register = $('#button_pre_register');
	var input_document_code = $('#document_code');
	var input_document_type = $('#document_type');
	var input_token = $('input[name="_token"');

	button_pre_register.on('click', function(){
		var url = window.location.href;
		$.post(url,{
			document_type: input_document_type.val(),
			document_code: input_document_code.val(),
			_token: input_token.val()
		},function(data){
			
		});
	});
})
