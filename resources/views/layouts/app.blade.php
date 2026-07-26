<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Desa Bade | Portal</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
    <div class="site-shell" x-data="{ open: false }">
        <header class="fixed inset-x-0 top-0 z-50">
            <div class="container-shell pt-4">
                <div class="nav-shell flex items-center justify-between gap-4 rounded-full px-4 py-3 lg:px-6">
                    <a href="/" class="flex min-w-0 items-center gap-4">
                        <div class="flex h-16 w-16 items-center justify-center lg:h-20 lg:w-20">
                            <img
                                src="{{ $brandLogo ?? (asset('logo_desa_bade_utuh.png') . '?v=' . (file_exists(public_path('logo_desa_bade_utuh.png')) ? filemtime(public_path('logo_desa_bade_utuh.png')) : time())) }}"
                                alt="Logo Kabupaten Boyolali"
                                class="h-full w-full object-contain drop-shadow-[0_12px_24px_rgba(0,0,0,0.28)]"
                            >
                        </div>
                        <div class="min-w-0">
                            <p class="truncate text-sm font-semibold uppercase tracking-[0.28em] text-[color:var(--primary)]/80">Desa Bade</p>
                            <p class="truncate text-sm text-[color:var(--text)]">Klego, Boyolali</p>
                        </div>
                    </a>

                    <button
                        type="button"
                        class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-[color:var(--line)] bg-white/80 text-[color:var(--primary)] lg:hidden"
                        @click="open = !open"
                        :aria-expanded="open.toString()"
                        aria-label="Buka menu navigasi"
                    >
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-5 w-5 stroke-[1.8]">
                            <path d="M4 7h16M4 12h16M4 17h16" stroke-linecap="round" />
                        </svg>
                    </button>

                    <nav class="hidden items-center gap-2 lg:flex">
                        @foreach ($navItems as $item)
                            @php $isActive = request()->routeIs($item['route'] ?? ''); @endphp
                            <a
                                href="{{ $item['href'] }}"
                                class="nav-link relative rounded-full px-4 py-2 text-sm font-semibold transition
                                    {{ $isActive
                                        ? 'bg-[color:var(--primary)] text-white shadow-[0_4px_14px_rgba(46,125,50,0.35)]'
                                        : 'text-[color:var(--text)] hover:bg-[rgba(76,175,80,0.10)] hover:text-[color:var(--primary)]' }}"
                                @if($isActive) aria-current="page" @endif
                            >
                                {{ $item['label'] }}
                            </a>
                        @endforeach
                    </nav>
                </div>

                <div
                    x-cloak
                    x-show="open"
                    x-transition.opacity.duration.200ms
                    class="mt-3 overflow-hidden rounded-[2rem] border border-[color:var(--line)] bg-[rgba(255,255,255,0.92)] p-4 shadow-2xl shadow-[rgba(46,125,50,0.10)] backdrop-blur lg:hidden"
                >
                    <nav class="grid gap-2">
                        @foreach ($navItems as $item)
                            @php $isActive = request()->routeIs($item['route'] ?? ''); @endphp
                            <a
                                href="{{ $item['href'] }}"
                                class="relative flex items-center gap-3 rounded-2xl border px-4 py-3 text-sm font-semibold transition
                                    {{ $isActive
                                        ? 'border-[color:var(--primary)] bg-[rgba(46,125,50,0.08)] text-[color:var(--primary)]'
                                        : 'border-[color:var(--line)] text-[color:var(--text)] hover:bg-[rgba(76,175,80,0.08)]' }}"
                                @click="open = false"
                                @if($isActive) aria-current="page" @endif
                            >
                                @if($isActive)
                                    <span class="h-2 w-2 rounded-full bg-[color:var(--primary)] flex-shrink-0"></span>
                                @else
                                    <span class="h-2 w-2 rounded-full bg-transparent border border-[color:var(--line)] flex-shrink-0"></span>
                                @endif
                                {{ $item['label'] }}
                            </a>
                        @endforeach
                    </nav>
                </div>
            </div>
        </header>

        <main class="pt-28 lg:pt-32">
            @yield('content')
        </main>

        {{-- ===== FOOTER ===== --}}
        <footer class="site-footer">
            <div class="footer-inner container-shell">

                {{-- Kolom 1: Identitas Desa --}}
                <div class="footer-brand">
                    <div class="footer-logo-wrap">
                        <img
                            src="{{ !empty(\App\Models\PengaturanWebsite::get('logo_desa')) ? (str_starts_with(\App\Models\PengaturanWebsite::get('logo_desa'), 'http') ? \App\Models\PengaturanWebsite::get('logo_desa') : asset(\App\Models\PengaturanWebsite::get('logo_desa'))) : asset('logo_desa_bade_utuh.png') }}"
                            alt="Logo Desa Bade"
                            class="footer-logo"
                        >
                        <div>
                            <p class="footer-village-name">{{ \App\Models\PengaturanWebsite::get('nama_pemerintah_desa', 'Pemerintah Desa Bade') }}</p>
                            <p class="footer-village-sub">{{ \App\Models\PengaturanWebsite::get('sub_pemerintah_desa', 'Kecamatan Klego, Boyolali') }}</p>
                        </div>
                    </div>
                    <address class="footer-address">
                        {{ \App\Models\PengaturanWebsite::get('alamat_line_1', 'Desa Bade, Kecamatan Klego,') }}<br>
                        {{ \App\Models\PengaturanWebsite::get('alamat_line_2', 'Kabupaten Boyolali,') }}<br>
                        {{ \App\Models\PengaturanWebsite::get('alamat_line_3', 'Provinsi Jawa Tengah, 57385') }}
                    </address>
                    <p class="footer-code"><strong>Kode Wilayah:</strong> {{ \App\Models\PengaturanWebsite::get('kode_wilayah', '33.09.12.2005') }}</p>
                </div>

                {{-- Kolom 2: Hubungi Kami --}}
                <div class="footer-col">
                    <h3 class="footer-col-title">Hubungi Kami</h3>
                    <ul class="footer-contact-list">
                        <li>
                            <svg class="footer-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 12.7a19.79 19.79 0 01-3.07-8.67A2 2 0 012 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
                            <span><a href="tel:{{ \App\Models\PengaturanWebsite::get('telepon', '0857-2900-1234') }}" class="hover:text-white/80 transition-colors">{{ \App\Models\PengaturanWebsite::get('telepon', '0857-2900-1234') }}</a></span>
                        </li>
                        <li>
                            <svg class="footer-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M22 7l-10 7L2 7"/></svg>
                            <span><a href="mailto:{{ \App\Models\PengaturanWebsite::get('email', 'desa.bade@boyolali.go.id') }}" class="hover:text-white/80 transition-colors">{{ \App\Models\PengaturanWebsite::get('email', 'desa.bade@boyolali.go.id') }}</a></span>
                        </li>
                    </ul>
                    <div class="footer-socials">
                        @if(\App\Models\PengaturanWebsite::get('instagram') && \App\Models\PengaturanWebsite::get('instagram') !== '#')
                        <a href="{{ \App\Models\PengaturanWebsite::get('instagram') }}" target="_blank" aria-label="Instagram" class="footer-social-btn">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="0.5" fill="currentColor"/></svg>
                        </a>
                        @endif
                        @if(\App\Models\PengaturanWebsite::get('facebook') && \App\Models\PengaturanWebsite::get('facebook') !== '#')
                        <a href="{{ \App\Models\PengaturanWebsite::get('facebook') }}" target="_blank" aria-label="Facebook" class="footer-social-btn">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
                        </a>
                        @endif
                        @if(\App\Models\PengaturanWebsite::get('youtube') && \App\Models\PengaturanWebsite::get('youtube') !== '#')
                        <a href="{{ \App\Models\PengaturanWebsite::get('youtube') }}" target="_blank" aria-label="YouTube" class="footer-social-btn">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M22.54 6.42a2.78 2.78 0 00-1.95-1.97C18.88 4 12 4 12 4s-6.88 0-8.59.45A2.78 2.78 0 001.46 6.42 29 29 0 001 12a29 29 0 00.46 5.58 2.78 2.78 0 001.95 1.97C5.12 20 12 20 12 20s6.88 0 8.59-.45a2.78 2.78 0 001.95-1.97A29 29 0 0023 12a29 29 0 00-.46-5.58z"/><polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"/></svg>
                        </a>
                        @endif
                        @if(\App\Models\PengaturanWebsite::get('tiktok') && \App\Models\PengaturanWebsite::get('tiktok') !== '#')
                        <a href="{{ \App\Models\PengaturanWebsite::get('tiktok') }}" target="_blank" aria-label="TikTok" class="footer-social-btn">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M9 12a4 4 0 104 4V4a5 5 0 005 5"/></svg>
                        </a>
                        @endif
                    </div>
                </div>

                {{-- Kolom 3: Nomor Telepon Penting --}}
                <div class="footer-col">
                    <h3 class="footer-col-title">Nomor Telepon Penting</h3>
                    <ul class="footer-links-list">
                        <li><a href="tel:{{ \App\Models\PengaturanWebsite::get('telp_polisi', '110') }}" class="footer-link">Polisi: {{ \App\Models\PengaturanWebsite::get('telp_polisi', '110') }}</a></li>
                        <li><a href="tel:{{ \App\Models\PengaturanWebsite::get('telp_ambulans', '118') }}" class="footer-link">Ambulans: {{ \App\Models\PengaturanWebsite::get('telp_ambulans', '118') }}</a></li>
                        <li><a href="tel:{{ \App\Models\PengaturanWebsite::get('telp_pemadam', '113') }}" class="footer-link">Pemadam: {{ \App\Models\PengaturanWebsite::get('telp_pemadam', '113') }}</a></li>
                        <li><a href="tel:{{ \App\Models\PengaturanWebsite::get('telp_darurat', '119') }}" class="footer-link">Darurat: {{ \App\Models\PengaturanWebsite::get('telp_darurat', '119') }}</a></li>
                        <li><a href="tel:{{ \App\Models\PengaturanWebsite::get('telp_info', '108') }}" class="footer-link">Info: {{ \App\Models\PengaturanWebsite::get('telp_info', '108') }}</a></li>
                    </ul>
                </div>

                {{-- Kolom 4: Jelajahi --}}
                <div class="footer-col">
                    <h3 class="footer-col-title">Jelajahi</h3>
                    <ul class="footer-links-list">
                        @foreach ($navItems as $item)
                            <li>
                                <a href="{{ $item['href'] }}" class="footer-link">{{ $item['label'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>

            {{-- Copyright bar --}}
            <div class="footer-bar">
                <div class="container-shell">
                    <p class="footer-copy">
                        &copy; {{ date('Y') }} Pemerintah Desa Bade. All rights reserved.
                    </p>
                </div>
            </div>
        </footer>

    </div>
</body>
</html>
