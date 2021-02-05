<?php

namespace App\Http\Middleware;

use Closure;

class IsOwner
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
      $userId = \Auth::id();
      $id = $request->segment(3);
      // dd($id);
      // dd($userId, $id);
      if ($userId == $id) {
        return $next($request);
      }
      return redirect()->back()->with(['error' => 'You dont have permission!']);
    }
    return redirect()->back()->with(['error' => 'You dont have permission!']);
  }
}
