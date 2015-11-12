<?php

namespace FisiLog\Models;
use FisiLog\Models\School;
use FisiLog\Models\School AcademicCycle;
use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    protected $table = 'facultades';

    public function school(){
        return $this->hasMany(School::class,'id');
    }   

    public function academicCycle(){
        return $this->hasMany(AcademicCycle::class,'id');
    }   
}
