<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PremiumCart extends Model
{
    use HasFactory;

    protected $table = 'premium_cart';

    protected $fillable = [
        'buyer_id',         // Jo pay kar raha hai
        'buy_id',           // Jiski profile buy ho rahi
        'package',
        'amount',
        'payment_method',
        'payment_number',
        'status',
        'admin_approved'
    ];

    protected $casts = [
        'admin_approved' => 'boolean',
        'amount' => 'decimal:2'
    ];

    // Relations
    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function profile()
    {
        return $this->belongsTo(User::class, 'buy_id');
    }
}