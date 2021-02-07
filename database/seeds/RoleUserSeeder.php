<?php

use Illuminate\Database\Seeder;
use App\RoleUser;

class RoleUserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $data = [
      'id' => 1,
      'user_id' => 1,
      'role_id' => 1,
    ];
    RoleUser::create($data);
  }
}
