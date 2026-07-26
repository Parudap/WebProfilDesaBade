<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perangkat Desa - Admin Desa Bade</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
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
        .brand-text h1 { font-size: 16px; font-weight: 700; color: #1e293b; margin: 0; }
        .brand-text p { font-size: 11px; color: #2e7d32; font-weight: 600; margin: 2px 0 0; text-transform: uppercase; letter-spacing: 1px; }
        .sidebar-nav { flex: 1; padding: 16px 12px; overflow-y: auto; }
        .nav-section-label { font-size: 10px; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 1.2px; padding: 0 12px; margin: 16px 0 8px; }
        .nav-item { display: flex; align-items: center; gap: 10px; padding: 10px 14px; border-radius: 10px; font-size: 14px; font-weight: 500; color: #64748b; transition: all 0.2s; text-decoration: none; position: relative; margin-bottom: 2px; }
        .nav-item:hover { background: #f1f5f9; color: #1e293b; }
        .nav-icon { width: 18px; height: 18px; flex-shrink: 0; opacity: 0.7; }
        .nav-group-header { display: flex; align-items: center; justify-content: space-between; padding: 10px 14px; border-radius: 10px; font-size: 14px; font-weight: 500; color: #64748b; cursor: pointer; transition: all 0.2s; margin-bottom: 2px; }
        .nav-group-header:hover { background: #f1f5f9; }
        .nav-group-header-left { display: flex; align-items: center; gap: 10px; }
        .nav-group-chevron { width: 14px; height: 14px; transition: transform 0.3s; color: #94a3b8; flex-shrink: 0; }
        .nav-group-chevron.open { transform: rotate(180deg); }
        .nav-submenu { max-height: 0; overflow: hidden; transition: max-height 0.3s ease; padding-left: 14px; }
        .nav-submenu.open { max-height: 300px; }
        .nav-subitem { display: flex; align-items: center; gap: 8px; padding: 8px 14px; border-radius: 8px; font-size: 13px; font-weight: 500; color: #94a3b8; transition: all 0.2s; text-decoration: none; margin-bottom: 1px; }
        .nav-subitem::before { content: ''; width: 4px; height: 4px; background: #cbd5e1; border-radius: 50%; flex-shrink: 0; }
        .nav-subitem:hover { color: #475569; background: #f1f5f9; }
        .nav-subitem.active-sub { color: #2e7d32; font-weight: 600; }
        .nav-subitem.active-sub::before { background: #2e7d32; }
        .sidebar-footer { padding: 16px 12px; border-top: 1px solid #e2e8f0; }
        .admin-profile { display: flex; align-items: center; gap: 10px; padding: 10px 12px; border-radius: 10px; background: #f8fafc; margin-bottom: 10px; border: 1px solid #e2e8f0; }
        .admin-avatar { width: 36px; height: 36px; background: linear-gradient(135deg, #2e7d32, #1b5e20); border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 13px; font-weight: 700; color: white; flex-shrink: 0; }
        .admin-info p { margin: 0; }
        .admin-name { font-size: 13px; font-weight: 600; color: #1e293b; }
        .admin-role { font-size: 11px; color: #94a3b8; }
        .btn-logout { display: flex; align-items: center; justify-content: center; gap: 8px; width: 100%; padding: 10px; border-radius: 10px; font-size: 13px; font-weight: 600; color: #ef4444; background: #fef2f2; border: 1px solid #fecaca; cursor: pointer; transition: all 0.2s; font-family: inherit; }
        .btn-logout:hover { background: #fee2e2; }

        /* MAIN */
        .main { flex: 1; display: flex; flex-direction: column; overflow: hidden; }
        .topbar { padding: 18px 32px; border-bottom: 1px solid #e2e8f0; display: flex; align-items: center; justify-content: space-between; background: #fff; flex-shrink: 0; }
        .topbar-left h2 { font-size: 20px; font-weight: 700; color: #1e293b; margin: 0; }
        .topbar-left p { font-size: 13px; color: #94a3b8; margin: 3px 0 0; }
        .topbar-right { display: flex; align-items: center; gap: 12px; }
        .breadcrumb { display: flex; align-items: center; gap: 6px; font-size: 13px; color: #94a3b8; }
        .breadcrumb a { color: #2e7d32; text-decoration: none; font-weight: 500; }
        .breadcrumb span { color: #cbd5e1; }

        /* PAGE */
        .page-content { flex: 1; overflow-y: auto; padding: 28px 32px; }

        /* ALERT */
        .alert-success { display: flex; align-items: center; gap: 12px; padding: 14px 18px; background: #f0fdf4; border: 1px solid #86efac; border-radius: 12px; margin-bottom: 24px; }
        .alert-success-icon { width: 34px; height: 34px; background: #22c55e; border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .alert-success p { margin: 0; font-size: 14px; font-weight: 600; color: #15803d; }

        /* CARD */
        .card { background: #fff; border: 1px solid #e2e8f0; border-radius: 16px; }
        .card-header { padding: 20px 24px; border-bottom: 1px solid #f1f5f9; display: flex; align-items: center; justify-content: space-between; }
        .card-title { font-size: 16px; font-weight: 700; color: #1e293b; margin: 0; }
        .card-subtitle { font-size: 12px; color: #94a3b8; margin: 3px 0 0; }

        /* TABS */
        .tabs { display: flex; gap: 4px; background: #f1f5f9; border-radius: 10px; padding: 4px; margin-bottom: 20px; width: fit-content; }
        .tab-btn { padding: 8px 20px; border-radius: 8px; font-size: 13px; font-weight: 600; color: #64748b; background: transparent; border: none; cursor: pointer; transition: all 0.2s; font-family: inherit; }
        .tab-btn.active { background: #fff; color: #2e7d32; box-shadow: 0 1px 6px rgba(0,0,0,0.08); }
        .tab-btn .count { display: inline-flex; align-items: center; justify-content: center; width: 20px; height: 20px; background: #f0fdf4; color: #2e7d32; border-radius: 20px; font-size: 11px; font-weight: 700; margin-left: 6px; }
        .tab-btn.active .count { background: #2e7d32; color: #fff; }

        /* TABLE */
        .table-wrap { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; }
        thead tr { background: #f8fafc; border-bottom: 1px solid #e2e8f0; }
        th { padding: 12px 16px; font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.8px; white-space: nowrap; }
        tbody tr { border-bottom: 1px solid #f1f5f9; transition: background 0.15s; }
        tbody tr:last-child { border-bottom: none; }
        tbody tr:hover { background: #fafbff; }
        td { padding: 14px 16px; font-size: 13px; color: #334155; vertical-align: middle; }
        .td-no { width: 48px; color: #94a3b8; font-weight: 600; text-align: center; }
        .td-urut { width: 60px; text-align: center; }
        .td-actions { width: 110px; white-space: nowrap; }
        .badge-jabatan { display: inline-block; padding: 3px 10px; background: #f0fdf4; color: #2e7d32; border-radius: 20px; font-size: 12px; font-weight: 600; }
        .empty-row td { padding: 40px; text-align: center; color: #94a3b8; font-size: 13px; }

        /* ACTION BUTTONS */
        .btn-add { display: inline-flex; align-items: center; gap: 8px; padding: 9px 18px; background: linear-gradient(135deg, #2e7d32, #1b5e20); color: white; border-radius: 10px; font-size: 13px; font-weight: 600; border: none; cursor: pointer; transition: all 0.2s; font-family: inherit; box-shadow: 0 3px 10px rgba(46,125,50,0.3); }
        .btn-add:hover { transform: translateY(-1px); box-shadow: 0 5px 16px rgba(46,125,50,0.4); }
        .btn-edit { padding: 6px 12px; border-radius: 7px; font-size: 12px; font-weight: 600; color: #2e7d32; background: #f0fdf4; border: 1px solid #bbf7d0; cursor: pointer; transition: all 0.15s; font-family: inherit; }
        .btn-edit:hover { background: #dcfce7; }
        .btn-del { padding: 6px 12px; border-radius: 7px; font-size: 12px; font-weight: 600; color: #ef4444; background: #fef2f2; border: 1px solid #fecaca; cursor: pointer; transition: all 0.15s; font-family: inherit; }
        .btn-del:hover { background: #fee2e2; }

        /* MODAL */
        .modal-backdrop { position: fixed; inset: 0; background: rgba(15,23,42,0.45); backdrop-filter: blur(4px); z-index: 100; display: none; align-items: center; justify-content: center; opacity: 0; pointer-events: none; transition: opacity 0.2s; }
        .modal-backdrop.open { display: flex; opacity: 1; pointer-events: all; }
        .modal { background: #fff; border-radius: 18px; width: 480px; max-width: 95vw; box-shadow: 0 24px 60px rgba(0,0,0,0.18); transform: translateY(16px) scale(0.97); transition: all 0.25s; }
        .modal-backdrop.open .modal { transform: translateY(0) scale(1); }
        .modal-header { padding: 22px 24px 0; display: flex; align-items: center; justify-content: space-between; }
        .modal-title { font-size: 17px; font-weight: 700; color: #1e293b; display: flex; align-items: center; gap: 8px; }
        .modal-close { width: 32px; height: 32px; border-radius: 8px; border: 1px solid #e2e8f0; background: #f8fafc; color: #64748b; display: flex; align-items: center; justify-content: center; cursor: pointer; font-size: 16px; transition: all 0.15s; }
        .modal-close:hover { background: #f1f5f9; }
        .modal-body { padding: 20px 24px; }
        .modal-footer { padding: 0 24px 22px; display: flex; gap: 10px; justify-content: flex-end; }

        /* FORM */
        .form-group { margin-bottom: 16px; }
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
        .form-label { display: block; font-size: 12px; font-weight: 600; color: #374151; margin-bottom: 6px; }
        .form-label .req { color: #ef4444; margin-left: 2px; }
        .form-input, .form-select { width: 100%; padding: 9px 13px; border: 1px solid #e2e8f0; border-radius: 9px; font-size: 13px; font-family: inherit; color: #1e293b; background: #fff; transition: all 0.2s; }
        .form-input:focus, .form-select:focus { outline: none; border-color: #2e7d32; box-shadow: 0 0 0 3px rgba(46,125,50,0.1); }
        .btn-submit { padding: 10px 22px; background: linear-gradient(135deg, #2e7d32, #1b5e20); color: white; border-radius: 9px; font-size: 13px; font-weight: 600; border: none; cursor: pointer; font-family: inherit; transition: all 0.2s; }
        .btn-submit:hover { transform: translateY(-1px); }
        .btn-muted { padding: 10px 18px; background: #f8fafc; color: #64748b; border-radius: 9px; font-size: 13px; font-weight: 600; border: 1px solid #e2e8f0; cursor: pointer; font-family: inherit; transition: all 0.15s; }
        .btn-muted:hover { background: #f1f5f9; }

        /* CONFIRM */
        .confirm-icon { width: 52px; height: 52px; background: #fef2f2; border-radius: 14px; display: flex; align-items: center; justify-content: center; margin: 0 auto 14px; font-size: 24px; color: #ef4444; }
        .confirm-text { text-align: center; }
        .confirm-text h3 { font-size: 16px; font-weight: 700; color: #1e293b; margin: 0 0 6px; }
        .confirm-text p { font-size: 13px; color: #64748b; margin: 0; }
        .btn-danger { padding: 10px 22px; background: #ef4444; color: white; border-radius: 9px; font-size: 13px; font-weight: 600; border: none; cursor: pointer; font-family: inherit; transition: all 0.2s; }
        .btn-danger:hover { background: #dc2626; }
    </style>
</head>
<body>
<div class="layout">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-logo">
                <div class="brand-icon">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                </div>
                <div class="brand-text"><h1>Desa Bade</h1><p>Admin Panel</p></div>
            </div>
        </div>
        <nav class="sidebar-nav">
            <div class="nav-section-label">Menu Utama</div>
            <a href="{{ route('admin.dashboard') }}" class="nav-item">
                <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Beranda
            </a>
                    <div class="nav-section-label">Kelola Konten</div>
        <a href="{{ route('admin.beranda') }}" class="nav-item {{ request()->routeIs('admin.beranda') ? 'active' : '' }}">
            <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            <span>Kelola Beranda</span>
        </a>
            <div class="nav-group">
                <div class="nav-group-header" onclick="toggleNav('profil',this)">
                    <div class="nav-group-header-left">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        <span>Profil Desa</span>
                    </div>
                    <svg id="profil-icon" class="nav-group-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </div>
                <div id="profil" class="nav-submenu">
                    <a href="{{ route('admin.visi-misi') }}" class="nav-subitem">Visi &amp; Misi</a>
                    <a href="{{ route('admin.sejarah') }}" class="nav-subitem">Sejarah Desa</a>
                    <a href="{{ route('admin.perangkat-desa') }}" class="nav-subitem active-sub">Perangkat Desa</a>
                </div>
            </div>
            <div class="nav-group">
                <div class="nav-group-header" onclick="toggleNav('infografis', this)">
                    <div class="nav-group-header-left">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                        <span>Infografis</span>
                    </div>
                    <svg id="infografis-icon" class="nav-group-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
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
                    <a href="{{ route('admin.pengaturan') }}" class="nav-item {{ Route::is('admin.pengaturan') ? 'active' : '' }}">
            <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            <span>Pengaturan Website</span>
        </a>

<a href="{{ route('home') }}" target="_blank" class="nav-item">
                <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                Lihat Website
            </a>
        </nav>
        <div class="sidebar-footer">
            <div class="admin-profile">
                <div class="admin-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                <div class="admin-info"><p class="admin-name">{{ auth()->user()->name }}</p><p class="admin-role">Administrator</p></div>
            </div>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="btn-logout">
                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    Keluar
                </button>
            </form>
        </div>
    </aside>

    <!-- MAIN -->
    <div class="main">
        <header class="topbar">
            <div class="topbar-left">
                <h2>Perangkat Desa &amp; BPD</h2>
                <p>Kelola struktur organisasi Desa Bade</p>
            </div>
            <div class="topbar-right">
                <div class="breadcrumb">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    <span>&rsaquo;</span>
                    <span>Profil Desa</span>
                    <span>&rsaquo;</span>
                    <span style="color:#2e7d32;font-weight:600;">Perangkat Desa</span>
                </div>
            </div>
        </header>

        <main class="page-content">

            @if(session('success'))
            <div class="alert-success">
                <div class="alert-success-icon">
                    <svg width="16" height="16" fill="none" stroke="white" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <p>{{ session('success') }}</p>
            </div>
            @endif

            <div class="tabs">
                <button class="tab-btn active" id="tab-perangkat" onclick="switchTab('perangkat')">
                    Perangkat Desa <span class="count">{{ $perangkat->count() }}</span>
                </button>
                <button class="tab-btn" id="tab-bpd" onclick="switchTab('bpd')">
                    BPD <span class="count">{{ $bpd->count() }}</span>
                </button>
            </div>

            <!-- PANEL PERANGKAT DESA -->
            <div id="panel-perangkat" class="card">
                <div class="card-header">
                    <div>
                        <p class="card-title">Daftar Perangkat Desa</p>
                        <p class="card-subtitle">Anggota pemerintah Desa Bade aktif</p>
                    </div>
                    <button class="btn-add" onclick="openAddModal()">
                        <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                        </svg>
                        Tambah Anggota
                    </button>
                </div>
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th class="td-no">No</th>
                                <th>Jabatan</th>
                                <th>Nama</th>
                                <th>Pendidikan</th>
                                <th class="td-urut">Urutan</th>
                                <th class="td-actions">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($perangkat as $i => $p)
                            <tr>
                                <td class="td-no">{{ $i + 1 }}</td>
                                <td><span class="badge-jabatan">{{ $p->jabatan }}</span></td>
                                <td style="font-weight:600;">{{ $p->nama }}</td>
                                <td style="color:#64748b;">{{ $p->pendidikan ?: '&mdash;' }}</td>
                                <td class="td-urut" style="color:#94a3b8;font-weight:600;">{{ $p->urutan }}</td>
                                <td class="td-actions">
                                    <button class="btn-edit" onclick="openEditModal({{ $p->id }}, '{{ addslashes($p->nama) }}', '{{ addslashes($p->jabatan) }}', '{{ addslashes($p->pendidikan ?? '') }}', 'perangkat', {{ $p->urutan }})">Edit</button>
                                    <button class="btn-del" onclick="openDeleteModal({{ $p->id }}, '{{ addslashes($p->nama) }}')">Hapus</button>
                                </td>
                            </tr>
                            @empty
                            <tr class="empty-row"><td colspan="6">Belum ada data Perangkat Desa. Klik <strong>Tambah Anggota</strong> untuk mulai.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- PANEL BPD -->
            <div id="panel-bpd" class="card" style="display:none;">
                <div class="card-header">
                    <div>
                        <p class="card-title">Daftar BPD (Badan Permusyawaratan Desa)</p>
                        <p class="card-subtitle">Anggota BPD Desa Bade aktif</p>
                    </div>
                    <button class="btn-add" onclick="openAddModal()">
                        <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                        </svg>
                        Tambah Anggota
                    </button>
                </div>
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th class="td-no">No</th>
                                <th>Jabatan</th>
                                <th>Nama</th>
                                <th>Pendidikan</th>
                                <th class="td-urut">Urutan</th>
                                <th class="td-actions">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($bpd as $i => $b)
                            <tr>
                                <td class="td-no">{{ $i + 1 }}</td>
                                <td><span class="badge-jabatan">{{ $b->jabatan }}</span></td>
                                <td style="font-weight:600;">{{ $b->nama }}</td>
                                <td style="color:#64748b;">{{ $b->pendidikan ?: '&mdash;' }}</td>
                                <td class="td-urut" style="color:#94a3b8;font-weight:600;">{{ $b->urutan }}</td>
                                <td class="td-actions">
                                    <button class="btn-edit" onclick="openEditModal({{ $b->id }}, '{{ addslashes($b->nama) }}', '{{ addslashes($b->jabatan) }}', '{{ addslashes($b->pendidikan ?? '') }}', 'bpd', {{ $b->urutan }})">Edit</button>
                                    <button class="btn-del" onclick="openDeleteModal({{ $b->id }}, '{{ addslashes($b->nama) }}')">Hapus</button>
                                </td>
                            </tr>
                            @empty
                            <tr class="empty-row"><td colspan="6">Belum ada data BPD. Klik <strong>Tambah Anggota</strong> untuk mulai.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>
</div>

<!-- MODAL TAMBAH -->
<div class="modal-backdrop" id="modal-add">
    <div class="modal">
        <div class="modal-header">
            <span class="modal-title">
                <svg width="18" height="18" fill="none" stroke="#2e7d32" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                </svg>
                Tambah Anggota
            </span>
            <button class="modal-close" onclick="closeModal('modal-add')">&times;</button>
        </div>
        <form method="POST" action="{{ route('admin.perangkat-desa.store') }}">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Tipe <span class="req">*</span></label>
                    <select name="tipe" id="add-tipe" class="form-select" required>
                        <option value="perangkat">Perangkat Desa</option>
                        <option value="bpd">BPD</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Jabatan <span class="req">*</span></label>
                    <input type="text" name="jabatan" class="form-input" placeholder="cth: Kepala Desa" required maxlength="100">
                </div>
                <div class="form-group">
                    <label class="form-label">Nama Lengkap <span class="req">*</span></label>
                    <input type="text" name="nama" class="form-input" placeholder="cth: Budi Santoso" required maxlength="100">
                </div>
                <div class="form-row">
                    <div class="form-group" style="margin-bottom:0">
                        <label class="form-label">Pendidikan</label>
                        <input type="text" name="pendidikan" class="form-input" placeholder="cth: S1" maxlength="100">
                    </div>
                    <div class="form-group" style="margin-bottom:0">
                        <label class="form-label">Urutan Tampil</label>
                        <input type="number" name="urutan" class="form-input" placeholder="0" min="0" value="0">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-muted" onclick="closeModal('modal-add')">Batal</button>
                <button type="submit" class="btn-submit">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- MODAL EDIT -->
<div class="modal-backdrop" id="modal-edit">
    <div class="modal">
        <div class="modal-header">
            <span class="modal-title">
                <svg width="18" height="18" fill="none" stroke="#2e7d32" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
                Edit Anggota
            </span>
            <button class="modal-close" onclick="closeModal('modal-edit')">&times;</button>
        </div>
        <form method="POST" id="form-edit" action="">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Tipe <span class="req">*</span></label>
                    <select name="tipe" id="edit-tipe" class="form-select" required>
                        <option value="perangkat">Perangkat Desa</option>
                        <option value="bpd">BPD</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Jabatan <span class="req">*</span></label>
                    <input type="text" name="jabatan" id="edit-jabatan" class="form-input" required maxlength="100">
                </div>
                <div class="form-group">
                    <label class="form-label">Nama Lengkap <span class="req">*</span></label>
                    <input type="text" name="nama" id="edit-nama" class="form-input" required maxlength="100">
                </div>
                <div class="form-row">
                    <div class="form-group" style="margin-bottom:0">
                        <label class="form-label">Pendidikan</label>
                        <input type="text" name="pendidikan" id="edit-pendidikan" class="form-input" maxlength="100">
                    </div>
                    <div class="form-group" style="margin-bottom:0">
                        <label class="form-label">Urutan Tampil</label>
                        <input type="number" name="urutan" id="edit-urutan" class="form-input" min="0">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-muted" onclick="closeModal('modal-edit')">Batal</button>
                <button type="submit" class="btn-submit">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<!-- MODAL HAPUS -->
<div class="modal-backdrop" id="modal-delete">
    <div class="modal">
        <div class="modal-body" style="padding-top:28px;">
            <div class="confirm-icon">
                <svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
            </div>
            <div class="confirm-text">
                <h3>Hapus Anggota?</h3>
                <p>Data <strong id="delete-name"></strong> akan dihapus permanen dan tidak bisa dikembalikan.</p>
            </div>
        </div>
        <form method="POST" id="form-delete" action="">
            @csrf
            @method('DELETE')
            <div class="modal-footer" style="justify-content:center; gap:12px; padding-top:0;">
                <button type="button" class="btn-muted" onclick="closeModal('modal-delete')">Batal</button>
                <button type="submit" class="btn-danger">Ya, Hapus</button>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleNav(id) {
        document.getElementById(id).classList.toggle('open');
        document.getElementById(id+'-icon').classList.toggle('open');
    }

    let activeTab = 'perangkat';
    function switchTab(tab) {
        activeTab = tab;
        document.getElementById('panel-perangkat').style.display = tab === 'perangkat' ? '' : 'none';
        document.getElementById('panel-bpd').style.display = tab === 'bpd' ? '' : 'none';
        document.getElementById('tab-perangkat').classList.toggle('active', tab === 'perangkat');
        document.getElementById('tab-bpd').classList.toggle('active', tab === 'bpd');
        document.getElementById('add-tipe').value = tab;
    }

    function openModal(id) { document.getElementById(id).classList.add('open'); }
    function closeModal(id) { document.getElementById(id).classList.remove('open'); }

    document.querySelectorAll('.modal-backdrop').forEach(el => {
        el.addEventListener('click', function(e) {
            if (e.target === el) closeModal(el.id);
        });
    });
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') document.querySelectorAll('.modal-backdrop.open').forEach(el => el.classList.remove('open'));
    });

    function openAddModal() {
        document.getElementById('add-tipe').value = activeTab;
        openModal('modal-add');
    }

    function openEditModal(id, nama, jabatan, pendidikan, tipe, urutan) {
        document.getElementById('form-edit').action = `/admin/perangkat-desa/${id}`;
        document.getElementById('edit-nama').value = nama;
        document.getElementById('edit-jabatan').value = jabatan;
        document.getElementById('edit-pendidikan').value = pendidikan;
        document.getElementById('edit-tipe').value = tipe;
        document.getElementById('edit-urutan').value = urutan;
        openModal('modal-edit');
    }

    function openDeleteModal(id, nama) {
        document.getElementById('form-delete').action = `/admin/perangkat-desa/${id}`;
        document.getElementById('delete-name').textContent = nama;
        openModal('modal-delete');
    }
</script>
</body>
</html>
