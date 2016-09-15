<?php

namespace FisiLog\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branches';

    protected $fillable = ['name', 'address', 'institution_id'];

    public $timestamps = false;

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

}
