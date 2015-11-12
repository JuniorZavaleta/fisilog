<?php

namespace FisiLog\Models;
use FisiLog\Models\AcademicCycle;
use FisiLog\Models\Course;
use FisiLog\Models\Group;
use Illuminate\Database\Eloquent\Model;

class CourseOpened extends Model
{
    protected $table = 'courses_opened';

	public function academicCycle(){
        return $this->belongsTo(AcademicCycle::class);
  	}

  	public function group(){
        return $this->hasMany(Group::class,'id');
  	}

  	public function course(){
        return $this->belongsTo(Course::class);
    } 
}
