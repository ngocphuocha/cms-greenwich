<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests\EditTraineeRequest;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // \DB::enableQueryLog();
    $users = User::where('id', '<>', 1)->paginate(8);
    // dd(\DB::getQueryLog());
    return view('admins.index', compact('users'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $roles = Role::all();
    return view('admins.create', compact('roles'));
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
    // dd($data['role_id']);
    $data['password'] = bcrypt($data['password']);
    $user = User::create($data);
    $user->roles()->attach($data['role_id'], ['created_at' => now(), 'updated_at' => now()]);
    // $user->roles()->attach([]);
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
    $roles = Role::all();
    $user = User::with('roles')->find($id);
    // dd($user->roles);
    return view('admins.edit', compact('user', 'roles'));
  }

  public function traineeEdit($id)
  {
    $user = User::find($id);
    // dd($user->toArray());
    return view('trainees.edit', compact('user'));
  }
  public function trainerEdit($id)
  {
    $user = User::find($id);
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
  public function update(Request $request, $id)
  {
    $user = User::find($id);
    $data = $request->except('_token', '_method', 'role_id');
    $data['password']  = bcrypt($data['password']);
    $user->update($data);
    $user->roles()->sync($request->role_id);
    return view('admins.success');
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
    try {
      $user = User::find($id);
      $user->roles()->detach();
      $user->delete();
    } catch (\Exception $e) {
      return 'Can not delete this user (May be this user has been assign to course)';
    }
    return redirect()->route('admin.users.index');
  }
}
