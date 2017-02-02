<?php
namespace FisiLog\Models;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $table = 'classes';

    protected $fillable = ['classroom_id', 'group_id', 'professor_id', 'start_hour', 'end_hour', 'day', 'type'];

    public $timestamps = false;

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function classroom()
    {
        return $this->belongsTo(ClassRoom::class);
    }

    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }

    public function sessions()
    {
        return $this->hasMany(SessionClass::class);
    }

    public function attendances()
    {
        return $this->hasManyThrough(Attendance::class, SessionClass::class, 'class_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function getProfessorFullnameAttribute()
    {
        $professor = $this->professor->user;

        return $professor->name . ' ' . $professor->lastname;
    }

    public function getGroupNumberAttribute()
    {
        return $this->group->number_of_group;
    }

    public function getScheduleAttribute()
    {
        return date('H:i', strtotime($this->start_hour)). ' - ' . date('H:i', strtotime($this->end_hour));
    }

    public function getClassroomNameAttribute()
    {
        return $this->classroom->name;
    }

    public function getCourseNameAttribute()
    {
        return $this->course->name;
    }
}
