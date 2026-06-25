<?php

namespace App\Filament\Resources\Bookings\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Schema;

class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Select::make('user_id')
                    ->label('Pemesan')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->required(),

                Select::make('court_id')
                    ->label('Lapangan')
                    ->relationship('court', 'name')
                    ->searchable()
                    ->required(),

                DatePicker::make('booking_date')
                    ->label('Tanggal Booking')
                    ->required(),

                TimePicker::make('start_time')
                    ->label('Jam Mulai')
                    ->required(),

                TimePicker::make('end_time')
                    ->label('Jam Selesai')
                    ->required(),

                TextInput::make('duration')
                    ->label('Durasi (Jam)')
                    ->numeric()
                    ->required(),

                TextInput::make('total_price')
                    ->label('Total Harga')
                    ->numeric()
                    ->prefix('Rp')
                    ->required(),

                Select::make('status')
                    ->label('Status')
                    ->options([
                        'pending'   => 'Pending',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->default('pending')
                    ->required(),

            ]);
    }
}

