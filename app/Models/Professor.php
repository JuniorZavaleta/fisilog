<?php

namespace FisiLog\Models;
use FisiLog\Models\Clase;
use FisiLog\Models\AcademicDepartment;
use FisiLog\Models\User;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
  protected $table ='professors';
  public $timestamps = false;

  public function academicDepartment(){
    return $this->belongsTo(AcademicDepartment::class);
  }

  public function user(){
    return $this->belongsTo(User::class);
  }

  public function classes(){
    return $this->hasMany(Clase::class);
  }
}
