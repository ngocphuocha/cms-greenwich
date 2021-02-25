<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;
use App\TraineeCourse;
use App\TrainerCourse;
use App\Repositories\Interfaces\IUserRepository;
use App\Services\UserService;
use App\Exceptions\UserException;

class TrainingStaffController extends Controller
{
  private $userRepository;
  private $userService;
  public function __construct(IUserRepository $userRepository, UserService $userService)
  {
    $this->userRepository = $userRepository;
    $this->userService = $userService;
  }
  public function trainees(Request $request)
  {
    // list trainee and search 
    try {
      $users = $this->userService->traineeSearch($request);
    } catch (UserException $exception) {
      throw $exception;
    }
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
    $data = $request->except('_token', 'role_id');
    $data['password'] = bcrypt($data['password']);
    $user = User::create($data);
    $user->roles()->attach($request->role_id,  ['created_at' => now(), 'updated_at' => now()]);
    return redirect()->back()->with(['success' => 'Create Trainee Success!']);
  }
  public function traineeDetail($id)
  {
    try {
      $trainee = $this->userService->show($id);
    } catch (UserException $exception) {
      throw $exception;
    }
    return view('training-staffs.detail-trainee', compact('trainee'));
  }
  public function trainersDetail($id)
  {
    $trainer = $this->userRepository->get($id);
    return view('training-staffs.trainers.detail', compact('trainer'));
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
    return view('training-staffs.assign', compact(['user', 'traineeCourses']));
  }
  // store assign for trainee with id=?
  public function traineeAssign(Request $request, $id)
  {
    $user = User::find($id); // find user with id
    $data = $request->except('_token');
    $user->traineeCourses()->create($data);
    return redirect()->back()->with(['success' => 'Add Success!']);
  }
  // delete trainee assign
  public function traineeAssignDelete($id, $course_id)
  {
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
  public function traineeDestroy($id)
  {
    TraineeCourse::where('user_id', $id)->delete();
    $user = User::find($id);
    $user->roles()->detach();
    $user->delete();
    return redirect()->back()->with(['success' => 'Delete Success!']);
  }
  // trainer
  public function trainers(Request $request)
  {
    if ($request->has('search')) {
      $users = Role::with(
        ['users' => function ($query) use ($request) {
          return $query->where('name', 'like', "%{$request->input('search')}%") // search with name
            ->orWhere('email', 'like', "%{$request->input('search')}%"); // search with email
        }]
      )->where('id', 3)->get();
    } else {
      $users = Role::with('users')->where('id', 3)->get(); // get user with id = 4 in roles table
    }
    return view('training-staffs.trainers.index', compact('users'));
  }
  public function trainersEdit($id)
  {
    $trainer = User::find($id);
    return view('training-staffs.trainers.edit', compact('trainer'));
  }
  public function trainersUpdate(Request $request, $id)
  {
    $data = $request->except('_token', '_method', 'course_id', 'password_confirmation');
    $data['password'] = bcrypt($data['password']);
    $trainee = User::find($id);
    $trainee->update($data);
    return redirect()->back()->with(['success' => 'Update Success!']);
  }
  public function trainersDestroy($id)
  {
    TrainerCourse::where('user_id', $id)->delete();
    $user = User::find($id);
    $user->roles()->detach();
    $user->delete();
    return redirect()->back()->with(['success' => 'Delete Success!']);
  }
  public function trainerAssignView($id)
  {
    $user = User::find($id);
    $trainerCourses = TrainerCourse::with('course')->where('user_id', $user->id)->get(); // get trainee course
    return view('training-staffs.trainers.assign', compact(['user', 'trainerCourses']));
  }
  // store assign for trainee with id=?
  public function trainerAssign(Request $request, $id)
  {
    $user = User::find($id); // find user with id
    $data = $request->except('_token');
    $user->trainerCourses()->create($data);
    return redirect()->back()->with(['success' => 'Add Success!']);
  }
  // delete trainee assign
  public function trainerAssignDelete($id, $course_id)
  {
    try {
      TrainerCourse::where('user_id', $id)
        ->where('course_id', $course_id)
        ->delete();
      return redirect()->back()->with(['success' => 'Delete Success!']);
    } catch (\Exception $e) {
      return $e . ' [Something error!]';
    }
  }
}
