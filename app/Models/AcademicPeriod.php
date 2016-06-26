<?php

namespace FisiLog\Models;
use FisiLog\Models\Facultad;
use FisiLog\Models\CourseOpened;
use Illuminate\Database\Eloquent\Model;

class AcademicPeriod extends Model
{
   protected $table = 'academic_periods';
   protected $fillable = ['name', 'start_date', 'end_date', 'school_id'];
   public $timestamps = false;

   public function facultad()
   {
      return $this->belongsTo(Facultad::class, 'school_id');
   }

   public function courseOpened(){
        return $this->hasMany(CourseOpened::class,'id');
   }
}
