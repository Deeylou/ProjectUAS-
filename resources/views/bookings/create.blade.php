@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="grid lg:grid-cols-2 gap-10 items-start">

        <!-- ===============================
                CARD LAPANGAN
        ================================ -->

        <div
            class="bg-white rounded-[30px] shadow-xl overflow-hidden border border-slate-200">

            <div class="relative">

                @if($court->image)

                    <img
                        src="{{ asset('storage/' . $court->image) }}"
                        alt="{{ $court->name }}"
                        class="w-full h-[420px] object-cover">

                @else

                    <div
                        class="w-full h-[420px] bg-slate-200 flex items-center justify-center text-slate-500 text-xl">

                        Tidak Ada Foto

                    </div>

                @endif

                <div class="absolute top-5 right-5">

                    <span
                        class="bg-emerald-600 text-white px-4 py-2 rounded-full shadow-lg text-sm font-semibold">

                        ● Tersedia

                    </span>

                </div>

            </div>


            <div class="p-8">

                <h1
                    class="text-4xl font-extrabold text-slate-800">

                    {{ $court->name }}

                </h1>

                <div class="flex items-center gap-1 mt-3 text-yellow-400 text-xl">

                    ⭐⭐⭐⭐⭐

                </div>

                <div class="mt-8 space-y-5">

                    <div
                        class="flex justify-between border-b pb-3">

                        <span
                            class="text-slate-500">

                            Jenis Lantai

                        </span>

                        <span
                            class="font-semibold">

                            {{ $court->floor_type }}

                        </span>

                    </div>

                    <div
                        class="flex justify-between border-b pb-3">

                        <span
                            class="text-slate-500">

                            Harga

                        </span>

                        <span
                            class="font-bold text-emerald-700 text-2xl">

                            Rp {{ number_format($court->price_per_hour,0,',','.') }}

                        </span>

                    </div>

                    <div
                        class="flex justify-between">

                        <span
                            class="text-slate-500">

                            Durasi

                        </span>

                        <span>

                            Per Jam

                        </span>

                    </div>

                </div>

            </div>

        </div>



        <!-- ===============================
                FORM BOOKING
        ================================ -->

        <div
            class="bg-white rounded-[30px] shadow-xl border border-slate-200 p-8">

            <h2
                class="text-4xl font-extrabold text-slate-800">

                Reservasi Lapangan

            </h2>

            <p
                class="text-slate-500 mt-3">

                Lengkapi data berikut untuk melakukan booking.

            </p>


            @if ($errors->any())

                <div
                    class="mt-6 rounded-2xl border border-red-300 bg-red-50 p-5">

                    <ul
                        class="list-disc ml-5 text-red-600 space-y-1">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif



            <form
                action="{{ route('booking.store',$court->id) }}"
                method="POST"
                class="mt-8 space-y-6">

                @csrf


                <!-- Tanggal -->

                <div>

                    <label
                        class="block mb-2 font-semibold text-slate-700">

                        📅 Tanggal Booking

                    </label>

                    <input
                        type="date"
                        name="booking_date"
                        value="{{ old('booking_date') }}"
                        min="{{ date('Y-m-d') }}"
                        required
                        class="w-full rounded-2xl border border-slate-300 px-5 py-4 focus:ring-4 focus:ring-emerald-100 focus:border-emerald-500 outline-none transition">

                </div>


                <!-- Jam Mulai -->

                <div>

                    <label
                        class="block mb-2 font-semibold text-slate-700">

                        🕒 Jam Mulai

                    </label>

                    <input
                        type="time"
                        name="start_time"
                        value="{{ old('start_time') }}"
                        step="1800"
                        required
                        class="w-full rounded-2xl border border-slate-300 px-5 py-4 focus:ring-4 focus:ring-emerald-100 focus:border-emerald-500 outline-none transition">

                </div>



                <!-- Jam Selesai -->

                <div>

                    <label
                        class="block mb-2 font-semibold text-slate-700">

                        🕓 Jam Selesai

                    </label>

                    <input
                        type="time"
                        name="end_time"
                        value="{{ old('end_time') }}"
                        step="1800"
                        required
                        class="w-full rounded-2xl border border-slate-300 px-5 py-4 focus:ring-4 focus:ring-emerald-100 focus:border-emerald-500 outline-none transition">

                </div>



                <!-- Info -->

                <div
                    class="rounded-2xl bg-slate-50 border border-slate-200 p-6">

                    <h3
                        class="font-bold text-lg text-slate-800">

                        📌 Informasi Penting

                    </h3>

                    <ul
                        class="mt-4 text-slate-600 space-y-2">

                        <li>✅ Jadwal yang bentrok akan otomatis ditolak.</li>

                        <li>✅ Bukti booking dapat diunduh dalam format PDF.</li>

                        <li>✅ Datang sesuai jadwal yang telah dipilih.</li>

                        <li>✅ Tunjukkan bukti booking kepada petugas.</li>

                    </ul>

                </div>



                <!-- Button -->

                <button
                    type="submit"
                    class="w-full py-4 rounded-2xl bg-gradient-to-r from-emerald-600 to-green-700 hover:opacity-90 text-white font-bold text-lg shadow-xl transition">

                    🚀 Booking Sekarang

                </button>

            </form>

        </div>

    </div>

</div>

@endsection
