@extends('layouts.public')

@section('title', 'আমাদের সম্পর্কে - Londi-Shop BD')

@section('content')
<!-- Header -->
<div class="bg-gradient-to-b from-blue-900 to-slate-900 text-white py-16">
    <div class="max-w-4xl mx-auto px-4 text-center space-y-3">
        <span class="text-xs font-bold text-cyan-400 uppercase tracking-widest font-sans">Our Mission</span>
        <h1 class="text-3xl sm:text-5xl font-black font-bangla">আমাদের গল্প ও প্রযুক্তি</h1>
        <p class="text-slate-300 text-sm sm:text-base font-bangla max-w-xl mx-auto">
            ঐতিহ্যবাহী ধোপা সংস্কৃতিকে আধুনিক ক্লাউড সফটওয়্যার ও প্রিমিয়াম ফ্যাব্রিক কেয়ারে রূপান্তর
        </p>
    </div>
</div>

<div class="py-16 bg-white font-bangla">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 space-y-12">
        <div class="space-y-4 text-slate-700 leading-relaxed text-base">
            <h2 class="text-2xl font-black text-slate-900">যেভাবে শুরু হলো লন্ড্রি শপ (Londi-Shop)</h2>
            <p>
                বাংলাদেশে লন্ড্রি ব্যবসা দীর্ঘকাল ধরে হাতে লেখা লাল খাতা এবং কাপড়ের পেছনে পেনের কালিতে দাগ দিয়ে সনাতন পদ্ধতিতে পরিচালিত হয়ে আসছিল। এতে প্রতিনিয়ত কাপড়ের রঙ চটে যাওয়া, কাপড় হারিয়ে যাওয়া কিংবা জরুরি ডেলিভারি সময়ে না পাওয়ার মতো দুর্ভোগ পোহাতে হতো গ্রাহকদের।
            </p>
            <p>
                আমরা চেয়েছিলাম একটি পূর্ণাঙ্গ ও নির্ভরযোগ্য ক্লাউড ম্যানেজমেন্ট ও প্রিমিয়াম সার্ভিস প্ল্যাটফর্ম গড়ে তুলতে—যেখানে প্রতিটি কাপড় বারকোড ট্যাগে ট্র্যাক হবে, সঠিক আর্দ্রতায় স্টিম ইস্ত্রি হবে এবং গ্রাহক ঘরে বসেই নিজের মোবাইল থেকে লাইভ ট্র্যাকিং দেখতে পাবেন।
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 pt-6 border-t border-slate-200">
            <div class="p-6 bg-slate-50 rounded-2xl border border-slate-200">
                <div class="text-3xl font-black text-blue-600 font-sans">১০০%</div>
                <div class="text-sm font-bold text-slate-900 mt-1">সুরক্ষা গ্যারান্টি</div>
                <p class="text-xs text-slate-500 mt-1">কোনো কাপড় হারিয়ে গেলে অথবা ক্ষতির শিকার হলে তাৎক্ষণিক ক্ষতিপূরণ নীতি।</p>
            </div>
            <div class="p-6 bg-slate-50 rounded-2xl border border-slate-200">
                <div class="text-3xl font-black text-emerald-600 font-sans">০%</div>
                <div class="text-sm font-bold text-slate-900 mt-1">ক্লোরিন ও বিষাক্ত কেমিক্যাল</div>
                <p class="text-xs text-slate-500 mt-1">শুধুমাত্র অর্গানিক পিএইচ-নিউট্রাল ডিটারজেন্ট ব্যবহার করা হয়।</p>
            </div>
            <div class="p-6 bg-slate-50 rounded-2xl border border-slate-200">
                <div class="text-3xl font-black text-cyan-600 font-sans">২৪/৭</div>
                <div class="text-sm font-bold text-slate-900 mt-1">স্মার্ট ট্র্যাকিং</div>
                <p class="text-xs text-slate-500 mt-1">ইনভয়েস বা ফোন নম্বর দিয়ে যেকোনো সময় অর্ডারের লাইভ আপডেট।</p>
            </div>
        </div>

        <div class="p-8 bg-gradient-to-r from-blue-900 to-slate-900 text-white rounded-3xl space-y-4">
            <h3 class="text-xl font-bold">লন্ড্রি শপ ওনারদের জন্য সফটওয়্যার সলিউশন</h3>
            <p class="text-sm text-slate-300 leading-relaxed">
                আপনি কি একজন লন্ড্রি বা ড্রাই ক্লিনিং ব্যবসায়ী? আমাদের এই মডুলার সিস্টেমটি আপনিও আপনার দোকানে চালাতে পারেন। পিওএস, বারকোড ট্যাগ, বায়োমেট্রিক হাজিরা মেশিন এবং কাস্টমার এসএমএস—আপনার প্রয়োজনীয় মডিউল চালু বা বন্ধ রেখে ব্যবসা পরিচালনা করুন।
            </p>
            <div class="pt-2">
                <a href="{{ route('public.contact') }}" class="inline-block px-6 py-3 rounded-xl bg-cyan-400 hover:bg-cyan-300 text-slate-950 font-bold text-xs transition">
                    ফ্র্যাঞ্চাইজ বা সফটওয়্যার সম্পর্কে জানুন &rarr;
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
