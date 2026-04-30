<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $table = 'agents'; // IMPORTANT

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'gender',
        'cnic',
        'country',
        'city',
        'profile_image',
        'is_online',
        'last_seen',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'is_online' => 'boolean',
        'last_seen' => 'datetime',
    ];
}