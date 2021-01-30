<?php

namespace App\Providers;

use App\Course;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    //
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    // share courses list 
    view()->composer(['trainees.courses'], function ($view) {
      $view->with('courses', Course::all());
    });
  }
}
