<?php

namespace App\Services;

use App\Repositories\Interfaces\IUserRepository;
use App\Exceptions\UserException;
use Illuminate\Http\Request;
use App\Role;

class UserService
{
  private $userRepository;
  public function __construct(IUserRepository $userRepository)
  {
    $this->userRepository = $userRepository;
  }
  public function show($id)
  {
    $user = $this->userRepository->get($id);
    if (!$user) {
      throw new UserException();
    }
    // Default
    return $user;
  }
  public function traineeSearch(Request $request)
  {
    if ($request->has('search')) {
      $users = Role::with(
        ['users' => function ($query) use ($request) {
          return $query->where('name', 'like', "%{$request->input('search')}%") // search with name
            ->orWhere('email', 'like', "%{$request->input('search')}%"); // search with email
        }]
      )->where('id', 4)->get();
      // dd($users->first()->users->count());
      if ($users->first()->users->isEmpty()) { // if is empty will throw exception
        throw new UserException;
      }
    } else {
      $users = Role::with('users')->where('id', 4)->get(); // get user with id = 4 in roles table
    }
    return $users;
  }
}
