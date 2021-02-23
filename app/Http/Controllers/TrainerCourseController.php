<?php

namespace App\Http\Controllers;

use App\TrainerCourse;
use Illuminate\Http\Request;

class TrainerCourseController extends Controller
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
    //
  }

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

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\TrainerCourse  $trainerCourse
   * @return \Illuminate\Http\Response
   */
  public function edit(TrainerCourse $trainerCourse)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\TrainerCourse  $trainerCourse
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, TrainerCourse $trainerCourse)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\TrainerCourse  $trainerCourse
   * @return \Illuminate\Http\Response
   */
  public function destroy(TrainerCourse $trainerCourse)
  {
    //
  }
}
