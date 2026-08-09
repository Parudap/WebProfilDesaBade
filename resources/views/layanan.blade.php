@extends('layouts.app')

@section('title', 'Layanan Desa Bade')
@section('meta_description', 'Informasi lengkap layanan administrasi desa, surat menyurat, dan administrasi kependudukan Desa Bade, Kecamatan Klego, Kabupaten Boyolali.')

@section('content')
<style>
/* === LAYANAN PAGE === */
.layanan-hero {
    background: linear-gradient(135deg, #1b5e20 0%, #2e7d32 40%, #388e3c 100%);
    padding: 100px 0 60px;
    position: relative;
    overflow: hidden;
}
.layanan-hero::before {
    content: '';
    position: absolute;
    top: -80px; right: -80px;
    width: 400px; height: 400px;
    background: radial-gradient(circle, rgba(255,255,255,.08) 0%, transparent 70%);
}
.layanan-hero::after {
    content: '';
    position: absolute;
    bottom: -60px; left: -60px;
    width: 300px; height: 300px;
    background: radial-gradient(circle, rgba(255,255,255,.05) 0%, transparent 70%);
}
.layanan-hero-inner {
    max-width: 1100px;
    margin: 0 auto;
    padding: 0 24px;
    position: relative;
    z-index: 1;
    text-align: center;
}
.layanan-hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255,255,255,.15);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,.2);
    border-radius: 100px;
    padding: 8px 20px;
    font-size: 13px;
    font-weight: 600;
    color: rgba(255,255,255,.9);
    margin-bottom: 24px;
    letter-spacing: .5px;
}
.layanan-hero h1 {
    font-size: clamp(28px, 5vw, 48px);
    font-weight: 800;
    color: #fff;
    margin: 0 0 16px;
    line-height: 1.15;
}
.layanan-hero p {
    font-size: 16px;
    color: rgba(255,255,255,.8);
    max-width: 560px;
    margin: 0 auto 36px;
    line-height: 1.6;
}
.layanan-hero-stats {
    display: flex;
    gap: 16px;
    justify-content: center;
    flex-wrap: wrap;
}
.layanan-stat-pill {
    background: rgba(255,255,255,.12);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,.2);
    border-radius: 50px;
    padding: 10px 22px;
    color: #fff;
    font-size: 13px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
}

/* === CONTENT === */
.layanan-content {
    max-width: 1100px;
    margin: 0 auto;
    padding: 56px 24px 80px;
}
.layanan-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(480px, 1fr));
    gap: 32px;
    align-items: start;
}
@media (max-width: 640px) {
    .layanan-grid { grid-template-columns: 1fr; }
}

