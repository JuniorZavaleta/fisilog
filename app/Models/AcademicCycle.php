<?php

namespace FisiLog\Models;
use FisiLog\Models\CourseOpened;
use Fisilog\Models\Facultad;
use Illuminate\Database\Eloquent\Model;

class AcademicCycle extends Model
{
    protected $table = 'academic_cycles';

    public function courseOpened(){
        return $this->hasMany(CourseOpened::class,'id');
  	}

  	public function facultad(){
  		return $this->belongsTo(Facultad::class);
  	}
}
