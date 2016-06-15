<?php
namespace FisiLog\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{

   protected $table = 'attendances';

   protected $fillable = ['user_id', 'class_id', 'verified', 'date'];

   protected $dates = ['date'];

   public function clase()
   {
      return $this->belongsTo(Clase::class);
   }

   public function user()
   {
      return $this->belongsTo(User::class);
   }
}
