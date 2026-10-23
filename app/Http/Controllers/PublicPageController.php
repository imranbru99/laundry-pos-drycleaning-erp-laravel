<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Garment;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PublicPageController extends Controller
{
    public function home()
    {
        $categories = Category::with('garments')->orderBy('sort_order')->get();
        $services = Service::all();
        $branches = Branch::where('is_active', true)->get();
        $sampleOrders = Order::with('customer')->latest()->take(3)->get();

        return view('public.home', compact('categories', 'services', 'branches', 'sampleOrders'));
    }

    public function services(Request $request)
    {
        $categories = Category::with('garments')->orderBy('sort_order')->get();
        $services = Service::all();

        return view('public.services', compact('categories', 'services'));
    }

    public function track(Request $request)
    {
        $query = trim($request->input('q', ''));
        $order = null;
        $error = null;

        if ($query) {
            // Find by order number (e.g. LON-8942) or customer phone
            $order = Order::with(['customer', 'branch', 'items.garment'])
                ->where('order_number', 'LIKE', "%{$query}%")
                ->orWhereHas('customer', function ($q) use ($query) {
                    $q->where('phone', 'LIKE', "%{$query}%");
                })
                ->latest()
                ->first();

            if (!$order) {
                $error = "দুঃখিত! '{$query}' নম্বর দিয়ে কোনো অর্ডার পাওয়া যায়নি। অনুগ্রহ করে ইনভয়েস নম্বর (যেমন: LON-8942) বা সঠিক মোবাইল নম্বর দিন।";
            }
        } else {
            // Pre-load default demo order for immediate showcase if requested
            $order = Order::with(['customer', 'branch', 'items.garment'])
                ->where('order_number', 'LON-8942')
                ->first();
        }

        return view('public.track', compact('order', 'query', 'error'));
    }

    public function bookPickup()
    {
        $categories = Category::with('garments')->orderBy('sort_order')->get();
        $branches = Branch::where('is_active', true)->get();

        return view('public.book-pickup', compact('categories', 'branches'));
    }

    public function submitBooking(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'area' => 'required|string|max:100',
            'pickup_date' => 'required|string',
            'pickup_slot' => 'required|string',
            'garments_estimate' => 'required|numeric|min:1',
            'service_type' => 'required|string',
            'special_notes' => 'nullable|string|max:500',
        ]);

        // Find or create customer
        $customer = Customer::firstOrCreate(
            ['phone' => $validated['phone']],
            [
                'name' => $validated['name'],
                'address' => $validated['address'],
                'area' => $validated['area'],
            ]
        );

        $defaultBranch = Branch::first();
        $orderNumber = 'LON-' . strtoupper(Str::random(4));

        $order = Order::create([
            'order_number' => $orderNumber,
            'customer_id' => $customer->id,
            'branch_id' => $defaultBranch?->id,
            'order_type' => 'online_pickup',
            'status' => 'received',
            'payment_status' => 'pending',
            'total_qty' => (int) $validated['garments_estimate'],
            'subtotal' => 0,
            'grand_total' => 0,
            'pickup_slot' => $validated['pickup_date'] . ' (' . $validated['pickup_slot'] . ')',
            'special_notes' => $validated['special_notes'] . " [Service: {$validated['service_type']}]",
        ]);

        return redirect()->route('public.track', ['q' => $order->order_number])
            ->with('success', "আপনার পিকআপ রিকোয়েস্ট সফলভাবে গৃহীত হয়েছে! অর্ডার ট্র্যাকিং আইডি: {$order->order_number}");
    }

    public function branches()
    {
        $branches = Branch::where('is_active', true)->get();
        return view('public.branches', compact('branches'));
    }

    public function fabricCare()
    {
        return view('public.fabric-care');
    }

    public function about()
    {
        return view('public.about');
    }

    public function contact()
    {
        return view('public.contact');
    }
}
