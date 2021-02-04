<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;

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
    $users = User::query();
    if ($request->has('search')) {
      $users = Role::with(
        ['users' => function ($query) use ($request) {
          return $query->where('name', 'like', '%' . $request->input('search') . '%');
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
    return 'success';
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
}
