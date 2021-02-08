<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\EditTraineeRequest;
use App\Http\Requests\EditUserRequest;
use App\Repositories\Interfaces\IUserRepository;

class UserController extends Controller
{
  private $userRepo;
  public function __construct(IUserRepository $userRepo)
  {
    $this->userRepo = $userRepo;
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $users = $this->userRepo->getAll(10);
    // dd($users->toArray());
    return view('admins.index', compact('users'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $roles = $this->userRepo->getRoles();
    // dd($roles->toArray());
    return view('admins.create', compact('roles'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CreateUserRequest $request)
  {
    $user = $this->userRepo->store($request);
    return redirect()->route('admin.users.index')->with(['success' => 'Success']);
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
    $roles = $this->userRepo->getRoles();
    $user = $this->userRepo->edit($id);
    // dd($user->roles);
    return view('admins.edit', compact('user', 'roles'));
  }

  public function traineeEdit($id)
  {
    $user = $this->userRepo->get($id);
    // dd($user->toArray());
    return view('trainees.edit', compact('user'));
  }
  public function trainerEdit($id)
  {
    $user = $this->userRepo->get($id);
    // dd($user->toArray());
    return view('trainers.edit', compact('user'));
  }
  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(EditUserRequest $request, $id)
  {
    $this->userRepo->update($request, $id);
    return redirect()->back()->with(['success' => 'Update success!']);
  }
  public function traineeUpdate(EditTraineeRequest $request, $id)
  {
    $data = $request->all();
    $data['password'] = bcrypt($data['password']);
    $user = User::find($id);
    $user->update($data);
    // dd($user->toArray());
    return view('trainees.success');
  }
  public function trainerUpdate(EditTraineeRequest $request, $id)
  {
    $data = $request->all();
    $data['password'] = bcrypt($data['password']);
    $user = User::find($id);
    $user->update($data);
    // dd($user->toArray());
    return view('trainers.success');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $this->userRepo->deleteUser($id);
    return redirect()->route('admin.users.index');
  }
  // detail trainee
  public function traineeDetail($id)
  {
    $user = $this->userRepo->get($id);
    // dd($user);
    return view('trainees.detail', compact('user'));
  }
}
