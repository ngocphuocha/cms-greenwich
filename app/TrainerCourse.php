<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainerCourse extends Model
{
  protected $table = 'trainer_courses';
  protected $fillable = ['user_id', 'course_id'];

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function course()
  {
    return $this->belongsTo('App\Course');
  }
}
