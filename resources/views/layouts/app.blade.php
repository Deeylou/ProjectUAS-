<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Badminton Booking</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-slate-100 text-slate-800 min-h-screen flex flex-col">



    <!-- ===========================
            NAVBAR
    ============================ -->

    <header
        class="sticky top-0 z-50 backdrop-blur-lg bg-white/80 border-b border-slate-200 shadow-sm">

        <div class="max-w-7xl mx-auto px-6">

            <div class="h-20 flex justify-between items-center">

                <!-- Logo -->

                <a href="{{ route('home') }}"
                   class="flex items-center gap-3">

                    <div
                        class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-600 to-green-700 flex items-center justify-center text-white text-2xl shadow-lg">

                        🏸

                    </div>

                    <div>

                        <h1
                            class="text-xl font-extrabold text-slate-800">

                            Badminton Booking

                        </h1>

                        <p
                            class="text-xs text-slate-500">

                            Online Reservation System

                        </p>

                    </div>

                </a>



                <!-- Menu -->

                <nav
                    class="flex items-center gap-6">

                    <a
                        href="{{ route('home') }}"
                        class="font-medium hover:text-emerald-600 transition">

                        Home

                    </a>

                    @auth

                        <a
                            href="{{ route('booking.schedule') }}"
                            class="font-medium hover:text-emerald-600 transition">

                            Jadwal

                        </a>

                        <a
                            href="{{ route('booking.my') }}"
                            class="font-medium hover:text-emerald-600 transition">

                            Booking Saya

                        </a>

                        <div
                            class="bg-slate-200 px-4 py-2 rounded-full">

                            👤 {{ Auth::user()->name }}

                        </div>

                        <form
                            action="{{ route('logout') }}"
                            method="POST">

                            @csrf

                            <button
                                class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-xl transition">

                                Logout

                            </button>

                        </form>

                    @else

                        <a
                            href="{{ route('login') }}"
                            class="font-medium hover:text-emerald-600 transition">

                            Login

                        </a>

                        <a
                            href="{{ route('register') }}"
                            class="bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2 rounded-xl transition">

                            Register

                        </a>

                    @endauth

                </nav>

            </div>

        </div>

    </header>




    <!-- ===========================
            FLASH MESSAGE
    ============================ -->

    <main class="flex-1">

        <div class="max-w-7xl mx-auto px-6 py-8">

            @if(session('success'))

                <div
                    class="mb-6 bg-emerald-50 border border-emerald-300 rounded-xl p-4 text-emerald-700">

                    ✅ {{ session('success') }}

                </div>

            @endif


            @if(session('error'))

                <div
                    class="mb-6 bg-red-50 border border-red-300 rounded-xl p-4 text-red-700">

                    ❌ {{ session('error') }}

                </div>

            @endif


            @yield('content')

        </div>

    </main>




    <!-- ===========================
            FOOTER
    ============================ -->

    <footer
        class="bg-slate-900 text-white mt-16">

        <div
            class="max-w-7xl mx-auto px-6 py-12">

            <div
                class="grid md:grid-cols-3 gap-8">

                <div>

                    <h2
                        class="text-2xl font-bold">

                        🏸 Badminton Booking

                    </h2>

                    <p
                        class="text-slate-400 mt-4 leading-relaxed">

                        Platform reservasi lapangan badminton
                        berbasis web yang cepat, aman,
                        dan mudah digunakan.

                    </p>

                </div>


                <div>

                    <h3
                        class="font-bold mb-4">

                        Menu

                    </h3>

                    <div
                        class="space-y-2 text-slate-400">

                        <p>Home</p>

                        <p>Booking</p>

                        <p>Jadwal</p>

                    </div>

                </div>

            </div>

            <div
                class="border-t border-slate-700 mt-10 pt-6 text-center text-slate-500">

                © {{ date('Y') }}

                Badminton Booking.

                All Rights Reserved.

            </div>

        </div>

    </footer>

</body>

</html>

