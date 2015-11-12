<?php

namespace FisiLog\Models;
use FisiLog\Models\Clase;
use FisiLog\Models\AcademicDepartament;
use Illuminate\Database\Eloquent\Model;
use FisiLog\Models\User;

class Professor extends User
{
    protected $table ='professors';

    public function academicDepartament(){
        return $this->belongsTo(AcademicDepartament::class);
    } 

    public function clase(){
        return $this->hasMany(Clase::class,'id');
  	}
}
