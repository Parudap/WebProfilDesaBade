<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sejarah Desa - Admin Desa Bade</title>
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
        .brand-text h1 { font-size: 16px; font-weight: 700; color: #1e293b; margin: 0; }
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
        .admin-info p { margin: 0; }
        .admin-name { font-size: 13px; font-weight: 600; color: #1e293b; }
        .admin-role { font-size: 11px; color: #94a3b8; margin-top: 1px !important; }
        .btn-logout { display: flex; align-items: center; justify-content: center; gap: 8px; width: 100%; padding: 10px; border-radius: 10px; font-size: 13px; font-weight: 600; color: #ef4444; background: #fef2f2; border: 1px solid #fecaca; cursor: pointer; transition: all 0.2s; font-family: inherit; }
        .btn-logout:hover { background: #fee2e2; border-color: #fca5a5; }

        /* MAIN */
        .main { flex: 1; display: flex; flex-direction: column; overflow: hidden; }
        .topbar { padding: 18px 32px; border-bottom: 1px solid #e2e8f0; display: flex; align-items: center; justify-content: space-between; background: #fff; flex-shrink: 0; }
        .topbar-left h2 { font-size: 20px; font-weight: 700; color: #1e293b; margin: 0; }
        .topbar-left p { font-size: 13px; color: #94a3b8; margin: 3px 0 0; }
        .breadcrumb { display: flex; align-items: center; gap: 6px; font-size: 13px; color: #94a3b8; }
        .breadcrumb a { color: #2e7d32; text-decoration: none; font-weight: 500; }
        .breadcrumb a:hover { text-decoration: underline; }
        .breadcrumb span { color: #cbd5e1; }

        /* PAGE */
        .page-content { flex: 1; overflow-y: auto; padding: 32px; }
        .page-grid { display: grid; grid-template-columns: 1fr 340px; gap: 24px; align-items: start; }

        /* ALERTS */
        .alert-success { display: flex; align-items: center; gap: 12px; padding: 14px 18px; background: #f0fdf4; border: 1px solid #86efac; border-radius: 12px; margin-bottom: 24px; }
        .alert-success-icon { width: 36px; height: 36px; background: #22c55e; border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .alert-success p { margin: 0; font-size: 14px; font-weight: 600; color: #15803d; }
        .alert-error { display: flex; align-items: flex-start; gap: 12px; padding: 14px 18px; background: #fef2f2; border: 1px solid #fca5a5; border-radius: 12px; margin-bottom: 24px; }

        /* CARD */
        .card { background: #fff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 28px; }
        .card-title { font-size: 16px; font-weight: 700; color: #1e293b; margin: 0 0 4px; }
        .card-subtitle { font-size: 13px; color: #94a3b8; margin: 0 0 22px; }

        /* FORM */
        .form-label { display: block; font-size: 13px; font-weight: 600; color: #374151; margin-bottom: 8px; }
        .form-label span { color: #ef4444; margin-left: 2px; }
        .form-hint { font-size: 12px; color: #94a3b8; margin-top: 6px; }
        .char-count { font-size: 11px; color: #94a3b8; text-align: right; margin-top: 4px; }
        .char-count.warn { color: #f59e0b; }
        .char-count.over { color: #ef4444; }

        .input-sejarah {
            width: 100%; padding: 14px 16px;
            border: 1px solid #e2e8f0; border-radius: 12px;
            font-size: 14px; font-family: inherit; color: #1e293b;
            background: #fff; transition: all 0.2s;
            resize: vertical; min-height: 420px; line-height: 1.8;
        }
        .input-sejarah:focus { outline: none; border-color: #2e7d32; box-shadow: 0 0 0 3px rgba(46,125,50,0.1); }
        .input-sejarah.error { border-color: #ef4444; }

        /* Toolbar */
        .editor-toolbar {
            display: flex; gap: 6px; flex-wrap: wrap;
            padding: 10px 12px; background: #f8fafc;
            border: 1px solid #e2e8f0; border-bottom: none;
            border-radius: 12px 12px 0 0;
        }
        .editor-toolbar + .input-sejarah { border-top-left-radius: 0; border-top-right-radius: 0; }
        .tb-btn {
            display: inline-flex; align-items: center; gap: 4px;
            padding: 5px 10px; border-radius: 6px;
            border: 1px solid #e2e8f0; background: #fff;
            font-size: 12px; font-weight: 600; color: #475569;
            cursor: pointer; transition: all 0.15s; font-family: inherit;
        }
        .tb-btn:hover { background: #f0fdf4; border-color: #bbf7d0; color: #2e7d32; }

        /* Stats bar */
        .stats-bar { display: flex; gap: 16px; margin-top: 10px; }
        .stat-pill { display: flex; align-items: center; gap: 6px; font-size: 12px; color: #64748b; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 20px; padding: 4px 12px; }
        .stat-pill span { font-weight: 700; color: #2e7d32; }

        /* FORM ACTIONS */
        .form-actions { display: flex; gap: 10px; margin-top: 22px; align-items: center; }
        .btn-save { display: flex; align-items: center; gap: 8px; padding: 11px 24px; background: linear-gradient(135deg, #2e7d32, #1b5e20); color: white; border-radius: 10px; font-size: 14px; font-weight: 600; border: none; cursor: pointer; transition: all 0.25s; font-family: inherit; box-shadow: 0 4px 14px rgba(46,125,50,0.3); }
        .btn-save:hover { transform: translateY(-1px); box-shadow: 0 6px 20px rgba(46,125,50,0.4); }
        .btn-save:disabled { opacity: 0.7; transform: none; cursor: not-allowed; }
        .btn-cancel { display: flex; align-items: center; gap: 8px; padding: 11px 20px; background: #f8fafc; color: #64748b; border-radius: 10px; font-size: 14px; font-weight: 600; border: 1px solid #e2e8f0; cursor: pointer; transition: all 0.2s; font-family: inherit; text-decoration: none; }
        .btn-cancel:hover { background: #f1f5f9; }

        /* PREVIEW */
        .preview-card { background: #fff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 22px; position: sticky; top: 0; }
        .preview-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 14px; }
        .preview-title { font-size: 14px; font-weight: 700; color: #1e293b; display: flex; align-items: center; gap: 6px; }
        .preview-badge { font-size: 11px; font-weight: 600; padding: 3px 9px; border-radius: 20px; background: #f0fdf4; color: #2e7d32; border: 1px solid #bbf7d0; }
        .preview-label { font-size: 11px; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.8px; margin-bottom: 10px; }
        .preview-body { font-size: 13px; color: #475569; line-height: 1.8; max-height: 320px; overflow-y: auto; word-break: break-word; }
        .preview-body::-webkit-scrollbar { width: 3px; }
        .preview-body::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
        .preview-empty { font-size: 13px; color: #cbd5e1; font-style: italic; }
        .preview-divider { height: 1px; background: #f1f5f9; margin: 14px 0; }

        /* Tips */
        .tips-card { background: #fffbeb; border: 1px solid #fde68a; border-radius: 12px; padding: 16px; margin-top: 16px; }
        .tips-title { font-size: 12px; font-weight: 700; color: #92400e; margin: 0 0 8px; display: flex; align-items: center; gap: 6px; }
        .tips-list { margin: 0; padding: 0 0 0 16px; }
        .tips-list li { font-size: 12px; color: #78350f; margin-bottom: 4px; line-height: 1.5; }
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
            <a href="{{ route('admin.dashboard') }}" class="nav-item">
                <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Beranda
            </a>

                    <div class="nav-section-label">Kelola Konten</div>
        <a href="{{ route('admin.beranda') }}" class="nav-item {{ request()->routeIs('admin.beranda') ? 'active' : '' }}">
            <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            <span>Kelola Beranda</span>
        </a>

            <div class="nav-group">
                <div class="nav-group-header" onclick="toggleNav('profil', this)">
                    <div class="nav-group-header-left">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                        <span>Profil Desa</span>
                    </div>
                    <svg id="profil-icon" class="nav-group-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>
                <div id="profil" class="nav-submenu">
                    <a href="{{ route('admin.visi-misi') }}" class="nav-subitem">Visi &amp; Misi</a>
                    <a href="{{ route('admin.sejarah') }}" class="nav-subitem active-sub">Sejarah Desa</a>
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

<a href="{{ route('home') }}" target="_blank" class="nav-item">
                <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
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
                <h2>Sejarah Desa</h2>
                <p>Kelola narasi sejarah Desa Bade</p>
            </div>
            <div class="breadcrumb">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                <span>&rsaquo;</span>
                <span>Profil Desa</span>
                <span>&rsaquo;</span>
                <span style="color:#2e7d32;font-weight:600;">Sejarah Desa</span>
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

            <div class="page-grid">

                <!-- FORM -->
                <form method="POST" action="{{ route('admin.sejarah.update') }}" id="form-sejarah">
                    @csrf
                    @method('PUT')

                    <div class="card">
                        <p class="card-title">Narasi Sejarah Desa</p>
                        <p class="card-subtitle">Tulis ringkasan perjalanan Desa Bade &mdash; asal-usul, perkembangan, hingga kondisi saat ini</p>

                        {{-- Toolbar --}}
                        <div class="editor-toolbar">
                            <button type="button" class="tb-btn" onclick="insertText('\n\n', '')">
                                <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/></svg>
                                Paragraf Baru
                            </button>
                            <button type="button" class="tb-btn" onclick="insertText('&bull; ', '')">&bull; Bullet</button>
                            <button type="button" class="tb-btn" onclick="insertText('&rdquo;', '&rdquo;')">&rdquo; Kutipan</button>
                            <button type="button" class="tb-btn" onclick="clearText()" style="color:#ef4444;border-color:#fca5a5;">
                                <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                Hapus Semua
                            </button>
                        </div>
                        <textarea
                            id="sejarah-input"
                            name="sejarah"
                            class="input-sejarah {{ $errors->has('sejarah') ? 'error' : '' }}"
                            placeholder="Tulis sejarah desa di sini...

Contoh:
Desa Bade merupakan salah satu desa di Kecamatan Klego, Kabupaten Boyolali. Nama 'Bade' berasal dari...

&bull; Didirikan pada masa pemerintahan...
&bull; Berkembang pesat sejak tahun...
&bull; Saat ini menjadi desa dengan..."
                            oninput="onSejarahInput()"
                        >{{ old('sejarah', $profil->sejarah) }}</textarea>

                        <div style="display:flex;justify-content:space-between;align-items:center;margin-top:8px;">
                            <div class="stats-bar" id="stats-bar">
                                <div class="stat-pill">Karakter: <span id="cnt-char">0</span></div>
                                <div class="stat-pill">Kata: <span id="cnt-word">0</span></div>
                                <div class="stat-pill">Paragraf: <span id="cnt-para">0</span></div>
                            </div>
                            <div class="char-count" id="char-warn"></div>
                        </div>

                        @error('sejarah')
                            <p style="margin:8px 0 0;font-size:12px;color:#ef4444;">{{ $message }}</p>
                        @enderror

                        <div class="form-actions">
                            <button type="submit" class="btn-save" id="btn-save">
                                <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                </svg>
                                Simpan Perubahan
                            </button>
                            <a href="{{ route('admin.dashboard') }}" class="btn-cancel">Batal</a>
                            <a href="{{ route('profil') }}" target="_blank" class="btn-cancel" style="margin-left:auto;">
                                <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                </svg>
                                Lihat di Website
                            </a>
                        </div>
                    </div>
                </form>

                <!-- PANEL KANAN -->
                <div>
                    <!-- Preview -->
                    <div class="preview-card">
                        <div class="preview-header">
                            <span class="preview-title">
                                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                Preview
                            </span>
                            <span class="preview-badge">Live</span>
                        </div>
                        <div class="preview-label">Tampilan di Halaman Profil Desa</div>
                        <div class="preview-body" id="preview-body">
                            @if($profil->sejarah)
                                {!! nl2br(e($profil->sejarah)) !!}
                            @else
                                <span class="preview-empty">Sejarah belum diisi...</span>
                            @endif
                        </div>
                        <div class="preview-divider"></div>
                        <p style="font-size:11px;color:#94a3b8;margin:0;text-align:center;">
                            Preview berubah otomatis saat Anda mengetik
                        </p>
                    </div>

                    <!-- Tips -->
                    <div class="tips-card">
                        <p class="tips-title">
                            <svg width="16" height="16" fill="none" stroke="#d97706" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Tips Penulisan Sejarah
                        </p>
                        <ul class="tips-list">
                            <li>Mulai dengan asal-usul nama desa</li>
                            <li>Ceritakan tokoh pendiri / pejuang lokal</li>
                            <li>Sertakan perkembangan pemerintahan</li>
                            <li>Tutup dengan kondisi &amp; visi desa sekarang</li>
                            <li>Gunakan bahasa formal namun mudah dipahami</li>
                        </ul>
                    </div>
                </div>

            </div>
        </main>
    </div>
</div>

<script>
    function toggleNav(id) {
        document.getElementById(id).classList.toggle('open');
        document.getElementById(id+'-icon').classList.toggle('open');
    }

    function onSejarahInput() {
        const val = document.getElementById('sejarah-input').value;
        document.getElementById('cnt-char').textContent = val.length.toLocaleString('id-ID');
        const words = val.trim() ? val.trim().split(/\s+/).length : 0;
        document.getElementById('cnt-word').textContent = words.toLocaleString('id-ID');
        const paras = val.trim() ? val.split(/\n+/).filter(p => p.trim() !== '').length : 0;
        document.getElementById('cnt-para').textContent = paras.toLocaleString('id-ID');

        const prev = document.getElementById('preview-body');
        if (val.trim()) {
            prev.innerHTML = val.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/\n/g, '<br>');
        } else {
            prev.innerHTML = '<span class="preview-empty">Sejarah belum diisi...</span>';
        }
    }

    function insertText(start, end) {
        const textarea = document.getElementById('sejarah-input');
        const selStart = textarea.selectionStart;
        const selEnd = textarea.selectionEnd;
        const text = textarea.value;
        const selected = text.substring(selStart, selEnd);
        const replacement = start + selected + end;
        textarea.value = text.substring(0, selStart) + replacement + text.substring(selEnd);
        textarea.focus();
        textarea.selectionStart = selStart + start.length;
        textarea.selectionEnd = selStart + start.length + selected.length;
        onSejarahInput();
    }

    function clearText() {
        if (confirm('Apakah Anda yakin ingin menghapus seluruh teks sejarah?')) {
            document.getElementById('sejarah-input').value = '';
            onSejarahInput();
        }
    }

    document.getElementById('form-sejarah').addEventListener('submit', function() {
        const btn = document.getElementById('btn-save');
        btn.disabled = true;
        btn.innerHTML = `<svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="animation:spin 1s linear infinite"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg> Menyimpan...`;
    });

    document.addEventListener('DOMContentLoaded', onSejarahInput);
</script>
<style>h1, h2, h3, h4, h5, h6 { font-family: 'Cinzel', serif; } 
    @keyframes spin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
</style>
</body>
</html>
