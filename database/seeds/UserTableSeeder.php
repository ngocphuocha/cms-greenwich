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
        'id' => '1',
        'name' => 'ngocphuoc',
        'email' => 'test@gmail.com',
        'email_verified_at' => now(),
        'password' => bcrypt('1234567'),
        'created_at' => now(),
        'updated_at' => now()
      ]
    ];
    User::insert($data);
    // factory(User::class, 40)->create();
  }
}
