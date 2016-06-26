<?php

namespace FisiLog\Models;
use FisiLog\Models\SessionClass;
use FisiLog\Models\User;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{

   protected $table = 'attendances';

   protected $fillable = ['user_id', 'verified', 'session_class_id'];

   public function session()
   {
      return $this->belongsTo(SessionClass::class, 'session_class_id');
   }

   public function user()
   {
      return $this->belongsTo(User::class);
   }
}
