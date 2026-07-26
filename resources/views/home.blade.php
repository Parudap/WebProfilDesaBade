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
                                <p class="mt-4 text-sm leading-7 text-white/70">Ketahui sejarah berdiri, batas wilayah geografis, visi misi pembangunan, serta susunan kepengurusan perangkat desa dan Badan Permusyawaratan Desa (BPD).</p>
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
@endsection
