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
                // ID и реф код
                TextColumn::make('id')
                    ->sortable()
                    ->toggleable()
                    ->label('#'),

                TextColumn::make('reference_code')
                    ->label('Reference')
                    ->copyable()
                    ->sortable()
                    ->searchable(),

                // Клиент
                TextColumn::make('user.name')
                    ->label('Client')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('email')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),

                // Assignment / Service / Subject
                TextColumn::make('assignmentType.name')
                    ->label('Assignment Type')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('service.name')
                    ->label('Service')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('subject.name')
                    ->label('Subject')
                    ->sortable()
                    ->toggleable(),

                // Academic level / Language / Style
                TextColumn::make('academicLevel.name')
                    ->label('Level')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('language.name')
                    ->label('Language')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('style.name')
                    ->label('Style')
                    ->sortable()
                    ->toggleable(),

                // Topic
                TextColumn::make('topic')
                    ->label('Topic')
                    ->limit(40)
                    ->sortable()
                    ->searchable()
                    ->toggleable(),

                // Words & Pages
                TextColumn::make('words')
                    ->sortable()
                    ->label('Words'),

                TextColumn::make('pages')
                    ->sortable()
                    ->label('Pages'),

                // Deadline
                TextColumn::make('deadline_option')
                    ->label('Deadline Option')
                    ->sortable(),

                TextColumn::make('deadline_at')
                    ->dateTime('d M Y H:i')
                    ->label('Deadline At')
                    ->sortable(),

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
                    ->sortable(),

                // Prices
                TextColumn::make('base_price')
                    ->money(fn($record) => $record->currency->code ?? 'GBP')
                    ->label('Base Price')
                    ->sortable(),

                TextColumn::make('final_price')
                    ->money(fn($record) => $record->currency->code ?? 'GBP')
                    ->label('Final Price')
                    ->sortable(),

                // Created At
                TextColumn::make('created_at')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->label('Created'),
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

                SelectFilter::make('service_id')
                    ->label('Service')
                    ->relationship('service', 'name'),

                SelectFilter::make('subject_id')
                    ->label('Subject')
                    ->relationship('subject', 'name'),

                SelectFilter::make('language_id')
                    ->label('Language')
                    ->relationship('language', 'name'),
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
