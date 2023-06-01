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
        Schema::create('domains', function (Blueprint $table) {
            $table->id();
            $table->foreignId('server_id')->constrained('servers');
            $table->foreignId('unit_id')->constrained('units');
            $table->foreignId('user_id')->constrained('users');
            $table->string('url');
            $table->text('desc');
            $table->string('jenis_aplikasi');
            $table->string('ip_address');
            $table->string('port');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domains');
    }
};
