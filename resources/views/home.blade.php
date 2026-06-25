@extends('layouts.app')

@section('content')

<!-- ================= HERO ================= -->

<section class="relative overflow-hidden rounded-[32px] bg-gradient-to-br from-slate-900 via-emerald-800 to-green-700 shadow-2xl">

    <div class="absolute -top-20 -right-20 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>

    <div class="absolute -bottom-24 -left-24 w-80 h-80 bg-emerald-400/10 rounded-full blur-3xl"></div>

    <div class="relative grid lg:grid-cols-2 items-center gap-10 px-10 lg:px-16 py-16">

        <!-- Left -->

        <div>

            <span class="inline-flex items-center gap-2 bg-white/10 backdrop-blur px-4 py-2 rounded-full text-white">

                🏸 Reservasi Online Modern

            </span>

            <h1 class="mt-8 text-5xl lg:text-6xl font-extrabold text-white leading-tight">

                Booking

                <span class="text-amber-300">

                    Lapangan Badminton

                </span>

                Kini Lebih Mudah.

            </h1>

            <p class="mt-6 text-lg text-slate-200 leading-8">

                Pesan lapangan favorit Anda secara online dengan cepat,
                aman, dan praktis tanpa harus datang langsung ke lokasi.

            </p>

            <div class="mt-10 flex flex-wrap gap-4">

                @guest

                    <a href="{{ route('register') }}"
                       class="bg-amber-400 hover:bg-amber-500 transition px-7 py-4 rounded-xl font-bold text-black shadow-lg">

                        🚀 Mulai Sekarang

                    </a>

                @else

                    <a href="#lapangan"
                       class="bg-white hover:bg-slate-100 transition px-7 py-4 rounded-xl font-bold text-emerald-700 shadow-lg">

                        🏸 Booking Sekarang

                    </a>

                @endguest

            </div>

        </div>



        <!-- Right -->

        <div class="hidden lg:flex justify-center">

            <img
                src="https://images.unsplash.com/photo-1626224583764-f87db24ac4ea?w=900"
                class="rounded-3xl shadow-2xl object-cover h-[420px] w-full"
            >

        </div>

    </div>

</section>



<!-- ================= STATISTIC ================= -->

<section class="grid md:grid-cols-4 gap-6 mt-10">

    <div class="bg-white rounded-3xl shadow-lg p-8 text-center">

        <div class="text-5xl">

            🏸

        </div>

        <h2 class="text-4xl font-black text-emerald-700 mt-3">

            {{ $courts->count() }}

        </h2>

        <p class="text-slate-500 mt-2">

            Total Lapangan

        </p>

    </div>



    <div class="bg-white rounded-3xl shadow-lg p-8 text-center">

        <div class="text-5xl">

            ⚡

        </div>

        <h2 class="text-4xl font-black text-emerald-700 mt-3">

            Fast

        </h2>

        <p class="text-slate-500 mt-2">

            Booking Dalam Hitungan Menit

        </p>

    </div>



    <div class="bg-white rounded-3xl shadow-lg p-8 text-center">

        <div class="text-5xl">

            🔒

        </div>

        <h2 class="text-4xl font-black text-emerald-700 mt-3">

            Secure

        </h2>

        <p class="text-slate-500 mt-2">

            Data Aman & Terlindungi

        </p>

    </div>



    <div class="bg-white rounded-3xl shadow-lg p-8 text-center">

        <div class="text-5xl">

            📄

        </div>

        <h2 class="text-4xl font-black text-emerald-700 mt-3">

            PDF

        </h2>

        <p class="text-slate-500 mt-2">

            Bukti Booking Otomatis

        </p>

    </div>

</section>



<!-- ================= FEATURE ================= -->

<section class="mt-20">

    <div class="text-center">

        <h2 class="text-5xl font-extrabold text-slate-800">

            Kenapa Memilih Kami?

        </h2>

        <p class="text-slate-500 mt-4">

            Sistem dibuat untuk memberikan pengalaman reservasi yang nyaman.

        </p>

    </div>

    <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-8 mt-12">

        <div class="bg-white rounded-3xl p-8 shadow-lg hover:-translate-y-2 transition">

            <div class="text-6xl">

                ⚡

            </div>

            <h3 class="font-bold text-2xl mt-5">

                Cepat

            </h3>

            <p class="text-slate-500 mt-3">

                Booking hanya membutuhkan beberapa langkah.

            </p>

        </div>



        <div class="bg-white rounded-3xl p-8 shadow-lg hover:-translate-y-2 transition">

            <div class="text-6xl">

                🔒

            </div>

            <h3 class="font-bold text-2xl mt-5">

                Aman

            </h3>

            <p class="text-slate-500 mt-3">

                Seluruh data reservasi tersimpan dengan baik.

            </p>

        </div>



        <div class="bg-white rounded-3xl p-8 shadow-lg hover:-translate-y-2 transition">

            <div class="text-6xl">

                📱

            </div>

            <h3 class="font-bold text-2xl mt-5">

                Responsive

            </h3>

            <p class="text-slate-500 mt-3">

                Nyaman digunakan di desktop maupun smartphone.

            </p>

        </div>



        <div class="bg-white rounded-3xl p-8 shadow-lg hover:-translate-y-2 transition">

            <div class="text-6xl">

                📄

            </div>

            <h3 class="font-bold text-2xl mt-5">

                Bukti Digital

            </h3>

            <p class="text-slate-500 mt-3">

                Download bukti booking dalam format PDF.

            </p>

        </div>

    </div>

