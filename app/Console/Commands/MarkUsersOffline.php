<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;

class MarkUsersOffline extends Command
{
    protected $signature = 'users:mark-offline';
    protected $description = 'Mark users as offline if they have no activity for 5 minutes';

    public function handle()
    {
        $threshold = Carbon::now()->subMinutes(5);
        
        User::where('last_activity', '<', $threshold)
            ->orWhereNull('last_activity')
            ->update(['is_online' => false]);
        
        $this->info('Users marked offline successfully.');
    }
}