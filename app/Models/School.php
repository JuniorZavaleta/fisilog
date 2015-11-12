<?php

namespace FisiLog\Models;
use FisiLog\Models\Facultad;
use FisiLog\Models\AcademicPlan;
use Fisilog\Models\Student;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'schools';

    public function facultad(){
        return $this->belongsTo(Facultad::class);
    } 
    
    public function academicPlan(){
        return $this->hasMany(AcademicPlan::class,'id');
    }    

    public function student(){
        return $this->hasMany(Student::class,'id');
    } 
}
