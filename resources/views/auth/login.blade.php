<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center px-6 py-12">

        <div class="w-full max-w-md">

            <!-- Header -->
            <div class="text-center mb-8">
                <a href="{{ route('home') }}" class="inline-flex items-center justify-center">
                    <div class="w-16 h-16 rounded-2xl bg-emerald-600 flex items-center justify-center text-white text-3xl shadow-lg">
                        🏸
                    </div>
                </a>

                <h1 class="mt-6 text-3xl font-bold text-slate-800">
                    Badminton Booking
                </h1>

                <p class="mt-2 text-slate-500">
                    Login untuk melanjutkan
                </p>
            </div>

            <!-- Card -->
            <div class="bg-white rounded-2xl shadow-xl border border-slate-200 p-8">

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" value="Email" />
                        <x-text-input
                            id="email"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autofocus
                            placeholder="Masukkan email"
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" value="Password" />
                        <x-text-input
                            id="password"
                            type="password"
                            name="password"
                            required
                            placeholder="Masukkan password"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember + Forgot -->
                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center gap-2 text-slate-600">
                            <input type="checkbox" name="remember"
                                   class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500">
                            Ingat saya
                        </label>

                        @if(Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                               class="text-emerald-600 hover:underline">
                                Lupa password?
                            </a>
                        @endif
                    </div>

                    <!-- Button -->
                    <button type="submit"
                            class="w-full bg-emerald-600 hover:bg-emerald-700 text-white py-3 rounded-xl font-semibold shadow-md transition">
                        Login
                    </button>

                </form>
            </div>

            <!-- Register Link -->
            <div class="text-center mt-6 text-slate-600">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-emerald-600 font-semibold hover:underline">
                    Daftar
                </a>
            </div>

        </div>
    </div>

</x-guest-layout>