@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6">

    Booking Saya

</h1>

@if($bookings->count())

<table class="w-full bg-white shadow rounded">

    <thead class="bg-green-700 text-white">

        <tr>

            <th class="p-3">Lapangan</th>

            <th class="p-3">Tanggal</th>

            <th class="p-3">Jam</th>

            <th class="p-3">Durasi</th>

            <th class="p-3">Total</th>

            <th class="p-3">Status</th>

        </tr>

    </thead>

    <tbody>

    @foreach($bookings as $booking)

        <tr class="border-b text-center">

            <td class="p-3">

                {{ $booking->court->name }}

            </td>

            <td class="p-3">

                {{ $booking->booking_date }}

            </td>

            <td class="p-3">

                {{ $booking->start_time }}

                -

                {{ $booking->end_time }}

            </td>

            <td class="p-3">

                {{ $booking->duration }} Jam

            </td>

            <td class="p-3">

                Rp {{ number_format($booking->total_price,0,',','.') }}

            </td>

            <td class="p-3">

                @if($booking->status == 'pending')

                    <span class="bg-yellow-400 px-3 py-1 rounded">

                        Pending

                    </span>

                @elseif($booking->status == 'paid')

                    <span class="bg-blue-500 text-white px-3 py-1 rounded">

                        Paid

                    </span>

                @elseif($booking->status == 'completed')

                    <span class="bg-green-500 text-white px-3 py-1 rounded">

                        Completed

                    </span>

                @else

                    <span class="bg-red-500 text-white px-3 py-1 rounded">

                        Cancelled

                    </span>

                @endif

            </td>

        </tr>

    @endforeach

    </tbody>

</table>

@else

<div class="bg-yellow-100 p-5 rounded">

    Anda belum memiliki booking.

</div>

@endif

@endsection