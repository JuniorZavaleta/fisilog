<?php
namespace FisiLog\Services;
use Mail;
use FisiLog\Services\Notificator;

class NotificationByMail implements Notificator {
    public function notify($message, $subject, $to) {
        Mail::send('email.class.notification', ['message'=>$message], 
            function($m) use ($subject, $to) {
            $m->from('test@email.com', 'Fisi Bot');
            $m->subject($subject);
            $m->to($to);
        });
    }
}