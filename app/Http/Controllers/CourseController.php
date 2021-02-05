<?php

namespace App\Http\Controllers;

use App\Course;
use App\Category;
use Illuminate\Http\Request;

class CourseController extends Controller
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
    $courses = Course::with('category')->get();
    // dd($courses->toArray());
    $categories = Category::all();
    return view('training-staffs.course', compact(['categories', 'courses']));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    Course::create($request->all());
    return redirect()->back()->with(['success' => 'Add Success!']);
  }
  /**
   * Display the specified resource.
   *
   * @param  \App\Course  $course
   * @return \Illuminate\Http\Response
   */
  public function show(Course $course)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Course  $course
   * @return \Illuminate\Http\Response
   */
  public function edit(Course $course)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Course  $course
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Course $course)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Course  $course
   * @return \Illuminate\Http\Response
   */
  public function destroy(Course $course)
  {
    //
  }
}
