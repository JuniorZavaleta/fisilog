<?php
namespace FisiLog\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{

   protected $table = 'attendances';

   protected $fillable = ['user_id', 'class_id', 'verified'];

   public function session_class()
   {
      return $this->belongsTo(SessionClass::class);
   }

   public function user()
   {
      return $this->belongsTo(User::class);
   }
}
