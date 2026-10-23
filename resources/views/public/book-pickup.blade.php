@extends('layouts.public')

@section('title', 'ডোরস্টেপ লন্ড্রি পিকআপ বুকিং - Londi-Shop BD')

@section('content')
<!-- Header -->
<div class="bg-gradient-to-b from-blue-900 via-slate-900 to-slate-950 text-white py-16">
    <div class="max-w-4xl mx-auto px-4 text-center space-y-3">
        <span class="text-xs font-bold text-cyan-400 uppercase tracking-widest font-sans">Doorstep Pickup Service</span>
        <h1 class="text-3xl sm:text-5xl font-black font-bangla">ফ্রি হোম পিকআপ শিডিউল করুন</h1>
        <p class="text-slate-300 text-sm sm:text-base font-bangla max-w-xl mx-auto">
            আপনার বাসা বা অফিস থেকে কাপড় সংগ্রহ করতে আমাদের ভেরিফাইড রাইডার পৌঁছে যাবে আপনার পছন্দের সময়ে।
        </p>
    </div>
</div>

<div class="py-14 bg-slate-100 min-h-screen font-bangla">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        
        <div class="bg-white rounded-3xl shadow-xl border border-slate-200 overflow-hidden">
            <!-- Form Header Bar -->
            <div class="bg-slate-900 text-white p-6 sm:p-8 flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-bold">পিকআপ বুকিং ফর্ম</h2>
                    <p class="text-xs text-slate-400">ফর্মটি পূরণ করুন, কয়েক মিনিটের মধ্যে রাইডার নির্ধারণ করা হবে</p>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-blue-600/30 border border-blue-500/40 text-cyan-300 flex items-center justify-center text-2xl">
                    🛵
                </div>
            </div>

            <form action="{{ route('public.submit-booking') }}" method="POST" class="p-6 sm:p-10 space-y-8">
                @csrf

                <!-- Section 1: Customer Details -->
                <div class="space-y-4">
                    <h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider flex items-center gap-2">
                        <span class="w-6 h-6 rounded-full bg-blue-600 text-white flex items-center justify-center text-xs font-sans">১</span>
                        আপনার যোগাযোগের তথ্য (Contact Information)
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">পূর্ণ নাম *</label>
                            <input type="text" name="name" required placeholder="যেমন: তানভীর আহমেদ" class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">মোবাইল নম্বর * (এসএমএস ট্র্যাকিং পাঠানো হবে)</label>
                            <input type="tel" name="phone" required placeholder="017xxxxxxxx" class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none font-sans">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">এলাকা / জোন *</label>
                            <select name="area" required class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                <option value="Dhanmondi, Dhaka">ধানমন্ডি (Dhanmondi)</option>
                                <option value="Gulshan-1 & 2, Dhaka">গুলশান-১ ও ২ (Gulshan)</option>
                                <option value="Banani, Dhaka">বনানী (Banani)</option>
                                <option value="Uttara Sector 1-14, Dhaka">উত্তরা (Uttara)</option>
                                <option value="Mirpur 1-14, Dhaka">মিরপুর (Mirpur)</option>
                                <option value="Mohammadpur & Lalmatia">মোহাম্মদপুর ও লালমাটিয়া</option>
                                <option value="Bashundhara R/A & Baridhara">বসুন্ধরা ও বারিধারা</option>
                                <option value="Chittagong GEC & Nasirabad">চট্টগ্রাম (জিইসি ও নাসিরাবাদ)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">পূর্ণ ঠিকানা (বাসা, রোড ও ফ্ল্যাট নম্বর) *</label>
                            <input type="text" name="address" required placeholder="যেমন: বাসা ১২, রোড ৫, ফ্ল্যাট ৪/বি..." class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        </div>
                    </div>
                </div>

                <!-- Section 2: Service & Garments -->
                <div class="space-y-4 pt-4 border-t border-slate-200">
                    <h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider flex items-center gap-2">
                        <span class="w-6 h-6 rounded-full bg-blue-600 text-white flex items-center justify-center text-xs font-sans">২</span>
                        সার্ভিস ও কাপড়ের বিবরণ
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">সার্ভিস ক্যাটাগরি *</label>
                            <select name="service_type" required class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                <option value="ওয়াশ ও স্টিম ইস্ত্রি (Wash & Iron)">ওয়াশ ও স্টিম ইস্ত্রি (Wash & Iron)</option>
                                <option value="শুধুমাত্র স্টিম ইস্ত্রি (Steam Press)">শুধুমাত্র স্টিম ইস্ত্রি (Steam Press)</option>
                                <option value="ড্রাই ক্লিন ও পলিশ (Dry Cleaning)">ড্রাই ক্লিন ও পলিশ (Dry Cleaning)</option>
                                <option value="মিক্সড লন্ড্রি (Mixed Laundry)">মিক্সড লন্ড্রি (Mixed Laundry)</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">আনুমানিক পোশাকের সংখ্যা *</label>
                            <input type="number" name="garments_estimate" min="1" value="5" required class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none font-sans">
                            <span class="text-[11px] text-slate-500 mt-1 block">রাইডার কাপড়ের ধরন দেখে চূড়ান্ত রসিদ দেবে</span>
                        </div>
                    </div>
                </div>

                <!-- Section 3: Schedule -->
                <div class="space-y-4 pt-4 border-t border-slate-200">
                    <h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider flex items-center gap-2">
                        <span class="w-6 h-6 rounded-full bg-blue-600 text-white flex items-center justify-center text-xs font-sans">৩</span>
                        পিকআপের সময় ও তারিখ
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">পিকআপের তারিখ *</label>
                            <input type="date" name="pickup_date" value="{{ date('Y-m-d') }}" required class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm font-sans focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">সুবিধাজনক টাইম স্লট *</label>
                            <select name="pickup_slot" required class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                <option value="সকাল ৯:০০ - দুপুর ১২:০০">সকাল ৯:০০ - দুপুর ১২:০০</option>
                                <option value="দুপুর ২:০০ - বিকাল ৫:০০">দুপুর ২:০০ - বিকাল ৫:০০</option>
                                <option value="সন্ধ্যা ৬:০০ - রাত ৯:০০">সন্ধ্যা ৬:০০ - রাত ৯:০০</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">বিশেষ নির্দেশনা বা দাগের বিবরণ (ঐচ্ছিক)</label>
                        <textarea name="special_notes" rows="3" placeholder="যেমন: পাঞ্জাবির কলারে চায়ের দাগ আছে, সাদা জামদানি সাবধানে হ্যান্ডল করবেন..." class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-4 border-t border-slate-200 space-y-3">
                    <button type="submit" class="w-full py-4 rounded-2xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-base shadow-xl shadow-blue-600/30 transition transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                        <span>🛵 পিকআপ রিকোয়েস্ট নিশ্চিত করুন</span>
                    </button>
                    <p class="text-center text-xs text-slate-500">
                        লন্ডি-শপে বুকিং করার জন্য কোনো অগ্রিম পেমেন্টের প্রয়োজন নেই। ডেলিভারির সময় নগদ বা বিকাশে বিল পরিশোধ করতে পারবেন।
                    </p>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
