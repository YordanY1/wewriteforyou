<?php

namespace App\Filament\Resources\AcademicLevels\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AcademicLevelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->label('Level Name'),

                TextInput::make('slug')
                    ->disabled()      
                    ->dehydrated(false)
                    ->label('Slug (auto)'),
            ]);
    }
}
