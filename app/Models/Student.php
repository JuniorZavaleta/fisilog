<?php

namespace FisiLog\Models;

use Illuminate\Database\Eloquent\Model;
use FisiLog\Models\User;

class Student extends User
{
    protected $table = 'students';
}
