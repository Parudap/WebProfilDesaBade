<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kotak Pesan - Admin Desa Bade</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        h1, h2, h3, h4, h5, h6 { font-family: 'Cinzel', serif; } 
        *{box-sizing:border-box}body{font-family:'Plus Jakarta Sans',sans-serif;background:#f4f6fb;color:#1e293b;margin:0}
        ::-webkit-scrollbar{width:5px}::-webkit-scrollbar-thumb{background:#cbd5e1;border-radius:10px}
        .layout{display:flex;height:100vh;overflow:hidden}
        .sidebar{width:260px;min-width:260px;background:#fff;border-right:1px solid #e2e8f0;display:flex;flex-direction:column;overflow:hidden}
        .sidebar-brand{padding:28px 24px 20px;border-bottom:1px solid #e2e8f0}
        .brand-logo{display:flex;align-items:center;gap:12px}
        .brand-icon{width:40px;height:40px;background:linear-gradient(135deg,#2e7d32,#1b5e20);border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0;box-shadow:0 4px 14px rgba(46,125,50,.3);color:white}
        .brand-text h1{font-size:16px;font-weight:700;color:#1e293b;margin:0}
        .brand-text p{font-size:11px;color:#2e7d32;font-weight:600;margin:2px 0 0;text-transform:uppercase;letter-spacing:1px}
        .sidebar-nav{flex:1;padding:16px 12px;overflow-y:auto}
        .nav-section-label{font-size:10px;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:1.2px;padding:0 12px;margin:16px 0 8px}
        .nav-item{display:flex;align-items:center;gap:10px;padding:10px 14px;border-radius:10px;font-size:14px;font-weight:500;color:#64748b;transition:all .2s;text-decoration:none;margin-bottom:2px}
        .nav-item:hover{background:#f1f5f9;color:#1e293b}
        .nav-item.active{background:#f0fdf4;color:#2e7d32;font-weight:600}
        .nav-item.active .nav-icon{opacity:1}
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
        .btn-logout{display:flex;align-items:center;justify-content:center;gap:8px;width:100%;padding:10px;border-radius:10px;font-size:13px;font-weight:600;color:#ef4444;background:#fef2f2;border:1px solid #fecaca;cursor:pointer;transition:all .2s;font-family:inherit}
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
        
        /* Stats cards */
        .stats-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:20px;margin-bottom:24px}
        .stat-card{background:#fff;border-radius:16px;border:1px solid #e2e8f0;padding:20px;display:flex;align-items:center;gap:16px}
        .stat-icon{width:56px;height:56px;border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:24px;flex-shrink:0}
        .stat-icon.primary{background:#f0fdf4;color:#2e7d32}
        .stat-icon.danger{background:#fef2f2;color:#ef4444}
        .stat-icon.slate{background:#f1f5f9;color:#64748b}
        .stat-info p{margin:0;font-size:13px;color:#64748b;font-weight:600}
        .stat-info h3{margin:4px 0 0;font-size:24px;font-weight:800;color:#1e293b}

        .card{background:#fff;border:1px solid #e2e8f0;border-radius:16px}
        .tabs{display:flex;gap:4px;background:#f1f5f9;border-radius:10px;padding:4px;margin-bottom:20px;width:fit-content;flex-wrap:wrap}
        .tab-btn{padding:7px 16px;border-radius:8px;font-size:13px;font-weight:600;color:#64748b;background:transparent;border:none;cursor:pointer;transition:all .2s;font-family:inherit;text-decoration:none}
        .tab-btn.active{background:#fff;color:#2e7d32;box-shadow:0 1px 6px rgba(0,0,0,.08)}
        
        table{width:100%;border-collapse:collapse}
        thead tr{background:#f8fafc;border-bottom:1px solid #e2e8f0}
        th{padding:12px 16px;font-size:11px;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:.8px;white-space:nowrap;text-align:left}
        tbody tr{border-bottom:1px solid #f1f5f9;transition:background .15s}
        tbody tr:last-child{border-bottom:none}
        tbody tr:hover{background:#fafbff}
        td{padding:16px;font-size:13px;color:#334155;vertical-align:top}
        .td-no{width:48px;color:#94a3b8;font-weight:600;text-align:center}
        
        .sender-name{font-weight:700;color:#1e293b;font-size:14px;margin-bottom:2px}
        .sender-email{color:#64748b;font-size:12px}
        .msg-subject{font-weight:700;color:#1e293b;margin-bottom:4px}
        .msg-preview{color:#64748b;line-height:1.5;margin-bottom:8px}
        .msg-time{color:#94a3b8;font-size:12px;white-space:nowrap}
        
        .badge{display:inline-flex;align-items:center;padding:4px 10px;border-radius:6px;font-size:11px;font-weight:700}
        .badge-unread{background:#fef2f2;color:#ef4444;border:1px solid #fecaca}
        .badge-read{background:#f1f5f9;color:#64748b;border:1px solid #e2e8f0}
        
        .btn-outline{display:inline-flex;align-items:center;gap:6px;padding:6px 12px;background:#fff;color:#2e7d32;border-radius:8px;font-size:12px;font-weight:600;border:1px solid #bbf7d0;cursor:pointer;transition:all .15s;font-family:inherit}
        .btn-outline:hover{background:#f0fdf4}
        .btn-del{padding:6px 12px;border-radius:8px;font-size:12px;font-weight:600;color:#ef4444;background:#fff;border:1px solid #fecaca;cursor:pointer;transition:all .15s;font-family:inherit;display:inline-flex;align-items:center;gap:6px}
        .btn-del:hover{background:#fef2f2}
        .btn-read-all{display:inline-flex;align-items:center;gap:8px;padding:9px 18px;background:#fff;color:#2e7d32;border-radius:10px;font-size:13px;font-weight:600;border:1px solid #bbf7d0;cursor:pointer;transition:all .2s;font-family:inherit}
        .btn-read-all:hover{background:#f0fdf4}
        
        .empty-state{text-align:center;padding:60px 20px}
        .empty-icon{width:80px;height:80px;background:#f8fafc;border-radius:24px;display:flex;align-items:center;justify-content:center;margin:0 auto 20px;color:#94a3b8}
        .empty-state h3{font-size:18px;font-weight:700;color:#1e293b;margin:0 0 8px}
        .empty-state p{font-size:14px;color:#64748b;margin:0}

        .modal-backdrop{position:fixed;inset:0;background:rgba(15,23,42,.45);backdrop-filter:blur(4px);z-index:100;display:none;align-items:center;justify-content:center;opacity:0;pointer-events:none;transition:opacity .2s}
        .modal-backdrop.open{display:flex;opacity:1;pointer-events:all}
        .modal{background:#fff;border-radius:18px;width:540px;max-width:95vw;max-height:90vh;display:flex;flex-direction:column;box-shadow:0 24px 60px rgba(0,0,0,.18);transform:translateY(16px) scale(.97);transition:all .25s}
        .modal-backdrop.open .modal{transform:translateY(0) scale(1)}
        .modal-header{padding:22px 24px 16px;border-bottom:1px solid #f1f5f9;display:flex;align-items:center;justify-content:space-between}
        .modal-title{font-size:17px;font-weight:700;color:#1e293b;display:flex;align-items:center;gap:8px}
        .modal-close{width:32px;height:32px;border-radius:8px;border:1px solid #e2e8f0;background:#f8fafc;color:#64748b;display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:16px;transition:all .15s}
        .modal-close:hover{background:#f1f5f9}
        .modal-body{padding:24px;overflow-y:auto}
        .modal-footer{padding:16px 24px;border-top:1px solid #f1f5f9;display:flex;gap:10px;justify-content:flex-end}
        
        .msg-detail-header{margin-bottom:20px}
        .msg-detail-subject{font-size:18px;font-weight:800;color:#1e293b;margin:0 0 16px}
        .msg-detail-sender{display:flex;align-items:center;gap:12px}
        .msg-detail-avatar{width:42px;height:42px;background:#f1f5f9;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:16px;font-weight:700;color:#64748b}
        .msg-detail-info p{margin:0}
        .msg-detail-name{font-weight:700;color:#1e293b;font-size:14px}
        .msg-detail-email{color:#64748b;font-size:13px}
        .msg-detail-date{color:#94a3b8;font-size:12px;margin-top:2px}
        .msg-detail-content{background:#f8fafc;border:1px solid #e2e8f0;border-radius:12px;padding:20px;font-size:14px;color:#334155;line-height:1.6;white-space:pre-wrap}
        
        .btn-muted{padding:10px 18px;background:#f8fafc;color:#64748b;border-radius:9px;font-size:13px;font-weight:600;border:1px solid #e2e8f0;cursor:pointer;font-family:inherit}
        .btn-muted:hover{background:#f1f5f9}
        .btn-danger{padding:10px 22px;background:#ef4444;color:white;border-radius:9px;font-size:13px;font-weight:600;border:none;cursor:pointer;font-family:inherit}
        .btn-danger:hover{background:#dc2626}
        
        .confirm-icon{width:52px;height:52px;background:#fef2f2;border-radius:14px;display:flex;align-items:center;justify-content:center;margin:0 auto 14px;font-size:24px;color:#ef4444}
        .confirm-text{text-align:center}
        .confirm-text h3{font-size:16px;font-weight:700;color:#1e293b;margin:0 0 6px}
        .confirm-text p{font-size:13px;color:#64748b;margin:0}
        
        /* Pagination */
        .pagination-wrap{padding:16px 24px;border-top:1px solid #f1f5f9}
        .pagination-wrap nav{display:flex;justify-content:space-between;align-items:center}
    </style>
</head>
<body>
<div class="layout">
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
        <a href="{{ route('admin.beranda') }}" class="nav-item">
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
                <a href="{{ route('admin.perangkat-desa') }}" class="nav-subitem">Perangkat Desa</a>
            </div>
        </div>
        <div class="nav-group">
            <div class="nav-group-header" onclick="toggleNav('infografis',this)">
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
        <a href="{{ route('admin.pengaturan') }}" class="nav-item">
            <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            <span>Pengaturan Website</span>
        </a>
        <a href="{{ route('admin.pesan') }}" class="nav-item active" style="position:relative;">
            <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="3" stroke-width="2"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M22 7l-10 7L2 7"/></svg>
            <span>Kotak Pesan</span>
            @if($unreadCount > 0)
            <span style="margin-left:auto;background:#ef4444;color:#fff;font-size:10px;font-weight:700;padding:2px 6px;border-radius:10px;min-width:18px;text-align:center;">{{ $unreadCount > 99 ? '99+' : $unreadCount }}</span>
            @endif
        </a>

        <a href="{{ route('home') }}" target="_blank" class="nav-item">
            <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            Lihat Website
        </a>
    </nav>
    <div class="sidebar-footer">
        <div class="admin-profile">
            <div class="admin-avatar">{{ strtoupper(substr(auth()->user()->name,0,1)) }}</div>
            <div class="admin-info"><p class="admin-name">{{ auth()->user()->name }}</p><p class="admin-role">Administrator</p></div>
        </div>
        <form method="POST" action="{{ route('admin.logout') }}">@csrf
            <button type="submit" class="btn-logout">
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                Keluar
            </button>
        </form>
    </div>
</aside>

<div class="main">
    <header class="topbar">
        <div class="topbar-left"><h2>Kotak Pesan</h2><p>Kelola pesan kritik dan saran dari masyarakat</p></div>
        <div class="breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a><span>&rsaquo;</span>
            <span style="color:#2e7d32;font-weight:600;">Kotak Pesan</span>
        </div>
    </header>

    <main class="page-content">
        @if(session('success'))
        <div class="alert-success">
            <div class="alert-success-icon"><svg width="15" height="15" fill="none" stroke="white" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg></div>
            <p>{{ session('success') }}</p>
        </div>
        @endif

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon primary"><svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="3" stroke-width="2"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M22 7l-10 7L2 7"/></svg></div>
                <div class="stat-info">
                    <p>Total Pesan Masuk</p>
                    <h3>{{ \App\Models\Pesan::count() }}</h3>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon danger"><svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg></div>
                <div class="stat-info">
                    <p>Belum Dibaca</p>
                    <h3>{{ $unreadCount }}</h3>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon slate"><svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76"/></svg></div>
                <div class="stat-info">
                    <p>Sudah Dibaca</p>
                    <h3>{{ \App\Models\Pesan::where('is_read', true)->count() }}</h3>
                </div>
            </div>
        </div>

        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;">
            <div class="tabs">
                <a href="{{ route('admin.pesan', ['filter'=>'all']) }}" class="tab-btn {{ $filter === 'all' ? 'active' : '' }}">Semua</a>
                <a href="{{ route('admin.pesan', ['filter'=>'unread']) }}" class="tab-btn {{ $filter === 'unread' ? 'active' : '' }}">Belum Dibaca <span style="font-size:11px;background:{{ $unreadCount > 0 ? '#ef4444' : '#e2e8f0' }};color:{{ $unreadCount > 0 ? '#fff' : '#64748b' }};border-radius:20px;padding:2px 7px;margin-left:4px;font-weight:700;">{{ $unreadCount }}</span></a>
                <a href="{{ route('admin.pesan', ['filter'=>'read']) }}" class="tab-btn {{ $filter === 'read' ? 'active' : '' }}">Sudah Dibaca</a>
            </div>
            
            @if($unreadCount > 0)
            <form action="{{ route('admin.pesan.read-all') }}" method="POST">
                @csrf
                <button type="submit" class="btn-read-all">
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                    Tandai Semua Dibaca
                </button>
            </form>
            @endif
        </div>

        <div class="card">
            @if($pesans->count() > 0)
            <div style="overflow-x:auto;">
                <table>
                    <thead><tr>
                        <th class="td-no">No</th>
                        <th>Pengirim</th>
                        <th>Pesan</th>
                        <th>Waktu</th>
                        <th>Status</th>
                        <th style="width:180px;text-align:right;">Aksi</th>
                    </tr></thead>
                    <tbody>
                        @foreach($pesans as $i => $item)
                        <tr style="{{ !$item->is_read ? 'background:#f8fafc;' : '' }}">
                            <td class="td-no">{{ $pesans->firstItem() + $i }}</td>
                            <td>
                                <div class="sender-name">{{ $item->nama }}</div>
                                <div class="sender-email">{{ $item->email ?? '-' }}</div>
                            </td>
                            <td>
                                <div class="msg-subject">{{ $item->subjek }}</div>
                                <div class="msg-preview">{{ Str::limit($item->pesan, 80) }}</div>
                                <button type="button" class="btn-outline" style="padding:4px 10px;font-size:11px;" onclick="openMsgModal({{ $item->id }}, '{{ addslashes($item->nama) }}', '{{ addslashes($item->email ?? '') }}', '{{ addslashes($item->subjek) }}', '{{ addslashes($item->pesan) }}', '{{ $item->created_at->translatedFormat('d M Y, H:i') }}')">
                                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    Baca Selengkapnya
                                </button>
                            </td>
                            <td class="msg-time">{{ $item->created_at->diffForHumans() }}<br><span style="font-size:11px;color:#cbd5e1">{{ $item->created_at->format('d/m/Y') }}</span></td>
                            <td>
                                @if($item->is_read)
                                <span class="badge badge-read">Sudah Dibaca</span>
                                @else
                                <span class="badge badge-unread">Belum Dibaca</span>
                                @endif
                            </td>
                            <td style="text-align:right">
                                <div style="display:flex;gap:6px;justify-content:flex-end">
                                    @if(!$item->is_read)
                                    <form action="{{ route('admin.pesan.read', $item) }}" method="POST">
                                        @csrf @method('PATCH')
                                        <button type="submit" class="btn-outline" title="Tandai Sudah Dibaca">
                                            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                        </button>
                                    </form>
                                    @endif
                                    <button class="btn-del" onclick="openDeleteModal({{ $item->id }},'{{ addslashes($item->subjek) }}')" title="Hapus Pesan">
                                        <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if($pesans->hasPages())
            <div class="pagination-wrap">
                {{ $pesans->links('pagination::tailwind') }}
            </div>
            @endif
            @else
            <div class="empty-state">
                <div class="empty-icon">
                    <svg width="40" height="40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="3" stroke-width="2"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M22 7l-10 7L2 7"/></svg>
                </div>
                <h3>Tidak Ada Pesan</h3>
                <p>Belum ada pesan masuk di kotak kritik dan saran.</p>
            </div>
            @endif
        </div>
    </main>
</div>
</div>

<!-- MODAL BACA PESAN -->
<div class="modal-backdrop" id="modal-msg">
    <div class="modal">
        <div class="modal-header">
            <span class="modal-title">
                <svg width="20" height="20" fill="none" stroke="#2e7d32" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                Detail Pesan
            </span>
            <button class="modal-close" onclick="closeModal('modal-msg')">&times;</button>
        </div>
        <div class="modal-body">
            <div class="msg-detail-header">
                <h3 class="msg-detail-subject" id="msg-subject"></h3>
                <div class="msg-detail-sender">
                    <div class="msg-detail-avatar" id="msg-avatar"></div>
                    <div class="msg-detail-info">
                        <p class="msg-detail-name" id="msg-name"></p>
                        <p class="msg-detail-email" id="msg-email"></p>
                        <p class="msg-detail-date" id="msg-date"></p>
                    </div>
                </div>
            </div>
            <div class="msg-detail-content" id="msg-content"></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn-muted" onclick="closeModal('modal-msg')">Tutup</button>
        </div>
    </div>
</div>

<!-- MODAL HAPUS -->
<div class="modal-backdrop" id="modal-delete">
    <div class="modal" style="width:400px">
        <div class="modal-body" style="padding-top:28px;">
            <div class="confirm-icon">
                <svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
            </div>
            <div class="confirm-text"><h3>Hapus Pesan?</h3><p>Pesan "<strong id="delete-name"></strong>" akan dihapus permanen.</p></div>
        </div>
        <form method="POST" id="form-delete" action="">@csrf @method('DELETE')
            <div class="modal-footer" style="justify-content:center;padding-top:0;">
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
function openModal(id){document.getElementById(id).classList.add('open')}
function closeModal(id){document.getElementById(id).classList.remove('open')}
document.querySelectorAll('.modal-backdrop').forEach(el=>el.addEventListener('click',e=>{if(e.target===el)closeModal(el.id)}));
document.addEventListener('keydown',e=>{if(e.key==='Escape')document.querySelectorAll('.modal-backdrop.open').forEach(el=>el.classList.remove('open'))});

function openMsgModal(id, nama, email, subjek, pesan, tanggal) {
    document.getElementById('msg-subject').textContent = subjek;
    document.getElementById('msg-name').textContent = nama;
    document.getElementById('msg-email').textContent = email ? email : 'Tidak ada email';
    document.getElementById('msg-date').textContent = tanggal;
    document.getElementById('msg-content').textContent = pesan;
    document.getElementById('msg-avatar').textContent = nama.charAt(0).toUpperCase();
    openModal('modal-msg');
}

function openDeleteModal(id, subjek){
    document.getElementById('form-delete').action=`/admin/pesan/${id}`;
    document.getElementById('delete-name').textContent=subjek;
    openModal('modal-delete');
}
</script>
</body>
</html>
