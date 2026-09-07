<?php

namespace App\Filament\Resources\Timesheets\Pages;

use App\Filament\Resources\Timesheets\TimesheetResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTimesheet extends ViewRecord
{
    protected static string $resource = TimesheetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
