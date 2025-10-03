<?php

namespace App\Filament\Resources\AssignmentTypes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class AssignmentTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->label('Name'),

                TextInput::make('slug')
                    ->disabled()
                    ->dehydrated(false)
                    ->label('Slug'),

                Select::make('parent_id')
                    ->relationship('parent', 'name')
                    ->searchable()
                    ->preload()
                    ->label('Parent Type')
                    ->nullable(),
            ]);
    }
}
