<?php

namespace FisiLog\Models;
use FisiLog\Models\Clase;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';

    public function clase(){
        return $this->hasMany(Clase::class,'id');
  	}
}
