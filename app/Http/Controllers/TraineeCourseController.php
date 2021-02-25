<?php

namespace App\Http\Controllers;

use App\Course;
use App\TraineeCourse;
use App\User;
use Illuminate\Http\Request;

class TraineeCourseController extends Controller
{
  
  /**
   * Display the specified resource.
   *
   * @param  \App\TraineeCourse  $traineeCourse
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $traineeCourses = TraineeCourse::with('course')->where('user_id', $id)->get();
    return view('trainees.courses', compact('traineeCourses'));
  }
}
