<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
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
        'name' => 'IT',
        'created_at' => now(),
        'updated_at' => now()
      ],
      [
        'name' => 'Bussiness',
        'created_at' => now(),
        'updated_at' => now()
      ]
    ];
    Category::insert($data);
  }
}
