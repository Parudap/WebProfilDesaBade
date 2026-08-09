<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Kelola Layanan - Admin Desa Bade</title>
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<style>h1,h2,h3,h4,h5,h6{font-family:'Cinzel',serif}
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
.alert-error{display:flex;align-items:center;gap:12px;padding:14px 18px;background:#fef2f2;border:1px solid #fecaca;border-radius:12px;margin-bottom:24px}
.alert-error p{margin:0;font-size:14px;font-weight:600;color:#dc2626}
.btn-primary{display:inline-flex;align-items:center;gap:8px;padding:9px 18px;background:linear-gradient(135deg,#2e7d32,#1b5e20);color:white;border-radius:10px;font-size:13px;font-weight:600;border:none;cursor:pointer;font-family:inherit;box-shadow:0 3px 10px rgba(46,125,50,.3);text-decoration:none}
.btn-primary:hover{transform:translateY(-1px);box-shadow:0 5px 16px rgba(46,125,50,.4)}
.btn-secondary{display:inline-flex;align-items:center;gap:8px;padding:9px 18px;background:#fff;color:#475569;border-radius:10px;font-size:13px;font-weight:600;border:1px solid #e2e8f0;cursor:pointer;font-family:inherit;text-decoration:none}
.btn-secondary:hover{background:#f8fafc}
.btn-danger{display:inline-flex;align-items:center;gap:6px;padding:6px 12px;background:#fef2f2;color:#ef4444;border-radius:8px;font-size:12px;font-weight:600;border:1px solid #fecaca;cursor:pointer;font-family:inherit}
.btn-danger:hover{background:#fee2e2}
.btn-edit{display:inline-flex;align-items:center;gap:6px;padding:6px 12px;background:#eff6ff;color:#3b82f6;border-radius:8px;font-size:12px;font-weight:600;border:1px solid #bfdbfe;cursor:pointer;font-family:inherit}
.btn-edit:hover{background:#dbeafe}
.btn-sm-green{display:inline-flex;align-items:center;gap:5px;padding:5px 10px;background:#f0fdf4;color:#16a34a;border-radius:7px;font-size:12px;font-weight:600;border:1px solid #86efac;cursor:pointer;font-family:inherit}
.btn-sm-green:hover{background:#dcfce7}
/* Cards */
.kategori-card{background:#fff;border:1px solid #e2e8f0;border-radius:16px;margin-bottom:20px;overflow:hidden}
.kategori-header{padding:18px 24px;display:flex;align-items:center;justify-content:space-between;background:#fafafa;border-bottom:1px solid #f1f5f9}
.kategori-title{display:flex;align-items:center;gap:12px}
.kategori-badge{width:32px;height:32px;border-radius:9px;background:linear-gradient(135deg,#2e7d32,#1b5e20);display:flex;align-items:center;justify-content:center;color:white;font-size:14px;font-weight:700;flex-shrink:0}
.kategori-name{font-size:16px;font-weight:700;color:#1e293b}
.kategori-actions{display:flex;align-items:center;gap:8px}
.kategori-body{padding:20px 24px}
.catatan-box{background:#fffbeb;border:1px solid #fde68a;border-radius:10px;padding:12px 16px;margin-bottom:16px;font-size:13px;color:#92400e;display:flex;align-items:flex-start;gap:8px}
.catatan-box svg{flex-shrink:0;margin-top:1px}
.item-row{border:1px solid #e2e8f0;border-radius:12px;margin-bottom:12px;overflow:hidden}
.item-header{padding:12px 16px;background:#f8fafc;display:flex;align-items:center;justify-content:space-between;cursor:pointer}
.item-title{display:flex;align-items:center;gap:10px;font-size:14px;font-weight:600;color:#334155}
.item-num{width:22px;height:22px;background:#e2e8f0;border-radius:6px;display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;color:#64748b;flex-shrink:0}
.item-body{padding:12px 16px;background:#fff;border-top:1px solid #f1f5f9}
.syarat-list{list-style:none;padding:0;margin:0 0 12px}
.syarat-list li{display:flex;align-items:center;justify-content:space-between;padding:7px 10px;border-radius:8px;font-size:13px;color:#475569;margin-bottom:4px;background:#f8fafc;border:1px solid #f1f5f9}
.syarat-list li:hover{background:#f1f5f9}
.syarat-text{display:flex;align-items:center;gap:8px}
.syarat-text::before{content:'';width:5px;height:5px;background:#2e7d32;border-radius:50%;flex-shrink:0}
.syarat-actions{display:flex;gap:4px;flex-shrink:0}
.empty-state{text-align:center;padding:32px;color:#94a3b8;font-size:13px}
.add-item-row{padding:8px 0;display:flex;gap:8px}
.add-item-row input{flex:1;padding:8px 12px;border:1px solid #e2e8f0;border-radius:9px;font-size:13px;font-family:inherit}
.add-item-row input:focus{outline:none;border-color:#2e7d32;box-shadow:0 0 0 3px rgba(46,125,50,.1)}
/* Modal */
.modal-overlay{display:none;position:fixed;inset:0;background:rgba(0,0,0,.5);z-index:1000;align-items:center;justify-content:center;padding:24px}
.modal-overlay.open{display:flex}
.modal{background:#fff;border-radius:20px;width:100%;max-width:520px;overflow:hidden;box-shadow:0 20px 60px rgba(0,0,0,.15)}
.modal-header{padding:22px 24px;border-bottom:1px solid #f1f5f9;display:flex;align-items:center;justify-content:space-between}
.modal-title{font-size:17px;font-weight:700;color:#1e293b;margin:0}
.modal-close{background:none;border:none;cursor:pointer;color:#94a3b8;padding:4px}
.modal-close:hover{color:#475569}
.modal-body{padding:24px}
.form-group{margin-bottom:18px}
.form-label{display:block;font-size:13px;font-weight:600;color:#475569;margin-bottom:6px}
.form-input{width:100%;padding:10px 14px;border:1px solid #e2e8f0;border-radius:10px;font-size:14px;font-family:inherit;color:#1e293b}
.form-input:focus{outline:none;border-color:#2e7d32;box-shadow:0 0 0 3px rgba(46,125,50,.1)}
textarea.form-input{resize:vertical;min-height:80px}
.modal-footer{padding:16px 24px;border-top:1px solid #f1f5f9;display:flex;justify-content:flex-end;gap:10px}
/* Top actions bar */
.actions-bar{display:flex;align-items:center;justify-content:space-between;margin-bottom:24px;flex-wrap:wrap;gap:12px}
.actions-bar h3{font-size:18px;font-weight:700;color:#1e293b;margin:0}
.toggle-chevron{width:16px;height:16px;transition:transform .3s;color:#94a3b8}
.toggle-chevron.open{transform:rotate(180deg)}
.item-content{max-height:0;overflow:hidden;transition:max-height .35s ease}
.item-content.open{max-height:2000px}
</style>
</head>
<body>
<div class="layout">
    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-logo">
                <div class="brand-icon">🏡</div>
                <div class="brand-text">
                    <h1>Desa Bade</h1>
                    <p>Admin Panel</p>
                </div>
            </div>
        </div>
        <nav class="sidebar-nav">
            <div class="nav-section-label">Menu Utama</div>
            <a href="{{ route('admin.dashboard') }}" class="nav-item">
                <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                <span>Dashboard</span>
            </a>

            <div class="nav-section-label">Konten</div>

            <div class="nav-group-header" onclick="toggleNav('profil')">
                <div class="nav-group-header-left">
                    <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    <span>Profil Desa</span>
                </div>
                <svg class="nav-group-chevron" id="chevron-profil" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </div>
            <div id="profil" class="nav-submenu">
                <a href="{{ route('admin.visi-misi') }}" class="nav-subitem">Visi & Misi</a>
                <a href="{{ route('admin.sejarah') }}" class="nav-subitem">Sejarah Desa</a>
                <a href="{{ route('admin.perangkat-desa') }}" class="nav-subitem">Perangkat Desa</a>
                <a href="{{ route('admin.beranda') }}" class="nav-subitem">Kelola Beranda</a>
            </div>

            <div class="nav-group-header" onclick="toggleNav('infografis')">
                <div class="nav-group-header-left">
                    <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    <span>Infografis</span>
                </div>
                <svg class="nav-group-chevron" id="chevron-infografis" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </div>
            <div id="infografis" class="nav-submenu">
                <a href="{{ route('admin.infografis.penduduk') }}" class="nav-subitem">Penduduk</a>
                <a href="{{ route('admin.infografis.apbdes') }}" class="nav-subitem">APBDes</a>
                <a href="{{ route('admin.infografis.stunting') }}" class="nav-subitem">Stunting</a>
                <a href="{{ route('admin.infografis.bansos') }}" class="nav-subitem">Bansos</a>
                <a href="{{ route('admin.infografis.idm') }}" class="nav-subitem">IDM</a>
                <a href="{{ route('admin.infografis.sdgs') }}" class="nav-subitem">SDGs</a>
            </div>

            <a href="{{ route('admin.layanan') }}" class="nav-item active">
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
                <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                <span>Pengaturan</span>
            </a>
            <a href="{{ route('admin.pesan') }}" class="nav-item">
                <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                <span>Kotak Pesan</span>
            </a>
        </nav>
        <div class="sidebar-footer">
            <div class="admin-profile">
                <div class="admin-avatar">{{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}</div>
                <div class="admin-info">
                    <p class="admin-name">{{ auth()->user()->name ?? 'Admin' }}</p>
                    <p class="admin-role">Administrator</p>
                </div>
            </div>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="btn-logout">
                    <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    Keluar
                </button>
            </form>
        </div>
    </aside>

    <!-- MAIN -->
    <div class="main">
        <div class="topbar">
            <div class="topbar-left">
                <h2>Kelola Layanan Desa</h2>
                <p>Atur kategori, jenis layanan, dan syarat-syaratnya</p>
            </div>
            <div class="breadcrumb">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                <span>›</span>
                <span>Layanan</span>
            </div>
        </div>

        <div class="page-content">

            @if(session('success'))
            <div class="alert-success">
                <div class="alert-success-icon">
                    <svg width="18" height="18" fill="none" stroke="white" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                </div>
                <p>{{ session('success') }}</p>
            </div>
            @endif

            @if($errors->any())
            <div class="alert-error">
                <p>{{ $errors->first() }}</p>
            </div>
            @endif

            <div class="actions-bar">
                <h3>Daftar Kategori Layanan</h3>
                <button class="btn-primary" onclick="openModal('modal-tambah-kategori')">
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Tambah Kategori
                </button>
            </div>

            @forelse($kategoris as $idx => $kategori)
            <div class="kategori-card">
                <div class="kategori-header">
                    <div class="kategori-title">
                        <div class="kategori-badge">{{ $idx + 1 }}</div>
                        <span class="kategori-name">{{ $kategori->nama }}</span>
                    </div>
                    <div class="kategori-actions">
                        <button class="btn-edit" onclick="openEditKategori({{ $kategori->id }}, '{{ addslashes($kategori->nama) }}', '{{ addslashes($kategori->catatan ?? '') }}')">
                            <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            Edit
                        </button>
                        <form method="POST" action="{{ route('admin.layanan.kategori.destroy', $kategori) }}" onsubmit="return confirm('Hapus kategori ini beserta semua isinya?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-danger">
                                <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
                <div class="kategori-body">
                    @if($kategori->catatan)
                    <div class="catatan-box">
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span><strong>Catatan:</strong> {{ $kategori->catatan }}</span>
                    </div>
                    @endif

                    @forelse($kategori->items as $iIdx => $item)
                    <div class="item-row">
                        <div class="item-header" onclick="toggleItem('item-{{ $item->id }}', 'chev-{{ $item->id }}')">
                            <div class="item-title">
                                <span class="item-num">{{ $iIdx + 1 }}</span>
                                {{ $item->nama }}
                            </div>
                            <div style="display:flex;align-items:center;gap:8px">
                                <span style="font-size:12px;color:#94a3b8">{{ $item->syarat->count() }} syarat</span>
                                <svg id="chev-{{ $item->id }}" class="toggle-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </div>
                        </div>
                        <div id="item-{{ $item->id }}" class="item-content">
                            <div class="item-body">
                                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:10px">
                                    <span style="font-size:12px;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.8px">Syarat Dokumen</span>
                                    <div style="display:flex;gap:6px">
                                        <button class="btn-edit" onclick="openEditItem({{ $item->id }}, '{{ addslashes($item->nama) }}')">
                                            <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                            Edit Nama
                                        </button>
                                        <form method="POST" action="{{ route('admin.layanan.item.destroy', $item) }}" onsubmit="return confirm('Hapus item ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn-danger">
                                                <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                Hapus Item
                                            </button>
                                        </form>
                                    </div>
                                </div>

                                <ul class="syarat-list">
                                    @forelse($item->syarat as $syarat)
                                    <li>
                                        <span class="syarat-text">{{ $syarat->syarat }}</span>
                                        <div class="syarat-actions">
                                            <button class="btn-edit" style="padding:3px 8px;font-size:11px" onclick="openEditSyarat({{ $syarat->id }}, '{{ addslashes($syarat->syarat) }}')">Edit</button>
                                            <form method="POST" action="{{ route('admin.layanan.syarat.destroy', $syarat) }}" onsubmit="return confirm('Hapus syarat ini?')">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn-danger" style="padding:3px 8px;font-size:11px">Hapus</button>
                                            </form>
                                        </div>
                                    </li>
                                    @empty
                                    <li style="justify-content:center;color:#94a3b8">Belum ada syarat</li>
                                    @endforelse
                                </ul>

                                <!-- Tambah Syarat inline -->
                                <form method="POST" action="{{ route('admin.layanan.syarat.store') }}" style="display:flex;gap:8px;margin-top:4px">
                                    @csrf
                                    <input type="hidden" name="item_id" value="{{ $item->id }}">
                                    <input type="text" name="syarat" placeholder="+ Tambah syarat baru..." class="form-input" style="font-size:13px;padding:7px 12px" required>
                                    <button type="submit" class="btn-sm-green" style="white-space:nowrap">
                                        <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                        Tambah
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="empty-state">
                        <svg width="40" height="40" fill="none" stroke="#cbd5e1" viewBox="0 0 24 24" style="margin:0 auto 8px;display:block"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                        Belum ada item layanan
                    </div>
                    @endforelse

                    <!-- Tambah Item -->
                    <div style="margin-top:14px;padding-top:14px;border-top:1px dashed #e2e8f0">
                        <form method="POST" action="{{ route('admin.layanan.item.store') }}" style="display:flex;gap:8px">
                            @csrf
                            <input type="hidden" name="kategori_id" value="{{ $kategori->id }}">
                            <input type="text" name="nama" placeholder="+ Tambah item layanan baru..." class="form-input" style="font-size:13px;padding:8px 12px" required>
                            <button type="submit" class="btn-primary" style="white-space:nowrap">
                                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                Tambah Item
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div style="text-align:center;padding:60px 24px;background:#fff;border:1px solid #e2e8f0;border-radius:16px">
                <svg width="60" height="60" fill="none" stroke="#cbd5e1" viewBox="0 0 24 24" style="margin:0 auto 16px;display:block"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                <p style="font-size:16px;font-weight:600;color:#94a3b8;margin:0 0 6px">Belum ada kategori layanan</p>
                <p style="font-size:13px;color:#cbd5e1;margin:0 0 20px">Klik tombol "Tambah Kategori" untuk mulai</p>
                <button class="btn-primary" onclick="openModal('modal-tambah-kategori')">Tambah Kategori Pertama</button>
            </div>
            @endforelse
        </div>
    </div>
</div>

<!-- MODAL: Tambah Kategori -->
<div id="modal-tambah-kategori" class="modal-overlay">
    <div class="modal">
        <div class="modal-header">
            <h3 class="modal-title">Tambah Kategori Layanan</h3>
            <button class="modal-close" onclick="closeModal('modal-tambah-kategori')">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <form method="POST" action="{{ route('admin.layanan.kategori.store') }}">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Nama Kategori *</label>
                    <input type="text" name="nama" class="form-input" placeholder="cth. Administrasi Surat Menyurat" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Catatan / Note (opsional)</label>
                    <textarea name="catatan" class="form-input" placeholder="cth. Semua fotocopy dalam bentuk berwarna"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-secondary" onclick="closeModal('modal-tambah-kategori')">Batal</button>
                <button type="submit" class="btn-primary">Simpan Kategori</button>
            </div>
        </form>
    </div>
</div>

<!-- MODAL: Edit Kategori -->
<div id="modal-edit-kategori" class="modal-overlay">
    <div class="modal">
        <div class="modal-header">
            <h3 class="modal-title">Edit Kategori</h3>
            <button class="modal-close" onclick="closeModal('modal-edit-kategori')">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <form method="POST" id="form-edit-kategori">
            @csrf @method('PUT')
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Nama Kategori *</label>
                    <input type="text" name="nama" id="edit-kategori-nama" class="form-input" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Catatan / Note (opsional)</label>
                    <textarea name="catatan" id="edit-kategori-catatan" class="form-input"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-secondary" onclick="closeModal('modal-edit-kategori')">Batal</button>
                <button type="submit" class="btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

<!-- MODAL: Edit Item -->
<div id="modal-edit-item" class="modal-overlay">
    <div class="modal">
        <div class="modal-header">
            <h3 class="modal-title">Edit Nama Item Layanan</h3>
            <button class="modal-close" onclick="closeModal('modal-edit-item')">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <form method="POST" id="form-edit-item">
            @csrf @method('PUT')
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Nama Item Layanan *</label>
                    <input type="text" name="nama" id="edit-item-nama" class="form-input" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-secondary" onclick="closeModal('modal-edit-item')">Batal</button>
                <button type="submit" class="btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- MODAL: Edit Syarat -->
<div id="modal-edit-syarat" class="modal-overlay">
    <div class="modal">
        <div class="modal-header">
            <h3 class="modal-title">Edit Syarat</h3>
            <button class="modal-close" onclick="closeModal('modal-edit-syarat')">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <form method="POST" id="form-edit-syarat">
            @csrf @method('PUT')
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Teks Syarat *</label>
                    <input type="text" name="syarat" id="edit-syarat-text" class="form-input" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-secondary" onclick="closeModal('modal-edit-syarat')">Batal</button>
                <button type="submit" class="btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
function openModal(id) { document.getElementById(id).classList.add('open'); }
function closeModal(id) { document.getElementById(id).classList.remove('open'); }

function openEditKategori(id, nama, catatan) {
    document.getElementById('edit-kategori-nama').value = nama;
    document.getElementById('edit-kategori-catatan').value = catatan;
    document.getElementById('form-edit-kategori').action = '/admin/layanan/kategori/' + id;
    openModal('modal-edit-kategori');
}

function openEditItem(id, nama) {
    document.getElementById('edit-item-nama').value = nama;
    document.getElementById('form-edit-item').action = '/admin/layanan/item/' + id;
    openModal('modal-edit-item');
}

function openEditSyarat(id, text) {
    document.getElementById('edit-syarat-text').value = text;
    document.getElementById('form-edit-syarat').action = '/admin/layanan/syarat/' + id;
    openModal('modal-edit-syarat');
}

function toggleItem(contentId, chevronId) {
    const content = document.getElementById(contentId);
    const chevron = document.getElementById(chevronId);
    content.classList.toggle('open');
    chevron.classList.toggle('open');
}

function toggleNav(id) {
    const el = document.getElementById(id);
    const chevron = document.getElementById('chevron-' + id);
    el.classList.toggle('open');
    if (chevron) chevron.classList.toggle('open');
}

// Close modal on overlay click
document.querySelectorAll('.modal-overlay').forEach(overlay => {
    overlay.addEventListener('click', function(e) {
        if (e.target === this) this.classList.remove('open');
    });
});
</script>
</body>
</html>
