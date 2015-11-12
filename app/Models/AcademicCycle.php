<?php

namespace FisiLog\Models;
use FisiLog\Models\CourseOpened;
use Illuminate\Database\Eloquent\Model;

class AcademicCycle extends Model
{
    protected $table = 'academic_cycles';

    public function courseOpened(){
        return $this->hasMany(CourseOpened::class,'id');
  	}
}
