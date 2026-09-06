<?php

namespace App\Filament\Resources\Countries\Schemas;

use App\Models\Country;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CountryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('iso2'),
                TextEntry::make('iso3'),
                TextEntry::make('numeric_code')
                    ->placeholder('-'),
                TextEntry::make('phonecode')
                    ->placeholder('-'),
                TextEntry::make('capital')
                    ->placeholder('-'),
                TextEntry::make('currency')
                    ->placeholder('-'),
                TextEntry::make('currency_name')
                    ->placeholder('-'),
                TextEntry::make('currency_symbol')
                    ->placeholder('-'),
                TextEntry::make('tld')
                    ->placeholder('-'),
                TextEntry::make('native')
                    ->placeholder('-'),
                TextEntry::make('region')
                    ->placeholder('-'),
                TextEntry::make('subregion')
                    ->placeholder('-'),
                TextEntry::make('timezones')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('translations')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('latitude')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('longitude')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('emoji')
                    ->placeholder('-'),
                TextEntry::make('emojiU')
                    ->placeholder('-'),
                IconEntry::make('flag')
                    ->boolean(),
                IconEntry::make('is_active')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (Country $record): bool => $record->trashed()),
            ]);
    }
}
