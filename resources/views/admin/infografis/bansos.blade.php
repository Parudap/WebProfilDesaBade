<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Bansos - Admin Desa Bade</title>
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
.page-grid{display:grid;grid-template-columns:1fr 360px;gap:24px;align-items:start}
.card{background:#fff;border:1px solid #e2e8f0;border-radius:16px;margin-bottom:24px}
.card-header{padding:18px 24px;border-bottom:1px solid #f1f5f9;display:flex;align-items:center;justify-content:space-between}
.card-title{font-size:15px;font-weight:700;color:#1e293b;margin:0;display:flex;align-items:center;gap:8px}
.card-body{padding:20px 24px}
table{width:100%;border-collapse:collapse}
thead tr{background:#f8fafc;border-bottom:1px solid #e2e8f0}
th{padding:12px 16px;font-size:11px;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:.8px;white-space:nowrap}
tbody tr{border-bottom:1px solid #f1f5f9;transition:background .15s}
tbody tr:last-child{border-bottom:none}
tbody tr:hover{background:#fafbff}
td{padding:13px 16px;font-size:13px;color:#334155;vertical-align:middle}
.td-no{width:48px;color:#94a3b8;font-weight:600;text-align:center}
.badge{display:inline-block;padding:3px 10px;border-radius:20px;font-size:12px;font-weight:600}
.badge-green{background:#f0fdf4;color:#16a34a;border:1px solid #86efac}
.badge-gray{background:#f8fafc;color:#64748b;border:1px solid #e2e8f0}
.btn-del{padding:5px 12px;border-radius:7px;font-size:12px;font-weight:600;color:#ef4444;background:#fef2f2;border:1px solid #fecaca;cursor:pointer;font-family:inherit}
.btn-del:hover{background:#fee2e2}
.btn-pdf{padding:5px 12px;border-radius:7px;font-size:12px;font-weight:600;color:#2e7d32;background:#f0fdf4;border:1px solid #bbf7d0;text-decoration:none;display:inline-flex;align-items:center;gap:4px}
.btn-pdf:hover{background:#dcfce7}
.btn-submit{width:100%;padding:11px;background:linear-gradient(135deg,#2e7d32,#1b5e20);color:white;border-radius:10px;font-size:14px;font-weight:600;border:none;cursor:pointer;font-family:inherit;margin-top:4px}
.btn-submit:hover{opacity:.95}
.btn-muted{padding:10px 18px;background:#f8fafc;color:#64748b;border-radius:9px;font-size:13px;font-weight:600;border:1px solid #e2e8f0;cursor:pointer;font-family:inherit}
.form-group{margin-bottom:16px}
.form-label{display:block;font-size:12px;font-weight:600;color:#374151;margin-bottom:6px}
.form-label .req{color:#ef4444;margin-left:2px}
.form-input,.form-textarea{width:100%;padding:9px 13px;border:1px solid #e2e8f0;border-radius:9px;font-size:13px;font-family:inherit;color:#1e293b;background:#fff;transition:all .2s}
.form-input:focus,.form-textarea:focus{outline:none;border-color:#2e7d32;box-shadow:0 0 0 3px rgba(46,125,50,.1)}
.form-textarea{resize:vertical;min-height:60px}
.file-drop{border:2px dashed #bbf7d0;border-radius:10px;padding:20px;text-align:center;cursor:pointer;background:#fafbff;position:relative}
.file-drop:hover{border-color:#2e7d32;background:#f0fdf4}
.file-drop input{position:absolute;inset:0;opacity:0;cursor:pointer;width:100%;height:100%}
.file-drop p{margin:4px 0;font-size:13px;color:#64748b}
.checkbox-label{display:flex;align-items:center;gap:8px;font-size:13px;font-weight:500;color:#374151;cursor:pointer}
.checkbox-label input{width:15px;height:15px;accent-color:#2e7d32}
.empty-row td{padding:40px;text-align:center;color:#94a3b8;font-size:13px}
.modal-backdrop{position:fixed;inset:0;background:rgba(15,23,42,.45);backdrop-filter:blur(4px);z-index:100;display:none;align-items:center;justify-content:center;opacity:0;pointer-events:none;transition:opacity .2s}
.modal-backdrop.open{display:flex;opacity:1;pointer-events:all}
.modal{background:#fff;border-radius:18px;width:440px;max-width:96vw;box-shadow:0 24px 60px rgba(0,0,0,.18);transform:translateY(16px) scale(.97);transition:all .25s}
.modal-backdrop.open .modal{transform:translateY(0) scale(1)}
.modal-body{padding:28px 24px}
.modal-footer{padding:0 24px 22px;display:flex;gap:10px;justify-content:center}
.confirm-icon{width:52px;height:52px;background:#fef2f2;border-radius:14px;display:flex;align-items:center;justify-content:center;margin:0 auto 14px;font-size:24px;color:#ef4444}
.confirm-text{text-align:center}
.confirm-text h3{font-size:16px;font-weight:700;color:#1e293b;margin:0 0 6px}
.confirm-text p{font-size:13px;color:#64748b;margin:0}
.btn-danger{padding:10px 22px;background:#ef4444;color:white;border-radius:9px;font-size:13px;font-weight:600;border:none;cursor:pointer;font-family:inherit}
.btn-danger:hover{background:#dc2626}
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
                <a href="{{ route('admin.infografis.bansos') }}" class="nav-subitem active-sub">Bansos</a>
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
        <div class="topbar-left"><h2>Bansos</h2><p>Kelola dokumen Bantuan Sosial Desa</p></div>
        <div class="breadcrumb"><a href="{{ route('admin.dashboard') }}">Dashboard</a><span>&rsaquo;</span><span>Infografis</span><span>&rsaquo;</span><span style="color:#2e7d32;font-weight:600">Bansos</span></div>
    </header>
    <main class="page-content">
        @if(session('success'))
        <div class="alert-success"><div class="alert-success-icon"><svg width="15" height="15" fill="none" stroke="white" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg></div><p>{{ session('success') }}</p></div>
        @endif
        <div class="page-grid">
            <div>
                <div class="card">
                    <div class="card-header">
                        <p class="card-title">
                            <svg width="18" height="18" fill="none" stroke="#2e7d32" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            Daftar Dokumen Bansos
                        </p>
                        <span style="font-size:12px;color:#94a3b8">{{ $list->count() }} dokumen</span>
                    </div>
                    <div style="overflow-x:auto">
                        <table>
                            <thead><tr><th class="td-no">No</th><th>Judul</th><th>Tahun</th><th>Keterangan</th><th>Status</th><th>Aksi</th></tr></thead>
                            <tbody>
                                @forelse($list as $i => $item)
                                <tr>
                                    <td class="td-no">{{ $i+1 }}</td>
                                    <td style="font-weight:600;max-width:200px">{{ $item->judul ?: ($item->nama_program ? $item->nama_program.' '.$item->tahun : 'Bansos '.$item->tahun) }}</td>
                                    <td style="font-weight:700;color:#2e7d32">{{ $item->tahun }}</td>
                                    <td style="color:#64748b;max-width:180px;font-size:12px">{{ $item->keterangan ?: '&mdash;' }}</td>
                                    <td>
                                        @if($item->is_active)
                                        <span class="badge badge-green">Aktif</span>
                                        @else
                                        <span class="badge badge-gray">Nonaktif</span>
                                        @endif
                                    </td>
                                    <td style="white-space:nowrap">
                                        @if($item->file_pdf)
                                        <a href="{{ asset('storage/'.$item->file_pdf) }}" target="_blank" class="btn-pdf">
                                            <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                            Lihat PDF
                                        </a>
                                        @endif
                                        <button class="btn-del" onclick="openDeleteModal({{ $item->id }},'{{ addslashes($item->judul ?: 'Bansos '.$item->tahun) }}')">Hapus</button>
                                    </td>
                                </tr>
                                @empty
                                <tr class="empty-row"><td colspan="6">Belum ada dokumen Bansos. Upload di panel kanan.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div>
                <div class="card" style="margin-bottom:0">
                    <div class="card-header">
                        <p class="card-title">
                            <svg width="18" height="18" fill="none" stroke="#2e7d32" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                            Upload Dokumen Bansos
                        </p>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.infografis.bansos.store') }}" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <label class="form-label">Judul Dokumen <span class="req">*</span></label>
                                <input type="text" name="judul" class="form-input" placeholder="cth: Data Bansos 2025" required maxlength="200">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Tahun <span class="req">*</span></label>
                                <input type="number" name="tahun" class="form-input" min="2000" max="2099" value="{{ date('Y') }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">File PDF <span class="req">*</span></label>
                                <div class="file-drop" onclick="document.getElementById('pdf-file').click()">
                                    <input type="file" id="pdf-file" name="file_pdf" accept=".pdf" required onchange="updateFileName(this)">
                                    <div style="font-size:24px;margin-bottom:6px;color:#2e7d32">
                                        <svg width="32" height="32" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin:0 auto"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                                    </div>
                                    <p id="file-name" style="font-weight:600;color:#2e7d32">Klik untuk pilih file PDF</p>
                                    <p style="font-size:11px">Maksimal 10 MB</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Keterangan</label>
                                <textarea name="keterangan" class="form-textarea" placeholder="Keterangan singkat (opsional)"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="checkbox-label"><input type="checkbox" name="is_active" value="1" checked> Set sebagai Dokumen Aktif</label>
                            </div>
                            <button type="submit" class="btn-submit">Upload Dokumen</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</div>
<div class="modal-backdrop" id="modal-delete">
    <div class="modal">
        <div class="modal-body" style="padding-top:28px">
            <div class="confirm-icon">
                <svg width="28" height="28" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
            </div>
            <div class="confirm-text"><h3>Hapus Dokumen Bansos?</h3><p>Dokumen <strong id="delete-name"></strong> akan dihapus permanen.</p></div>
        </div>
        <form method="POST" id="form-delete" action="">@csrf @method('DELETE')
            <div class="modal-footer" style="justify-content:center;padding-top:0"><button type="button" class="btn-muted" onclick="closeModal('modal-delete')">Batal</button><button type="submit" class="btn-danger">Ya, Hapus</button></div>
        </form>
    </div>
</div>
<script>
function toggleNav(id){document.getElementById(id).classList.toggle('open');document.getElementById(id+'-icon').classList.toggle('open')}
function openModal(id){document.getElementById(id).classList.add('open')}
function closeModal(id){document.getElementById(id).classList.remove('open')}
document.querySelectorAll('.modal-backdrop').forEach(el=>el.addEventListener('click',e=>{if(e.target===el)closeModal(el.id)}));
function openDeleteModal(id,name){document.getElementById('form-delete').action=`/admin/infografis/bansos/${id}`;document.getElementById('delete-name').textContent=name;openModal('modal-delete')}
function updateFileName(input){if(input.files&&input.files[0]){document.getElementById('file-name').textContent=input.files[0].name}}
</script></body></html>