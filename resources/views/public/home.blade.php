@extends('layouts.public')

@section('title', 'Londi-Shop - বাংলাদেশের সেরা স্মার্ট লন্ড্রি, ড্রাই ওয়াশ ও ডোরস্টেপ পিকআপ')

@section('content')
<!-- Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-b from-blue-900 via-slate-900 to-slate-950 text-white pt-16 pb-24 lg:pt-20 lg:pb-32">
    <!-- Background Glows -->
    <div class="absolute -top-40 -left-40 w-96 h-96 bg-blue-500/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute top-1/2 -right-40 w-96 h-96 bg-cyan-500/15 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Hero Left Column -->
            <div class="lg:col-span-7 space-y-7">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-blue-500/10 border border-blue-400/30 text-blue-300 text-xs sm:text-sm font-semibold">
                    <span class="flex h-2 w-2 rounded-full bg-cyan-400 animate-ping"></span>
                    <span>স্মার্ট ডোরস্টেপ লন্ড্রি সার্ভিস এখন ঢাকা ও চট্টগ্রামে</span>
                </div>

                <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black font-bangla tracking-tight leading-tight sm:leading-snug">
                    আপনার প্রিয় পোশাকের <br class="hidden sm:inline">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 via-blue-300 to-indigo-300">
                        নিখুঁত যত্ন ও স্মার্ট লন্ড্রি
                    </span>
                </h1>

                <p class="text-slate-300 text-base sm:text-lg max-w-2xl font-bangla leading-relaxed">
                    পাঞ্জাবি, জামদানি শাড়ি, ব্লেজার কিংবা প্রতিদিনের সুতি পোশাক—লন্ডি শপ দিচ্ছে বিশ্বমানের ফ্যাব্রিক-সেফ ওয়াশ, নিখুঁত স্টিম ইস্ত্রি এবং ঝামেলাহীন ডোরস্টেপ পিকআপ ও ডেলিভারি সেবা।
                </p>

                <!-- Dual CTA buttons -->
                <div class="flex flex-col sm:flex-row gap-4 pt-2">
                    <a href="{{ route('public.book-pickup') }}" class="px-8 py-4 rounded-2xl bg-blue-600 hover:bg-blue-500 text-white font-bold text-base shadow-xl shadow-blue-600/30 transition transform hover:-translate-y-1 flex items-center justify-center gap-2">
                        <span>🛵 ফ্রি হোম পিকআপ বুক করুন</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                    <a href="#calculator" class="px-7 py-4 rounded-2xl bg-slate-800/80 hover:bg-slate-800 text-slate-200 border border-slate-700 font-bold text-base transition flex items-center justify-center gap-2">
                        <span>💰 খরচ হিসাব করুন (Price Estimator)</span>
                    </a>
                </div>

                <!-- Live Quick Tracker search inline -->
                <div class="pt-4 max-w-lg">
                    <form action="{{ route('public.track') }}" method="GET" class="relative flex items-center">
                        <input type="text" name="q" placeholder="অর্ডার আইডি (যেমন: LON-8942) অথবা মোবাইল নম্বর..." class="w-full pl-5 pr-28 py-3.5 rounded-2xl bg-slate-800/90 border border-slate-700 text-white placeholder-slate-400 text-sm focus:outline-none focus:ring-2 focus:ring-cyan-400 font-sans shadow-inner">
                        <button type="submit" class="absolute right-1.5 px-4 py-2 rounded-xl bg-cyan-500 hover:bg-cyan-400 text-slate-950 font-bold text-xs sm:text-sm transition flex items-center gap-1">
                            <span>ট্র্যাক</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        </button>
                    </form>
                    <p class="text-[11px] text-slate-400 mt-2 font-bangla">
                        💡 ডেমো ট্র্যাকিং দেখতে সরাসরি লিখুন: <a href="{{ route('public.track', ['q' => 'LON-8942']) }}" class="text-cyan-400 font-bold underline font-sans">LON-8942</a> অথবা <a href="{{ route('public.track', ['q' => '01711000000']) }}" class="text-cyan-400 font-bold underline font-sans">01711000000</a>
                    </p>
                </div>

                <!-- Trust Stats -->
                <div class="pt-4 grid grid-cols-3 gap-4 border-t border-slate-800/80 max-w-xl">
                    <div>
                        <div class="text-2xl sm:text-3xl font-black text-cyan-400 font-sans">৫০,০০০+</div>
                        <div class="text-xs text-slate-400 font-bangla">পোশাক ডেলিভারি</div>
                    </div>
                    <div>
                        <div class="text-2xl sm:text-3xl font-black text-blue-400 font-sans">৯৯.৮%</div>
                        <div class="text-xs text-slate-400 font-bangla">সন্তুষ্ট গ্রাহক</div>
                    </div>
                    <div>
                        <div class="text-2xl sm:text-3xl font-black text-emerald-400 font-sans">২৪ ঘণ্টা</div>
                        <div class="text-xs text-slate-400 font-bangla">এক্সপ্রেস সার্ভিস</div>
                    </div>
                </div>
            </div>

            <!-- Hero Right Column: Interactive Card -->
            <div class="lg:col-span-5">
                <div class="relative mx-auto max-w-md">
                    <!-- Glow behind card -->
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-cyan-500 rounded-3xl blur-2xl opacity-30 transform -rotate-2"></div>
                    
                    <div class="relative rounded-3xl bg-slate-800/90 border border-slate-700/80 p-6 sm:p-8 backdrop-blur-xl shadow-2xl text-slate-100">
                        <div class="flex items-center justify-between pb-5 border-b border-slate-700/80">
                            <div>
                                <span class="text-xs uppercase tracking-wider text-cyan-400 font-bold font-sans">Instant Booking</span>
                                <h3 class="text-xl font-bold font-bangla">হোম পিকআপ রিকোয়েস্ট</h3>
                            </div>
                            <span class="px-2.5 py-1 rounded-full bg-emerald-500/20 text-emerald-400 text-xs font-semibold font-bangla">
                                ফ্রি ডেলিভারি
                            </span>
                        </div>

                        <form action="{{ route('public.submit-booking') }}" method="POST" class="mt-5 space-y-4 font-bangla text-sm">
                            @csrf
                            <div>
                                <label class="block text-xs text-slate-300 font-medium mb-1">আপনার নাম *</label>
                                <input type="text" name="name" required placeholder="যেমন: তানভীর আহমেদ" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-white placeholder-slate-500 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            </div>

                            <div>
                                <label class="block text-xs text-slate-300 font-medium mb-1">মোবাইল নম্বর *</label>
                                <input type="tel" name="phone" required placeholder="017xxxxxxxx" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-white placeholder-slate-500 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none font-sans">
                            </div>

                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-xs text-slate-300 font-medium mb-1">এলাকা (Area) *</label>
                                    <select name="area" required class="w-full px-3 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                        <option value="Dhanmondi, Dhaka">ধানমন্ডি (Dhanmondi)</option>
                                        <option value="Gulshan, Dhaka">গুলশান (Gulshan)</option>
                                        <option value="Banani, Dhaka">বনানী (Banani)</option>
                                        <option value="Uttara, Dhaka">উত্তরা (Uttara)</option>
                                        <option value="Mirpur, Dhaka">মিরপুর (Mirpur)</option>
                                        <option value="Mohammadpur, Dhaka">মোহাম্মদপুর (Mohammadpur)</option>
                                        <option value="Chittagong">চট্টগ্রাম (Chittagong)</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs text-slate-300 font-medium mb-1">আনুমানিক পোশাক *</label>
                                    <input type="number" name="garments_estimate" min="1" value="5" required class="w-full px-3 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none font-sans">
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs text-slate-300 font-medium mb-1">পূর্ণ ঠিকানা *</label>
                                <input type="text" name="address" required placeholder="বাসা নম্বর, রোড নম্বর, ফ্ল্যাট..." class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-white placeholder-slate-500 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            </div>

                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-xs text-slate-300 font-medium mb-1">পিকআপ তারিখ *</label>
                                    <input type="date" name="pickup_date" value="{{ date('Y-m-d') }}" required class="w-full px-3 py-2 rounded-xl bg-slate-900 border border-slate-700 text-white text-xs font-sans focus:outline-none">
                                </div>
                                <div>
                                    <label class="block text-xs text-slate-300 font-medium mb-1">পছন্দের সময় *</label>
                                    <select name="pickup_slot" required class="w-full px-2 py-2 rounded-xl bg-slate-900 border border-slate-700 text-white text-xs focus:outline-none">
                                        <option value="সকাল ১০টা - দুপুর ১টা">সকাল ১০টা - ১টা</option>
                                        <option value="দুপুর ২টা - বিকাল ৫টা">দুপুর ২টা - ৫টা</option>
                                        <option value="সন্ধ্যা ৬টা - রাত ৯টা">সন্ধ্যা ৬টা - রাত ৯টা</option>
                                    </select>
                                </div>
                            </div>

                            <input type="hidden" name="service_type" value="লন্ড্রি ও ড্রাই ক্লিন">

                            <button type="submit" class="w-full py-3.5 mt-2 rounded-xl bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-500 hover:to-cyan-400 text-white font-bold text-sm shadow-lg shadow-blue-500/20 transition transform hover:scale-[1.02]">
                                🚀 রাইডার পিকআপ নিশ্চিত করুন
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- 4 Pillars Section -->
<section class="py-16 bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto space-y-3 mb-14">
            <span class="text-xs font-bold text-blue-600 uppercase tracking-widest font-sans">Why Londi-Shop</span>
            <h2 class="text-2xl sm:text-4xl font-extrabold text-slate-900 font-bangla">কেন হাজারো পরিবার আমাদের বেছে নিচ্ছেন?</h2>
            <p class="text-slate-600 text-sm sm:text-base font-bangla">সনাতন লন্ড্রির ভুলভ্রান্তি ও কাপড় হারানোর ভয় দূর করে আমরা এনেছি আধুনিক ও নির্ভরযোগ্য সেবা।</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Feature 1 -->
            <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200/80 hover:shadow-xl hover:border-blue-300 transition duration-300 group">
                <div class="w-14 h-14 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center text-2xl mb-5 group-hover:scale-110 transition">
                    🏷️
                </div>
                <h3 class="text-lg font-bold text-slate-900 font-bangla mb-2">প্রতি কাপড়ে বারকোড ট্যাগ</h3>
                <p class="text-slate-600 text-sm font-bangla leading-relaxed">
                    অর্ডার নেওয়া মাত্র প্রতি কাপড়ে ওয়াটারপ্রুফ কিউআর/বারকোড ট্যাগ লাগানো হয়। কাপড় হারানো বা অন্য কারও সাথে বদল হওয়ার ০% সম্ভাবনা।
                </p>
            </div>

            <!-- Feature 2 -->
            <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200/80 hover:shadow-xl hover:border-blue-300 transition duration-300 group">
                <div class="w-14 h-14 rounded-2xl bg-emerald-100 text-emerald-600 flex items-center justify-center text-2xl mb-5 group-hover:scale-110 transition">
                    🌿
                </div>
                <h3 class="text-lg font-bold text-slate-900 font-bangla mb-2">ফেব্রিক-সেফ অর্গানিক কেয়ার</h3>
                <p class="text-slate-600 text-sm font-bangla leading-relaxed">
                    জামদানি, কাতান ও খাঁটি সুতি কাপড়ে কোনো ক্ষতিকারক কেমিক্যাল ব্যবহার করা হয় না। কাপড়ের কোমলতা ও রঙের উজ্জ্বলতা থাকে একদম নতুনের মতো।
                </p>
            </div>

            <!-- Feature 3 -->
            <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200/80 hover:shadow-xl hover:border-blue-300 transition duration-300 group">
                <div class="w-14 h-14 rounded-2xl bg-cyan-100 text-cyan-600 flex items-center justify-center text-2xl mb-5 group-hover:scale-110 transition">
                    🛵
                </div>
                <h3 class="text-lg font-bangla font-bold text-slate-900 mb-2">ফ্রি ডোরস্টেপ পিক ও ড্রপ</h3>
                <p class="text-slate-600 text-sm font-bangla leading-relaxed">
                    আপনার সুবিধাজনক সময়ে আমাদের নিজস্ব ভেরিফাইড রাইডার আপনার বাসা বা অফিস থেকে কাপড় সংগ্রহ ও ডেলিভারি করবে।
                </p>
            </div>

            <!-- Feature 4 -->
            <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200/80 hover:shadow-xl hover:border-blue-300 transition duration-300 group">
                <div class="w-14 h-14 rounded-2xl bg-purple-100 text-purple-600 flex items-center justify-center text-2xl mb-5 group-hover:scale-110 transition">
                    📱
                </div>
                <h3 class="text-lg font-bangla font-bold text-slate-900 mb-2">লাইভ ট্র্যাকিং ও এসএমএস</h3>
                <p class="text-slate-600 text-sm font-bangla leading-relaxed">
                    কাপড় কোন ধাপে আছে (ওয়াশ, স্টিম ইস্ত্রি, নাকি ডেলিভারির পথে) প্রতি ধাপে এসএমএস নোটিফিকেশন এবং অনলাইন ট্র্যাকিং সুবিধা।
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Interactive Price Calculator Section (Alpine.js) -->
<section id="calculator" class="py-20 bg-slate-100" x-data="{
    garmentPrice: 45,
    serviceMultiplier: 1.0,
    quantity: 3,
    isExpress: false,
    selectedGarmentName: 'সুতি শার্ট (Cotton Shirt)',
    get total() {
        let base = this.garmentPrice * this.serviceMultiplier * this.quantity;
        if (this.isExpress) base = base * 1.3;
        return Math.round(base);
    }
}">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="text-xs font-bold text-blue-600 uppercase tracking-widest font-sans">Cost Estimator</span>
            <h2 class="text-2xl sm:text-4xl font-extrabold text-slate-900 font-bangla mt-1">স্মার্ট খরচ ক্যালকুলেটর</h2>
            <p class="text-slate-600 text-sm font-bangla mt-2">আপনার পোশাকের ধরন ও সার্ভিস বেছে নিয়ে মুহূর্তেই মোট খরচ জেনে নিন</p>
        </div>

        <div class="bg-white rounded-3xl p-6 sm:p-10 shadow-xl border border-slate-200">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                
                <!-- Controls -->
                <div class="space-y-6 font-bangla">
                    <div>
                        <label class="block text-sm font-bold text-slate-800 mb-2">১. পোশাকের ধরন নির্বাচন করুন:</label>
                        <select @change="
                            garmentPrice = $event.target.selectedOptions[0].dataset.price;
                            selectedGarmentName = $event.target.selectedOptions[0].text;
                        " class="w-full p-3.5 rounded-xl border border-slate-300 bg-slate-50 text-slate-800 text-sm font-semibold focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <optgroup label="পুরুষদের পোশাক">
                                <option value="45" data-price="45" selected>সুতি শার্ট (Cotton Shirt) - ৳ ৪৫</option>
                                <option value="50" data-price="50">ফরমাল প্যান্ট / চিনো - ৳ ৫০</option>
                                <option value="60" data-price="60">জিন্স প্যান্ট - ৳ ৬০</option>
                                <option value="70" data-price="70">পাঞ্জাবি (Panjabi) - ৳ ৭০</option>
                                <option value="450" data-price="450">স্যুট / ব্লেজার (Suit 2pc) - ৳ ৪৫০</option>
                            </optgroup>
                            <optgroup label="নারীদের পোশাক ও ঐতিহ্যবাহী">
                                <option value="110" data-price="110">সালোয়ার কামিজ সেট (৩ পিস) - ৳ ১১০</option>
                                <option value="100" data-price="100">সুতি শাড়ি (Cotton Sharee) - ৳ ১০০</option>
                                <option value="450" data-price="450">ঢাকাই জামদানি শাড়ি - ৳ ৪৫০</option>
                                <option value="500" data-price="500">কাতান / বেনারসি শাড়ি - ৳ ৫০০</option>
                                <option value="120" data-price="120">বোরকা ও হিজাব সেট - ৳ ১২০</option>
                            </optgroup>
                            <optgroup label="গৃহস্থালি ও কম্বল">
                                <option value="250" data-price="250">ভারী কম্বল (সিঙ্গেল) - ৳ ২৫০</option>
                                <option value="350" data-price="350">ভারী কম্বল (ডাবল) - ৳ ৩৫০</option>
                                <option value="120" data-price="120">বিছানার চাদর ও বালিশ কভার - ৳ ১২০</option>
                            </optgroup>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-800 mb-2">২. সার্ভিস প্যাকেজ:</label>
                        <div class="grid grid-cols-3 gap-2">
                            <button type="button" @click="serviceMultiplier = 1.0" :class="serviceMultiplier === 1.0 ? 'bg-blue-600 text-white border-blue-600' : 'bg-slate-50 text-slate-700 border-slate-200'" class="p-3 rounded-xl border text-xs font-bold text-center transition">
                                ধোয়া ও ইস্ত্রি
                            </button>
                            <button type="button" @click="serviceMultiplier = 0.5" :class="serviceMultiplier === 0.5 ? 'bg-blue-600 text-white border-blue-600' : 'bg-slate-50 text-slate-700 border-slate-200'" class="p-3 rounded-xl border text-xs font-bold text-center transition">
                                শুধুমাত্র স্টিম ইস্ত্রি
                            </button>
                            <button type="button" @click="serviceMultiplier = 2.0" :class="serviceMultiplier === 2.0 ? 'bg-blue-600 text-white border-blue-600' : 'bg-slate-50 text-slate-700 border-slate-200'" class="p-3 rounded-xl border text-xs font-bold text-center transition">
                                ড্রাই ক্লিন ও পলিশ
                            </button>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 items-center">
                        <div>
                            <label class="block text-sm font-bold text-slate-800 mb-2">৩. পরিমাণ (Quantity):</label>
                            <div class="flex items-center gap-2">
                                <button type="button" @click="if(quantity > 1) quantity--" class="w-10 h-10 rounded-xl bg-slate-200 hover:bg-slate-300 font-bold text-lg">-</button>
                                <span class="w-12 text-center font-bold text-lg font-sans" x-text="quantity"></span>
                                <button type="button" @click="quantity++" class="w-10 h-10 rounded-xl bg-slate-200 hover:bg-slate-300 font-bold text-lg">+</button>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-800 mb-2">৪. এক্সপ্রেস স্পিড:</label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" x-model="isExpress" class="w-5 h-5 rounded text-blue-600 focus:ring-blue-500">
                                <span class="text-xs font-semibold text-slate-700">২৪ ঘণ্টা জরুরি (+৩০%)</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Live Total Preview Box -->
                <div class="bg-gradient-to-tr from-slate-900 to-blue-950 text-white p-8 rounded-3xl relative overflow-hidden shadow-2xl flex flex-col justify-between h-full">
                    <div class="space-y-4">
                        <div class="flex justify-between items-center text-xs text-slate-300 border-b border-slate-800 pb-3">
                            <span>অনুমানিত হিসাব (Estimated Summary)</span>
                            <span class="px-2 py-0.5 rounded bg-blue-500/20 text-cyan-300 font-sans font-bold">BDT</span>
                        </div>

                        <div>
                            <p class="text-xs text-slate-400 font-bangla">নির্বাচিত আইটেম:</p>
                            <p class="text-sm font-bold text-white font-bangla" x-text="selectedGarmentName"></p>
                        </div>

                        <div class="flex justify-between text-xs text-slate-300">
                            <span>মোট পরিমাণ:</span>
                            <span class="font-bold font-sans" x-text="quantity + ' পিস'"></span>
                        </div>

                        <div class="flex justify-between text-xs text-slate-300" x-show="isExpress">
                            <span>জরুরি ডেলিভারি চার্জ:</span>
                            <span class="font-bold text-amber-400 font-sans">+৩০% অন্তর্ভুক্ত</span>
                        </div>
                    </div>

                    <div class="pt-6 border-t border-slate-800 mt-6">
                        <span class="text-xs text-slate-400 block font-bangla">সর্বমোট আনুমানিক বিল:</span>
                        <div class="flex items-baseline gap-2">
                            <span class="text-4xl sm:text-5xl font-black text-cyan-400 font-sans">৳ <span x-text="total"></span></span>
                            <span class="text-xs text-slate-400 font-bangla">(ভ্যাটসহ)</span>
                        </div>

                        <a href="{{ route('public.book-pickup') }}" class="mt-5 w-full block text-center py-3.5 rounded-xl bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white font-bold text-sm shadow-lg shadow-cyan-500/20 transition">
                            🛵 এই পোশাকে পিকআপ বুক করুন
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Popular Services Showcase -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-14 gap-4">
            <div>
                <span class="text-xs font-bold text-blue-600 uppercase tracking-widest font-sans">Our Capabilities</span>
                <h2 class="text-2xl sm:text-4xl font-extrabold text-slate-900 font-bangla mt-1">জনপ্রিয় লন্ড্রি ও ড্রাই ক্লিন সেবা</h2>
            </div>
            <a href="{{ route('public.services') }}" class="text-blue-600 font-bold hover:underline flex items-center gap-1 font-bangla text-sm">
                <span>সকল সার্ভিসের সম্পূর্ণ রেট কার্ড দেখুন</span> &rarr;
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="rounded-3xl border border-slate-200 overflow-hidden hover:shadow-2xl transition duration-300 flex flex-col justify-between">
                <div class="p-8">
                    <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center text-2xl mb-4">
                        👔
                    </div>
                    <span class="text-xs font-bold px-2.5 py-1 rounded bg-blue-100 text-blue-700 uppercase">Daily & Office</span>
                    <h3 class="text-xl font-bold text-slate-900 font-bangla mt-3 mb-2">শার্ট, প্যান্ট ও ক্যাজুয়াল ওয়াশ</h3>
                    <p class="text-slate-600 text-sm font-bangla leading-relaxed mb-4">
                        অফিস শার্ট ও প্যান্টের কলার বা কাফে বিশেষ দাগ ট্রিটমেন্ট, পারফেক্ট হাইড্রোলিক স্টিম ইস্ত্রি ও হ্যাঙ্গার প্যাকিং।
                    </p>
                    <ul class="text-xs space-y-2 text-slate-700 font-bangla mb-6">
                        <li class="flex items-center gap-2">✓ সুতি শার্ট ওয়াশ ও ইস্ত্রি: ৳ ৪৫</li>
                        <li class="flex items-center gap-2">✓ জিন্স ও গ্যাবার্ডিন প্যান্ট: ৳ ৬০</li>
                        <li class="flex items-center gap-2">✓ শুধুমাত্র স্টিম ইস্ত্রি: ৳ ২৫</li>
                    </ul>
                </div>
                <div class="p-6 bg-slate-50 border-t border-slate-100">
                    <a href="{{ route('public.book-pickup') }}" class="w-full block text-center py-2.5 rounded-xl bg-blue-600 text-white font-bold text-xs hover:bg-blue-700 transition">
                        অর্ডার করুন &rarr;
                    </a>
                </div>
            </div>

            <!-- Card 2: Traditional Luxury -->
            <div class="rounded-3xl border-2 border-blue-500 overflow-hidden shadow-xl hover:shadow-2xl transition duration-300 flex flex-col justify-between relative">
                <div class="absolute top-0 right-0 bg-blue-600 text-white text-[11px] font-bold px-3 py-1 rounded-bl-xl font-bangla">
                    সবচেয়ে জনপ্রিয়
                </div>
                <div class="p-8">
                    <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-2xl mb-4">
                        👑
                    </div>
                    <span class="text-xs font-bold px-2.5 py-1 rounded bg-amber-100 text-amber-800 uppercase">Premium Ethnic</span>
                    <h3 class="text-xl font-bold text-slate-900 font-bangla mt-3 mb-2">পাঞ্জাবি, জামদানি ও সিল্ক কেয়ার</h3>
                    <p class="text-slate-600 text-sm font-bangla leading-relaxed mb-4">
                        হাতে বোনা জামদানি, কাতান, তসর সিল্ক এবং এমব্রয়ডারি পাঞ্জাবির জন্য বিশেষভাবে নিয়ন্ত্রিত সফট ড্রাই ওয়াশ ও ড্রাম পলিশ।
                    </p>
                    <ul class="text-xs space-y-2 text-slate-700 font-bangla mb-6">
                        <li class="flex items-center gap-2">✓ প্রিমিয়াম পাঞ্জাবি ড্রাই ওয়াশ: ৳ ১৮০</li>
                        <li class="flex items-center gap-2">✓ ঢাকাই জামদানি শাড়ি ড্রাম ক্লিন: ৳ ৪৫০</li>
                        <li class="flex items-center gap-2">✓ বেনারসি ও কাতান শাড়ি পলিশ: ৳ ৫০০</li>
                    </ul>
                </div>
                <div class="p-6 bg-blue-50 border-t border-blue-100">
                    <a href="{{ route('public.book-pickup') }}" class="w-full block text-center py-2.5 rounded-xl bg-blue-600 text-white font-bold text-xs hover:bg-blue-700 transition">
                        পিকআপ বুক করুন &rarr;
                    </a>
                </div>
            </div>

            <!-- Card 3: Bedding & Winter -->
            <div class="rounded-3xl border border-slate-200 overflow-hidden hover:shadow-2xl transition duration-300 flex flex-col justify-between">
                <div class="p-8">
                    <div class="w-12 h-12 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center text-2xl mb-4">
                        ❄️
                    </div>
                    <span class="text-xs font-bold px-2.5 py-1 rounded bg-purple-100 text-purple-700 uppercase">Winter & Bedding</span>
                    <h3 class="text-xl font-bold text-slate-900 font-bangla mt-3 mb-2">ভারী কম্বল, লেপ ও পর্দা ক্লিন</h3>
                    <p class="text-slate-600 text-sm font-bangla leading-relaxed mb-4">
                        শীতের ভারী ডাবল কম্বল, লেপ এবং জানালার পর্দার গভীর ধূলিবালি ও জীবাণু দূরীকরণে অ্যান্টি-মাইক্রোবিয়াল স্টিম ট্রিটমেন্ট।
                    </p>
                    <ul class="text-xs space-y-2 text-slate-700 font-bangla mb-6">
                        <li class="flex items-center gap-2">✓ ভারী কম্বল ওয়াশ (সিঙ্গেল): ৳ ২৫০</li>
                        <li class="flex items-center gap-2">✓ ভারী কম্বল ওয়াশ (ডাবল): ৳ ৩৫০</li>
                        <li class="flex items-center gap-2">✓ পর্দা ডিপ ক্লিনিং: ৳ ৯০</li>
                    </ul>
                </div>
                <div class="p-6 bg-slate-50 border-t border-slate-100">
                    <a href="{{ route('public.book-pickup') }}" class="w-full block text-center py-2.5 rounded-xl bg-blue-600 text-white font-bold text-xs hover:bg-blue-700 transition">
                        অর্ডার করুন &rarr;
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Customer Reviews Section -->
<section class="py-16 bg-slate-50 border-t border-slate-200 font-bangla">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="text-xs font-bold text-blue-600 uppercase tracking-widest font-sans">Testimonials</span>
            <h2 class="text-2xl sm:text-4xl font-extrabold text-slate-900 mt-1">গ্রাহকদের বিশ্বস্ত মন্তব্য</h2>
            <p class="text-slate-600 text-sm mt-1">ঢাকা ও চট্টগ্রামের নিয়মিত গ্রাহকরা আমাদের সম্পর্কে কী বলছেন</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-7 rounded-2xl shadow-sm border border-slate-200 space-y-4">
                <div class="text-amber-400 text-sm">★★★★★</div>
                <p class="text-slate-700 text-sm leading-relaxed">
                    "আমার বিয়ের জামদানি শাড়িতে এক জায়গায় তেলের দাগ পড়েছিল। স্থানীয় অনেক লন্ড্রি না করে দিয়েছিল। কিন্তু লন্ডি-শপের স্পেশাল ড্রাই ওয়াশে দাগটি সম্পূর্ণ উঠে গেছে এবং শাড়ির জরির কোনো ক্ষতি হয়নি।"
                </p>
                <div class="flex items-center gap-3 pt-2 border-t border-slate-100">
                    <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-700 font-bold flex items-center justify-center font-sans">NJ</div>
                    <div>
                        <h4 class="text-sm font-bold text-slate-900">নুসরাত জাহান</h4>
                        <p class="text-xs text-slate-500">গুলশান-২, ঢাকা</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-7 rounded-2xl shadow-sm border border-slate-200 space-y-4">
                <div class="text-amber-400 text-sm">★★★★★</div>
                <p class="text-slate-700 text-sm leading-relaxed">
                    "সবচেয়ে দারুণ বিষয় হচ্ছে ওদের বারকোড ট্যাগ আর এসএমএস ট্র্যাকিং। প্রতিটা কাপড় আলাদাভাবে স্ক্যান হয়, তাই কখনো কাপড় হারানোর বা অন্য কারও কাপড় চলে আসার সুযোগ নেই।"
                </p>
                <div class="flex items-center gap-3 pt-2 border-t border-slate-100">
                    <div class="w-10 h-10 rounded-full bg-cyan-100 text-cyan-700 font-bold flex items-center justify-center font-sans">TH</div>
                    <div>
                        <h4 class="text-sm font-bold text-slate-900">ইঞ্জি. তানভীর হাসান</h4>
                        <p class="text-xs text-slate-500">উত্তরা, ঢাকা</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-7 rounded-2xl shadow-sm border border-slate-200 space-y-4">
                <div class="text-amber-400 text-sm">★★★★★</div>
                <p class="text-slate-700 text-sm leading-relaxed">
                    "অফিসের টাইট শিডিউলে বাইরে গিয়ে কাপড় দিয়ে আসার সময় পাই না। ওদের অনলাইন পিকআপ বুকিং দিলে পরদিনই রাইডার এসে কাপড় নিয়ে যায় এবং ঠিক সময়ে ইস্ত্রি করে দিয়ে যায়। পেমেন্টও বিকাশে দেয়া যায়।"
                </p>
                <div class="flex items-center gap-3 pt-2 border-t border-slate-100">
                    <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-700 font-bold flex items-center justify-center font-sans">FA</div>
                    <div>
                        <h4 class="text-sm font-bold text-slate-900">ফাহিম আহমেদ</h4>
                        <p class="text-xs text-slate-500">ধানমন্ডি, ঢাকা</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bottom CTA Banner -->
