<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AcademicLevel;
use Illuminate\Support\Str;

class AcademicLevelSeeder extends Seeder
{
    public function run(): void
    {
        $levels = [
            'High School',
            'Bachelor’s',
            'Master’s',
            'PhD',
        ];

        foreach ($levels as $level) {
            AcademicLevel::create([
                'name' => $level,
                'slug' => Str::slug($level),
            ]);
        }
    }
}
