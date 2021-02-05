<?php

namespace App\Http\Middleware;

use Closure;
use App\Role;

class EditTrainer
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
      $trainees = Role::with('users')->find(Role::TRAINER_ROLE); // get all id of trainee in users table
      // dd(\DB::getQueryLog());
      // dd($trainees->toArray());
      $trainees_id = $trainees->users->pluck('id')->toArray();
      // dd($trainees_id);
      if (in_array($id, $trainees_id)) {
        return $next($request);
      }
      return redirect()->back()->with(['error' => 'You have performed unauthorized action']);
    }
  }
}
