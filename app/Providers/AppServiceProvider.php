<?php

namespace App\Providers;

use App\Category;
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
    view()->composer(['trainees.courses', 'training-staffs.assign', 'training-staffs.trainers.assign', 'trainers.courses'], function ($view) {
      $view->with('courses', Course::all());
    });
    // share categories
    view()->composer(['training-staffs.course', 'training-staffs.course-edit'], function ($view) {
      $view->with('categories', Category::all());
    });
  }
}
