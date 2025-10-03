<?php

namespace App\Filament\Resources\Styles\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StyleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->label('Style Name (e.g. APA, MLA, Harvard)'),

                TextInput::make('slug')
                    ->disabled() 
                    ->dehydrated(false)
                    ->label('Slug (auto)'),
            ]);
    }
}
