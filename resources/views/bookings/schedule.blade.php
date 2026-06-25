@extends('layouts.app')

@section('content')

<div class="mb-8">

    <h1 class="text-4xl font-bold text-slate-800">

        📅 Jadwal Booking Lapangan

    </h1>

    <p class="mt-2 text-slate-500">

        Daftar jadwal lapangan yang telah dipesan oleh pengguna.

    </p>

</div>


@if ($bookings->isEmpty())

    <div class="bg-yellow-50 border border-yellow-300 rounded-2xl p-8 text-center">

        <h2 class="text-2xl font-semibold text-yellow-700">

            Belum Ada Booking

        </h2>

        <p class="text-slate-600 mt-2">

            Saat ini belum terdapat jadwal booking.

        </p>

    </div>

@else

<div class="bg-white rounded-3xl shadow-lg border border-slate-200 overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-gradient-to-r from-emerald-700 to-green-600 text-white">

                <tr>

                    <th class="px-5 py-4 text-center">

                        No

                    </th>

                    <th class="px-5 py-4 text-left">

                        Tanggal

                    </th>

                    <th class="px-5 py-4 text-left">

                        Lapangan

                    </th>

                    <th class="px-5 py-4 text-left">

                        Pemesan

                    </th>

                    <th class="px-5 py-4 text-left">

                        Jam

                    </th>

                    <th class="px-5 py-4 text-left">

                        Total

                    </th>

                    <th class="px-5 py-4 text-center">

                        Status

                    </th>

                </tr>

            </thead>

            <tbody>

                @foreach ($bookings as $booking)

                    <tr class="border-b hover:bg-slate-50 transition">

                        <td class="px-5 py-4 text-center font-semibold">

                            {{ $loop->iteration }}

                        </td>

                        <td class="px-5 py-4">

                            {{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}

                        </td>

                        <td class="px-5 py-4 font-semibold text-slate-800">

                            {{ $booking->court->name }}

                        </td>

                        <td class="px-5 py-4">

                            {{ $booking->user->name }}

                        </td>

                        <td class="px-5 py-4">

                            {{ substr($booking->start_time, 0, 5) }}
                            -
                            {{ substr($booking->end_time, 0, 5) }}

                        </td>

                        <td class="px-5 py-4 font-bold text-emerald-700">

                            Rp {{ number_format($booking->total_price, 0, ',', '.') }}

                        </td>

                        <td class="px-5 py-4 text-center">

                            @if($booking->status == 'completed')

                                <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-semibold">

                                    Completed

                                </span>

                            @elseif($booking->status == 'pending')

                                <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm font-semibold">

                                    Pending

                                </span>

                            @elseif($booking->status == 'cancelled')

                                <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm font-semibold">

                                    Cancelled

                                </span>

                            @else

                                <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-sm font-semibold">

                                    {{ ucfirst($booking->status) }}

                                </span>

                            @endif

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endif

@endsection
