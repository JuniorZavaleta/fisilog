<?php

namespace FisiLog\Models;
use FisiLog\Models\User;
use Fisilog\Models\School;
use Fisilog\Models\Group;
use Illuminate\Database\Eloquent\Model;

class Student extends User
{
    protected $table = 'students';

    public function group(){
        return $this->belongsToMany(Group::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    } 

    public function school(){
        return $this->belongsTo(School::class);
    } 
}
