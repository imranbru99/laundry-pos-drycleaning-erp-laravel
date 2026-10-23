@extends('layouts.public')

@section('title', 'লাইভ অর্ডার ট্র্যাকার - Londi-Shop BD')

@section('content')
<!-- Header -->
<div class="bg-gradient-to-b from-blue-900 to-slate-900 text-white py-14">
    <div class="max-w-4xl mx-auto px-4 text-center space-y-3">
        <span class="text-xs font-bold text-cyan-400 uppercase tracking-widest font-sans">Real-time Order Status</span>
        <h1 class="text-3xl sm:text-4xl font-black font-bangla">লাইভ অর্ডার ট্র্যাকিং</h1>
        <p class="text-slate-300 text-sm font-bangla">
            আপনার ইনভয়েস নম্বর অথবা নিবন্ধিত মোবাইল নম্বর লিখে বর্তমান অবস্থা জানুন
        </p>

        <!-- Search Form -->
        <div class="pt-4 max-w-xl mx-auto">
            <form action="{{ route('public.track') }}" method="GET" class="relative flex items-center shadow-2xl">
                <input type="text" name="q" value="{{ $query }}" required placeholder="ইনভয়েস নম্বর (যেমন: LON-8942) অথবা ফোন নম্বর..." class="w-full pl-5 pr-32 py-4 rounded-2xl bg-white text-slate-900 placeholder-slate-400 text-sm focus:outline-none focus:ring-4 focus:ring-blue-400/50 font-sans font-semibold">
                <button type="submit" class="absolute right-2 px-6 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm transition">
                    🔍 ট্র্যাক করুন
                </button>
            </form>

            <div class="flex flex-wrap items-center justify-center gap-2 text-xs text-slate-300 mt-3 font-bangla">
                <span>ডেমো ট্র্যাকিং ক্লিক করুন:</span>
                <a href="{{ route('public.track', ['q' => 'LON-8942']) }}" class="px-2 py-0.5 rounded bg-blue-800/80 hover:bg-blue-700 text-cyan-300 font-mono font-bold">LON-8942 (প্রস্তুত)</a>
                <a href="{{ route('public.track', ['q' => 'LON-9015']) }}" class="px-2 py-0.5 rounded bg-blue-800/80 hover:bg-blue-700 text-cyan-300 font-mono font-bold">LON-9015 (ওয়াশ চলছে)</a>
                <a href="{{ route('public.track', ['q' => 'LON-7621']) }}" class="px-2 py-0.5 rounded bg-blue-800/80 hover:bg-blue-700 text-cyan-300 font-mono font-bold">LON-7621 (ডেলিভার্ড)</a>
            </div>
        </div>
    </div>
</div>

