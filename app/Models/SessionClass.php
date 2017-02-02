<?php

namespace FisiLog\Models;

use Illuminate\Database\Eloquent\Model;

class SessionClass extends Model
{
    protected $table = 'sessions_class';

    protected $fillable = ['class_id', 'session_date', 'status'];

    public $timestamps = false;

    public function clase()
    {
        return $this->belongsTo(Clase::class, 'class_id');
    }

    public function attendances()
    {
        return $this->hasMay(Attendance::class);
    }
}
