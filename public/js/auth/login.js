$(function(){
   var by_email    = $('#by_email');
   var by_document = $('#by_document');
   var login_by_email      = $('#withEmail');
   var login_with_document = $('#withDocument');
   var selected = 'btn-primary';
   var unselected = 'btn-default';

   $(by_email).click(function(){
      by_email.removeClass(unselected);
      by_email.addClass(selected);

      by_document.removeClass(selected);
      by_document.addClass(unselected);

      login_by_email.show();
      login_with_document.hide();
   });

   $(by_document).click(function(){
      by_document.removeClass(unselected);
      by_document.addClass(selected);

      by_email.removeClass(selected);
      by_email.addClass(unselected);

      login_by_email.hide();
      login_with_document.show();
   });

});