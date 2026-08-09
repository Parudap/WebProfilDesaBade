<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>SDGs Desa - Admin Desa Bade</title>
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<style>h1, h2, h3, h4, h5, h6 { font-family: 'Cinzel', serif; } 
*{box-sizing:border-box}body{font-family:'Plus Jakarta Sans',sans-serif;background:#f4f6fb;color:#1e293b;margin:0}
::-webkit-scrollbar{width:5px}::-webkit-scrollbar-thumb{background:#cbd5e1;border-radius:10px}
.layout{display:flex;height:100vh;overflow:hidden}
.sidebar{width:260px;min-width:260px;background:#fff;border-right:1px solid #e2e8f0;display:flex;flex-direction:column;overflow:hidden}
.sidebar-brand{padding:28px 24px 20px;border-bottom:1px solid #e2e8f0}
.brand-logo{display:flex;align-items:center;gap:12px}
.brand-icon{width:40px;height:40px;background:linear-gradient(135deg,#2e7d32,#1b5e20);border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0;color:white}
.brand-text h1{font-size:16px;font-weight:700;color:#1e293b;margin:0}
.brand-text p{font-size:11px;color:#2e7d32;font-weight:600;margin:2px 0 0;text-transform:uppercase;letter-spacing:1px}
.sidebar-nav{flex:1;padding:16px 12px;overflow-y:auto}
.nav-section-label{font-size:10px;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:1.2px;padding:0 12px;margin:16px 0 8px}
.nav-item{display:flex;align-items:center;gap:10px;padding:10px 14px;border-radius:10px;font-size:14px;font-weight:500;color:#64748b;transition:all .2s;text-decoration:none;margin-bottom:2px}
.nav-item:hover{background:#f1f5f9;color:#1e293b}
.nav-icon{width:18px;height:18px;flex-shrink:0;opacity:.7}
.nav-group-header{display:flex;align-items:center;justify-content:space-between;padding:10px 14px;border-radius:10px;font-size:14px;font-weight:500;color:#64748b;cursor:pointer;transition:all .2s;margin-bottom:2px}
.nav-group-header:hover{background:#f1f5f9}
.nav-group-header-left{display:flex;align-items:center;gap:10px}
.nav-group-chevron{width:14px;height:14px;transition:transform .3s;color:#94a3b8;flex-shrink:0}
.nav-group-chevron.open{transform:rotate(180deg)}
.nav-submenu{max-height:0;overflow:hidden;transition:max-height .3s ease;padding-left:14px}
.nav-submenu.open{max-height:400px}
.nav-subitem{display:flex;align-items:center;gap:8px;padding:8px 14px;border-radius:8px;font-size:13px;font-weight:500;color:#94a3b8;transition:all .2s;text-decoration:none;margin-bottom:1px}
.nav-subitem::before{content:'';width:4px;height:4px;background:#cbd5e1;border-radius:50%;flex-shrink:0}
.nav-subitem:hover{color:#475569;background:#f1f5f9}
.nav-subitem.active-sub{color:#2e7d32;font-weight:600}
.nav-subitem.active-sub::before{background:#2e7d32}
.sidebar-footer{padding:16px 12px;border-top:1px solid #e2e8f0}
.admin-profile{display:flex;align-items:center;gap:10px;padding:10px 12px;border-radius:10px;background:#f8fafc;margin-bottom:10px;border:1px solid #e2e8f0}
.admin-avatar{width:36px;height:36px;background:linear-gradient(135deg,#2e7d32,#1b5e20);border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;color:white;flex-shrink:0}
.admin-info p{margin:0}
.admin-name{font-size:13px;font-weight:600;color:#1e293b}
.admin-role{font-size:11px;color:#94a3b8}
.btn-logout{display:flex;align-items:center;justify-content:center;gap:8px;width:100%;padding:10px;border-radius:10px;font-size:13px;font-weight:600;color:#ef4444;background:#fef2f2;border:1px solid #fecaca;cursor:pointer;font-family:inherit}
.btn-logout:hover{background:#fee2e2}
.main{flex:1;display:flex;flex-direction:column;overflow:hidden}
.topbar{padding:18px 32px;border-bottom:1px solid #e2e8f0;display:flex;align-items:center;justify-content:space-between;background:#fff;flex-shrink:0}
.topbar-left h2{font-size:20px;font-weight:700;color:#1e293b;margin:0}
.topbar-left p{font-size:13px;color:#94a3b8;margin:3px 0 0}
.breadcrumb{display:flex;align-items:center;gap:6px;font-size:13px;color:#94a3b8}
.breadcrumb a{color:#2e7d32;text-decoration:none;font-weight:500}
.breadcrumb span{color:#cbd5e1}
.page-content{flex:1;overflow-y:auto;padding:28px 32px}
.alert-success{display:flex;align-items:center;gap:12px;padding:14px 18px;background:#f0fdf4;border:1px solid #86efac;border-radius:12px;margin-bottom:24px}
.alert-success-icon{width:34px;height:34px;background:#22c55e;border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.alert-success p{margin:0;font-size:14px;font-weight:600;color:#15803d}
.stats-banner{display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-bottom:24px}
.stat-card{background:#fff;border:1px solid #e2e8f0;border-radius:16px;padding:20px 24px;display:flex;align-items:center;justify-content:space-between}
.stat-info p{margin:0}
.stat-label{font-size:12px;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.8px}
.stat-value{font-size:32px;font-weight:800;color:#1e293b;margin-top:4px!important}
.stat-icon{width:54px;height:54px;border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:20px}
.card{background:#fff;border:1px solid #e2e8f0;border-radius:16px;margin-bottom:24px}
.card-header{padding:20px 24px;border-bottom:1px solid #f1f5f9;display:flex;align-items:center;justify-content:space-between}
.card-title{font-size:16px;font-weight:700;color:#1e293b;margin:0;display:flex;align-items:center;gap:8px}
.btn-primary{display:inline-flex;align-items:center;gap:8px;padding:9px 18px;background:linear-gradient(135deg,#2e7d32,#1b5e20);color:white;border-radius:10px;font-size:13px;font-weight:600;border:none;cursor:pointer;font-family:inherit;box-shadow:0 3px 10px rgba(46,125,50,.3)}
.btn-primary:hover{transform:translateY(-1px);box-shadow:0 5px 16px rgba(46,125,50,.4)}
table{width:100%;border-collapse:collapse}
thead tr{background:#f8fafc;border-bottom:1px solid #e2e8f0}
th{padding:12px 16px;font-size:11px;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:.8px;white-space:nowrap}
tbody tr{border-bottom:1px solid #f1f5f9;transition:background .15s}
tbody tr:last-child{border-bottom:none}
tbody tr:hover{background:#fafbff}
td{padding:12px 16px;font-size:13px;color:#334155;vertical-align:middle}
.td-no{width:48px;color:#94a3b8;font-weight:600;text-align:center}
.goal-badge{width:36px;height:36px;border-radius:9px;color:white;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:13px;flex-shrink:0;box-shadow:0 2px 6px rgba(0,0,0,.15)}
.progress-bar{height:8px;background:#f1f5f9;border-radius:10px;overflow:hidden;width:120px}
.progress-fill{height:100%;background:linear-gradient(to right,#2e7d32,#1b5e20);border-radius:10px}
.btn-edit{padding:6px 14px;border-radius:8px;font-size:12px;font-weight:600;color:#2e7d32;background:#f0fdf4;border:1px solid #bbf7d0;cursor:pointer;font-family:inherit;transition:all .15s}
.btn-edit:hover{background:#dcfce7;color:#4f46e5}

/* Custom modal classes to avoid Tailwind/DaisyUI modal conflicts */
.adm-backdrop{position:fixed;inset:0;background:rgba(15,23,42,.45);backdrop-filter:blur(4px);z-index:9999;display:none;align-items:center;justify-content:center;opacity:0;transition:opacity .2s}
.adm-backdrop.open{display:flex;opacity:1}
.adm-dialog{background:#fff;border-radius:18px;width:460px;max-width:95vw;box-shadow:0 24px 60px rgba(0,0,0,.18);transform:translateY(16px) scale(.97);transition:all .25s}
.adm-backdrop.open .adm-dialog{transform:translateY(0) scale(1)}
.adm-dialog-lg{width:780px}
.adm-header{padding:22px 24px 0;display:flex;align-items:center;justify-content:space-between}
.adm-title{font-size:17px;font-weight:700;color:#1e293b;display:flex;align-items:center;gap:8px}
.adm-close{width:32px;height:32px;border-radius:8px;border:1px solid #e2e8f0;background:#f8fafc;color:#64748b;display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:16px}
.adm-body{padding:20px 24px;max-height:75vh;overflow-y:auto}
.adm-footer{padding:0 24px 22px;display:flex;gap:10px;justify-content:flex-end}
.form-group{margin-bottom:16px}
.form-label{display:block;font-size:12px;font-weight:600;color:#374151;margin-bottom:6px}
.form-label .req{color:#ef4444;margin-left:2px}
.form-input{width:100%;padding:9px 13px;border:1px solid #e2e8f0;border-radius:9px;font-size:13px;font-family:inherit;color:#1e293b;background:#fff;transition:all .2s}
.form-input:focus{outline:none;border-color:#2e7d32;box-shadow:0 0 0 3px rgba(46,125,50,.1)}
.btn-submit{padding:10px 22px;background:linear-gradient(135deg,#2e7d32,#1b5e20);color:white;border-radius:9px;font-size:13px;font-weight:600;border:none;cursor:pointer;font-family:inherit}
.btn-muted{padding:10px 18px;background:#f8fafc;color:#64748b;border-radius:9px;font-size:13px;font-weight:600;border:1px solid #e2e8f0;cursor:pointer;font-family:inherit}
.batch-grid{display:grid;grid-template-columns:1fr 1fr;gap:14px}
.batch-item{padding:10px 14px;background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;display:flex;align-items:center;justify-content:space-between;gap:12px}
.batch-item-info{display:flex;align-items:center;gap:10px;flex:1;min-width:0}
.batch-item-title{font-size:12px;font-weight:600;color:#1e293b;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.batch-item-input{width:90px;padding:6px 10px;border:1px solid #cbd5e1;border-radius:7px;font-size:13px;font-weight:700;text-align:right;color:#2e7d32;background:#fff}
.batch-item-input:focus{outline:none;border-color:#2e7d32;box-shadow:0 0 0 2px rgba(46,125,50,.15)}
</style>
</head>
<body>
<div class="layout">
<aside class="sidebar">
    <div class="sidebar-brand">
        <div class="brand-logo">
            <div class="brand-icon">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            </div>
            <div class="brand-text"><h1>Desa Bade</h1><p>Admin Panel</p></div>
        </div>
    </div>
    <nav class="sidebar-nav">
        <div class="nav-section-label">Menu Utama</div>
        <a href="{{ route('admin.dashboard') }}" class="nav-item"><svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>Beranda</a>
                <div class="nav-section-label">Kelola Konten</div>
        <a href="{{ route('admin.beranda') }}" class="nav-item {{ request()->routeIs('admin.beranda') ? 'active' : '' }}">
            <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            <span>Kelola Beranda</span>
        </a>
        <div class="nav-group">
            <div class="nav-group-header" onclick="toggleNav('profil',this)"><div class="nav-group-header-left"><svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg><span>Profil Desa</span></div><svg id="profil-icon" class="nav-group-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg></div>
            <div id="profil" class="nav-submenu"><a href="{{ route('admin.visi-misi') }}" class="nav-subitem">Visi &amp; Misi</a><a href="{{ route('admin.sejarah') }}" class="nav-subitem">Sejarah Desa</a><a href="{{ route('admin.perangkat-desa') }}" class="nav-subitem">Perangkat Desa</a></div>
        </div>
        <div class="nav-group">
            <div class="nav-group-header" onclick="toggleNav('infografis',this)"><div class="nav-group-header-left"><svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg><span>Infografis</span></div><svg id="infografis-icon" class="nav-group-chevron open" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg></div>
            <div id="infografis" class="nav-submenu open">
                <a href="{{ route('admin.infografis.penduduk') }}" class="nav-subitem">Penduduk</a>
                <a href="{{ route('admin.infografis.apbdes') }}" class="nav-subitem">APBDes</a>
                <a href="{{ route('admin.infografis.stunting') }}" class="nav-subitem">Stunting</a>
                <a href="{{ route('admin.infografis.bansos') }}" class="nav-subitem">Bansos</a>
                <a href="{{ route('admin.infografis.idm') }}" class="nav-subitem">IDM</a>
                <a href="{{ route('admin.infografis.sdgs') }}" class="nav-subitem active-sub">SDGs</a>
            </div>
        </div>
        <a href="{{ route('admin.layanan') }}" class="nav-item">
            <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
            <span>Kelola Layanan</span>
        </a>
        <a href="{{ route('admin.berita') }}" class="nav-item">
            <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6m-6 4h6"/></svg>
            <span>Berita Desa</span>
        </a>
        <a href="{{ route('admin.belanja') }}" class="nav-item">
            <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
            <span>Belanja / UMKM</span>
        </a>
        <div class="nav-section-label">Sistem</div>
                <a href="{{ route('admin.pengaturan') }}" class="nav-item {{ Route::is('admin.pengaturan') ? 'active' : '' }}">
            <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            <span>Pengaturan Website</span>
        </a>

        <a href="{{ route('admin.pesan') }}" class="nav-item {{ Route::is('admin.pesan') ? 'active' : '' }}" style="position:relative;">
            <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="3" stroke-width="2"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M22 7l-10 7L2 7"/></svg>
            <span>Kotak Pesan</span>
            @php $unreadPesanCount = \App\Models\Pesan::where('is_read', false)->count(); @endphp
            @if($unreadPesanCount > 0)
            <span style="margin-left:auto;background:#ef4444;color:#fff;font-size:10px;font-weight:700;padding:2px 6px;border-radius:10px;min-width:18px;text-align:center;">{{ $unreadPesanCount > 99 ? '99+' : $unreadPesanCount }}</span>
            @endif
        </a>

<a href="{{ route('home') }}" target="_blank" class="nav-item"><svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>Lihat Website</a>
    </nav>
    <div class="sidebar-footer">
        <div class="admin-profile"><div class="admin-avatar">{{ strtoupper(substr(auth()->user()->name,0,1)) }}</div><div class="admin-info"><p class="admin-name">{{ auth()->user()->name }}</p><p class="admin-role">Administrator</p></div></div>
        <form method="POST" action="{{ route('admin.logout') }}">@csrf<button type="submit" class="btn-logout">
            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
            Keluar
        </button></form>
    </div>
</aside>
<div class="main">
    <header class="topbar">
        <div class="topbar-left"><h2>SDGs Desa Bade</h2><p>Kelola nilai 18 pencapaian SDGs Desa secara otomatis</p></div>
        <div class="breadcrumb"><a href="{{ route('admin.dashboard') }}">Dashboard</a><span>&rsaquo;</span><span>Infografis</span><span>&rsaquo;</span><span style="color:#2e7d32;font-weight:600">SDGs</span></div>
    </header>
    <main class="page-content">
        @if(session('success'))
        <div class="alert-success"><div class="alert-success-icon"><svg width="15" height="15" fill="none" stroke="white" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg></div><p>{{ session('success') }}</p></div>
        @endif

        <div class="stats-banner">
            <div class="stat-card">
                <div class="stat-info">
                    <p class="stat-label">Rata-Rata Skor SDGs Desa</p>
                    <p class="stat-value" style="color:#2e7d32">{{ number_format($avgScore, 2) }}</p>
                </div>
                <div class="stat-icon" style="background:#f0fdf4;color:#2e7d32">
                    <svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-info">
                    <p class="stat-label">Total Indicator SDGs</p>
                    <p class="stat-value">18 Goals</p>
                </div>
                <div class="stat-icon" style="background:#f0fdf4;color:#16a34a">
                    <svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <p class="card-title">18 Goal SDGs Desa Bade</p>
                <button class="btn-primary" onclick="openModal('modal-batch')">
                    <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    Edit Semua Nilai (18 SDGs)
                </button>
            </div>
            <div style="overflow-x:auto">
                <table>
                    <thead><tr><th class="td-no">Goal #</th><th>Goal Badge &amp; Nama SDGs</th><th style="text-align:right">Nilai Capaian</th><th>Visual Progress</th><th>Aksi</th></tr></thead>
                    <tbody>
                        @foreach($masterGoals as $num => $master)
                        @php
                            $item = $list->firstWhere('goal_nomor', $num);
                            $capaian = $item ? $item->capaian : $master['capaian'];
                            $nama = $item ? $item->goal_nama : $master['nama'];
                        @endphp
                        <tr>
                            <td class="td-no" style="font-weight:800;color:#2e7d32">{{ $num }}</td>
                            <td>
                                <div style="display:flex;align-items:center;gap:12px">
                                    <div class="goal-badge" style="background:{{ $master['color'] }}">
                                        {{ $num }}
                                    </div>
                                    <span style="font-weight:700;color:#1e293b">{{ $nama }}</span>
                                </div>
                            </td>
                            <td style="text-align:right;font-weight:800;color:#16a34a;font-size:14px">
                                {{ number_format($capaian, 2) }}%
                            </td>
                            <td>
                                <div class="progress-bar"><div class="progress-fill" style="width:{{ min(100, $capaian) }}%"></div></div>
                            </td>
                            <td>
                                <button class="btn-edit" onclick="openSingleModal({{ $num }},'{{ addslashes($nama) }}',{{ $capaian }})">
                                    Edit Nilai
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
</div>

{{-- Modal Single Edit --}}
<div class="adm-backdrop" id="modal-single">
    <div class="adm-dialog">
        <div class="adm-header">
            <span class="adm-title" id="single-title-display">
                <svg width="18" height="18" fill="none" stroke="#2e7d32" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                Edit Nilai Goal SDGs
            </span>
            <button class="adm-close" onclick="closeModal('modal-single')">&times;</button>
        </div>
        <form method="POST" action="{{ route('admin.infografis.sdgs.store') }}">@csrf
            <input type="hidden" name="tahun" value="{{ date('Y') }}">
            <input type="hidden" name="goal_nomor" id="single-goal-nomor">
            <div class="adm-body">
                <div class="form-group">
                    <label class="form-label">Nama Goal SDGs</label>
                    <input type="text" id="single-goal-nama" name="goal_nama" class="form-input" readonly style="background:#f8fafc;font-weight:600">
                </div>
                <div class="form-group">
                    <label class="form-label">Nilai Capaian (0 - 100 %) <span class="req">*</span></label>
                    <input type="number" step="0.01" id="single-capaian" name="capaian" class="form-input" min="0" max="100" placeholder="0.00" required style="font-size:16px;font-weight:700;color:#2e7d32">
                </div>
            </div>
            <div class="adm-footer"><button type="button" class="btn-muted" onclick="closeModal('modal-single')">Batal</button><button type="submit" class="btn-submit">Simpan Nilai</button></div>
        </form>
    </div>
</div>

{{-- Modal Batch Edit --}}
<div class="adm-backdrop" id="modal-batch">
    <div class="adm-dialog adm-dialog-lg">
        <div class="adm-header">
            <span class="adm-title">
                <svg width="18" height="18" fill="none" stroke="#2e7d32" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                Edit Nilai 18 SDGs Desa sekaligus
            </span>
            <button class="adm-close" onclick="closeModal('modal-batch')">&times;</button>
        </div>
        <form method="POST" action="{{ route('admin.infografis.sdgs.batch') }}">@csrf
            <input type="hidden" name="tahun" value="{{ date('Y') }}">
            <div class="adm-body">
                <div class="batch-grid">
                    @foreach($masterGoals as $num => $master)
                    @php
                        $item = $list->firstWhere('goal_nomor', $num);
                        $capaian = $item ? $item->capaian : $master['capaian'];
                    @endphp
                    <div class="batch-item">
                        <div class="batch-item-info">
                            <div class="goal-badge" style="background:{{ $master['color'] }};width:28px;height:28px;font-size:11px">
                                {{ $num }}
                            </div>
                            <div class="batch-item-title" title="{{ $master['nama'] }}">{{ $master['nama'] }}</div>
                        </div>
                        <input type="number" step="0.01" name="capaian[{{ $num }}]" class="batch-item-input" min="0" max="100" value="{{ number_format($capaian, 2, '.', '') }}" required>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="adm-footer"><button type="button" class="btn-muted" onclick="closeModal('modal-batch')">Batal</button><button type="submit" class="btn-submit">Simpan Semua (18 Goals)</button></div>
        </form>
    </div>
</div>

<script>
function toggleNav(id){document.getElementById(id).classList.toggle('open');document.getElementById(id+'-icon').classList.toggle('open')}
function openModal(id){document.getElementById(id).classList.add('open')}
function closeModal(id){document.getElementById(id).classList.remove('open')}
document.querySelectorAll('.adm-backdrop').forEach(el=>el.addEventListener('click',e=>{if(e.target===el)closeModal(el.id)}));

function openSingleModal(num, nama, val){
    document.getElementById('single-goal-nomor').value = num;
    document.getElementById('single-goal-nama').value = `Goal ${num}: ${nama}`;
    document.getElementById('single-capaian').value = parseFloat(val).toFixed(2);
    openModal('modal-single');
}
</script></body></html>
