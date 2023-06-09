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
        Schema::create('servers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('unit_id')->constrained('units');
            $table->string('ip_address');
            $table->string('processor');
            $table->integer('jumlah_core');
            $table->integer('ram');
            $table->enum('jenis', ['virtual', 'fisik'])->nullable();
            $table->enum('status', ['aktif', 'non-aktif', 'suspend'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servers');
    }
};
