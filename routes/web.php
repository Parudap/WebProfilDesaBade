<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\VisiMisiController;
use App\Http\Controllers\Admin\SejarahController;
use App\Http\Controllers\Admin\PerangkatDesaController;
use App\Http\Controllers\Admin\InfografisController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\BelanjaController;
use App\Http\Controllers\Admin\PesanController;
use App\Http\Controllers\Admin\LayananController as AdminLayananController;
use App\Http\Controllers\Public\PesanController as PublicPesanController;
use App\Http\Controllers\Public\BerandaController;
use App\Http\Controllers\Public\LayananController as PublicLayananController;
use App\Http\Middleware\EnsureAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', [BerandaController::class, 'index'])->name('home');
Route::get('/profil', [BerandaController::class, 'profil'])->name('profil');
Route::get('/infografis', [BerandaController::class, 'infografis'])->name('infografis');
Route::get('/potensi', [BerandaController::class, 'potensi'])->name('potensi');
Route::get('/informasi', [BerandaController::class, 'informasi'])->name('informasi');
Route::get('/berita', [BerandaController::class, 'berita'])->name('berita');
Route::get('/berita/{slug}', [BerandaController::class, 'berita'])->name('berita.show');
Route::get('/belanja', [BerandaController::class, 'belanja'])->name('belanja');
Route::get('/belanja/{slug}', [BerandaController::class, 'belanjaShow'])->name('belanja.show');
Route::get('/layanan', [PublicLayananController::class, 'index'])->name('layanan');
Route::get('/kontak', [BerandaController::class, 'kontak'])->name('kontak');
Route::post('/kritik-saran', [PublicPesanController::class, 'store'])->name('pesan.store');
Route::get('/apbdes-pdf/{id}/{filename?}', [BerandaController::class, 'apbdesPdf'])->name('apbdes.stream_pdf');
Route::get('/stunting-pdf/{id}/{filename?}', [BerandaController::class, 'stuntingPdf'])->name('stunting.stream_pdf');
Route::get('/bansos-pdf/{id}/{filename?}', [BerandaController::class, 'bansosPdf'])->name('bansos.stream_pdf');
Route::get('/idm-pdf/{id}/{filename?}', [BerandaController::class, 'idmPdf'])->name('idm.stream_pdf');

