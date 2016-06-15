<?php
namespace FisiLog\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{

   protected $table = 'schools';
   protected $fillable = ['name', 'code', 'facultad_id'];
   public $timestamps = false;

   public function facultad()
   {
      return $this->belongsTo(Facultad::class);
   }

   public function academic_plan()
   {
      return $this->hasMany(AcademicPlan::class,'id');
   }

   public function student()
   {
      return $this->hasMany(Student::class,'id');
   }

}
