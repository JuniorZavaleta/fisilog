<?php

namespace FisiLog\Models;

use Illuminate\Database\Eloquent\Model;

use FisiLog\Models\CourseOpened;
use FisiLog\Models\Clase;
use FisiLog\Models\Student;

class Group extends Model
{
    protected $table = 'groups';

    public $timestamps = false;

    public function courseOpened()
    {
        return $this->belongsTo(CourseOpened::class);
    }

    public function classes()
    {
        return $this->hasMany(Clase::class);
  	}

    public function students()
    {
        return $this->belongsToMany(Student::class,'students_x_groups','group_id','student_id');
  	}
}
