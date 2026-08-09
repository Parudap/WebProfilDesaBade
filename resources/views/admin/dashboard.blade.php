<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Desa Bade</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>h1, h2, h3, h4, h5, h6 { font-family: 'Cinzel', serif; } 
        * { box-sizing: border-box; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f4f6fb;
            color: #1e293b;
            margin: 0; padding: 0;
        }

        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }

        .layout { display: flex; height: 100vh; overflow: hidden; }

        /* SIDEBAR */
        .sidebar {
            width: 260px; min-width: 260px;
            background: #ffffff;
            border-right: 1px solid #e2e8f0;
            display: flex; flex-direction: column;
            position: relative; overflow: hidden;
        }
        .sidebar::before {
            content: '';
            position: absolute; top: -80px; left: -80px;
            width: 240px; height: 240px;
            background: radial-gradient(circle, rgba(46,125,50,0.07) 0%, transparent 70%);
            pointer-events: none;
        }

        .sidebar-brand {
            padding: 28px 24px 20px;
            border-bottom: 1px solid #e2e8f0;
        }
        .brand-logo { display: flex; align-items: center; gap: 12px; }
        .brand-icon {
            width: 40px; height: 40px;
            background: linear-gradient(135deg, #2e7d32, #1b5e20);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 18px; flex-shrink: 0;
            box-shadow: 0 4px 14px rgba(46,125,50,0.3);
            color: white;
        }
        .brand-text h1 {
            font-size: 16px; font-weight: 700; color: #1e293b;
            margin: 0; letter-spacing: -0.3px;
        }
        .brand-text p {
            font-size: 11px; color: #2e7d32; font-weight: 600;
            margin: 2px 0 0; text-transform: uppercase; letter-spacing: 1px;
        }

        .sidebar-nav { flex: 1; padding: 16px 12px; overflow-y: auto; }

        .nav-section-label {
            font-size: 10px; font-weight: 700; color: #94a3b8;
            text-transform: uppercase; letter-spacing: 1.2px;
            padding: 0 12px; margin: 16px 0 8px;
        }

        .nav-item {
            display: flex; align-items: center; gap: 10px;
            padding: 10px 14px; border-radius: 10px;
            font-size: 14px; font-weight: 500; color: #64748b;
            cursor: pointer; transition: all 0.2s;
            text-decoration: none; position: relative; margin-bottom: 2px;
        }
        .nav-item:hover { background: #f1f5f9; color: #1e293b; }
        .nav-item.active {
            background: linear-gradient(135deg, rgba(46,125,50,0.1), rgba(27,94,32,0.06));
            color: #2e7d32; font-weight: 600;
        }
        .nav-item.active::before {
            content: '';
            position: absolute; left: 0; top: 50%; transform: translateY(-50%);
            width: 3px; height: 20px;
            background: linear-gradient(to bottom, #2e7d32, #1b5e20);
            border-radius: 0 3px 3px 0;
        }
        .nav-icon { width: 18px; height: 18px; flex-shrink: 0; opacity: 0.7; }
        .nav-item.active .nav-icon { opacity: 1; }

        .nav-group-header {
            display: flex; align-items: center; justify-content: space-between;
            padding: 10px 14px; border-radius: 10px;
            font-size: 14px; font-weight: 500; color: #64748b;
            cursor: pointer; transition: all 0.2s; margin-bottom: 2px;
        }
        .nav-group-header:hover { background: #f1f5f9; color: #1e293b; }
        .nav-group-header-left { display: flex; align-items: center; gap: 10px; }
        .nav-group-chevron {
            width: 14px; height: 14px; transition: transform 0.3s;
            color: #94a3b8; flex-shrink: 0;
        }
        .nav-group-chevron.open { transform: rotate(180deg); }

        .nav-submenu {
            max-height: 0; overflow: hidden;
            transition: max-height 0.3s ease; padding-left: 14px;
        }
        .nav-submenu.open { max-height: 300px; }

        .nav-subitem {
            display: flex; align-items: center; gap: 8px;
            padding: 8px 14px; border-radius: 8px;
            font-size: 13px; font-weight: 500; color: #94a3b8;
            cursor: pointer; transition: all 0.2s;
            text-decoration: none; margin-bottom: 1px;
        }
        .nav-subitem::before {
            content: ''; width: 4px; height: 4px;
            background: #cbd5e1; border-radius: 50%; flex-shrink: 0;
        }
        .nav-subitem:hover { color: #475569; background: #f1f5f9; }

        .sidebar-footer {
            padding: 16px 12px;
            border-top: 1px solid #e2e8f0;
        }
        .admin-profile {
            display: flex; align-items: center; gap: 10px;
            padding: 10px 12px; border-radius: 10px;
            background: #f8fafc; margin-bottom: 10px;
            border: 1px solid #e2e8f0;
        }
        .admin-avatar {
            width: 36px; height: 36px;
            background: linear-gradient(135deg, #2e7d32, #1b5e20);
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            font-size: 13px; font-weight: 700; color: white; flex-shrink: 0;
        }
        .admin-info p { margin: 0; }
        .admin-name { font-size: 13px; font-weight: 600; color: #1e293b; }
        .admin-role { font-size: 11px; color: #94a3b8; margin-top: 1px !important; }
        .btn-logout {
            display: flex; align-items: center; justify-content: center; gap: 8px;
            width: 100%; padding: 10px; border-radius: 10px;
            font-size: 13px; font-weight: 600; color: #ef4444;
            background: #fef2f2; border: 1px solid #fecaca;
            cursor: pointer; transition: all 0.2s; font-family: inherit;
        }
        .btn-logout:hover { background: #fee2e2; border-color: #fca5a5; }

        /* MAIN */
        .main { flex: 1; display: flex; flex-direction: column; overflow: hidden; }

        .topbar {
            padding: 18px 32px;
            border-bottom: 1px solid #e2e8f0;
            display: flex; align-items: center; justify-content: space-between;
            background: #ffffff;
            flex-shrink: 0;
        }
        .topbar-left h2 {
            font-size: 20px; font-weight: 700; color: #1e293b;
            margin: 0; letter-spacing: -0.4px;
        }
        .topbar-left p { font-size: 13px; color: #94a3b8; margin: 3px 0 0; }
        .topbar-right { display: flex; align-items: center; gap: 14px; }
        .topbar-clock { font-size: 12px; color: #94a3b8; font-weight: 500; }
        .status-badge {
            display: flex; align-items: center; gap: 6px;
            padding: 6px 14px; border-radius: 20px;
            background: #f0fdf4; border: 1px solid #bbf7d0;
            font-size: 12px; font-weight: 600; color: #16a34a;
        }
        .status-dot {
            width: 7px; height: 7px; background: #22c55e;
            border-radius: 50%; animation: pulse-green 2s infinite;
        }
        @keyframes pulse-green {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(1.4); }
        }

        /* PAGE */
        .page-content { flex: 1; overflow-y: auto; padding: 32px; }

        /* Welcome Banner */
        .welcome-banner {
            background: linear-gradient(135deg, #1b5e20 0%, #2e7d32 60%, #4caf50 100%);
            border-radius: 20px; padding: 36px 40px; margin-bottom: 28px;
            position: relative; overflow: hidden;
            box-shadow: 0 8px 32px rgba(46, 125, 50, 0.25);
        }
        .welcome-banner::before {
            content: '';
            position: absolute; top: -60px; right: -60px;
            width: 260px; height: 260px;
            background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 65%);
            pointer-events: none;
        }
        .welcome-banner::after {
            content: '';
            position: absolute; bottom: -40px; left: 160px;
            width: 200px; height: 200px;
            background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, transparent 65%);
            pointer-events: none;
        }
        .welcome-illustration {
            position: absolute; right: 40px; top: 50%;
            transform: translateY(-50%); opacity: 0.15; color: white; pointer-events: none;
        }
        .welcome-content { position: relative; z-index: 1; }
        .welcome-text h3 {
            font-size: 12px; font-weight: 700; color: rgba(255,255,255,0.7);
            margin: 0 0 10px; text-transform: uppercase; letter-spacing: 1.5px;
            display: flex; align-items: center; gap: 6px;
        }
        .welcome-text h2 {
            font-size: 32px; font-weight: 800; color: #ffffff;
            margin: 0 0 10px; letter-spacing: -0.8px;
        }
        .welcome-text p {
            font-size: 14px; color: rgba(255,255,255,0.75); margin: 0;
            max-width: 450px; line-height: 1.7;
        }
        .welcome-actions { display: flex; gap: 10px; margin-top: 22px; }
        .btn-primary {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 10px 20px;
            background: #ffffff;
            color: #2e7d32; border-radius: 10px;
            font-size: 13px; font-weight: 700; text-decoration: none;
            transition: all 0.25s;
            box-shadow: 0 4px 14px rgba(0,0,0,0.15);
        }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(0,0,0,0.2); }
        .btn-secondary {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 10px 20px;
            background: rgba(255,255,255,0.15); color: #ffffff;
            border-radius: 10px; font-size: 13px; font-weight: 600;
            text-decoration: none; transition: all 0.25s;
            border: 1px solid rgba(255,255,255,0.3);
        }
        .btn-secondary:hover { background: rgba(255,255,255,0.22); }

        /* Stats */
        .stats-grid {
            display: grid; grid-template-columns: repeat(4, 1fr);
            gap: 16px; margin-bottom: 24px;
        }
        .stat-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px; padding: 22px;
            transition: all 0.25s;
        }
        .stat-card:hover {
            border-color: #a7f3d0;
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(46,125,50,0.08);
        }
        .stat-card-header {
            display: flex; align-items: center; justify-content: space-between;
            margin-bottom: 16px;
        }
        .stat-icon {
            width: 42px; height: 42px; border-radius: 12px;
            display: flex; align-items: center; justify-content: center; flex-shrink: 0;
        }
        .stat-icon.indigo { background: #ecfdf5; color: #059669; } /* Emerald */
        .stat-icon.green  { background: #fffbeb; color: #d97706; } /* Gold/Amber */
        .stat-icon.violet { background: #f0fdf4; color: #16a34a; } /* Green */
        .stat-icon.amber  { background: #eff6ff; color: #2563eb; } /* Blue */
        .stat-trend {
            font-size: 11px; font-weight: 600;
            padding: 4px 9px; border-radius: 20px;
        }
        .trend-up { color: #16a34a; background: #f0fdf4; }
        .trend-neutral { color: #2e7d32; background: rgba(46,125,50,0.08); }
        .stat-value {
            font-size: 34px; font-weight: 800; color: #1e293b;
            letter-spacing: -1.2px; margin-bottom: 4px;
        }
        .stat-label { font-size: 13px; color: #94a3b8; font-weight: 500; }
        .stat-bar {
            height: 3px; border-radius: 10px; margin-top: 16px;
            background: #f1f5f9;
        }
        .stat-bar-fill { height: 100%; border-radius: 10px; }
        .fill-indigo { background: linear-gradient(to right, #059669, #34d399); width: 100%; }
        .fill-green  { background: linear-gradient(to right, #d97706, #fbbf24); width: 100%; }
        .fill-violet { background: linear-gradient(to right, #16a34a, #4ade80); width: 100%; }
        .fill-amber  { background: linear-gradient(to right, #2563eb, #60a5fa); width: 100%; }

        /* Lower grid */
        .lower-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px; padding: 24px;
        }
        .card-header {
            display: flex; align-items: flex-start; justify-content: space-between;
            margin-bottom: 20px;
        }
        .card-title { font-size: 15px; font-weight: 700; color: #1e293b; }
        .card-subtitle { font-size: 12px; color: #94a3b8; margin-top: 3px; }
        .card-badge {
            font-size: 11px; font-weight: 600; padding: 4px 10px; border-radius: 20px;
            background: #f0fdf4; color: #16a34a;
            border: 1px solid #bbf7d0;
        }

        /* Activity */
        .activity-list { display: flex; flex-direction: column; }
        .activity-item {
            display: flex; align-items: flex-start; gap: 14px;
            padding: 13px 0;
            border-bottom: 1px solid #f1f5f9;
        }
        .activity-item:last-child { border-bottom: none; padding-bottom: 0; }
        .activity-dot {
            width: 10px; height: 10px; border-radius: 50%;
            flex-shrink: 0; margin-top: 3px;
        }
        .dot-indigo { background: #059669; box-shadow: 0 0 7px rgba(5,150,105,0.4); }
        .dot-green  { background: #d97706; box-shadow: 0 0 7px rgba(217,119,6,0.4); }
        .dot-amber  { background: #2563eb; box-shadow: 0 0 7px rgba(37,99,235,0.4); }
        .dot-violet { background: #16a34a; box-shadow: 0 0 7px rgba(22,163,74,0.4); }
        .activity-body { flex: 1; }
        .activity-title { font-size: 13px; font-weight: 600; color: #334155; }
        .activity-desc { font-size: 12px; color: #94a3b8; margin-top: 2px; }
        .activity-time { font-size: 11px; color: #94a3b8; font-weight: 500; white-space: nowrap; padding-top: 2px; }

        /* Quick access */
        .quick-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
        .quick-item {
            display: flex; align-items: center; gap: 12px;
            padding: 14px 16px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px; cursor: pointer;
            text-decoration: none; transition: all 0.2s;
        }
        .quick-item:hover {
            background: #f0fdf4;
            border-color: #bbf7d0;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(46,125,50,0.08);
        }
        .quick-icon {
            width: 36px; height: 36px; border-radius: 9px;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .qi-indigo { background: #ecfdf5; color: #059669; }
        .qi-green  { background: #fffbeb; color: #d97706; }
        .qi-violet { background: #f0fdf4; color: #16a34a; }
        .qi-amber  { background: #eff6ff; color: #2563eb; }
        .quick-info p { margin: 0; }
        .quick-name { font-size: 13px; font-weight: 600; color: #334155; }
        .quick-desc { font-size: 11px; color: #94a3b8; margin-top: 2px !important; }
        .quick-arrow { margin-left: auto; color: #cbd5e1; flex-shrink: 0; }
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
                <div class="brand-text">
                    <h1>Desa Bade</h1>
                    <p>Admin Panel</p>
                </div>
            </div>
        </div>

        <nav class="sidebar-nav">
            <div class="nav-section-label">Menu Utama</div>

            <a href="{{ route('admin.dashboard') }}" class="nav-item active">
                <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Beranda
            </a>

            <div class="nav-group">
                <div class="nav-group-header" onclick="toggleNav('beranda-menu', this)">
                    <div class="nav-group-header-left">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        <span>Kelola Beranda</span>
                    </div>
                    <svg id="beranda-menu-icon" class="nav-group-chevron {{ request()->routeIs('admin.beranda*') ? 'open' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </div>
                <div id="beranda-menu" class="nav-submenu {{ request()->routeIs('admin.beranda*') ? 'open' : '' }}">
                    <a href="{{ route('admin.beranda') }}" class="nav-subitem {{ Route::is('admin.beranda') ? 'active-sub' : '' }}">Slide Hero Banner</a>
                    <a href="{{ route('admin.beranda.sambutan') }}" class="nav-subitem {{ Route::is('admin.beranda.sambutan') ? 'active-sub' : '' }}">Sambutan Kepala Desa</a>
                </div>
            </div>

            <div class="nav-group">
                <div class="nav-group-header" onclick="toggleNav('profil', this)">
                    <div class="nav-group-header-left">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                        <span>Profil Desa</span>
                    </div>
                    <svg id="profil-icon" class="nav-group-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
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

        <a href="{{ route('admin.layanan') }}" class="nav-item {{ Route::is('admin.layanan*') ? 'active' : '' }}">
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

<a href="{{ route('home') }}" target="_blank" class="nav-item">
                <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
                Lihat Website
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
                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
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
                <h2>Dashboard</h2>
                <p>Pantau dan kelola seluruh informasi Desa Bade</p>
            </div>
            <div class="topbar-right">
                <span class="topbar-clock" id="live-clock"></span>
                <div class="status-badge">
                    <div class="status-dot"></div>
                    Online
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="page-content">

            <!-- Welcome Banner -->
            <div class="welcome-banner">
                <div class="welcome-illustration">
                    <svg width="120" height="120" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                </div>
                <div class="welcome-content">
                    <div class="welcome-text">
                        <h3>Selamat Datang Kembali</h3>
                        <h2>Halo, {{ auth()->user()->name }}!</h2>
                        <p>
                            Anda masuk sebagai <strong style="color:rgba(255,255,255,0.95)">Administrator</strong> Desa Bade.
                            Gunakan panel ini untuk mengelola konten, informasi, dan data desa dengan mudah dan efisien.
                        </p>
                        <div class="welcome-actions">
                            <a href="{{ route('home') }}" target="_blank" class="btn-primary">
                                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-right: 4px;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                Lihat Website
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>

<script>
    function toggleNav(id, headerEl) {
        const submenu = document.getElementById(id);
        const icon = document.getElementById(id + '-icon');
        submenu.classList.toggle('open');
        if (icon) icon.classList.toggle('open');
    }

    function updateClock() {
        const now = new Date();
        const opts = {
            weekday: 'short', day: 'numeric', month: 'short', year: 'numeric',
            hour: '2-digit', minute: '2-digit', second: '2-digit',
            timeZone: 'Asia/Jakarta'
        };
        const el = document.getElementById('live-clock');
        if (el) el.textContent = now.toLocaleString('id-ID', opts) + ' WIB';
    }
    updateClock();
    setInterval(updateClock, 1000);
</script>
</body>
</html>
