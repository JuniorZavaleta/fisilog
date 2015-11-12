<?php

namespace FisiLog;
use FisiLog\Models\User;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $table = 'devices';

    public function user(){
        return $this->belongsTo(User::class);
    } 
    
}

