<?php
// database/migrations/xxxx_xx_xx_add_premium_columns_to_users_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPremiumColumnsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('premium_status')->default('none')->after('email');
            $table->string('premium_package')->nullable()->after('premium_status');
            $table->timestamp('premium_expires_at')->nullable()->after('premium_package');
            $table->string('transaction_id')->nullable()->after('premium_expires_at');
            $table->string('payment_method')->nullable()->after('transaction_id');
            $table->timestamp('payment_date')->nullable()->after('payment_method');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['premium_status', 'premium_package', 'premium_expires_at', 'transaction_id', 'payment_method', 'payment_date']);
        });
    }
}