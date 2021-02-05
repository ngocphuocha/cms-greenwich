<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use App\Http\Requests\EditTraineeRequest;
use Illuminate\Http\Request;
use App\Role;
use App\User;
use App\TraineeCourse;

class TrainingStaffController extends Controller
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
  public function trainees(Request $request)
  {
    // $users = User::query(); // create query 
    if ($request->has('search')) {
      $users = Role::with(
        ['users' => function ($query) use ($request) {
          return $query->where('name', 'like', "%{$request->input('search')}%") // search with name
            ->orWhere('email', 'like', "%{$request->input('search')}%"); // search with email
        }]
      )->where('id', 4)->get();
      // dd($users->toArray());
    } else {
      $users = Role::with('users')->where('id', 4)->get(); // get user with id = 4 in roles table
    }

    // dd($users->toArray());
    return view('training-staffs.trainees', compact('users'));
  }
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  // create trainee account
  public function create()
  {
    $role = Role::where('id', '4')->get(); // get trainee role
    // dd($role[0]->id);
    return view('training-staffs.create', compact('role'));
  }


  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $data = $request->all();
    $data['password'] = bcrypt($data['password']);
    $user = User::create($data);
    $user->roles()->attach($request->role_id,  ['created_at' => now(), 'updated_at' => now()]);
    return redirect()->back()->with(['success' => 'Create Trainee Success!']);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }
  public function traineeEdit($id)
  {

    $trainee = User::find($id);
    return view('training-staffs.edit', compact('trainee'));
  }
  // return view assign for trainee with id=?
  public function traineeAssignView($id)
  {
    $user = User::find($id);
    $traineeCourses = TraineeCourse::with('course')->where('user_id', $user->id)->get(); // get trainee course
    // dd($traineeCourses->toArray());
    return view('training-staffs.assign', compact(['user', 'traineeCourses']));
  }
  // store assign for trainee with id=?
  public function traineeAssign(Request $request, $id)
  {
    $user = User::find($id); // find user with id
    // get id of user
    $data = $request->except('_token');
    // dd($data['course_id']);
    // dd($data);
    $user->traineeCourses()->create($data);
    return redirect()->back()->with(['success' => 'Add Success!']);
  }
  // delete trainee assign
  public function traineeAssignDelete($id, $course_id)
  {
    // \DB::enableQueryLog();

    // dd(\DB::getQueryLog());

    try {
      TraineeCourse::where('user_id', $id)
        ->where('course_id', $course_id)
        ->delete();
      return redirect()->back()->with(['success' => 'Delete Success!']);
    } catch (\Exception $e) {
      return $e . ' [Something error!]';
    }
  }

  public function traineeUpdate(Request $request, $id)
  {
    $data = $request->except('_token', '_method', 'course_id', 'password_confirmation');
    $data['password'] = bcrypt($data['password']);
    $trainee = User::find($id);
    $trainee->update($data);
    return redirect()->back()->with(['success' => 'Update Success!']);
  }
  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
  // trainee destroy

  public function traineeDestroy($id)
  {
    TraineeCourse::where('user_id', $id)->delete();
    $user = User::find($id);
    $user->roles()->detach();
    $user->delete();
    return redirect()->back()->with(['success' => 'Delete Success!']);
  }
}
