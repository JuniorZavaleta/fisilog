<?php
namespace FisiLog\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicPlan extends Model
{
    protected $table = 'academic_plans';

    protected $fillable = ['school_id', 'name', 'year_of_publication', 'is_active'];

    public $timestamps = false;

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function course()
    {
        return $this->hasMany(Course::class,'id');
    }

    public function getIsActiveStrAttribute()
    {
        return $this->is_active ? 'Si' : 'No';
    }
}
