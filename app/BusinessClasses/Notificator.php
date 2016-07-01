<?php
namespace FisiLog\BusinessClasses;

interface Notificator {
    public function notify($message, $subject, $to);
}