<?php
$files = [
    'resources/views/admin/dashboard.blade.php',
    'resources/views/admin/beranda.blade.php',
    'resources/views/admin/berita.blade.php',
    'resources/views/admin/belanja.blade.php',
    'resources/views/admin/pengaturan.blade.php',
    'resources/views/admin/perangkat-desa.blade.php',
    'resources/views/admin/sejarah.blade.php',
    'resources/views/admin/visi-misi.blade.php',
    'resources/views/admin/infografis/penduduk.blade.php',
    'resources/views/admin/infografis/apbdes.blade.php',
    'resources/views/admin/infografis/stunting.blade.php',
    'resources/views/admin/infografis/bansos.blade.php',
    'resources/views/admin/infografis/idm.blade.php',
    'resources/views/admin/infografis/sdgs.blade.php'
];

$dir = 'c:\laragon\www\portfolio-desa\\';
$search = "</a>\n\n<a href=\"{{ route('home') }}\" target=\"_blank\" class=\"nav-item\">";
$replace = "</a>\n\n        <a href=\"{{ route('admin.pesan') }}\" class=\"nav-item {{ Route::is('admin.pesan') ? 'active' : '' }}\" style=\"position:relative;\">\n            <svg class=\"nav-icon\" fill=\"none\" stroke=\"currentColor\" viewBox=\"0 0 24 24\"><rect x=\"2\" y=\"4\" width=\"20\" height=\"16\" rx=\"3\" stroke-width=\"2\"/><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M22 7l-10 7L2 7\"/></svg>\n            <span>Kotak Pesan</span>\n            @php \$unreadPesanCount = \\App\\Models\\Pesan::where('is_read', false)->count(); @endphp\n            @if(\$unreadPesanCount > 0)\n            <span style=\"margin-left:auto;background:#ef4444;color:#fff;font-size:10px;font-weight:700;padding:2px 6px;border-radius:10px;min-width:18px;text-align:center;\">{{ \$unreadPesanCount > 99 ? '99+' : \$unreadPesanCount }}</span>\n            @endif\n        </a>\n\n<a href=\"{{ route('home') }}\" target=\"_blank\" class=\"nav-item\">";

foreach ($files as $file) {
    $path = $dir . str_replace('/', '\\', $file);
    if (file_exists($path)) {
        $content = file_get_contents($path);
        if (strpos($content, 'Kotak Pesan') === false) {
            $content = str_replace($search, $replace, $content);
            file_put_contents($path, $content);
            echo "Updated: $file\n";
        }
    } else {
        echo "Not found: $file\n";
    }
}
echo "Done!\n";
