<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Course;
class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::truncate();

        $data = [
            ['label' => 'BSIT', 'average_gpa' => 90, 'limit' => 10],
            ['label' => 'BSCS', 'average_gpa' => 95, 'limit' => 10],
            ['label' => 'BSIS', 'average_gpa' => 98, 'limit' => 10],
        ];

        foreach ($data as $key => $value) {
           Course::create([
                'label' => $value['label'],
                'average_gpa' => $value['average_gpa'],
                'limit' => $value['limit']
           ]);
        }
    }
}
