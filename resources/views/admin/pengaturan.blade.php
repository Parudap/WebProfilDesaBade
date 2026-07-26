<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Website - Admin Desa Bade</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>h1, h2, h3, h4, h5, h6 { font-family: 'Cinzel', serif; } 
        * { box-sizing: border-box; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: #f4f6fb; color: #1e293b; margin: 0; padding: 0; }
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }

        .layout { display: flex; height: 100vh; overflow: hidden; }

        /* SIDEBAR */
        .sidebar { width: 260px; min-width: 260px; background: #fff; border-right: 1px solid #e2e8f0; display: flex; flex-direction: column; position: relative; overflow: hidden; }
        .sidebar::before { content: ''; position: absolute; top: -80px; left: -80px; width: 240px; height: 240px; background: radial-gradient(circle, rgba(46,125,50,0.07) 0%, transparent 70%); pointer-events: none; }
        .sidebar-brand { padding: 28px 24px 20px; border-bottom: 1px solid #e2e8f0; }
        .brand-logo { display: flex; align-items: center; gap: 12px; }
        .brand-icon { width: 40px; height: 40px; background: linear-gradient(135deg, #2e7d32, #1b5e20); border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 18px; flex-shrink: 0; box-shadow: 0 4px 14px rgba(46,125,50,0.3); color: white; }
        .brand-text h1 { font-size: 16px; font-weight: 700; color: #1e293b; margin: 0; letter-spacing: -0.3px; }
        .brand-text p { font-size: 11px; color: #2e7d32; font-weight: 600; margin: 2px 0 0; text-transform: uppercase; letter-spacing: 1px; }
        .sidebar-nav { flex: 1; padding: 16px 12px; overflow-y: auto; }
        .nav-section-label { font-size: 10px; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 1.2px; padding: 0 12px; margin: 16px 0 8px; }
        .nav-item { display: flex; align-items: center; gap: 10px; padding: 10px 14px; border-radius: 10px; font-size: 14px; font-weight: 500; color: #64748b; cursor: pointer; transition: all 0.2s; text-decoration: none; position: relative; margin-bottom: 2px; }
        .nav-item:hover { background: #f1f5f9; color: #1e293b; }
        .nav-item.active { background: linear-gradient(135deg, rgba(46,125,50,0.1), rgba(27,94,32,0.06)); color: #2e7d32; font-weight: 600; }
        .nav-item.active::before { content: ''; position: absolute; left: 0; top: 50%; transform: translateY(-50%); width: 3px; height: 20px; background: linear-gradient(to bottom, #2e7d32, #1b5e20); border-radius: 0 3px 3px 0; }
        .nav-icon { width: 18px; height: 18px; flex-shrink: 0; opacity: 0.7; }
        .nav-item.active .nav-icon { opacity: 1; }
        .nav-group-header { display: flex; align-items: center; justify-content: space-between; padding: 10px 14px; border-radius: 10px; font-size: 14px; font-weight: 500; color: #64748b; cursor: pointer; transition: all 0.2s; margin-bottom: 2px; }
        .nav-group-header:hover { background: #f1f5f9; color: #1e293b; }
        .nav-group-header-left { display: flex; align-items: center; gap: 10px; }
        .nav-group-chevron { width: 14px; height: 14px; transition: transform 0.3s; color: #94a3b8; flex-shrink: 0; }
        .nav-group-chevron.open { transform: rotate(180deg); }
        .nav-submenu { max-height: 0; overflow: hidden; transition: max-height 0.3s ease; padding-left: 14px; }
        .nav-submenu.open { max-height: 300px; }
        .nav-subitem { display: flex; align-items: center; gap: 8px; padding: 8px 14px; border-radius: 8px; font-size: 13px; font-weight: 500; color: #94a3b8; cursor: pointer; transition: all 0.2s; text-decoration: none; margin-bottom: 1px; }
        .nav-subitem::before { content: ''; width: 4px; height: 4px; background: #cbd5e1; border-radius: 50%; flex-shrink: 0; }
        .nav-subitem:hover { color: #475569; background: #f1f5f9; }
        .nav-subitem.active-sub { color: #2e7d32; font-weight: 600; }
        .nav-subitem.active-sub::before { background: #2e7d32; }
        .sidebar-footer { padding: 16px 12px; border-top: 1px solid #e2e8f0; }
        .admin-profile { display: flex; align-items: center; gap: 10px; padding: 10px 12px; border-radius: 10px; background: #f8fafc; margin-bottom: 10px; border: 1px solid #e2e8f0; }
        .admin-avatar { width: 36px; height: 36px; background: linear-gradient(135deg, #2e7d32, #1b5e20); border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 13px; font-weight: 700; color: white; flex-shrink: 0; }
        .admin-info { flex: 1; min-width: 0; }
        .admin-name { font-size: 13px; font-weight: 600; color: #1e293b; margin: 0; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .admin-role { font-size: 11px; color: #64748b; margin: 2px 0 0; }
        .btn-logout { width: 100%; display: flex; align-items: center; justify-content: center; gap: 8px; padding: 9px; border-radius: 8px; background: #fff; border: 1px solid #f1f5f9; font-size: 12px; font-weight: 600; color: #ef4444; cursor: pointer; transition: all 0.2s; }
        .btn-logout:hover { background: #fef2f2; border-color: #fee2e2; }

        /* MAIN */
        .main { flex: 1; display: flex; flex-direction: column; overflow: hidden; }
        .topbar { height: 70px; min-height: 70px; background: #fff; border-bottom: 1px solid #e2e8f0; padding: 0 32px; display: flex; align-items: center; justify-content: space-between; }
        .topbar-left h2 { font-size: 18px; font-weight: 700; color: #1e293b; margin: 0; }
        .topbar-left p { font-size: 12px; color: #64748b; margin: 4px 0 0; }
        .breadcrumb { display: flex; align-items: center; gap: 6px; font-size: 12px; color: #94a3b8; }
        .breadcrumb a { color: #64748b; text-decoration: none; font-weight: 500; }
        .breadcrumb a:hover { color: #2e7d32; }
        .page-content { flex: 1; padding: 32px; overflow-y: auto; }

        /* TAB NAVIGATION */
        .tab-nav { display: flex; border-bottom: 1px solid #e2e8f0; margin-bottom: 24px; gap: 8px; }
        .tab-btn { padding: 12px 18px; font-size: 14px; font-weight: 600; color: #64748b; background: none; border: none; border-bottom: 2px solid transparent; cursor: pointer; transition: all 0.2s; }
        .tab-btn:hover { color: #1e293b; }
        .tab-btn.active { color: #2e7d32; border-bottom-color: #2e7d32; }
        .tab-content { display: none; }
        .tab-content.active { display: block; }

        /* CARDS */
        .card { background: #fff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02); }
        .card-title { font-size: 15px; font-weight: 700; color: #1e293b; margin: 0 0 4px; }
        .card-subtitle { font-size: 12px; color: #64748b; margin: 0 0 20px; }

        /* FORM */
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .form-group { display: flex; flex-direction: column; gap: 6px; margin-bottom: 16px; }
        .form-group.full-width { grid-column: span 2; }
        .form-label { font-size: 13px; font-weight: 600; color: #475569; }
        .form-label span { color: #ef4444; }
        .form-input { padding: 10px 14px; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 13.5px; color: #1e293b; outline: none; transition: all 0.2s; font-family: inherit; }
        .form-input:focus { border-color: #2e7d32; box-shadow: 0 0 0 3px rgba(46,125,50,0.12); }
        .form-hint { font-size: 11px; color: #64748b; margin-top: 4px; }

        /* LOGO PREVIEW */
        .logo-upload-wrapper { display: flex; align-items: center; gap: 24px; margin-bottom: 16px; }
        .logo-preview-box { width: 100px; height: 100px; border-radius: 12px; border: 1px solid #e2e8f0; display: flex; align-items: center; justify-content: center; background: #f8fafc; overflow: hidden; flex-shrink: 0; padding: 8px; }
        .logo-preview-box img { max-width: 100%; max-height: 100%; object-fit: contain; }
        .logo-upload-btn-wrapper { position: relative; }
        .logo-file-input { display: none; }
        .btn-upload-trigger { padding: 10px 16px; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 13px; font-weight: 600; color: #475569; background: #fff; cursor: pointer; transition: all 0.2s; display: inline-flex; align-items: center; gap: 8px; }
        .btn-upload-trigger:hover { background: #f8fafc; border-color: #94a3b8; }

        /* BUTTONS */
        .form-actions { display: flex; justify-content: flex-end; margin-top: 24px; }
        .btn-save { padding: 12px 24px; border-radius: 10px; background: linear-gradient(135deg, #2e7d32, #1b5e20); color: #fff; font-size: 14px; font-weight: 600; border: none; cursor: pointer; transition: all 0.2s; display: inline-flex; align-items: center; gap: 8px; box-shadow: 0 4px 12px rgba(46,125,50,0.2); }
        .btn-save:hover { transform: translateY(-1px); box-shadow: 0 6px 16px rgba(46,125,50,0.3); }

        /* ALERTS */
        .alert-success { display: flex; align-items: center; gap: 12px; padding: 14px 20px; background: #10b981; color: #fff; border-radius: 12px; font-size: 13.5px; font-weight: 500; margin-bottom: 24px; }
        .alert-success-icon { display: flex; align-items: center; justify-content: center; width: 22px; height: 22px; background: rgba(255,255,255,0.2); border-radius: 50%; }
        .alert-error { display: flex; gap: 12px; padding: 14px 20px; background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; border-radius: 12px; font-size: 13.5px; margin-bottom: 24px; }
    </style>
</head>
<body>

<div class="layout">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-logo">
                <div class="brand-icon">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                </div>
                <div class="brand-text">
                    <h1>Desa Bade</h1>
                    <p>Panel Admin</p>
                </div>
            </div>
        </div>

        <nav class="sidebar-nav">
            <a href="{{ route('admin.dashboard') }}" class="nav-item">
                <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"/></svg>
                <span>Dashboard</span>
            </a>

                    <div class="nav-section-label">Kelola Konten</div>
        <a href="{{ route('admin.beranda') }}" class="nav-item {{ request()->routeIs('admin.beranda') ? 'active' : '' }}">
            <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            <span>Kelola Beranda</span>
        </a>

            <div class="nav-group">
                <div class="nav-group-header" onclick="toggleNav('profil', this)">
                    <div class="nav-group-header-left">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        <span>Profil Desa</span>
                    </div>
                    <svg id="profil-icon" class="nav-group-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </div>
                <div id="profil" class="nav-submenu">
                    <a href="{{ route('admin.visi-misi') }}" class="nav-subitem">Visi &amp; Misi</a>
                    <a href="{{ route('admin.sejarah') }}" class="nav-subitem">Sejarah Desa</a>
                    <a href="{{ route('admin.perangkat-desa') }}" class="nav-subitem">Perangkat Desa</a>
                </div>
            </div>

            <div class="nav-group">
                <div class="nav-group-header" onclick="toggleNav('infografis', this)">
                    <div class="nav-group-header-left">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                        <span>Infografis</span>
                    </div>
                    <svg id="infografis-icon" class="nav-group-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </div>
                <div id="infografis" class="nav-submenu">
                    <a href="{{ route('admin.infografis.penduduk') }}" class="nav-subitem">Penduduk</a>
                    <a href="{{ route('admin.infografis.apbdes') }}" class="nav-subitem">APBDes</a>
                    <a href="{{ route('admin.infografis.stunting') }}" class="nav-subitem">Stunting</a>
                    <a href="{{ route('admin.infografis.bansos') }}" class="nav-subitem">Bansos</a>
                    <a href="{{ route('admin.infografis.idm') }}" class="nav-subitem">IDM</a>
                    <a href="{{ route('admin.infografis.sdgs') }}" class="nav-subitem">SDGs</a>
                </div>
            </div>

            <a href="{{ route('admin.berita') }}" class="nav-item">
                <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6m-6 4h6"/></svg>
                <span>Berita Desa</span>
            </a>

            <a href="{{ route('admin.belanja') }}" class="nav-item">
                <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                <span>Belanja / UMKM</span>
            </a>

            <div class="nav-section-label">Sistem</div>

            <a href="{{ route('admin.pengaturan') }}" class="nav-item active">
                <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <span>Pengaturan Website</span>
            </a>

            <a href="{{ route('home') }}" target="_blank" class="nav-item">
                <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                <span>Lihat Website</span>
            </a>
        </nav>

        <div class="sidebar-footer">
            <div class="admin-profile">
                <div class="admin-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                <div class="admin-info">
                    <p class="admin-name">{{ auth()->user()->name }}</p>
                    <p class="admin-role">Administrator</p>
                </div>
            </div>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="btn-logout">
                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    Keluar
                </button>
            </form>
        </div>
    </aside>

    <!-- MAIN -->
    <div class="main">
        <!-- Topbar -->
        <header class="topbar">
            <div class="topbar-left">
                <h2>Pengaturan Website</h2>
                <p>Kelola identitas, logo, kontak, media sosial, dan footer portal Desa Bade</p>
            </div>
            <div class="topbar-right">
                <div class="breadcrumb">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    <span>&rsaquo;</span>
                    <span>Sistem</span>
                    <span>&rsaquo;</span>
                    <span style="color:#2e7d32;font-weight:600;">Pengaturan</span>
                </div>
            </div>
        </header>

        <!-- Content -->
        <main class="page-content">

            {{-- Alert Sukses --}}
            @if(session('success'))
            <div class="alert-success">
                <div class="alert-success-icon">
                    <svg width="16" height="16" fill="none" stroke="white" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                </div>
                <p>{{ session('success') }}</p>
            </div>
            @endif

            {{-- Alert Error --}}
            @if($errors->any())
            <div class="alert-error">
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

            <div class="tab-nav">
                <button type="button" class="tab-btn active" onclick="switchTab('tab-umum', this)">Umum & Logo</button>
                <button type="button" class="tab-btn" onclick="switchTab('tab-alamat', this)">Alamat & Wilayah</button>
                <button type="button" class="tab-btn" onclick="switchTab('tab-kontak', this)">Kontak & Sosmed</button>
                <button type="button" class="tab-btn" onclick="switchTab('tab-darurat', this)">Kontak Darurat (Footer)</button>
            </div>

            <!-- Form Pengaturan -->
            <form method="POST" action="{{ route('admin.pengaturan.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- TAB 1: UMUM & LOGO -->
                <div id="tab-umum" class="tab-content active">
                    <div class="card">
                        <p class="card-title">Identitas Umum & Logo Desa</p>
                        <p class="card-subtitle">Pengaturan nama pemerintah daerah, sub-header website, dan logo resmi desa</p>

                        <div class="form-group full-width">
                            <label class="form-label">Logo Pemerintah Desa</label>
                            <div class="logo-upload-wrapper">
                                <div class="logo-preview-box">
                                    @if(!empty($settings['logo_desa']))
                                        <img id="logo-preview" src="{{ asset($settings['logo_desa']) }}" alt="Logo Desa">
                                    @else
                                        <img id="logo-preview" src="{{ asset('logo_desa_bade_utuh.png') }}" alt="Logo Default">
                                    @endif
                                </div>
                                <div class="logo-upload-btn-wrapper">
                                    <input type="file" id="logo_desa" name="logo_desa" class="logo-file-input" accept="image/*" onchange="previewImage(this)">
                                    <button type="button" class="btn-upload-trigger" onclick="document.getElementById('logo_desa').click()">
                                        <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                                        Pilih Berkas Logo
                                    </button>
                                    <p class="form-hint">Disarankan format PNG/SVG dengan latar belakang transparan (Maks. 5 MB)</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label" for="nama_pemerintah_desa">Nama Pemerintah Desa <span>*</span></label>
                                <input type="text" id="nama_pemerintah_desa" name="nama_pemerintah_desa" class="form-input" value="{{ old('nama_pemerintah_desa', $settings['nama_pemerintah_desa']) }}" required>
                                <p class="form-hint">Ditampilkan di footer kolom logo sebelah kiri.</p>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="sub_pemerintah_desa">Sub-header Pemerintah <span>*</span></label>
                                <input type="text" id="sub_pemerintah_desa" name="sub_pemerintah_desa" class="form-input" value="{{ old('sub_pemerintah_desa', $settings['sub_pemerintah_desa']) }}" required>
                                <p class="form-hint">Ditampilkan tepat di bawah nama pemerintah desa.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB 2: ALAMAT & WILAYAH -->
                <div id="tab-alamat" class="tab-content">
                    <div class="card">
                        <p class="card-title">Alamat Lengkap & Kode Wilayah</p>
                        <p class="card-subtitle">Pengaturan pembagian baris alamat kantor desa dan kode administrasi wilayah resmi</p>

                        <div class="form-group">
                            <label class="form-label" for="alamat_line_1">Alamat Baris 1 (Jalan / Dusun) <span>*</span></label>
                            <input type="text" id="alamat_line_1" name="alamat_line_1" class="form-input" value="{{ old('alamat_line_1', $settings['alamat_line_1']) }}" required>
                        </div>

                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label" for="alamat_line_2">Alamat Baris 2 (Kecamatan / Kabupaten) <span>*</span></label>
                                <input type="text" id="alamat_line_2" name="alamat_line_2" class="form-input" value="{{ old('alamat_line_2', $settings['alamat_line_2']) }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="alamat_line_3">Alamat Baris 3 (Provinsi / Kode Pos) <span>*</span></label>
                                <input type="text" id="alamat_line_3" name="alamat_line_3" class="form-input" value="{{ old('alamat_line_3', $settings['alamat_line_3']) }}" required>
                            </div>
                        </div>

                        <div class="form-grid" style="margin-top: 10px;">
                            <div class="form-group">
                                <label class="form-label" for="kode_wilayah">Kode Administrasi Wilayah Desa <span>*</span></label>
                                <input type="text" id="kode_wilayah" name="kode_wilayah" class="form-input" value="{{ old('kode_wilayah', $settings['kode_wilayah']) }}" required>
                                <p class="form-hint">Kode standar Kemendagri (misal: 33.09.12.2005 untuk Desa Bade).</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB 3: KONTAK & SOSMED -->
                <div id="tab-kontak" class="tab-content">
                    <div class="card">
                        <p class="card-title">Nomor Kontak & Tautan Media Sosial</p>
                        <p class="card-subtitle">Pengaturan sarana komunikasi publik dan akun jejaring sosial resmi pemerintah desa</p>

                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label" for="telepon">Nomor Telepon Kantor/WhatsApp <span>*</span></label>
                                <input type="text" id="telepon" name="telepon" class="form-input" value="{{ old('telepon', $settings['telepon']) }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="email">E-mail Resmi Desa <span>*</span></label>
                                <input type="email" id="email" name="email" class="form-input" value="{{ old('email', $settings['email']) }}" required>
                            </div>
                        </div>

                        <h4 style="font-size: 13.5px; font-weight: 700; color: #475569; margin: 20px 0 10px; border-top: 1px solid #f1f5f9; padding-top: 15px;">Akun Media Sosial</h4>

                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label" for="instagram">Instagram URL</label>
                                <input type="text" id="instagram" name="instagram" class="form-input" value="{{ old('instagram', $settings['instagram']) }}" placeholder="#">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="facebook">Facebook URL</label>
                                <input type="text" id="facebook" name="facebook" class="form-input" value="{{ old('facebook', $settings['facebook']) }}" placeholder="#">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="youtube">YouTube URL</label>
                                <input type="text" id="youtube" name="youtube" class="form-input" value="{{ old('youtube', $settings['youtube']) }}" placeholder="#">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="tiktok">TikTok URL</label>
                                <input type="text" id="tiktok" name="tiktok" class="form-input" value="{{ old('tiktok', $settings['tiktok']) }}" placeholder="#">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB 4: KONTAK DARURAT -->
                <div id="tab-darurat" class="tab-content">
                    <div class="card">
                        <p class="card-title">Nomor Telepon Penting / Darurat</p>
                        <p class="card-subtitle">Pengaturan nomor instansi darurat yang akan ditampilkan di kolom footer penting</p>

                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label" for="telp_polisi">Nomor Polisi <span>*</span></label>
                                <input type="text" id="telp_polisi" name="telp_polisi" class="form-input" value="{{ old('telp_polisi', $settings['telp_polisi']) }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="telp_ambulans">Nomor Ambulans <span>*</span></label>
                                <input type="text" id="telp_ambulans" name="telp_ambulans" class="form-input" value="{{ old('telp_ambulans', $settings['telp_ambulans']) }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="telp_pemadam">Nomor Pemadam Kebakaran <span>*</span></label>
                                <input type="text" id="telp_pemadam" name="telp_pemadam" class="form-input" value="{{ old('telp_pemadam', $settings['telp_pemadam']) }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="telp_darurat">Nomor Darurat Medis/SAR <span>*</span></label>
                                <input type="text" id="telp_darurat" name="telp_darurat" class="form-input" value="{{ old('telp_darurat', $settings['telp_darurat']) }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="telp_info">Nomor Pusat Informasi <span>*</span></label>
                                <input type="text" id="telp_info" name="telp_info" class="form-input" value="{{ old('telp_info', $settings['telp_info']) }}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Simpan Button -->
                <div class="form-actions">
                    <button type="submit" class="btn-save">
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        Simpan Pengaturan
                    </button>
                </div>
            </form>
        </main>
    </div>
</div>

<script>
    // Tab switching logic
    function switchTab(tabId, btn) {
        // Hide all tabs
        const tabs = document.querySelectorAll('.tab-content');
        tabs.forEach(tab => tab.classList.remove('active'));

        // Remove active class from all buttons
        const buttons = document.querySelectorAll('.tab-btn');
        buttons.forEach(button => button.classList.remove('active'));

        // Show selected tab and set button active
        document.getElementById(tabId).classList.add('active');
        btn.classList.add('active');
    }

    // Toggle Nav sidebar group
    function toggleNav(id, header) {
        const submenu = document.getElementById(id);
        const icon = document.getElementById(id + '-icon');
        submenu.classList.toggle('open');
        icon.classList.toggle('open');
    }

    // Image upload preview
    function previewImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('logo-preview').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

</body>
</html>
