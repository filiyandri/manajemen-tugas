<x-guest-layout>

    <form method="POST" action="{{ route('login') }}">

        @csrf

        <div class="mb-4">

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

        <div class="mb-4">

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

        <div class="form-check mb-4">

            <input
                class="form-check-input"
                type="checkbox"
                name="remember"
                id="remember">

            <label
                class="form-check-label text-light"
                for="remember">

                Remember Me

            </label>

        </div>

        <button type="submit" class="btn login-btn w-100">

            Login

        </button>

        <div class="text-center mt-4">

            <a href="{{ route('register') }}"
               class="text-decoration-none text-light">

                Belum punya akun?
                <span class="text-info">
                    Daftar
                </span>

            </a>

        </div>

    </form>

</x-guest-layout>