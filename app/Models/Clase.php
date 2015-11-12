<?php

namespace FisiLog\Models;
use FisiLog\Models\Group;
use FisiLog\Models\Professor;
use FisiLog\Models\ClassRoom;
use FisiLog\Models\Schedule;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $table = 'classes';

    public function group(){
        return $this->belongsTo(Group::class);
    } 

    public function classroom(){
        return $this->belongsTo(ClassRoom::class);
    } 

    public function schedule(){
        return $this->belongsTo(Schedule::class);
    } 

    public function professor(){
        return $this->belongsTo(Professor::class);
    } 

    public function attendance(){
        return $this->hasMany(Attendance::class, 'id');
    }
}
