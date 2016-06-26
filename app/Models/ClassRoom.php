<?php
namespace FisiLog\Models;
use FisiLog\Models\Clase;
use FisiLog\Models\Facultad;

use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{

   protected $table = 'classrooms';
   protected $fillable = ['facultad_id', 'name'];
   public $timestamps = false;

   public function clase()
   {
      return $this->hasMany(Clase::class,'id');
   }

   public function facultad()
   {
      return $this->belongsTo(Facultad::class);
   }

}
