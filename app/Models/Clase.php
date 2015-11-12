<?php

namespace FisiLog\Models;
use FisiLog\Models\Group;
use FisiLog\Models\Professor;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $table = 'classes';

    public function group(){
        return $this->belongsTo(Group::class);
    } 

    public function professor(){
        return $this->belongsTo(Professor::class);
    } 
}
