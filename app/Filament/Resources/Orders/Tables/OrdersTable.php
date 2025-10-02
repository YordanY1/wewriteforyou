<?php

namespace App\Filament\Resources\Orders\Tables;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class OrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('reference_code')
                    ->label('Reference')
                    ->copyable()
                    ->sortable()
                    ->searchable(),

                TextColumn::make('user.name')
                    ->label('Client')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('email')
                    ->sortable()
                    ->toggleable(),

                // Order Status
                BadgeColumn::make('order_status')
                    ->label('Order Status')
                    ->colors([
                        'secondary' => 'draft',
                        'primary'   => 'in_progress',
                        'danger'    => 'revision_requested',
                        'success'   => 'completed',
                        'gray'      => 'cancelled',
                    ])
                    ->formatStateUsing(fn(string $state): string => ucfirst(str_replace('_', ' ', $state)))
                    ->sortable(),

                // Payment Status
                BadgeColumn::make('payment_status')
                    ->label('Payment')
                    ->colors([
                        'secondary' => 'unpaid',
                        'warning'   => 'awaiting',
                        'success'   => 'paid',
                        'danger'    => 'refunded',
                    ])
                    ->formatStateUsing(fn(string $state): string => ucfirst($state))
                    ->sortable(),

                TextColumn::make('final_price')
                    ->money('GBP')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('order_status')
                    ->label('Order Status')
                    ->options([
                        'draft' => 'Draft',
                        'in_progress' => 'In Progress',
                        'revision_requested' => 'Revision Requested',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ]),

                SelectFilter::make('payment_status')
                    ->label('Payment Status')
                    ->options([
                        'unpaid' => 'Unpaid',
                        'awaiting' => 'Awaiting',
                        'paid' => 'Paid',
                        'refunded' => 'Refunded',
                    ]),
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
