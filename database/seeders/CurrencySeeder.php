<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('currencies')->insert([
            ['code' => 'GBP', 'symbol' => '£', 'name' => 'British Pound'],
            // ['code' => 'EUR', 'symbol' => '€', 'name' => 'Euro'],
            // ['code' => 'USD', 'symbol' => '$', 'name' => 'US Dollar'],
        ]);
    }
}
