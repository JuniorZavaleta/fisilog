<?php

namespace FisiLog\Models;
use FisiLog\Models\Clase;
use FisiLog\Models\AcademicDepartament;
use FisiLog\Models\User;
use Illuminate\Database\Eloquent\Model;

class Professor extends User
{
    protected $table ='professors';

    public function academicDepartament(){
        return $this->belongsTo(AcademicDepartament::class);
    } 

    public function user(){
        return $this->belongsTo(User::class);
    } 

    public function clase(){
        return $this->hasMany(Clase::class,'id');
  	}
}
