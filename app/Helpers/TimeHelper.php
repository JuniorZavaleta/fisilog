<?php
namespace FisiLog\Helpers;

class TimeHelper {

   public static function getMinutesBetween($start_time, $end_time)
   {
      $hours = date('H', strtotime($end_time)) - date('H', strtotime($start_time));
      $minutes = $hours*60 + ( date('i', strtotime($end_time)) - date('i', strtotime($start_time)) );

      return $minutes;
   }

}