<div class="py-12 bg-slate-100 min-h-screen font-bangla">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">

        @if($error)
            <div class="p-6 bg-red-50 border border-red-200 rounded-3xl text-red-800 text-center space-y-2 mb-8">
                <div class="text-3xl">⚠️</div>
                <h3 class="text-lg font-bold">অর্ডার পাওয়া যায়নি</h3>
                <p class="text-sm">{{ $error }}</p>
                <div class="pt-2">
                    <a href="{{ route('public.track', ['q' => 'LON-8942']) }}" class="inline-block px-4 py-2 rounded-xl bg-red-100 hover:bg-red-200 text-red-900 font-bold text-xs">
                        ডেমো অর্ডার দেখুন (LON-8942) &rarr;
                    </a>
                </div>
            </div>
        @endif

        @if($order)
            <!-- Order Tracking Card -->
            <div class="bg-white rounded-3xl shadow-xl border border-slate-200 overflow-hidden mb-8" id="printableInvoice">
                
                <!-- Card Header -->
                <div class="bg-slate-900 text-white p-6 sm:p-8 flex flex-wrap justify-between items-center gap-4">
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="text-xs uppercase font-sans font-bold text-cyan-400">Invoice Token</span>
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-bold font-sans {{ $order->payment_status === 'paid' ? 'bg-emerald-500/20 text-emerald-400 border border-emerald-500/30' : 'bg-amber-500/20 text-amber-300 border border-amber-500/30' }}">
                                {{ strtoupper($order->payment_status) }}
                            </span>
                        </div>
                        <h2 class="text-2xl sm:text-3xl font-black font-sans tracking-wide mt-1">{{ $order->order_number }}</h2>
                        <p class="text-xs text-slate-400 mt-1">অর্ডার তারিখ: {{ $order->created_at->format('d M, Y - h:i A') }}</p>
                    </div>

                    <div class="text-right">
                        <span class="inline-block px-4 py-1.5 rounded-xl text-sm font-bold border {{ $order->status_color }}">
                            {{ $order->status_label }}
                        </span>
                        @if($order->rack_location)
                            <p class="text-xs text-cyan-300 font-medium mt-2">
                                📍 র‍্যাক লোকেশন: <strong class="font-sans text-white">{{ $order->rack_location }}</strong>
                            </p>
                        @endif
                    </div>
                </div>

                <!-- Animated 5-Step Progress Bar -->
                @php
                    $steps = [
                        'received' => ['title' => 'অর্ডার গৃহীত', 'sub' => 'Order Received'],
                        'sorting' => ['title' => 'বাছাই ও ট্যাগ', 'sub' => 'Tagging & Rack'],
                        'in_wash' => ['title' => 'ওয়াশ ও ড্রাই ক্লিন', 'sub' => 'Washing & Care'],
                        'ironing' => ['title' => 'স্টিম ইস্ত্রি', 'sub' => 'Steam Press'],
                        'ready' => ['title' => 'প্রস্তুত', 'sub' => 'Ready for Pickup'],
                        'delivered' => ['title' => 'সরবরাহ সম্পন্ন', 'sub' => 'Delivered'],
                    ];

                    $stepKeys = array_keys($steps);
                    $currentIndex = array_search($order->status, $stepKeys);
                    if ($currentIndex === false) $currentIndex = 0;
                @endphp

                <div class="p-6 sm:p-8 bg-slate-50 border-b border-slate-200">
                    <h3 class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-6">লাইভ প্রগ্রেস টাইমলাইন</h3>
                    
                    <div class="relative">
                        <!-- Connecting Line -->
                        <div class="hidden sm:block absolute top-5 left-6 right-6 h-1 bg-slate-200 -z-0">
                            <div class="h-1 bg-blue-600 transition-all duration-700" style="width: {{ ($currentIndex / (count($steps) - 1)) * 100 }}%"></div>
                        </div>

                        <div class="grid grid-cols-2 sm:grid-cols-6 gap-4 relative z-10">
                            @foreach($steps as $key => $meta)
                                @php
                                    $stepIdx = array_search($key, $stepKeys);
                                    $isPassed = $stepIdx <= $currentIndex;
                                    $isCurrent = $stepIdx === $currentIndex;
                                @endphp
                                <div class="text-center flex flex-col items-center">
                                    <div class="w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold font-sans transition-all duration-300 {{ $isCurrent ? 'bg-blue-600 text-white ring-4 ring-blue-200 scale-110 shadow-lg' : ($isPassed ? 'bg-emerald-500 text-white' : 'bg-slate-200 text-slate-500') }}">
                                        @if($isPassed && !$isCurrent)
                                            ✓
                                        @else
                                            {{ $stepIdx + 1 }}
                                        @endif
                                    </div>
                                    <div class="mt-2">
                                        <div class="text-xs font-bold {{ $isCurrent ? 'text-blue-600' : ($isPassed ? 'text-slate-800' : 'text-slate-400') }}">
                                            {{ $meta['title'] }}
                                        </div>
                                        <div class="text-[10px] text-slate-400 font-sans hidden sm:block">
                                            {{ $meta['sub'] }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Customer & Branch Meta -->
                <div class="p-6 sm:p-8 grid grid-cols-1 sm:grid-cols-3 gap-6 border-b border-slate-200 bg-white">
                    <div>
                        <span class="text-xs text-slate-400 block font-sans uppercase">গ্রাহকের তথ্য</span>
                        <h4 class="text-sm font-bold text-slate-900 mt-1">{{ $order->customer->name }}</h4>
                        <p class="text-xs text-slate-600 font-sans">{{ $order->customer->phone }}</p>
                        <p class="text-xs text-slate-500 mt-1">{{ $order->customer->address ?? $order->customer->area }}</p>
                    </div>

                    <div>
                        <span class="text-xs text-slate-400 block font-sans uppercase">শাখা / ব্রাঞ্চ</span>
                        <h4 class="text-sm font-bold text-slate-900 mt-1">{{ $order->branch->bn_name ?? 'ধানমন্ডি শাখা' }}</h4>
                        <p class="text-xs text-slate-600 font-sans">{{ $order->branch->phone ?? '+880 1711-000000' }}</p>
                        <p class="text-xs text-slate-500 mt-1">{{ $order->branch->address ?? 'Dhanmondi, Dhaka' }}</p>
                    </div>

                    <div>
                        <span class="text-xs text-slate-400 block font-sans uppercase">ডেলিভারি শিডিউল</span>
                        <h4 class="text-sm font-bold text-blue-600 mt-1 font-sans">{{ $order->pickup_slot ?? 'Regular (৩-৪ দিন)' }}</h4>
                        <p class="text-xs text-slate-600">পদ্ধতি: <span class="font-bold">{{ $order->order_type === 'online_pickup' ? 'হোম ডেলিভারি' : 'কাউন্টার ডেলিভারি' }}</span></p>
                        @if($order->special_notes)
                            <p class="text-xs text-amber-700 bg-amber-50 p-1.5 rounded-lg mt-1 border border-amber-200">
                                📌 নোট: {{ $order->special_notes }}
                            </p>
                        @endif
                    </div>
                </div>

                <!-- Garment Breakdown Table with Barcode tags -->
                <div class="p-6 sm:p-8">
                    <h3 class="text-sm font-bold text-slate-800 uppercase tracking-wider mb-4">পোশাক ও সার্ভিসের তালিকা</h3>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm">
                            <thead class="bg-slate-50 text-slate-600 text-xs uppercase font-sans border-b border-slate-200">
                                <tr>
                                    <th class="py-3 px-4">বারকোড ট্যাগ</th>
                                    <th class="py-3 px-4">পোশাকের নাম</th>
                                    <th class="py-3 px-4">সার্ভিস</th>
                                    <th class="py-3 px-4 text-center">পরিমাণ</th>
                                    <th class="py-3 px-4 text-right">মূল্য (৳)</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @forelse($order->items as $item)
                                    <tr>
                                        <td class="py-3.5 px-4 font-mono text-xs font-bold text-slate-700">
                                            <span class="px-2 py-1 rounded bg-slate-100 border border-slate-200 inline-flex items-center gap-1">
                                                🏷️ {{ $item->barcode_tag ?? 'TAG-' . $item->id }}
                                            </span>
                                        </td>
                                        <td class="py-3.5 px-4">
                                            <div class="font-bold text-slate-900">{{ $item->garment->bn_name ?? $item->garment->name }}</div>
                                            @if($item->defects_note)
                                                <div class="text-[11px] text-amber-700">⚠️ {{ $item->defects_note }}</div>
                                            @endif
                                        </td>
                                        <td class="py-3.5 px-4 text-xs font-semibold text-blue-600">{{ $item->service_name }}</td>
                                        <td class="py-3.5 px-4 text-center font-sans font-bold">{{ $item->quantity }}</td>
                                        <td class="py-3.5 px-4 text-right font-sans font-bold text-slate-900">৳ {{ number_format($item->subtotal) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="py-4 text-center text-slate-400">কোনো আইটেম পাওয়া যায়নি</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot class="bg-slate-50 font-sans border-t border-slate-200">
                                <tr>
                                    <td colspan="4" class="py-2.5 px-4 text-right text-xs text-slate-600 font-bangla">সাবটোটাল:</td>
                                    <td class="py-2.5 px-4 text-right font-bold text-slate-900">৳ {{ number_format($order->subtotal) }}</td>
                                </tr>
                                @if($order->express_charge > 0)
                                    <tr>
                                        <td colspan="4" class="py-1 px-4 text-right text-xs text-slate-600 font-bangla">এক্সপ্রেস সার্ভিস চার্জ:</td>
                                        <td class="py-1 px-4 text-right font-bold text-amber-600">+৳ {{ number_format($order->express_charge) }}</td>
                                    </tr>
                                @endif
                                @if($order->delivery_charge > 0)
                                    <tr>
                                        <td colspan="4" class="py-1 px-4 text-right text-xs text-slate-600 font-bangla">হোম ডেলিভারি ফি:</td>
                                        <td class="py-1 px-4 text-right font-bold text-slate-700">+৳ {{ number_format($order->delivery_charge) }}</td>
                                    </tr>
                                @endif
                                @if($order->discount > 0)
                                    <tr>
                                        <td colspan="4" class="py-1 px-4 text-right text-xs text-slate-600 font-bangla">ডিসকাউন্ট:</td>
                                        <td class="py-1 px-4 text-right font-bold text-emerald-600">-৳ {{ number_format($order->discount) }}</td>
                                    </tr>
                                @endif
                                <tr class="text-base font-black border-t border-slate-200">
                                    <td colspan="4" class="py-3 px-4 text-right text-slate-900 font-bangla">সর্বমোট প্রদেয় বিল:</td>
                                    <td class="py-3 px-4 text-right text-blue-600">৳ {{ number_format($order->grand_total) }}</td>
                                </tr>
                                <tr class="text-xs bg-slate-100">
                                    <td colspan="4" class="py-2 px-4 text-right text-slate-600 font-bangla">পরিশোধিত (Paid via {{ strtoupper($order->payment_method) }}):</td>
                                    <td class="py-2 px-4 text-right text-emerald-600 font-bold">৳ {{ number_format($order->paid_amount) }}</td>
                                </tr>
                                @if($order->due_amount > 0)
                                    <tr class="text-xs bg-red-50 text-red-700 font-bold">
                                        <td colspan="4" class="py-2 px-4 text-right font-bangla">বকেয়া বিল (Due):</td>
                                        <td class="py-2 px-4 text-right">৳ {{ number_format($order->due_amount) }}</td>
                                    </tr>
                                @endif
                            </tfoot>
                        </table>
                    </div>
                </div>

                <!-- Print & Share Actions -->
                <div class="p-6 bg-slate-50 border-t border-slate-200 flex flex-wrap justify-between items-center gap-4">
                    <div class="flex items-center gap-2 text-xs text-slate-500 font-bangla">
                        <span>🔒 কিউআর কোড নিরাপত্তা ভেরিফাইড</span>
                        <span>•</span>
                        <span>পোশাক ডেলিভারির সময় রসিদ প্রদর্শন করুন</span>
                    </div>

                    <div class="flex gap-3">
                        <button onclick="window.print()" class="px-5 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs transition flex items-center gap-2">
                            <span>🖨️ ইনভয়েস প্রিন্ট করুন</span>
                        </button>
                        <a href="{{ route('public.book-pickup') }}" class="px-5 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs transition">
                            নতুন পিকআপ বুকিং &rarr;
                        </a>
                    </div>
                </div>

            </div>
        @endif

    </div>
</div>
@endsection
