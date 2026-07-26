<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Beranda - Admin Desa Bade</title>
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

        /* CARDS & GRIDS */
        .card { background: #fff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02); }
        .card-title { font-size: 15px; font-weight: 700; color: #1e293b; margin: 0 0 4px; }
        .card-subtitle { font-size: 12px; color: #64748b; margin: 0 0 20px; line-height: 1.6; }

        /* SLIDE CARDS */
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(290px, 1fr));
            gap: 24px;
            margin-top: 24px;
        }

        .slide-card {
            background: #ffffff;
            border-radius: 18px;
            border: 1px solid #e2e8f0;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            position: relative;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02), 0 2px 4px -1px rgba(0, 0, 0, 0.01);
        }

        .slide-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 20px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -2px rgba(0, 0, 0, 0.02);
            border-color: #2e7d32;
        }

        .slide-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            z-index: 10;
            padding: 4px 10px;
            border-radius: 9999px;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            background: rgba(15, 23, 42, 0.6);
            color: #ffffff;
            backdrop-filter: blur(4px);
        }

        .btn-delete-absolute {
            position: absolute;
            top: 12px;
            right: 12px;
            z-index: 10;
            height: 32px;
            width: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #ef4444;
            color: #ffffff;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(239, 68, 68, 0.2);
            transition: all 0.2s;
        }

        .btn-delete-absolute:hover {
            background: #dc2626;
            transform: scale(1.08);
        }

        .image-container {
            position: relative;
            width: 100%;
            padding-top: 56.25%; /* 16:9 Aspect Ratio */
            background: #f8fafc;
            border-bottom: 1px solid #f1f5f9;
            overflow: hidden;
        }

        .image-container img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .slide-card:hover .image-container img {
            transform: scale(1.04);
        }

        .upload-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.4);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.25s ease;
            cursor: pointer;
            color: #ffffff;
        }

        .image-container:hover .upload-overlay {
            opacity: 1;
        }

        .card-body {
            padding: 18px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .status-section {
            margin-bottom: 16px;
        }

        .status-title {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #94a3b8;
        }

        .status-badge-inline {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            font-weight: 600;
            margin-top: 4px;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
        }

        .status-custom { color: #16a34a; }
        .status-custom .status-dot { background: #22c55e; }

        .status-default { color: #d97706; }
        .status-default .status-dot { background: #f59e0b; }

        .status-empty { color: #94a3b8; }
        .status-empty .status-dot { background: #cbd5e1; }

        .btn-select-full {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px 16px;
            background: #ffffff;
            border: 1px solid #cbd5e1;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 600;
            color: #475569;
            cursor: pointer;
            box-shadow: 0 1px 2px rgba(0,0,0,0.05);
            transition: all 0.2s;
        }

        .btn-select-full:hover {
            background: #f8fafc;
            border-color: #2e7d32;
            color: #2e7d32;
        }

        .logo-file-input { display: none; }

        /* STATS HEADER */
        .stats-header-card {
            display: flex;
            align-items: center;
            gap: 24px;
            background: linear-gradient(135deg, #2e7d32 0%, #1f5a26 100%);
            color: #ffffff;
            padding: 20px 28px;
            border-radius: 18px;
            margin-bottom: 28px;
            box-shadow: 0 8px 24px rgba(46,125,50,0.18);
        }

        .stats-item {
            display: flex;
            flex-direction: column;
        }

        .stats-label {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            opacity: 0.8;
            font-weight: 600;
        }

        .stats-value {
            font-size: 20px;
            font-weight: 700;
            margin-top: 2px;
        }

        .stats-divider {
            width: 1px;
            height: 36px;
            background: rgba(255, 255, 255, 0.25);
        }

        /* BUTTONS */
        .form-actions { display: flex; justify-content: flex-end; margin-top: 28px; }
        .btn-save { padding: 12px 28px; border-radius: 12px; background: linear-gradient(135deg, #2e7d32, #1b5e20); color: #fff; font-size: 14px; font-weight: 600; border: none; cursor: pointer; transition: all 0.2s; display: inline-flex; align-items: center; gap: 8px; box-shadow: 0 4px 12px rgba(46,125,50,0.2); }
        .btn-save:hover { transform: translateY(-1px); box-shadow: 0 6px 16px rgba(46,125,50,0.3); }

        /* ALERTS */
        .alert-success { display: flex; align-items: center; gap: 12px; padding: 14px 20px; background: #10b981; color: #fff; border-radius: 12px; font-size: 13.5px; font-weight: 500; margin-bottom: 24px; }
        .alert-success-icon { display: flex; align-items: center; justify-content: center; width: 22px; height: 22px; background: rgba(255,255,255,0.2); border-radius: 50%; }
        .alert-error { display: flex; gap: 12px; padding: 14px 20px; background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; border-radius: 12px; font-size: 13.5px; margin-bottom: 24px; }
    </style>
</head>
<body>

@php
    $activeCount = 0;
    for ($i = 1; $i <= 5; $i++) {
        if (!empty($settings['hero_image_' . $i])) {
            $activeCount++;
        }
    }
@endphp

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

            <a href="{{ route('admin.beranda') }}" class="nav-item active">
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

            <a href="{{ route('admin.pengaturan') }}" class="nav-item">
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
        <form method="POST" action="{{ route('admin.beranda.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Topbar -->
            <header class="topbar">
                <div class="topbar-left">
                    <h2>Kelola Beranda</h2>
                    <p>Kelola slideshow banner hero halaman utama website Desa Bade</p>
                </div>
                <div class="topbar-right" style="display: flex; align-items: center; gap: 20px;">
                    <button type="submit" class="btn-save" style="margin: 0; padding: 10px 20px; font-size: 13px;">
                        <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-right: 4px;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        Simpan Slide Hero
                    </button>
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

                {{-- Alert Unsaved Changes --}}
                <div id="unsaved-alert" class="alert-error" style="display: none; background: #fffbeb; border: 1px solid #fef3c7; color: #b45309; align-items: center; gap: 12px; margin-bottom: 24px;">
                    <svg width="20" height="20" fill="none" stroke="#d97706" viewBox="0 0 24 24" style="flex-shrink:0;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    <p style="margin:0; font-size:13.5px; font-weight:600;">Ada perubahan yang belum disimpan! Jangan lupa klik tombol <strong>"Simpan Slide Hero"</strong> di pojok kanan atas.</p>
                </div>

                <div class="card">
                    <p class="card-title">Kelola Slide Hero Beranda</p>

                    <!-- GRID CARD CAROUSEL -->
                    <div class="card-grid">
                        @for ($i = 1; $i <= 5; $i++)
                            @php
                                $val = $settings['hero_image_' . $i] ?? '';
                                $hasImage = (!empty($val) && $val !== 'none');
                                $isDeleted = ($val === 'none');
                                
                                // Determine image preview source URL
                                if ($hasImage) {
                                    $imgSrc = asset($val);
                                } else if ($i == 1 && !$isDeleted) {
                                    $imgSrc = asset('hero-foto-utama.jpg');
                                } else if ($i == 2 && !$isDeleted) {
                                    $imgSrc = asset('hero-foto-perahu.png');
                                } else {
                                    $imgSrc = 'https://placehold.co/600x400/e2e8f0/64748b?text=Kosong';
                                }

                                // Delete button is visible if there is an image to delete:
                                // - For Slide 1 and 2: visible if not explicitly disabled ('none')
                                // - For Slide 3, 4, 5: visible only if custom image is set
                                $showDelete = false;
                                if ($i <= 2) {
                                    $showDelete = !$isDeleted;
                                } else {
                                    $showDelete = $hasImage;
                                }
                            @endphp
                            <div class="slide-card">
                                <!-- Badge Slide Number -->
                                <div class="slide-badge">Slide {{ $i }}</div>

                                <!-- Aspect Ratio Image Preview -->
                                <div class="image-container" onclick="document.getElementById('hero_image_{{ $i }}').click()">
                                    <img id="hero-{{ $i }}-preview" 
                                         src="{{ $imgSrc }}" 
                                         alt="Slide {{ $i }}"
                                         @if(!$hasImage && ($i > 2 || $isDeleted)) style="opacity: 0.55;" @endif>
                                    
                                    <!-- Hover upload overlay -->
                                    <div class="upload-overlay">
                                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5"/></svg>
                                        <span style="font-size: 11px; font-weight: 700; margin-top: 6px; text-transform: uppercase; letter-spacing: 0.5px;">Unggah Foto</span>
                                    </div>
                                </div>

                                <!-- Button Delete Absolute (Top Right) -->
                                <button type="button" id="btn-delete-{{ $i }}" class="btn-delete-absolute" 
                                        style="display: {{ $showDelete ? 'flex' : 'none' }};" 
                                        title="Hapus gambar slide ini"
                                        onclick="event.stopPropagation(); deleteHero({{ $i }}, 'hero-{{ $i }}-preview', 'btn-delete-{{ $i }}', 'delete_hero_image_{{ $i }}', 'status-text-{{ $i }}')">
                                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>

                                <!-- Card Footer Body -->
                                <div class="card-body">
                                    <div class="status-section">
                                        <span class="status-title">Status Slot</span>
                                        <div id="status-text-{{ $i }}">
                                            @if($hasImage)
                                                <span class="status-badge-inline status-custom">
                                                    <span class="status-dot"></span> Foto Kustom
                                                </span>
                                            @elseif($i <= 2 && !$isDeleted)
                                                <span class="status-badge-inline status-default">
                                                    <span class="status-dot"></span> Gambar Bawaan
                                                </span>
                                            @else
                                                <span class="status-badge-inline status-empty">
                                                    <span class="status-dot"></span> Kosong
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="action-section">
                                        <input type="hidden" name="delete_hero_image_{{ $i }}" id="delete_hero_image_{{ $i }}" value="0">
                                        <input type="file" id="hero_image_{{ $i }}" name="hero_image_{{ $i }}" class="logo-file-input" accept="image/*" onchange="previewHero(this, 'hero-{{ $i }}-preview', 'btn-delete-{{ $i }}', 'delete_hero_image_{{ $i }}', 'status-text-{{ $i }}', {{ $i }})">
                                        
                                        <button type="button" class="btn-select-full" onclick="document.getElementById('hero_image_{{ $i }}').click()">
                                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                                            Pilih Berkas Foto
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>

        </main>
        </form>
    </div>
</div>

<script>
    // Toggle Nav sidebar group
    function toggleNav(id, header) {
        const submenu = document.getElementById(id);
        const icon = document.getElementById(id + '-icon');
        submenu.classList.toggle('open');
        icon.classList.toggle('open');
    }

    function showUnsavedAlert() {
        const alertBox = document.getElementById('unsaved-alert');
        if (alertBox) {
            alertBox.style.display = 'flex';
        }
    }

    // Image upload preview
    function previewHero(input, targetId, deleteBtnId, hiddenInputId, statusId, index) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.getElementById(targetId);
                img.src = e.target.result;
                img.style.opacity = '1';
                
                // Show delete button
                document.getElementById(deleteBtnId).style.display = 'flex';
                
                // Reset hidden delete status
                document.getElementById(hiddenInputId).value = '0';
                
                // Update status badge to Custom
                document.getElementById(statusId).innerHTML = `
                    <span class="status-badge-inline status-custom">
                        <span class="status-dot"></span> Pilihan Baru (Belum Disimpan)
                    </span>
                `;
                
                showUnsavedAlert();
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Reset slide slot
    function deleteHero(index, previewId, deleteBtnId, hiddenInputId, statusId) {
        const fileInput = document.getElementById('hero_image_' + index);
        fileInput.value = '';
        
        const previewImg = document.getElementById(previewId);
        previewImg.src = "https://placehold.co/600x400/e2e8f0/64748b?text=Kosong";
        previewImg.style.opacity = '0.55';
        
        document.getElementById(statusId).innerHTML = `
            <span class="status-badge-inline status-empty">
                <span class="status-dot"></span> Kosong (Belum Disimpan)
            </span>
        `;
        
        document.getElementById(deleteBtnId).style.display = 'none';
        document.getElementById(hiddenInputId).value = '1';
        
        showUnsavedAlert();
    }
</script>

</body>
</html>
