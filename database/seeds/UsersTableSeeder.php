<?php

use Illuminate\Database\Seeder;
use App\Dept;
use App\Grade;
use App\Semester;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 
        //factory(\App\User::class,15)->create();
        $user = \App\User::create([
            'name' => 'super',
            'universit_id' =>'emp',
            'user_type' => 'admin',
            'email' => 'mostafa@gmail.com',
            'password' => '$2y$10$4z1W27WZrd3GOPuD5smGe.vED7/piDY3vCflCO4xo6eQizGppCGe6',
            'gender' => 'ذكر',
            'images' => '1572511505.jpg',
            'dept_id' => factory(Dept::class)->create(),
            'grade_id' => factory(Grade::class)->create(),
            'semester_id' => factory(Semester::class)->create(),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
