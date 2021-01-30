<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;

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

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $user = User::find($id);
    $user->roles()->detach();
    $user->delete();
    return redirect()->route('admin.users.index');
  }
}