@extends('layouts.public')

@section('title', 'আমাদের শাখাসমূহ ও আউটলেট - Londi-Shop BD')

@section('content')
<!-- Header -->
<div class="bg-gradient-to-b from-blue-900 to-slate-900 text-white py-16">
    <div class="max-w-4xl mx-auto px-4 text-center space-y-3">
        <span class="text-xs font-bold text-cyan-400 uppercase tracking-widest font-sans">Our Outlets</span>
        <h1 class="text-3xl sm:text-5xl font-black font-bangla">নিকটস্থ শাখা ও আউটলেট খুঁজুন</h1>
        <p class="text-slate-300 text-sm sm:text-base font-bangla">
            সরাসরি দোকানে এসে কাপড় জমা দিন কিংবা ড্রপ-বক্সে রাখুন
        </p>
    </div>
</div>

<div class="py-14 bg-slate-50 min-h-screen font-bangla">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($branches as $branch)
                <div class="bg-white rounded-3xl p-7 shadow-sm border border-slate-200 hover:shadow-xl transition duration-300 flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <span class="px-2.5 py-0.5 rounded-md bg-blue-100 text-blue-800 text-xs font-bold font-sans">
                                    {{ $branch->code }}
                                </span>
                                <h3 class="text-xl font-bold text-slate-900 mt-2">{{ $branch->bn_name }}</h3>
                                <p class="text-xs text-slate-500 font-sans">{{ $branch->name }}</p>
                            </div>
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-semibold">
                                <span class="w-2 h-2 rounded-full bg-emerald-500"></span> খোলা আছে
                            </span>
                        </div>

                        <div class="space-y-2 text-sm text-slate-600">
                            <p class="flex items-start gap-2">
                                <span class="text-base">📍</span>
                                <span>{{ $branch->address }}</span>
                            </p>
                            <p class="flex items-center gap-2">
                                <span class="text-base">📞</span>
                                <span class="font-sans font-bold text-slate-800">{{ $branch->phone }}</span>
                            </p>
                            <p class="flex items-center gap-2 text-xs text-slate-500">
                                <span class="text-base">⏰</span>
                                <span>সকাল ৯:০০ টা - রাত ১০:০০ টা (প্রতিদিন খোলা)</span>
                            </p>
                        </div>
                    </div>

                    <div class="pt-6 border-t border-slate-100 mt-6 flex flex-wrap gap-3">
                        <a href="tel:{{ $branch->phone }}" class="flex-1 text-center py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold text-xs transition">
                            📞 কল করুন
                        </a>
                        <a href="https://wa.me/8801711000000" target="_blank" class="flex-1 text-center py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs transition">
                            💬 হোয়াটসঅ্যাপ
                        </a>
                        <a href="{{ route('public.book-pickup') }}" class="w-full text-center py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs transition">
                            🛵 এই শাখায় পিকআপ বুকিং &rarr;
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
@endsection
