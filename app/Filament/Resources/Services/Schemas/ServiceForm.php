<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->label('Service Name'),

                TextInput::make('slug')
                    ->disabled()
                    ->dehydrated(false)  
                    ->label('Slug (auto)'),
            ]);
    }
}
