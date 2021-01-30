<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
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
        'name' => 'Admin',
        'created_at' => now(),
        'updated_at' => now()
      ],
      [
        'name' => 'Trainning Staff',
        'created_at' => now(),
        'updated_at' => now()
      ],
      [
        'name' => 'Trainer',
        'created_at' => now(),
        'updated_at' => now()
      ],
      [
        'name' => 'Trainee',
        'created_at' => now(),
        'updated_at' => now()
      ]
    ];
    Role::insert($data);
  }
}
