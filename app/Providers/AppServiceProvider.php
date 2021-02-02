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
    $this->app->bind(
      \App\Repositories\Interfaces\IUserRepository::class,
      \App\Repositories\UserRepository::class
    );
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
