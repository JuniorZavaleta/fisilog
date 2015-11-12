<?php

namespace FisiLog\Models;
use FisiLog\Models\School;
use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    protected $table = 'facultades';

    public function school(){
        return $this->hasMany(School::class,'id');
    }    
}
