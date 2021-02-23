<?php

namespace App\Http\Middleware;

use App\Role;
use Closure;

class IsTrainer
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
      $user = \Auth::user();
      $roles = $user->roles->pluck('id')->all();
      if (in_array(Role::TRAINER_ROLE, $roles)) {
        return $next($request);
      }
      return redirect()->back()->with('error', 'You dont have permision!');
    }
    return redirect()->back()->with('error', 'You dont have permision!');
  }
}
