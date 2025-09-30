<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CurrencySeeder::class,
            AssignmentTypeSeeder::class,
            ServiceSeeder::class,
            AcademicLevelSeeder::class,
            SubjectSeeder::class,
            LanguageSeeder::class,
            StyleSeeder::class,
            AddonSeeder::class,
            PricingSeeder::class,
        ]);
    }
}
