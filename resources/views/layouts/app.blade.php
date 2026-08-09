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

                {{-- Kolom 5: Kritik & Saran --}}
                <div class="footer-col footer-col-kritik">
                    <h3 class="footer-col-title">Aspirasi</h3>
                    <p class="footer-kritik-desc">Sampaikan kritik atau saran Anda untuk kemajuan desa.</p>
                    <button class="kritik-saran-fab" onclick="openKritikModal()" title="Kritik &amp; Saran" aria-label="Buka kotak kritik dan saran">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" width="18" height="18">
                            <rect x="2" y="4" width="20" height="16" rx="3"/>
                            <path d="M22 7l-10 7L2 7"/>
                        </svg>
                        <span class="kritik-fab-label">Kritik &amp; Saran</span>
                    </button>
                </div>

            </div>

{{-- Modal Kritik & Saran --}}
<div id="modal-kritik" class="kritik-modal-backdrop" onclick="closeKritikModal(event)">
    <div class="kritik-modal">
        <div class="kritik-modal-header">
            <div class="kritik-modal-title">
                <div class="kritik-modal-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18">
                        <rect x="2" y="4" width="20" height="16" rx="3"/><path d="M22 7l-10 7L2 7"/>
                    </svg>
                </div>
                Kritik &amp; Saran
            </div>
            <button class="kritik-modal-close" onclick="closeKritikModal()" aria-label="Tutup">&times;</button>
        </div>
        <div class="kritik-modal-body">
            <p class="kritik-modal-desc">Sampaikan kritik, saran, atau aspirasi Anda untuk Desa Bade. Kami akan membaca setiap pesan.</p>
            @if(session('kritik_success'))
            <div class="kritik-success-alert">
                <svg width="18" height="18" fill="none" stroke="#22c55e" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                <span>{{ session('kritik_success') }}</span>
            </div>
            @endif
            <form method="POST" action="{{ route('pesan.store') }}">
                @csrf
                <div class="kritik-form-group">
                    <label class="kritik-label">Nama <span class="kritik-required">*</span></label>
                    <input type="text" name="nama" class="kritik-input {{ $errors->has('nama') ? 'kritik-input-error' : '' }}" placeholder="Nama Anda" value="{{ old('nama') }}" required maxlength="100">
                    @error('nama')<span class="kritik-error">{{ $message }}</span>@enderror
                </div>
                <div class="kritik-form-group">
                    <label class="kritik-label">Email <span class="kritik-optional">(opsional)</span></label>
                    <input type="email" name="email" class="kritik-input {{ $errors->has('email') ? 'kritik-input-error' : '' }}" placeholder="email@contoh.com" value="{{ old('email') }}" maxlength="150">
                    @error('email')<span class="kritik-error">{{ $message }}</span>@enderror
                </div>
                <div class="kritik-form-group">
                    <label class="kritik-label">Subjek <span class="kritik-required">*</span></label>
                    <input type="text" name="subjek" class="kritik-input {{ $errors->has('subjek') ? 'kritik-input-error' : '' }}" placeholder="Ringkasan pesan Anda" value="{{ old('subjek') }}" required maxlength="200">
                    @error('subjek')<span class="kritik-error">{{ $message }}</span>@enderror
                </div>
                <div class="kritik-form-group">
                    <label class="kritik-label">Pesan <span class="kritik-required">*</span></label>
                    <textarea name="pesan" class="kritik-input kritik-textarea {{ $errors->has('pesan') ? 'kritik-input-error' : '' }}" placeholder="Tuliskan kritik atau saran Anda..." required maxlength="2000" rows="4">{{ old('pesan') }}</textarea>
                    @error('pesan')<span class="kritik-error">{{ $message }}</span>@enderror
                </div>
                <div class="kritik-form-actions">
                    <button type="button" onclick="closeKritikModal()" class="kritik-btn-cancel">Batal</button>
                    <button type="submit" class="kritik-btn-submit">
                        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M22 2L11 13"/><path stroke-linecap="round" stroke-linejoin="round" d="M22 2L15 22 11 13 2 9l20-7z"/></svg>
                        Kirim Pesan
                    </button>
                </div>
            </form>
        </div>
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

