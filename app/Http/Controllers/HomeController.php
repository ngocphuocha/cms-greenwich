<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    return view('home');
  }
  public function traineeHome()
  {
    return view('trainees.home');
  }
  public function trainerHome()
  {
    return view('trainers.home');
  }
  public function trainingstaffHome()
  {
    return view('training-staffs.home');
  }
}
