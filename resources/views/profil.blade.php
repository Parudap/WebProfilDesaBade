@extends('layouts.app')

@section('content')
    <section id="profil" class="section-pad">
        <div class="container-shell">
            <div class="grid gap-8 lg:grid-cols-[0.95fr_1.05fr]">
                <div class="bg-white p-3 sm:p-4 rounded-[2rem] border border-[color:var(--line)] shadow-[0_16px_40px_rgba(46,125,50,0.05)] flex flex-col h-full">
                    <div class="profile-figure rounded-[1.5rem] overflow-hidden border border-[color:var(--line)] flex-1 h-full w-full">
                        @php
                            $imageSrc = $profileImage ?? asset('desa-bade-gateway.png');
                            $version = time();
                            if (!empty($profileImage)) {
                                $parsed = parse_url($profileImage, PHP_URL_PATH);
                                $clean = ltrim($parsed, '/');
                                if (str_starts_with($clean, 'storage/')) {
                                    $real = storage_path('app/public/' . substr($clean, 8));
                                    if (file_exists($real)) {
                                        $version = filemtime($real);
                                    }
                                }
                            } else {
                                $real = public_path('desa-bade-gateway.png');
                                if (file_exists($real)) {
                                    $version = filemtime($real);
                                }
                            }
                        @endphp
                        <img src="{{ $imageSrc }}{{ str_contains($imageSrc, '?') ? '&' : '?' }}v={{ $version }}" alt="Gerbang Desa Bade" class="w-full h-full object-cover min-h-[400px]">
                    </div>
                </div>

                <div class="space-y-6">
                    <p class="eyebrow">Profil Desa</p>
                    <h2 class="infotab-panel-title" style="hyphens:none;">Membangun citra desa yang ramah, informatif, dan berwibawa.</h2>
                    <p class="infotab-panel-desc" style="hyphens:none;">Desa Bade, Kecamatan Klego, Kabupaten Boyolali, portal resmi yang menyajikan informasi layanan, potensi, dan berita desa untuk masyarakat dan pengunjung.</p>

                    <div class="profile-card">
                        <h3 class="text-2xl font-semibold">Visi</h3>
                        <p class="mt-4 text-[color:var(--text-soft)]" style="hyphens:none;">
                            @if(!empty($profil->visi))
                                {{ $profil->visi }}
                            @else
                                Terwujudnya Desa Bade sebagai desa mandiri, untuk mencapai masyarakat dengan kehidupan yang lebih layak, harmonis, sehat, cerdas dan lebih sejahtera.
                            @endif
                        </p>
                    </div>

                    <div class="profile-card">
                        <h3 class="text-2xl font-semibold">Misi</h3>
                        @php
                            $misiList = [];
                            if (!empty($profil->misi)) {
                                $raw = $profil->misi;

                                // 1) Coba parse sebagai JSON array (format baru dari admin)
                                $decoded = json_decode($raw, true);
                                if (is_array($decoded)) {
                                    $misiList = array_values(array_filter($decoded, fn($m) => trim(strip_tags($m)) !== ''));
                                }
                                // 2) Coba ekstrak dari HTML <li>...</li> (format lama)
                                elseif (preg_match('/<li/i', $raw)) {
                                    preg_match_all('/<li[^>]*>(.*?)<\/li>/si', $raw, $matches);
                                    if (!empty($matches[1])) {
                                        $misiList = array_values(array_filter(
                                            array_map(fn($m) => trim(strip_tags($m)), $matches[1]),
                                            fn($m) => $m !== ''
                                        ));
                                    }
                                }
                                // 3) Fallback: split by newline
                                else {
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
                        <ol class="mt-4 list-decimal space-y-2 text-[color:var(--text-soft)]" style="hyphens:none;">
                            @forelse($misiList as $poin)
                                <li style="hyphens:none;">{{ $poin }}</li>
                            @empty
                                @foreach($defaultMisi as $poin)
                                    <li style="hyphens:none;">{{ $poin }}</li>
                                @endforeach
                            @endforelse
                        </ol>
                    </div>
                </div>
            </div>

            <div class="mt-8 lg:mt-12">
                <div class="section-shell p-6 sm:p-8 lg:p-10">
                    <div class="section-heading reveal">
                        <p class="eyebrow">Sejarah Desa</p>
                        <h2 class="section-title max-w-3xl" style="hyphens:none;">{{ $villageHistory['title'] }}</h2>
                        <p class="section-copy" style="hyphens:none;">{{ $villageHistory['subtitle'] }}</p>
                    </div>

                    <div class="mt-8">
                        <div class="content-card reveal p-6 sm:p-8 lg:p-10">
                            <p class="text-base leading-9 text-[color:var(--text-soft)] lg:text-lg" style="hyphens:none; word-break:normal;">
                                {!! nl2br(e($villageHistory['paragraph'])) !!}
                            </p>
                        </div>
            </div>

            <div class="mt-8 lg:mt-12">
                <div class="section-shell p-6 sm:p-8 lg:p-10" x-data="{ activeTab: 'perangkat' }">
                    <div class="section-heading reveal">
                        <p class="eyebrow">Pemerintahan Desa</p>
                        <h2 class="section-title max-w-3xl" style="hyphens:none; margin-bottom: 0.5rem;">Struktur Organisasi Desa Bade</h2>
                        <p class="section-copy" style="hyphens:none;">Susunan aparatur pemerintah desa dan jajaran BPD Desa Bade yang berdedikasi memberikan pelayanan publik secara profesional, adil, dan transparan.</p>

                        <!-- Tab switcher -->
                        <div class="mt-6 flex items-center gap-1 p-1.5 rounded-2xl bg-[color:var(--line)] border border-[color:var(--line)] select-none w-fit">
                            <button 
                                @click="activeTab = 'perangkat'" 
                                :class="activeTab === 'perangkat' ? 'bg-[color:var(--primary)] text-white shadow-md scale-[1.02]' : 'text-[color:var(--text-soft)] hover:text-[color:var(--text)] hover:bg-white/60'"
                                class="px-6 py-2.5 rounded-xl text-sm font-semibold transition-all duration-250 cursor-pointer"
                            >
                                Perangkat Desa
                            </button>
                            <button 
                                @click="activeTab = 'bpd'" 
                                :class="activeTab === 'bpd' ? 'bg-[color:var(--primary)] text-white shadow-md scale-[1.02]' : 'text-[color:var(--text-soft)] hover:text-[color:var(--text)] hover:bg-white/60'"
                                class="px-6 py-2.5 rounded-xl text-sm font-semibold transition-all duration-250 cursor-pointer"
                            >
                                BPD
                            </button>
                        </div>
                    </div>

                    <!-- Perangkat Desa Tab Panel -->
                    <div x-show="activeTab === 'perangkat'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="mt-8">
                        <div class="overflow-x-auto rounded-2xl border border-[color:var(--line)] bg-white shadow-[0_12px_40px_rgba(46,125,50,0.04)]">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="bg-[rgba(248,250,245,0.9)] border-b border-[color:var(--line)]">
                                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[color:var(--primary-deep)] w-16">No</th>
                                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[color:var(--primary-deep)]">Jabatan</th>
                                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[color:var(--primary-deep)]">Nama</th>
                                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[color:var(--primary-deep)]">Pendidikan</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-[color:var(--line)]">
                                    @forelse ($perangkatDesa as $i => $p)
                                    <tr class="hover:bg-[rgba(76,175,80,0.02)] transition duration-150">
                                        <td class="px-6 py-4 text-sm font-medium text-[color:var(--text)]">{{ $i + 1 }}</td>
                                        <td class="px-6 py-4 text-sm font-bold text-[color:var(--primary-deep)]">{{ $p['jabatan'] }}</td>
                                        <td class="px-6 py-4 text-sm text-[color:var(--text)] font-semibold">{{ $p['nama'] }}</td>
                                        <td class="px-6 py-4 text-sm text-[color:var(--text-soft)]">{{ $p['pendidikan'] }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-8 text-center text-sm text-[color:var(--text-soft)]">Data perangkat desa belum tersedia.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- BPD Tab Panel -->
                    <div x-show="activeTab === 'bpd'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="mt-8" x-cloak>
                        <div class="overflow-x-auto rounded-2xl border border-[color:var(--line)] bg-white shadow-[0_12px_40px_rgba(46,125,50,0.04)]">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="bg-[rgba(248,250,245,0.9)] border-b border-[color:var(--line)]">
                                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[color:var(--primary-deep)] w-16">No</th>
                                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[color:var(--primary-deep)]">Jabatan</th>
                                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[color:var(--primary-deep)]">Nama</th>
                                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[color:var(--primary-deep)]">Pendidikan</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-[color:var(--line)]">
                                    @forelse ($bpdData as $i => $b)
                                    <tr class="hover:bg-[rgba(76,175,80,0.02)] transition duration-150">
                                        <td class="px-6 py-4 text-sm font-medium text-[color:var(--text)]">{{ $i + 1 }}</td>
                                        <td class="px-6 py-4 text-sm font-bold text-[color:var(--primary-deep)]">{{ $b['jabatan'] }}</td>
                                        <td class="px-6 py-4 text-sm text-[color:var(--text)] font-semibold">{{ $b['nama'] }}</td>
                                        <td class="px-6 py-4 text-sm text-[color:var(--text-soft)]">{{ $b['pendidikan'] }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-8 text-center text-sm text-[color:var(--text-soft)]">Data BPD belum tersedia.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8 lg:mt-12">
                <div class="section-shell p-6 sm:p-8 lg:p-10">
                    <div class="section-heading reveal">
                        <p class="eyebrow">Peta Wilayah</p>
                        <h2 class="section-title max-w-3xl" style="hyphens:none;">{{ $villageMap['title'] }}</h2>
                        <p class="section-copy" style="hyphens:none;">{{ $villageMap['subtitle'] }}</p>
                    </div>

                    <div class="mt-8 grid gap-6 lg:grid-cols-[0.95fr_1.05fr]">
                        <div class="content-card reveal p-5 sm:p-6" x-data="{ mapTab: 'batas' }">
                            <div class="rounded-[1.75rem] border border-[color:var(--line)] bg-white p-5 shadow-[0_18px_40px_rgba(46,125,50,0.08)] sm:p-6">
                                <!-- Sub tabs -->
                                <div class="flex flex-wrap gap-2 mb-6 border-b border-[color:var(--line)] pb-4 select-none">
                                    <button 
                                        @click="mapTab = 'batas'" 
                                        :class="mapTab === 'batas' ? 'bg-[color:var(--primary)] text-white' : 'bg-[rgba(76,175,80,0.05)] text-[color:var(--text-soft)] hover:bg-[rgba(76,175,80,0.1)]'"
                                        class="px-4 py-2 rounded-full text-xs font-bold transition cursor-pointer"
                                    >
                                        Batas Wilayah
                                    </button>
                                    <button 
                                        @click="mapTab = 'lahan'" 
                                        :class="mapTab === 'lahan' ? 'bg-[color:var(--primary)] text-white' : 'bg-[rgba(76,175,80,0.05)] text-[color:var(--text-soft)] hover:bg-[rgba(76,175,80,0.1)]'"
                                        class="px-4 py-2 rounded-full text-xs font-bold transition cursor-pointer"
                                    >
                                        Tata Guna Lahan
                                    </button>
                                    <button 
                                        @click="mapTab = 'kas'" 
                                        :class="mapTab === 'kas' ? 'bg-[color:var(--primary)] text-white' : 'bg-[rgba(76,175,80,0.05)] text-[color:var(--text-soft)] hover:bg-[rgba(76,175,80,0.1)]'"
                                        class="px-4 py-2 rounded-full text-xs font-bold transition cursor-pointer"
                                    >
                                        Kas Desa
                                    </button>
                                    <button 
                                        @click="mapTab = 'pengairan'" 
                                        :class="mapTab === 'pengairan' ? 'bg-[color:var(--primary)] text-white' : 'bg-[rgba(76,175,80,0.05)] text-[color:var(--text-soft)] hover:bg-[rgba(76,175,80,0.1)]'"
                                        class="px-4 py-2 rounded-full text-xs font-bold transition cursor-pointer"
                                    >
                                        Pengairan
                                    </button>
                                </div>

                                <!-- Tab 1: Batas Wilayah -->
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

                                    <div class="mt-5 space-y-0 rounded-[1.25rem] border border-[color:var(--line)] bg-[rgba(248,250,245,0.72)]">
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

                                <!-- Tab 2: Tata Guna Lahan -->
                                <div x-show="mapTab === 'lahan'" x-transition.opacity x-cloak>
                                    <h3 class="text-xl font-bold text-[color:var(--primary-deep)] mb-4">Tata Guna Lahan</h3>
                                    <div class="border border-[color:var(--line)] rounded-[1.25rem] overflow-hidden">
                                        <table class="w-full text-left border-collapse text-sm">
                                            <thead>
                                                <tr class="bg-[rgba(248,250,245,0.9)] border-b border-[color:var(--line)]">
                                                    <th class="px-4 py-3 font-bold text-[color:var(--primary-deep)]">Jenis Tata Guna</th>
                                                    <th class="px-4 py-3 font-bold text-[color:var(--primary-deep)] text-right">Luas</th>
                                                </tr>
                                            </thead>
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

                                <!-- Tab 3: Kas Desa -->
                                <div x-show="mapTab === 'kas'" x-transition.opacity x-cloak>
                                    <h3 class="text-xl font-bold text-[color:var(--primary-deep)] mb-4">Tanah Kas Desa</h3>
                                    <div class="border border-[color:var(--line)] rounded-[1.25rem] overflow-hidden">
                                        <table class="w-full text-left border-collapse text-sm">
                                            <thead>
                                                <tr class="bg-[rgba(248,250,245,0.9)] border-b border-[color:var(--line)]">
                                                    <th class="px-4 py-3 font-bold text-[color:var(--primary-deep)]">Jenis Lahan</th>
                                                    <th class="px-4 py-3 font-bold text-[color:var(--primary-deep)] text-right">Luas</th>
                                                </tr>
                                            </thead>
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

                                <!-- Tab 4: Pengairan -->
                                <div x-show="mapTab === 'pengairan'" x-transition.opacity x-cloak>
                                    <h3 class="text-xl font-bold text-[color:var(--primary-deep)] mb-4">Sistem Pengairan</h3>
                                    <div class="border border-[color:var(--line)] rounded-[1.25rem] overflow-hidden">
                                        <table class="w-full text-left border-collapse text-sm">
                                            <thead>
                                                <tr class="bg-[rgba(248,250,245,0.9)] border-b border-[color:var(--line)]">
                                                    <th class="px-4 py-3 font-bold text-[color:var(--primary-deep)]">Sistem Irigasi</th>
                                                    <th class="px-4 py-3 font-bold text-[color:var(--primary-deep)] text-right">Luas Lahan</th>
                                                </tr>
                                            </thead>
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
                                        <a
                                            href="{{ $villageMap['mapLink'] }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            class="inline-flex items-center justify-center gap-2 rounded-full bg-[color:var(--primary)] px-5 py-2.5 text-sm font-semibold text-white transition hover:-translate-y-0.5 hover:bg-[color:var(--primary-deep)] whitespace-nowrap shrink-0"
                                        >
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                                                <circle cx="12" cy="10" r="3" />
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
        </div>
    </section>
@endsection
