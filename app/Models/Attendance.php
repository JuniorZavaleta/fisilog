<?php

namespace FisiLog\Models;
use Fisilog\Models\Clase;
use Fisilog\Models\User;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendances';

    public function claser(){
        return $this->belongsTo(Clase::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
