<?php

namespace App\Repositories;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Repositories\Interfaces\IUserRepository;
use App\User;
use App\Role;

class UserRepository implements IUserRepository
{
  // get user by id
  public function get($id)
  {
    return User::find($id);
  }
  // get all user
  public function getAll()
  {
    // get all user but not get admin user with role_id is 1
    return User::where('id', '<>', 1)->paginate(8); // get user with paginate(8 users in 1 page)
  }
  public function getRoles()
  {
    return Role::where('id', '<>', 1)->get(); // return role not have id = 1
  }

  // store user
  public function store(CreateUserRequest $request)
  {
    $data = $request->all();
    // dd($data['role_id']);
    $data['password'] = bcrypt($data['password']);
    $user = User::create($data);
    $user->roles()->attach($request->role_id, ['created_at' => now(), 'updated_at' => now()]);
    // $user->roles()->attach([]);
  }
  public function edit($id)
  {
    return User::with('roles')->find($id);
  }
  public function update(EditUserRequest $request, $id)
  {
    $user = $this->get($id);
    $data = $request->except('_token', '_method', 'role_id');
    $data['password']  = bcrypt($data['password']);
    $user->update($data);
    $user->roles()->sync($request->role_id);
  }
}