/* === KATEGORI CARD === */
.lkategori-card {
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 4px 24px rgba(0,0,0,.06);
    transition: box-shadow .3s, transform .3s;
}
.lkategori-card:hover {
    box-shadow: 0 12px 40px rgba(46,125,50,.12);
    transform: translateY(-2px);
}
.lkategori-header {
    padding: 28px 30px 22px;
    background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
    border-bottom: 1px solid #bbf7d0;
    display: flex;
    align-items: center;
    gap: 16px;
}
.lkategori-icon {
    width: 52px;
    height: 52px;
    background: linear-gradient(135deg, #2e7d32, #1b5e20);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    box-shadow: 0 4px 14px rgba(46,125,50,.3);
}
.lkategori-header-text h2 {
    font-size: 18px;
    font-weight: 800;
    color: #1a3d1a;
    margin: 0 0 4px;
}
.lkategori-header-text p {
    font-size: 12px;
    font-weight: 600;
    color: #2e7d32;
    margin: 0;
    text-transform: uppercase;
    letter-spacing: .8px;
}
.lkategori-body {
    padding: 20px 24px 24px;
}

/* === ITEM ACCORDION === */
.litem-wrap {
    border: 1px solid #f1f5f9;
    border-radius: 14px;
    margin-bottom: 10px;
    overflow: hidden;
    transition: border-color .2s, box-shadow .2s;
}
.litem-wrap:hover {
    border-color: #bbf7d0;
}
.litem-wrap.lopen {
    border-color: #86efac;
    box-shadow: 0 2px 12px rgba(46,125,50,.08);
}
.litem-trigger {
    width: 100%;
    background: none;
    border: none;
    padding: 14px 16px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    cursor: pointer;
    font-family: inherit;
    text-align: left;
    transition: background .2s;
}
.litem-trigger:hover { background: #f8fafc; }
.litem-wrap.lopen .litem-trigger { background: #f0fdf4; }
.litem-trigger-left {
    display: flex;
    align-items: center;
    gap: 12px;
}
.litem-num {
    width: 26px;
    height: 26px;
    background: linear-gradient(135deg, #2e7d32, #1b5e20);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: 700;
    color: #fff;
    flex-shrink: 0;
}
.litem-name {
    font-size: 14px;
    font-weight: 600;
    color: #1e293b;
}
.litem-chevron {
    width: 18px;
    height: 18px;
    color: #94a3b8;
    transition: transform .3s;
    flex-shrink: 0;
}
.litem-wrap.lopen .litem-chevron {
    transform: rotate(180deg);
    color: #2e7d32;
}
.litem-body {
    max-height: 0;
    overflow: hidden;
    transition: max-height .35s ease, padding .35s ease;
}
.litem-wrap.lopen .litem-body {
    max-height: 500px;
}
.litem-inner {
    padding: 12px 20px 20px 20px;
    background: #fafdfb;
    border-top: 1px solid #e8f5e9;
}
.litem-label {
    font-size: 11px;
    font-weight: 700;
    color: #2e7d32;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 12px;
    display: flex;
    align-items: center;
    gap: 6px;
}
.lsyarat-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 10px;
}
.lsyarat-list li {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px 14px;
    font-size: 13.5px;
    color: #2d3748;
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    line-height: 1.5;
    box-shadow: 0 1px 3px rgba(0,0,0,0.02);
    transition: all .2s ease;
}
.lsyarat-list li:hover {
    border-color: #a7f3d0;
    background: #f0fdf4;
}
.lsyarat-icon {
    width: 20px;
    height: 20px;
    background: #dcfce7;
    color: #16a34a;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

/* === CATATAN === */
.lcatatan {
    margin-top: 16px;
    background: linear-gradient(135deg, #fffbeb, #fef3c7);
    border: 1px solid #fde68a;
    border-radius: 12px;
    padding: 14px 16px;
    display: flex;
    gap: 10px;
    align-items: flex-start;
    font-size: 13px;
    color: #92400e;
    font-weight: 500;
    line-height: 1.6;
}
.lcatatan svg { flex-shrink: 0; margin-top: 2px; }


</style>

<!-- HERO -->
<section class="layanan-hero">
    <div class="layanan-hero-inner">
        <h1>Layanan Desa Bade</h1>
        <p>Kami hadir untuk memberikan pelayanan administrasi yang mudah, cepat, dan transparan bagi seluruh warga Desa Bade.</p>
        <div class="layanan-hero-stats">
            @foreach($kategoris as $k)
            <div class="layanan-stat-pill">
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                {{ $k->nama }}
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CONTENT -->
<section>
    <div class="layanan-content">

        @if($kategoris->isEmpty())
        <div style="text-align:center;padding:60px 24px;color:#94a3b8">
            <svg width="60" height="60" fill="none" stroke="#cbd5e1" viewBox="0 0 24 24" style="margin:0 auto 16px;display:block"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
            <p style="font-size:16px;font-weight:600;margin:0">Data layanan belum tersedia</p>
        </div>
        @else
        <div class="layanan-grid">
            @foreach($kategoris as $kIdx => $kategori)
            <div class="lkategori-card" data-reveal>
                <div class="lkategori-header">
                    <div class="lkategori-icon">
                        @if($kIdx === 0)
                        <svg width="26" height="26" fill="none" stroke="white" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        @else
                        <svg width="26" height="26" fill="none" stroke="white" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        @endif
                    </div>
                    <div class="lkategori-header-text">
                        <h2>{{ $kategori->nama }}</h2>
                        <p>{{ $kategori->items->count() }} jenis layanan</p>
                    </div>
                </div>
                <div class="lkategori-body">
                    @foreach($kategori->items as $iIdx => $item)
                    <div class="litem-wrap" id="lwrap-{{ $item->id }}">
                        <button class="litem-trigger" onclick="toggleLayananItem('lwrap-{{ $item->id }}')" aria-expanded="false">
                            <div class="litem-trigger-left">
                                <span class="litem-num">{{ $iIdx + 1 }}</span>
                                <span class="litem-name">{{ $item->nama }}</span>
                            </div>
                            <svg class="litem-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div class="litem-body">
                            <div class="litem-inner">
                                <div class="litem-label">
                                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    Dokumen Persyaratan
                                </div>
                                <ul class="lsyarat-list">
                                    @foreach($item->syarat as $syarat)
                                    <li>
                                        <div class="lsyarat-icon">
                                            <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                        </div>
                                        <span>{{ $syarat->syarat }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    @if($kategori->catatan)
                    <div class="lcatatan">
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span><strong>Catatan:</strong> {{ $kategori->catatan }}</span>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        @endif

    </div>
</section>

<script>
function toggleLayananItem(wrapId) {
    const wrap = document.getElementById(wrapId);
    if (!wrap) return;
    // Toggle hanya item ini, yang lain tetap tidak berubah
    wrap.classList.toggle('lopen');
}
</script>
@endsection
