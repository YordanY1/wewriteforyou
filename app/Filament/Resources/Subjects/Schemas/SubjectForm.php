<?php

namespace App\Filament\Resources\Subjects\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use App\Models\Subject;

class SubjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->label('Subject Name'),

                TextInput::make('slug')
                    ->disabled()
                    ->dehydrated(false)
                    ->label('Slug (auto)'),

                TextInput::make('emoji')
                    ->label('Emoji')
                    ->maxLength(4)
                    ->hint('Optional — e.g. 🧠, ⚖️, 💼'),

                Select::make('parent_id')
                    ->label('Parent Category')
                    ->options(
                        Subject::whereNull('parent_id')
                            ->pluck('name', 'id')
                    )
                    ->searchable()
                    ->nullable()
                    ->hint('Leave empty for main categories'),
            ]);
    }
}
