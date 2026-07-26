@extends('layouts.app')

@section('content')
<section id="infografis" class="section-pad">
    <div class="container-shell">

        {{-- Alpine state wraps both header row AND panels so tab state is shared --}}
        <div x-data="{ tab: 'penduduk' }">

            {{-- ===== HEADER ROW: title left | tab buttons right ===== --}}
            <div class="infografis-header">
                <div class="reveal">
                    <p class="eyebrow">Infografis</p>
                    <h1 class="infografis-title">Infografis<br>Desa Bade</h1>
                </div>

                <div class="infotab-nav reveal reveal-delay-1">
                    {{-- Tab buttons only — panels are OUTSIDE this grid column --}}
                    <div class="infotab-list" role="tablist">

                        <button class="infotab-btn" :class="tab === 'penduduk' && 'infotab-btn--active'"
                            @click="tab = 'penduduk'" role="tab" aria-controls="tab-penduduk">
                            <span class="infotab-icon">
                                <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="18" cy="16" r="7" stroke="currentColor" stroke-width="2.5"/>
                                    <path d="M4 40c0-7.732 6.268-14 14-14s14 6.268 14 14" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                                    <circle cx="34" cy="18" r="5" stroke="currentColor" stroke-width="2"/>
                                    <path d="M34 30c5.523 0 10 4.477 10 10" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </span>
                            <span class="infotab-label">Penduduk</span>
                        </button>

                        <button class="infotab-btn" :class="tab === 'apbdes' && 'infotab-btn--active'"
                            @click="tab = 'apbdes'" role="tab" aria-controls="tab-apbdes">
                            <span class="infotab-icon">
                                <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="6" y="8" width="30" height="36" rx="3" stroke="currentColor" stroke-width="2.5"/>
                                    <path d="M14 18h14M14 25h14M14 32h8" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                                    <circle cx="36" cy="34" r="8" fill="white" stroke="currentColor" stroke-width="2"/>
                                    <path d="M33 34h6M36 31v6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </span>
                            <span class="infotab-label">APBDes</span>
                        </button>

                        <button class="infotab-btn" :class="tab === 'stunting' && 'infotab-btn--active'"
                            @click="tab = 'stunting'" role="tab" aria-controls="tab-stunting">
                            <span class="infotab-icon">
                                <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 38l8-12 8 6 8-16 8 8" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <circle cx="24" cy="14" r="6" stroke="currentColor" stroke-width="2.5"/>
                                    <path d="M18 20v6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                                    <path d="M30 20v6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                                </svg>
                            </span>
                            <span class="infotab-label">Stunting</span>
                        </button>

                        <button class="infotab-btn" :class="tab === 'bansos' && 'infotab-btn--active'"
                            @click="tab = 'bansos'" role="tab" aria-controls="tab-bansos">
                            <span class="infotab-icon">
                                <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="6" y="20" width="36" height="22" rx="3" stroke="currentColor" stroke-width="2.5"/>
                                    <path d="M16 20v-4a8 8 0 0116 0v4" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                                    <path d="M24 28v6M21 31h6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                                </svg>
                            </span>
                            <span class="infotab-label">Bansos</span>
                        </button>

                        <button class="infotab-btn" :class="tab === 'idm' && 'infotab-btn--active'"
                            @click="tab = 'idm'" role="tab" aria-controls="tab-idm">
                            <span class="infotab-icon">
                                <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M24 6l4 10h10l-8 6 3 10-9-6-9 6 3-10-8-6h10z" stroke="currentColor" stroke-width="2.5" stroke-linejoin="round"/>
                                    <path d="M12 38l-6 4M36 38l6 4" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                                </svg>
                            </span>
                            <span class="infotab-label">IDM</span>
                        </button>

                        <button class="infotab-btn" :class="tab === 'sdgs' && 'infotab-btn--active'"
                            @click="tab = 'sdgs'" role="tab" aria-controls="tab-sdgs">
                            <span class="infotab-icon">
                                <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="6" y="6" width="14" height="14" rx="2" stroke="currentColor" stroke-width="2.5"/>
                                    <rect x="28" y="6" width="14" height="14" rx="2" stroke="currentColor" stroke-width="2.5"/>
                                    <rect x="6" y="28" width="14" height="14" rx="2" stroke="currentColor" stroke-width="2.5"/>
                                    <text x="28" y="42" font-size="14" font-weight="700" fill="currentColor" font-family="sans-serif">½3</text>
                                </svg>
                            </span>
                            <span class="infotab-label">SDGs</span>
                        </button>

                    </div>
                </div>
            </div>{{-- end infografis-header --}}

            {{-- ===== TAB PANELS — full width, outside the 2-col grid ===== --}}

            {{-- PENDUDUK --}}
            <div id="tab-penduduk" role="tabpanel" x-show="tab === 'penduduk'" x-transition.opacity.duration.300ms>
                <div class="infotab-panel">
                    <div class="infotab-panel-text">
                        <h2 class="infotab-panel-title">Demografi Penduduk</h2>
                        <p class="infotab-panel-desc">Memberikan informasi lengkap mengenai karakteristik demografi penduduk Desa Bade. Mulai dari jumlah penduduk, usia, jenis kelamin, tingkat pendidikan, pekerjaan, agama, dan aspek penting lainnya yang menggambarkan komposisi populasi secara rinci.</p>
                    </div>
                    <div class="infotab-panel-art">
                        <div class="infotab-art-blob"></div>
                        <svg class="infotab-art-svg" viewBox="0 0 220 180" fill="none" xmlns="http://www.w3.org/2000/svg">
                            {{-- Floating background elements --}}
                            <circle cx="110" cy="90" r="70" fill="rgba(46,125,50,0.06)" />
                            <circle cx="110" cy="90" r="55" stroke="rgba(46,125,50,0.1)" stroke-width="1.5" stroke-dasharray="6 4" />
                            
                            {{-- Stylized charts behind avatars --}}
                            {{-- Circular chart (Donut) on the left --}}
                            <circle cx="65" cy="75" r="18" stroke="#e0f2f1" stroke-width="6" fill="none" opacity="0.8" />
                            <circle cx="65" cy="75" r="18" stroke="#4caf50" stroke-width="6" stroke-dasharray="80 120" stroke-dashoffset="10" fill="none" />
                            <circle cx="65" cy="75" r="18" stroke="#d4a017" stroke-width="6" stroke-dasharray="30 120" stroke-dashoffset="-70" fill="none" />
                            
                            {{-- Small bar chart on the right --}}
                            <g transform="translate(145, 60)" opacity="0.8">
                                <rect x="0" y="25" width="6" height="25" rx="3" fill="#2e7d32" />
                                <rect x="10" y="10" width="6" height="40" rx="3" fill="#4caf50" />
                                <rect x="20" y="18" width="6" height="32" rx="3" fill="#d4a017" />
                            </g>
                            
                            {{-- Human Avatar Silhouettes / Icons in the center --}}
                            <g transform="translate(85, 60)">
                                {{-- Avatar 1: Man (Right/Back) --}}
                                <g transform="translate(20, 10)">
                                    {{-- Head --}}
                                    <circle cx="20" cy="15" r="11" fill="#f5f5f5" stroke="#4caf50" stroke-width="2"/>
                                    {{-- Hair --}}
                                    <path d="M9 14 C 9 6, 31 6, 31 14 C 27 10, 13 10, 9 14" fill="#2e7d32" />
                                    {{-- Body --}}
                                    <path d="M4 42 C 4 33, 11 29, 20 29 C 29 29, 36 33, 36 42" fill="#4caf50" stroke="#2e7d32" stroke-width="2" />
                                </g>
                                
                                {{-- Avatar 2: Woman (Left/Front) --}}
                                <g transform="translate(0, 20)">
                                    {{-- Head --}}
                                    <circle cx="20" cy="15" r="11" fill="#ffffff" stroke="#2e7d32" stroke-width="2"/>
                                    {{-- Hair --}}
                                    <path d="M8 15 C 8 4, 32 4, 32 15 C 32 23, 29 25, 27 21 C 24 24, 16 24, 13 21 C 11 25, 8 23, 8 15" fill="#1f5a26" />
                                    {{-- Body --}}
                                    <path d="M3 42 C 3 33, 10 29, 20 29 C 30 29, 37 33, 37 42" fill="#2e7d32" stroke="#1f5a26" stroke-width="2" />
                                </g>
                            </g>
                            
                            {{-- Little decorative node elements --}}
                            <circle cx="110" cy="40" r="4" fill="#d4a017" />
                            <circle cx="155" cy="130" r="3" fill="#4caf50" />
                            <circle cx="60" cy="125" r="5" fill="#2e7d32" opacity="0.5" />
                        </svg>
                    </div>
                </div>

                <div class="infotab-stats-title">Jumlah Penduduk dan Kepala Keluarga</div>
                
                {{-- Demographics Grid (2x2) --}}
                <div class="grid gap-6 sm:grid-cols-2 mb-10">
                    {{-- Total Penduduk --}}
                    <div class="flex items-center gap-5 p-5 bg-[color:var(--surface-strong)] border border-[color:var(--line)] rounded-[1.25rem] shadow-[0_8px_24px_rgba(46,125,50,0.04)] hover:-translate-y-1 hover:shadow-[0_16px_36px_rgba(46,125,50,0.12)] transition duration-200">
                        <div class="flex-shrink-0">
                            <svg viewBox="0 0 100 100" class="h-16 w-16" fill="none">
                                <circle cx="50" cy="50" r="46" fill="rgba(76,175,80,0.12)"/>
                                <path d="M22 85 C22 70 30 65 38 65 C46 65 48 72 48 85" fill="#81c784"/>
                                <circle cx="34" cy="52" r="11" fill="#ffcc80"/>
                                <path d="M23 52 C23 41 45 41 45 52" fill="#8d6e63"/>
                                <circle cx="31" cy="52" r="1.5" fill="#3e2723"/>
                                <circle cx="37" cy="52" r="1.5" fill="#3e2723"/>
                                <path d="M32 58 Q34 60 36 58" stroke="#3e2723" stroke-width="1.5" stroke-linecap="round"/>
                                
                                <path d="M52 85 C52 68 58 60 68 60 C78 60 82 72 82 85" fill="#64b5f6"/>
                                <circle cx="66" cy="45" r="12" fill="#ffcc80"/>
                                <path d="M54 42 C54 30 78 30 78 42" fill="#4e342e"/>
                                <circle cx="62" cy="45" r="1.5" fill="#3e2723"/>
                                <circle cx="70" cy="45" r="1.5" fill="#3e2723"/>
                                <path d="M64 51 Q66 53 68 51" stroke="#3e2723" stroke-width="1.5" stroke-linecap="round"/>

                                <path d="M38 85 C38 76 44 72 50 72 C56 72 62 76 62 85" fill="#ffe082"/>
                                <circle cx="50" cy="60" r="8" fill="#ffcc80"/>
                                <path d="M42 58 C42 50 58 50 58 58" fill="#a1887f"/>
                                <circle cx="47" cy="60" r="1" fill="#3e2723"/>
                                <circle cx="53" cy="60" r="1" fill="#3e2723"/>
                                <path d="M49 64 Q50 65 51 64" stroke="#3e2723" stroke-width="1" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold tracking-wider text-[color:var(--text-soft)] uppercase">Total Penduduk</p>
                            <p class="mt-1 text-2xl font-extrabold text-[color:var(--secondary)]">{{ $demographics['total'] }}</p>
                        </div>
                    </div>

                    {{-- Kepala Keluarga --}}
                    <div class="flex items-center gap-5 p-5 bg-[color:var(--surface-strong)] border border-[color:var(--line)] rounded-[1.25rem] shadow-[0_8px_24px_rgba(46,125,50,0.04)] hover:-translate-y-1 hover:shadow-[0_16px_36px_rgba(46,125,50,0.12)] transition duration-200">
                        <div class="flex-shrink-0">
                            <svg viewBox="0 0 100 100" class="h-16 w-16" fill="none">
                                <circle cx="50" cy="50" r="46" fill="rgba(76,175,80,0.12)"/>
                                <path d="M25 85 C25 65 35 58 48 58 C61 58 70 70 70 85" fill="#ffb74d"/>
                                <circle cx="48" cy="40" r="14" fill="#ffcc80"/>
                                <path d="M34 37 C34 22 62 22 62 37" fill="#4e342e"/>
                                <circle cx="42" cy="40" r="1.5" fill="#3e2723"/>
                                <circle cx="52" cy="40" r="1.5" fill="#3e2723"/>
                                <path d="M45 47 Q47 49 49 47" stroke="#3e2723" stroke-width="1.5" stroke-linecap="round"/>

                                <path d="M60 85 C60 75 66 70 72 70 C78 70 84 75 84 85" fill="#81c784"/>
                                <circle cx="72" cy="58" r="9" fill="#ffcc80"/>
                                <path d="M63 56 C63 47 81 47 81 56" fill="#8d6e63"/>
                                <circle cx="68" cy="58" r="1" fill="#3e2723"/>
                                <circle cx="74" cy="58" r="1" fill="#3e2723"/>
                                <path d="M70 63 Q71 64 72 63" stroke="#3e2723" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold tracking-wider text-[color:var(--text-soft)] uppercase">Kepala Keluarga</p>
                            <p class="mt-1 text-2xl font-extrabold text-[color:var(--secondary)]">{{ $demographics['kk'] }}</p>
                        </div>
                    </div>

                    {{-- Perempuan --}}
                    <div class="flex items-center gap-5 p-5 bg-[color:var(--surface-strong)] border border-[color:var(--line)] rounded-[1.25rem] shadow-[0_8px_24px_rgba(46,125,50,0.04)] hover:-translate-y-1 hover:shadow-[0_16px_36px_rgba(46,125,50,0.12)] transition duration-200">
                        <div class="flex-shrink-0">
                            <svg viewBox="0 0 100 100" class="h-16 w-16" fill="none">
                                <circle cx="50" cy="50" r="46" fill="rgba(76,175,80,0.12)"/>
                                <path d="M25 85 C25 65 35 62 50 62 C65 62 75 65 75 85" fill="#90a4ae"/>
                                <path d="M32 75 C30 52 32 32 50 32 C68 32 70 52 68 75 C68 85 32 85 32 75Z" fill="#4dd0e1"/>
                                <circle cx="50" cy="52" r="13" fill="#ffcc80"/>
                                <path d="M38 52 C38 41 62 41 62 52 C62 56 60 62 50 62 C40 62 38 56 38 52Z" fill="#ffcc80"/>
                                <path d="M37 52 C37 42 63 42 63 52 C63 54 50 56 50 56 C50 56 37 54 37 52Z" fill="#80deea"/>
                                <circle cx="44" cy="50" r="3.5" stroke="#3e2723" stroke-width="1.5"/>
                                <circle cx="56" cy="50" r="3.5" stroke="#3e2723" stroke-width="1.5"/>
                                <line x1="47.5" y1="50" x2="52.5" y2="50" stroke="#3e2723" stroke-width="1.5"/>
                                <circle cx="44" cy="50" r="1" fill="#3e2723"/>
                                <circle cx="56" cy="50" r="1" fill="#3e2723"/>
                                <path d="M47 56 Q50 58 53 56" stroke="#3e2723" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold tracking-wider text-[color:var(--text-soft)] uppercase">Perempuan</p>
                            <p class="mt-1 text-2xl font-extrabold text-[color:var(--secondary)]">{{ $demographics['perempuan'] }}</p>
                        </div>
                    </div>

                    {{-- Laki-laki --}}
                    <div class="flex items-center gap-5 p-5 bg-[color:var(--surface-strong)] border border-[color:var(--line)] rounded-[1.25rem] shadow-[0_8px_24px_rgba(46,125,50,0.04)] hover:-translate-y-1 hover:shadow-[0_16px_36px_rgba(46,125,50,0.12)] transition duration-200">
                        <div class="flex-shrink-0">
                            <svg viewBox="0 0 100 100" class="h-16 w-16" fill="none">
                                <circle cx="50" cy="50" r="46" fill="rgba(76,175,80,0.12)"/>
                                <path d="M25 85 C25 65 35 62 50 62 C65 62 75 65 75 85" fill="#5c6bc0"/>
                                <path d="M42 85 L50 70 L58 85 Z" fill="#ffffff"/>
                                <circle cx="50" cy="46" r="14" fill="#ffcc80"/>
                                <path d="M36 43 C34 26 66 26 64 43 C64 43 50 40 50 40 C50 40 36 43 36 43Z" fill="#455a64"/>
                                <circle cx="44" cy="46" r="1.5" fill="#3e2723"/>
                                <circle cx="56" cy="46" r="1.5" fill="#3e2723"/>
                                <path d="M47 53 Q50 55 53 53" stroke="#3e2723" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold tracking-wider text-[color:var(--text-soft)] uppercase">Laki-Laki</p>
                            <p class="mt-1 text-2xl font-extrabold text-[color:var(--secondary)]">{{ $demographics['laki_laki'] }}</p>
                        </div>
                    </div>
                </div>

                {{-- Title Kelompok Umur --}}
                <div class="infotab-stats-title mt-10">Berdasarkan Kelompok Umur</div>

                {{-- Pyramid Chart Card --}}
                <div class="bg-[color:var(--surface-strong)] border border-[color:var(--line)] rounded-[1.75rem] p-6 sm:p-8 shadow-[0_18px_40px_rgba(46,125,50,0.04)] mb-8">
                    {{-- Chart Headers --}}
                    <div class="grid grid-cols-[1fr_auto_1fr] items-center mb-6 text-xs sm:text-sm font-bold text-[color:var(--text-soft)] select-none">
                        <div class="text-right pr-2 sm:pr-4 uppercase tracking-wider">Laki-Laki</div>
                        <div class="w-16"></div>
                        <div class="text-left pl-2 sm:pl-4 uppercase tracking-wider">Perempuan</div>
                    </div>

                    {{-- Chart Area --}}
                    <div class="relative">
                        {{-- Background Gridlines --}}
                        <div class="absolute inset-0 grid grid-cols-[1fr_auto_1fr] pointer-events-none">
                            <div class="relative h-full pr-2 sm:pr-4">
                                <div class="absolute left-0 top-0 bottom-0 border-l border-dashed border-gray-100"></div>
                                <div class="absolute left-1/2 top-0 bottom-0 border-l border-dashed border-gray-100"></div>
                                <div class="absolute right-0 top-0 bottom-0 border-l border-dashed border-gray-100"></div>
                            </div>
                            <div class="w-16 h-full"></div>
                            <div class="relative h-full pl-2 sm:pl-4">
                                <div class="absolute left-0 top-0 bottom-0 border-l border-dashed border-gray-100"></div>
                                <div class="absolute left-1/2 top-0 bottom-0 border-l border-dashed border-gray-100"></div>
                                <div class="absolute right-0 top-0 bottom-0 border-l border-dashed border-gray-100"></div>
                            </div>
                        </div>

                        {{-- Pyramid Rows --}}
                        <div class="space-y-2 relative z-10">
                            @foreach ($ageGroups as $group)
                                <div class="grid grid-cols-[1fr_auto_1fr] items-center">
                                    {{-- Male Bar (Left aligned) --}}
                                    <div class="flex items-center justify-end gap-2 pr-2 sm:pr-4">
                                        <span class="text-[10px] sm:text-xs text-[color:var(--text-soft)] font-semibold">{{ $group['male'] }}</span>
                                        <div class="bg-[#6fa187] rounded-l-sm h-5 sm:h-6 transition-all duration-300 hover:bg-[#52876a]" style="width: {{ min(100, ($group['male'] / 300) * 100) }}%"></div>
                                    </div>
                                    
                                    {{-- Age Group Label (Center) --}}
                                    <div class="w-16 text-center text-[10px] sm:text-xs text-[color:var(--text-soft)] font-bold py-1 bg-gray-50/90 border border-gray-100 rounded-md shadow-sm select-none">
                                        {{ $group['label'] }}
                                    </div>

                                    {{-- Female Bar (Right aligned) --}}
                                    <div class="flex items-center justify-start gap-2 pl-2 sm:pl-4">
                                        <div class="bg-[#efb598] rounded-r-sm h-5 sm:h-6 transition-all duration-300 hover:bg-[#e49b77]" style="width: {{ min(100, ($group['female'] / 300) * 100) }}%"></div>
                                        <span class="text-[10px] sm:text-xs text-[color:var(--text-soft)] font-semibold">{{ $group['female'] }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Scale Ticks --}}
                    <div class="grid grid-cols-[1fr_auto_1fr] items-center mt-6 pt-4 border-t border-gray-100 text-[10px] sm:text-xs text-[color:var(--text-soft)] select-none">
                        <div class="flex justify-between pr-2 sm:pr-4">
                            <span>300</span>
                            <span>150</span>
                            <span>0</span>
                        </div>
                        <div class="w-16"></div>
                        <div class="flex justify-between pl-2 sm:pl-4">
                            <span>0</span>
                            <span>150</span>
                            <span>300</span>
                        </div>
                    </div>
                </div>

                {{-- Analysis Cards --}}
                <div class="grid gap-4 mt-6 mb-10">
                    <div class="p-4 sm:p-5 bg-[rgba(46,125,50,0.03)] border-l-4 border-[color:var(--primary)] rounded-r-[1rem] text-sm leading-relaxed text-[color:var(--text)]">
                        Untuk jenis kelamin laki-laki, kelompok umur <strong>60+</strong> adalah kelompok umur tertinggi dengan jumlah <strong>221 orang</strong> atau <strong>9.00%</strong>. Sedangkan, kelompok umur termuda <strong>0–4</strong> berjumlah <strong>116 orang</strong> atau <strong>4.72%</strong>.
                    </div>
                    <div class="p-4 sm:p-5 bg-[rgba(212,160,23,0.03)] border-l-4 border-[color:var(--gold)] rounded-r-[1rem] text-sm leading-relaxed text-[color:var(--text)]">
                        Untuk jenis kelamin perempuan, kelompok umur <strong>60+</strong> adalah kelompok umur tertinggi dengan jumlah <strong>270 orang</strong> atau <strong>11.61%</strong>. Sedangkan, kelompok umur termuda <strong>0–4</strong> berjumlah <strong>136 orang</strong> atau <strong>5.85%</strong>.
                    </div>
                </div>

                {{-- Title Berdasarkan Dusun --}}
                <div class="infotab-stats-title mt-10">Berdasarkan Dusun</div>

                @php
                    $dusunColors = ['#4caf50', '#5f75c2', '#d4a017', '#26a69a', '#ec407a', '#8d6e63', '#ab47bc', '#42a5f5'];
                    $totalJiwaDusun = $dusunList->sum('jiwa') ?: 1;
                @endphp

                {{-- Dusun Card --}}
                <div class="bg-[color:var(--surface-strong)] border border-[color:var(--line)] rounded-[1.75rem] p-6 sm:p-8 shadow-[0_18px_40px_rgba(46,125,50,0.04)] mb-8">
                    <div class="grid gap-8 md:grid-cols-[1.2fr_0.8fr] items-center">
                        {{-- Pie Chart SVG (Dynamic) --}}
                        <div class="flex justify-center">
                            <svg viewBox="0 0 260 150" class="w-full max-w-[420px] h-auto">
                                <g transform="rotate(-90 130 75)">
                                    @php
                                        $circumference = 188.4955; // 2 * pi * 30
                                        $currentOffset = 0;
                                    @endphp
                                    @foreach($dusunList as $index => $item)
                                        @php
                                            $color = $dusunColors[$index % count($dusunColors)];
                                            $pct = ($item->jiwa / $totalJiwaDusun);
                                            $segment = $pct * $circumference;
                                        @endphp
                                        <circle cx="130" cy="75" r="30" fill="none" stroke="{{ $color }}" stroke-width="60" 
                                                stroke-dasharray="{{ sprintf('%.2f', $segment) }} {{ sprintf('%.2f', $circumference - $segment) }}" 
                                                stroke-dashoffset="{{ sprintf('%.2f', -$currentOffset) }}" />
                                        {{-- White divider --}}
                                        <circle cx="130" cy="75" r="30" fill="none" stroke="#ffffff" stroke-width="60" 
                                                stroke-dasharray="0.9 187.5" 
                                                stroke-dashoffset="{{ sprintf('%.2f', -$currentOffset) }}" />
                                        @php $currentOffset += $segment; @endphp
                                    @endforeach
                                </g>

                                {{-- Dynamic Clean Text Labels (Tanpa Garis) --}}
                                @php
                                    $cumulativePct = 0;
                                    $cx = 130;
                                    $cy = 75;
                                @endphp
                                @foreach($dusunList as $index => $item)
                                    @php
                                        $pctRatio = ($item->jiwa / $totalJiwaDusun);
                                        $pctFormatted = number_format($pctRatio * 100, 2) . '%';
                                        
                                        // Angle calculation in degrees (-90deg rotated)
                                        $midPct = $cumulativePct + ($pctRatio / 2);
                                        $angleDeg = ($midPct * 360) - 90;
                                        $rad = deg2rad($angleDeg);
                                        
                                        // Position text outside pie (radius 48)
                                        $rText = 48;
                                        $textX = $cx + ($rText * cos($rad));
                                        $textY = $cy + ($rText * sin($rad)) + 2.5;
                                        
                                        $isRight = cos($rad) >= 0;
                                        $anchor = $isRight ? 'start' : 'end';
                                        
                                        $cumulativePct += $pctRatio;
                                    @endphp
                                    <text x="{{ sprintf('%.1f', $textX) }}" y="{{ sprintf('%.1f', $textY) }}" 
                                          font-size="7.5" font-family="Plus Jakarta Sans, sans-serif" font-weight="700" 
                                          fill="#374151" text-anchor="{{ $anchor }}">{{ $item->nama }}: {{ $pctFormatted }}</text>
                                @endforeach
                            </svg>
                        </div>

                        {{-- Legend Dynamic Dusun List --}}
                        <div>
                            <h4 class="text-sm font-bold text-[color:var(--text)] uppercase tracking-wider mb-4">Persebaran per Dusun:</h4>
                            <div class="space-y-3">
                                @foreach($dusunList as $index => $item)
                                    @php
                                        $color = $dusunColors[$index % count($dusunColors)];
                                        $pct = number_format(($item->jiwa / $totalJiwaDusun) * 100, 2);
                                    @endphp
                                    <div class="flex items-center gap-3 p-3.5 bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-md transition">
                                        <div class="w-3 h-12 rounded-full shrink-0" style="background-color:{{ $color }};"></div>
                                        <div class="flex-1 min-w-0">
                                            <div class="flex items-baseline justify-between gap-2">
                                                <p class="text-xs font-bold uppercase tracking-wider text-gray-400">{{ $item->nama }}</p>
                                                <span class="text-xs font-bold" style="color:{{ $color }};">{{ $pct }}%</span>
                                            </div>
                                            <p class="text-base font-extrabold text-[color:var(--primary-deep)]">{{ number_format($item->jiwa, 0, ',', '.') }} Jiwa</p>
                                            <p class="text-xs text-gray-400 mt-0.5">{{ number_format($item->kk) }} KK &middot; L: {{ number_format($item->laki) }} &middot; P: {{ number_format($item->perempuan) }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Title Berdasarkan Pendidikan --}}
                <div class="infotab-stats-title mt-10">Berdasarkan Pendidikan</div>

                @php
                    // Dynamic calculation for Education Chart Y-axis
                    $maxEduValue = count($educationData) > 0 ? max(array_column($educationData, 'value')) : 0;
                    
                    if ($maxEduValue <= 0) {
                        $eduInterval = 50;
                    } elseif ($maxEduValue <= 30) {
                        $eduInterval = 5;
                    } elseif ($maxEduValue <= 60) {
                        $eduInterval = 10;
                    } elseif ($maxEduValue <= 120) {
                        $eduInterval = 20;
                    } elseif ($maxEduValue <= 300) {
                        $eduInterval = 50;
                    } else {
                        $eduInterval = (int) ceil(($maxEduValue / 6) / 50) * 50;
                    }
                    $eduMaxY = $eduInterval * 6;
                    
                    $eduYLabels = [];
                    for ($val = $eduMaxY; $val >= 0; $val -= $eduInterval) {
                        $eduYLabels[] = $val;
                    }
                @endphp

                {{-- Pendidikan Card --}}
                <div class="bg-[color:var(--surface-strong)] border border-[color:var(--line)] rounded-[1.75rem] p-6 sm:p-8 shadow-[0_18px_40px_rgba(46,125,50,0.04)] mb-8">
                    {{-- Chart Scrollable Container --}}
                    <div class="overflow-x-auto pb-4">
                        <div class="min-w-[800px] lg:min-w-0 pr-4">
                            {{-- Chart Grid (Y-Axis + Bars) --}}
                            <div class="flex items-start">
                                {{-- Y-axis numbers --}}
                                <div class="flex flex-col justify-between text-right pr-2 text-[10px] text-gray-400 font-bold h-[240px] pt-6 select-none shrink-0 w-12">
                                    @foreach ($eduYLabels as $labelVal)
                                        <span>{{ number_format($labelVal, 0, ',', '.') }}</span>
                                    @endforeach
                                </div>

                                {{-- Bars + Gridlines Area --}}
                                <div class="relative flex-grow h-[240px] pt-6">
                                    {{-- Background Horizontal Gridlines --}}
                                    <div class="absolute bottom-0 left-0 right-0 h-[216px] flex flex-col justify-between pointer-events-none">
                                        @for ($i = 0; $i < 7; $i++)
                                            <div class="border-b border-gray-100/80 w-full h-0"></div>
                                        @endfor
                                    </div>

                                    {{-- Bars Container --}}
                                    <div class="absolute bottom-0 left-0 right-0 h-[216px] flex justify-around items-end z-10 px-4">
                                        @foreach ($educationData as $edu)
                                            <div class="flex flex-col items-center group w-full">
                                                <span class="text-[10px] sm:text-xs text-gray-500 font-bold mb-1.5 group-hover:scale-105 transition duration-200">
                                                    {{ $edu['value'] }}
                                                </span>
                                                <div 
                                                    class="bg-gradient-to-t from-[color:var(--primary-deep)] to-[color:var(--primary)] hover:from-[color:var(--primary)] hover:to-[color:var(--secondary)] rounded-t-md w-8 sm:w-10 transition-all duration-300 shadow-[0_-2px_8px_rgba(46,125,50,0.1)] hover:shadow-[0_-4px_12px_rgba(46,125,50,0.2)]" 
                                                    style="height: {{ ($edu['value'] / $eduMaxY) * 216 }}px"
                                                ></div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            {{-- X-axis labels --}}
                            <div class="flex items-start mt-3 pt-3 border-t border-gray-100">
                                <div class="w-12 shrink-0"></div> {{-- Spacer to match Y-axis offset --}}
                                <div class="flex justify-around flex-grow px-4">
                                    @foreach ($educationData as $edu)
                                        <div class="w-12 text-center text-[9px] sm:text-[10px] leading-relaxed text-[color:var(--text-soft)] font-bold break-words select-none hyphens-manual">
                                            {{ $edu['label'] }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="infotab-stats-title mt-10">Berdasarkan Pekerjaan</div>

                <div class="mb-8 rounded-2xl border border-[color:var(--line)] bg-[color:var(--surface-strong)] shadow-[0_8px_24px_rgba(46,125,50,0.04)] max-h-[380px] overflow-y-auto overflow-x-auto relative">
                    <table class="w-full text-left border-collapse text-xs sm:text-sm">
                        <thead class="sticky top-0 z-10 bg-[#f2f6ee] border-b border-[color:var(--line)] shadow-sm">
                            <tr>
                                <th class="py-3.5 px-6 font-bold text-[color:var(--primary-deep)] w-16 text-center">NO</th>
                                <th class="py-3.5 px-6 font-bold text-[color:var(--primary-deep)]">JENIS PEKERJAAN</th>
                                <th class="py-3.5 px-6 font-bold text-[color:var(--primary-deep)] text-right">JUMLAH (ORANG)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[color:var(--line)] text-gray-700">
                            @php $totalPekerjaan = 0; @endphp
                            @forelse ($occupationData as $index => $occ)
                                @php $totalPekerjaan += $occ['value']; @endphp
                                <tr class="hover:bg-gray-50/80 transition duration-150">
                                    <td class="py-3.5 px-6 text-center font-bold text-gray-400">{{ $index + 1 }}</td>
                                    <td class="py-3.5 px-6 font-semibold text-gray-800">{{ $occ['label'] }}</td>
                                    <td class="py-3.5 px-6 text-right font-extrabold text-[color:var(--primary-deep)]">{{ number_format($occ['value'], 0, ',', '.') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="py-6 text-center text-gray-400">Belum ada data pekerjaan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                        @if(count($occupationData) > 0)
                            <tfoot class="sticky bottom-0 z-10 bg-[#f2f6ee] border-t-2 border-[color:var(--line)] shadow-[0_-4px_12px_rgba(0,0,0,0.03)]">
                                <tr>
                                    <td colspan="2" class="py-3.5 px-6 text-gray-900 font-extrabold">TOTAL PENDUDUK BERDASARKAN PEKERJAAN</td>
                                    <td class="py-3.5 px-6 text-right font-black text-[color:var(--primary-deep)] text-base">{{ number_format($totalPekerjaan, 0, ',', '.') }}</td>
                                </tr>
                            </tfoot>
                        @endif
                    </table>
                </div>

                {{-- Title Berdasarkan Wajib Pilih --}}
                <div class="infotab-stats-title mt-10">Berdasarkan Wajib Pilih</div>

                @php
                    $votersData = $votersData ?? [];
                    // Dynamic calculation for Voters Chart Y-axis
                    $maxVoterValue = (is_array($votersData) || $votersData instanceof \Countable) && count($votersData) > 0 ? max(array_column($votersData, 'value')) : 0;
                    
                    if ($maxVoterValue <= 0) {
                        $voterInterval = 200;
                    } elseif ($maxVoterValue <= 100) {
                        $voterInterval = 20;
                    } elseif ($maxVoterValue <= 250) {
                        $voterInterval = 50;
                    } elseif ($maxVoterValue <= 500) {
                        $voterInterval = 100;
                    } elseif ($maxVoterValue <= 1000) {
                        $voterInterval = 200;
                    } else {
                        $voterInterval = (int) ceil(($maxVoterValue / 5) / 100) * 100;
                    }
                    $voterMaxY = $voterInterval * 5;
                    
                    $voterYLabels = [];
                    for ($val = $voterMaxY; $val >= 0; $val -= $voterInterval) {
                        $voterYLabels[] = $val;
                    }
                @endphp

                {{-- Wajib Pilih Card --}}
                <div class="bg-[color:var(--surface-strong)] border border-[color:var(--line)] rounded-[1.75rem] p-6 sm:p-8 shadow-[0_18px_40px_rgba(46,125,50,0.04)] mb-8">
                    {{-- Chart Wrapper --}}
                    <div class="overflow-x-auto pb-4">
                        <div class="min-w-[600px] lg:min-w-0 pr-4">
                            {{-- Chart Grid --}}
                            <div class="flex items-start">
                                {{-- Y-axis numbers --}}
                                <div class="flex flex-col justify-between text-right pr-2 text-[10px] text-gray-400 font-bold h-[240px] pt-6 select-none shrink-0 w-12">
                                    @foreach ($voterYLabels as $labelVal)
                                        <span>{{ number_format($labelVal, 0, ',', '.') }}</span>
                                    @endforeach
                                </div>

                                {{-- Bars + Gridlines Area --}}
                                <div class="relative flex-grow h-[240px] pt-6">
                                    {{-- Background Horizontal Gridlines --}}
                                    <div class="absolute bottom-0 left-0 right-0 h-[216px] flex flex-col justify-between pointer-events-none">
                                        @for ($i = 0; $i < 6; $i++)
                                            <div class="border-b border-gray-100/80 w-full h-0"></div>
                                        @endfor
                                    </div>

                                    {{-- Bars Container --}}
                                    <div class="absolute bottom-0 left-0 right-0 h-[216px] flex justify-around items-end z-10 px-12 sm:px-20 md:px-32">
                                        @foreach ($votersData as $voter)
                                            <div class="flex flex-col items-center group w-full">
                                                <span class="text-[10px] sm:text-xs text-gray-500 font-bold mb-1.5 group-hover:scale-105 transition duration-200">
                                                    {{ $voter['value'] }}
                                                </span>
                                                <div 
                                                    class="bg-gradient-to-t from-[color:var(--primary-deep)] to-[color:var(--primary)] hover:from-[color:var(--primary)] hover:to-[color:var(--secondary)] rounded-t-md w-14 sm:w-16 md:w-20 transition-all duration-300 shadow-[0_-2px_8px_rgba(46,125,50,0.1)] hover:shadow-[0_-4px_12px_rgba(46,125,50,0.2)]" 
                                                    style="height: {{ ($voter['value'] / $voterMaxY) * 216 }}px"
                                                ></div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            {{-- X-axis labels --}}
                            <div class="flex items-start mt-3 pt-3 border-t border-gray-100">
                                <div class="w-12 shrink-0"></div> {{-- Spacer to match Y-axis offset --}}
                                <div class="flex justify-around flex-grow px-12 sm:px-20 md:px-32">
                                    @foreach ($votersData as $voter)
                                        <div class="w-14 sm:w-16 md:w-20 text-center text-xs text-[color:var(--text-soft)] font-bold select-none">
                                            {{ $voter['label'] }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Title Berdasarkan Perkawinan --}}
                <div class="infotab-stats-title mt-10">Berdasarkan Status Perkawinan</div>

                <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 mb-8">
                    @foreach (($maritalData ?? []) as $item)
                        <div class="flex items-center gap-5 p-5 bg-[color:var(--surface-strong)] border border-[color:var(--line)] rounded-2xl shadow-[0_8px_24px_rgba(46,125,50,0.02)] hover:-translate-y-0.5 hover:shadow-[0_16px_36px_rgba(46,125,50,0.06)] transition duration-200">
                            <div class="flex-shrink-0">
                                @if ($item['icon'] === 'belum_kawin')
                                    <svg viewBox="0 0 100 80" class="w-20 h-16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="50" cy="40" r="32" fill="#f1f8e9"/>
                                        <path d="M50 48c8.284 0 15-6.716 15-15 0-4.5-2-9-5.5-12.5C56 17 50.5 16 50 16s-6 1-9.5 4.5c-3.5 3.5-5.5 8-5.5 12.5 0 8.284 6.716 15 15 15z" fill="#ffcc80"/>
                                        <path d="M38 28c0-8 6-13 12-13s12 5 12 13c0 3-1 6-3 8-1-5-4-8-9-8s-8 3-9 8c-2-2-3-5-3-8z" fill="#6d4c41"/>
                                        <path d="M44 48c-2.2 0-4 1.8-4 4 0 1.5 2 3.5 10 7.5 8-4 10-6 10-7.5 0-2.2-1.8-4-4-4-2 0-3.5 1.5-6 3.5-2.5-2-4-3.5-6-3.5z" fill="#e57373"/>
                                        <circle cx="46" cy="30" r="1.5" fill="#3e2723"/>
                                        <circle cx="54" cy="30" r="1.5" fill="#3e2723"/>
                                        <path d="M48 35c1 1 3 1 4 0" stroke="#3e2723" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>
                                @elseif ($item['icon'] === 'kawin')
                                    <svg viewBox="0 0 100 80" class="w-20 h-16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="50" cy="40" r="32" fill="#fff9c4"/>
                                        <path d="M30 60c0-6 4-10 10-10h4c6 0 10 4 10 10v4H30v-4z" fill="#374151"/>
                                        <circle cx="39" cy="36" r="8" fill="#ffcc80"/>
                                        <path d="M33 32c0-4 3-7 6-7s6 3 6 7v1h-12v-1z" fill="#4e342e"/>
                                        <path d="M37 50l2 4 2-4h-4z" fill="#e57373"/>
                                        <path d="M52 60c0-6 4-10 10-10h4c6 0 10 4 10 10v4H52v-4z" fill="#ffffff" stroke="#cfd8dc"/>
                                        <circle cx="61" cy="38" r="8" fill="#ffcc80"/>
                                        <path d="M55 35c0-4 3-7 6-7s6 3 6 7c0 2-1 4-2 5-1-3-3-4-4-4s-3 1-4 4c-1-1-2-3-2-5z" fill="#8d6e63"/>
                                        <path d="M50 32c-2 4-2 15-1 20 2-1 6-2 6-2s-1-9-1-13c-2-2-3-4-4-5z" fill="#e0f2f1" opacity="0.6"/>
                                        <circle cx="49" cy="52" r="3.5" fill="#f48fb1"/>
                                        <circle cx="45" cy="54" r="3.5" fill="#f8bbd0"/>
                                        <circle cx="52" cy="55" r="3" fill="#ff80ab"/>
                                    </svg>
                                @elseif ($item['icon'] === 'cerai_mati')
                                    <svg viewBox="0 0 100 80" class="w-20 h-16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="50" cy="40" r="32" fill="#eceff1"/>
                                        <path d="M38 58V32c0-6.6 5.4-12 12-12s12 5.4 12 12v26H38z" fill="#90a4ae"/>
                                        <path d="M36 58h28v4H36v-4z" fill="#78909c"/>
                                        <text x="50" y="38" fill="#cfd8dc" font-size="8" font-family="Plus Jakarta Sans, sans-serif" font-weight="800" text-anchor="middle">RIP</text>
                                        <path d="M48 44h4m-2-2v6" stroke="#cfd8dc" stroke-width="1.5" stroke-linecap="round"/>
                                        <circle cx="34" cy="58" r="3" fill="#fff59d"/>
                                        <path d="M31 58c0-2 1-3 3-3s3 1 3 3-1 3-3 3-3-1-3-3z" fill="#fffde7"/>
                                        <path d="M34 58v3" stroke="#81c784" stroke-width="1" stroke-linecap="round"/>
                                    </svg>
                                @elseif ($item['icon'] === 'kawin_tercatat')
                                    <svg viewBox="0 0 100 80" class="w-20 h-16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="50" cy="40" r="32" fill="#e8f5e9"/>
                                        <rect x="36" y="22" width="28" height="36" rx="2" fill="#ffffff" stroke="#81c784" stroke-width="2"/>
                                        <path d="M50 36c-1.5-2-4-2-5.5.5s-.5 4.5 5.5 8c6-3.5 7-6.5 5.5-8s-4-2.5-5.5-.5z" fill="#e57373"/>
                                        <line x1="42" y1="48" x2="58" y2="48" stroke="#b0bec5" stroke-width="1.5" stroke-linecap="round"/>
                                        <line x1="42" y1="52" x2="52" y2="52" stroke="#b0bec5" stroke-width="1.5" stroke-linecap="round"/>
                                        <circle cx="62" cy="24" r="5" fill="#81c784"/>
                                        <path d="M60 24l1.5 1.5 2-2.5" stroke="#ffffff" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                @elseif ($item['icon'] === 'cerai_hidup')
                                    <svg viewBox="0 0 100 80" class="w-20 h-16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="50" cy="40" r="32" fill="#fbe9e7"/>
                                        <path d="M50 26c-3-4-8-4-11 0s-1 9 11 16c12-7 14-12 11-16s-8-4-11 0z" fill="#ffab91"/>
                                        <path d="M50 22l-2 6 4 4-4 5 2 5" stroke="#fbe9e7" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <circle cx="30" cy="38" r="6" fill="#ffcc80"/>
                                        <path d="M22 56c0-5 3-8 8-8s8 3 8 8" fill="#90a4ae"/>
                                        <circle cx="70" cy="38" r="6" fill="#ffcc80"/>
                                        <path d="M62 56c0-5 3-8 8-8s8 3 8 8" fill="#b0bec5"/>
                                    </svg>
                                @elseif ($item['icon'] === 'kawin_tidak_tercatat')
                                    <svg viewBox="0 0 100 80" class="w-20 h-16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="50" cy="40" r="32" fill="#ffebee"/>
                                        <rect x="36" y="22" width="28" height="36" rx="2" fill="#ffffff" stroke="#ff8a80" stroke-width="2" opacity="0.6"/>
                                        <path d="M50 36c-1.5-2-4-2-5.5.5s-.5 4.5 5.5 8c6-3.5 7-6.5 5.5-8s-4-2.5-5.5-.5z" fill="#ffab91" opacity="0.6"/>
                                        <line x1="42" y1="48" x2="58" y2="48" stroke="#cfd8dc" stroke-width="1.5" stroke-linecap="round"/>
                                        <line x1="42" y1="52" x2="52" y2="52" stroke="#cfd8dc" stroke-width="1.5" stroke-linecap="round"/>
                                        <circle cx="50" cy="40" r="18" stroke="#e57373" stroke-width="3" fill="none"/>
                                        <line x1="37" y1="27" x2="63" y2="53" stroke="#e57373" stroke-width="3"/>
                                    </svg>
                                @endif
                            </div>
                            <div>
                                <p class="text-sm font-bold text-gray-500 leading-snug">{{ $item['label'] }}</p>
                                <p class="text-3xl font-extrabold mt-1" style="color: #7cb342;">{{ $item['value'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Title Berdasarkan Agama --}}
                <div class="infotab-stats-title mt-10">Berdasarkan Agama</div>

                <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 mb-8">
                    @foreach ($religionData as $index => $item)
                        <div class="flex items-center gap-5 p-5 bg-[color:var(--surface-strong)] border border-[color:var(--line)] rounded-2xl shadow-[0_8px_24px_rgba(46,125,50,0.02)] hover:-translate-y-0.5 hover:shadow-[0_16px_36px_rgba(46,125,50,0.06)] transition duration-200 {{ $index === 6 ? 'md:col-start-2 lg:col-start-2' : '' }}">
                            <div class="flex-shrink-0">
                                @if ($item['icon'] === 'islam')
                                    <svg viewBox="0 0 100 80" class="w-20 h-16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="50" cy="40" r="32" fill="#e8f5e9"/>
                                        <rect x="32" y="38" width="36" height="22" rx="1" fill="#81c784"/>
                                        <path d="M38 38c0-8.8 5.4-16 12-16s12 7.2 12 16H38z" fill="#4caf50"/>
                                        <rect x="26" y="32" width="6" height="28" rx="0.5" fill="#a5d6a7"/>
                                        <rect x="68" y="32" width="6" height="28" rx="0.5" fill="#a5d6a7"/>
                                        <path d="M26 32c0-3.3 1.3-6 3-6s3 2.7 3 6H26z" fill="#81c784"/>
                                        <path d="M68 32c0-3.3 1.3-6 3-6s3 2.7 3 6H68z" fill="#81c784"/>
                                        <path d="M45 60V50c0-2.8 2.2-5 5-5s5 2.2 5 5v10H45z" fill="#1b5e20"/>
                                        <path d="M29 20c0-.5.5-1 1-1s1 .5 1 1-.5 1-1 1" fill="#fff59d"/>
                                        <path d="M71 20c0-.5.5-1 1-1s1 .5 1 1-.5 1-1 1" fill="#fff59d"/>
                                        <path d="M50 16c0-.8.7-1.5 1.5-1.5s1.5.7 1.5 1.5-.7 1.5-1.5 1.5S50 16.8 50 16" fill="#fff59d"/>
                                    </svg>
                                @elseif ($item['icon'] === 'kristen')
                                    <svg viewBox="0 0 100 80" class="w-20 h-16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="50" cy="40" r="32" fill="#e8f5e9"/>
                                        <rect x="46" y="20" width="8" height="40" rx="1.5" fill="#4caf50"/>
                                        <rect x="34" y="30" width="32" height="8" rx="1.5" fill="#4caf50"/>
                                    </svg>
                                @elseif ($item['icon'] === 'katolik')
                                    <svg viewBox="0 0 100 80" class="w-20 h-16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="50" cy="40" r="32" fill="#e8f5e9"/>
                                        <rect x="36" y="22" width="28" height="36" rx="3" fill="#4caf50"/>
                                        <rect x="62" y="24" width="3" height="32" fill="#fff9c4" rx="1"/>
                                        <path d="M54 44v18l3-3 3 3V44H54z" fill="#ffd54f"/>
                                        <rect x="48" y="29" width="4" height="12" rx="0.5" fill="#ffffff"/>
                                        <rect x="44" y="33" width="12" height="4" rx="0.5" fill="#ffffff"/>
                                    </svg>
                                @elseif ($item['icon'] === 'hindu')
                                    <svg viewBox="0 0 100 80" class="w-20 h-16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="50" cy="40" r="32" fill="#e8f5e9"/>
                                        <path d="M36.4 34.6c1.8-3.3 5.4-5.6 9.6-5.6 6 0 10.8 4.8 10.8 10.8 0 2.2-.6 4.2-1.8 5.9-2.5 3.6-7 5.9-12 5.9M36.4 51.6c1.8 3.3 5.4 5.6 9.6 5.6 6 0 10.8-4.8 10.8-10.8 0-2.2-.6-4.2-1.8-5.9" stroke="#4caf50" stroke-width="4.5" stroke-linecap="round"/>
                                        <path d="M52 46.5c3.2-1.5 5.5-4.7 5.5-8.5 0-5.2-4.3-9.5-9.5-9.5" stroke="#4caf50" stroke-width="4.5" stroke-linecap="round"/>
                                        <path d="M57 23.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" fill="#ffb300"/>
                                        <path d="M51 28c1.5.5 3.5.5 5 0" stroke="#4caf50" stroke-width="2.5" stroke-linecap="round"/>
                                    </svg>
                                @elseif ($item['icon'] === 'buddha')
                                    <svg viewBox="0 0 100 80" class="w-20 h-16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="50" cy="40" r="32" fill="#e8f5e9"/>
                                        <path d="M50 34c-4 7 0 22 0 22s4-15 0-22z" fill="#4caf50"/>
                                        <path d="M50 56s-10-8-12-16c-2-7 4-10 4-10s2 6 8 11v15z" fill="#81c784"/>
                                        <path d="M50 56s-14-1-18-8c-4-6 1-10 1-10s4 4 11 7v11z" fill="#a5d6a7"/>
                                        <path d="M50 56s10-8 12-16c2-7-4-10-4-10s-2 6-8 11v15z" fill="#81c784"/>
                                        <path d="M50 56s14-1 18-8c4-6-1-10-1-10s-4 4-11 7v11z" fill="#a5d6a7"/>
                                        <circle cx="50" cy="25" r="4.5" fill="#ffb300"/>
                                    </svg>
                                @elseif ($item['icon'] === 'konghucu')
                                    <svg viewBox="0 0 100 80" class="w-20 h-16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="50" cy="40" r="32" fill="#e8f5e9"/>
                                        <rect x="33" y="58" width="6" height="3" fill="#ffb300"/>
                                        <rect x="61" y="58" width="6" height="3" fill="#ffb300"/>
                                        <rect x="34" y="28" width="4" height="30" fill="#81c784"/>
                                        <rect x="62" y="28" width="4" height="30" fill="#81c784"/>
                                        <rect x="30" y="34" width="40" height="4" rx="0.5" fill="#4caf50"/>
                                        <path d="M26 24c4-1 16-2 24-2s20 1 24 2l2 4H24l2-4z" fill="#2e7d32"/>
                                        <rect x="38" y="26" width="3" height="2" fill="#ffb300"/>
                                        <rect x="59" y="26" width="3" height="2" fill="#ffb300"/>
                                    </svg>
                                @elseif ($item['icon'] === 'kepercayaan_lainnya')
                                    <svg viewBox="0 0 100 80" class="w-20 h-16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="50" cy="40" r="32" fill="#eceff1"/>
                                        <circle cx="50" cy="40" r="18" stroke="#cfd8dc" stroke-width="4" fill="none"/>
                                    </svg>
                                @endif
                            </div>
                            <div>
                                <p class="text-sm font-bold text-gray-500 leading-snug">{{ $item['label'] }}</p>
                                <p class="text-3xl font-extrabold mt-1" style="color: #7cb342;">{{ $item['value'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- APBDes --}}
            <div id="tab-apbdes" role="tabpanel" x-show="tab === 'apbdes'" x-transition.opacity.duration.300ms>
                <div class="infotab-panel">
                    <div class="infotab-panel-text">
                        <h2 class="infotab-panel-title">APBDes Desa Bade</h2>
                        <p class="infotab-panel-desc">Anggaran Pendapatan dan Belanja Desa (APBDes) merupakan rencana keuangan tahunan pemerintahan desa yang ditetapkan dengan Peraturan Desa. Transparansi anggaran untuk mendukung pembangunan yang akuntabel dan partisipatif.</p>
                    </div>
                    <div class="infotab-panel-art">
                        <div class="infotab-art-blob infotab-art-blob--gold"></div>
                        <svg class="infotab-art-svg" viewBox="0 0 220 180" fill="none">
                            <rect x="40" y="30" width="100" height="120" rx="10" fill="rgba(212,160,23,0.10)" stroke="#d4a017" stroke-width="2"/>
                            <rect x="55" y="55" width="70" height="8" rx="4" fill="#d4a017" opacity="0.5"/>
                            <rect x="55" y="72" width="50" height="8" rx="4" fill="#d4a017" opacity="0.35"/>
                            <rect x="55" y="89" width="60" height="8" rx="4" fill="#d4a017" opacity="0.25"/>
                            <rect x="30" y="100" width="20" height="50" rx="4" fill="#4caf50" opacity="0.5"/>
                            <rect x="60" y="80" width="20" height="70" rx="4" fill="#2e7d32" opacity="0.6"/>
                            <rect x="90" y="90" width="20" height="60" rx="4" fill="#4caf50" opacity="0.4"/>
                            <rect x="120" y="70" width="20" height="80" rx="4" fill="#d4a017" opacity="0.5"/>
                            <rect x="150" y="110" width="20" height="40" rx="4" fill="#2e7d32" opacity="0.3"/>
                        </svg>
                    </div>
                </div>

                {{-- Interactive Embedded PDF Viewer (Full Width) --}}
                @php
                    $firstDoc = $apbdesList->first();
                    $firstPdfUrl = $firstDoc
                        ? route('apbdes.stream_pdf', ['id' => $firstDoc->id, 'filename' => trim(str_replace(' ', '-', preg_replace('/[^A-Za-z0-9\-_. ]/', '', $firstDoc->judul ?: 'APBDes-'.$firstDoc->tahun))) . '.pdf'])
                        : '';
                    $firstTitle = $firstDoc ? $firstDoc->judul : '';
                    $firstYear  = $firstDoc ? $firstDoc->tahun : '';
                @endphp
                <div class="mt-8" x-data="{ activePdf: '{{ $firstPdfUrl }}', activeTitle: '{{ addslashes($firstTitle) }}', activeYear: '{{ $firstYear }}' }">
                    
                    @if($apbdesList->isNotEmpty())
                    {{-- Document Switcher Pills (hanya tampil kalau lebih dari 1 dokumen) --}}
                    @if($apbdesList->count() > 1)
                    <div class="flex justify-end flex-wrap gap-4 mb-6">
                        <div class="flex gap-2 flex-wrap bg-[color:var(--surface-strong)] p-1.5 rounded-xl border border-[color:var(--line)]">
                            @foreach($apbdesList as $doc)
                            @php
                                $docPdfUrl = route('apbdes.stream_pdf', [
                                    'id'       => $doc->id,
                                    'filename' => trim(str_replace(' ', '-', preg_replace('/[^A-Za-z0-9\-_. ]/', '', $doc->judul ?: 'APBDes-'.$doc->tahun))) . '.pdf',
                                ]);
                            @endphp
                            <button type="button"
                                @click="activePdf = '{{ $docPdfUrl }}'; activeTitle = '{{ addslashes($doc->judul) }}'; activeYear = '{{ $doc->tahun }}'"
                                :class="activePdf === '{{ $docPdfUrl }}' ? 'bg-[color:var(--primary)] text-white shadow-sm' : 'text-gray-600 hover:bg-gray-100'"
                                class="px-4 py-2 text-xs font-bold rounded-lg transition duration-150 flex items-center gap-2">
                                <span>📄</span>
                                <span>{{ $doc->judul }} ({{ $doc->tahun }})</span>
                            </button>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    {{-- PDF Viewer Box (Full Width) --}}
                    <div class="bg-[color:var(--surface-strong)] border border-[color:var(--line)] rounded-2xl p-4 sm:p-6 shadow-[0_12px_40px_rgba(46,125,50,0.06)] w-full">
                        <div class="flex items-center justify-between flex-wrap gap-3 pb-4 mb-4 border-b border-[color:var(--line)]">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-amber-500/10 text-amber-600 flex items-center justify-center font-bold text-lg">📄</div>
                                <div>
                                    <h3 class="text-base sm:text-lg font-bold text-[color:var(--text)] leading-snug" x-text="activeTitle"></h3>
                                    <p class="text-xs text-[color:var(--text-soft)]">Tahun Anggaran <span x-text="activeYear" class="font-bold"></span></p>
                                </div>
                            </div>
                            <a :href="activePdf" target="_blank" download
                               class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-[color:var(--primary)] text-white text-xs font-bold hover:bg-[color:var(--primary-deep)] transition duration-200 shadow-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                </svg>
                                Download PDF
                            </a>
                        </div>

                        {{-- Embedded iFrame --}}
                        <div class="relative w-full rounded-xl overflow-hidden border border-gray-200" style="min-height: 650px; height: 850px;">
                            <iframe :src="activePdf + '#toolbar=0&navpanes=0'" class="w-full h-full border-0 rounded-xl bg-gray-50" title="Dokumen APBDes"></iframe>
                        </div>
                    </div>

                    @else
                    <div class="p-12 text-center bg-[color:var(--surface-strong)] border border-[color:var(--line)] rounded-2xl w-full">
                        <div class="text-4xl mb-3">📄</div>
                        <p class="text-base font-bold text-[color:var(--text)]">Belum Ada Dokumen APBDes</p>
                        <p class="text-xs text-[color:var(--text-soft)] mt-1">Dokumen transparansi APBDes akan diunggah oleh pemerintah desa.</p>
                    </div>
                    @endif
                </div>
            </div>

            {{-- STUNTING --}}
            <div id="tab-stunting" role="tabpanel" x-show="tab === 'stunting'" x-transition.opacity.duration.300ms>
                <div class="infotab-panel">
                    <div class="infotab-panel-text">
                        <h2 class="infotab-panel-title">Data Stunting</h2>
                        <p class="infotab-panel-desc">Pemantauan dan penanganan stunting di Desa Bade sebagai bagian dari program penurunan angka stunting nasional. Data ini diperbarui secara berkala melalui posyandu dan tenaga kesehatan desa.</p>
                    </div>
                    <div class="infotab-panel-art">
                        <div class="infotab-art-blob infotab-art-blob--red"></div>
                        <svg class="infotab-art-svg" viewBox="0 0 220 180" fill="none">
                            <rect x="40" y="30" width="100" height="120" rx="10" fill="rgba(229,115,115,0.10)" stroke="#e57373" stroke-width="2"/>
                            <rect x="55" y="55" width="70" height="8" rx="4" fill="#e57373" opacity="0.5"/>
                            <rect x="55" y="72" width="50" height="8" rx="4" fill="#e57373" opacity="0.35"/>
                            <rect x="55" y="89" width="60" height="8" rx="4" fill="#e57373" opacity="0.25"/>
                            <path d="M40 130 Q75 110 100 120 T160 85" stroke="#ef5350" stroke-width="3" stroke-linecap="round" fill="none"/>
                            <circle cx="100" cy="120" r="6" fill="#ef5350"/>
                            <circle cx="160" cy="85" r="8" fill="#4caf50"/>
                            <rect x="140" y="110" width="30" height="35" rx="6" fill="rgba(229,115,115,0.2)" stroke="#ef5350" stroke-width="1.5"/>
                            <path d="M155 120v14M148 127h14" stroke="#c62828" stroke-width="2.5" stroke-linecap="round"/>
                        </svg>
                    </div>
                </div>

                @php
                    $firstStunting = $stuntingList->first();
                    $firstStuntingPdfUrl = $firstStunting
                        ? route('stunting.stream_pdf', ['id' => $firstStunting->id, 'filename' => trim(str_replace(' ', '-', preg_replace('/[^A-Za-z0-9\-_. ]/', '', $firstStunting->judul ?: 'Stunting-'.$firstStunting->tahun))) . '.pdf'])
                        : '';
                    $firstStuntingTitle = $firstStunting ? ($firstStunting->judul ?: 'Data Stunting ' . $firstStunting->tahun) : '';
                    $firstStuntingYear  = $firstStunting ? $firstStunting->tahun : '';
                @endphp
                <div class="mt-8" x-data="{ activePdf: '{{ $firstStuntingPdfUrl }}', activeTitle: '{{ addslashes($firstStuntingTitle) }}', activeYear: '{{ $firstStuntingYear }}' }">
                    @if($stuntingList->isNotEmpty())
                    @if($stuntingList->count() > 1)
                    <div class="flex justify-end flex-wrap gap-4 mb-6">
                        <div class="flex gap-2 flex-wrap bg-[color:var(--surface-strong)] p-1.5 rounded-xl border border-[color:var(--line)]">
                            @foreach($stuntingList as $doc)
                            @php
                                $docPdfUrl = route('stunting.stream_pdf', [
                                    'id'       => $doc->id,
                                    'filename' => trim(str_replace(' ', '-', preg_replace('/[^A-Za-z0-9\-_. ]/', '', $doc->judul ?: 'Stunting-'.$doc->tahun))) . '.pdf',
                                ]);
                                $docTitle = $doc->judul ?: 'Data Stunting ' . $doc->tahun;
                            @endphp
                            <button type="button"
                                @click="activePdf = '{{ $docPdfUrl }}'; activeTitle = '{{ addslashes($docTitle) }}'; activeYear = '{{ $doc->tahun }}'"
                                :class="activePdf === '{{ $docPdfUrl }}' ? 'bg-[color:var(--primary)] text-white shadow-sm' : 'text-gray-600 hover:bg-gray-100'"
                                class="px-4 py-2 text-xs font-bold rounded-lg transition duration-150 flex items-center gap-2">
                                <span>📄</span>
                                <span>{{ $docTitle }} ({{ $doc->tahun }})</span>
                            </button>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <div class="bg-[color:var(--surface-strong)] border border-[color:var(--line)] rounded-2xl p-4 sm:p-6 shadow-[0_12px_40px_rgba(46,125,50,0.06)] w-full">
                        <div class="flex items-center justify-between flex-wrap gap-3 pb-4 mb-4 border-b border-[color:var(--line)]">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-red-500/10 text-red-600 flex items-center justify-center font-bold text-lg">📄</div>
                                <div>
                                    <h3 class="text-base sm:text-lg font-bold text-[color:var(--text)] leading-snug" x-text="activeTitle"></h3>
                                    <p class="text-xs text-[color:var(--text-soft)]">Tahun <span x-text="activeYear" class="font-bold"></span></p>
                                </div>
                            </div>
                            <a :href="activePdf" target="_blank" download
                               class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-[color:var(--primary)] text-white text-xs font-bold hover:bg-[color:var(--primary-deep)] transition duration-200 shadow-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                </svg>
                                Download PDF
                            </a>
                        </div>
                        <div class="relative w-full rounded-xl overflow-hidden border border-gray-200" style="min-height: 650px; height: 850px;">
                            <iframe :src="activePdf + '#toolbar=0&navpanes=0'" class="w-full h-full border-0 rounded-xl bg-gray-50" title="Dokumen Stunting"></iframe>
                        </div>
                    </div>
                    @else
                    <div class="p-12 text-center bg-[color:var(--surface-strong)] border border-[color:var(--line)] rounded-2xl w-full">
                        <div class="text-4xl mb-3">📄</div>
                        <p class="text-base font-bold text-[color:var(--text)]">Belum Ada Dokumen Stunting</p>
                        <p class="text-xs text-[color:var(--text-soft)] mt-1">Dokumen Stunting akan diunggah oleh pemerintah desa.</p>
                    </div>
                    @endif
                </div>
            </div>

            {{-- BANSOS --}}
            <div id="tab-bansos" role="tabpanel" x-show="tab === 'bansos'" x-transition.opacity.duration.300ms>
                <div class="infotab-panel">
                    <div class="infotab-panel-text">
                        <h2 class="infotab-panel-title">Bantuan Sosial</h2>
                        <p class="infotab-panel-desc">Data penerima Bantuan Sosial (Bansos) dari berbagai program pemerintah. Transparansi data penerima manfaat untuk memastikan tepat sasaran dan akuntabilitas penyaluran di Desa Bade.</p>
                    </div>
                    <div class="infotab-panel-art">
                        <div class="infotab-art-blob infotab-art-blob--blue"></div>
                        <svg class="infotab-art-svg" viewBox="0 0 220 180" fill="none">
                            <rect x="40" y="30" width="100" height="120" rx="10" fill="rgba(33,150,243,0.10)" stroke="#42a5f5" stroke-width="2"/>
                            <rect x="55" y="55" width="70" height="8" rx="4" fill="#42a5f5" opacity="0.5"/>
                            <rect x="55" y="72" width="50" height="8" rx="4" fill="#42a5f5" opacity="0.35"/>
                            <rect x="55" y="89" width="60" height="8" rx="4" fill="#42a5f5" opacity="0.25"/>
                            <rect x="30" y="110" width="20" height="40" rx="4" fill="#42a5f5" opacity="0.5"/>
                            <rect x="60" y="95" width="20" height="55" rx="4" fill="#1e88e5" opacity="0.7"/>
                            <rect x="90" y="105" width="20" height="45" rx="4" fill="#42a5f5" opacity="0.4"/>
                            <rect x="135" y="100" width="45" height="45" rx="10" fill="rgba(33,150,243,0.15)" stroke="#1e88e5" stroke-width="2"/>
                            <path d="M147 122c0-4 4-7 11-7s11 3 11 7" stroke="#1e88e5" stroke-width="2" stroke-linecap="round"/>
                            <circle cx="158" cy="113" r="4" fill="#1e88e5"/>
                        </svg>
                    </div>
                </div>

                @php
                    $firstBansos = $bansosList->first();
                    $firstBansosPdfUrl = $firstBansos
                        ? route('bansos.stream_pdf', ['id' => $firstBansos->id, 'filename' => trim(str_replace(' ', '-', preg_replace('/[^A-Za-z0-9\-_. ]/', '', $firstBansos->judul ?: ($firstBansos->nama_program ?: 'Bansos-'.$firstBansos->tahun)))) . '.pdf'])
                        : '';
                    $firstBansosTitle = $firstBansos ? ($firstBansos->judul ?: ($firstBansos->nama_program ?: 'Data Bansos ' . $firstBansos->tahun)) : '';
                    $firstBansosYear  = $firstBansos ? $firstBansos->tahun : '';
                @endphp
                <div class="mt-8" x-data="{ activePdf: '{{ $firstBansosPdfUrl }}', activeTitle: '{{ addslashes($firstBansosTitle) }}', activeYear: '{{ $firstBansosYear }}' }">
                    @if($bansosList->isNotEmpty())
                    @if($bansosList->count() > 1)
                    <div class="flex justify-end flex-wrap gap-4 mb-6">
                        <div class="flex gap-2 flex-wrap bg-[color:var(--surface-strong)] p-1.5 rounded-xl border border-[color:var(--line)]">
                            @foreach($bansosList as $doc)
                            @php
                                $docPdfUrl = route('bansos.stream_pdf', [
                                    'id'       => $doc->id,
                                    'filename' => trim(str_replace(' ', '-', preg_replace('/[^A-Za-z0-9\-_. ]/', '', $doc->judul ?: ($doc->nama_program ?: 'Bansos-'.$doc->tahun)))) . '.pdf',
                                ]);
                                $docTitle = $doc->judul ?: ($doc->nama_program ?: 'Data Bansos ' . $doc->tahun);
                            @endphp
                            <button type="button"
                                @click="activePdf = '{{ $docPdfUrl }}'; activeTitle = '{{ addslashes($docTitle) }}'; activeYear = '{{ $doc->tahun }}'"
                                :class="activePdf === '{{ $docPdfUrl }}' ? 'bg-[color:var(--primary)] text-white shadow-sm' : 'text-gray-600 hover:bg-gray-100'"
                                class="px-4 py-2 text-xs font-bold rounded-lg transition duration-150 flex items-center gap-2">
                                <span>📄</span>
                                <span>{{ $docTitle }} ({{ $doc->tahun }})</span>
                            </button>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <div class="bg-[color:var(--surface-strong)] border border-[color:var(--line)] rounded-2xl p-4 sm:p-6 shadow-[0_12px_40px_rgba(46,125,50,0.06)] w-full">
                        <div class="flex items-center justify-between flex-wrap gap-3 pb-4 mb-4 border-b border-[color:var(--line)]">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-blue-500/10 text-blue-600 flex items-center justify-center font-bold text-lg">📄</div>
                                <div>
                                    <h3 class="text-base sm:text-lg font-bold text-[color:var(--text)] leading-snug" x-text="activeTitle"></h3>
                                    <p class="text-xs text-[color:var(--text-soft)]">Tahun <span x-text="activeYear" class="font-bold"></span></p>
                                </div>
                            </div>
                            <a :href="activePdf" target="_blank" download
                               class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-[color:var(--primary)] text-white text-xs font-bold hover:bg-[color:var(--primary-deep)] transition duration-200 shadow-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                </svg>
                                Download PDF
                            </a>
                        </div>
                        <div class="relative w-full rounded-xl overflow-hidden border border-gray-200" style="min-height: 650px; height: 850px;">
                            <iframe :src="activePdf + '#toolbar=0&navpanes=0'" class="w-full h-full border-0 rounded-xl bg-gray-50" title="Dokumen Bansos"></iframe>
                        </div>
                    </div>
                    @else
                    <div class="p-12 text-center bg-[color:var(--surface-strong)] border border-[color:var(--line)] rounded-2xl w-full">
                        <div class="text-4xl mb-3">📄</div>
                        <p class="text-base font-bold text-[color:var(--text)]">Belum Ada Dokumen Bansos</p>
                        <p class="text-xs text-[color:var(--text-soft)] mt-1">Dokumen Bantuan Sosial akan diunggah oleh pemerintah desa.</p>
                    </div>
                    @endif
                </div>
            </div>

            {{-- IDM --}}
            <div id="tab-idm" role="tabpanel" x-show="tab === 'idm'" x-transition.opacity.duration.300ms>
                <div class="infotab-panel">
                    <div class="infotab-panel-text">
                        <h2 class="infotab-panel-title">Indeks Desa Membangun</h2>
                        <p class="infotab-panel-desc">IDM merupakan indeks komposit yang dibentuk dari tiga indeks, yaitu Indeks Ketahanan Sosial, Indeks Ketahanan Ekonomi, dan Indeks Ketahanan Ekologi/Lingkungan. Desa Bade terus berupaya meningkatkan skor IDM setiap tahunnya.</p>
                    </div>
                    <div class="infotab-panel-art">
                        <div class="infotab-art-blob"></div>
                        <svg class="infotab-art-svg" viewBox="0 0 220 180" fill="none">
                            <rect x="40" y="30" width="100" height="120" rx="10" fill="rgba(46,125,50,0.10)" stroke="#2e7d32" stroke-width="2"/>
                            <rect x="55" y="55" width="70" height="8" rx="4" fill="#2e7d32" opacity="0.5"/>
                            <rect x="55" y="72" width="50" height="8" rx="4" fill="#2e7d32" opacity="0.35"/>
                            <rect x="55" y="89" width="60" height="8" rx="4" fill="#2e7d32" opacity="0.25"/>
                            <rect x="30" y="105" width="22" height="45" rx="4" fill="#81c784" opacity="0.5"/>
                            <rect x="60" y="85" width="22" height="65" rx="4" fill="#2e7d32" opacity="0.7"/>
                            <rect x="90" y="70" width="22" height="80" rx="4" fill="#4caf50" opacity="0.6"/>
                            <path d="M125 105l15-15 15 10 20-25" stroke="#2e7d32" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <circle cx="175" cy="75" r="5" fill="#2e7d32"/>
                        </svg>
                    </div>
                </div>

                @php
                    $firstIdm = isset($idmList) ? $idmList->first() : null;
                    $firstIdmPdfUrl = $firstIdm
                        ? route('idm.stream_pdf', ['id' => $firstIdm->id, 'filename' => trim(str_replace(' ', '-', preg_replace('/[^A-Za-z0-9\-_. ]/', '', $firstIdm->judul ?: 'IDM-'.$firstIdm->tahun))) . '.pdf'])
                        : '';
                    $firstIdmTitle = $firstIdm ? ($firstIdm->judul ?: 'Data IDM ' . $firstIdm->tahun) : '';
                    $firstIdmYear  = $firstIdm ? $firstIdm->tahun : '';
                @endphp
                <div class="mt-8" x-data="{ activePdf: '{{ $firstIdmPdfUrl }}', activeTitle: '{{ addslashes($firstIdmTitle) }}', activeYear: '{{ $firstIdmYear }}' }">
                    @if(isset($idmList) && $idmList->isNotEmpty())
                    @if($idmList->count() > 1)
                    <div class="flex justify-end flex-wrap gap-4 mb-6">
                        <div class="flex gap-2 flex-wrap bg-[color:var(--surface-strong)] p-1.5 rounded-xl border border-[color:var(--line)]">
                            @foreach($idmList as $doc)
                            @php
                                $docPdfUrl = route('idm.stream_pdf', [
                                    'id'       => $doc->id,
                                    'filename' => trim(str_replace(' ', '-', preg_replace('/[^A-Za-z0-9\-_. ]/', '', $doc->judul ?: 'IDM-'.$doc->tahun))) . '.pdf',
                                ]);
                                $docTitle = $doc->judul ?: 'Data IDM ' . $doc->tahun;
                            @endphp
                            <button type="button"
                                @click="activePdf = '{{ $docPdfUrl }}'; activeTitle = '{{ addslashes($docTitle) }}'; activeYear = '{{ $doc->tahun }}'"
                                :class="activePdf === '{{ $docPdfUrl }}' ? 'bg-[color:var(--primary)] text-white shadow-sm' : 'text-gray-600 hover:bg-gray-100'"
                                class="px-4 py-2 text-xs font-bold rounded-lg transition duration-150 flex items-center gap-2">
                                <span>📄</span>
                                <span>{{ $docTitle }} ({{ $doc->tahun }})</span>
                            </button>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <div class="bg-[color:var(--surface-strong)] border border-[color:var(--line)] rounded-2xl p-4 sm:p-6 shadow-[0_12px_40px_rgba(46,125,50,0.06)] w-full">
                        <div class="flex items-center justify-between flex-wrap gap-3 pb-4 mb-4 border-b border-[color:var(--line)]">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-emerald-500/10 text-emerald-600 flex items-center justify-center font-bold text-lg">📄</div>
                                <div>
                                    <h3 class="text-base sm:text-lg font-bold text-[color:var(--text)] leading-snug" x-text="activeTitle"></h3>
                                    <p class="text-xs text-[color:var(--text-soft)]">Tahun <span x-text="activeYear" class="font-bold"></span></p>
                                </div>
                            </div>
                            <a :href="activePdf" target="_blank" download
                               class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-[color:var(--primary)] text-white text-xs font-bold hover:bg-[color:var(--primary-deep)] transition duration-200 shadow-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                </svg>
                                Download PDF
                            </a>
                        </div>
                        <div class="relative w-full rounded-xl overflow-hidden border border-gray-200" style="min-height: 650px; height: 850px;">
                            <iframe :src="activePdf + '#toolbar=0&navpanes=0'" class="w-full h-full border-0 rounded-xl bg-gray-50" title="Dokumen IDM"></iframe>
                        </div>
                    </div>
                    @else
                    <div class="p-12 text-center bg-[color:var(--surface-strong)] border border-[color:var(--line)] rounded-2xl w-full">
                        <div class="text-4xl mb-3">📄</div>
                        <p class="text-base font-bold text-[color:var(--text)]">Belum Ada Dokumen IDM</p>
                        <p class="text-xs text-[color:var(--text-soft)] mt-1">Dokumen Indeks Desa Membangun (IDM) akan diunggah oleh pemerintah desa.</p>
                    </div>
                    @endif
                </div>
            </div>

            {{-- SDGs --}}
            <div id="tab-sdgs" role="tabpanel" x-show="tab === 'sdgs'" x-transition.opacity.duration.300ms>
                <div class="infotab-panel">
                    <div class="infotab-panel-text flex flex-col justify-between h-full">
                        <div>
                            <h2 class="infotab-panel-title">SDGs Desa</h2>
                            <p class="infotab-panel-desc text-[color:var(--text-soft)] leading-relaxed">SDGs desa mengacu pada upaya yang dilakukan di tingkat desa untuk mencapai Tujuan Pembangunan Berkelanjutan (Sustainable Development Goals/SDGs). SDGs merupakan agenda global yang ditetapkan oleh PBB untuk mengatasi berbagai tantangan sosial, ekonomi, dan lingkungan di seluruh dunia.</p>
                        </div>
                        
                        {{-- Score Card --}}
                        <div class="mt-8 bg-white border border-[color:var(--line)] rounded-2xl p-6 sm:p-8 shadow-[0_12px_40px_rgba(0,0,0,0.03)] hover:shadow-[0_16px_48px_rgba(46,125,50,0.05)] transition duration-300">
                            <div class="flex items-center justify-between gap-6">
                                <div class="flex flex-col gap-1.5">
                                    <span class="text-lg sm:text-xl font-extrabold text-gray-900 leading-tight">Rata-rata SDGs Desa</span>
                                    <span class="text-lg sm:text-xl font-extrabold text-gray-900 leading-tight">Bade</span>
                                </div>
                                <div class="text-5xl sm:text-6xl font-black text-gray-800 tracking-tighter select-none">
                                    {{ isset($sdgsDb) && $sdgsDb->isNotEmpty() ? number_format($sdgsDb->avg('capaian'), 2) : number_format($sdgsScore, 2) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="infotab-panel-art">
                        <div class="infotab-art-blob infotab-art-blob--blue"></div>
                        <svg class="infotab-art-svg" viewBox="0 0 220 180" fill="none">
                            <rect x="30" y="20" width="144" height="124" rx="20" fill="#e8f5e9" stroke="#a5d6a7" stroke-width="2"/>
                            <circle cx="95" cy="85" r="32" fill="#f3f4f6"/>
                            <path d="M95 85 L95 53 A32 32 0 0 1 127 85 Z" fill="#E5243B"/>
                            <path d="M95 85 L127 85 A32 32 0 0 1 95 117 Z" fill="#4C9F38"/>
                            <path d="M95 85 L95 117 A32 32 0 0 1 63 85 Z" fill="#26BDE2"/>
                            <path d="M95 85 L63 85 A32 32 0 0 1 95 53 Z" fill="#DDA63A"/>
                            <circle cx="95" cy="85" r="16" fill="#ffffff"/>
                        </svg>
                    </div>
                </div>

                {{-- SDGs Goals Cards Grid --}}
                <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 mb-8">
                    @foreach ($sdgsData as $sdg)
                        <div class="bg-white border border-[color:var(--line)] rounded-2xl p-4 shadow-[0_6px_20px_rgba(46,125,50,0.02)] hover:-translate-y-0.5 transition duration-200 flex flex-col justify-between min-h-[130px]">
                            <div class="text-xs sm:text-[13px] font-bold text-gray-700 leading-snug line-clamp-2">
                                {{ $sdg['label'] }}
                            </div>
                            <div class="flex items-end justify-between mt-3">
                                <div class="relative w-12 h-12 rounded-lg overflow-hidden shrink-0 shadow-sm flex items-center justify-center text-white font-black text-xs select-none" style="background: {{ $sdg['color'] ?? '#2e7d32' }}">
                                    <img src="{{ $sdg['image'] }}" alt="SDGs Goal {{ $sdg['goal'] }}" class="absolute inset-0 w-full h-full object-cover" loading="lazy" onerror="this.style.display='none'" />
                                    <span class="z-0">{{ $sdg['goal'] }}</span>
                                </div>
                                <div class="text-right">
                                    <p class="text-[9px] font-bold text-gray-400 uppercase tracking-wider">NILAI</p>
                                    <p class="text-2xl font-black text-gray-800 tracking-tight leading-none mt-1">
                                        {{ number_format($sdg['value'], 2, '.', '') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>{{-- end x-data --}}
    </div>
</section>
@endsection
