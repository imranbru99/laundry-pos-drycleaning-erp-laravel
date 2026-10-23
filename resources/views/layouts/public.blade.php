<!DOCTYPE html>
<html lang="bn" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Londi-Shop - বাংলাদেশের প্রিমিয়াম লন্ড্রি ও ড্রাই ক্লিন সেবা')</title>
    
    <!-- Google Fonts: Inter & Hind Siliguri -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', '"Hind Siliguri"', 'sans-serif'],
                        bangla: ['"Hind Siliguri"', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#2563eb',
                            600: '#1d4ed8',
                            700: '#1e40af',
                            900: '#1e3a8a',
                        },
                        accent: {
                            500: '#06b6d4',
                            600: '#0891b2',
                        }
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        .gradient-brand {
            background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 50%, #06b6d4 100%);
        }
        .gradient-card {
            background: linear-gradient(180deg, rgba(255,255,255,0.9) 0%, rgba(248,250,252,0.95) 100%);
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased flex flex-col min-h-screen" x-data="{ mobileMenu: false }">

    <!-- Top Announcement Bar -->
    <div class="bg-slate-900 text-slate-200 text-xs sm:text-sm py-2 px-4 border-b border-slate-800">
        <div class="max-w-7xl mx-auto flex flex-wrap justify-between items-center gap-2">
            <div class="flex items-center gap-2">
                <span class="inline-block w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                <span>🇧🇩 বাংলাদেশের প্রথম এআই-পাওয়ার্ড লন্ড্রি প্ল্যাটফর্ম</span>
                <span class="hidden md:inline text-slate-400">| প্রথম অর্ডারে ২০% ছাড়! কোড: <strong class="text-amber-400">LONDI20</strong></span>
            </div>
            <div class="flex items-center gap-4 text-xs">
                <a href="tel:+8801711000000" class="hover:text-amber-400 flex items-center gap-1 transition">
                    📞 হটলাইন: +880 1711-000000
                </a>
                <span class="hidden sm:inline text-slate-600">|</span>
                <a href="{{ route('public.branches') }}" class="hover:text-amber-400 hidden sm:inline transition">
                    📍 আউটলেটসমূহ
                </a>
            </div>
        </div>
    </div>

    <!-- Navigation Header -->
    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-200/80 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Brand Logo -->
                <a href="{{ route('public.home') }}" class="flex items-center gap-3 group">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-blue-700 via-blue-600 to-cyan-500 flex items-center justify-center text-white shadow-lg shadow-blue-500/20 group-hover:scale-105 transition transform">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <div>
                        <div class="text-2xl font-black tracking-tight text-slate-900 group-hover:text-blue-600 transition flex items-center gap-1.5">
                            Londi<span class="text-blue-600">Shop</span>
                            <span class="text-[10px] px-1.5 py-0.5 rounded bg-blue-100 text-blue-800 font-semibold uppercase tracking-wider">BD</span>
                        </div>
                        <p class="text-[11px] font-bangla text-slate-500 font-medium">স্মার্ট লন্ড্রি ও ড্রাই ক্লিন সলিউশন</p>
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <nav class="hidden lg:flex items-center gap-7 text-sm font-semibold text-slate-700">
                    <a href="{{ route('public.home') }}" class="hover:text-blue-600 transition {{ request()->routeIs('public.home') ? 'text-blue-600 font-bold' : '' }}">হোম (Home)</a>
                    <a href="{{ route('public.services') }}" class="hover:text-blue-600 transition {{ request()->routeIs('public.services') ? 'text-blue-600 font-bold' : '' }}">রেট কার্ড ও সেবা</a>
                    <a href="{{ route('public.track') }}" class="hover:text-blue-600 transition flex items-center gap-1.5 {{ request()->routeIs('public.track') ? 'text-blue-600 font-bold' : '' }}">
                        <span class="w-2 h-2 rounded-full bg-cyan-500 animate-ping"></span>
                        লাইভ ট্র্যাকিং
                    </a>
                    <a href="{{ route('public.fabric-care') }}" class="hover:text-blue-600 transition {{ request()->routeIs('public.fabric-care') ? 'text-blue-600 font-bold' : '' }}">পোশাক যত্ন ও এআই</a>
                    <a href="{{ route('public.branches') }}" class="hover:text-blue-600 transition {{ request()->routeIs('public.branches') ? 'text-blue-600 font-bold' : '' }}">শাখা সমূহ</a>
                    <a href="{{ route('public.about') }}" class="hover:text-blue-600 transition {{ request()->routeIs('public.about') ? 'text-blue-600 font-bold' : '' }}">আমাদের সম্পর্কে</a>
                    <a href="{{ route('public.contact') }}" class="hover:text-blue-600 transition {{ request()->routeIs('public.contact') ? 'text-blue-600 font-bold' : '' }}">যোগাযোগ</a>
                </nav>

                <!-- Action CTAs -->
                <div class="hidden sm:flex items-center gap-3">
                    <a href="{{ route('public.track') }}" class="px-4 py-2.5 rounded-xl border border-slate-300 text-slate-700 hover:border-blue-500 hover:text-blue-600 text-xs sm:text-sm font-semibold transition">
                        🔍 অর্ডার খুঁজুন
                    </a>
                    <a href="{{ route('public.book-pickup') }}" class="px-5 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs sm:text-sm font-bold shadow-lg shadow-blue-500/25 transition transform hover:-translate-y-0.5 flex items-center gap-2">
                        <span>🛵 হোম পিকআপ বুকিং</span>
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="lg:hidden flex items-center gap-2">
                    <button @click="mobileMenu = !mobileMenu" class="p-2.5 rounded-xl bg-slate-100 text-slate-700 hover:bg-slate-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path x-show="!mobileMenu" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            <path x-show="mobileMenu" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" x-cloak></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Drawer Menu -->
        <div x-show="mobileMenu" x-cloak class="lg:hidden bg-white border-b border-slate-200 px-5 pt-3 pb-6 space-y-3">
            <a href="{{ route('public.home') }}" class="block py-2 text-base font-semibold text-slate-800">হোম (Home)</a>
            <a href="{{ route('public.services') }}" class="block py-2 text-base font-semibold text-slate-800">রেট কার্ড ও সার্ভিস সমূহ</a>
            <a href="{{ route('public.track') }}" class="block py-2 text-base font-semibold text-blue-600 font-bold">লাইভ অর্ডার ট্র্যাকার</a>
            <a href="{{ route('public.fabric-care') }}" class="block py-2 text-base font-semibold text-slate-800">পোশাক যত্ন ও এআই গাইড</a>
            <a href="{{ route('public.branches') }}" class="block py-2 text-base font-semibold text-slate-800">সকল শাখা</a>
            <a href="{{ route('public.about') }}" class="block py-2 text-base font-semibold text-slate-800">আমাদের সম্পর্কে</a>
            <a href="{{ route('public.contact') }}" class="block py-2 text-base font-semibold text-slate-800">যোগাযোগ</a>
            <div class="pt-4 border-t border-slate-100 flex flex-col gap-2">
                <a href="{{ route('public.book-pickup') }}" class="w-full text-center py-3 rounded-xl bg-blue-600 text-white font-bold shadow-md">
                    🛵 হোম পিকআপ বুক করুন
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content Slot -->
    <main class="flex-grow">
        @if(session('success'))
            <div class="max-w-5xl mx-auto mt-6 px-4">
                <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 flex items-center justify-between shadow-sm">
                    <div class="flex items-center gap-3">
                        <span class="text-2xl">🎉</span>
                        <p class="font-medium text-sm sm:text-base">{{ session('success') }}</p>
                    </div>
                    <button onclick="this.parentElement.remove()" class="text-emerald-600 hover:text-emerald-900 font-bold">&times;</button>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Floating WhatsApp Action -->
    <a href="https://wa.me/8801711000000?text=Hello%20Londi-Shop,%20I%20want%20to%20know%20more%20about%20your%20laundry%20services" target="_blank" class="fixed bottom-6 right-6 z-40 bg-emerald-500 hover:bg-emerald-600 text-white p-3.5 rounded-full shadow-2xl shadow-emerald-500/50 hover:scale-110 transition transform flex items-center gap-2 group">
        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
            <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.007c.106.005.249-.04.39.299.144.347.491 1.2.534 1.288.043.088.072.191.014.306-.058.115-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86.174.086.275.072.376-.043.101-.116.433-.506.549-.68.116-.173.231-.144.39-.086s1.011.477 1.184.564c.173.087.289.13.332.202.043.073.043.419-.101.824z"/>
        </svg>
        <span class="max-w-0 overflow-hidden whitespace-nowrap group-hover:max-w-xs transition-all duration-300 ease-in-out text-xs font-bold font-bangla pr-1">হোয়াটসঅ্যাপ চ্যাট</span>
    </a>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-300 pt-16 pb-8 border-t border-slate-800 font-bangla">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 pb-12 border-b border-slate-800">
                <!-- Col 1: Brand Info -->
                <div class="space-y-4">
                    <div class="flex items-center gap-2">
                        <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center text-white font-black text-xl">L</div>
                        <span class="text-2xl font-black text-white font-sans">Londi<span class="text-cyan-400">Shop</span></span>
                    </div>
                    <p class="text-sm text-slate-400 leading-relaxed">
                        লন্ড্রি শপ বাংলাদেশের পোশাক সংস্কৃতি ও কাপড়ের ধরন অনুযায়ী বিশেষভাবে তৈরি আধুনিক ফ্যাব্রিক কেয়ার ও ক্লাউড ইআরপি প্ল্যাটফর্ম। জামদানি, কাতান, সুতি কিংবা ব্লেজার—প্রতিটি পোশাকে নিখুঁত যত্ন।
                    </p>
                    <div class="text-xs text-slate-400 space-y-1 font-sans">
                        <p>📍 প্রধান কার্যালয়: রোড ৭/এ, ধানমন্ডি, ঢাকা - ১২০৯</p>
                        <p>📞 হটলাইন: +880 1711-000000</p>
                        <p>✉️ ইমেইল: support@londi.com</p>
                    </div>
                </div>

                <!-- Col 2: Services -->
                <div class="space-y-3">
                    <h3 class="text-white font-bold text-base font-sans tracking-wide">সেবাসমূহ (Services)</h3>
                    <ul class="text-sm space-y-2 text-slate-400">
                        <li><a href="{{ route('public.services') }}" class="hover:text-cyan-400 transition">ওয়াশ ও স্টিম ইস্ত্রি (Wash & Iron)</a></li>
                        <li><a href="{{ route('public.services') }}" class="hover:text-cyan-400 transition">অর্গানিক ড্রাই ক্লিন (Dry Cleaning)</a></li>
                        <li><a href="{{ route('public.services') }}" class="hover:text-cyan-400 transition">জামদানি ও সিল্ক স্পেশাল পলিশ</a></li>
                        <li><a href="{{ route('public.services') }}" class="hover:text-cyan-400 transition">স্যুট ও ব্লেজার স্টিম কেয়ার</a></li>
                        <li><a href="{{ route('public.services') }}" class="hover:text-cyan-400 transition">ভারী কম্বল ও পর্দা ওয়াশ</a></li>
                        <li><a href="{{ route('public.services') }}" class="hover:text-cyan-400 transition">দাগ তোলা ও রফু সার্ভিস</a></li>
                    </ul>
                </div>

                <!-- Col 3: Useful Links -->
                <div class="space-y-3">
                    <h3 class="text-white font-bold text-base font-sans tracking-wide">প্রয়োজনীয় লিংক</h3>
                    <ul class="text-sm space-y-2 text-slate-400">
                        <li><a href="{{ route('public.track') }}" class="hover:text-cyan-400 transition font-bold text-cyan-400">অর্ডার লাইভ ট্র্যাকার (Live Track)</a></li>
                        <li><a href="{{ route('public.book-pickup') }}" class="hover:text-cyan-400 transition">হোম পিকআপ বুক করুন</a></li>
                        <li><a href="{{ route('public.fabric-care') }}" class="hover:text-cyan-400 transition">এআই ফ্যাব্রিক ও দাগ সহায়িকা</a></li>
                        <li><a href="{{ route('public.branches') }}" class="hover:text-cyan-400 transition">শাখা ও আউটলেট লোকেশন</a></li>
                        <li><a href="{{ route('public.about') }}" class="hover:text-cyan-400 transition">আমাদের গল্প ও প্রযুক্তি</a></li>
                        <li><a href="/admin/login" class="text-amber-400 hover:underline transition font-bold font-sans">Staff / POS Login &rarr;</a></li>
                    </ul>
                </div>

                <!-- Col 4: Payment & Security -->
                <div class="space-y-4">
                    <h3 class="text-white font-bold text-base font-sans tracking-wide">নিরাপদ পেমেন্ট পার্টনার</h3>
                    <p class="text-xs text-slate-400">ক্যাশ ছাড়াও যেকোনো অনলাইন ও ডিজিটাল পদ্ধতিতে পেমেন্ট গ্রহণযোগ্য:</p>
                    <div class="grid grid-cols-3 gap-2">
                        <div class="bg-slate-800 p-2 rounded-lg text-center text-xs font-bold text-pink-400 border border-slate-700">bKash</div>
                        <div class="bg-slate-800 p-2 rounded-lg text-center text-xs font-bold text-orange-400 border border-slate-700">Nagad</div>
                        <div class="bg-slate-800 p-2 rounded-lg text-center text-xs font-bold text-purple-400 border border-slate-700">Rocket</div>
                        <div class="bg-slate-800 p-2 rounded-lg text-center text-xs font-bold text-blue-400 border border-slate-700">VISA</div>
                        <div class="bg-slate-800 p-2 rounded-lg text-center text-xs font-bold text-red-400 border border-slate-700">Mastercard</div>
                        <div class="bg-slate-800 p-2 rounded-lg text-center text-xs font-bold text-emerald-400 border border-slate-700">Cash</div>
                    </div>
                    <div class="pt-2">
                        <span class="inline-flex items-center gap-1.5 text-xs text-emerald-400 bg-emerald-950/60 px-2.5 py-1 rounded-full border border-emerald-800">
                            <span class="w-2 h-2 rounded-full bg-emerald-400"></span> ১০০% পোশাক নিরাপত্তা গ্যারান্টি
                        </span>
                    </div>
                </div>
            </div>

            <div class="pt-8 flex flex-col sm:flex-row justify-between items-center text-xs text-slate-500 font-sans gap-4">
                <p>&copy; {{ date('Y') }} Londi-Shop BD. সর্বস্বত্ব সংরক্ষিত। Designed for Bangladeshi Garments & Laundry Businesses.</p>
                <div class="flex gap-4">
                    <a href="#" class="hover:text-slate-300">Privacy Policy</a>
                    <a href="#" class="hover:text-slate-300">Terms of Service</a>
                    <a href="#" class="hover:text-slate-300">Sitemap</a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
