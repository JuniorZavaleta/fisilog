<?php
namespace FisiLog\Models;

use Illuminate\Database\Eloquent\Model;

class CourseOpened extends Model
{

   protected $table = 'courses_opened';

   public $timestamps = false;

   public function course()
   {
      return $this->belongsTo(Course::class);
   }

   public function group()
   {
      return $this->hasMany(Group::class,'id');
   }

   public function academic_period()
   {
      return $this->belongsTo(AcademicPeriod::class);
   }

   public function classes()
   {
      return $this->hasManyThrough(Clase::class, Group::class);
   }

   public function professor()
   {
      return $this->belongsTo(Professor::class);
   }

}
