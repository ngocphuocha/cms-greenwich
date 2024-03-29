<?php

namespace App\Http\Middleware;

use App\Role;
use Closure;

class IsTrainingStaff
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
      // dd('d');
      $user = \Auth::user();
      // dd($user);
      $roles = $user->roles->pluck('id')->all();
      // dd($roles);
      if (in_array(Role::TRAINING_STAFF_ROLE, $roles)) {
        return $next($request);
      }
      return redirect()->back()->with(['error' => 'You dont have permission']);
    }
    return redirect()->back()->with(['error' => 'You dont have permission']);
  }
}
