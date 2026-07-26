@extends('layouts.app')

@section('content')
    <section id="belanja-detail" class="section-pad">
        <div class="container-shell">
            <!-- Breadcrumb -->
            <nav class="flex text-sm text-gray-500 mb-6 items-center gap-2" aria-label="Breadcrumb">
                <a href="/" class="hover:text-green-600 transition">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                </a>
                <span class="text-gray-300">/</span>
                <a href="/belanja" class="hover:text-green-600 font-semibold transition">Belanja Desa</a>
                <span class="text-gray-300">/</span>
                <span class="text-gray-900 font-semibold truncate">{{ $shop['name'] }}</span>
            </nav>

            <!-- Main Content Card -->
            <div class="content-card bg-white p-6 md:p-10 mb-8" x-data="{ 
                images: {{ json_encode(array_values(isset($shop['images']) && count($shop['images']) > 0 ? $shop['images'] : [$shop['image']])) }},
                currentIndex: 0,
                showLightbox: false,
                next() { this.currentIndex = (this.currentIndex + 1) % this.images.length },
                prev() { this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length }
            }">
                <div class="grid gap-8 lg:grid-cols-2">
                    <!-- Column 1: Image Gallery Slider -->
                    <div>
                        <div class="relative rounded-3xl overflow-hidden shadow-sm border border-gray-100 bg-gray-950/5 flex items-center justify-center min-h-[340px] h-[360px] md:h-[460px] group cursor-pointer" @click="showLightbox = true">
                            <!-- Background Blur -->
                            <img :src="images[currentIndex]" alt="" class="absolute inset-0 w-full h-full object-cover blur-xl opacity-20 scale-110">
                            <!-- Main Uncropped Product Photo -->
                            <img :src="images[currentIndex]" alt="{{ $shop['name'] }}" class="relative max-w-full max-h-full w-auto h-auto object-contain transition duration-300 group-hover:scale-[1.01]">
                            
                            <!-- Prev Button -->
                            <template x-if="images.length > 1">
                                <button type="button" @click.stop="prev()" class="bg-black/50 hover:bg-black/80 text-white p-2.5 rounded-full backdrop-blur-md border border-white/20 shadow-md transition" style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); z-index: 20;" aria-label="Foto sebelumnya">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                                </button>
                            </template>

                            <!-- Next Button -->
                            <template x-if="images.length > 1">
                                <button type="button" @click.stop="next()" class="bg-black/50 hover:bg-black/80 text-white p-2.5 rounded-full backdrop-blur-md border border-white/20 shadow-md transition" style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%); z-index: 20;" aria-label="Foto berikutnya">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                                </button>
                            </template>

                            <!-- Dots Indicator & Counter -->
                            <template x-if="images.length > 1">
                                <div style="position: absolute; bottom: 16px; left: 50%; transform: translateX(-50%); z-index: 20; display: flex; align-items: center; gap: 8px; background: rgba(0, 0, 0, 0.65); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); padding: 6px 14px; border-radius: 9999px; border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 4px 12px rgba(0,0,0,0.25);">
                                    <template x-for="(img, idx) in images" :key="idx">
                                        <button type="button" @click.stop="currentIndex = idx" 
                                                :style="currentIndex === idx 
                                                    ? 'width: 22px; height: 8px; border-radius: 9999px; background-color: #22c55e; border: none; cursor: pointer; transition: all 0.3s ease;' 
                                                    : 'width: 8px; height: 8px; border-radius: 9999px; background-color: rgba(255, 255, 255, 0.6); border: none; cursor: pointer; transition: all 0.3s ease;'" 
                                                :aria-label="'Ke foto ' + (idx + 1)"></button>
                                    </template>
                                    <span style="color: #ffffff; font-size: 11px; font-weight: 700; font-family: sans-serif; margin-left: 2px; letter-spacing: 0.5px;" x-text="(currentIndex + 1) + '/' + images.length"></span>
                                </div>
                            </template>

                            <!-- Zoom Badge -->
                            <div class="bg-black/60 backdrop-blur-md text-white px-3 py-1.5 rounded-full text-xs font-semibold flex items-center gap-1.5 opacity-80 group-hover:opacity-100 transition" style="position: absolute; top: 16px; right: 16px; z-index: 20;">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"/></svg>
                                <span>Perbesar Foto</span>
                            </div>
                        </div>

                        <!-- Thumbnail Grid -->
                        <template x-if="images.length > 1">
                            <div class="mt-4 flex flex-wrap gap-3">
                                <template x-for="(imgUrl, idx) in images" :key="idx">
                                    <div @click="currentIndex = idx"
                                         :class="currentIndex === idx ? 'border-2 border-green-600 scale-[1.05]' : 'border border-gray-200 opacity-75 hover:opacity-100'"
                                         class="h-16 w-16 rounded-2xl overflow-hidden bg-gray-50 flex-shrink-0 cursor-pointer transition duration-150 shadow-sm">
                                        <img :src="imgUrl" alt="{{ $shop['name'] }}" class="h-full w-full object-cover">
                                    </div>
                                </template>
                            </div>
                        </template>

                        <!-- Lightbox Fullscreen Modal (Teleported to Body to avoid container transform clipping & overlay header) -->
                        <template x-teleport="body">
                            <div x-show="showLightbox" x-transition.opacity class="fixed inset-0 bg-black/95 backdrop-blur-md flex items-center justify-center p-4 md:p-8" style="position: fixed; inset: 0; z-index: 999999;" @click.self="showLightbox = false" x-cloak>
                                <!-- Small Close Button top-right -->
                                <button @click="showLightbox = false" style="position: absolute; top: 16px; right: 16px; z-index: 1000000; width: 32px; height: 32px; border-radius: 50%; background: rgba(0, 0, 0, 0.6); color: #ffffff; border: 1px solid rgba(255, 255, 255, 0.3); font-size: 18px; font-weight: bold; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.2s;" aria-label="Tutup Modal">&times;</button>
                                
                                <!-- Lightbox Prev Button -->
                                <template x-if="images.length > 1">
                                    <button type="button" @click.stop="prev()" class="bg-white/10 hover:bg-white/20 text-white p-3.5 rounded-full backdrop-blur-md border border-white/20 shadow-xl transition" style="position: absolute; left: 24px; top: 50%; transform: translateY(-50%); z-index: 1000000;" aria-label="Foto sebelumnya">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                                    </button>
                                </template>

                                <!-- Lightbox Next Button -->
                                <template x-if="images.length > 1">
                                    <button type="button" @click.stop="next()" class="bg-white/10 hover:bg-white/20 text-white p-3.5 rounded-full backdrop-blur-md border border-white/20 shadow-xl transition" style="position: absolute; right: 24px; top: 50%; transform: translateY(-50%); z-index: 1000000;" aria-label="Foto berikutnya">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                                    </button>
                                </template>

                                <img :src="images[currentIndex]" alt="{{ $shop['name'] }}" class="max-w-[92vw] max-h-[88vh] object-contain rounded-2xl shadow-2xl">
                                
                                <!-- Lightbox Dots Indicator & Counter -->
                                <template x-if="images.length > 1">
                                    <div style="position: absolute; bottom: 24px; left: 50%; transform: translateX(-50%); z-index: 1000000; display: flex; align-items: center; gap: 8px; background: rgba(0, 0, 0, 0.75); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); padding: 8px 18px; border-radius: 9999px; border: 1px solid rgba(255, 255, 255, 0.2);">
                                        <template x-for="(img, idx) in images" :key="idx">
                                            <button type="button" @click.stop="currentIndex = idx" 
                                                    :style="currentIndex === idx 
                                                        ? 'width: 24px; height: 8px; border-radius: 9999px; background-color: #22c55e; border: none; cursor: pointer; transition: all 0.3s ease;' 
                                                        : 'width: 8px; height: 8px; border-radius: 9999px; background-color: rgba(255, 255, 255, 0.6); border: none; cursor: pointer; transition: all 0.3s ease;'"></button>
                                        </template>
                                        <span style="color: #ffffff; font-size: 12px; font-weight: 700; font-family: sans-serif; margin-left: 4px; letter-spacing: 0.5px;" x-text="(currentIndex + 1) + ' / ' + images.length"></span>
                                    </div>
                                </template>
                            </div>
                        </template>
                    </div>

                    <!-- Column 2: Info -->
                    <div class="flex flex-col justify-between">
                        <div>
                            <!-- Header -->
                            <h1 class="text-2xl md:text-3xl lg:text-4xl font-extrabold text-gray-950 leading-tight">
                                {{ $shop['name'] }}
                            </h1>

                            <!-- Category Badge -->
                            <div class="flex flex-wrap items-center gap-3 mt-3.5 text-xs text-gray-500 font-semibold">
                                <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-green-50 text-green-700 border border-green-100 shadow-sm">
                                    {{ $shop['category'] }}
                                </span>
                            </div>

                            <!-- Price -->
                            <div class="mt-6">
                                <span class="text-3xl font-extrabold text-[color:var(--primary)]">{{ $shop['price'] }}</span>
                            </div>

                            <!-- Description -->
                            <div class="mt-6 text-[15px] text-gray-600 leading-relaxed max-w-xl" style="white-space: pre-line;">{{ $shop['description'] }}</div>
                        </div>

                        <!-- Action & Share buttons -->
                        <div class="mt-10">
                            <!-- Hubungi Penjual (WhatsApp) -->
                            <a href="{{ $shop['wa_link'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-2.5 px-7 py-3.5 rounded-full bg-[#25d366] hover:bg-[#20ba5a] text-white text-sm font-bold shadow-[0_6px_18px_rgba(37,211,102,0.3)] hover:-translate-y-0.5 transition duration-150">
                                <svg class="h-5 w-5 fill-current" viewBox="0 0 24 24">
                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.513 2.262 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.502-5.724-1.454L0 24zm6.59-4.846c1.6.95 3.398 1.452 5.34 1.453 5.4 0 9.792-4.393 9.795-9.798.002-2.618-1.017-5.079-2.872-6.936-1.854-1.854-4.312-2.873-6.932-2.875-5.4 0-9.792 4.393-9.797 9.799-.001 2.029.531 4.019 1.54 5.79l-1.011 3.693 3.785-.992z"/>
                                </svg>
                                Hubungi Penjual (WhatsApp)
                            </a>

                            <!-- Social Sharing links -->
                            <div class="mt-8 pt-5 border-t border-gray-100 flex items-center gap-3.5 flex-wrap" x-data="{
                                shareUrl: window.location.href,
                                shareTitle: '{{ addslashes($shop['name']) }}',
                                copied: false,
                                copyLink() {
                                    navigator.clipboard.writeText(this.shareUrl);
                                    this.copied = true;
                                    setTimeout(() => this.copied = false, 2500);
                                }
                            }">
                                <span class="text-xs font-bold text-gray-500">Bagikan:</span>
                                <!-- Facebook -->
                                <a :href="'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(shareUrl)" target="_blank" rel="noopener noreferrer" class="h-8.5 w-8.5 rounded-full border border-blue-200 bg-white hover:bg-blue-50 text-[#1877f2] flex items-center justify-center transition shadow-sm" title="Bagikan ke Facebook">
                                    <svg class="h-4 w-4 fill-current" viewBox="0 0 24 24">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                    </svg>
                                </a>
                                <!-- Whatsapp -->
                                <a :href="'https://api.whatsapp.com/send?text=' + encodeURIComponent(shareTitle + ' ' + shareUrl)" target="_blank" rel="noopener noreferrer" class="h-8.5 w-8.5 rounded-full bg-[#25d366] hover:bg-opacity-90 text-white flex items-center justify-center transition shadow-sm" title="Bagikan ke WhatsApp">
                                    <svg class="h-4 w-4 fill-current" viewBox="0 0 24 24">
                                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.513 2.262 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.502-5.724-1.454L0 24zm6.59-4.846c1.6.95 3.398 1.452 5.34 1.453 5.4 0 9.792-4.393 9.795-9.798.002-2.618-1.017-5.079-2.872-6.936-1.854-1.854-4.312-2.873-6.932-2.875-5.4 0-9.792 4.393-9.797 9.799-.001 2.029.531 4.019 1.54 5.79l-1.011 3.693 3.785-.992z"/>
                                    </svg>
                                </a>
                                <!-- Twitter/X -->
                                <a :href="'https://twitter.com/intent/tweet?url=' + encodeURIComponent(shareUrl) + '&text=' + encodeURIComponent(shareTitle)" target="_blank" rel="noopener noreferrer" class="h-8.5 w-8.5 rounded-full bg-black hover:bg-opacity-90 text-white flex items-center justify-center transition shadow-sm" title="Bagikan ke X">
                                    <svg class="h-3.5 w-3.5 fill-current" viewBox="0 0 24 24">
                                        <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                                    </svg>
                                </a>
                                <!-- Copy Link -->
                                <div class="relative flex items-center">
                                    <button @click="copyLink()" class="h-8.5 w-8.5 rounded-full bg-gray-900 hover:bg-gray-800 text-white flex items-center justify-center transition shadow-sm" title="Salin Tautan">
                                        <template x-if="!copied">
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                                            </svg>
                                        </template>
                                        <template x-if="copied">
                                            <svg class="h-4 w-4 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </template>
                                    </button>
                                    <span x-show="copied" x-transition.opacity style="position: absolute; bottom: 100%; left: 50%; transform: translateX(-50%); margin-bottom: 6px; z-index: 50;" class="bg-gray-900 text-white text-[11px] font-bold px-2.5 py-1 rounded-lg shadow-lg whitespace-nowrap">Tautan Disalin!</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
