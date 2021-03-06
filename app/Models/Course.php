<?php
namespace FisiLog\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

   protected $table = 'courses';
   protected $fillable = ['name', 'code', 'quantity_of_credits', 'academic_plan_id', 'ciclo', 'course_type_id'];
   public $timestamps = false;

   public function academic_plan()
   {
      return $this->belongsTo(AcademicPlan::class);
   }

   public function courses_opened()
   {
      return $this->hasMany(CourseOpened::class,'id');
   }

   public function course_type()
   {
      return $this->belongsTo(CourseType::class);
   }

   public function classes()
   {
      return $this->hasMany(Clase::class);
   }

}
