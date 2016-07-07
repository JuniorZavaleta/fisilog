<?php
namespace FisiLog\BusinessClasses;

interface Notificator {
   public function notify($view, $data, $subject, $to);
}