<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Language;
use Illuminate\Support\Str;

class LanguageSeeder extends Seeder
{
    public function run(): void
    {
        $languages = [
            ['name' => 'English (UK)', 'code' => 'en-uk'],
            ['name' => 'English (US)', 'code' => 'en-us'],
        ];

        foreach ($languages as $language) {
            Language::create([
                'name' => $language['name'],
                'code' => $language['code'],
            ]);
        }
    }
}
