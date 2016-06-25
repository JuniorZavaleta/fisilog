<?php
namespace FisiLog\Models;

use FisiLog\Models\Clase;
use FisiLog\Models\AcademicDepartment;
use FisiLog\Models\User;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
   protected $table ='professors';

   protected $fillable = ['id', 'academic_department_id', 'type'];

   public $timestamps = false;

   public function academic_department()
   {
      return $this->belongsTo(AcademicDepartment::class);
   }

   public function user()
   {
      return $this->belongsTo(User::class, 'id');
   }

   public function classes()
   {
      return $this->hasMany(Clase::class);
   }

}
