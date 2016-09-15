<?php
namespace FisiLog\Models;

use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    protected $table = 'facultades';

    protected $fillable = ['name', 'code', 'branch_id'];

    public $timestamps = false;

    public function schools()
    {
       return $this->hasMany(School::class,'facultad_id');
    }

    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }

    public function academicPeriods()
    {
        return $this->hasMany(AcademicPeriod::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

}
