<?php

namespace Database\Seeders;

use App\Models\Teacher_classes;
use Illuminate\Database\Seeder;

class TeacherClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teacher_classes = [
            [
                'class_name' => '2A',
                'user_id'=> 2,
            ],
            [
                'class_name' => '3C',
                'user_id'=> 3,
            ],
        ];
        foreach($teacher_classes as $key =>$value){
            Teacher_classes::create($value);
        }
    }
}
