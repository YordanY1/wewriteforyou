<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddonSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('addons')->insert([
            ['name' => '1-page abstract', 'slug' => 'abstract', 'price' => 9.99],
            ['name' => 'Graphics and tables', 'slug' => 'graphics', 'price' => 8.99],
            ['name' => 'Detailed outline', 'slug' => 'outline', 'price' => 8.99],
        ]);
    }
}
