<?php

namespace App\Repositories;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Repositories\Interfaces\IUserRepository;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;

class UserRepository implements IUserRepository
{
  // declare model
  protected $user;
  protected $role;
  public function __construct(User $user, Role $role)
  {
    $this->user = $user;
    $this->role = $role;
  }
  // get user by id
  public function get($id)
  {
    return $this->user->find($id);
  }
  // get all user
  public function getAll($paginate = null)
  {
    /* get all user but not get admin user with role_id is 1
    /* get user with paginate(8 users in 1 page)
    **/
    // return User::where('id', '<>', 1)->paginate(8);
    $users = $this->role->with('users')->whereIn('id', [2, 3])->paginate(8);
    // dd($users->toArray());
    return $users;
  }
  public function getRoles()
  {
    return $this->role->whereIn('id',  [2, 3])->get();
    // return Role::where('id', '<>', 1)->get(); // return role not have id = 1
  }

  // store user
  public function store(CreateUserRequest $request)
  {
    $data = $request->all();
    dd($data);
    $data['password'] = bcrypt($data['password']);
    $user = $this->user->create($data);
    $user->roles()->attach($request->role_id, ['created_at' => now(), 'updated_at' => now()]);
  }
  public function edit($id)
  {
    return $this->user->with('roles')->find($id);
  }
  // update user 
  public function update(EditUserRequest $request, $id)
  {
    $user = $this->get($id);
    $data = $request->except('_token', '_method', 'role_id');
    $data['password']  = bcrypt($data['password']);
    DB::transaction(function () use ($user, $data, $request) {
      $user->update($data);
      $user->roles()->sync($request->role_id);
    });
  }
  // delete user with id
  public function deleteUser($id)
  {
    try {
      $user = $this->get($id);
      $user->roles()->detach();
      $user->delete();
    } catch (\Exception $e) {
      return $e . ' [Can not delete this user (May be this user has been assign to course)]';
    }
  }
}
