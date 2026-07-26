<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Kelola Berita Desa - Admin Desa Bade</title>
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
.nav-item:hover,.nav-item.active{background:#f1f5f9;color:#1e293b}
.nav-item.active{background:#f0fdf4;color:#2e7d32;font-weight:600}
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
.stats-banner{display:grid;grid-template-columns:repeat(4,1fr);gap:16px;margin-bottom:24px}
.stat-card{background:#fff;border:1px solid #e2e8f0;border-radius:16px;padding:18px 20px;display:flex;align-items:center;justify-content:space-between}
.stat-info p{margin:0}
.stat-label{font-size:11px;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.8px}
.stat-value{font-size:26px;font-weight:800;color:#1e293b;margin-top:2px!important}
.stat-icon{width:46px;height:46px;border-radius:12px;display:flex;align-items:center;justify-content:center}
.card{background:#fff;border:1px solid #e2e8f0;border-radius:16px;margin-bottom:24px}
.card-header{padding:20px 24px;border-bottom:1px solid #f1f5f9;display:flex;align-items:center;justify-content:space-between;gap:16px;flex-wrap:wrap}
.card-title{font-size:16px;font-weight:700;color:#1e293b;margin:0;display:flex;align-items:center;gap:8px}
.toolbar{display:flex;align-items:center;gap:12px;flex-wrap:wrap}
.search-box{position:relative;width:260px}
.search-box input{width:100%;padding:8px 12px 8px 36px;border:1px solid #e2e8f0;border-radius:9px;font-size:13px;font-family:inherit}
.search-box input:focus{outline:none;border-color:#2e7d32;box-shadow:0 0 0 3px rgba(46,125,50,.1)}
.search-box svg{position:absolute;left:11px;top:50%;transform:translateY(-50%);color:#94a3b8;width:16px;height:16px}
.btn-primary{display:inline-flex;align-items:center;gap:8px;padding:9px 18px;background:linear-gradient(135deg,#2e7d32,#1b5e20);color:white;border-radius:10px;font-size:13px;font-weight:600;border:none;cursor:pointer;font-family:inherit;box-shadow:0 3px 10px rgba(46,125,50,.3);text-decoration:none}
.btn-primary:hover{transform:translateY(-1px);box-shadow:0 5px 16px rgba(46,125,50,.4)}
table{width:100%;border-collapse:collapse}
thead tr{background:#f8fafc;border-bottom:1px solid #e2e8f0}
th{padding:12px 16px;font-size:11px;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:.8px;white-space:nowrap}
tbody tr{border-bottom:1px solid #f1f5f9;transition:background .15s}
tbody tr:last-child{border-bottom:none}
tbody tr:hover{background:#fafbff}
td{padding:12px 16px;font-size:13px;color:#334155;vertical-align:middle}
.td-no{width:44px;color:#94a3b8;font-weight:600;text-align:center}
.news-thumb{width:60px;height:44px;border-radius:8px;object-fit:cover;background:#f1f5f9;border:1px solid #e2e8f0;flex-shrink:0;display:flex;align-items:center;justify-content:center;color:#94a3b8}
.badge{display:inline-flex;align-items:center;gap:5px;padding:4px 10px;border-radius:20px;font-size:12px;font-weight:600;cursor:pointer;border:none;font-family:inherit}
.badge-pub{background:#f0fdf4;color:#16a34a;border:1px solid #86efac}
.badge-pub:hover{background:#dcfce7}
.badge-draft{background:#fffbeb;color:#d97706;border:1px solid #fde68a}
.badge-draft:hover{background:#fef3c7}
.btn-action{padding:5px 11px;border-radius:7px;font-size:12px;font-weight:600;cursor:pointer;font-family:inherit;text-decoration:none;display:inline-flex;align-items:center;gap:4px;transition:all .15s}
.btn-edit{color:#2e7d32;background:#f0fdf4;border:1px solid #bbf7d0}
.btn-edit:hover{background:#dcfce7}
.btn-del{color:#ef4444;background:#fef2f2;border:1px solid #fecaca}
.btn-del:hover{background:#fee2e2}
.btn-view{color:#475569;background:#f8fafc;border:1px solid #e2e8f0}
.btn-view:hover{background:#f1f5f9}
.empty-row td{padding:40px;text-align:center;color:#94a3b8;font-size:13px}

/* Custom modal classes */
.adm-backdrop{position:fixed;inset:0;background:rgba(15,23,42,.45);backdrop-filter:blur(4px);z-index:9999;display:none;align-items:center;justify-content:center;opacity:0;transition:opacity .2s}
.adm-backdrop.open{display:flex;opacity:1}
.adm-dialog{background:#fff;border-radius:18px;width:680px;max-width:95vw;box-shadow:0 24px 60px rgba(0,0,0,.18);transform:translateY(16px) scale(.97);transition:all .25s}
.adm-backdrop.open .adm-dialog{transform:translateY(0) scale(1)}
.adm-header{padding:22px 24px 0;display:flex;align-items:center;justify-content:space-between}
.adm-title{font-size:17px;font-weight:700;color:#1e293b;display:flex;align-items:center;gap:8px}
.adm-close{width:32px;height:32px;border-radius:8px;border:1px solid #e2e8f0;background:#f8fafc;color:#64748b;display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:16px}
.adm-body{padding:20px 24px;max-height:78vh;overflow-y:auto}
.adm-footer{padding:0 24px 22px;display:flex;gap:10px;justify-content:flex-end}
.form-group{margin-bottom:16px}
.form-row{display:grid;grid-template-columns:1fr 1fr;gap:14px}
.form-label{display:block;font-size:12px;font-weight:600;color:#374151;margin-bottom:6px}
.form-label .req{color:#ef4444;margin-left:2px}
.form-input,.form-textarea{width:100%;padding:9px 13px;border:1px solid #e2e8f0;border-radius:9px;font-size:13px;font-family:inherit;color:#1e293b;background:#fff;transition:all .2s}
.form-input:focus,.form-textarea:focus{outline:none;border-color:#2e7d32;box-shadow:0 0 0 3px rgba(46,125,50,.1)}
.form-textarea{resize:vertical;min-height:90px}
.btn-submit{padding:10px 22px;background:linear-gradient(135deg,#2e7d32,#1b5e20);color:white;border-radius:9px;font-size:13px;font-weight:600;border:none;cursor:pointer;font-family:inherit}
.btn-muted{padding:10px 18px;background:#f8fafc;color:#64748b;border-radius:9px;font-size:13px;font-weight:600;border:1px solid #e2e8f0;cursor:pointer;font-family:inherit}
.editor-toolbar{display:flex;align-items:center;gap:4px;padding:6px;background:#f8fafc;border:1px solid #e2e8f0;border-bottom:none;border-radius:9px 9px 0 0}
.editor-btn{padding:5px 9px;background:#fff;border:1px solid #cbd5e1;border-radius:6px;font-size:12px;font-weight:600;color:#475569;cursor:pointer;font-family:inherit}
.editor-btn:hover{background:#f1f5f9;color:#1e293b}
.confirm-icon{width:52px;height:52px;background:#fef2f2;border-radius:14px;display:flex;align-items:center;justify-content:center;margin:0 auto 14px;font-size:24px;color:#ef4444}
.confirm-text{text-align:center}
.confirm-text h3{font-size:16px;font-weight:700;color:#1e293b;margin:0 0 6px}
.confirm-text p{font-size:13px;color:#64748b;margin:0}
.btn-danger{padding:10px 22px;background:#ef4444;color:white;border-radius:9px;font-size:13px;font-weight:600;border:none;cursor:pointer;font-family:inherit}
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
            <div class="nav-group-header" onclick="toggleNav('infografis',this)"><div class="nav-group-header-left"><svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg><span>Infografis</span></div><svg id="infografis-icon" class="nav-group-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg></div>
            <div id="infografis" class="nav-submenu">
                <a href="{{ route('admin.infografis.penduduk') }}" class="nav-subitem">Penduduk</a>
                <a href="{{ route('admin.infografis.apbdes') }}" class="nav-subitem">APBDes</a>
                <a href="{{ route('admin.infografis.stunting') }}" class="nav-subitem">Stunting</a>
                <a href="{{ route('admin.infografis.bansos') }}" class="nav-subitem">Bansos</a>
                <a href="{{ route('admin.infografis.idm') }}" class="nav-subitem">IDM</a>
                <a href="{{ route('admin.infografis.sdgs') }}" class="nav-subitem">SDGs</a>
            </div>
        </div>
        <a href="{{ route('admin.berita') }}" class="nav-item active">
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
        <div class="topbar-left"><h2>Berita &amp; Informasi Desa</h2><p>Kelola artikel, berita kegiatan, dan pengumuman Desa Bade</p></div>
        <div class="breadcrumb"><a href="{{ route('admin.dashboard') }}">Dashboard</a><span>&rsaquo;</span><span style="color:#2e7d32;font-weight:600">Berita</span></div>
    </header>
    <main class="page-content">
        @if(session('success'))
        <div class="alert-success"><div class="alert-success-icon"><svg width="15" height="15" fill="none" stroke="white" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg></div><p>{{ session('success') }}</p></div>
        @endif

        {{-- Alert Error --}}
        @if($errors->any())
        <div class="alert-error" style="display:flex;background:#fef2f2;border:1px solid #fecaca;padding:12px 16px;border-radius:12px;color:#991b1b;gap:12px;margin-bottom:20px;align-items:flex-start;">
            <svg width="20" height="20" fill="none" stroke="#ef4444" viewBox="0 0 24 24" style="flex-shrink:0;margin-top:1px">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>
            <div>
                @foreach($errors->all() as $err)
                    <p style="margin:0;font-size:13px;font-weight:600;color:#991b1b;">{{ $err }}</p>
                @endforeach
            </div>
        </div>
        @endif

        <div class="stats-banner">
            <div class="stat-card">
                <div class="stat-info"><p class="stat-label">Total Berita</p><p class="stat-value">{{ number_format($totalNews) }}</p></div>
                <div class="stat-icon" style="background:#f0fdf4;color:#2e7d32">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6m-6 4h6"/></svg>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-info"><p class="stat-label">Diterbitkan</p><p class="stat-value" style="color:#16a34a">{{ number_format($publishedCount) }}</p></div>
                <div class="stat-icon" style="background:#f0fdf4;color:#16a34a">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-info"><p class="stat-label">Draf / Nonaktif</p><p class="stat-value" style="color:#d97706">{{ number_format($draftCount) }}</p></div>
                <div class="stat-icon" style="background:#fffbeb;color:#d97706">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <p class="card-title">Daftar Berita Desa Bade</p>
                <div class="toolbar">
                    <form method="GET" action="{{ route('admin.berita') }}" style="display:flex;gap:8px">
                        <div class="search-box">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            <input type="text" name="search" placeholder="Cari berita..." value="{{ request('search') }}">
                        </div>
                    </form>
                    <button class="btn-primary" onclick="openModal('modal-add')">
                        <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                        Tambah Berita Baru
                    </button>
                </div>
            </div>
            <div style="overflow-x:auto">
                <table>
                    <thead><tr><th class="td-no">No</th><th>Sampul</th><th>Judul &amp; Ringkasan</th><th>Penulis</th><th>Publikasi</th><th>Status</th><th>Aksi</th></tr></thead>
                    <tbody>
                        @forelse($newsList as $i => $item)
                        <tr>
                            <td class="td-no">{{ $i+1 }}</td>
                            <td>
                                @if($item->image)
                                <img src="{{ asset('storage/'.$item->image) }}" alt="Sampul" class="news-thumb" onerror="this.onerror=null; this.outerHTML='<div class=\'news-thumb\'><svg width=\'20\' height=\'20\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z\'/></svg></div>';">
                                @else
                                <div class="news-thumb">
                                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                                @endif
                            </td>
                            <td style="max-width:320px">
                                <div style="font-weight:700;color:#1e293b;margin-bottom:3px;line-height:1.3">{{ $item->title }}</div>
                                <div style="font-size:12px;color:#64748b;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;max-width:300px">{{ $item->summary }}</div>
                            </td>
                            <td style="font-weight:600;color:#475569;white-space:nowrap">{{ $item->author }}</td>
                            <td style="color:#64748b;font-size:12px;white-space:nowrap">
                                <div>{{ $item->formatted_date }}</div>
                                <div style="font-size:11px;color:#94a3b8">{{ $item->formatted_time }} WIB</div>
                            </td>

                            <td>
                                <form method="POST" action="{{ route('admin.berita.toggle', $item->id) }}" style="display:inline">
                                    @csrf @method('PATCH')
                                    @if($item->is_published)
                                    <button type="submit" class="badge badge-pub" title="Klik untuk jadikan draf">
                                        <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        Terbit
                                    </button>
                                    @else
                                    <button type="submit" class="badge badge-draft" title="Klik untuk terbitkan">
                                        <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        Draf
                                    </button>
                                    @endif
                                </form>
                            </td>
                            <td style="white-space:nowrap">
                                <a href="{{ route('berita.show', $item->slug) }}" target="_blank" class="btn-action btn-view" title="Pratinjau di Website">Lihat</a>
                                <button type="button" class="btn-action btn-edit" onclick="openEditModal({{ $item->id }})">Edit</button>
                                <button type="button" class="btn-action btn-del" onclick="openDeleteModal({{ $item->id }},'{{ addslashes($item->title) }}')">Hapus</button>
                            </td>
                        </tr>
                        @empty
                        <tr class="empty-row"><td colspan="8">Belum ada berita. Klik <strong>Tambah Berita Baru</strong> untuk membuat artikel.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
</div>

{{-- Modal Tambah Berita --}}
<div class="adm-backdrop" id="modal-add">
    <div class="adm-dialog">
        <div class="adm-header">
            <span class="adm-title">
                <svg width="18" height="18" fill="none" stroke="#2e7d32" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                Tambah Berita Baru
            </span>
            <button class="adm-close" onclick="closeModal('modal-add')">&times;</button>
        </div>
        <form method="POST" action="{{ route('admin.berita.store') }}" enctype="multipart/form-data">@csrf
            <div class="adm-body">
                <div class="form-group">
                    <label class="form-label">Judul Berita <span class="req">*</span></label>
                    <input type="text" name="title" class="form-input" placeholder="cth: Musrenbangdes Desa Bade Tahun 2026" required maxlength="255">
                </div>
                <div class="form-group">
                    <label class="form-label">Ringkasan Berita (Singkat)</label>
                    <textarea name="summary" class="form-textarea" style="min-height:60px" placeholder="Ringkasan singkat yang tampil di kartu berita (opsional)"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Isi / Konten Lengkap Berita <span class="req">*</span></label>
                    <div class="editor-toolbar">
                        <button type="button" class="editor-btn" onclick="addTag('add-content','\n<p>','</p>')">Paragraf</button>
                        <button type="button" class="editor-btn" onclick="addTag('add-content','<strong>','è‡ªç”±')"><strong>B</strong></button>
                        <button type="button" class="editor-btn" onclick="addTag('add-content','<em>','</em>')"><em>I</em></button>
                        <button type="button" class="editor-btn" onclick="addTag('add-content','\n<h3>','</h3>')">Judul Sub (H3)</button>
                        <button type="button" class="editor-btn" onclick="addTag('add-content','\n<ul>\n  <li>','</li>\n</ul>')">Bullet List</button>
                        <button type="button" class="editor-btn" onclick="addTag('add-content','\n<blockquote>','</blockquote>')">Kutipan</button>
                    </div>
                    <textarea id="add-content" name="content" class="form-textarea" style="min-height:160px;border-radius:0 0 9px 9px" placeholder="Tuliskan isi berita secara mendalam..." required></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Gambar Berita (Bisa Pilih Banyak Foto)</label>
                        <input type="file" name="images[]" class="form-input" accept="image/*" multiple onchange="previewFiles(this, 'preview-add-berita')">
                        <small style="color:#6b7280;font-size:11px;margin-top:4px;display:block">Tahan Ctrl/Shift untuk memilih beberapa foto sekaligus</small>
                        <div id="preview-add-berita" style="display:flex;flex-wrap:wrap;gap:8px;margin-top:8px"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Penulis (Author)</label>
                        <input type="text" name="author" class="form-input" value="Admin Desa Bade" placeholder="Nama Penulis">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="margin-bottom:0">
                        <label class="form-label">Tanggal Publikasi</label>
                        <input type="datetime-local" name="published_at" class="form-input" value="{{ date('Y-m-d\TH:i') }}">
                    </div>
                    <div class="form-group" style="margin-bottom:0;display:flex;align-items:center;padding-top:20px">
                        <label style="display:flex;align-items:center;gap:8px;font-size:13px;font-weight:600;color:#374151;cursor:pointer">
                            <input type="checkbox" name="is_published" value="1" checked style="width:16px;height:16px;accent-color:#2e7d32">
                            Langsung Terbitkan Artikel
                        </label>
                    </div>
                </div>
            </div>
            <div class="adm-footer"><button type="button" class="btn-muted" onclick="closeModal('modal-add')">Batal</button><button type="submit" class="btn-submit">Simpan &amp; Terbitkan</button></div>
        </form>
    </div>
</div>

{{-- Modal Edit Berita --}}
<div class="adm-backdrop" id="modal-edit">
    <div class="adm-dialog">
        <div class="adm-header">
            <span class="adm-title">
                <svg width="18" height="18" fill="none" stroke="#2e7d32" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                Edit Berita
            </span>
            <button class="adm-close" onclick="closeModal('modal-edit')">&times;</button>
        </div>
        <form method="POST" id="form-edit" action="" enctype="multipart/form-data">@csrf @method('PUT')
            <div class="adm-body">
                <div class="form-group">
                    <label class="form-label">Judul Berita <span class="req">*</span></label>
                    <input type="text" id="edit-title" name="title" class="form-input" required maxlength="255">
                </div>
                <div class="form-group">
                    <label class="form-label">Ringkasan Berita</label>
                    <textarea id="edit-summary" name="summary" class="form-textarea" style="min-height:60px"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Isi / Konten Lengkap Berita <span class="req">*</span></label>
                    <div class="editor-toolbar">
                        <button type="button" class="editor-btn" onclick="addTag('edit-content','\n<p>','</p>')">Paragraf</button>
                        <button type="button" class="editor-btn" onclick="addTag('edit-content','<strong>','</strong>')"><strong>B</strong></button>
                        <button type="button" class="editor-btn" onclick="addTag('edit-content','<em>','</em>')"><em>I</em></button>
                        <button type="button" class="editor-btn" onclick="addTag('edit-content','\n<h3>','</h3>')">Judul Sub (H3)</button>
                        <button type="button" class="editor-btn" onclick="addTag('edit-content','\n<ul>\n  <li>','</li>\n</ul>')">Bullet List</button>
                    </div>
                    <textarea id="edit-content" name="content" class="form-textarea" style="min-height:160px;border-radius:0 0 9px 9px" required></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Foto Berita Saat Ini</label>
                    <div id="existing-images-edit-berita" style="display:flex;flex-wrap:wrap;gap:8px;margin-bottom:8px"></div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Tambah Foto Galeri (Bisa Pilih Banyak)</label>
                        <input type="file" name="images[]" class="form-input" accept="image/*" multiple onchange="previewFiles(this, 'preview-edit-berita')">
                        <small style="color:#6b7280;font-size:11px;margin-top:4px;display:block">Foto baru akan ditambahkan ke galeri berita</small>
                        <div id="preview-edit-berita" style="display:flex;flex-wrap:wrap;gap:8px;margin-top:8px"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Penulis</label>
                        <input type="text" id="edit-author" name="author" class="form-input">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="margin-bottom:0">
                        <label class="form-label">Tanggal Publikasi</label>
                        <input type="datetime-local" id="edit-published-at" name="published_at" class="form-input">
                    </div>
                    <div class="form-group" style="margin-bottom:0;display:flex;align-items:center;padding-top:20px">
                        <label style="display:flex;align-items:center;gap:8px;font-size:13px;font-weight:600;color:#374151;cursor:pointer">
                            <input type="checkbox" id="edit-is-published" name="is_published" value="1" style="width:16px;height:16px;accent-color:#2e7d32">
                            Status Terbit (Published)
                        </label>
                    </div>
                </div>
            </div>
            <div class="adm-footer"><button type="button" class="btn-muted" onclick="closeModal('modal-edit')">Batal</button><button type="submit" class="btn-submit">Simpan Perubahan</button></div>
        </form>
    </div>
</div>

{{-- Modal Delete --}}
<div class="adm-backdrop" id="modal-delete">
    <div class="adm-dialog" style="width:440px">
        <div class="adm-body" style="padding-top:28px">
            <div class="confirm-icon">
                <svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
            </div>
            <div class="confirm-text"><h3>Hapus Artikel Berita?</h3><p>Berita <strong id="delete-name"></strong> akan dihapus secara permanen.</p></div>
        </div>
        <form method="POST" id="form-delete" action="">@csrf @method('DELETE')
            <div class="adm-footer" style="justify-content:center;padding-top:0"><button type="button" class="btn-muted" onclick="closeModal('modal-delete')">Batal</button><button type="submit" class="btn-danger">Ya, Hapus Artikel</button></div>
        </form>
    </div>
</div>

<script>
function toggleNav(id){document.getElementById(id).classList.toggle('open');document.getElementById(id+'-icon').classList.toggle('open')}
function openModal(id){document.getElementById(id).classList.add('open')}
function closeModal(id){document.getElementById(id).classList.remove('open')}
document.querySelectorAll('.adm-backdrop').forEach(el=>el.addEventListener('click',e=>{if(e.target===el)closeModal(el.id)}));

const beritaData = @json($newsList->keyBy('id'));

function previewFiles(input, containerId) {
    const container = document.getElementById(containerId);
    container.innerHTML = '';
    if (input.files && input.files.length > 0) {
        Array.from(input.files).forEach(file => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const wrapper = document.createElement('div');
                wrapper.style.position = 'relative';
                wrapper.style.display = 'inline-block';

                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.width = '64px';
                img.style.height = '64px';
                img.style.objectFit = 'cover';
                img.style.borderRadius = '8px';
                img.style.border = '2px solid #2e7d32';
                img.title = file.name;

                const btn = document.createElement('button');
                btn.type = 'button';
                btn.innerHTML = '&times;';
                btn.title = 'Batal upload foto ini';
                btn.style.position = 'absolute';
                btn.style.top = '-6px';
                btn.style.right = '-6px';
                btn.style.background = '#ef4444';
                btn.style.color = '#ffffff';
                btn.style.border = '2px solid #ffffff';
                btn.style.borderRadius = '50%';
                btn.style.width = '20px';
                btn.style.height = '20px';
                btn.style.fontSize = '14px';
                btn.style.fontWeight = 'bold';
                btn.style.lineHeight = '1';
                btn.style.cursor = 'pointer';
                btn.style.display = 'flex';
                btn.style.alignItems = 'center';
                btn.style.justifyContent = 'center';
                btn.style.boxShadow = '0 2px 4px rgba(0,0,0,0.2)';

                btn.onclick = function() {
                    wrapper.remove();
                };

                wrapper.appendChild(img);
                wrapper.appendChild(btn);
                container.appendChild(wrapper);
            };
            reader.readAsDataURL(file);
        });
    }
}

function openEditModal(id){
    const item = beritaData[id];
    if (!item) return;
    document.getElementById('form-edit').action = '/admin/berita/' + id;
    document.getElementById('edit-title').value = item.title || '';
    document.getElementById('edit-summary').value = item.summary || '';
    document.getElementById('edit-content').value = item.content || '';
    document.getElementById('edit-author').value = item.author || 'Admin Desa Bade';
    document.getElementById('edit-is-published').checked = !!item.is_published;
    if (item.published_at) {
        let dt = new Date(item.published_at);
        let isoStr = new Date(dt.getTime() - (dt.getTimezoneOffset() * 60000)).toISOString().slice(0, 16);
        document.getElementById('edit-published-at').value = isoStr;
    }

    // Clean any previous hidden delete_images inputs
    document.querySelectorAll('#form-edit input[name="delete_images[]"]').forEach(el => el.remove());

    const existingContainer = document.getElementById('existing-images-edit-berita');
    if (existingContainer) {
        existingContainer.innerHTML = '';
        let imgs = item.images && item.images.length ? item.images : (item.image ? [item.image] : []);
        if (imgs.length > 0) {
            imgs.forEach(imgPath => {
                const wrapper = document.createElement('div');
                wrapper.style.position = 'relative';
                wrapper.style.display = 'inline-block';

                const src = imgPath.startsWith('http') ? imgPath : '/storage/' + imgPath;
                const img = document.createElement('img');
                img.src = src;
                img.style.width = '64px';
                img.style.height = '64px';
                img.style.objectFit = 'cover';
                img.style.borderRadius = '8px';
                img.style.border = '1px solid #d1d5db';
                img.title = 'Foto Tersimpan';

                const btn = document.createElement('button');
                btn.type = 'button';
                btn.innerHTML = '&times;';
                btn.title = 'Hapus foto ini';
                btn.style.position = 'absolute';
                btn.style.top = '-6px';
                btn.style.right = '-6px';
                btn.style.background = '#ef4444';
                btn.style.color = '#ffffff';
                btn.style.border = '2px solid #ffffff';
                btn.style.borderRadius = '50%';
                btn.style.width = '20px';
                btn.style.height = '20px';
                btn.style.fontSize = '14px';
                btn.style.fontWeight = 'bold';
                btn.style.lineHeight = '1';
                btn.style.cursor = 'pointer';
                btn.style.display = 'flex';
                btn.style.alignItems = 'center';
                btn.style.justifyContent = 'center';
                btn.style.boxShadow = '0 2px 4px rgba(0,0,0,0.2)';

                btn.onclick = function() {
                    const hidden = document.createElement('input');
                    hidden.type = 'hidden';
                    hidden.name = 'delete_images[]';
                    hidden.value = imgPath;
                    document.getElementById('form-edit').appendChild(hidden);
                    wrapper.remove();
                };

                wrapper.appendChild(img);
                wrapper.appendChild(btn);
                existingContainer.appendChild(wrapper);
            });
        } else {
            existingContainer.innerHTML = '<span style="font-size:12px;color:#9ca3af">Belum ada foto</span>';
        }
    }
    const editPreview = document.getElementById('preview-edit-berita');
    if (editPreview) editPreview.innerHTML = '';

    openModal('modal-edit');
}

function openDeleteModal(id, title){
    document.getElementById('form-delete').action = `/admin/berita/${id}`;
    document.getElementById('delete-name').textContent = title;
    openModal('modal-delete');
}

function addTag(textareaId, openTag, closeTag){
    let txt = document.getElementById(textareaId);
    let start = txt.selectionStart;
    let end = txt.selectionEnd;
    let sel = txt.value.substring(start, end);
    let replacement = openTag + (sel || 'Teks') + closeTag;
    txt.value = txt.value.substring(0, start) + replacement + txt.value.substring(end);
    txt.focus();
}
</script></body></html>