Route::prefix('admin')->group(function () {
    Route::redirect('/', '/admin/login');
    Route::get('/login', [AdminController::class, 'loginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'authenticate'])->name('admin.login.post');

    Route::middleware([EnsureAdmin::class])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

        // Profil Desa
        Route::get('/visi-misi', [VisiMisiController::class, 'index'])->name('admin.visi-misi');
        Route::put('/visi-misi', [VisiMisiController::class, 'update'])->name('admin.visi-misi.update');

        Route::get('/sejarah', [SejarahController::class, 'index'])->name('admin.sejarah');
        Route::put('/sejarah', [SejarahController::class, 'update'])->name('admin.sejarah.update');

        // Perangkat Desa
        Route::get('/perangkat-desa', [PerangkatDesaController::class, 'index'])->name('admin.perangkat-desa');
        Route::post('/perangkat-desa', [PerangkatDesaController::class, 'store'])->name('admin.perangkat-desa.store');
        Route::put('/perangkat-desa/{perangkat}', [PerangkatDesaController::class, 'update'])->name('admin.perangkat-desa.update');
        Route::delete('/perangkat-desa/{perangkat}', [PerangkatDesaController::class, 'destroy'])->name('admin.perangkat-desa.destroy');

        // Infografis
        Route::get('/infografis/penduduk',  [InfografisController::class, 'penduduk'])->name('admin.infografis.penduduk');
        Route::post('/infografis/penduduk', [InfografisController::class, 'pendudukStore'])->name('admin.infografis.penduduk.store');
        Route::put('/infografis/penduduk/{statistik}',    [InfografisController::class, 'pendudukUpdate'])->name('admin.infografis.penduduk.update');
        Route::delete('/infografis/penduduk/{statistik}', [InfografisController::class, 'pendudukDestroy'])->name('admin.infografis.penduduk.destroy');

        Route::post('/infografis/dusun', [InfografisController::class, 'dusunStore'])->name('admin.infografis.dusun.store');
        Route::put('/infografis/dusun/{dusun}', [InfografisController::class, 'dusunUpdate'])->name('admin.infografis.dusun.update');
        Route::delete('/infografis/dusun/{dusun}', [InfografisController::class, 'dusunDestroy'])->name('admin.infografis.dusun.destroy');

        Route::get('/infografis/apbdes',   [InfografisController::class, 'apbdes'])->name('admin.infografis.apbdes');
        Route::post('/infografis/apbdes',  [InfografisController::class, 'apbdesStore'])->name('admin.infografis.apbdes.store');
        Route::delete('/infografis/apbdes/{apbdes}', [InfografisController::class, 'apbdesDestroy'])->name('admin.infografis.apbdes.destroy');

        Route::get('/infografis/stunting',  [InfografisController::class, 'stunting'])->name('admin.infografis.stunting');
        Route::post('/infografis/stunting', [InfografisController::class, 'stuntingStore'])->name('admin.infografis.stunting.store');
        Route::delete('/infografis/stunting/{stunting}', [InfografisController::class, 'stuntingDestroy'])->name('admin.infografis.stunting.destroy');

        Route::get('/infografis/bansos',   [InfografisController::class, 'bansos'])->name('admin.infografis.bansos');
        Route::post('/infografis/bansos',  [InfografisController::class, 'bansosStore'])->name('admin.infografis.bansos.store');
        Route::delete('/infografis/bansos/{banso}', [InfografisController::class, 'bansosDestroy'])->name('admin.infografis.bansos.destroy');

        Route::get('/infografis/idm',   [InfografisController::class, 'idm'])->name('admin.infografis.idm');
        Route::post('/infografis/idm',  [InfografisController::class, 'idmStore'])->name('admin.infografis.idm.store');
        Route::delete('/infografis/idm/{idm}', [InfografisController::class, 'idmDestroy'])->name('admin.infografis.idm.destroy');

        Route::get('/infografis/sdgs',   [InfografisController::class, 'sdgs'])->name('admin.infografis.sdgs');
        Route::post('/infografis/sdgs',  [InfografisController::class, 'sdgsStore'])->name('admin.infografis.sdgs.store');
        Route::post('/infografis/sdgs/batch', [InfografisController::class, 'sdgsBatchUpdate'])->name('admin.infografis.sdgs.batch');
        Route::delete('/infografis/sdgs/{sdgs}', [InfografisController::class, 'sdgsDestroy'])->name('admin.infografis.sdgs.destroy');

        // Berita Desa
        Route::get('/berita', [BeritaController::class, 'index'])->name('admin.berita');
        Route::post('/berita', [BeritaController::class, 'store'])->name('admin.berita.store');
        Route::put('/berita/{berita}', [BeritaController::class, 'update'])->name('admin.berita.update');
        Route::patch('/berita/{berita}/toggle', [BeritaController::class, 'togglePublish'])->name('admin.berita.toggle');
        Route::delete('/berita/{berita}', [BeritaController::class, 'destroy'])->name('admin.berita.destroy');

        // Belanja / Produk UMKM
        Route::get('/belanja', [BelanjaController::class, 'index'])->name('admin.belanja');
        Route::post('/belanja', [BelanjaController::class, 'store'])->name('admin.belanja.store');
        Route::put('/belanja/{produk}', [BelanjaController::class, 'update'])->name('admin.belanja.update');
        Route::patch('/belanja/{produk}/toggle', [BelanjaController::class, 'toggleActive'])->name('admin.belanja.toggle');
        Route::delete('/belanja/{produk}', [BelanjaController::class, 'destroy'])->name('admin.belanja.destroy');

        // Pengaturan Website
        Route::get('/pengaturan', [\App\Http\Controllers\Admin\PengaturanController::class, 'index'])->name('admin.pengaturan');
        Route::put('/pengaturan', [\App\Http\Controllers\Admin\PengaturanController::class, 'update'])->name('admin.pengaturan.update');

        // Kelola Beranda
        Route::get('/beranda', [\App\Http\Controllers\Admin\PengaturanController::class, 'beranda'])->name('admin.beranda');
        Route::put('/beranda', [\App\Http\Controllers\Admin\PengaturanController::class, 'berandaUpdate'])->name('admin.beranda.update');
        Route::get('/beranda/sambutan', [\App\Http\Controllers\Admin\PengaturanController::class, 'sambutan'])->name('admin.beranda.sambutan');
        Route::put('/beranda/sambutan', [\App\Http\Controllers\Admin\PengaturanController::class, 'sambutanUpdate'])->name('admin.beranda.sambutan.update');

        // Kotak Pesan
        Route::get('/pesan', [PesanController::class, 'index'])->name('admin.pesan');
        Route::patch('/pesan/{pesan}/read', [PesanController::class, 'markRead'])->name('admin.pesan.read');
        Route::post('/pesan/read-all', [PesanController::class, 'markAllRead'])->name('admin.pesan.read-all');
        Route::delete('/pesan/{pesan}', [PesanController::class, 'destroy'])->name('admin.pesan.destroy');

        // Layanan Desa
        Route::get('/layanan', [AdminLayananController::class, 'index'])->name('admin.layanan');
        // Kategori
        Route::post('/layanan/kategori', [AdminLayananController::class, 'storeKategori'])->name('admin.layanan.kategori.store');
        Route::put('/layanan/kategori/{kategori}', [AdminLayananController::class, 'updateKategori'])->name('admin.layanan.kategori.update');
        Route::delete('/layanan/kategori/{kategori}', [AdminLayananController::class, 'destroyKategori'])->name('admin.layanan.kategori.destroy');
        // Item
        Route::post('/layanan/item', [AdminLayananController::class, 'storeItem'])->name('admin.layanan.item.store');
        Route::put('/layanan/item/{item}', [AdminLayananController::class, 'updateItem'])->name('admin.layanan.item.update');
        Route::delete('/layanan/item/{item}', [AdminLayananController::class, 'destroyItem'])->name('admin.layanan.item.destroy');
        // Syarat
        Route::post('/layanan/syarat', [AdminLayananController::class, 'storeSyarat'])->name('admin.layanan.syarat.store');
        Route::put('/layanan/syarat/{syarat}', [AdminLayananController::class, 'updateSyarat'])->name('admin.layanan.syarat.update');
        Route::delete('/layanan/syarat/{syarat}', [AdminLayananController::class, 'destroySyarat'])->name('admin.layanan.syarat.destroy');
    });
});
