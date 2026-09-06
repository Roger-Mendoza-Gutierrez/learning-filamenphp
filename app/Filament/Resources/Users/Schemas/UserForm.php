<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Models\City;
use App\Models\State;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Collection;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
            Section::make('Personal Info')
                ->columns(3)
                ->columnSpan('full')
                ->schema([
                    TextInput::make('name')
                        ->required(),
                    TextInput::make('email')
                        ->label('Email address')
                        ->email()
                        ->required(),
                    // DateTimePicker::make('email_verified_at'),
                    TextInput::make('password')
                        ->password()
                        ->hiddenOn('edit')
                        ->required(),
                ]),
                Section::make('Address Info')
                    ->columns(3)
                    ->columnSpan('full')
                    ->schema([
                        //Este apartado es la relacion con la tabla de paises y users
                        Select::make('country_id')
                            ->relationship('country', 'name')
                            ->searchable()
                            ->preload()
                            ->live()
                            ->afterStateUpdated(function (Set $set) {
                                $set('state_id', null);
                                $set('city_id', null);
                            })
                            ->required(),
                        //Este apartado depende del Id del pais seleccionado
                        Select::make('state_id')
                            ->options(fn (Get $get): Collection => State::query()
                                ->where('country_id', $get('country_id'))
                                ->pluck('name', 'id'))
                            ->searchable()
                            ->afterStateUpdated(function (Set $set) {
                                $set('city_id', null);
                            })
                            ->preload()
                            //live() da acceso al estado ->Set o Get
                            ->live()
                            ->required(),
                        //Este apartado depende del Id del estado seleccionado
                        Select::make('city_id')
                            ->options(fn(Get $get): Collection => City::query()
                                ->where('state_id', $get('state_id'))
                                ->pluck('name', 'id'))
                            ->searchable()
                            ->preload()
                            ->required(),
                        TextInput::make('address')
                            ->required(),
                        TextInput::make('postal_code')
                            ->required(),
                ])
            ]);
    }
}
