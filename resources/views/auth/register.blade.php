<x-guest-layout>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label text-white">
                Nama Lengkap
            </label>

            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                class="form-control login-input"
                placeholder="Masukkan nama lengkap"
                required>

            @error('name')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label text-white">
                Email
            </label>

            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                class="form-control login-input"
                placeholder="Masukkan email"
                required>

            @error('email')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label text-white">
                Password
            </label>

            <input
                type="password"
                name="password"
                class="form-control login-input"
                placeholder="Masukkan password"
                required>

            @error('password')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror
        </div>

        <div class="mb-4">
            <label class="form-label text-white">
                Konfirmasi Password
            </label>

            <input
                type="password"
                name="password_confirmation"
                class="form-control login-input"
                placeholder="Ulangi password"
                required>
        </div>

        <button
            type="submit"
            class="btn login-btn w-100">

            Daftar Sekarang

        </button>

        <div class="text-center mt-4">

            <a href="{{ route('login') }}"
               class="text-decoration-none text-light">

                Sudah punya akun?
                <span class="text-info">
                    Login
                </span>

            </a>

        </div>

    </form>

</x-guest-layout>