</section>



<!-- ================= LAPANGAN ================= -->

<section id="lapangan" class="mt-24">

    <div class="flex justify-between items-end">

        <div>

            <h2 class="text-5xl font-extrabold text-slate-800">

                Daftar Lapangan

            </h2>

            <p class="text-slate-500 mt-3">

                Pilih lapangan terbaik dan lakukan reservasi sekarang.

            </p>

        </div>

    </div>

</section>



<div class="grid md:grid-cols-2 xl:grid-cols-3 gap-10 mt-10">

    @forelse($courts as $court)

        <div class="bg-white rounded-[28px] overflow-hidden shadow-lg hover:shadow-2xl hover:-translate-y-2 transition duration-300">

            <div class="relative">

                @if($court->image)

                    <img
                        src="{{ asset('storage/'.$court->image) }}"
                        class="w-full h-64 object-cover"
                    >

                @else

                    <div class="w-full h-64 bg-slate-200 flex items-center justify-center">

                        Tidak Ada Foto

                    </div>

                @endif

                <div class="absolute top-4 right-4">

                    <span class="bg-emerald-500 text-white px-4 py-2 rounded-full text-sm shadow">

                        ● Tersedia

                    </span>

                </div>

            </div>

            <div class="p-7">

                <h3 class="text-3xl font-bold text-slate-800">

                    {{ $court->name }}

                </h3>

                <p class="mt-4 text-slate-600">

                    🏸

                    {{ $court->floor_type }}

                </p>

                <div class="mt-6 flex justify-between items-center">

                    <div>

                        <div class="text-slate-400 text-sm">

                            Harga

                        </div>

                        <div class="text-2xl font-extrabold text-emerald-700">

                            Rp {{ number_format($court->price_per_hour,0,',','.') }}

                        </div>

                    </div>

                    <div class="text-slate-500">

                        /Jam

                    </div>

                </div>

                <div class="mt-8">

                    @auth

                        <a
                            href="{{ route('booking.create',$court->id) }}"
                            class="block text-center bg-gradient-to-r from-emerald-600 to-green-700 hover:opacity-90 text-white py-4 rounded-xl font-bold shadow-lg">

                            Booking Sekarang

                        </a>

                    @else

                        <a
                            href="{{ route('login') }}"
                            class="block text-center bg-sky-600 hover:bg-sky-700 text-white py-4 rounded-xl font-bold">

                            Login Untuk Booking

                        </a>

                    @endauth

                </div>

            </div>

        </div>

    @empty

        <div class="col-span-3">

            <div class="bg-yellow-50 border border-yellow-300 rounded-3xl p-10 text-center text-yellow-700">

                Belum ada lapangan yang tersedia.

            </div>

        </div>

    @endforelse

</div>



<!-- ================= CTA ================= -->

<section class="mt-24 mb-10">

    <div class="rounded-[32px] bg-gradient-to-r from-emerald-700 to-green-700 p-14 text-center text-white shadow-2xl">

        <h2 class="text-5xl font-extrabold">

            Siap Bermain Hari Ini?

        </h2>

        <p class="mt-5 text-lg text-green-100">

            Lakukan reservasi sekarang dan nikmati pengalaman bermain badminton tanpa ribet.

        </p>

        <div class="mt-8">

            @guest

                <a
                    href="{{ route('register') }}"
                    class="bg-amber-400 hover:bg-amber-500 px-8 py-4 rounded-xl text-black font-bold inline-block">

                    Daftar Sekarang

                </a>

            @else

                <a
                    href="#lapangan"
                    class="bg-white hover:bg-slate-100 px-8 py-4 rounded-xl text-emerald-700 font-bold inline-block">

                    Lihat Lapangan

                </a>

            @endguest

        </div>

    </div>

</section>

@endsection

