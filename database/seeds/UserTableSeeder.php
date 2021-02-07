<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $data = [
      [
        'name' => 'ngocphuoc',
        'email' => 'test@gmail.com',
        'email_verified_at' => now(),
        'password' => bcrypt('1234567'),
      ]
    ];
    User::create($data);
    // factory(User::class, 40)->create();
  }
}
