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
                Select::make('type')
                    ->options([
                        'writing' => 'Writing',
                        'editing' => 'Editing',
                    ])
                    ->required()
                    ->default('writing')
                    ->label('Pricing Type'),

                TextInput::make('words')
                    ->required()
                    ->numeric()
                    ->label('Word Count'),

                TextInput::make('d7')
                    ->required()
                    ->numeric()
                    ->step(0.01)
                    ->placeholder('Price for 7 days')
                    ->label('7 Days'),

                TextInput::make('d3')
                    ->required()
                    ->numeric()
                    ->step(0.01)
                    ->placeholder('Price for 3 days')
                    ->label('3 Days'),

                TextInput::make('d2')
                    ->required()
                    ->numeric()
                    ->step(0.01)
                    ->placeholder('Price for 2 days')
                    ->label('2 Days'),

                TextInput::make('d1')
                    ->required()
                    ->numeric()
                    ->step(0.01)
                    ->placeholder('Price for 1 day')
                    ->label('1 Day'),

                TextInput::make('h12')
                    ->required()
                    ->numeric()
                    ->step(0.01)
                    ->placeholder('Price for 12 hours')
                    ->label('12 Hours'),

                Select::make('currency_id')
                    ->relationship('currency', 'code')
                    ->preload()
                    ->default(1)
                    ->required()
                    ->label('Currency'),
            ]);
    }
}
