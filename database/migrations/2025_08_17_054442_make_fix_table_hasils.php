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
        Schema::table('hasils', function (Blueprint $table) {
            $table->dropColumn([
                // 'pengguna',
                // 'cf_craving',
                // 'cf_tolerance',
                // 'cf_withdrawal',
                // 'cf_preoccupation_salience',
                // 'cf_continued_use_despite_harm',
                // 'cf_functional_impairment'
            ]);
            // $table->unsignedBigInteger('adiksi_id');
            // $table->unsignedBigInteger('pengguna_id');
            // $table->float('cf_final');
            // $table->foreign('adiksi_id')->references('id')->on('lvl_adiksis');
            // $table->foreign('pengguna_id')->references('id')->on('penggunas');
            // $table->date('tgl_diagnosa')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('hasils', function (Blueprint $table) {
        //     $table->float('cf_loss_of_control')->after('pengguna_id');
        //     $table->float('cf_craving')->after('cf_loss_of_control');
        //     $table->float('cf_tolerance')->after('cf_craving');
        //     $table->float('cf_withdrawal')->after('cf_tolerance');
        //     $table->float('cf_preoccupation_salience')->after('cf_withdrawal'); // ubah dari /
        //     $table->float('cf_continued_use_despite_harm')->after('cf_preoccupation_salience');
        //     $table->float('cf_functional_impairment')->after('cf_continued_use_despite_harm');
        // });
    }
};
