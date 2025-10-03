<?php

namespace App\Filament\Resources\Pricings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PricingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('words')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('d7')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('d3')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('d2')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('d1')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('h12')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('currency_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
