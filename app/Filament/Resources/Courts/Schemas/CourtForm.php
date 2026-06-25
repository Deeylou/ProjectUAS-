<?php

namespace App\Filament\Resources\Courts\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CourtForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Lapangan')
                    ->required(),

                TextInput::make('floor_type')
                    ->label('Jenis Lantai')
                    ->required(),

                TextInput::make('price_per_hour')
                    ->label('Harga per Jam')
                    ->numeric()
                    ->prefix('Rp')
                    ->required(),

                FileUpload::make('image')
                    ->label('Foto Lapangan')
                    ->image()
                    ->directory('courts')
                    ->disk('public')
                    ->imageEditor(),

                Toggle::make('is_active')
                    ->label('Status Aktif')
                    ->default(true),
            ]);
    }
}