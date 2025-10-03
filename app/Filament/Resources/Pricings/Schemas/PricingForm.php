<?php

namespace App\Filament\Resources\Pricings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class PricingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('words')
                    ->required()
                    ->numeric(),

                TextInput::make('d7')
                    ->required()
                    ->numeric(),

                TextInput::make('d3')
                    ->required()
                    ->numeric(),

                TextInput::make('d2')
                    ->required()
                    ->numeric(),

                TextInput::make('d1')
                    ->required()
                    ->numeric(),

                TextInput::make('h12')
                    ->required()
                    ->numeric(),

                Select::make('currency_id')
                    ->relationship('currency', 'code')
                    ->preload()
                    ->default(1)
                    ->required()
                    ->label('Currency'),
            ]);
    }
}
