<?php

namespace Database\Seeders;

use App\Models\ProfilDesa;
use Illuminate\Database\Seeder;

class ProfilDesaSeeder extends Seeder
{
    public function run(): void
    {
        ProfilDesa::updateOrCreate(['id' => 1], [
            'sejarah' => '<p>Desa Bade merupakan salah satu desa di Kecamatan Klego, Kabupaten Boyolali, yang jejak sejarah lokalnya dikaitkan dengan penamaan desa pada sekitar tahun 1950-an untuk membedakannya dari wilayah lain yang memiliki nama serupa. Dalam perkembangan masyarakatnya, Desa Bade juga dikenal melalui tradisi-tradisi seperti sadranan, punggahan, dan metri desa yang mencerminkan penghormatan kepada leluhur sekaligus rasa syukur atas hasil bumi, sementara keberadaan Waduk Bade kemudian menjadi penanda penting yang memperkuat identitas wilayah ini di kawasan Klego.</p>',
            'visi'    => 'Terwujudnya Desa Bade yang maju, sejahtera, mandiri, dan berbudaya dengan tata kelola pemerintahan yang baik dan bersih.',
            'misi'    => '<ul><li>Meningkatkan pelayanan publik yang prima dan transparan</li><li>Mengembangkan potensi ekonomi masyarakat berbasis lokal</li><li>Meningkatkan kualitas sumber daya manusia melalui pendidikan dan kesehatan</li><li>Menjaga kelestarian lingkungan dan budaya lokal</li><li>Memperkuat infrastruktur desa yang berkualitas</li></ul>',
            'luas_wilayah'   => '320,4960 Ha',
            'jumlah_penduduk' => '4.782 Jiwa',
            'jumlah_kk'      => '1.602 KK',
            'koordinat'      => '7°21′40″S, 110°42′2″E',
            'embed_map_url'  => 'https://www.google.com/maps?q=-7.361111,110.700556&z=15&output=embed',
            'map_link'       => 'https://www.google.com/maps?q=-7.361111,110.700556',
            'batas_utara'    => 'Desa Karanggatak',
            'batas_timur'    => 'Desa Bade',
            'batas_selatan'  => 'Desa Blumbang',
            'batas_barat'    => 'Desa Klego',
            'land_details'   => [
                ['label' => 'Tanah Sawah',       'value' => '154,5970 Ha'],
                ['label' => 'Tanah Tegal',        'value' => '37,7785 Ha'],
                ['label' => 'Tanah Pekarangan',   'value' => '89,3675 Ha'],
                ['label' => 'Pekuburan',          'value' => '- Ha'],
                ['label' => 'Jalan',              'value' => '- Ha'],
                ['label' => 'Lain-lain',          'value' => '- Ha'],
                ['label' => 'Total Terperinci',   'value' => '281,7430 Ha', 'highlight' => true],
            ],
            'kas_desa' => [
                ['label' => 'Tanah Sawah',             'value' => '- Ha'],
                ['label' => 'Tanah Tegal',              'value' => '- Ha'],
                ['label' => 'Tanah Pekarangan',         'value' => '- Ha'],
                ['label' => 'Bekas Sawah / Lungguh',   'value' => '18,7063 Ha'],
                ['label' => 'Bekas SPL',                'value' => '- Ha'],
            ],
            'pengairan' => [
                ['label' => 'Irigasi Teknis',           'value' => '21 Ha'],
                ['label' => 'Irigasi Setengah Teknis',  'value' => '12 Ha'],
                ['label' => 'Irigasi Sederhana',        'value' => '- Ha'],
                ['label' => 'Irigasi Tadah Hujan',      'value' => '63,2215 Ha'],
            ],
        ]);
    }
}
