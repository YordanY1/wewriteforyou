<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AssignmentType;

class AssignmentTypeSeeder extends Seeder
{
    public function run(): void
    {
        $assignment = AssignmentType::create([
            'name' => 'Assignment',
            'slug' => 'assignment',
        ]);

        $homework = AssignmentType::create([
            'name' => 'Homework',
            'slug' => 'homework',
        ]);

        $questions = AssignmentType::create([
            'name' => 'Questions',
            'slug' => 'questions',
        ]);

        AssignmentType::insert([
            ['name' => 'Essay', 'slug' => 'essay', 'parent_id' => $assignment->id],
            ['name' => 'Research Paper', 'slug' => 'research-paper', 'parent_id' => $assignment->id],
            ['name' => 'Case Study', 'slug' => 'case-study', 'parent_id' => $assignment->id],
        ]);

        AssignmentType::insert([
            ['name' => 'Lab Report', 'slug' => 'lab-report', 'parent_id' => $homework->id],
            ['name' => 'Math Problems', 'slug' => 'math-problems', 'parent_id' => $homework->id],
        ]);

        AssignmentType::insert([
            ['name' => 'Multiple Choice', 'slug' => 'multiple-choice', 'parent_id' => $questions->id],
            ['name' => 'Short Answer', 'slug' => 'short-answer', 'parent_id' => $questions->id],
        ]);
    }
}
