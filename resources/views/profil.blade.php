@extends('layouts.app')

@section('content')
<section id="profil" class="section-pad">
    <div class="container-shell">

        {{-- Alpine state membungkus header + semua panel --}}
        <div x-data="{ tab: 'visi' }">

            {{-- ===== HEADER ROW: judul kiri | tab buttons kanan ===== --}}
            <div class="infografis-header">

                {{-- Kiri: Judul saja --}}
                <div class="reveal">
                    <p class="eyebrow">Profil Desa</p>
                    <h1 class="infografis-title">Profil<br>Desa Bade</h1>
                </div>

                {{-- Kanan: Tab nav --}}
                <div class="infotab-nav reveal reveal-delay-1">
                    <div class="infotab-list" role="tablist">

                        {{-- Tab 1: Visi & Misi --}}
                        <button class="infotab-btn" :class="tab === 'visi' && 'infotab-btn--active'"
                            @click="tab = 'visi'" role="tab" aria-controls="tab-visi">
                            <span class="infotab-icon">
                                <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="24" cy="24" r="10" stroke="currentColor" stroke-width="2.5"/>
                                    <circle cx="24" cy="24" r="4" fill="currentColor" opacity="0.6"/>
                                    <path d="M4 24h6M38 24h6M24 4v6M24 38v6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                                    <path d="M10 10l4 4M34 34l4 4M10 38l4-4M34 14l4-4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </span>
                            <span class="infotab-label">Visi &amp; Misi</span>
                        </button>

                        {{-- Tab 2: Sejarah Desa --}}
                        <button class="infotab-btn" :class="tab === 'sejarah' && 'infotab-btn--active'"
                            @click="tab = 'sejarah'" role="tab" aria-controls="tab-sejarah">
                            <span class="infotab-icon">
                                <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="8" y="10" width="26" height="32" rx="3" stroke="currentColor" stroke-width="2.5"/>
                                    <path d="M16 10V6a2 2 0 012-2h16a2 2 0 012 2v32a2 2 0 01-2 2H34" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                                    <path d="M14 20h14M14 27h14M14 34h8" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                                </svg>
                            </span>
                            <span class="infotab-label">Sejarah</span>
                        </button>

                        {{-- Tab 3: Struktur Organisasi --}}
                        <button class="infotab-btn" :class="tab === 'struktur' && 'infotab-btn--active'"
                            @click="tab = 'struktur'" role="tab" aria-controls="tab-struktur">
                            <span class="infotab-icon">
                                <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="18" y="4" width="12" height="10" rx="2" stroke="currentColor" stroke-width="2.5"/>
                                    <rect x="4" y="34" width="12" height="10" rx="2" stroke="currentColor" stroke-width="2.5"/>
                                    <rect x="18" y="34" width="12" height="10" rx="2" stroke="currentColor" stroke-width="2.5"/>
                                    <rect x="32" y="34" width="12" height="10" rx="2" stroke="currentColor" stroke-width="2.5"/>
                                    <path d="M24 14v8M24 22H10v4M24 22h14v4" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            <span class="infotab-label">Organisasi</span>
                        </button>

                        {{-- Tab 4: Peta Lokasi --}}
                        <button class="infotab-btn" :class="tab === 'peta' && 'infotab-btn--active'"
                            @click="tab = 'peta'" role="tab" aria-controls="tab-peta">
                            <span class="infotab-icon">
                                <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M24 6C17.373 6 12 11.373 12 18c0 9.75 12 24 12 24s12-14.25 12-24c0-6.627-5.373-12-12-12z" stroke="currentColor" stroke-width="2.5"/>
                                    <circle cx="24" cy="18" r="4" stroke="currentColor" stroke-width="2.5"/>
                                    <path d="M10 42h28" stroke="currentColor" stroke-width="2" stroke-linecap="round" opacity="0.4"/>
                                </svg>
                            </span>
                            <span class="infotab-label">Peta Lokasi</span>
                        </button>

                    </div>
                </div>
            </div>{{-- end infografis-header --}}

            @php
                $imageSrc = $profileImage ?? asset('desa-bade-gateway.png');
                $version = time();
                if (!empty($profileImage)) {
                    $parsed = parse_url($profileImage, PHP_URL_PATH);
                    $clean = ltrim($parsed, '/');
                    if (str_starts_with($clean, 'storage/')) {
                        $real = storage_path('app/public/' . substr($clean, 8));
                        if (file_exists($real)) $version = filemtime($real);
                    }
                } else {
                    $real = public_path('desa-bade-gateway.png');
                    if (file_exists($real)) $version = filemtime($real);
                }
            @endphp

            {{-- ===== TAB PANELS ===== --}}

            {{-- ─── TAB 1: VISI & MISI ─── --}}
            <div id="tab-visi" role="tabpanel" x-show="tab === 'visi'" x-transition.opacity.duration.300ms>

                {{-- Banner panel header --}}
                <div class="infotab-panel">
                    <div class="infotab-panel-text">
                        <h2 class="infotab-panel-title">Visi &amp; Misi Desa Bade</h2>
                        <p class="infotab-panel-desc">Landasan arah pembangunan Desa Bade menuju masyarakat yang mandiri, harmonis, sehat, cerdas, dan sejahtera melalui tata kelola pemerintahan yang profesional dan transparan.</p>
                    </div>
                    <div class="infotab-panel-art">
                        <div class="profil-tab-foto-wrap">
                            <img src="{{ $imageSrc }}{{ str_contains($imageSrc, '?') ? '&' : '?' }}v={{ $version }}" alt="Balai Desa Bade" class="profil-tab-foto-img">
                            <span class="profil-tab-foto-tag">Balai Desa Bade</span>
                        </div>
                    </div>
                </div>

                {{-- Konten Visi & Misi --}}
                <div class="grid gap-6 lg:grid-cols-[0.85fr_1.15fr] items-start" style="margin-bottom:2.5rem">

                    {{-- Visi --}}
                    <div class="section-shell p-6 sm:p-8 h-fit">
                        <div class="flex items-center gap-3 mb-5">
                            <div style="width:42px;height:42px;border-radius:12px;background:linear-gradient(135deg,rgba(46,125,50,0.15),rgba(76,175,80,0.08));display:flex;align-items:center;justify-content:center;flex-shrink:0">
                                <svg width="22" height="22" fill="none" stroke="var(--primary)" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="5"/><path d="M2 12h2M20 12h2M12 2v2M12 20v2" stroke-linecap="round"/></svg>
                            </div>
                            <h2 class="text-xl font-bold text-[color:var(--primary-deep)]" style="font-family:'Cinzel',serif;letter-spacing:0.04em">VISI</h2>
                        </div>
                        <blockquote style="border-left:4px solid var(--primary);padding-left:1.25rem;margin:0">
                            <p class="text-sm leading-7 text-[color:var(--text-soft)] font-normal" style="hyphens:none">
                                @if(!empty($profil->visi))
                                    {{ $profil->visi }}
                                @else
                                    Terwujudnya Desa Bade sebagai desa mandiri, untuk mencapai masyarakat dengan kehidupan yang lebih layak, harmonis, sehat, cerdas dan lebih sejahtera.
                                @endif
                            </p>
                        </blockquote>
                    </div>

                    {{-- Misi --}}
                    <div class="section-shell p-6 sm:p-8">
                        @php
                            $misiList = [];
                            if (!empty($profil->misi)) {
                                $raw = $profil->misi;
                                $decoded = json_decode($raw, true);
                                if (is_array($decoded)) {
                                    $misiList = array_values(array_filter($decoded, fn($m) => trim(strip_tags($m)) !== ''));
                                } elseif (preg_match('/<li/i', $raw)) {
                                    preg_match_all('/<li[^>]*>(.*?)<\/li>/si', $raw, $matches);
                                    if (!empty($matches[1])) {
                                        $misiList = array_values(array_filter(
                                            array_map(fn($m) => trim(strip_tags($m)), $matches[1]),
                                            fn($m) => $m !== ''
                                        ));
                                    }
                                } else {
                                    $misiList = array_values(array_filter(
                                        array_map('trim', explode("\n", $raw)),
                                        fn($m) => $m !== ''
                                    ));
                                }
                            }
                            $defaultMisi = [
                                'Pelayanan 24 Jam',
                                'Pembuatan dokumen penting seperti akte kelahiran, kartu keluarga, surat pindah tidak dipungut biaya sama sekali',
                                'Mewujudkan aparatur pemerintah desa yang berwibawa, berfungsi sebagai pelayan masyarakat yang profesional, serta meningkatkan inisiatif kerja dalam merencanakan pembangunan, pembinaan masyarakat dan pemberdayaan',
                                'Meningkatkan pembangunan, pemeliharaan dan peningkatan bidang Pendidikan, Kesehatan, pekerjaan umum, dan penataan ruang, kawasan permukiman, kehutanan dan lingkungan hidup, perhubungan, komunikasi dan informatika',
                                'Meningkatkan pembinaan kepada lembaga kemasyarakatan, pemuda dan olahraga dan karang taruna, organisasi perempuan, kesenian sosial budaya, kerukunan umat beragama, lembaga adat dan anak usia dini',
                                'Meningkatkan pemberdayaan masyarakat desa dalam bidang perikanan, pertanian dan peternakan, peningkatan kapasitas aparatur desa, pemberdayaan perempuan, perlindungan anak dan keluarga',
                                'Meningkatkan penanggulangan bencana darurat dan mendesak di desa',
                            ];
                        @endphp
                        <div class="flex items-center gap-3 mb-5">
                            <div style="width:42px;height:42px;border-radius:12px;background:linear-gradient(135deg,rgba(46,125,50,0.15),rgba(76,175,80,0.08));display:flex;align-items:center;justify-content:center;flex-shrink:0">
                                <svg width="22" height="22" fill="none" stroke="var(--primary)" stroke-width="2" viewBox="0 0 24 24"><path d="M9 11l3 3L22 4" stroke-linecap="round" stroke-linejoin="round"/><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </div>
                            <h2 class="text-xl font-bold text-[color:var(--primary-deep)]" style="font-family:'Cinzel',serif;letter-spacing:0.04em">MISI</h2>
                        </div>
                        <ol class="space-y-3" style="padding-left:0;list-style:none;margin:0">
                            @forelse($misiList as $idx => $poin)
                                <li class="flex gap-3 items-start">
                                    <span style="min-width:26px;height:26px;border-radius:8px;background:rgba(46,125,50,0.1);color:var(--primary);font-size:12px;font-weight:800;display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:1px">{{ $idx + 1 }}</span>
                                    <span class="text-sm leading-7 text-[color:var(--text-soft)]" style="hyphens:none">{{ $poin }}</span>
                                </li>
                            @empty
                                @foreach($defaultMisi as $idx => $poin)
                                    <li class="flex gap-3 items-start">
                                        <span style="min-width:26px;height:26px;border-radius:8px;background:rgba(46,125,50,0.1);color:var(--primary);font-size:12px;font-weight:800;display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:1px">{{ $idx + 1 }}</span>
                                        <span class="text-sm leading-7 text-[color:var(--text-soft)]" style="hyphens:none">{{ $poin }}</span>
                                    </li>
                                @endforeach
                            @endforelse
                        </ol>
                    </div>

                </div>
            </div>{{-- end tab-visi --}}

            {{-- ─── TAB 2: SEJARAH DESA ─── --}}
            <div id="tab-sejarah" role="tabpanel" x-show="tab === 'sejarah'" x-transition.opacity.duration.300ms x-cloak>

                <div class="infotab-panel">
                    <div class="infotab-panel-text">
                        <h2 class="infotab-panel-title">Sejarah Desa Bade</h2>
                        <p class="infotab-panel-desc">Perjalanan panjang Desa Bade dari masa ke masa, menelusuri asal usul, perkembangan, dan warisan budaya yang membentuk identitas desa hingga saat ini.</p>
                    </div>
                    <div class="infotab-panel-art">
                        <div class="profil-tab-foto-wrap">
                            <img src="{{ $imageSrc }}{{ str_contains($imageSrc, '?') ? '&' : '?' }}v={{ $version }}" alt="Balai Desa Bade" class="profil-tab-foto-img">
                            <span class="profil-tab-foto-tag">Balai Desa Bade</span>
                        </div>
                    </div>
                </div>

                <div style="margin-bottom:2.5rem">
                    <div class="section-shell p-6 sm:p-8 lg:p-10">
                        <div class="section-heading reveal" style="margin-bottom:2rem">
                            <p class="eyebrow">Sejarah Desa</p>
                            <h2 class="section-title max-w-3xl" style="hyphens:none">{{ $villageHistory['title'] }}</h2>
                            <p class="section-copy" style="hyphens:none">{{ $villageHistory['subtitle'] }}</p>
                        </div>
                        <div class="content-card reveal p-6 sm:p-8 lg:p-10">
                            <p class="text-base leading-9 text-[color:var(--text-soft)] lg:text-lg" style="hyphens:none; word-break:normal">
                                {!! nl2br(e($villageHistory['paragraph'])) !!}
                            </p>
                        </div>
                    </div>
                </div>

            </div>{{-- end tab-sejarah --}}

            {{-- ─── TAB 3: STRUKTUR ORGANISASI ─── --}}
            <div id="tab-struktur" role="tabpanel" x-show="tab === 'struktur'" x-transition.opacity.duration.300ms x-cloak>

                <div class="infotab-panel">
                    <div class="infotab-panel-text">
                        <h2 class="infotab-panel-title">Struktur Organisasi</h2>
                        <p class="infotab-panel-desc">Susunan aparatur pemerintah Desa Bade yang berdedikasi memberikan pelayanan publik secara profesional, adil, dan transparan demi kemajuan desa.</p>
                    </div>
                    <div class="infotab-panel-art">
                        <div class="profil-tab-foto-wrap">
                            <img src="{{ $imageSrc }}{{ str_contains($imageSrc, '?') ? '&' : '?' }}v={{ $version }}" alt="Balai Desa Bade" class="profil-tab-foto-img">
                            <span class="profil-tab-foto-tag">Balai Desa Bade</span>
                        </div>
                    </div>
                </div>

                <div style="margin-bottom:2.5rem">
                    <div class="section-shell p-6 sm:p-8 lg:p-10">
                        <div class="overflow-x-auto rounded-2xl border border-[color:var(--line)] bg-white shadow-[0_12px_40px_rgba(46,125,50,0.04)]">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="bg-[rgba(248,250,245,0.9)] border-b border-[color:var(--line)]">
                                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[color:var(--primary-deep)] w-14">No</th>
                                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[color:var(--primary-deep)]">Jabatan</th>
                                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[color:var(--primary-deep)]">Nama</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-[color:var(--line)]">
                                    @forelse ($perangkatDesa as $i => $p)
                                    <tr class="hover:bg-[rgba(76,175,80,0.02)] transition duration-150">
                                        <td class="px-6 py-4 text-sm font-medium text-[color:var(--text)]">{{ $i + 1 }}</td>
                                        <td class="px-6 py-4 text-sm font-bold text-[color:var(--primary-deep)]">{{ $p['jabatan'] }}</td>
                                        <td class="px-6 py-4 text-sm text-[color:var(--text)] font-semibold">{{ $p['nama'] }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-10 text-center text-sm text-[color:var(--text-soft)]">Data perangkat desa belum tersedia.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>{{-- end tab-struktur --}}

            {{-- ─── TAB 4: PETA LOKASI ─── --}}
            <div id="tab-peta" role="tabpanel" x-show="tab === 'peta'" x-transition.opacity.duration.300ms x-cloak>

                <div class="infotab-panel">
                    <div class="infotab-panel-text">
                        <h2 class="infotab-panel-title">Peta Lokasi Desa Bade</h2>
                        <p class="infotab-panel-desc">Letak geografis, batas wilayah, tata guna lahan, dan sistem pengairan Desa Bade, Kecamatan Klego, Kabupaten Boyolali, Jawa Tengah.</p>
                    </div>
                    <div class="infotab-panel-art">
                        <div class="profil-tab-foto-wrap">
                            <img src="{{ $imageSrc }}{{ str_contains($imageSrc, '?') ? '&' : '?' }}v={{ $version }}" alt="Balai Desa Bade" class="profil-tab-foto-img">
                            <span class="profil-tab-foto-tag">Balai Desa Bade</span>
                        </div>
                    </div>
                </div>

                <div style="margin-bottom:2.5rem">
                    <div class="section-shell p-6 sm:p-8 lg:p-10">
                        <div class="section-heading reveal" style="margin-bottom:2rem">
                            <p class="eyebrow">Peta Wilayah</p>
                            <h2 class="section-title max-w-3xl" style="hyphens:none">{{ $villageMap['title'] }}</h2>
                            <p class="section-copy" style="hyphens:none">{{ $villageMap['subtitle'] }}</p>
                        </div>

                        <div class="grid gap-6 lg:grid-cols-[0.95fr_1.05fr]">

                            {{-- Info wilayah dengan sub-tab --}}
                            <div class="content-card reveal p-5 sm:p-6" x-data="{ mapTab: 'batas' }">
                                <div class="rounded-[1.75rem] border border-[color:var(--line)] bg-white p-5 shadow-[0_18px_40px_rgba(46,125,50,0.08)] sm:p-6">

                                    <div class="flex flex-wrap gap-2 mb-6 border-b border-[color:var(--line)] pb-4 select-none">
                                        <button @click="mapTab = 'batas'" :class="mapTab === 'batas' ? 'bg-[color:var(--primary)] text-white' : 'bg-[rgba(76,175,80,0.05)] text-[color:var(--text-soft)] hover:bg-[rgba(76,175,80,0.1)]'" class="px-4 py-2 rounded-full text-xs font-bold transition cursor-pointer">Batas Wilayah</button>
                                        <button @click="mapTab = 'lahan'" :class="mapTab === 'lahan' ? 'bg-[color:var(--primary)] text-white' : 'bg-[rgba(76,175,80,0.05)] text-[color:var(--text-soft)] hover:bg-[rgba(76,175,80,0.1)]'" class="px-4 py-2 rounded-full text-xs font-bold transition cursor-pointer">Tata Guna Lahan</button>
                                        <button @click="mapTab = 'kas'" :class="mapTab === 'kas' ? 'bg-[color:var(--primary)] text-white' : 'bg-[rgba(76,175,80,0.05)] text-[color:var(--text-soft)] hover:bg-[rgba(76,175,80,0.1)]'" class="px-4 py-2 rounded-full text-xs font-bold transition cursor-pointer">Kas Desa</button>
                                        <button @click="mapTab = 'pengairan'" :class="mapTab === 'pengairan' ? 'bg-[color:var(--primary)] text-white' : 'bg-[rgba(76,175,80,0.05)] text-[color:var(--text-soft)] hover:bg-[rgba(76,175,80,0.1)]'" class="px-4 py-2 rounded-full text-xs font-bold transition cursor-pointer">Pengairan</button>
                                    </div>

                                    <div x-show="mapTab === 'batas'" x-transition.opacity>
                                        <h3 class="text-xl font-bold text-[color:var(--primary-deep)] mb-4">Batas Desa</h3>
                                        <div class="grid gap-4 sm:grid-cols-2">
                                            @foreach ($villageMap['boundaries'] as $boundary)
                                                <div class="rounded-[1.25rem] border border-[color:var(--line)] bg-[rgba(248,250,245,0.9)] p-4">
                                                    <p class="text-xs font-bold text-[color:var(--primary-deep)] uppercase tracking-wider">{{ $boundary['direction'] }}</p>
                                                    <p class="mt-2 text-sm leading-6 text-[color:var(--text)] font-semibold">{{ $boundary['value'] }}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="mt-5 rounded-[1.25rem] border border-[color:var(--line)] bg-[rgba(248,250,245,0.72)]">
                                            <div class="flex items-center justify-between gap-4 border-b border-[color:var(--line)] px-4 py-4 sm:px-5">
                                                <p class="text-base font-bold text-[color:var(--primary-deep)]">Luas Desa</p>
                                                <p class="text-base text-[color:var(--text)] font-semibold">{{ $villageMap['area'] }}</p>
                                            </div>
                                            <div class="flex items-center justify-between gap-4 px-4 py-4 sm:px-5">
                                                <p class="text-base font-bold text-[color:var(--primary-deep)]">Jumlah Penduduk</p>
                                                <p class="text-base text-[color:var(--text)] font-semibold">{{ $villageMap['population'] }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div x-show="mapTab === 'lahan'" x-transition.opacity x-cloak>
                                        <h3 class="text-xl font-bold text-[color:var(--primary-deep)] mb-4">Tata Guna Lahan</h3>
                                        <div class="border border-[color:var(--line)] rounded-[1.25rem] overflow-hidden">
                                            <table class="w-full text-left border-collapse text-sm">
                                                <thead><tr class="bg-[rgba(248,250,245,0.9)] border-b border-[color:var(--line)]"><th class="px-4 py-3 font-bold text-[color:var(--primary-deep)]">Jenis Tata Guna</th><th class="px-4 py-3 font-bold text-[color:var(--primary-deep)] text-right">Luas</th></tr></thead>
                                                <tbody class="divide-y divide-[color:var(--line)]">
                                                    @foreach ($villageMap['landDetails'] as $land)
                                                        <tr class="{{ isset($land['highlight']) ? 'bg-[rgba(76,175,80,0.08)] font-bold' : '' }}">
                                                            <td class="px-4 py-3 text-[color:var(--text)]">{{ $land['label'] }}</td>
                                                            <td class="px-4 py-3 text-[color:var(--text-soft)] text-right font-mono">{{ $land['value'] }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div x-show="mapTab === 'kas'" x-transition.opacity x-cloak>
                                        <h3 class="text-xl font-bold text-[color:var(--primary-deep)] mb-4">Tanah Kas Desa</h3>
                                        <div class="border border-[color:var(--line)] rounded-[1.25rem] overflow-hidden">
                                            <table class="w-full text-left border-collapse text-sm">
                                                <thead><tr class="bg-[rgba(248,250,245,0.9)] border-b border-[color:var(--line)]"><th class="px-4 py-3 font-bold text-[color:var(--primary-deep)]">Jenis Lahan</th><th class="px-4 py-3 font-bold text-[color:var(--primary-deep)] text-right">Luas</th></tr></thead>
                                                <tbody class="divide-y divide-[color:var(--line)]">
                                                    @foreach ($villageMap['kasDesa'] as $kas)
                                                        <tr>
                                                            <td class="px-4 py-3 text-[color:var(--text)]">{{ $kas['label'] }}</td>
                                                            <td class="px-4 py-3 text-[color:var(--text-soft)] text-right font-mono">{{ $kas['value'] }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div x-show="mapTab === 'pengairan'" x-transition.opacity x-cloak>
                                        <h3 class="text-xl font-bold text-[color:var(--primary-deep)] mb-4">Sistem Pengairan</h3>
                                        <div class="border border-[color:var(--line)] rounded-[1.25rem] overflow-hidden">
                                            <table class="w-full text-left border-collapse text-sm">
                                                <thead><tr class="bg-[rgba(248,250,245,0.9)] border-b border-[color:var(--line)]"><th class="px-4 py-3 font-bold text-[color:var(--primary-deep)]">Sistem Irigasi</th><th class="px-4 py-3 font-bold text-[color:var(--primary-deep)] text-right">Luas Lahan</th></tr></thead>
                                                <tbody class="divide-y divide-[color:var(--line)]">
                                                    @foreach ($villageMap['pengairan'] as $air)
                                                        <tr>
                                                            <td class="px-4 py-3 text-[color:var(--text)]">{{ $air['label'] }}</td>
                                                            <td class="px-4 py-3 text-[color:var(--text-soft)] text-right font-mono">{{ $air['value'] }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            {{-- Embed Google Maps --}}
                            <div class="content-card reveal reveal-delay-1 overflow-hidden p-0">
                                <div class="overflow-hidden rounded-[1.75rem] border border-[color:var(--line)] bg-white shadow-[0_18px_40px_rgba(46,125,50,0.08)]">
                                    <iframe
                                        src="{{ $villageMap['embedUrl'] }}"
                                        class="block h-[420px] w-full md:h-[500px] lg:h-[560px]"
                                        loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"
                                        aria-label="{{ $villageMap['title'] }}"
                                    ></iframe>
                                    <div class="border-t border-[color:var(--line)] bg-white/95 p-4 sm:p-5">
                                        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                                            <div class="min-w-0">
                                                <p class="text-sm font-semibold text-[color:var(--primary-deep)]">{{ $villageMap['address'] }}</p>
                                                <p class="mt-1 text-sm leading-7 text-[color:var(--text-soft)]">Koordinat referensi {{ $villageMap['coordinates'] }}</p>
                                            </div>
                                            <a href="{{ $villageMap['mapLink'] }}" target="_blank" rel="noopener noreferrer"
                                                class="inline-flex items-center justify-center gap-2 rounded-full bg-[color:var(--primary)] px-5 py-2.5 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-[color:var(--primary-deep)] whitespace-nowrap shrink-0">
                                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/>
                                                </svg>
                                                Buka Google Maps
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>{{-- end tab-peta --}}

        </div>{{-- end x-data --}}
    </div>
</section>
@endsection
