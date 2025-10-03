<?php

namespace App\Filament\Resources\AssignmentTypes\Pages;

use App\Filament\Resources\AssignmentTypes\AssignmentTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAssignmentTypes extends ListRecords
{
    protected static string $resource = AssignmentTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
