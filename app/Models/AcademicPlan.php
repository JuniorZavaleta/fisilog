<?php

namespace FisiLog\Models;
use FisiLog\Models\School;
use FisiLog\Models\Course;
use Illuminate\Database\Eloquent\Model;

class AcademicPlan extends Model
{
    protected $table = 'academic_plans';

    public function school(){
        return $this->belongsTo(School::class,'code');
    } 

    public function course(){
    	return $this->hasMany(Course::class,'code');
    }
}
