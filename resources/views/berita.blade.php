@extends('layouts.app')

@section('content')
    <section id="berita" class="section-pad pb-16 sm:pb-20">
        <div class="container-shell">
            <!-- Header di luar kotak putih (Gaya Bansos) -->
            <div class="reveal mb-10">
                <h2 class="infotab-panel-title">Berita & Informasi</h2>
                <p class="infotab-panel-desc">
                    Menyajikan informasi terbaru tentang peristiwa, berita terkini, kegiatan pemerintah desa, pembangunan, dan agenda sosial budaya di Desa Bade.
                </p>
            </div>

            <!-- Filter Panel Berita -->
            <div class="reveal mb-8 bg-white border border-gray-100 rounded-[2rem] p-5 shadow-sm">
                <form method="GET" action="{{ route('berita') }}" class="grid gap-4 md:grid-cols-[1fr_auto]">
                    <!-- Search Input -->
                    <div class="relative">
                        <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari berita atau pengumuman..." 
                               class="w-full pl-10 pr-4 py-3 rounded-2xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent text-sm" style="height: 46px;">
                        <div class="absolute left-3.5 top-3.5 text-gray-400">
                            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.637 10.637z"/></svg>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-2">
                        <button type="submit" class="bg-green-700 hover:bg-green-800 text-white font-semibold px-5 py-3 rounded-2xl text-sm transition" style="height: 46px; border: none; cursor: pointer;">
                            Cari
                        </button>
                        @if(request('cari'))
                            <a href="{{ route('berita') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold px-4 py-3 rounded-2xl text-sm transition flex items-center justify-center" style="height: 46px; text-decoration: none;">
                                Reset
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            @if(count($news) > 0)
                <!-- Kotak putih pembungkus konten -->
                <div class="section-shell p-6 lg:p-10">
                    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                        @foreach ($news as $article)
                            <article class="news-card reveal overflow-hidden flex flex-col justify-between h-full bg-white border border-gray-100 rounded-[2rem] transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl">
                                <div class="flex flex-col h-full">
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

                    <!-- Pagination -->
                    @if (method_exists($news, 'hasPages') && $news->hasPages())
                        <div class="mt-12 flex justify-center">
                            <nav class="inline-flex items-center gap-1.5 rounded-2xl bg-white p-2 shadow-sm border border-gray-100" aria-label="Pagination">
                                {{-- Previous Page Link --}}
                                @if ($news->onFirstPage())
                                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-xl border border-gray-200 bg-gray-50 text-gray-300 cursor-not-allowed">
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                @else
                                    <a href="{{ $news->previousPageUrl() }}" class="inline-flex h-10 w-10 items-center justify-center rounded-xl border border-gray-200 bg-white text-gray-500 hover:bg-gray-50 transition">
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                @endif

                                {{-- Page Links --}}
                                @foreach ($news->getUrlRange(1, $news->lastPage()) as $page => $url)
                                    @if ($page == $news->currentPage())
                                        <span aria-current="page" class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-green-600 text-white font-semibold shadow-sm">{{ $page }}</span>
                                    @else
                                        <a href="{{ $url }}" class="inline-flex h-10 w-10 items-center justify-center rounded-xl border border-gray-200 bg-white text-gray-700 hover:bg-gray-50 transition">{{ $page }}</a>
                                    @endif
                                @endforeach

                                {{-- Next Page Link --}}
                                @if ($news->hasMorePages())
                                    <a href="{{ $news->nextPageUrl() }}" class="inline-flex h-10 w-10 items-center justify-center rounded-xl border border-gray-200 bg-white text-gray-500 hover:bg-gray-50 transition">
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
                    <div class="flex h-16 w-16 items-center justify-center rounded-full bg-[rgba(76,175,80,0.08)] text-[#2e7d32] mb-4 border border-[color:var(--line)]">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="h-8 w-8"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-[color:var(--text)] uppercase tracking-wider">Belum Ada Berita</h3>
                    <p class="mt-2 text-sm text-[color:var(--text-soft)] max-w-sm">Data berita atau artikel Desa Bade dapat ditambahkan melalui panel Admin.</p>
                </div>
            @endif
        </div>
    </section>
@endsection
