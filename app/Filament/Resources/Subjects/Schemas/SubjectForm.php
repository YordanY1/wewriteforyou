<?php

namespace App\Filament\Resources\Subjects\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SubjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->label('Subject Name'),

                TextInput::make('slug')
                    ->disabled()    
                    ->dehydrated(false)
                    ->label('Slug (auto)'),
            ]);
    }
}
