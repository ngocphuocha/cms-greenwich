<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    if ($request->has('search')) {
      $name = $request->input('search');
      $categories = Category::where('name', 'LIKE', "%$name%")->get();
      return view('training-staffs.category', compact('categories'));
    } else {
      return view('training-staffs.category')->with(['categories' => Category::all()]);
    }
    // default
    return view('training-staffs.category')->with(['categories' => Category::all()]);
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
      'name' => 'required'
    ]);
    Category::create($request->all());
    return redirect()->route('training-staff.categories.index');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $category = Category::find($id);
    return view('training-staffs.category-edit', compact('category'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'name' => 'required'
    ]);
    $data = $request->except(['_token', '_method']);
    $category = Category::find($id);
    // dd($data, $category->toArray());
    // dd($category->toArray());
    // \DB::enableQueryLog();
    $category->update($data);
    // dd(\DB::getQueryLog());
    return redirect()->route('training-staff.categories.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    try {
      $category = Category::find($id);
      $category->destroy($category->id);
    } catch (\Exception $e) {
      return redirect()->back()->with(['error' => '[Cannot delete this category because is has been assign for trainee or trainer!]']);
    }
    return redirect()->route('training-staff.categories.index');
  }
}
