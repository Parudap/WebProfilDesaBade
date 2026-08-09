@extends('layouts.app')

@section('content')
    <section id="home" class="hero-section hero-section--fullbleed">
        <div class="hero-media relative">
            <div class="hero-slider" data-hero-slider>
                @foreach ($heroImages as $index => $image)
                    <img
                        src="{{ $image }}"
                        alt="Visual modern Desa Bade {{ $index + 1 }}"
                        class="hero-image {{ $index === 0 ? 'active' : '' }}"
                    >
                @endforeach
            </div>
            @if(count($heroImages) > 1)
            <button type="button" class="hero-nav hero-prev" data-hero-prev aria-label="Gambar sebelumnya">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M15 18l-6-6 6-6"></path>
                </svg>
            </button>
            <button type="button" class="hero-nav hero-next" data-hero-next aria-label="Gambar berikutnya">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 18l6-6-6-6"></path>
                </svg>
            </button>
            <div class="hero-dots" data-hero-dots>
                @foreach ($heroImages as $index => $image)
                    <button type="button" class="hero-dot {{ $index === 0 ? 'active' : '' }}" data-hero-dot="{{ $index }}" aria-label="Gambar {{ $index + 1 }}"></button>
                @endforeach
            </div>
            @endif
        </div>
        <div class="hero-overlay"></div>
        <div class="container-shell relative z-10 flex min-h-screen flex-col justify-end pb-12 sm:pb-16 lg:pb-20 home-offset" data-home-hero>
            <div class="grid items-end gap-10 lg:grid-cols-[1.15fr_0.85fr]">
                 <div class="reveal space-y-7">
                    <div class="hero-copy-shell">
                        <p class="max-w-3xl rounded-full border border-white/20 bg-white/10 px-4 py-2 text-base font-semibold leading-7 text-white shadow-lg shadow-black/20 backdrop-blur-sm sm:text-lg">
                            {{ $subheadline }}
                        </p>
                        <h1 class="mt-5 max-w-5xl text-balance text-[2.6rem] font-semibold uppercase leading-[0.95] text-white sm:text-[3.8rem] lg:text-[5.4rem]" style="word-break: keep-all; overflow-wrap: break-word; white-space: normal;">
                            <span class="block text-[#f3e4b2]">{{ $heroTitleTop }}</span>
                            <span class="block">{{ $heroTitleBottom }}</span>
                        </h1>
                    </div>

                        <!-- Profil section removed as requested -->
                </div>

                <aside class="reveal reveal-delay-1 grid gap-4" x-data="{ activeTab: 'default' }">
                    <!-- MAIN DISPLAY CARD (Dynamic Content) -->
                    <div class="glass-card p-5 sm:p-6 transition-all duration-300" style="min-height: 220px; display: flex; flex-direction: column; justify-content: space-between;">
                        <div>
                            <!-- Tab Default -->
                            <div x-show="activeTab === 'default'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0">
                                <div class="flex items-start justify-between gap-4">
                                    <div>
                                        <p class="text-xs font-semibold uppercase tracking-[0.24em] text-[#f3e4b2]">Layanan &amp; Informasi</p>
                                        <h2 class="mt-3 text-2xl font-semibold leading-tight text-white sm:text-3xl">Keterbukaan Publik &amp; Pelayanan Digital Mandiri</h2>
                                    </div>
                                    <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl border border-white/15 bg-white/12 p-3">
                                        <img src="{{ $brandLogo }}" alt="Logo Kabupaten Boyolali" class="h-full w-full object-contain">
                                    </div>
                                </div>
                                <p class="mt-4 text-sm leading-7 text-white/70">Temukan data statistik kependudukan, laporan transparansi anggaran, profil wilayah, berita terkini, hingga produk unggulan UMKM Desa Bade.</p>
                            </div>

                            <!-- Tab Profil -->
                            <div x-show="activeTab === 'profil'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" x-cloak>
                                <div class="flex items-start justify-between gap-4">
                                    <div>
                                        <div class="flex items-center gap-2">
                                            <button @click="activeTab = 'default'" class="inline-flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-white/10 hover:bg-white/20 text-white border border-white/10 transition cursor-pointer" title="Kembali">
                                                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/></svg>
                                            </button>
                                            <p class="text-xs font-semibold uppercase tracking-[0.24em] text-[#f3e4b2]">Profil Desa Bade</p>
                                        </div>
                                        <h2 class="mt-3 text-2xl font-semibold leading-tight text-white sm:text-3xl">Visi, Misi &amp; Struktur Pemerintahan Desa</h2>
                                    </div>
                                    <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl border border-white/15 bg-white/12 p-4 text-white/60">
                                        <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z"/></svg>
                                    </div>
                                </div>
                                <p class="mt-4 text-sm leading-7 text-white/70">Ketahui sejarah berdiri, batas wilayah geografis, visi misi pembangunan, serta susunan kepengurusan perangkat desa.</p>
                            </div>

                            <!-- Tab Infografis -->
                            <div x-show="activeTab === 'infografis'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" x-cloak>
                                <div class="flex items-start justify-between gap-4">
                                    <div>
                                        <div class="flex items-center gap-2">
                                            <button @click="activeTab = 'default'" class="inline-flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-white/10 hover:bg-white/20 text-white border border-white/10 transition cursor-pointer" title="Kembali">
                                                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/></svg>
                                            </button>
                                            <p class="text-xs font-semibold uppercase tracking-[0.24em] text-[#f3e4b2]">Portal Data &amp; APBDes</p>
                                        </div>
                                        <h2 class="mt-3 text-2xl font-semibold leading-tight text-white sm:text-3xl">Statistik Penduduk &amp; Transparansi Anggaran</h2>
                                    </div>
                                    <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl border border-white/15 bg-white/12 p-4 text-white/60">
                                        <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z"/></svg>
                                    </div>
                                </div>
                                <p class="mt-4 text-sm leading-7 text-white/70">Lihat grafik data penduduk terdaftar, skor pencapaian SDGs Desa, status Indeks Desa Membangun (IDM), dan laporan realisasi pertanggungjawaban APBDes secara transparan.</p>
                            </div>

                            <!-- Tab Berita -->
                            <div x-show="activeTab === 'berita'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" x-cloak>
                                <div class="flex items-start justify-between gap-4">
                                    <div>
                                        <div class="flex items-center gap-2">
                                            <button @click="activeTab = 'default'" class="inline-flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-white/10 hover:bg-white/20 text-white border border-white/10 transition cursor-pointer" title="Kembali">
                                                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/></svg>
                                            </button>
                                            <p class="text-xs font-semibold uppercase tracking-[0.24em] text-[#f3e4b2]">Kabar Terkini Desa</p>
                                        </div>
                                        <h2 class="mt-3 text-2xl font-semibold leading-tight text-white sm:text-3xl">Warta Berita, Kegiatan &amp; Pengumuman Resmi</h2>
                                    </div>
                                    <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl border border-white/15 bg-white/12 p-4 text-white/60">
                                        <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z"/></svg>
                                    </div>
                                </div>
                                <p class="mt-4 text-sm leading-7 text-white/70">Ikuti kabar berita terbaru seputar pembangunan sarana prasarana, kegiatan sosial kemasyarakatan, pengumuman penting, dan agenda desa terhangat.</p>
                            </div>

                            <!-- Tab Belanja -->
                            <div x-show="activeTab === 'belanja'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" x-cloak>
                                <div class="flex items-start justify-between gap-4">
                                    <div>
                                        <div class="flex items-center gap-2">
                                            <button @click="activeTab = 'default'" class="inline-flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-white/10 hover:bg-white/20 text-white border border-white/10 transition cursor-pointer" title="Kembali">
                                                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/></svg>
                                            </button>
                                            <p class="text-xs font-semibold uppercase tracking-[0.24em] text-[#f3e4b2]">UMKM &amp; Potensi Desa</p>
                                        </div>
                                        <h2 class="mt-3 text-2xl font-semibold leading-tight text-white sm:text-3xl">Belanja Produk Unggulan Warga Lokal</h2>
                                    </div>
                                    <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl border border-white/15 bg-white/12 p-4 text-white/60">
                                        <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z"/></svg>
                                    </div>
                                </div>
                                <p class="mt-4 text-sm leading-7 text-white/70">Dukung dan majukan roda perekonomian warga lokal dengan menjelajahi dan berbelanja aneka produk kerajinan, kuliner khas, dan komoditas unggulan masyarakat Desa Bade.</p>
                            </div>
                        </div>

                        <!-- Action Button (Conditional) -->
                        <div class="mt-4">
                            <a href="{{ url('/profil') }}" x-show="activeTab === 'profil'" class="inline-flex items-center gap-2 rounded-xl px-5 py-2.5 text-xs font-semibold transition-all cursor-pointer" style="background: rgba(243,228,178,0.18); color: #f3e4b2; border: 1px solid rgba(243,228,178,0.35); backdrop-filter: blur(4px);" x-cloak>
                                Jelajahi Profil Desa
                                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                            </a>
                            <a href="{{ url('/infografis') }}" x-show="activeTab === 'infografis'" class="inline-flex items-center gap-2 rounded-xl px-5 py-2.5 text-xs font-semibold transition-all cursor-pointer" style="background: rgba(243,228,178,0.18); color: #f3e4b2; border: 1px solid rgba(243,228,178,0.35); backdrop-filter: blur(4px);" x-cloak>
                                Jelajahi Infografis
                                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                            </a>
                            <a href="{{ url('/berita') }}" x-show="activeTab === 'berita'" class="inline-flex items-center gap-2 rounded-xl px-5 py-2.5 text-xs font-semibold transition-all cursor-pointer" style="background: rgba(243,228,178,0.18); color: #f3e4b2; border: 1px solid rgba(243,228,178,0.35); backdrop-filter: blur(4px);" x-cloak>
                                Baca Kabar Berita
                                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                            </a>
                            <a href="{{ url('/belanja') }}" x-show="activeTab === 'belanja'" class="inline-flex items-center gap-2 rounded-xl px-5 py-2.5 text-xs font-semibold transition-all cursor-pointer" style="background: rgba(243,228,178,0.18); color: #f3e4b2; border: 1px solid rgba(243,228,178,0.35); backdrop-filter: blur(4px);" x-cloak>
                                Buka Toko UMKM
                                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                            </a>
                        </div>
                    </div>

                    <!-- FOUR INTERACTIVE SWITCHER CARDS (2x2 Grid) -->
                    <div class="grid gap-3 grid-cols-2">
                        <!-- Switcher 1 (Profil Desa) -->
                        <div @click="activeTab = activeTab === 'profil' ? 'default' : 'profil'" 
                             class="glass-card p-3.5 cursor-pointer border transition-all duration-300 hover:scale-[1.02]"
                             :class="activeTab === 'profil' ? 'border-[#f3e4b2] bg-white/18 shadow-lg shadow-black/10' : 'border-white/10 bg-white/5 hover:bg-white/10'">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white/10 text-white" :class="activeTab === 'profil' && 'text-[#f3e4b2] bg-white/20'">
                                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21"/></svg>
                                </div>
                                <div class="text-left min-w-0">
                                    <p class="text-sm font-bold text-white leading-tight truncate">Profil Desa</p>
                                    <p class="text-[10px] text-white/60 mt-0.5" x-text="activeTab === 'profil' ? 'Tampil ↑' : 'Info sejarah'"></p>
                                </div>
                            </div>
                        </div>

                        <!-- Switcher 2 (Infografis) -->
                        <div @click="activeTab = activeTab === 'infografis' ? 'default' : 'infografis'" 
                             class="glass-card p-3.5 cursor-pointer border transition-all duration-300 hover:scale-[1.02]"
                             :class="activeTab === 'infografis' ? 'border-[#f3e4b2] bg-white/18 shadow-lg shadow-black/10' : 'border-white/10 bg-white/5 hover:bg-white/10'">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white/10 text-white" :class="activeTab === 'infografis' && 'text-[#f3e4b2] bg-white/20'">
                                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6z"/><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5z"/></svg>
                                </div>
                                <div class="text-left min-w-0">
                                    <p class="text-sm font-bold text-white leading-tight truncate">Infografis</p>
                                    <p class="text-[10px] text-white/60 mt-0.5" x-text="activeTab === 'infografis' ? 'Tampil ↑' : 'Info APBDes'"></p>
                                </div>
                            </div>
                        </div>

                        <!-- Switcher 3 (Berita) -->
                        <div @click="activeTab = activeTab === 'berita' ? 'default' : 'berita'" 
                             class="glass-card p-3.5 cursor-pointer border transition-all duration-300 hover:scale-[1.02]"
                             :class="activeTab === 'berita' ? 'border-[#f3e4b2] bg-white/18 shadow-lg shadow-black/10' : 'border-white/10 bg-white/5 hover:bg-white/10'">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white/10 text-white" :class="activeTab === 'berita' && 'text-[#f3e4b2] bg-white/20'">
                                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z"/></svg>
                                </div>
                                <div class="text-left min-w-0">
                                    <p class="text-sm font-bold text-white leading-tight truncate">Berita Desa</p>
                                    <p class="text-[10px] text-white/60 mt-0.5" x-text="activeTab === 'berita' ? 'Tampil ↑' : 'Kabar warga'"></p>
                                </div>
                            </div>
                        </div>

                        <!-- Switcher 4 (Belanja) -->
                        <div @click="activeTab = activeTab === 'belanja' ? 'default' : 'belanja'" 
                             class="glass-card p-3.5 cursor-pointer border transition-all duration-300 hover:scale-[1.02]"
                             :class="activeTab === 'belanja' ? 'border-[#f3e4b2] bg-white/18 shadow-lg shadow-black/10' : 'border-white/10 bg-white/5 hover:bg-white/10'">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white/10 text-white" :class="activeTab === 'belanja' && 'text-[#f3e4b2] bg-white/20'">
                                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z"/></svg>
                                </div>
                                <div class="text-left min-w-0">
                                    <p class="text-sm font-bold text-white leading-tight truncate">Toko UMKM</p>
                                    <p class="text-[10px] text-white/60 mt-0.5" x-text="activeTab === 'belanja' ? 'Tampil ↑' : 'Produk lokal'"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    {{-- ===== SEKSI SAMBUTAN KEPALA DESA ===== --}}
    <section id="sambutan-kades" class="relative overflow-hidden py-16 lg:py-24 bg-gradient-to-b from-[#1b4425] via-[#21542f] to-[#183d21] text-white">
        {{-- Background Accents --}}
        <div class="pointer-events-none absolute -top-40 -left-40 h-96 w-96 rounded-full bg-[color:var(--secondary)]/20 blur-[130px]"></div>
        <div class="pointer-events-none absolute -bottom-40 -right-40 h-96 w-96 rounded-full bg-[color:var(--gold)]/20 blur-[130px]"></div>
        <div class="pointer-events-none absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 h-[500px] w-[500px] rounded-full bg-emerald-400/10 blur-[150px]"></div>

        <div class="container-shell relative z-10">
            <div class="mx-auto max-w-6xl">

                <div class="grid items-center gap-10 lg:grid-cols-12 lg:gap-14">
                    {{-- Foto Kepala Desa --}}
                    <div class="lg:col-span-5 reveal">
                        <div class="relative mx-auto max-w-sm lg:max-w-none">
                            {{-- Glow Ring --}}
                            <div class="absolute -inset-2 rounded-3xl bg-gradient-to-tr from-[color:var(--primary)] via-[color:var(--gold)] to-emerald-300 opacity-35 blur-2xl transition-all duration-500 hover:opacity-60"></div>
                            
                            {{-- Image Card --}}
                            <div class="relative overflow-hidden rounded-3xl border border-white/25 bg-white/10 p-3 shadow-2xl backdrop-blur-xl">
                                <div class="relative overflow-hidden rounded-2xl aspect-[3/4] bg-[#14361c]">
                                    <img 
                                        src="{{ $fotoKades }}" 
                                        alt="Kepala Desa Bade - {{ $namaKades }}" 
                                        class="h-full w-full object-cover object-[center_10%] transition-transform duration-700 hover:scale-105"
                                    >
                                    <div class="absolute inset-0 bg-gradient-to-t from-[#14361c] via-[#14361c]/20 to-transparent"></div>
                                    
                                    <div class="absolute bottom-4 left-4 right-4 text-center sm:text-left">
                                        <span class="inline-flex items-center gap-1.5 rounded-full border border-[#f3e4b2]/40 bg-[color:var(--primary-deep)]/90 px-3 py-1 text-[11px] font-bold uppercase tracking-wider text-[#f3e4b2] shadow-md backdrop-blur-md">
                                            {{ $jabatanKades }}
                                        </span>
                                        <h3 class="mt-2 text-2xl font-black uppercase text-white drop-shadow-md tracking-wide" style="color: #ffffff !important;">
                                            {{ $namaKades }}
                                        </h3>
                                        <p class="text-xs text-white/85">Pemerintah Desa Bade, Klego, Boyolali</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Content Sambutan --}}
                    <div class="lg:col-span-7 reveal reveal-delay-1">
                        <div class="relative overflow-hidden rounded-3xl border border-white/20 bg-white/10 p-6 sm:p-10 shadow-2xl backdrop-blur-xl">
                            {{-- Decorative Watermark Quote Icon --}}
                            <div class="pointer-events-none absolute top-6 right-6 text-white/10 select-none">
                                <svg width="100" height="100" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                                </svg>
                            </div>

                            <div class="inline-flex items-center gap-2 rounded-full border border-[#f3e4b2]/40 bg-[#f3e4b2]/15 px-4 py-1.5 text-xs font-semibold uppercase tracking-widest text-[#f3e4b2]">
                                Sambutan Kepala Desa
                            </div>

                            <h2 class="mt-4 text-2xl font-bold leading-snug sm:text-3xl lg:text-4xl" style="color: {{ $warnaJudulSambutan ?? '#f3e4b2' }} !important;">
                                {!! nl2br(e($judulSambutan ?? "Assalamu'alaikum Warahmatullahi Wabarakatuh,\nSalam sejahtera bagi kita semua.")) !!}
                            </h2>

                            @php
                                 $normalizedSambutan = str_replace(["\r\n", "\r"], "\n", $sambutanKades ?? '');
                                 $paragraphs = array_values(array_filter(array_map('trim', explode("\n\n", $normalizedSambutan))));
                                 $cleanJudul = strtolower(preg_replace('/\s+/', ' ', trim($judulSambutan ?? '')));
                                 
                                 $filteredParagraphs = [];
                                 foreach ($paragraphs as $p) {
                                     $cleanP = strtolower(preg_replace('/\s+/', ' ', trim($p)));
                                     if (!empty($cleanJudul) && (
                                         $cleanP === $cleanJudul || 
                                         str_contains($cleanP, "assalamu'alaikum") || 
                                         str_contains($cleanP, "salam sejahtera")
                                     )) {
                                         continue;
                                     }
                                     $filteredParagraphs[] = $p;
                                 }
                             @endphp

                             @if(!empty($filteredParagraphs))
                             <div class="mt-6 space-y-4 text-base leading-relaxed sm:text-lg">
                                 @foreach ($filteredParagraphs as $p)
                                     <p class="leading-8" style="color: {{ $warnaIsiSambutan ?? '#f0fdf4' }} !important;">
                                         {!! nl2br(e($p)) !!}
                                     </p>
                                 @endforeach
                             </div>
                             @endif

                            {{-- Footnote & Badge --}}
                            <div class="mt-8 flex flex-wrap items-center justify-between gap-4 border-t border-white/15 pt-6">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl border border-white/20 bg-white/10 p-2.5 shadow-md">
                                        <img src="{{ $brandLogo }}" alt="Logo Desa Bade" class="h-full w-full object-contain">
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold uppercase tracking-wider text-white" style="color: #ffffff !important;">{{ $namaKades }}</p>
                                        <p class="text-xs text-[#f3e4b2]" style="color: #f3e4b2 !important;">{{ $jabatanKades }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Sub-Seksi Perangkat Desa Carousel --}}
                @if(isset($perangkatDesa) && count($perangkatDesa) > 0)
                <div class="mt-12 border-t border-white/15 pt-8" x-data="{
                    scrollLeft() { $refs.slider.scrollBy({ left: -260, behavior: 'smooth' }) },
                    scrollRight() { $refs.slider.scrollBy({ left: 260, behavior: 'smooth' }) }
                }">
                    <div class="mb-5 flex items-center justify-between gap-4">
                        <div>
                            <span class="text-[11px] font-bold uppercase tracking-widest text-[#f3e4b2]" style="color: #f3e4b2 !important;">Jajaran Pemerintahan</span>
                            <h4 class="text-lg font-bold text-white sm:text-xl" style="color: #ffffff !important;">Perangkat & Staf Desa Bade</h4>
                        </div>
                        
                        {{-- Navigation Buttons --}}
                        <div class="flex items-center gap-2">
                            <button 
                                type="button" 
                                @click="scrollLeft()" 
                                class="flex h-9 w-9 items-center justify-center rounded-full border border-white/20 bg-white/10 text-white transition hover:bg-[#f3e4b2] hover:text-[#1b4425] hover:border-[#f3e4b2] cursor-pointer"
                                aria-label="Geser ke kiri"
                            >
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/></svg>
                            </button>
                            <button 
                                type="button" 
                                @click="scrollRight()" 
                                class="flex h-9 w-9 items-center justify-center rounded-full border border-white/20 bg-white/10 text-white transition hover:bg-[#f3e4b2] hover:text-[#1b4425] hover:border-[#f3e4b2] cursor-pointer"
                                aria-label="Geser ke kanan"
                            >
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg>
                            </button>
                        </div>
                    </div>

                    {{-- Horizontal Scroll Track --}}
                    <div 
                        x-ref="slider" 
                        class="no-scrollbar flex gap-4 overflow-x-auto scroll-smooth pb-4 pt-1 snap-x snap-mandatory"
                        style="scrollbar-width: none; -ms-overflow-style: none;"
                    >
                        @foreach($perangkatDesa as $item)
                            <div class="w-36 sm:w-44 shrink-0 snap-start rounded-2xl border border-white/15 bg-white/10 p-3.5 text-center backdrop-blur-md transition-all duration-300 hover:-translate-y-1 hover:border-[#f3e4b2]/60 hover:bg-white/18 shadow-lg">
                                <div class="relative mx-auto mb-3 h-20 w-20 sm:h-24 sm:w-24 overflow-hidden rounded-2xl border border-white/20 bg-[#14361c] shadow-inner">
                                    @if(!empty($item['foto']))
                                        <img 
                                            src="{{ $item['foto'] }}" 
                                            alt="{{ $item['nama'] }}" 
                                            class="h-full w-full object-cover object-top"
                                        >
                                    @else
                                        <div class="flex h-full w-full flex-col items-center justify-center bg-gradient-to-br from-[#1d4d29] to-[#123119] text-[#f3e4b2]">
                                            <svg width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                
                                <h5 class="truncate text-xs font-bold text-white sm:text-sm" style="color: #ffffff !important;" title="{{ $item['nama'] }}">
                                    {{ $item['nama'] }}
                                </h5>
                                <p class="mt-0.5 truncate text-[11px] font-medium text-[#f3e4b2]" style="color: #f3e4b2 !important;" title="{{ $item['jabatan'] }}">
                                    {{ $item['jabatan'] }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif

            </div>
        </div>
    </section>
@endsection

