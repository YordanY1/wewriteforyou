<?php

namespace App\Filament\Resources\AssignmentTypes;

use App\Filament\Resources\AssignmentTypes\Pages\CreateAssignmentType;
use App\Filament\Resources\AssignmentTypes\Pages\EditAssignmentType;
use App\Filament\Resources\AssignmentTypes\Pages\ListAssignmentTypes;
use App\Filament\Resources\AssignmentTypes\Schemas\AssignmentTypeForm;
use App\Filament\Resources\AssignmentTypes\Tables\AssignmentTypesTable;
use App\Models\AssignmentType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AssignmentTypeResource extends Resource
{
    protected static ?string $model = AssignmentType::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return AssignmentTypeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AssignmentTypesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAssignmentTypes::route('/'),
            'create' => CreateAssignmentType::route('/create'),
            'edit' => EditAssignmentType::route('/{record}/edit'),
        ];
    }
}
