<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center px-6 py-12">

        <div class="w-full max-w-md">

            <!-- Header -->
            <div class="text-center mb-8">
                <div class="w-16 h-16 mx-auto rounded-2xl bg-emerald-600 flex items-center justify-center text-white text-3xl shadow-lg">
                    🏸
                </div>

                <h1 class="mt-6 text-3xl font-bold text-slate-800">
                    Buat Akun
                </h1>

                <p class="mt-2 text-slate-500">
                    Daftar untuk mulai booking lapangan
                </p>
            </div>

            <!-- Card -->
            <div class="bg-white rounded-2xl shadow-xl border border-slate-200 p-8">

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" value="Nama" />
                        <x-text-input
                            id="name"
                            type="text"
                            name="name"
                            :value="old('name')"
                            required
                            autofocus
                            placeholder="Nama lengkap"
                        />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" value="Email" />
                        <x-text-input
                            id="email"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            placeholder="Email aktif"
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
                            placeholder="Minimal 8 karakter"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-input-label for="password_confirmation" value="Konfirmasi Password" />
                        <x-text-input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            required
                            placeholder="Ulangi password"
                        />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Button -->
                    <button type="submit"
                            class="w-full bg-emerald-600 hover:bg-emerald-700 text-white py-3 rounded-xl font-semibold shadow-md transition">
                        Daftar
                    </button>

                </form>
            </div>

            <!-- Login Link -->
            <div class="text-center mt-6 text-slate-600">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-emerald-600 font-semibold hover:underline">
                    Login
                </a>
            </div>

        </div>
    </div>

</x-guest-layout>