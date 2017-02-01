<?php

namespace FisiLog\Models;

use Illuminate\Database\Eloquent\Model;

class NotificationChannel extends Model
{
    protected $table = 'notification_channels';

    protected $fillable = ['name'];

    const SMS_CHANNEL      = 1;
    const EMAIl_CHANNEL    = 2;
    const TELEGRAM_CHANNEL = 3;

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
