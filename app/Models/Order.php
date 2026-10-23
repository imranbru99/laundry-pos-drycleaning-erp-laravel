<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'order_number',
        'customer_id',
        'branch_id',
        'order_type',
        'status',
        'payment_status',
        'total_qty',
        'subtotal',
        'discount',
        'express_charge',
        'delivery_charge',
        'grand_total',
        'paid_amount',
        'due_amount',
        'payment_method',
        'rack_location',
        'pickup_slot',
        'special_notes',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'received' => 'অর্ডার গৃহীত (Received)',
            'sorting' => 'বাছাই ও ট্যাগিং (Sorting & Tagged)',
            'in_wash' => 'ধোয়া চলছে (In Wash / Dry Clean)',
            'ironing' => 'ইস্ত্রি ও ফিনিশিং (Ironing & Finishing)',
            'ready' => 'প্রস্তুত (Ready on Rack)',
            'dispatched' => 'ডেলিভারির পথে (Out for Delivery)',
            'delivered' => 'ডেলিভারি সম্পন্ন (Delivered)',
            default => ucfirst($this->status),
        };
    }

    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'received' => 'bg-amber-100 text-amber-800 border-amber-300',
            'sorting' => 'bg-indigo-100 text-indigo-800 border-indigo-300',
            'in_wash' => 'bg-blue-100 text-blue-800 border-blue-300',
            'ironing' => 'bg-purple-100 text-purple-800 border-purple-300',
            'ready' => 'bg-teal-100 text-teal-800 border-teal-300',
            'dispatched' => 'bg-cyan-100 text-cyan-800 border-cyan-300',
            'delivered' => 'bg-emerald-100 text-emerald-800 border-emerald-300',
            default => 'bg-gray-100 text-gray-800 border-gray-300',
        };
    }
}
