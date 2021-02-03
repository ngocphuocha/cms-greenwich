<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;

interface IUserRepository
{
  // get user by id 
  public function get($id);
  // get all user
  public function getAll($paginate = null);

  // get roles of user for create form 
  public function getRoles();

  // store user 
  public function store(CreateUserRequest $request);

  // show form edit
  public function edit($id);
  // update user
  public function update(EditUserRequest $request, $id);

  // update trainee
  // public function updateTrainee()
  // delete user
  public function deleteUser($id);
}
