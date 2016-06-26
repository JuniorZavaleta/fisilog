<?php
namespace FisiLog\Models;

use FisiLog\Models\Document;
use FisiLog\Models\Student;
use FisiLog\Models\Professor;
use FisiLog\Models\Attendance;
use FisiLog\Models\UserType;
use FisiLog\Models\NotificationChannel;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
   use Authenticatable, Authorizable, CanResetPassword;

   protected $table = 'users';
   protected $fillable = ['name', 'lastname', 'email', 'password', 'phone', 'notification_channel_id', 'photo_url', 'user_type_id'];
   protected $hidden = ['password', 'remember_token'];

   public function documents()
   {
      return $this->hasMany(Document::class);
   }

   public function student()
   {
      return $this->hasOne(Student::class);
   }

   public function professor()
   {
      return $this->hasOne(Professor::class);
   }

   public function attendances()
   {
      return $this->hasMany(Attendance::class);
   }

   public function user_type()
   {
      return $this->belongsTo(UserType::class);
   }

   public function notification_channel()
   {
      return $this->belongsTo(NotificationChannel::class);
   }
}
