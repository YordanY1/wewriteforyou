<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        Service::insert([
            ['name' => 'Writing', 'slug' => 'writing'],
            ['name' => 'Editing', 'slug' => 'editing'],
            ['name' => 'Proofreading', 'slug' => 'proofreading'],
        ]);
    }
}