<section class="py-16 bg-gradient-to-r from-blue-700 via-blue-600 to-cyan-600 text-white font-bangla">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
        <h2 class="text-2xl sm:text-4xl font-black">আজই আপনার লন্ড্রি ঝামেলামুক্ত করুন</h2>
        <p class="text-blue-100 text-sm sm:text-base max-w-xl mx-auto">
            আপনার প্রথম হোম পিকআপে পাচ্ছেন ২০% নিশ্চিত ছাড়। আমাদের অভিজ্ঞ ফ্যাব্রিক মাস্টাররা নিচ্ছেন আপনার কাপড়ের সর্বোচ্চ দায়িত্ব।
        </p>
        <div class="flex flex-wrap justify-center gap-4 pt-2">
            <a href="{{ route('public.book-pickup') }}" class="px-8 py-3.5 rounded-2xl bg-white text-blue-700 hover:bg-blue-50 font-bold text-base shadow-lg transition transform hover:scale-105">
                🛵 ফ্রি পিকআপ বুক করুন
            </a>
            <a href="tel:+8801711000000" class="px-7 py-3.5 rounded-2xl bg-blue-900/60 hover:bg-blue-900 text-white border border-blue-400/40 font-bold text-base transition">
                📞 সরাসরি কল করুন: +880 1711-000000
            </a>
        </div>
    </div>
</section>
@endsection
