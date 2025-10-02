<?php

namespace App\Filament\Resources\Orders\RelationManagers;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MessagesRelationManager extends RelationManager
{
    protected static string $relationship = 'messages';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('sender_type')
                    ->options([
                        'client' => 'Client',
                        'admin'  => 'Admin',
                    ])
                    ->required()
                    ->default('admin'),

                Textarea::make('message')
                    ->label('Message')
                    ->rows(4)
                    ->required(),

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('message')
            ->columns([
                TextColumn::make('message')
                    ->label('Message')
                    ->html()
                    ->limit(80)
                    ->wrap(),

                BadgeColumn::make('sender_type')
                    ->label('Sender')
                    ->colors([
                        'primary' => 'admin',
                    ])
                    ->formatStateUsing(fn(string $state): string => ucfirst($state)),

                IconColumn::make('is_read')
                    ->boolean()
                    ->label('Read'),

                TextColumn::make('created_at')
                    ->dateTime('d M Y H:i')
                    ->label('Sent At'),
            ])
            ->defaultSort('created_at', 'desc')
            ->headerActions([
                \Filament\Actions\CreateAction::make()
                    ->mutateFormDataUsing(function (array $data): array {
                        $data['sender_type'] = 'admin';
                        $data['is_read'] = false;
                        return $data;
                    })
                    ->label('Reply to client'),
            ]);
    }
}
