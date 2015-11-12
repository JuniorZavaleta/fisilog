<?php

namespace FisiLog\Models;
use FisiLog\Models\Clase;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    protected $table = 'classrooms';

    public function clase(){
        return $this->hasMany(Clase::class,'id');
  	}
}
