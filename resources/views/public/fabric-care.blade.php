@extends('layouts.public')

@section('title', 'এআই ফ্যাব্রিক কেয়ার ও দাগ সহায়িকা - Londi-Shop BD')

@section('content')
<!-- Header -->
<div class="bg-gradient-to-b from-blue-900 via-slate-900 to-slate-950 text-white py-16">
    <div class="max-w-4xl mx-auto px-4 text-center space-y-3">
        <span class="text-xs font-bold text-cyan-400 uppercase tracking-widest font-sans">AI Fabric Doctor & Stain Guide</span>
        <h1 class="text-3xl sm:text-5xl font-black font-bangla">স্মার্ট ফ্যাব্রিক কেয়ার ও দাগ সমাধান</h1>
        <p class="text-slate-300 text-sm sm:text-base font-bangla max-w-2xl mx-auto">
            জামদানি, কাতান কিংবা সুতি পাঞ্জাবি—আপনার শখের কাপড়ের সঠিক যত্ন এবং কঠিন দাগ তোলার বৈজ্ঞানিক নির্দেশিকা।
        </p>
    </div>
</div>

<div class="py-14 bg-slate-50 font-bangla min-h-screen">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">

        <!-- Interactive AI Stain Assistant (Alpine.js) -->
        <div class="bg-white rounded-3xl p-6 sm:p-10 shadow-xl border border-slate-200 mb-16" x-data="{
            stainType: 'curry',
            fabricType: 'silk',
            get advice() {
                if (this.stainType === 'curry') {
                    return {
                        title: 'হলুদ ও তরকারির কঠিন দাগ (Turmeric & Curry)',
                        do: 'দাগ লাগার সাথে সাথে টিস্যু বা সুতি কাপড় দিয়ে চেপে অতিরিক্ত তেল শুষে নিন। ভুলেও গরম পানি বা সাধারণ সাবান দিয়ে ঘষবেন না।',
                        dont: 'রোদে সরাসরি শুকাতে দেবেন না, এতে হলুদের রঙ আরও স্থায়ী হয়ে কাপড়ের আঁশে বসে যায়।',
                        londiTreatment: 'আমাদের বিশেষ এনজাইম বেসড প্রোটিন ও কারকিউমিন রিমুভার এবং কোল্ড ড্রাই ওয়াশ টেকনিক ব্যবহার করা হয়।'
                    };
                } else if (this.stainType === 'tea') {
                    return {
                        title: 'চা ও কফির দাগ (Tea & Coffee)',
                        do: 'দাগ লাগার সাথে সাথে ঠাণ্ডা পানির ঝাপটা দিন এবং পেছনে শোষক কাপড় রেখে সামনের দিক থেকে হালকা চাপ দিন।',
                        dont: 'গরম ইস্ত্রি ভুলেও দাগের ওপর চালাবেন না; তাপ পেলে চায়ের ট্যানিন স্থায়ী দাগে পরিণত হয়।',
                        londiTreatment: 'আমরা ট্যানিন রিমুভার ও ফ্যাব্রিক সেফ অক্সিজেন ব্লিচ দিয়ে ধুয়ে মূল রঙ অক্ষুণ্ণ রাখি।'
                    };
                } else if (this.stainType === 'oil') {
                    return {
                        title: 'তেল ও চর্বির দাগ (Oil & Grease)',
                        do: 'দাগের ওপর কিছুটা ট্যালকম পাউডার বা কর্নস্টার্চ ছড়িয়ে ১০ মিনিট রাখুন যাতে তেল শুষে নেয়।',
                        dont: 'পানি দিয়ে সরাসরি ঘষাঘষি করবেন না, এতে তেল কাপড়ে আরও ছড়িয়ে পড়বে।',
                        londiTreatment: 'পানিহীন অর্গানিক ড্রাই ক্লিন কেমিক্যাল ও স্পটিং গানের সাহায্যে তেলের অণু ভেঙে তুলে ফেলা হয়।'
                    };
                } else if (this.stainType === 'ink') {
                    return {
                        title: 'বলপয়েন্ট কালির দাগ (Ballpoint Ink)',
                        do: 'একটি কটন বাডে সামান্য রাবিং অ্যালকোহল নিয়ে দাগের ওপর আলতো টোকা দিন।',
                        dont: 'কাপড় জলে ভিজিয়ে পুরো কাপড়ে ঘষবেন না, পুরো কাপড় কালিময় হতে পারে।',
                        londiTreatment: 'আমাদের ল্যাব স্পটিং সলভেন্ট দিয়ে কালির পিগমেন্ট ডিসল্ভ করে দাগহীন ফিনিশ দেওয়া হয়।'
                    };
                }
                return {
                    title: 'ঘামের দাগ ও কলারের ময়লা (Perspiration)',
                    do: 'প্রতি ব্যবহারের পর কাপড় ভালোভাবে বাতাসে শুকিয়ে লন্ড্রিতে দিন।',
                    dont: 'ঘামে ভেজা কাপড় বন্ধ আলমারিতে জমা করে রাখবেন না।',
                    londiTreatment: 'হাইড্রোলিক কলার ও কাফ প্রেসিং মেশিনে অ্যান্টি-ব্যাকটেরিয়াল স্টিম ট্রিটমেন্ট দেওয়া হয়।'
                };
            }
        }">
            <div class="flex items-center gap-2 mb-6">
                <span class="px-3 py-1 rounded-full bg-cyan-100 text-cyan-800 text-xs font-bold font-sans">
                    🤖 AI Hub Interactive Diagnostic
                </span>
                <span class="text-xs text-slate-500 font-sans">Powered by imrandevbd/laravel-ai-hub</span>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                <div class="lg:col-span-5 space-y-4">
                    <h2 class="text-xl font-bold text-slate-900">দাগের ধরন বেছে নিন:</h2>
                    <div class="grid grid-cols-2 gap-2">
                        <button type="button" @click="stainType = 'curry'" :class="stainType === 'curry' ? 'bg-amber-600 text-white shadow-md' : 'bg-slate-100 text-slate-700 hover:bg-slate-200'" class="p-3 rounded-xl text-xs font-bold text-left transition">
                            🍛 হলুদ ও তরকারি
                        </button>
                        <button type="button" @click="stainType = 'tea'" :class="stainType === 'tea' ? 'bg-amber-600 text-white shadow-md' : 'bg-slate-100 text-slate-700 hover:bg-slate-200'" class="p-3 rounded-xl text-xs font-bold text-left transition">
                            ☕ চা ও কফি
                        </button>
                        <button type="button" @click="stainType = 'oil'" :class="stainType === 'oil' ? 'bg-amber-600 text-white shadow-md' : 'bg-slate-100 text-slate-700 hover:bg-slate-200'" class="p-3 rounded-xl text-xs font-bold text-left transition">
                            🛢️ তেল ও চর্বি
                        </button>
                        <button type="button" @click="stainType = 'ink'" :class="stainType === 'ink' ? 'bg-amber-600 text-white shadow-md' : 'bg-slate-100 text-slate-700 hover:bg-slate-200'" class="p-3 rounded-xl text-xs font-bold text-left transition">
                            🖋️ কলমের কালি
                        </button>
                    </div>

                    <div class="pt-2">
                        <a href="{{ route('public.book-pickup') }}" class="w-full block text-center py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs shadow-md transition">
                            🛵 আমাদের দাগ অপসারণ স্পেশালিস্ট বুক করুন
                        </a>
                    </div>
                </div>

                <!-- Advice Output Box -->
                <div class="lg:col-span-7 bg-slate-900 text-white p-7 rounded-2xl space-y-4 border border-slate-800">
                    <h3 class="text-lg font-bold text-amber-400" x-text="advice.title"></h3>

                    <div class="space-y-3 text-sm">
                        <div class="p-3 rounded-xl bg-slate-800/80 border border-slate-700/60">
                            <span class="text-xs font-bold text-emerald-400 block mb-1">✅ প্রাথমিক করণীয় (First Aid):</span>
                            <p class="text-slate-300 text-xs leading-relaxed" x-text="advice.do"></p>
                        </div>

                        <div class="p-3 rounded-xl bg-slate-800/80 border border-slate-700/60">
                            <span class="text-xs font-bold text-red-400 block mb-1">❌ যা ভুলেও করবেন না (Never Do):</span>
                            <p class="text-slate-300 text-xs leading-relaxed" x-text="advice.dont"></p>
                        </div>

                        <div class="p-3 rounded-xl bg-blue-950/60 border border-blue-800/60">
                            <span class="text-xs font-bold text-cyan-300 block mb-1">🔬 লন্ড্রি শপের স্পেশাল ট্রিটমেন্ট:</span>
                            <p class="text-slate-200 text-xs leading-relaxed" x-text="advice.londiTreatment"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bangladeshi Traditional Fabrics Care Cards -->
        <h2 class="text-2xl font-black text-slate-900 mb-6">ঐতিহ্যবাহী পোশাকের বিশেষ যত্ন নির্দেশিকা</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-3">
                <div class="text-3xl">🥻</div>
                <h3 class="text-base font-bold text-slate-900">ঢাকাই জামদানি শাড়ি</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    জামদানির সুতা ও জরির কাজ অত্যন্ত সূক্ষ্ম। এটি কখনো ওয়াশিং মেশিনে বা ক্ষারযুক্ত গুঁড়ো সাবানে ধোয়া যায় না। আমাদের পানিহীন ড্রাম ড্রাই ওয়াশ ও হ্যান্ড রোলার স্টিমে শাড়ির কুঁচকানো নিখুঁতভাবে সোজা করা হয়।
                </p>
                <div class="text-[11px] font-bold text-blue-600">রেফারেন্স সার্ভিস: Jamdani Drum Polish</div>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-3">
                <div class="text-3xl">✨</div>
                <h3 class="text-base font-bold text-slate-900">কাতান ও বেনারসি শাড়ি</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    কাতানের জরির উজ্জ্বলতা ধরে রাখতে আর্দ্রতা ও তাপমাত্রার সুনির্দিষ্ট ব্যালান্স প্রয়োজন। আমরা ব্যবহার করি সিলিকন ফিনিশ ড্রাই সলভিং, যা জরিতে কালো দাগ পড়তে দেয় না।
                </p>
                <div class="text-[11px] font-bold text-blue-600">রেফারেন্স সার্ভিস: Katan Zari Protection</div>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-3">
                <div class="text-3xl">🧥</div>
                <h3 class="text-base font-bold text-slate-900">স্যুট, ব্লেজার ও কোট</h3>
                <p class="text-xs text-slate-600 leading-relaxed">
                    স্যুটের ক্যানভাস ও শোল্ডার প্যাড সাধারণ পানিতে নষ্ট হয়ে আকৃতি হারায়। আমাদের থ্রি-ডি ম্যানিকুইন স্টিম ফর্মিং মেশিনে ব্লেজারের ফিটিংস একদম শোরুম নতুনের মতো ফিরিয়ে আনা হয়।
                </p>
                <div class="text-[11px] font-bold text-blue-600">রেফারেন্স সার্ভিস: 3D Form Steam Press</div>
            </div>

        </div>

    </div>
</div>
@endsection
