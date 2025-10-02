<?php

// app/Filament/Resources/Orders/Schemas/OrderForm.php
namespace App\Filament\Resources\Orders\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DateTimePicker;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            TextInput::make('reference_code')
                ->disabled()
                ->dehydrated(false),

            // Order Status
            Select::make('order_status')
                ->label('Order Status')
                ->options([
                    'draft' => 'Draft',
                    'in_progress' => 'In Progress',
                    'revision_requested' => 'Revision Requested',
                    'completed' => 'Completed',
                    'cancelled' => 'Cancelled',
                ])
                ->required(),

            // Payment Status
            Select::make('payment_status')
                ->label('Payment Status')
                ->options([
                    'unpaid' => 'Unpaid',
                    'awaiting' => 'Awaiting',
                    'paid' => 'Paid',
                    'refunded' => 'Refunded',
                ])
                ->required(),

            // DateTimePicker::make('deadline_at')
            //     ->label('Deadline'),

            TextInput::make('final_price')
                ->numeric()
                ->prefix('£'),

            Textarea::make('instructions')
                ->rows(6),
        ]);
    }
}
