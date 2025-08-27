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
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->string("nama_tamu");
            $table->date("check_in");
            $table->date("check_out");
            $table->string("no_kamar");
            $table->string("email")->unique();
            $table->string("no_tel")->unique();
            $table->string("status_tamu");
            $table->text("alamat");
            $table->string("kebutuhan_khusus")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
