@extends('layouts.public')

@section('title', 'যোগাযোগ ও কর্পোরেট লন্ড্রি সেবা - Londi-Shop BD')

@section('content')
<!-- Header -->
<div class="bg-gradient-to-b from-blue-900 to-slate-900 text-white py-16">
    <div class="max-w-4xl mx-auto px-4 text-center space-y-3">
        <span class="text-xs font-bold text-cyan-400 uppercase tracking-widest font-sans">Contact & Enterprise</span>
        <h1 class="text-3xl sm:text-5xl font-black font-bangla">যোগাযোগ ও কর্পোরেট পার্টনারশিপ</h1>
        <p class="text-slate-300 text-sm sm:text-base font-bangla max-w-xl mx-auto">
            হোটেল, হাসপাতাল, রেস্তোরাঁ ও গার্মেন্টস ফ্যাক্টরির বাল্ক লন্ড্রি এবং ফ্র্যাঞ্চাইজ সম্পর্কিত তথ্যের জন্য আমাদের সাথে যোগাযোগ করুন।
        </p>
    </div>
</div>

<div class="py-14 bg-slate-50 min-h-screen font-bangla">
    <div class="max-w-5xl mx-auto px-4 sm:px-6">

        <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
            <!-- Contact Info -->
            <div class="md:col-span-5 space-y-6">
                <div class="bg-white p-7 rounded-3xl border border-slate-200 shadow-sm space-y-6">
                    <h3 class="text-lg font-bold text-slate-900">সরাসরি যোগাযোগের ঠিকানা</h3>

                    <div class="space-y-4 text-sm text-slate-600">
                        <div class="flex items-start gap-3">
                            <span class="text-xl">📍</span>
                            <div>
                                <h4 class="font-bold text-slate-800">প্রধান কার্যালয়:</h4>
                                <p class="text-xs text-slate-500">হাউজ ৪২, রোড ৭/এ, ধানমন্ডি, ঢাকা - ১২০৯</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <span class="text-xl">📞</span>
                            <div>
                                <h4 class="font-bold text-slate-800">হটলাইন ও হোয়াটসঅ্যাপ:</h4>
                                <p class="text-xs font-sans text-slate-500 font-bold">+880 1711-000000</p>
                                <p class="text-xs font-sans text-slate-500">09612-LONDI (56634)</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <span class="text-xl">✉️</span>
                            <div>
                                <h4 class="font-bold text-slate-800">ইমেইল:</h4>
                                <p class="text-xs font-sans text-slate-500">support@londi.com</p>
                                <p class="text-xs font-sans text-slate-500">b2b@londi.com</p>
                            </div>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-slate-100">
                        <h4 class="text-xs font-bold text-slate-700 uppercase mb-2">কর্পোরেট সেবাসমূহ:</h4>
                        <ul class="text-xs text-slate-600 space-y-1">
                            <li>• হোটেলের বেডশিট, তোয়ালে ও কার্পেট লন্ড্রি</li>
                            <li>• হাসপাতালের রোগীর গাউন ও লিনেন জীবাণুমুক্ত ওয়াশ</li>
                            <li>• অফিস কর্মীদের ইউনিফর্ম বাল্ক ড্রাই ওয়াশ</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="md:col-span-7">
                <div class="bg-white p-7 sm:p-9 rounded-3xl border border-slate-200 shadow-sm">
                    <h3 class="text-xl font-bold text-slate-900 mb-2">বার্তা বা অনুসন্ধান পাঠান</h3>
                    <p class="text-xs text-slate-500 mb-6">নিচের ফর্মটি পূরণ করুন, আমাদের প্রতিনিধি ২৪ ঘণ্টার মধ্যে যোগাযোগ করবে।</p>

                    <form onsubmit="event.preventDefault(); alert('ধন্যবাদ! আপনার বার্তাটি সফলভাবে পাঠানো হয়েছে। আমাদের টিম দ্রুত আপনার সাথে যোগাযোগ করবে।');" class="space-y-4 text-sm">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">আপনার নাম *</label>
                                <input type="text" required placeholder="যেমন: সাজিদ করিম" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">ফোন নম্বর *</label>
                                <input type="tel" required placeholder="017xxxxxxxx" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none font-sans">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">প্রতিষ্ঠানের নাম বা ধরন (ঐচ্ছিক)</label>
                            <input type="text" placeholder="যেমন: হোটেল, হাসপাতাল, ব্যক্তিগত বা লন্ড্রি শপ ওনার..." class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">বার্তা বা জিজ্ঞাস্য *</label>
                            <textarea rows="4" required placeholder="আপনার বাল্ক লন্ড্রি বা ফ্র্যাঞ্চাইজ সংক্রান্ত বিস্তারিত তথ্য লিখুন..." class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
                        </div>

                        <button type="submit" class="w-full py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm shadow-md transition">
                            📨 বার্তা পাঠান
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
