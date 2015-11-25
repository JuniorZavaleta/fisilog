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

    public function clases(){
        return $this->hasMany(Clase::class);
  	}

    public function students(){
        return $this->belongsToMany(Student::class,'students_x_groups','group_id','student_id');
  	}
}
