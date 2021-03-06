<?php

namespace FisiLog\Models;
use FisiLog\Models\Professor;
use Illuminate\Database\Eloquent\Model;

class AcademicDepartment extends Model
{
   protected $table = 'academic_departments';

   protected $fillable = ['name'];

   public function professor()
   {
      return $this->hasMany(Profesor::class,'id');
   }
}
