<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Garment;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Service;
use App\Models\ShopSetting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Users & Demo Accounts
        User::updateOrCreate(
            ['email' => 'admin@londi.com'],
            ['name' => 'Super Admin', 'password' => Hash::make('password')]
        );

        User::updateOrCreate(
            ['email' => 'manager@londi.com'],
            ['name' => 'Dhanmondi Branch Manager', 'password' => Hash::make('password')]
        );

        User::updateOrCreate(
            ['email' => 'cashier@londi.com'],
            ['name' => 'POS Cashier Rahim', 'password' => Hash::make('password')]
        );

        User::updateOrCreate(
            ['email' => 'rider@londi.com'],
            ['name' => 'Delivery Rider Kamal', 'password' => Hash::make('password')]
        );

        User::updateOrCreate(
            ['email' => 'customer@londi.com'],
            ['name' => 'Demo Customer Fahim', 'password' => Hash::make('password')]
        );

        // 2. Shop Settings & Modular Flags
        ShopSetting::updateOrCreate(
            ['key' => 'shop_name'],
            ['value' => 'Londi-Shop (লন্ড্রি শপ)']
        );

        ShopSetting::updateOrCreate(
            ['key' => 'phone'],
            ['value' => '+880 1711-000000 / 09612-LONDI']
        );

        ShopSetting::updateOrCreate(
            ['key' => 'address'],
            ['value' => 'House 42, Road 7/A, Dhanmondi, Dhaka - 1209, Bangladesh']
        );

        ShopSetting::updateOrCreate(
            ['key' => 'enabled_modules'],
            ['json_value' => [
                'module_pos' => true,
                'module_online_booking' => true,
                'module_home_delivery' => true,
                'module_barcode_tags' => true,
                'module_inventory' => true,
                'module_attendance' => true,
                'module_ai_assistant' => true,
                'module_sms_notification' => true,
                'module_accounts_expenses' => true,
                'module_multi_branch' => true,
            ]]
        );

        // 3. Branches
        $dhanmondi = Branch::updateOrCreate(['code' => 'DHD-01'], [
            'name' => 'Dhanmondi Flagship Branch',
            'bn_name' => 'ধানমন্ডি ফ্ল্যাগশিপ শাখা',
            'phone' => '+880 1711-112233',
            'address' => 'House 42, Road 7/A, Dhanmondi, Dhaka',
            'map_url' => 'https://maps.google.com',
            'is_active' => true,
        ]);

        $gulshan = Branch::updateOrCreate(['code' => 'GLS-02'], [
            'name' => 'Gulshan-2 Express Outlet',
            'bn_name' => 'গুলশান-২ এক্সপ্রেস আউটলেট',
            'phone' => '+880 1711-445566',
            'address' => 'Plot 15, Road 45, Gulshan-2, Dhaka',
            'map_url' => 'https://maps.google.com',
            'is_active' => true,
        ]);

        $uttara = Branch::updateOrCreate(['code' => 'UTR-03'], [
            'name' => 'Uttara Hub',
            'bn_name' => 'উত্তরা হাব',
            'phone' => '+880 1711-778899',
            'address' => 'Sector 7, Rabindra Sarani, Uttara, Dhaka',
            'map_url' => 'https://maps.google.com',
            'is_active' => true,
        ]);

        Branch::updateOrCreate(['code' => 'CTG-04'], [
            'name' => 'Chittagong GEC Branch',
            'bn_name' => 'চট্টগ্রাম জিইসি শাখা',
            'phone' => '+880 1811-334455',
            'address' => 'GEC Circle, Nasirabad, Chittagong',
            'map_url' => 'https://maps.google.com',
            'is_active' => true,
        ]);

        // 4. Categories
        $men = Category::updateOrCreate(['name' => "Men's Garments"], [
            'bn_name' => 'পুরুষদের পোশাক',
            'icon' => 'shirt',
            'sort_order' => 1,
        ]);

        $women = Category::updateOrCreate(['name' => "Women's Garments"], [
            'bn_name' => 'নারীদের পোশাক',
            'icon' => 'sparkles',
            'sort_order' => 2,
        ]);

        $traditional = Category::updateOrCreate(['name' => 'Traditional & Festive'], [
            'bn_name' => 'ঐতিহ্যবাহী ও উৎসবের পোশাক',
            'icon' => 'gem',
            'sort_order' => 3,
        ]);

        $bedding = Category::updateOrCreate(['name' => 'Household & Winter Bedding'], [
            'bn_name' => 'গৃহস্থালি ও শীতবস্ত্র',
            'icon' => 'home',
            'sort_order' => 4,
        ]);

        // 5. Services
        Service::updateOrCreate(['name' => 'Wash & Steam Iron'], [
            'bn_name' => 'ধোয়া ও স্টিম ইস্ত্রি',
            'description' => 'প্রিমিয়াম ডিটারজেন্ট দিয়ে গভীর পরিষ্কার ও হাইড্রোলিক স্টিম ইস্ত্রি',
            'base_price_factor' => 1.0,
        ]);

        Service::updateOrCreate(['name' => 'Steam Iron Only'], [
            'bn_name' => 'শুধুমাত্র স্টিম ইস্ত্রি',
            'description' => 'কুঁচকানো দূরীকরণ ও নিখুঁত ফিনিশিং',
            'base_price_factor' => 0.5,
        ]);

        Service::updateOrCreate(['name' => 'Dry Clean & Polish'], [
            'bn_name' => 'ড্রাই ক্লিন ও পলিশ',
            'description' => 'পানিহীন অর্গানিক ড্রাই ওয়াশ ও অ্যান্টি-ব্যাকটেরিয়াল ফিনিশ',
            'base_price_factor' => 2.0,
        ]);

        Service::updateOrCreate(['name' => 'Deep Stain Removal'], [
            'bn_name' => 'বিশেষ দাগ দূরীকরণ',
            'description' => 'চা, তেল, হলুদ, কালি ইত্যাদি জটিল দাগ তোলার বিশেষ ট্রিটমেন্ট',
            'base_price_factor' => 1.5,
        ]);

        Service::updateOrCreate(['name' => 'Rafu & Minor Stitching'], [
            'bn_name' => 'রফু ও সেলাই মেরামত',
            'description' => 'অদৃশ্য রফু ও বাটন সেলাই',
            'base_price_factor' => 1.2,
        ]);

        // 6. Garments
        $garmentsData = [
            // Men's
            ['cat' => $men, 'name' => 'Cotton Shirt', 'bn' => 'সুতি শার্ট', 'wash_iron' => 45, 'steam' => 25, 'dry' => 120],
            ['cat' => $men, 'name' => 'Formal Pant / Chino', 'bn' => 'ফরমাল প্যান্ট / চিনো', 'wash_iron' => 50, 'steam' => 30, 'dry' => 130],
            ['cat' => $men, 'name' => 'Jeans Pant', 'bn' => 'জিন্স প্যান্ট', 'wash_iron' => 60, 'steam' => 35, 'dry' => 140],
            ['cat' => $men, 'name' => 'Panjabi (Cotton / Semi-silk)', 'bn' => 'পাঞ্জাবি (সুতি / সেমি-সিল্ক)', 'wash_iron' => 70, 'steam' => 40, 'dry' => 180],
            ['cat' => $men, 'name' => 'Pajama', 'bn' => 'পায়জামা', 'wash_iron' => 40, 'steam' => 25, 'dry' => 100],
            ['cat' => $men, 'name' => 'Kabli Set', 'bn' => 'কাবলি সেট', 'wash_iron' => 120, 'steam' => 60, 'dry' => 250],
            ['cat' => $men, 'name' => 'Suit / Blazer (2-piece)', 'bn' => 'স্যুট / ব্লেজার (২ পিস)', 'wash_iron' => 0, 'steam' => 150, 'dry' => 450],
            ['cat' => $men, 'name' => 'Mujib Coat / Waistcoat', 'bn' => 'মুজিব কোট / কটি', 'wash_iron' => 0, 'steam' => 80, 'dry' => 220],
            ['cat' => $men, 'name' => 'T-Shirt / Polo', 'bn' => 'টি-শার্ট / পোলো', 'wash_iron' => 35, 'steam' => 20, 'dry' => 90],

            // Women's
            ['cat' => $women, 'name' => 'Salwar Kameez Set (3-piece)', 'bn' => 'সালোয়ার কামিজ সেট (৩ পিস)', 'wash_iron' => 110, 'steam' => 60, 'dry' => 240],
            ['cat' => $women, 'name' => 'Cotton Sharee', 'bn' => 'সুতি শাড়ি', 'wash_iron' => 100, 'steam' => 60, 'dry' => 200],
            ['cat' => $women, 'name' => 'Burqa & Hijab Set', 'bn' => 'বোরকা ও হিজাব সেট', 'wash_iron' => 120, 'steam' => 70, 'dry' => 260],
            ['cat' => $women, 'name' => 'Kurti / Single Kameez', 'bn' => 'কুর্তি / সিঙ্গেল কামিজ', 'wash_iron' => 50, 'steam' => 30, 'dry' => 120],
            ['cat' => $women, 'name' => 'Fancy Gown / Lehenga', 'bn' => 'লেহেঙ্গা / গাউন', 'wash_iron' => 0, 'steam' => 250, 'dry' => 650],

            // Traditional & Luxury
            ['cat' => $traditional, 'name' => 'Jamdani Sharee (Original Dhakai)', 'bn' => 'ঢাকাই জামদানি শাড়ি', 'wash_iron' => 0, 'steam' => 120, 'dry' => 450],
            ['cat' => $traditional, 'name' => 'Katan / Benarasi Sharee', 'bn' => 'কাতান / বেনারসি শাড়ি', 'wash_iron' => 0, 'steam' => 150, 'dry' => 500],
            ['cat' => $traditional, 'name' => 'Silk / Muslin Sharee', 'bn' => 'সিল্ক / মসলিন শাড়ি', 'wash_iron' => 0, 'steam' => 120, 'dry' => 400],
            ['cat' => $traditional, 'name' => 'Sherwani (Groom Wear)', 'bn' => 'শেরওয়ানি (বরের পোশাক)', 'wash_iron' => 0, 'steam' => 200, 'dry' => 700],

            // Bedding & Household
            ['cat' => $bedding, 'name' => 'Heavy Blanket / Kombol (Single)', 'bn' => 'কম্বল (সিঙ্গেল)', 'wash_iron' => 250, 'steam' => 100, 'dry' => 350],
            ['cat' => $bedding, 'name' => 'Heavy Blanket / Kombol (Double)', 'bn' => 'কম্বল (ডাবল)', 'wash_iron' => 350, 'steam' => 150, 'dry' => 480],
            ['cat' => $bedding, 'name' => 'Bedsheet with Pillow Covers', 'bn' => 'বিছানার চাদর ও বালিশের কভার', 'wash_iron' => 120, 'steam' => 60, 'dry' => 220],
            ['cat' => $bedding, 'name' => 'Window Curtain (Per Panel)', 'bn' => 'জানালার পর্দা (প্রতি পিস)', 'wash_iron' => 90, 'steam' => 50, 'dry' => 180],
        ];

        $garmentModels = [];
        foreach ($garmentsData as $item) {
            $g = Garment::updateOrCreate(['name' => $item['name']], [
                'category_id' => $item['cat']->id,
                'bn_name' => $item['bn'],
                'wash_iron_price' => $item['wash_iron'],
                'steam_iron_price' => $item['steam'],
                'dry_clean_price' => $item['dry'],
            ]);
            $garmentModels[$item['name']] = $g;
        }

        // 7. Customers
        $customer1 = Customer::updateOrCreate(['phone' => '01711000000'], [
            'name' => 'Fahim Ahmed',
            'email' => 'customer@londi.com',
            'address' => 'House 12, Road 4, Dhanmondi',
            'area' => 'Dhanmondi, Dhaka',
            'dues_balance' => 0,
        ]);

        $customer2 = Customer::updateOrCreate(['phone' => '01822334455'], [
            'name' => 'Nusrat Jahan',
            'email' => 'nusrat@gmail.com',
            'address' => 'Apt 4B, Gulshan Lake View, Road 55',
            'area' => 'Gulshan-2, Dhaka',
            'dues_balance' => 350,
        ]);

        $customer3 = Customer::updateOrCreate(['phone' => '01933445566'], [
            'name' => 'Engr. Tanvir Hasan',
            'email' => 'tanvir@outlook.com',
            'address' => 'Sector 7, Road 18, Uttara',
            'area' => 'Uttara, Dhaka',
            'dues_balance' => 0,
        ]);

        // 8. Demo Orders for Real Tracking Showcase
        // Order 1: Ready on Rack
        $order1 = Order::updateOrCreate(['order_number' => 'LON-8942'], [
            'customer_id' => $customer1->id,
            'branch_id' => $dhanmondi->id,
            'order_type' => 'in_store',
            'status' => 'ready',
            'payment_status' => 'paid',
            'total_qty' => 3,
            'subtotal' => 690,
            'discount' => 0,
            'express_charge' => 0,
            'delivery_charge' => 0,
            'grand_total' => 690,
            'paid_amount' => 690,
            'due_amount' => 0,
            'payment_method' => 'bkash',
            'rack_location' => 'Rack A-12 (Hanger #08)',
            'pickup_slot' => '24 Oct, 5:00 PM',
            'special_notes' => 'Customer will collect after 5 PM. Keep nicely covered.',
        ]);

        OrderItem::updateOrCreate(['order_id' => $order1->id, 'barcode_tag' => 'TAG-8942-01'], [
            'garment_id' => $garmentModels['Panjabi (Cotton / Semi-silk)']->id,
            'service_name' => 'Dry Clean & Polish',
            'unit_price' => 180,
            'quantity' => 1,
            'subtotal' => 180,
            'status' => 'ready',
        ]);

        OrderItem::updateOrCreate(['order_id' => $order1->id, 'barcode_tag' => 'TAG-8942-02'], [
            'garment_id' => $garmentModels['Jamdani Sharee (Original Dhakai)']->id,
            'service_name' => 'Dry Clean & Polish',
            'unit_price' => 450,
            'quantity' => 1,
            'subtotal' => 450,
            'defects_note' => 'Careful with delicate jari borders',
            'status' => 'ready',
        ]);

        OrderItem::updateOrCreate(['order_id' => $order1->id, 'barcode_tag' => 'TAG-8942-03'], [
            'garment_id' => $garmentModels['Formal Pant / Chino']->id,
            'service_name' => 'Wash & Steam Iron',
            'unit_price' => 50,
            'quantity' => 1,
            'subtotal' => 50,
            'status' => 'ready',
        ]);

        // Order 2: In-Wash
        $order2 = Order::updateOrCreate(['order_number' => 'LON-9015'], [
            'customer_id' => $customer2->id,
            'branch_id' => $gulshan->id,
            'order_type' => 'online_pickup',
            'status' => 'in_wash',
            'payment_status' => 'partial',
            'total_qty' => 2,
            'subtotal' => 830,
            'discount' => 50,
            'express_charge' => 100,
            'delivery_charge' => 60,
            'grand_total' => 940,
            'paid_amount' => 590,
            'due_amount' => 350,
            'payment_method' => 'nagad',
            'rack_location' => 'Washing Station #2',
            'pickup_slot' => '25 Oct, 11:00 AM',
            'special_notes' => 'Home delivery requested via rider.',
        ]);

        OrderItem::updateOrCreate(['order_id' => $order2->id, 'barcode_tag' => 'TAG-9015-01'], [
            'garment_id' => $garmentModels['Heavy Blanket / Kombol (Double)']->id,
            'service_name' => 'Dry Clean & Polish',
            'unit_price' => 480,
            'quantity' => 1,
            'subtotal' => 480,
            'status' => 'in_wash',
        ]);

        OrderItem::updateOrCreate(['order_id' => $order2->id, 'barcode_tag' => 'TAG-9015-02'], [
            'garment_id' => $garmentModels['Suit / Blazer (2-piece)']->id,
            'service_name' => 'Dry Clean & Polish',
            'unit_price' => 450,
            'quantity' => 1,
            'subtotal' => 450,
            'defects_note' => 'Food stain on left lapel',
            'status' => 'in_wash',
        ]);

        // Order 3: Delivered
        Order::updateOrCreate(['order_number' => 'LON-7621'], [
            'customer_id' => $customer3->id,
            'branch_id' => $uttara->id,
            'order_type' => 'in_store',
            'status' => 'delivered',
            'payment_status' => 'paid',
            'total_qty' => 4,
            'subtotal' => 460,
            'discount' => 0,
            'express_charge' => 0,
            'delivery_charge' => 0,
            'grand_total' => 460,
            'paid_amount' => 460,
            'due_amount' => 0,
            'payment_method' => 'cash',
            'rack_location' => 'Delivered to Customer',
            'pickup_slot' => '22 Oct',
            'special_notes' => 'Received with satisfaction.',
        ]);
    }
}
