<?php

use Illuminate\Database\Seeder;
use App\Course;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Advance Programing', 'created_at' => now(), 'updated_at' => now(), 'category_id' => 1],
            ['name' => 'IOT', 'created_at' => now(), 'updated_at' => now(), 'category_id' => 1],
            ['name' => 'Bussiness Intelligent', 'created_at' => now(), 'updated_at' => now(), 'category_id' => 2]
        ];
        Course::insert($data);
    }
}
