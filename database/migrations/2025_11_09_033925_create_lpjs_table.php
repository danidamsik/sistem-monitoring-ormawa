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
        Schema::create('lpjs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelaksanaan_id')->unique()->constrained('pelaksanaans')->cascadeOnDelete();
            $table->enum('status_lpj', ['Belum Disetor','Di Setujui'])->default('Belum Disetor');
            $table->date('tanggal_disetor')->nullable();
            $table->text('catatan_spi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lpjs');
    }
};
