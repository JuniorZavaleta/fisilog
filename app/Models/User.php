<?php
namespace FisiLog\Models;

use FisiLog\Models\Student;
use FisiLog\Models\User;
use FisiLog\Models\Document;
use FisiLog\Models\Device;
use FisiLog\Models\Attendance;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password', 'remember_token'];

    public function documents(){
        return $this->hasMany(Document::class);
    }

    public function student(){
        return $this->hasOne(Student::class);
    }

    public function professor(){
        return $this->hasOne(Professor::class);
    }

    public function attendances(){
        return $this->hasMany(Attendance::class);
    }
}
