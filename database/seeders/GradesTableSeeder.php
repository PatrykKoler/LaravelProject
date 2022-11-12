<?php

namespace Database\Seeders;

use App\Models\Grades;
use Illuminate\Database\Seeder;

class GradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grades = [
            [
                'teacher_classes_id' => 2,
                'school_subject_id' => 3,
                'user_id' => 5,
                'note' => 4,
            ],
            [
                'teacher_classes_id' => 2,
                'school_subject_id' => 1,
                'user_id' => 6,
                'note' => 4,
            ],
            [
                'teacher_classes_id' => 1,
                'school_subject_id' => 2,
                'user_id' => 4,
                'note' => 1,
            ],
        ];
        foreach($grades as $key =>$value){
            Grades::create($value);
        }
    }
}
