<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'full_name', 'phone', 'email', 'looking_for', 'age',
        'location', 'profession', 'service', 'message'
    ];
    
    // Model boot method - ensuring user_id is always set
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($contact) {
            // Agar user_id null hai aur user logged in hai to set karo
            if (!$contact->user_id && auth()->check()) {
                $contact->user_id = auth()->id();
                \Log::info('Model boot: Setting user_id to ' . auth()->id());
            }
        });
    }
      public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}