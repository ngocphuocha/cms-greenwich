<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  const ADMIN_ROLE = 1;
  const TRAINNING_STAFF_ROLE = 2;
  const TRAINER_ROLE = 3;
  const TRAINNE_ROLE = 4;
  protected $table = 'roles';
  protected $fillable = [
    'name'
  ];
  // many to many user
  public function users()
  {
    return $this->belongsToMany('App\User');
  }
}
