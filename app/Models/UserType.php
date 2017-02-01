<?php
namespace FisiLog\Models;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    protected $table = 'user_types';

    public $timestamps = false;

    protected $fillable = ['name'];

    const STUDENT_TYPE   = 1;
    const PROFESSOR_TYPE = 2;

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
