<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Style;
use Illuminate\Support\Str;

class StyleSeeder extends Seeder
{
    public function run(): void
    {
        $styles = ['APA', 'MLA', 'Chicago', 'Harvard'];

        foreach ($styles as $style) {
            Style::create([
                'name' => $style,
                'slug' => Str::slug($style),
            ]);
        }
    }
}
