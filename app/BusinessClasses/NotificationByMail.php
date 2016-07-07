<?php
namespace FisiLog\BusinessClasses;
use Mail;
use FisiLog\BusinessClasses\Notificator;

class NotificationByMail implements Notificator {

   public function notify($view, $data, $subject, $to)
   {
      $view = 'notifications.emails.'.$view;
      Mail::send($view, $data,
         function($m) use ($subject, $to) {
            $m->subject($subject);
            $m->to($to);
         }
      );
   }

}
