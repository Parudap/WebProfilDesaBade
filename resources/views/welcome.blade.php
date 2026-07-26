<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Desa Bade | Kecamatan Klego, Kabupaten Boyolali</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
    <div class="site-shell" x-data="{ open: false }">
        <header class="fixed inset-x-0 top-0 z-50">
            <div class="container-shell pt-4">
                <div class="nav-shell flex items-center justify-between gap-4 rounded-full px-4 py-3 lg:px-6">
                    <a href="#home" class="flex min-w-0 items-center gap-4">
                        <div class="flex h-16 w-16 items-center justify-center lg:h-20 lg:w-20">
                            <img src="{{ $brandLogo }}" alt="Logo Kabupaten Boyolali" class="h-full w-full object-contain drop-shadow-[0_12px_24px_rgba(0,0,0,0.28)]">
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
                            <a
                                href="{{ $item['href'] }}"
                                data-nav="{{ ltrim($item['href'], '#') }}"
                                class="nav-link rounded-full px-4 py-2 text-sm font-semibold text-[color:var(--text)] transition hover:bg-[rgba(76,175,80,0.10)] hover:text-[color:var(--primary)]"
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
                            <a
                                href="{{ $item['href'] }}"
                                class="rounded-2xl border border-[color:var(--line)] px-4 py-3 text-sm font-semibold text-[color:var(--text)] transition hover:bg-[rgba(76,175,80,0.08)]"
                                @click="open = false"
                            >
                                {{ $item['label'] }}
                            </a>
                        @endforeach
                    </nav>
                </div>
            </div>
        </header>

        <main>
            <section id="home" class="hero-section">
                <div class="hero-media">
                    <img src="{{ $heroImage }}" alt="Visual modern Desa Bade" class="hero-image">
                </div>
                <div class="hero-overlay"></div>
                <div class="hero-noise"></div>

                <div class="container-shell relative z-10 flex min-h-screen flex-col justify-end pb-12 pt-28 sm:pb-16 lg:pb-20 lg:pt-36">
                    <div class="grid items-end gap-10 lg:grid-cols-[1.15fr_0.85fr]">
                        <div class="reveal space-y-7">
                            <div class="hero-copy-shell">
                                <p class="mb-4 inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/12 px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.28em] text-white/80">
                                    <span class="h-2 w-2 rounded-full bg-[color:var(--gold)]"></span>
                                    {{ $headline }}
                                </p>
                                <p class="max-w-3xl text-base leading-7 text-white/78 sm:text-lg">
                                    {{ $subheadline }}
                                </p>
                                <h1 class="mt-5 max-w-5xl text-balance text-[3rem] font-semibold uppercase leading-[0.86] text-white sm:text-[4.2rem] lg:text-[6.2rem]">
                                    <span class="block text-[#f3e4b2]">{{ $heroTitleTop }}</span>
                                    <span class="block">{{ $heroTitleBottom }}</span>
                                </h1>
                                <p class="mt-6 max-w-2xl text-base leading-8 text-white/78 sm:text-lg">
                                    {{ $heroCopy }}
                                </p>
                            </div>

                            <div class="flex flex-wrap gap-4">
                                <a href="#profil" class="btn-primary">Jelajahi Profil</a>
                                <a href="#listing" class="btn-secondary">Lihat Menu List</a>
                            </div>
                        </div>

                        <aside class="reveal reveal-delay-1 grid gap-4">
                            <div class="glass-card p-5 sm:p-6">
                                <div class="flex items-start justify-between gap-4">
                                    <div>
                                        <p class="text-xs font-semibold uppercase tracking-[0.24em] text-white/65">Sorotan Utama</p>
                                        <h2 class="mt-3 text-2xl font-semibold leading-tight text-white sm:text-3xl">
                                            Informasi desa tersedia dalam satu halaman yang modern.
                                        </h2>
                                    </div>
                                    <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl border border-white/15 bg-white/12 p-3">
                                        <img src="{{ $brandLogo }}" alt="Logo Kabupaten Boyolali" class="h-full w-full object-contain">
                                    </div>
                                </div>
                                <p class="mt-4 text-sm leading-7 text-white/70">
                                    Temukan profil desa, potensi, berita, dan kontak secara cepat lewat tampilan yang rapi, resmi, dan mudah dipakai.
                                </p>
                            </div>

                            <div class="grid gap-4 sm:grid-cols-2">
                                @foreach ($stats as $stat)
                                    <div class="glass-card p-5">
                                        <p class="hero-stat-number">
                                            <span class="stat-value">{{ $stat['value'] }}</span>
                                            <span class="stat-suffix">{{ $stat['suffix'] }}</span>
                                        </p>
                                        <p class="mt-3 text-sm leading-7 tracking-[0.01em] text-white/80">{{ $stat['label'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </aside>
                    </div>

                    <div class="reveal reveal-delay-2 mt-12 flex items-center gap-3 text-white/65">
                        <span class="text-xs font-semibold uppercase tracking-[0.24em]">Gulir ke bawah</span>
                        <span class="scroll-indicator"></span>
                    </div>
                </div>
            </section>

            <!-- Profil section removed as requested -->

            <section id="infografis" class="section-pad">
                <div class="container-shell">
                    <div class="section-heading reveal">
                        <p class="eyebrow">Infografis</p>
                        <h2 class="section-title max-w-3xl">Data penting desa diringkas dalam panel yang cepat dibaca.</h2>
                        <p class="section-copy">
                            Kartu-kartu ini dibuat untuk memberi kesan dinamis dan modern, cocok untuk sorotan statistik warga,
                            pelayanan, program prioritas, dan indikator desa lainnya.
                        </p>
                    </div>

                    <div class="mt-8 grid gap-4 lg:grid-cols-4">
                        @foreach ($infographics as $item)
                            <article class="content-card reveal p-6" style="transition-delay: {{ $loop->iteration * 80 }}ms;">
                                <p
                                    class="metric-number"
                                    data-counter="{{ preg_replace('/[^0-9]/', '', $item['value']) }}"
                                    data-decimals="{{ str_contains($item['value'], '.') ? '1' : '0' }}"
                                    data-suffix="{{ preg_replace('/[0-9.,]/', '', $item['value']) }}"
                                >
                                    0
                                </p>
                                <h3 class="mt-4 text-xl font-semibold text-[color:var(--primary-deep)]">{{ $item['label'] }}</h3>
                                <p class="mt-3 text-sm leading-7 text-[color:var(--text-soft)]">{{ $item['description'] }}</p>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>

            <section id="listing" class="section-pad">
                <div class="container-shell">
                    <div class="section-shell p-6 lg:p-10">
                        <div class="section-heading reveal">
                            <p class="eyebrow">Listing</p>
                            <h2 class="section-title max-w-3xl">Menu list dibuat lebih hidup dengan identitas visual Boyolali.</h2>
                            <p class="section-copy">
                                Bagian ini menggantikan gaya daftar biasa menjadi kartu interaktif yang lebih premium.
                                Setiap item bisa dipakai untuk layanan desa, kategori konten, atau jalur navigasi cepat.
                            </p>
                        </div>

                        <div class="mt-8 grid gap-5 lg:grid-cols-2">
                            @foreach ($listings as $listing)
                                <article class="listing-card reveal p-6" style="transition-delay: {{ $loop->iteration * 90 }}ms;">
                                    <div class="flex items-start gap-4">
                                        <div class="listing-logo">
                                            <img src="{{ $brandLogo }}" alt="Logo Kabupaten Boyolali" class="h-14 w-14 object-contain">
                                        </div>
                                        <div class="min-w-0">
                                            <p class="text-xs font-semibold uppercase tracking-[0.22em] text-[color:var(--gold)]">Menu {{ $loop->iteration }}</p>
                                            <h3 class="mt-2 text-2xl font-semibold text-[color:var(--primary-deep)]">{{ $listing['title'] }}</h3>
                                            <p class="mt-3 text-sm leading-7 text-[color:var(--text-soft)]">{{ $listing['description'] }}</p>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>

            <section id="idm" class="section-pad">
                <div class="container-shell">
                    <div class="reveal max-w-2xl mx-auto dark-panel p-8 text-center">
                        <p class="eyebrow eyebrow-dark">IDM</p>
                        <h2 class="mt-5 text-3xl font-semibold uppercase leading-none text-white sm:text-4xl">Data Belum Ditemukan</h2>
                        <p class="mt-6 text-sm leading-7 text-white/72">
                            Mohon maaf, data Indeks Desa Membangun (IDM) belum tersedia atau sedang dalam proses pembaruan oleh pihak desa.
                        </p>
                    </div>
                </div>
            </section>

            <section id="berita" class="section-pad">
                <div class="container-shell">
                    <div class="section-heading reveal">
                        <p class="eyebrow">Berita</p>
                        <h2 class="section-title max-w-3xl">Ruang informasi terbaru desa tetap rapi, ringkas, dan menarik.</h2>
                        <p class="section-copy">
                            Kartu berita dibuat dengan gambar modern, tanggal terbit yang jelas, dan ringkasan singkat
                            agar pengunjung bisa memindai konten dengan cepat dari beranda.
                        </p>
                    </div>

                    <div class="mt-8 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                        @foreach ($news as $article)
                            <article class="news-card reveal overflow-hidden flex flex-col justify-between h-full bg-white border border-gray-100 rounded-[2rem] transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl" style="transition-delay: {{ $loop->iteration * 90 }}ms;">
                                <div class="flex flex-col h-full w-full">
                                    <div class="relative overflow-hidden">
                                        <img src="{{ $article['image'] }}" alt="{{ $article['title'] }}" class="h-56 w-full object-cover transition-transform duration-500 hover:scale-105">
                                        <div class="absolute top-4 left-4 bg-white/95 backdrop-blur-sm px-3.5 py-1.5 rounded-full border border-gray-100/50 shadow-md text-xs font-bold text-green-700">
                                            {{ $article['date'] }}
                                        </div>
                                    </div>
                                    <div class="p-6 flex-1 flex flex-col justify-between">
                                        <div>
                                            <h3 class="text-lg font-bold text-gray-900 leading-snug line-clamp-2 hover:text-green-600 transition-colors duration-200">
                                                <a href="{{ route('berita.show', $article['slug']) }}">{{ $article['title'] }}</a>
                                            </h3>
                                            <p class="mt-3 text-sm leading-relaxed text-gray-500 line-clamp-3">{{ $article['summary'] }}</p>
                                        </div>
                                        <div class="mt-5 flex items-center justify-between">
                                            <a href="{{ route('berita.show', $article['slug']) }}" class="inline-flex items-center justify-center px-5 py-2.5 text-xs font-bold text-white bg-[color:var(--primary)] rounded-full hover:bg-[color:var(--primary-deep)] hover:-translate-y-0.5 shadow-[0_4px_12px_rgba(46,125,50,0.25)] transition duration-150">
                                                Detail Berita
                                            </a>
                                            <div class="flex items-center gap-1.5 text-[11px] text-gray-500 font-semibold">
                                                <svg class="h-4 w-4 stroke-[1.8] text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                <span>{{ $article['date'] }} • {{ $article['time'] }} WIB</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>

            <section id="belanja" class="section-pad pb-16 sm:pb-20">
                <div class="container-shell">
                    <div class="section-shell p-6 lg:p-10">
                        <div class="section-heading reveal">
                            <p class="eyebrow">Belanja</p>
                            <h2 class="section-title max-w-3xl">Kenali dan dukung UMKM asli Desa Bade, Boyolali.</h2>
                            <p class="section-copy">
                                Desa Bade memiliki beragam UMKM yang dikelola langsung oleh warga — dari susu sapi segar, keju lokal, keripik tempe, hingga berbagai produk makanan dan camilan khas daerah. Semua diproduksi secara lokal dengan bahan-bahan pilihan dari lingkungan sekitar desa.
                            </p>
                        </div>

                        <div class="mt-8 grid gap-5 lg:grid-cols-3">
                            @foreach ($shops as $shop)
                                <article class="shop-card reveal overflow-hidden" style="transition-delay: {{ $loop->iteration * 90 }}ms;">
                                    <img src="{{ $shop['image'] }}" alt="{{ $shop['name'] }}" class="h-72 w-full object-cover">
                                    <div class="p-6">
                                    <p class="text-xs font-semibold uppercase tracking-[0.22em] text-[color:var(--gold)]">{{ $shop['category'] }}</p>
                                    <h3 class="mt-3 text-2xl font-semibold text-[color:var(--primary-deep)]">{{ $shop['name'] }}</h3>
                                        <div class="mt-5 flex items-center justify-between gap-4">
                                            <span class="rounded-full bg-[color:var(--beige)] px-4 py-2 text-sm font-semibold text-[color:var(--primary)]">{{ $shop['price'] }}</span>
                                            <a href="#listing" class="btn-ghost px-5 py-3 text-sm">Lihat detail</a>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
