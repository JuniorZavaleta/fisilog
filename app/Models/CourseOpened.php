<?php

namespace FisiLog\Models;
use FisiLog\Models\AcademicPeriod;
use FisiLog\Models\Course;
use FisiLog\Models\Group;
use Illuminate\Database\Eloquent\Model;

class CourseOpened extends Model
{
    protected $table = 'courses_opened';

	public function academicPeriod(){
        return $this->belongsTo(AcademicPeriod::class);
  	}

    public function course(){
        return $this->belongsTo(Course::class);
    }

  	public function group(){
        return $this->hasMany(Group::class,'id');
  	}

}
