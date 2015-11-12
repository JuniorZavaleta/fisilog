<?php

namespace FisiLog\Models;
use FisiLog\Models\AcademicPlan;
use FisiLog\Models\CourseOpened;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';


	public function academicPlan(){
        return $this->belongsTo(AcademicPlan::class);
    } 

    public function courseOpened(){
    	return $this->hasMany(CourseOpened::class,'id');
    }
}
