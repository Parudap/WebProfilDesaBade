@extends('layouts.app')

@section('content')
    <section id="listing" class="section-pad">
        <div class="container-shell">
            <div class="section-shell p-6 lg:p-10">
                <div class="section-heading reveal">
                    <p class="eyebrow">Listing</p>
                    <h2 class="section-title max-w-3xl">Menu list dibuat lebih hidup dengan identitas visual Boyolali.</h2>
                    <p class="section-copy">Bagian ini menggantikan gaya daftar biasa menjadi kartu interaktif yang lebih premium. Setiap item bisa dipakai untuk layanan desa, kategori konten, atau jalur navigasi cepat.</p>
                </div>

                <div class="mt-8 grid gap-5 lg:grid-cols-2">
                    @foreach ($listings as $listing)
                        <article class="listing-card reveal p-6">
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
@endsection
