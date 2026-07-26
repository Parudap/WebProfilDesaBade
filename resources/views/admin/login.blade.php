@php
    $logoPath = \App\Models\PengaturanWebsite::get('logo_desa');
    $brandLogo = $logoPath ? asset('storage/' . $logoPath) : asset('logo_desa_bade_utuh.png');
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Panel Administrasi - Desa Bade</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: radial-gradient(circle at 100% 0%, #043e30 0%, #011c16 100%);
            overflow: hidden;
            position: relative;
        }
        .cinzel-title {
            font-family: 'Cinzel', serif;
            letter-spacing: 0.04em;
        }
        .glow-1 {
            position: absolute;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.12) 0%, rgba(16, 185, 129, 0) 70%);
            bottom: -200px;
            left: -200px;
            filter: blur(80px);
            pointer-events: none;
            z-index: 1;
        }
        .glow-2 {
            position: absolute;
            width: 550px;
            height: 550px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(243, 228, 178, 0.08) 0%, rgba(243, 228, 178, 0) 70%);
            top: -150px;
            right: -150px;
            filter: blur(80px);
            pointer-events: none;
            z-index: 1;
        }
        .bg-pattern {
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(255, 255, 255, 0.03) 1.5px, transparent 1.5px);
            background-size: 28px 28px;
            pointer-events: none;
            z-index: 1;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(30px);
            -webkit-backdrop-filter: blur(30px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            box-shadow: 0 25px 60px -15px rgba(1, 28, 22, 0.45);
            z-index: 10;
        }
        .input-glow:focus {
            box-shadow: 0 0 0 4px rgba(4, 120, 87, 0.15);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center px-4 py-12">
    <!-- Background Decorators -->
    <div class="bg-pattern"></div>
    <div class="glow-1"></div>
    <div class="glow-2"></div>

    <div class="w-full max-w-[430px] relative z-10">
        <!-- Brand Header (Floating above card) -->
        <div class="text-center mb-8 flex flex-col items-center">
            <!-- Village Shield Logo Container -->
            <div class="mb-4 flex h-20 w-20 items-center justify-center rounded-[1.75rem] border border-white/10 bg-white/5 p-3.5 shadow-xl backdrop-blur-md transition-all duration-300 hover:scale-105">
                <img src="{{ $brandLogo }}" alt="Logo Kabupaten Boyolali" class="h-full w-full object-contain">
            </div>
            <h1 class="text-2xl font-bold text-white uppercase cinzel-title tracking-wider leading-none">
                Desa Bade
            </h1>
            <p class="mt-2 text-xs font-semibold text-[#f3e4b2] uppercase tracking-[0.25em]">
                Panel Administrasi Desa
            </p>
        </div>

        <!-- Glassmorphic Login Card -->
        <div class="glass-card rounded-[2.5rem] p-7 sm:p-9">
            <div class="mb-6">
                <h2 class="text-xl font-bold text-gray-900 tracking-tight">Selamat Datang</h2>
                <p class="text-xs text-gray-500 mt-1 font-medium">Silakan masuk menggunakan akun administrasi Anda.</p>
            </div>

            @if ($errors->any())
                <div class="mb-5 bg-red-50 border border-red-200 rounded-2xl p-4 flex gap-3 items-start animate-[shake_0.5s_ease-in-out]">
                    <svg class="h-5 w-5 text-red-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    <p class="text-xs font-semibold text-red-800 leading-normal">{{ $errors->first() }}</p>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.post') }}" class="space-y-4">
                @csrf
                
                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Alamat Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-400">
                            <svg class="h-4.5 w-4.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
                            </svg>
                        </span>
                        <input 
                            id="email" 
                            name="email" 
                            type="email" 
                            value="{{ old('email') }}" 
                            required 
                            class="w-full pl-10 pr-4 py-3 rounded-2xl border border-gray-200 focus:border-green-600 focus:outline-none input-glow text-sm bg-white/70 transition font-medium text-gray-900"
                            placeholder="Masukkan alamat email"
                            style="height: 48px;"
                        >
                    </div>
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-400">
                            <svg class="h-4.5 w-4.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                            </svg>
                        </span>
                        <input 
                            id="password" 
                            name="password" 
                            type="password" 
                            required 
                            class="w-full pl-10 pr-4 py-3 rounded-2xl border border-gray-200 focus:border-green-600 focus:outline-none input-glow text-sm bg-white/70 transition font-medium text-gray-900"
                            placeholder="Masukkan password"
                            style="height: 48px;"
                        >
                    </div>
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="w-full bg-gradient-to-r from-emerald-800 to-green-700 hover:from-emerald-700 hover:to-green-600 text-white font-bold py-3.5 rounded-2xl shadow-lg shadow-green-900/10 hover:shadow-xl hover:shadow-green-900/25 hover:-translate-y-0.5 transition duration-200 mt-6 text-sm cursor-pointer"
                    style="height: 48px; border: none;"
                >
                    Masuk ke Dashboard
                </button>
            </form>

            <div class="mt-6 pt-5 border-t border-gray-100 text-center">
                <p class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider">
                    Sistem Informasi Desa Bade © {{ date('Y') }}
                </p>
            </div>
        </div>
    </div>
</body>
</html>
