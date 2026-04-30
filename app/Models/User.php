<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
   protected $fillable = [
        'name',
        'gender',
        'height',
        'dob',
        'religion',
        'caste',
        'on_behalf',
        'ownership',
        'mother_tongue',
        'marital_status',
        'education',
        'profession',
        'email',
        'country_code',
        'phone',
        'cnic',
        'country',
        'city',
        'password',
        'profile_image',
         'is_online',       
         'income',
    'last_seen',
    'religious_sect',
    'disease_status',
    'disease_detail',
    'children_details',
    'living_country' ,
    'father_occupation',
    'mother_occupation',
    'role',
    'siblings',
    'family_type',
    'family_status',
    'about_me'
    ];
    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

   public function premiumCart()
{
    return $this->hasMany(\App\Models\PremiumCart::class, 'buyer_id');
}

public function hasAdminApprovedPayment()
{
    return $this->premiumCart()
        ->where('admin_approved', 1)
        ->exists();
}


public function sentMessages()
{
    return $this->hasMany(Message::class, 'sender_id');
}

public function receivedMessages()
{
    return $this->hasMany(Message::class, 'receiver_id');
}
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',  // ✅ ADD
             'last_seen' => 'datetime',
    'is_online' => 'boolean'   // ✅ ADD
    ];
    protected $dates = [
    'dob', 'premium_expires_at', 'last_seen', 'created_at', 'updated_at'
];
}
