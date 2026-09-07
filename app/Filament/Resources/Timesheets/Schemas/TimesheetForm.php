<?php

namespace App\Filament\Resources\Timesheets\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class TimesheetForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('calendar_id')
                    ->relationship(name: 'calendar', titleAttribute: 'name')
                    ->required(),
                Select::make('user_id')
                    ->relationship(name: 'user', titleAttribute: 'name')
                    ->required(),
                Select::make('type')
                    ->options([
                        'work' => 'Working',
                        'pause' => 'In pause',
                    ])
                    ->required()
                    ->default('work'),
                DateTimePicker::make('day_in')
                    ->required(),
                DateTimePicker::make('day_out')
                    ->required(),
            ]);
    }
}
