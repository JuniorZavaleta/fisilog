<?php
namespace FisiLog\Models;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
   protected $table = 'user_types';

   public $timestamps = false;

   protected $fillable = ['name'];

   public function users()
   {
      return $this->hasMany(User::class);
   }
}
