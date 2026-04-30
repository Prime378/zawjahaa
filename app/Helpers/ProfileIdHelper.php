<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Crypt;

class ProfileIdHelper
{
    /**
     * Encrypt profile ID for URL
     */
    public static function encrypt($id)
    {
        return Crypt::encryptString($id);
    }
    
    /**
     * Decrypt profile ID from URL
     */
    public static function decrypt($encryptedId)
    {
        try {
            return Crypt::decryptString($encryptedId);
        } catch (\Exception $e) {
            return null;
        }
    }
    
    /**
     * Generate formatted profile ID (like ZWJ00001)
     */
    public static function formatId($id)
    {
        return 'ZWJ' . str_pad($id, 5, '0', STR_PAD_LEFT);
    }
}