<style>
/* === Kritik & Saran Footer Column === */
.footer-col-kritik{display:flex;flex-direction:column;gap:0;}
.footer-kritik-desc{font-size:12.5px;color:rgba(255,255,255,0.55);line-height:1.6;margin:0 0 14px;}
.kritik-saran-fab{display:inline-flex;align-items:center;gap:9px;padding:10px 18px;background:rgba(255,255,255,0.13);backdrop-filter:blur(8px);border:1.5px solid rgba(255,255,255,0.25);border-radius:50px;color:#fff;font-family:inherit;font-size:13px;font-weight:600;cursor:pointer;transition:all .25s;letter-spacing:.2px;white-space:nowrap;width:fit-content;}
.kritik-saran-fab:hover{background:rgba(255,255,255,0.22);transform:translateY(-2px);box-shadow:0 8px 20px rgba(0,0,0,.25);border-color:rgba(255,255,255,0.4);}
.kritik-fab-label{white-space:nowrap;}

/* === Modal Backdrop === */
.kritik-modal-backdrop{position:fixed;inset:0;background:rgba(15,23,42,.6);backdrop-filter:blur(6px);z-index:9999;display:none;align-items:center;justify-content:center;padding:20px;}
.kritik-modal-backdrop.open{display:flex;}

/* === Modal Container === */
.kritik-modal{background:#fff;border-radius:20px;width:100%;max-width:480px;max-height:90vh;overflow-y:auto;box-shadow:0 24px 80px rgba(0,0,0,.22),0 0 0 1px rgba(0,0,0,.04);animation:kritikSlide .28s cubic-bezier(.34,1.56,.64,1);}
@keyframes kritikSlide{from{transform:translateY(24px) scale(.96);opacity:0}to{transform:translateY(0) scale(1);opacity:1}}

/* === Modal Header === */
.kritik-modal-header{display:flex;align-items:center;justify-content:space-between;padding:20px 24px;border-bottom:1px solid #f1f5f9;}
.kritik-modal-title{display:flex;align-items:center;gap:12px;font-size:17px;font-weight:700;color:#1e293b;letter-spacing:-.2px;}
.kritik-modal-icon{width:38px;height:38px;border-radius:10px;background:linear-gradient(135deg,#e8f5e9,#c8e6c9);display:flex;align-items:center;justify-content:center;color:#2e7d32;flex-shrink:0;}
.kritik-modal-close{width:34px;height:34px;border-radius:9px;border:1.5px solid #e2e8f0;background:#f8fafc;color:#94a3b8;display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:20px;transition:all .18s;font-family:inherit;line-height:1;flex-shrink:0;}
.kritik-modal-close:hover{background:#fee2e2;color:#ef4444;border-color:#fecaca;transform:scale(1.05);}

/* === Modal Body === */
.kritik-modal-body{padding:20px 24px 24px;}
.kritik-modal-desc{font-size:13px;color:#64748b;margin:0 0 20px;line-height:1.6;}

/* === Success Alert === */
.kritik-success-alert{background:#f0fdf4;border:1px solid #86efac;border-radius:10px;padding:12px 16px;margin-bottom:18px;display:flex;gap:10px;align-items:center;font-size:13px;font-weight:600;color:#15803d;}

/* === Form Elements === */
.kritik-form-group{margin-bottom:16px;}
.kritik-label{display:flex;align-items:center;gap:5px;font-size:12.5px;font-weight:600;color:#374151;margin-bottom:6px;letter-spacing:.1px;}
.kritik-required{color:#ef4444;font-size:13px;line-height:1;}
.kritik-optional{color:#94a3b8;font-size:11px;font-weight:400;}
.kritik-input{width:100%;padding:10px 14px;border:1.5px solid #e2e8f0;border-radius:10px;font-size:13.5px;font-family:inherit;color:#1e293b;background:#fafafa;transition:all .2s;box-sizing:border-box;outline:none;}
.kritik-input::placeholder{color:#94a3b8;}
.kritik-input:focus{border-color:#2e7d32;background:#fff;box-shadow:0 0 0 3.5px rgba(46,125,50,.1);}
.kritik-textarea{resize:vertical;min-height:110px;line-height:1.6;}
.kritik-input-error{border-color:#ef4444!important;background:#fff8f8;}
.kritik-input-error:focus{box-shadow:0 0 0 3.5px rgba(239,68,68,.1)!important;}
.kritik-error{font-size:11.5px;color:#ef4444;margin-top:4px;display:block;}

/* === Action Buttons === */
.kritik-form-actions{display:flex;justify-content:flex-end;align-items:center;gap:10px;margin-top:8px;padding-top:16px;border-top:1px solid #f1f5f9;}
.kritik-btn-submit{display:inline-flex;align-items:center;gap:8px;padding:10px 22px;background:linear-gradient(135deg,#2e7d32,#1b5e20);color:#fff;border-radius:10px;font-size:13.5px;font-weight:600;border:none;cursor:pointer;font-family:inherit;transition:all .2s;letter-spacing:.1px;}
.kritik-btn-submit:hover{transform:translateY(-1px);box-shadow:0 6px 16px rgba(46,125,50,.4);}
.kritik-btn-submit:active{transform:translateY(0);}
.kritik-btn-cancel{padding:10px 18px;background:#fff;color:#64748b;border-radius:10px;font-size:13.5px;font-weight:600;border:1.5px solid #e2e8f0;cursor:pointer;font-family:inherit;transition:all .18s;}
.kritik-btn-cancel:hover{background:#f8fafc;border-color:#cbd5e1;color:#475569;}
</style>
<script>
function openKritikModal(){document.getElementById('modal-kritik').classList.add('open');document.body.style.overflow='hidden';}
function closeKritikModal(e){if(e&&e.target!==document.getElementById('modal-kritik'))return;document.getElementById('modal-kritik').classList.remove('open');document.body.style.overflow='';}
document.addEventListener('keydown',function(e){if(e.key==='Escape'){document.getElementById('modal-kritik').classList.remove('open');document.body.style.overflow='';}}); 
@if($errors->any() && old('pesan'))
document.addEventListener('DOMContentLoaded',function(){openKritikModal();});
@endif
@if(session('kritik_success'))
document.addEventListener('DOMContentLoaded',function(){openKritikModal();});
@endif
</script>

    </div>
</body>
</html>
