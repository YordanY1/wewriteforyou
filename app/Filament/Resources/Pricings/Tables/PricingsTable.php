<?php

namespace App\Filament\Resources\Pricings\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class PricingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('type')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'writing' => 'primary',
                        'editing' => 'secondary',
                        default => 'gray',
                    })
                    ->sortable()
                    ->label('Type'),

                TextColumn::make('words')
                    ->numeric()
                    ->sortable()
                    ->label('Words'),

                TextColumn::make('d7')
                    ->numeric()
                    ->sortable()
                    ->label('7 Days'),

                TextColumn::make('d3')
                    ->numeric()
                    ->sortable()
                    ->label('3 Days'),

                TextColumn::make('d2')
                    ->numeric()
                    ->sortable()
                    ->label('2 Days'),

                TextColumn::make('d1')
                    ->numeric()
                    ->sortable()
                    ->label('1 Day'),

                TextColumn::make('h12')
                    ->numeric()
                    ->sortable()
                    ->label('12 Hours'),

                TextColumn::make('currency.code')
                    ->sortable()
                    ->label('Currency'),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Created'),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Updated'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
