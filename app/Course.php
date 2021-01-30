<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  protected $table = 'courses';
  protected $fillable = ['name', 'category_id'];

  public function trainerCourses()
  {
    return $this->hasMany('App\TrainerCourse');
  }

  public function traineeCourses()
  {
    return $this->hasMany('App\TraineeCourse');
  }

  public function category()
  {
    return $this->belongsTo('App\Category');
  }
}
