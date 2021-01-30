<?php

namespace App\Http\Controllers\Auth;

use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
  /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

  use AuthenticatesUsers;

  /**
   * Where to redirect users after login.
   *
   * @var string
   */
  protected $redirectTo = '/home';

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }

  public function showLoginForm()
  {
    return view('login');
  }
  public function login(Request $request)
  {
    $data = $request->only('email', 'password');
    if (\Auth::attempt($data)) {
      $request->session()->regenerate();
      $user = \Auth::user();
      // dd($user->toArray());
      $roles = $user->roles->pluck('id')->all(); // all() to cast colection to array
      // dd($roles);
      if (in_array(Role::ADMIN_ROLE, $roles)) {
        return redirect()->route('admin.roles.index');
      } elseif (in_array(Role::TRAINNE_ROLE, $roles)) {
        return redirect()->route('trainee.home');
      }
      return redirect('home');
    }
    return redirect()->back()->withInput()
      ->with(['error' => 'Wrong email or password !']);
  }
  public function logout(Request $request)
  {
    $this->guard()->logout();
    return redirect('/');
  }
}
