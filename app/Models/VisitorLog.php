<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorLog extends Model
{
    protected $table = 'visitor_logs';

    public $timestamps = false;


    protected $fillable = [
        'user_id',
        'ip_address',
        'browser',
        'device',
        'device_model',
        'platform',
        'country',
        'city',
        'visited_url',
        'login_status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}