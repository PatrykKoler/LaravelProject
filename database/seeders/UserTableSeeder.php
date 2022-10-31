<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Enums\UserRole;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'admin',
                'email'=> 'admin@admin.pl',
                'role' => UserRole::ADMIN,
                'password'=> 'admin123',
            ],
            [
                'name' => 'teacher1',
                'email'=> 'teacher1@teach.pl',
                'role' => UserRole::TEACHER,
                'password'=> 'teacher123',
            ],
            [
                'name' => 'teacher2',
                'email'=> 'teacher2@teach.pl',
                'role' => UserRole::TEACHER,
                'password'=> 'teacher123',
            ],
            [
                'name' => 'student1',
                'email'=> 'student1@student.pl',
                'role' => UserRole::STUDENT,
                'password'=> 'student123',
            ],
            [
                'name' => 'student2',
                'email'=> 'student2@student.pl',
                'role' => UserRole::STUDENT,
                'password'=> 'student123',
            ],
            [
                'name' => 'student3',
                'email'=> 'student3@student.pl',
                'role' => UserRole::STUDENT,
                'password'=> 'student123',
            ],
            [
                'name' => 'student4',
                'email'=> 'student4@student.pl',
                'role' => UserRole::STUDENT,
                'password'=> 'student123',
            ],
        ];
        foreach($user as $key =>$value){
            User::create($value);
        }
    }
}
