<?php

namespace Database\Seeders;

use App\Models\ProdukBelanja;
use Illuminate\Database\Seeder;

class ProdukBelanjaSeeder extends Seeder
{
    public function run(): void
    {
        $produk = [
            [
                'name'         => 'Susu Sapi Segar Bade',
                'slug'         => 'susu-sapi-segar-bade',
                'category'     => 'Minuman',
                'price'        => 'Rp12.000',
                'image'        => null,
                'description'  => 'Susu sapi murni segar hasil perahan langsung peternak sapi perah Desa Bade, Boyolali. Diproses secara higienis, alami, tanpa bahan pengawet sehingga kandungan nutrisinya tetap terjaga.',
                'rating'       => 0,
                'rating_count' => 0,
                'is_active'    => true,
                'urutan'       => 1,
            ],
            [
                'name'         => 'Keju Lokal Boyolali',
                'slug'         => 'keju-lokal-boyolali',
                'category'     => 'Makanan',
                'price'        => 'Rp35.000',
                'image'        => null,
                'description'  => 'Keju artisan lokal Boyolali yang diproses secara tradisional dari susu sapi pilihan berkualitas tinggi. Memiliki rasa gurih alami dan tekstur yang lembut, cocok untuk pelengkap masakan maupun camilan.',
                'rating'       => 0,
                'rating_count' => 0,
                'is_active'    => true,
                'urutan'       => 2,
            ],
            [
                'name'         => 'Keripik Tempe Rejeki',
                'slug'         => 'keripik-tempe-rejeki',
                'category'     => 'Camilan',
                'price'        => 'Rp15.000',
                'image'        => null,
                'description'  => 'Keripik tempe renyah dengan bumbu rempah pilihan khas Desa Bade. Digoreng dengan minyak berkualitas sehingga renyah tahan lama, tanpa pengawet, dan sangat cocok dijadikan teman makan nasi atau camilan.',
                'rating'       => 0,
                'rating_count' => 0,
                'is_active'    => true,
                'urutan'       => 3,
            ],
            [
                'name'         => 'Madu Hutan Waduk Bade',
                'slug'         => 'madu-hutan-waduk-bade',
                'category'     => 'Kesehatan',
                'price'        => 'Rp50.000',
                'image'        => null,
                'description'  => 'Madu hutan alami yang dipanen langsung dari kawasan sekitar Waduk Bade. Memiliki warna keemasan yang jernih, rasa manis alami yang khas, serta kaya akan antioksidan dan enzim yang baik untuk imun tubuh.',
                'rating'       => 0,
                'rating_count' => 0,
                'is_active'    => true,
                'urutan'       => 4,
            ],
        ];

        foreach ($produk as $item) {
            ProdukBelanja::updateOrCreate(['slug' => $item['slug']], $item);
        }
    }
}
