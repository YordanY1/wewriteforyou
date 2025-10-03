<?php

namespace App\Filament\Resources\AcademicLevels;

use App\Filament\Resources\AcademicLevels\Pages\CreateAcademicLevel;
use App\Filament\Resources\AcademicLevels\Pages\EditAcademicLevel;
use App\Filament\Resources\AcademicLevels\Pages\ListAcademicLevels;
use App\Filament\Resources\AcademicLevels\Schemas\AcademicLevelForm;
use App\Filament\Resources\AcademicLevels\Tables\AcademicLevelsTable;
use App\Models\AcademicLevel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AcademicLevelResource extends Resource
{
    protected static ?string $model = AcademicLevel::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return AcademicLevelForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AcademicLevelsTable::configure($table);
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
            'index' => ListAcademicLevels::route('/'),
            'create' => CreateAcademicLevel::route('/create'),
            'edit' => EditAcademicLevel::route('/{record}/edit'),
        ];
    }
}
