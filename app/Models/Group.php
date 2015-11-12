<?php

namespace FisiLog\Models;
use FisiLog\Models\CourseOpened;
use FisiLog\Models\Clase;
use FisiLog\Models\Student;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';

    public function courseOpened(){
        return $this->belongsTo(CourseOpened::class);
    } 

    public function clase(){
        return $this->hasMany(Clase::class,'id');
  	}

  	public function student(){
        return $this->belongsToMany(Clase::class);
  	}
}
