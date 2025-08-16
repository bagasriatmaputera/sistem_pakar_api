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
        Schema::create('jawabans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengguna_id')->nullable();
            $table->unsignedBigInteger('gejala_id')->nullable();
            $table->unsignedBigInteger('adiksi_id')->nullable();
            $table->float('cf_user');
            $table->float('cf_kombinasi');
            $table->foreign('pengguna_id')->references('id')->on('penggunas');
            $table->foreign('gejala_id')->references('id')->on('gejalas');
            $table->foreign('adiksi_id')->references('id')->on('lvl_adiksis');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawabans');
    }
};
