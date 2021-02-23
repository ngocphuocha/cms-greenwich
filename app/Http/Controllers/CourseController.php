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
  public function create(Request $request)
  {
    if ($request->has('search')) {
      $name = $request->input('search');
      $courses = Course::with(['category'])->where('name', 'LIKE', "%$name%")->paginate();
      // dd($courses->toArray());
    } else {
      $courses = Course::with('category')->paginate(3);
    }
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
    $request->validate([
      'name' => 'required',
      'category_id' => 'required'
    ]);
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
  public function edit($id)
  {
    $course = Course::find($id);
    return view('training-staffs.course-edit', compact('course'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Course  $course
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'name' => 'required|min:3',
      'category_id' => 'required'
    ]);
    $course = Course::find($id);
    // dd($course->toArray());
    $course->update($request->all());
    $course->save();
    // Course::find($id)->update($request->all());
    return redirect()->route('training-staff.courses.create');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Course  $course
   * @return \Illuminate\Http\Response
   */
  public function destroy(Course $course)
  {
    Course::destroy($course->id);
    return redirect()->route('training-staff.courses.create');
  }
}
