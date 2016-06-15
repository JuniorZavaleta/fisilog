<?php
namespace FisiLog\Models;

use Illuminate\Database\Eloquent\Model;

class NotificationChannel extends Model
{
   protected $table = 'notification_channels';

   protected $fillable = ['name'];

   public function users()
   {
      return $this->hasMany(User::class);
   }
}
