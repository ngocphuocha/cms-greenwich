<?php

namespace App\Http\Middleware;

use Closure;
use App\Role;

class AdminEdit
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
    if (\Auth::check()) {
      $id = $request->segment(3);
      // dd($id);
      // \DB::enableQueryLog();
      $staffs = Role::with('users')->find(Role::TRAINING_STAFF_ROLE); // get all id of trainee in users table
      $trainers = Role::with('users')->find(Role::TRAINER_ROLE); // get all id of trainee in users table
      // dd(\DB::getQueryLog());
      // dd($trainees->toArray());
      $staffs_id = $staffs->users->pluck('id')->toArray();
      $trainers_id = $trainers->users->pluck('id')->toArray();
      $user_id = array_merge($trainers_id, $staffs_id);
      // dd($user_id);
      // dd($trainees_id);
      if (in_array($id, $user_id)) { // if id is trainer or staff , admin can edit, elseif can not
        return $next($request);
      }
      return redirect()->back()->with(['error' => 'Chơi vậy ai chơi!']);
    }
  }
}
