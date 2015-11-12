<?php

namespace FisiLog\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\School;

class Facultad extends Model
{
    protected $table = 'facultades';

    public function school(){
        return $this->hasMany('School::class','code');
    }    
}
