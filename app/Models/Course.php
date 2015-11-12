<?php

namespace FisiLog\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';


	public function academicPlan(){
        return $this->belongsTo(AcademicPlan::class,'yearOfPublication');
    } 

    public function courseOpened(){
    	return $this->hasMany(CourseOpened::class,'code');
    }
}
