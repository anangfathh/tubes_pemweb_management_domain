<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('responses', function (Blueprint $table) {
            //
            $table->foreignId('notification_id')->constrained('notifications');
            $table->foreignId('user_id')->constrained('users');
            $table->text('message');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('responses', function (Blueprint $table) {
            //
            $table->dropColumn('user_id');
            $table->dropColumn('notification_id');
            $table->dropColumn('message');
            $table->dropColumn('status');
        });
    }
};
