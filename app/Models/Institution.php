<?php

namespace FisiLog\Models;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    protected $table = 'institutions';

    protected $fillable = ['name', 'initial'];

    public $timestamps = false;

    public function branches()
    {
        return $this->hasMany(Branch::class);
    }

}
