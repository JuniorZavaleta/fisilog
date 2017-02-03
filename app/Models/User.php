<?php

namespace FisiLog\Models;

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

    public function scopeFindByDocument($query, $type_id, $code)
    {
        $query->whereHas('documents', function ($documents) use (
            $type_id, $code
        ) {
            $documents->where('document_type_id', $type_id)
                      ->where('code', $code);
        });
    }

    public function getFullnameAttribute()
    {
        return $this->name . ' ' . $this->lastname;
    }
}
