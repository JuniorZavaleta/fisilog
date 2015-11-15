<?php

namespace FisiLog\Models;
use FisiLog\Models\School;
use FisiLog\Models\AcademicCycle;
use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    protected $table = 'facultades';

    public function schools(){
        return $this->hasMany(School::class,'facultad_id');
    }   

    public function academicCycle(){
        return $this->hasMany(AcademicCycle::class,'facultad_id');
    }   
}
