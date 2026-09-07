<?php

namespace App\Filament\Resources\Departaments\Pages;

use App\Filament\Resources\Departaments\DepartamentResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewDepartament extends ViewRecord
{
    protected static string $resource = DepartamentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
