<?php

namespace FisiLog\Services;

use Mail;

class EmailNotificator implements Notificator
{
    public function notify($view, $data, $subject, $to)
    {
        $view = 'notifications.emails.'.$view;
        Mail::send($view, $data, function ($m) use ($subject, $to) {
            $m->subject($subject);
            $m->to($to);
        });
    }
}
