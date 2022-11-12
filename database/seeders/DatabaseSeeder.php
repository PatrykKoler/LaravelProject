<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(TeacherClassesTableSeeder::class);
        $this->call(StudentClassesTableSeeder::class);
        $this->call(SchoolSubjectTableSeeder::class);
        $this->call(GradesTableSeeder::class);
    }
}
