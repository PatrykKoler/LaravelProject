<?php

namespace Database\Seeders;

use App\Models\School_subject;
use Illuminate\Database\Seeder;

class SchoolSubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $school_subject = [
            [
                'name' => 'J. Polski'
            ],
            [
                'name' => 'Matematyka'
            ],
            [
                'name' => 'Historia'
            ],
            [
                'name' => 'Przyroda'
            ],
        ];
        foreach($school_subject as $key =>$value){
            School_subject::create($value);
        }
    }
}
