<?php

namespace App\Filament\Resources\Departaments;

use App\Filament\Resources\Departaments\Pages\CreateDepartament;
use App\Filament\Resources\Departaments\Pages\EditDepartament;
use App\Filament\Resources\Departaments\Pages\ListDepartaments;
use App\Filament\Resources\Departaments\Pages\ViewDepartament;
use App\Filament\Resources\Departaments\Schemas\DepartamentForm;
use App\Filament\Resources\Departaments\Schemas\DepartamentInfolist;
use App\Filament\Resources\Departaments\Tables\DepartamentsTable;
use App\Models\Departament;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DepartamentResource extends Resource
{
    protected static ?string $model = Departament::class;

    protected static string|\UnitEnum|null $navigationGroup = 'Sistem Management';
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-building-office';
    protected static ?int $navigationSort = 4;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return DepartamentForm::configure($schema);
        
    }

    public static function infolist(Schema $schema): Schema
    {
        return DepartamentInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DepartamentsTable::configure($table);
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
            'index' => ListDepartaments::route('/'),
            'create' => CreateDepartament::route('/create'),
            'view' => ViewDepartament::route('/{record}'),
            'edit' => EditDepartament::route('/{record}/edit'),
        ];
    }
}
