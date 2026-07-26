@extends('layouts.app')

@section('content')
    <section id="belanja" class="section-pad pb-16 sm:pb-20">
        <div class="container-shell">
            <!-- Header di luar kotak putih (Gaya Bansos) -->
            <div class="reveal mb-10">
                <h2 class="infotab-panel-title">UMKM & Belanja</h2>
                <p class="infotab-panel-desc">
                    Kenali dan dukung UMKM asli Desa Bade, Boyolali. Produk-produk yang tersedia mencerminkan potensi dan kreativitas masyarakat desa yang terus berkembang.
                </p>
            </div>

            <!-- Filter Panel Belanja -->
            <div class="reveal mb-8 bg-white border border-gray-100 rounded-[2rem] p-5 shadow-sm">
                <form method="GET" action="{{ route('belanja') }}" class="grid gap-4 sm:grid-cols-2 md:grid-cols-[2fr_1.5fr_auto]">
                    <!-- Search Input -->
                    <div class="relative">
                        <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari produk UMKM..." 
                               class="w-full pl-10 pr-4 py-3 rounded-2xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent text-sm" style="height: 46px;">
                        <div class="absolute left-3.5 top-3.5 text-gray-400">
                            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.637 10.637z"/></svg>
                        </div>
                    </div>
                    
                    <!-- Category Select -->
                    <div>
                        <select name="kategori" onchange="this.form.submit()"
                                class="w-full px-4 py-3 rounded-2xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent text-sm bg-white cursor-pointer" style="height: 46px;">
                            <option value="">Semua Kategori</option>
                            <option value="Kuliner &amp; Olahan Pangan" {{ request('kategori') === 'Kuliner & Olahan Pangan' ? 'selected' : '' }}>Kuliner &amp; Olahan Pangan</option>
                            <option value="Hasil Tani &amp; Kebun" {{ request('kategori') === 'Hasil Tani & Kebun' ? 'selected' : '' }}>Hasil Tani &amp; Kebun</option>
                            <option value="Kerajinan Tangan" {{ request('kategori') === 'Kerajinan Tangan' ? 'selected' : '' }}>Kerajinan Tangan</option>
                            <option value="Konveksi &amp; Pakaian" {{ request('kategori') === 'Konveksi & Pakaian' ? 'selected' : '' }}>Konveksi &amp; Pakaian</option>
                            <option value="Jasa &amp; Layanan" {{ request('kategori') === 'Jasa & Layanan' ? 'selected' : '' }}>Jasa &amp; Layanan</option>
                        </select>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-2">
                        <button type="submit" class="bg-green-700 hover:bg-green-800 text-white font-semibold px-5 py-3 rounded-2xl text-sm transition" style="height: 46px; border: none; cursor: pointer;">
                            Cari
                        </button>
                        @if(request('cari') || request('kategori'))
                            <a href="{{ route('belanja') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold px-4 py-3 rounded-2xl text-sm transition flex items-center justify-center" style="height: 46px; text-decoration: none;">
                                Reset
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            @if(count($shops) > 0)
                <!-- Kotak putih pembungkus konten -->
                <div class="section-shell p-6 lg:p-10">
                    <div class="grid gap-5 lg:grid-cols-3">
                        @foreach ($shops as $shop)
                            <article class="shop-card reveal overflow-hidden">
                                <img src="{{ $shop['image'] }}" alt="{{ $shop['name'] }}" class="h-72 w-full object-cover">
                                <div class="p-6">
                                    <p class="text-xs font-semibold uppercase tracking-[0.22em] text-[color:var(--gold)]">{{ $shop['category'] }}</p>
                                    <h3 class="mt-3 text-2xl font-semibold text-[color:var(--primary-deep)]">{{ $shop['name'] }}</h3>
                                    <div class="mt-5 flex items-center justify-between gap-4">
                                        <span class="rounded-full bg-[color:var(--beige)] px-4 py-2 text-sm font-semibold text-[color:var(--primary)]">{{ $shop['price'] }}</span>
                                        <a href="{{ route('belanja.show', $shop['slug']) }}" class="btn-ghost px-5 py-3 text-sm">Detail</a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    @if (method_exists($shops, 'hasPages') && $shops->hasPages())
                        <div class="mt-12 flex justify-center">
                            <nav class="inline-flex items-center gap-1.5 rounded-2xl bg-white p-2 shadow-sm border border-gray-100" aria-label="Pagination">
                                {{-- Previous Page Link --}}
                                @if ($shops->onFirstPage())
                                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-xl border border-gray-200 bg-gray-50 text-gray-300 cursor-not-allowed">
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                @else
                                    <a href="{{ $shops->previousPageUrl() }}" class="inline-flex h-10 w-10 items-center justify-center rounded-xl border border-gray-200 bg-white text-gray-500 hover:bg-gray-50 transition">
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                @endif

                                {{-- Page Links --}}
                                @foreach ($shops->getUrlRange(1, $shops->lastPage()) as $page => $url)
                                    @if ($page == $shops->currentPage())
                                        <span aria-current="page" class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-green-600 text-white font-semibold shadow-sm">{{ $page }}</span>
                                    @else
                                        <a href="{{ $url }}" class="inline-flex h-10 w-10 items-center justify-center rounded-xl border border-gray-200 bg-white text-gray-700 hover:bg-gray-50 transition">{{ $page }}</a>
                                    @endif
                                @endforeach

                                {{-- Next Page Link --}}
                                @if ($shops->hasMorePages())
                                    <a href="{{ $shops->nextPageUrl() }}" class="inline-flex h-10 w-10 items-center justify-center rounded-xl border border-gray-200 bg-white text-gray-500 hover:bg-gray-50 transition">
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                @else
                                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-xl border border-gray-200 bg-gray-50 text-gray-300 cursor-not-allowed">
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                @endif
                            </nav>
                        </div>
                    @endif
                </div>
            @else
                <!-- Tampilan Empty State tanpa pembungkus section-shell -->
                <div class="flex flex-col items-center justify-center p-12 text-center bg-[color:var(--surface-strong)] border border-[color:var(--line)] rounded-[1.75rem] shadow-sm select-none">
                    <div class="flex h-16 w-16 items-center justify-center rounded-full bg-[rgba(255,193,7,0.08)] text-[#ff8f00] mb-4 border border-[color:var(--line)]">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="h-8 w-8"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-[color:var(--text)] uppercase tracking-wider">Belum Ada Produk Belanja</h3>
                    <p class="mt-2 text-sm text-[color:var(--text-soft)] max-w-sm">Produk UMKM Desa Bade dapat ditambahkan melalui panel Admin.</p>
                </div>
            @endif
        </div>
    </section>
@endsection
