<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\ProdukBelanja;
use App\Models\PengaturanWebsite;
use App\Models\ProfilDesa;
use App\Models\StatistikPenduduk;
use App\Models\Dusun;
use App\Models\PerangkatDesa;
use App\Models\Apbdes;
use App\Models\Stunting;
use App\Models\Bansos;
use App\Models\Idm;
use App\Models\Sdgs;
use Illuminate\Support\Str;

class BerandaController extends Controller
{
    protected function getImageUrl($path, $default = null)
    {
        if (empty($path)) {
            if ($default) {
                $cleanDefault = ltrim(parse_url($default, PHP_URL_PATH), '/');
                if (file_exists(public_path($cleanDefault))) {
                    return $default . '?v=' . filemtime(public_path($cleanDefault));
                }
            }
            return $default;
        }
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }
        if (file_exists(public_path($path))) {
            return asset($path) . '?v=' . filemtime(public_path($path));
        }
        
        $storagePath = 'storage/' . $path;
        if (file_exists(public_path($storagePath))) {
            return asset($storagePath) . '?v=' . filemtime(public_path($storagePath));
        }
        
        return asset('storage/' . $path);
    }

    protected function makeData()
    {
        $profil = ProfilDesa::getOrCreate();
        
        $brandLogo = $this->getImageUrl(
            PengaturanWebsite::get('logo_desa'),
            asset('logo_desa_bade_utuh.png')
        );

        $heroImages = [];
        for ($i = 1; $i <= 5; $i++) {
            $path = PengaturanWebsite::get("hero_image_{$i}");
            if (!empty($path) && $path !== 'none') {
                $heroImages[] = $this->getImageUrl($path);
            }
        }

        if (empty($heroImages)) {
            $hero1 = PengaturanWebsite::get('hero_image_1');
            $hero2 = PengaturanWebsite::get('hero_image_2');
            
            if ($hero1 !== 'none') {
                $heroImages[] = $this->getImageUrl(
                    PengaturanWebsite::get('hero_image_utama'),
                    asset('hero-foto-utama.jpg')
                );
            }
            if ($hero2 !== 'none') {
                $heroImages[] = $this->getImageUrl(
                    PengaturanWebsite::get('hero_image_kedua'),
                    asset('hero-foto-perahu.png')
                );
            }
        }

        $heroImageUtama = !empty($heroImages) ? $heroImages[0] : asset('hero-foto-utama.jpg');

        $profileImage = $this->getImageUrl(
            PengaturanWebsite::get('foto_kantor_desa'),
            asset('desa-bade-gateway.png')
        );

        $subheadline = PengaturanWebsite::get('nama_kecamatan') && PengaturanWebsite::get('nama_kabupaten')
            ? 'Kecamatan ' . PengaturanWebsite::get('nama_kecamatan') . ', Kabupaten ' . PengaturanWebsite::get('nama_kabupaten')
            : 'Kecamatan Klego, Kabupaten Boyolali';

        // Demographics from Statistik if exists
        $totalLaki = StatistikPenduduk::where('kategori', 'usia')->sum('value_laki');
        $totalPerempuan = StatistikPenduduk::where('kategori', 'usia')->sum('value_perempuan');
        
        if ($totalLaki > 0 || $totalPerempuan > 0) {
            $demographics = [
                'total' => number_format($totalLaki + $totalPerempuan, 0, ',', '.') . ' Jiwa',
                'kk' => $profil->jumlah_kk ?: '1.602 KK',
                'perempuan' => number_format($totalPerempuan, 0, ',', '.') . ' Jiwa',
                'laki_laki' => number_format($totalLaki, 0, ',', '.') . ' Jiwa',
            ];
        } else {
            $demographics = [
                'total' => $profil->jumlah_penduduk ?: '4.782 Jiwa',
                'kk' => $profil->jumlah_kk ?: '1.602 KK',
                'perempuan' => '2.325 Jiwa',
                'laki_laki' => '2.457 Jiwa',
            ];
        }

        $stats = [
            ['label' => 'Total Penduduk', 'value' => (int) str_replace([' Jiwa', '.'], '', $demographics['total']), 'suffix' => ' Jiwa'],
            ['label' => 'Kepala Keluarga', 'value' => (int) str_replace([' KK', '.'], '', $demographics['kk']), 'suffix' => ' KK'],
        ];

        // Age groups
        $ageGroupsDb = StatistikPenduduk::getByKategori('usia');
        $ageGroups = [];
        if ($ageGroupsDb->isNotEmpty()) {
            foreach ($ageGroupsDb as $item) {
                $ageGroups[] = [
                    'label' => $item->label,
                    'male' => $item->value_laki,
                    'female' => $item->value_perempuan,
                ];
            }
        } else {
            $ageGroups = [
                ['label' => '60+',   'male' => 221, 'female' => 270],
                ['label' => '55-59', 'male' => 138, 'female' => 133],
                ['label' => '50-54', 'male' => 150, 'female' => 138],
                ['label' => '45-49', 'male' => 149, 'female' => 132],
                ['label' => '40-44', 'male' => 206, 'female' => 172],
                ['label' => '35-39', 'male' => 175, 'female' => 193],
                ['label' => '30-34', 'male' => 186, 'female' => 156],
                ['label' => '25-29', 'male' => 188, 'female' => 200],
                ['label' => '20-24', 'male' => 189, 'female' => 180],
                ['label' => '15-19', 'male' => 204, 'female' => 185],
                ['label' => '10-14', 'male' => 200, 'female' => 164],
                ['label' => '5-9',   'male' => 209, 'female' => 160],
                ['label' => '0-4',   'male' => 116, 'female' => 136],
            ];
        }

        // Dusun
        $dusunDb = Dusun::orderBy('urutan')->get();
        $dusunData = [];
        if ($dusunDb->isNotEmpty()) {
            foreach ($dusunDb as $item) {
                $dusunData[Str::slug($item->nama, '_')] = [
                    'jiwa' => $item->jiwa,
                    'kk' => $item->kk,
                    'laki' => $item->laki,
                    'perempuan' => $item->perempuan,
                    'percentage' => $item->percentage ?: number_format(($item->jiwa / max(1, (int) str_replace([' Jiwa', '.'], '', $demographics['total']))) * 100, 2) . '%',
                ];
            }
        } else {
            $dusunData = [
                'wates_barat'  => ['jiwa' => 949,   'kk' => 316, 'laki' => 492, 'perempuan' => 457, 'percentage' => '19.85%'],
                'wates_timur'  => ['jiwa' => 1178,  'kk' => 383, 'laki' => 636, 'perempuan' => 542, 'percentage' => '24.63%'],
                'pelang'       => ['jiwa' => 1917,  'kk' => 641, 'laki' => 962, 'perempuan' => 955, 'percentage' => '40.09%'],
                'bade'         => ['jiwa' => 738,   'kk' => 262, 'laki' => 367, 'perempuan' => 371, 'percentage' => '15.43%'],
            ];
        }

        // Education
        $eduDb = StatistikPenduduk::getByKategori('pendidikan');
        $educationData = [];
        if ($eduDb->isNotEmpty()) {
            foreach ($eduDb as $item) {
                $educationData[] = [
                    'label' => $item->label,
                    'value' => $item->value_laki + $item->value_perempuan,
                ];
            }
        } else {
            $educationData = [
                ['label' => 'Tidak/Belum Sekolah', 'value' => 176],
                ['label' => 'Belum Tamat SD/Sederajat', 'value' => 204],
                ['label' => 'Tamat SD/Sederajat', 'value' => 288],
                ['label' => 'SLTP/Sederajat', 'value' => 140],
                ['label' => 'SLTA/Sederajat', 'value' => 285],
                ['label' => 'Diploma I/II', 'value' => 21],
                ['label' => 'Diploma III/Sarjana Muda', 'value' => 14],
                ['label' => 'Diploma IV/Strata I', 'value' => 25],
                ['label' => 'Strata II', 'value' => 2],
                ['label' => 'Strata III', 'value' => 0],
            ];
        }

        // Occupation
        $occDb = StatistikPenduduk::getByKategori('pekerjaan');
        $occupationData = [];
        if ($occDb->isNotEmpty()) {
            foreach ($occDb as $item) {
                $occupationData[] = [
                    'label' => $item->label,
                    'value' => $item->value_laki + $item->value_perempuan,
                ];
            }
        } else {
            $occupationData = [
                ['label' => 'Pelajar/Mahasiswa', 'value' => 325],
                ['label' => 'Belum/Tidak Bekerja', 'value' => 273],
                ['label' => 'Mengurus Rumah Tangga', 'value' => 271],
                ['label' => 'Karyawan Swasta', 'value' => 116],
                ['label' => 'Nelayan/Perikanan', 'value' => 49],
                ['label' => 'Petani/Pekebun', 'value' => 39],
                ['label' => 'Wiraswasta', 'value' => 27],
            ];
        }

        // Marital
        $marDb = StatistikPenduduk::getByKategori('perkawinan');
        $maritalData = [];
        if ($marDb->isNotEmpty()) {
            foreach ($marDb as $item) {
                $maritalData[] = [
                    'label' => $item->label,
                    'value' => $item->value_laki + $item->value_perempuan,
                    'icon' => Str::slug($item->label, '_'),
                ];
            }
        } else {
            $maritalData = [
                ['label' => 'Belum Kawin', 'value' => 620, 'icon' => 'belum_kawin'],
                ['label' => 'Kawin', 'value' => 457, 'icon' => 'kawin'],
                ['label' => 'Cerai Mati', 'value' => 68, 'icon' => 'cerai_mati'],
                ['label' => 'Kawin Tercatat', 'value' => 5, 'icon' => 'kawin_tercatat'],
                ['label' => 'Cerai Hidup', 'value' => 4, 'icon' => 'cerai_hidup'],
                ['label' => 'Kawin Tidak Tercatat', 'value' => 0, 'icon' => 'kawin_tidak_tercatat'],
            ];
        }

        // Religion
        $relDb = StatistikPenduduk::getByKategori('agama');
        $religionData = [];
        if ($relDb->isNotEmpty()) {
            foreach ($relDb as $item) {
                $religionData[] = [
                    'label' => $item->label,
                    'value' => number_format($item->value_laki + $item->value_perempuan, 0, ',', '.'),
                    'icon' => Str::slug($item->label, '_'),
                ];
            }
        } else {
            $religionData = [
                ['label' => 'Islam', 'value' => '1.155', 'icon' => 'islam'],
                ['label' => 'Kristen', 'value' => 0, 'icon' => 'kristen'],
                ['label' => 'Katolik', 'value' => 0, 'icon' => 'katolik'],
                ['label' => 'Hindu', 'value' => 0, 'icon' => 'hindu'],
                ['label' => 'Buddha', 'value' => 0, 'icon' => 'buddha'],
                ['label' => 'Konghucu', 'value' => 0, 'icon' => 'konghucu'],
                ['label' => 'Kepercayaan lainnya', 'value' => 0, 'icon' => 'kepercayaan_lainnya'],
            ];
        }

        // Voters
        $votDb = StatistikPenduduk::getByKategori('pemilih');
        $votersData = [];
        if ($votDb->isNotEmpty()) {
            foreach ($votDb as $item) {
                $votersData[] = [
                    'label' => $item->label,
                    'value' => $item->value_laki + $item->value_perempuan,
                ];
            }
        } else {
            $votersData = [
                ['label' => '2024', 'value' => 804],
                ['label' => '2025', 'value' => 828],
                ['label' => '2026', 'value' => 854],
            ];
        }

        // Perangkat Desa
        $perangkatDb = PerangkatDesa::where('tipe', 'perangkat')->orderBy('urutan')->get();
        if ($perangkatDb->isNotEmpty()) {
            $perangkatDesa = $perangkatDb->map(function ($item) {
                return [
                    'jabatan'    => $item->jabatan,
                    'nama'       => $item->nama,
                    'pendidikan' => $item->pendidikan ?: '-',
                    'foto'       => $this->getImageUrl($item->foto, null),
                ];
            })->toArray();
        } else {
            $perangkatDesa = [
                ['jabatan' => 'Kepala Desa',              'nama' => 'Haryono',             'pendidikan' => 'SMA'],
                ['jabatan' => 'Sekretaris Desa',          'nama' => 'Rifandaru Cahya Widhana', 'pendidikan' => 'S1'],
                ['jabatan' => 'Kaur Keuangan',            'nama' => 'Prita Rahayu',        'pendidikan' => 'D3'],
                ['jabatan' => 'Kaur Umum dan Perencanaan','nama' => 'Lilis Maesaroh',      'pendidikan' => 'SMK'],
                ['jabatan' => 'Kasi Pemerintahan',        'nama' => 'Noviyana',            'pendidikan' => 'S1'],
                ['jabatan' => 'Kasi Kesra dan Pelayanan', 'nama' => 'Maryono',             'pendidikan' => 'SLTA'],
                ['jabatan' => 'Kadus I',                  'nama' => 'Subadi',              'pendidikan' => 'SLTA'],
                ['jabatan' => 'Kadus II',                 'nama' => 'Haryanto',            'pendidikan' => 'SLTA'],
                ['jabatan' => 'Kadus III',                'nama' => 'Bejo',                'pendidikan' => 'SLTA'],
                ['jabatan' => 'Kadus IV',                 'nama' => 'Slamet Riyadi',       'pendidikan' => 'SLTA'],
            ];
        }

        // BPD
        $bpdDb = PerangkatDesa::where('tipe', 'bpd')->orderBy('urutan')->get();
        if ($bpdDb->isNotEmpty()) {
            $bpdData = $bpdDb->map(function ($item) {
                return [
                    'jabatan'    => $item->jabatan,
                    'nama'       => $item->nama,
                    'pendidikan' => $item->pendidikan ?: '-',
                    'foto'       => $this->getImageUrl($item->foto, null),
                ];
            })->toArray();
        } else {
            $bpdData = [
                ['jabatan' => 'Ketua',       'nama' => 'Sutardi',          'pendidikan' => 'SLTA'],
                ['jabatan' => 'Wakil Ketua', 'nama' => 'Sunardi',          'pendidikan' => 'S1'],
                ['jabatan' => 'Sekretaris',  'nama' => 'Setiyaningsih',    'pendidikan' => 'SLTA'],
                ['jabatan' => 'Anggota',     'nama' => 'Safrina Megasari', 'pendidikan' => 'SLTA'],
                ['jabatan' => 'Anggota',     'nama' => 'Dalimin',          'pendidikan' => 'SD'],
                ['jabatan' => 'Anggota',     'nama' => 'Hadi Muntaha',     'pendidikan' => 'SLTP'],
                ['jabatan' => 'Anggota',     'nama' => 'Mulyono',          'pendidikan' => 'SLTA'],
                ['jabatan' => 'Anggota',     'nama' => 'Hendy Setyawan',   'pendidikan' => 'SLTA'],
                ['jabatan' => 'Anggota',     'nama' => 'Sari Setyaningrum','pendidikan' => 'SLTP'],
            ];
        }

        // News (Berita)
        $newsDb = Berita::published()->get();
        $news = [];
        if ($newsDb->isNotEmpty()) {
            foreach ($newsDb as $item) {
                $imagesList = [];
                if (!empty($item->images) && is_array($item->images)) {
                    foreach ($item->images as $img) {
                        $imagesList[] = $this->getImageUrl($img);
                    }
                }
                if (empty($imagesList) && !empty($item->image)) {
                    $imagesList[] = $this->getImageUrl($item->image);
                }
                if (empty($imagesList)) {
                    $imagesList[] = 'https://placehold.co/600x400/e2e8f0/64748b?text=Berita';
                }

                $news[] = [
                    'title' => $item->title,
                    'slug' => $item->slug,
                    'summary' => $item->summary ?: Str::limit(strip_tags($item->content), 200),
                    'image' => $imagesList[0],
                    'images' => $imagesList,
                    'date' => $item->formatted_date,
                    'date_day' => $item->formatted_day,
                    'date_year' => $item->formatted_year,
                    'time' => $item->formatted_time,
                    'author' => $item->author,
                    'views' => $item->views,
                    'content' => $item->content,
                ];
            }
        } else {
            $news = [];
        }

        // Shops (UMKM)
        $shopsDb = ProdukBelanja::active()->get();
        $shops = [];
        if ($shopsDb->isNotEmpty()) {
            foreach ($shopsDb as $item) {
                $imagesList = [];
                if (!empty($item->images) && is_array($item->images)) {
                    foreach ($item->images as $img) {
                        $imagesList[] = $this->getImageUrl($img);
                    }
                }
                if (empty($imagesList) && !empty($item->image)) {
                    $imagesList[] = $this->getImageUrl($item->image);
                }
                if (empty($imagesList)) {
                    $imagesList[] = 'https://placehold.co/600x600/e2e8f0/64748b?text=Produk';
                }

                $shops[] = [
                    'name' => $item->name,
                    'slug' => $item->slug,
                    'category' => $item->category,
                    'price' => $item->price,
                    'whatsapp' => $item->whatsapp,
                    'wa_link' => $item->wa_link,
                    'image' => $imagesList[0],
                    'images' => $imagesList,
                    'description' => $item->description,
                    'rating' => $item->rating,
                    'rating_count' => $item->rating_count,
                ];
            }
        } else {
            $shops = [];
        }

        // APBDes (Dokumen PDF)
        $apbdesList = Apbdes::active()->get();

        return [
            'profil'  => $profil,
            'navItems' => [
                ['label' => 'Home',        'href' => url('/'),            'route' => 'home'],
                ['label' => 'Profil Desa', 'href' => url('/profil'),      'route' => 'profil'],
                ['label' => 'Infografis',  'href' => url('/infografis'),  'route' => 'infografis'],
                ['label' => 'Berita',      'href' => url('/berita'),      'route' => 'berita*'],
                ['label' => 'Belanja',     'href' => url('/belanja'),     'route' => 'belanja'],
            ],
            'brandLogo' => $brandLogo,
            'heroImage' => $heroImageUtama,
            'heroImages' => $heroImages,
            'profileImage' => $profileImage,
            'headline' => PengaturanWebsite::get('headline', ''),
            'subheadline' => $subheadline,
            'heroTitleTop' => PengaturanWebsite::get('hero_title_top', 'Website Resmi'),
            'heroTitleBottom' => PengaturanWebsite::get('hero_title_bottom', 'Desa Bade'),
            'heroCopy' => PengaturanWebsite::get('hero_copy', ''),
            'stats' => $stats,
            'listings' => [
                ['title' => 'Layanan Administrasi', 'description' => 'Pelayanan administrasi kependudukan dan surat menyurat.'],
                ['title' => 'Wisata Desa', 'description' => 'Spot pariwisata dan budaya lokal.'],
            ],
            'infographics' => [
                ['label' => 'RT/ RW', 'value' => '12 RT', 'description' => 'Jumlah lingkungan administrasi.'],
                ['label' => 'Sekolah', 'value' => '3 SD', 'description' => 'Lembaga pendidikan tingkat dasar.'],
            ],
            'demographics' => $demographics,
            'ageGroups' => $ageGroups,
            'dusunData' => $dusunData,
            'educationData' => $educationData,
            'occupationData' => $occupationData,
            'maritalData' => $maritalData,
            'religionData' => $religionData,
            'votersData' => $votersData,
            // SDGs Data
            'sdgsData' => (function() {
                Sdgs::seedDefaultsIfEmpty();
                $sdgsDb = Sdgs::orderBy('goal_nomor')->get();
                $sdgsData = [];
                foreach (Sdgs::$masterGoals as $num => $master) {
                    $dbRecord = $sdgsDb->firstWhere('goal_nomor', $num);
                    $val = $dbRecord ? (float) $dbRecord->capaian : $master['capaian'];
                    $sdgsData[] = [
                        'label' => $master['nama'],
                        'value' => $val,
                        'goal'  => $num,
                        'image' => $master['image'],
                        'color' => $master['color'],
                    ];
                }
                return $sdgsData;
            })(),
            'sdgsScore' => (function() {
                $sdgsDb = Sdgs::all();
                return $sdgsDb->count() > 0 ? round($sdgsDb->avg('capaian'), 2) : 61.09;
            })(),
            'villageMap' => [
                'title' => 'Peta Lokasi Desa Bade',
                'subtitle' => 'Gambaran geografis, batas wilayah administratif, serta pembagian tata guna lahan Desa Bade di Kecamatan Klego, Kabupaten Boyolali.',
                'boundaries' => [
                    ['direction' => 'Utara', 'value' => $profil->batas_utara ?: 'Desa Karanggatak'],
                    ['direction' => 'Timur', 'value' => $profil->batas_timur ?: 'Desa Bade'],
                    ['direction' => 'Selatan', 'value' => $profil->batas_selatan ?: 'Desa Blumbang'],
                    ['direction' => 'Barat', 'value' => $profil->batas_barat ?: 'Desa Klego'],
                ],
                'area' => $profil->luas_wilayah ?: '320,4960 Ha',
                'population' => $demographics['total'],
                'address' => PengaturanWebsite::get('alamat', 'Desa Bade, Kecamatan Klego, Kabupaten Boyolali, Jawa Tengah'),
                'coordinates' => $profil->koordinat ?: '7°21′40″S, 110°42′2″E',
                'embedUrl' => $profil->embed_map_url ?: 'https://www.google.com/maps?q=-7.361111,110.700556&z=15&output=embed',
                'mapLink' => $profil->map_link ?: 'https://www.google.com/maps?q=-7.361111,110.700556',
                'landDetails' => $profil->land_details ?: [
                    ['label' => 'Tanah Sawah', 'value' => '154,5970 Ha'],
                    ['label' => 'Tanah Tegal', 'value' => '37,7785 Ha'],
                    ['label' => 'Tanah Pekarangan', 'value' => '89,3675 Ha'],
                    ['label' => 'Pekuburan', 'value' => '- Ha'],
                    ['label' => 'Jalan', 'value' => '- Ha'],
                    ['label' => 'Lain-lain', 'value' => '- Ha'],
                    ['label' => 'Total Terperinci', 'value' => '281,7430 Ha', 'highlight' => true],
                ],
                'kasDesa' => $profil->kas_desa ?: [
                    ['label' => 'Tanah Sawah', 'value' => '- Ha'],
                    ['label' => 'Tanah Tegal', 'value' => '- Ha'],
                    ['label' => 'Tanah Pekarangan', 'value' => '- Ha'],
                    ['label' => 'Bekas Sawah / Lungguh', 'value' => '18,7063 Ha'],
                    ['label' => 'Bekas SPL', 'value' => '- Ha'],
                ],
                'pengairan' => $profil->pengairan ?: [
                    ['label' => 'Irigasi Teknis', 'value' => '21 Ha'],
                    ['label' => 'Irigasi Setengah Teknis', 'value' => '12 Ha'],
                    ['label' => 'Irigasi Sederhana', 'value' => '- Ha'],
                    ['label' => 'Irigasi Tadah Hujan', 'value' => '63,2215 Ha'],
                ],
            ],
            'idm' => [
                'score' => 68.2,
                'status' => 'Sedang Berkembang',
                'description' => 'Indeks Desa Membangun - status dan ringkasan.',
                'metrics' => [],
            ],
            'profileHighlights' => [
                'Desa Bade dikembangkan sebagai wajah desa yang hangat, terbuka, dan progresif.',
                'Narasi visual menonjolkan layanan desa, potensi wilayah, dan informasi yang cepat ditemukan.',
                'Tampilan dibuat lebih ringan dari portal pemerintahan biasa namun tetap terpercaya.'
            ],
            'villageHistory' => [
                'title' => 'Sejarah Desa',
                'subtitle' => 'Rekam jejak sejarah, asal-usul, dan perjalanan perkembangan Desa Bade dari masa ke masa menuju desa yang mandiri dan sejahtera.',
                'paragraph' => $profil->sejarah ?: 'Desa Bade merupakan salah satu desa di Kecamatan Klego, Kabupaten Boyolali...',
            ],
            'news' => $news,
            'shops' => $shops,
            'apbdesList' => $apbdesList,
            'perangkatDesa' => $perangkatDesa,
            'bpdData' => $bpdData,
            'stuntingList' => Stunting::active()->get(),
            'bansosList'   => Bansos::active()->get(),
            'idmList'      => Idm::active()->get(),
            'idmDb'        => Idm::active()->first(),
            'sdgsDb'       => Sdgs::orderBy('tahun', 'desc')->orderBy('goal_nomor')->get(),
            'dusunList'    => Dusun::orderBy('urutan')->get(),
        ];
    }

    public function index()
    {
        $data = $this->makeData();

        if (view()->exists('home')) {
            return view('home', $data);
        }

        return view('welcome', $data);
    }

    public function profil()
    {
        $data = $this->makeData();
        if (view()->exists('profil')) {
            return view('profil', $data);
        }

        return redirect()->route('home');
    }

    public function infografis()
    {
        $data = $this->makeData();
        if (view()->exists('infografis')) {
            return view('infografis', $data);
        }

        return redirect()->route('home');
    }

    public function potensi()
    {
        $data = $this->makeData();
        $view = 'potensi';
        if (view()->exists($view)) {
            return view($view, $data);
        }
        return view('home', $data);
    }

    public function informasi()
    {
        $data = $this->makeData();
        $view = 'informasi';
        if (view()->exists($view)) {
            return view($view, $data);
        }
        return view('home', $data);
    }

    public function berita(Request $request, $slug = null)
    {
        $data = $this->makeData();
        $data['slug'] = $slug;

        if ($slug) {
            $article = collect($data['news'])->first(function($item) use ($slug) {
                return $item['slug'] === $slug;
            });

            if ($article) {
                $data['article'] = $article;
                $data['recentNews'] = collect($data['news'])
                    ->filter(function($item) use ($slug) {
                        return $item['slug'] !== $slug;
                    })
                    ->take(5)
                    ->toArray();

                if (view()->exists('berita-detail')) {
                    return view('berita-detail', $data);
                }
            }
        }

        $query = Berita::where('is_published', true);

        // Search Filter
        if ($request->filled('cari')) {
            $search = $request->input('cari');
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('summary', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        // Sorting
        $sort = $request->input('sort', 'terbaru');
        if ($sort === 'terpopuler') {
            $query->orderBy('views', 'desc');
        } else {
            $query->orderBy('published_at', 'desc');
        }

        $newsPaginated = $query->paginate(6)->withQueryString();
        $newsPaginated->getCollection()->transform(function ($item) {
            $imagesList = [];
            if (!empty($item->images) && is_array($item->images)) {
                foreach ($item->images as $img) {
                    $imagesList[] = $this->getImageUrl($img);
                }
            }
            if (empty($imagesList) && !empty($item->image)) {
                $imagesList[] = $this->getImageUrl($item->image);
            }
            if (empty($imagesList)) {
                $imagesList[] = 'https://placehold.co/600x400/e2e8f0/64748b?text=Berita';
            }

            return [
                'title' => $item->title,
                'slug' => $item->slug,
                'summary' => $item->summary ?: Str::limit(strip_tags($item->content), 200),
                'image' => $imagesList[0],
                'images' => $imagesList,
                'date' => $item->formatted_date,
                'date_day' => $item->formatted_day,
                'date_year' => $item->formatted_year,
                'time' => $item->formatted_time,
                'author' => $item->author,
                'views' => $item->views,
                'content' => $item->content,
            ];
        });
        $data['news'] = $newsPaginated;

        $view = 'berita';
        if (view()->exists($view)) {
            return view($view, $data);
        }
        return view('home', $data);
    }

    public function kontak()
    {
        $data = $this->makeData();
        $view = 'kontak';
        if (view()->exists($view)) {
            return view($view, $data);
        }
        return view('home', $data);
    }

    public function belanja(Request $request)
    {
        $data = $this->makeData();

        $query = ProdukBelanja::active();

        // Search Filter
        if ($request->filled('cari')) {
            $search = $request->input('cari');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Category Filter
        if ($request->filled('kategori')) {
            $query->where('category', $request->input('kategori'));
        }

        // Sorting
        $sort = $request->input('sort', 'terbaru');
        if ($sort === 'terpopuler') {
            $query->orderBy('rating', 'desc')->orderBy('rating_count', 'desc');
        } else if ($sort === 'termurah') {
            $query->orderBy('price', 'asc');
        } else if ($sort === 'termahal') {
            $query->orderBy('price', 'desc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $shopsPaginated = $query->paginate(6)->withQueryString();
        $shopsPaginated->getCollection()->transform(function ($item) {
            $imagesList = [];
            if (!empty($item->images) && is_array($item->images)) {
                foreach ($item->images as $img) {
                    $imagesList[] = $this->getImageUrl($img);
                }
            }
            if (empty($imagesList) && !empty($item->image)) {
                $imagesList[] = $this->getImageUrl($item->image);
            }
            if (empty($imagesList)) {
                $imagesList[] = 'https://placehold.co/600x600/e2e8f0/64748b?text=Produk';
            }

            return [
                'name' => $item->name,
                'slug' => $item->slug,
                'category' => $item->category,
                'price' => $item->price,
                'whatsapp' => $item->whatsapp,
                'wa_link' => $item->wa_link,
                'image' => $imagesList[0],
                'images' => $imagesList,
                'description' => $item->description,
                'rating' => $item->rating,
                'rating_count' => $item->rating_count,
            ];
        });
        $data['shops'] = $shopsPaginated;

        $view = 'belanja';
        if (view()->exists($view)) {
            return view($view, $data);
        }
        return view('home', $data);
    }

    public function belanjaShow($slug)
    {
        $data = $this->makeData();
        $shop = collect($data['shops'])->first(function ($item) use ($slug) {
            return $item['slug'] === $slug;
        });

        if ($shop) {
            $data['shop'] = $shop;
            if (view()->exists('belanja-detail')) {
                return view('belanja-detail', $data);
            }
        }

        return redirect()->route('belanja');
    }
    public function apbdesPdf($id, $filename = null)
    {
        $item = Apbdes::findOrFail($id);

        $path = storage_path('app/public/' . $item->file_pdf);
        if (!file_exists($path)) {
            $publicPath = public_path($item->file_pdf);
            if (file_exists($publicPath)) {
                $path = $publicPath;
            } else {
                abort(404);
            }
        }

        $cleanTitle = preg_replace('/[^A-Za-z0-9\-_. ]/', '', $item->judul ?: 'APBDes-' . $item->tahun);
        $cleanTitle = trim(str_replace(' ', '-', $cleanTitle));
        $dlFilename = $cleanTitle . '.pdf';

        return response()->file($path, [
            'Content-Type'        => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $dlFilename . '"',
        ]);
    }

    public function stuntingPdf($id, $filename = null)
    {
        $item = Stunting::findOrFail($id);

        $path = storage_path('app/public/' . $item->file_pdf);
        if (!file_exists($path)) {
            $publicPath = public_path($item->file_pdf);
            if (file_exists($publicPath)) {
                $path = $publicPath;
            } else {
                abort(404);
            }
        }

        $cleanTitle = preg_replace('/[^A-Za-z0-9\-_. ]/', '', $item->judul ?: 'Stunting-' . $item->tahun);
        $cleanTitle = trim(str_replace(' ', '-', $cleanTitle));
        $dlFilename = $cleanTitle . '.pdf';

        return response()->file($path, [
            'Content-Type'        => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $dlFilename . '"',
        ]);
    }

    public function bansosPdf($id, $filename = null)
    {
        $item = Bansos::findOrFail($id);

        $path = storage_path('app/public/' . $item->file_pdf);
        if (!file_exists($path)) {
            $publicPath = public_path($item->file_pdf);
            if (file_exists($publicPath)) {
                $path = $publicPath;
            } else {
                abort(404);
            }
        }

        $cleanTitle = preg_replace('/[^A-Za-z0-9\-_. ]/', '', $item->judul ?: 'Bansos-' . $item->tahun);
        $cleanTitle = trim(str_replace(' ', '-', $cleanTitle));
        $dlFilename = $cleanTitle . '.pdf';

        return response()->file($path, [
            'Content-Type'        => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $dlFilename . '"',
        ]);
    }

    public function idmPdf($id, $filename = null)
    {
        $item = Idm::findOrFail($id);

        $path = storage_path('app/public/' . $item->file_pdf);
        if (!file_exists($path)) {
            $publicPath = public_path($item->file_pdf);
            if (file_exists($publicPath)) {
                $path = $publicPath;
            } else {
                abort(404);
            }
        }

        $cleanTitle = preg_replace('/[^A-Za-z0-9\-_. ]/', '', $item->judul ?: 'IDM-' . $item->tahun);
        $cleanTitle = trim(str_replace(' ', '-', $cleanTitle));
        $dlFilename = $cleanTitle . '.pdf';

        return response()->file($path, [
            'Content-Type'        => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $dlFilename . '"',
        ]);
    }
}
