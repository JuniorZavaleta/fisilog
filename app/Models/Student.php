<?php
namespace FisiLog\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
   protected $table = 'students';

   protected $fillable = ['id', 'school_id', 'code', 'year_of_entry'];

   public $timestamps = false;

   public function groups()
   {
      return $this->belongsToMany(Group::class,'students_x_groups','student_id','group_id');
   }

   public function user()
   {
      return $this->belongsTo(User::class);
   }

   public function school()
   {
      return $this->belongsTo(School::class);
   }

   public function classes()
   {
      return $this->hasManyThrough(Clase::class, Group::class);
   }
}
