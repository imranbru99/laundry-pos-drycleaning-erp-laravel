# MASTER AI CODING AGENT PROMPT: LONDI-SHOP ERP & POS PLATFORM
**Comprehensive Specification for Autonomous AI Agent Execution**

---

```markdown
# MISSION BRIEF: BUILD "LONDI-SHOP" — COMPLETE BANGLADESHI LAUNDRY ERP, POS & ONLINE COMMERCE PLATFORM

You are tasked with building a full-stack, end-to-end, production-ready SaaS/Single-store Laundry ERP & POS web application named **"Londi-Shop" (লন্ড্রি শপ)** tailored specifically for Bangladeshi dry cleaners, laundry chains, and neighborhood ironing shops (ধোপা/লন্ড্রি).

The system must support modular toggle switches (every module can be turned ON/OFF in settings based on the shop owner's business model), feature a customer-facing public portal, a rapid POS screen with thermal tag/receipt printing, and come fully loaded with Bangladeshi dummy data and demo accounts.

---

### 1. CORE TECH STACK & PACKAGES

- **Framework**: PHP 8.2+ / PHP 8.5+ & Laravel 13.x (`laravel/framework: ^13.0`)
- **Admin & Backoffice**: Filament (Panels, Resources, Pages, Widgets, Actions, Notifications) compatible with Laravel 13
- **Frontend / Customer Portal**: Laravel Blade + Tailwind CSS + Alpine.js / Livewire
- **Database**: MySQL / PostgreSQL / SQLite compatible migrations
- **Mandatory Packagist Packages to Integrate**:
  1. `imrandevbd/drutogoti` -> Cache acceleration, query optimization, route response caching.
  2. `imrandevbd/laravel-admin-panel` -> Extended admin widgets, UI metrics, dashboard utilities.
  3. `imrandevbd/laravel-ai-catalog` -> AI-assisted catalog scraper and auto-population of standard laundry services.
  4. `imrandevbd/laravel-ai-hub` -> AI fabric care advisor, stain recognition advice, and auto-reply generator.
  5. `imrandevbd/laravel-attendance-hub` -> Biometric / ZKTeco machine and manual attendance integration for laundry workers.
  6. `imrandevbd/laravel-unicode-pdf` -> Flawless Bangla Unicode (Nikosh/SolaimanLipi) PDF generation for thermal tokens, receipts, and invoices.
  7. `imrandevbd/laravel-universal-slug` -> Multi-lingual and Bangla slug generator for services, packages, and shop URLs.

---

### 2. BANGLADESHI LOCALIZATION & DOMAIN SPECIFICATIONS

1. **Garment Types**:
   - Panjabi (পাঞ্জাবি), Pajama (পায়জামা), Kabli (কাবলি), Kurti (কুর্তি)
   - Sharee (শাড়ি - Cotton, Silk, Jamdani, Katan, Georgette, Muslin)
   - Salwar Kameez (সালোয়ার কামিজ), Dupatta/Orna (ওড়না), Burqa & Hijab (বোরকা ও হিজাব)
   - Western: Shirt (Formal/Casual), Pant (Jeans/Chino/Formal), Suit / Blazer / Coat (কোট/ব্লেজার), Waistcoat (মুজিব কোট)
   - Household & Bedding: Blanket / Kombol (লেপ/কম্বল), Bedsheet (চাদর), Curtain (পর্দা), Sofa Cover, Towel
2. **Service Types & Pricing Modifiers**:
   - Wash & Iron (ধোয়া ও ইস্ত্রি)
   - Steam Iron Only (শুধুমাত্র স্টিম ইস্ত্রি)
   - Dry Cleaning (ড্রাই ওয়াশ / কেমিক্যাল ওয়াশ)
   - Deep Stain Removal (বিশেষ দাগ দূরীকরণ - তেল, কালি, চা/কফি, মরিচা, হলুদ দাগ)
   - Rafu / Darning & Tailoring repair (রফু / সেলাই মেরামত)
   - Fabric Dyeing / Polish (রং ও পলিশ)
3. **Delivery Speeds**:
   - Regular (সাধারণ - ৩-৪ দিন)
   - Express (জরুরি - ২৪ ঘণ্টা, +30% বা ফিক্সড ফি)
   - Super Express / Same Day (অতি জরুরি - ৬-১২ ঘণ্টা, +50% বা ফিক্সড ফি)
4. **Currencies & Payment Methods**:
   - Bangladeshi Taka (৳ BDT)
   - Payment Gateways / Manual Methods: Cash (ক্যাশ), bKash (বিকাশ), Nagad (নগদ), Rocket (রকেট), Card, Customer Wallet / Credit / Due (বাকি).
5. **Garment Tagging & Loss Prevention**:
   - Alphanumeric Barcode / QR Code tags for each individual garment (e.g., `ORD-20261023-01-G03` = Order 1, Garment 3).
   - Shelf / Rack / Slot locator system (যেমন: Rack A-3, Hanger 12).

---

### 3. MODULAR ARCHITECTURE (ON / OFF SWITCHES)

Under `Shop Settings` -> `Module Manager`, store owners can toggle any module. If disabled, navigation menus, POS buttons, and API routes for that feature are safely hidden:

1. `module_pos` (In-Store Fast POS & Cash Register)
2. `module_online_booking` (Customer Self-Service Web Booking & Pickup Request)
3. `module_home_delivery` (Rider management, Pickup & Delivery zone dispatch)
4. `module_barcode_tags` (Individual cloth tag generation & rack storage management)
5. `module_inventory` (Laundry raw materials: detergent, starch/মাড়, hangers, polybags)
6. `module_attendance` (Worker biometric/manual attendance via `imrandevbd/laravel-attendance-hub`)
7. `module_ai_assistant` (AI stain removal guide & customer assistant via `imrandevbd/laravel-ai-hub`)
8. `module_sms_notification` (SMS alerts on order received, ready, and delivered)
9. `module_accounts_expenses` (Daily income, shop expenses, rent, utilities, worker piece-rate pay)
10. `module_multi_branch` (Centralized stock and multi-shop branches support)

---

### 4. MODULE-BY-MODULE SPECIFICATIONS

#### Module A: Public Marketing Landing Page & Web Portal
- **Header**: Logo, Navigation (Home, Services & Pricing, How It Works, Track Order, Branch Locator, Franchise/Contact, Book Pickup button, Login/Register).
- **Hero Section**: Catchy Bangla & English headline ("আপনার প্রিয় পোশাকের সঠিক যত্ন - লন্ড্রি ও ড্রাই ক্লিন এখন আপনার হাতের মুঠোয়"), Call to Action: "Schedule Home Pickup" and "Quick Price Calculator".
- **Interactive Price Calculator**: Select garment + select service (e.g. Silk Sharee + Dry Clean) -> instant price estimate.
- **Live Order Tracker**: Customer enters Mobile Number or Invoice Token (e.g. `LON-8942`) -> displays animated stepper (Order Placed -> Picked Up -> Washing & Treating -> Ironing & Packing -> Ready for Delivery / Delivered).
- **Service Catalog**: Categorized list of all garments and services with prices.
- **Customer Portal**:
  - Customer registration & login (via mobile OTP or password).
  - My Orders history, pending deliveries, invoices (Bangla PDF download).
  - Request Pickup (Address, preferred date/time slot, special instructions).

#### Module B: POS (Point of Sale) & Counter Terminal
- Designed for touchscreens and barcode scanners.
- Rapid order creation in under 30 seconds:
  1. Quick search or select existing Customer (or 1-click "Walk-in Customer" with phone #).
  2. Visual garment tiles with category filters (Men, Women, Kids, Bedding, Special).
  3. Service selector popup (Wash, Iron, Dry Clean, Express mode).
  4. Garment condition notes & defects recorder (e.g. "বোতাম ভাঙা", "কলারে দাগ", "ছেঁড়া রফু লাগবে").
  5. Payment handling: Full paid, Advance partial payment, or Dues (বাকি).
  6. Instant print action:
     - 80mm/58mm Thermal Receipt for Customer (with QR code to track online).
     - Miniature Garment Tags (Waterproof Tag slips) for stapling to clothes.

#### Module C: Order Life-Cycle & Workflow Management
- Kanban Board or Filterable List of Orders:
  1. `Received / Counter` (অর্ডার গ্রহণ)
  2. `Sorting & Tagged` (বাছাই ও ট্যাগযুক্ত)
  3. `Processing / In-Wash / Dry Clean` (ধোয়া চলছে)
  4. `Ironing / Finishing` (ইস্ত্রি ও ফিনিশিং)
  5. `Quality Check & Ready` (র‍্যাকে সংরক্ষিত / সরবরাহের জন্য প্রস্তুত)
  6. `Dispatched / On the Way` (ডেলিভারির পথে)
  7. `Completed / Delivered` (সরবরাহ সম্পন্ন)
  8. `Returned / Rework` (পুনরায় কাজ)
- Garment Tracker: Ability to scan individual garment barcode to see status and location rack.

#### Module D: Rider & Home Delivery Management
- Pickup & Delivery orders pool.
- Assign delivery boy / rider to order.
- Rider mobile-friendly view to update status (Picked Up -> Reached Shop -> Out for Delivery -> Delivered & Cash Collected).

#### Module E: Inventory & Raw Materials
- Tracking shop supplies: Liquid Detergent, Bleach, Fabric Softener, Starch (মাড়), Plastic Hanger, Poly Packing Rolls.
- Low-stock alerts and usage log per washing batch.

#### Module F: Employee Attendance & Piece-rate Payroll
- Integrated with `imrandevbd/laravel-attendance-hub`.
- Daily check-in / check-out log.
- Commission / Piece-rate counter (e.g. Iron Master earns ৳ 3.50 per shirt ironed).

#### Module G: Accounting, Dues & Financial Reports
- Daily Cash Drawer: Opening Cash, Cash In, Online Payments (bKash/Nagad), Cash Out / Expenses, Net Drawer Balance.
- Dues Ledger: Customer-wise unpaid balance, SMS reminder dispatch.
- Expense tracking: Rent, electricity/gas bill, detergent purchase, machine maintenance.
- Profit & Loss statement with date range filter.

#### Module H: Unicode Bangla PDF & Reporting
- Integrated with `imrandevbd/laravel-unicode-pdf`.
- Support for SolaimanLipi / Nikosh fonts.
- Invoice generation in Bangla (বিল / রসিদ), Garment tags, Daily closure report, Monthly ledger.

#### Module I: AI Integrations
- Integrated with `imrandevbd/laravel-ai-hub` and `imrandevbd/laravel-ai-catalog`.
- AI Smart Fabric Advisor: Select fabric (e.g. Jamdani silk with turmeric curry stain) -> AI returns optimal cleaning instructions, chemical recommendations, and customer disclaimer warning.
- AI Catalog Auto-Populater: 1-click import standard Bangladeshi laundry item price lists.

---

### 5. DATABASE SCHEMA BLUEPRINT

The agent must create migrations for:
- `users` (id, name, email, phone, role: super_admin, branch_manager, cashier, washer, rider, customer)
- `shop_settings` (id, shop_name, bn_shop_name, logo, phone, address, vat_tax_pct, currency_symbol, enabled_modules JSON, thermal_printer_width)
- `branches` (id, name, code, phone, address, is_active)
- `categories` (id, name, bn_name, icon, sort_order)
- `garments` (id, category_id, name, bn_name, default_price, image, slug)
- `services` (id, name, bn_name, description, slug)
- `garment_service_prices` (id, garment_id, service_id, price, express_price)
- `customers` (id, user_id nullable, name, phone, email, address, area, notes, loyalty_points, dues_balance)
- `orders` (id, order_number, customer_id, branch_id, order_type [in_store, online_pickup], status, payment_status, total_qty, subtotal, discount, express_charge, delivery_charge, grand_total, paid_amount, due_amount, payment_method, pickup_time, delivery_time, rack_location, special_notes)
- `order_items` (id, order_id, garment_id, service_id, unit_price, quantity, subtotal, barcode_tag, defects_note, status, rack_slot)
- `order_status_logs` (id, order_id, status_from, status_to, changed_by, notes, created_at)
- `payments` (id, order_id, customer_id, amount, payment_method, trx_id, collected_by, date)
- `riders` (id, user_id, vehicle_type, license_number, is_available)
- `deliveries` (id, order_id, rider_id, type [pickup, delivery], status, assigned_at, completed_at, cash_collected)
- `inventory_items` (id, name, bn_name, unit, current_stock, min_alert_stock, unit_cost)
- `inventory_transactions` (id, inventory_item_id, type [in, out, waste], quantity, remarks, date)
- `expenses` (id, branch_id, expense_category_id, amount, reason, date, paid_by)
- `expense_categories` (id, name, bn_name)

---

### 6. SEEDERS & DEMO DATA REQUIREMENTS

The agent must provide `DemoDatabaseSeeder` with complete realistic Bangladeshi data:
- **Demo Users**:
  - Super Admin: `admin@londi.com` / `password`
  - Manager: `manager@londi.com` / `password`
  - POS Cashier: `cashier@londi.com` / `password`
  - Delivery Rider: `rider@londi.com` / `password`
  - Customer: `customer@londi.com` / `password` (Phone: `01711000000`)
- **Pre-seeded Garments & Services**: 25+ real Bangladeshi garments with Bangla names and price mapping.
- **Pre-seeded Orders**: 15+ orders in various states (Pending pickup, In-wash, Ironing, Ready on Rack A-1, Delivered, Dues unpaid).
- **Public Website Demo**: Ready-to-browse landing page with interactive booking form.

---

### 7. EXECUTION STEPS FOR THE AGENT

1. Scaffold Laravel 13 project (`composer create-project laravel/laravel:^13.0 .` or latest Laravel 13) in current directory if not already initialized.
2. Install Filament and required Packagist packages (`imrandevbd/drutogoti`, `imrandevbd/laravel-admin-panel`, `imrandevbd/laravel-ai-catalog`, `imrandevbd/laravel-ai-hub`, `imrandevbd/laravel-attendance-hub`, `imrandevbd/laravel-unicode-pdf`, `imrandevbd/laravel-universal-slug`).
3. Create all migrations, models with relationships, and factories.
4. Implement Filament Resources (Orders, Garments, Services, Customers, Inventory, Expenses, Users, Module Settings).
5. Build the specialized Filament POS Custom Page with responsive touch grid and barcode receipt generator.
6. Build the public Landing Page & Customer Portal in Blade / Tailwind.
7. Implement Unicode Bangla PDF invoice and garment tag printing routes.
8. Seed complete realistic demo data.
9. Verify all routes, ensure no missing assets or broken links, and update README.md with full documentation and demo logins.
```
