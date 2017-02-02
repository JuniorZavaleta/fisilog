<?php

namespace FisiLog\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendances';

    protected $fillable = ['user_id', 'verified', 'session_class_id'];

    public function session_class()
    {
        return $this->belongsTo(SessionClass::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getSessionStatusAttribute()
    {
        return $this->session_class->status;
    }

    public function getSessionDateAttribute()
    {
        return $this->session_class->session_date;
    }
}
