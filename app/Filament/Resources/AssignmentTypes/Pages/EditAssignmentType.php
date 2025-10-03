<?php

namespace App\Filament\Resources\AssignmentTypes\Pages;

use App\Filament\Resources\AssignmentTypes\AssignmentTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAssignmentType extends EditRecord
{
    protected static string $resource = AssignmentTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
