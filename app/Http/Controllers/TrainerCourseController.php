<?php

namespace App\Http\Controllers;

use App\TrainerCourse;
use Illuminate\Http\Request;

class TrainerCourseController extends Controller
{
  
  /**
   * Display the specified resource.
   *
   * @param  \App\TrainerCourse  $trainerCourse
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $trainerCourses = TrainerCourse::with('course')->where('user_id', $id)->get();
    return view('trainers.courses', compact('trainerCourses'));
  }
}
