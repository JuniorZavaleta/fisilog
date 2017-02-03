<?php

namespace FisiLog\Services;

interface Notificator
{
   public function notify($view, $data, $subject, $to);
}
