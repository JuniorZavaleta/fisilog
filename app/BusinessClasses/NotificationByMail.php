<?php
namespace FisiLog\BusinessClasses;
use Mail;
use FisiLog\BusinessClasses\Notificator;

class NotificationByMail implements Notificator {
    public function notify($message, $subject, $to) {
        Mail::send('email.class.notification', ['notification_message'=>$message], 
            function($m) use ($subject, $to) {
            $m->from('test@email.com', 'Fisi Bot');
            $m->subject($subject);
            $m->to($to);
        });
    }
}