<?php

namespace App\Http\Controllers;

use App\Course;
use App\TraineeCourse;
use App\User;
use Illuminate\Http\Request;

class TraineeCourseController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

  }

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

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\TraineeCourse  $traineeCourse
   * @return \Illuminate\Http\Response
   */
  public function edit(TraineeCourse $traineeCourse)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\TraineeCourse  $traineeCourse
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, TraineeCourse $traineeCourse)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\TraineeCourse  $traineeCourse
   * @return \Illuminate\Http\Response
   */
  public function destroy(TraineeCourse $traineeCourse)
  {
    //
  }
}
