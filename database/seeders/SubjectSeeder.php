<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;
use Illuminate\Support\Str;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        $subjects = [
            'English',
            'History',
            'Law',
            'Business',
            'Psychology',
        ];

        foreach ($subjects as $subject) {
            Subject::create([
                'name' => $subject,
                'slug' => Str::slug($subject),
            ]);
        }
    }
}
