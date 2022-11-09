<?php

namespace Database\Seeders;

use App\Models\Student_classes;
use Illuminate\Database\Seeder;

class StudentClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student_classes = [
            [
                'teacher_classes_id' => 1,
                'user_id'=> 4,
            ],
            [
                'teacher_classes_id' => 2,
                'user_id'=> 5,
            ],
            [
                'teacher_classes_id' => 2,
                'user_id'=> 6,
            ],
        ];
        foreach($student_classes as $key =>$value){
            Student_classes::create($value);
        }
    }
}
