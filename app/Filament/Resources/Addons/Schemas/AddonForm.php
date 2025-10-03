<?php

namespace App\Filament\Resources\Addons\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class AddonForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->label('Addon Name'),

                TextInput::make('slug')
                    ->disabled()   
                    ->dehydrated(false)
                    ->label('Slug (auto)'),

                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('£')
                    ->label('Price'),

                Select::make('currency_id')
                    ->relationship('currency', 'code')
                    ->searchable()
                    ->preload()
                    ->default(1)
                    ->required()
                    ->label('Currency'),
            ]);
    }
}
