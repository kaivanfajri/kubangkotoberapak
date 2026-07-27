<x-guest-layout>
    <div class="login-card">
        <div style="text-align: center; margin-bottom: 20px;">
            <div class="brand-badge" style="margin: 0 auto 12px; width:48px; height:48px; font-size:24px;">🌾</div>
            <h2 style="margin-bottom: 4px;">Login Admin</h2>
            <p style="font-size: 13px; color: var(--muted);">Nagari Kubang Koto Berapak</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="field">
                <label for="email">Email Admin</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="admin@kubangbayang.desa.id">
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600 text-xs" />
            </div>

            <!-- Password -->
            <div class="field">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="••••••••">
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600 text-xs" />
            </div>

            <!-- Remember Me -->
            <div style="display: flex; align-items: center; justify-content: space-between; margin: 18px 0 24px; font-size: 13px; color: var(--muted);">
                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                    <input id="remember_me" type="checkbox" name="remember" style="accent-color: var(--green);">
                    <span>Ingat Saya</span>
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" style="color: var(--green-dark); font-weight: 600;">Lupa Password?</a>
                @endif
            </div>

            <button type="submit" class="login-submit">LOG IN</button>
        </form>

        <div style="text-align: center; margin-top: 24px;">
            <a href="{{ route('home') }}" style="font-size: 13px; color: var(--muted); display: inline-flex; align-items: center; gap: 6px;">
                ← Kembali ke Beranda Nagari
            </a>
        </div>
    </div>
</x-guest-layout>