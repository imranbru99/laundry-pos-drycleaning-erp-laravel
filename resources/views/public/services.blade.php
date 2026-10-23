@extends('layouts.public')

@section('title', 'সম্পূর্ণ লন্ড্রি রেট কার্ড ও সেবাসমূহ - Londi-Shop BD')

@section('content')
<!-- Page Header -->
<div class="bg-gradient-to-b from-blue-900 to-slate-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="text-xs font-bold text-cyan-400 uppercase tracking-widest font-sans">Official Rate Card</span>
        <h1 class="text-3xl sm:text-5xl font-black font-bangla">লন্ড্রি ও ড্রাই ক্লিন রেট কার্ড</h1>
        <p class="text-slate-300 text-sm sm:text-base font-bangla max-w-2xl mx-auto">
            কোনো লুকায়িত চার্জ নেই। আপনার প্রতিটি পোশাকের সঠিক ও স্বচ্ছ মূল্য তালিকা।
        </p>
    </div>
</div>

<!-- Rates Table Section with Filter & Search in Alpine.js -->
<div class="py-12 bg-slate-50 min-h-screen font-bangla" x-data="{
    search: '',
    selectedCategory: 'all',
    matches(garmentName, catId) {
        let matchText = this.search === '' || garmentName.toLowerCase().includes(this.search.toLowerCase());
        let matchCat = this.selectedCategory === 'all' || this.selectedCategory == catId;
        return matchText && matchCat;
    }
}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Filter Controls -->
        <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-200 mb-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <!-- Search bar -->
            <div class="relative w-full md:w-80">
                <input type="text" x-model="search" placeholder="পোশাকের নাম দিয়ে খুঁজুন (যেমন: শার্ট, জামদানি)..." class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <svg class="w-5 h-5 text-slate-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>

            <!-- Category Pills -->
            <div class="flex flex-wrap gap-2 w-full md:w-auto">
                <button type="button" @click="selectedCategory = 'all'" :class="selectedCategory === 'all' ? 'bg-blue-600 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200'" class="px-4 py-2 rounded-xl text-xs font-bold transition">
                    সকল পোশাক (All)
                </button>
                @foreach($categories as $category)
                    <button type="button" @click="selectedCategory = '{{ $category->id }}'" :class="selectedCategory == '{{ $category->id }}' ? 'bg-blue-600 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200'" class="px-4 py-2 rounded-xl text-xs font-bold transition">
                        {{ $category->bn_name }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Garment Tables by Category -->
        @foreach($categories as $category)
            <div class="mb-12 bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden" x-show="selectedCategory === 'all' || selectedCategory == '{{ $category->id }}'">
                <div class="bg-slate-100/80 px-6 py-4 border-b border-slate-200 flex justify-between items-center">
                    <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-blue-600"></span>
                        {{ $category->bn_name }}
                        <span class="text-xs text-slate-500 font-sans">({{ $category->name }})</span>
                    </h2>
                    <span class="text-xs text-blue-600 font-bold bg-blue-50 px-2.5 py-1 rounded-full border border-blue-200">
                        {{ $category->garments->count() }} টি আইটেম
                    </span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-slate-50 text-slate-700 text-xs uppercase border-b border-slate-200 font-sans">
                            <tr>
                                <th class="py-3 px-6">পোশাকের নাম (Garment)</th>
                                <th class="py-3 px-6 text-center">ওয়াশ ও স্টিম ইস্ত্রি</th>
                                <th class="py-3 px-6 text-center">শুধুমাত্র স্টিম ইস্ত্রি</th>
                                <th class="py-3 px-6 text-center">ড্রাই ক্লিন ও পলিশ</th>
                                <th class="py-3 px-6 text-right">অ্যাকশন</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach($category->garments as $garment)
                                <tr class="hover:bg-blue-50/40 transition" x-show="matches('{{ $garment->bn_name }} {{ $garment->name }}', '{{ $category->id }}')">
                                    <td class="py-4 px-6">
                                        <div class="font-bold text-slate-900">{{ $garment->bn_name }}</div>
                                        <div class="text-xs text-slate-500 font-sans">{{ $garment->name }}</div>
                                    </td>
                                    <td class="py-4 px-6 text-center font-sans font-bold text-slate-800">
                                        @if($garment->wash_iron_price > 0)
                                            ৳ {{ number_format($garment->wash_iron_price) }}
                                        @else
                                            <span class="text-xs text-slate-400 font-bangla font-normal">প্রযোজ্য নয়</span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-6 text-center font-sans font-bold text-slate-800">
                                        @if($garment->steam_iron_price > 0)
                                            ৳ {{ number_format($garment->steam_iron_price) }}
                                        @else
                                            <span class="text-xs text-slate-400 font-bangla font-normal">প্রযোজ্য নয়</span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-6 text-center font-sans font-bold text-blue-600">
                                        @if($garment->dry_clean_price > 0)
                                            ৳ {{ number_format($garment->dry_clean_price) }}
                                        @else
                                            <span class="text-xs text-slate-400 font-bangla font-normal">প্রযোজ্য নয়</span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-6 text-right">
                                        <a href="{{ route('public.book-pickup') }}" class="inline-block px-3.5 py-1.5 rounded-lg bg-blue-50 text-blue-700 hover:bg-blue-600 hover:text-white font-bold text-xs transition">
                                            বুক করুন &rarr;
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach

        <!-- Additional Services Note -->
        <div class="bg-gradient-to-r from-blue-900 to-slate-900 text-white rounded-3xl p-8 shadow-xl mt-12 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="space-y-2">
                <div class="text-2xl">✨</div>
                <h3 class="text-base font-bold">বিশেষ দাগ দূরীকরণ (Stain Removal)</h3>
                <p class="text-xs text-slate-300 leading-relaxed">চা, কফি, তেল, মরিচা, হলুদ বা কালির কঠিন দাগ তোলার জন্য কাপড়ের ধরন অনুযায়ী অতিরিক্ত ৳ ৩০ - ৳ ৫০ চার্জ হতে পারে।</p>
            </div>
            <div class="space-y-2">
                <div class="text-2xl">🧵</div>
                <h3 class="text-base font-bold">অদৃশ্য রফু ও সেলাই মেরামত (Rafu)</h3>
                <p class="text-xs text-slate-300 leading-relaxed">ছেঁড়া কাপড় সূক্ষ্মভাবে রফু করা এবং বোতাম সেলাই ও চেইন প্রতিস্থাপন দক্ষ মাস্টার দ্বারা করা হয়।</p>
            </div>
            <div class="space-y-2">
                <div class="text-2xl">⚡</div>
                <h3 class="text-base font-bold">২৪ ঘণ্টা এক্সপ্রেস ডেলিভারি</h3>
                <p class="text-xs text-slate-300 leading-relaxed">জরুরি ডেলিভারির ক্ষেত্রে মূল বিলের সাথে ৩০% এক্সপ্রেস ফি প্রযোজ্য হবে এবং ২৪ ঘণ্টার মধ্যে সরবরাহ নিশ্চিত করা হয়।</p>
            </div>
        </div>

    </div>
</div>
@endsection
