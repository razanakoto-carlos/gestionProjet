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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('nom_projet');
            $table->string('fichier')->nullable();
            $table->integer('r_rse')->default(0);
            $table->integer('r_bm')->default(0);
            $table->integer('r_rsenv')->default(0);
            $table->integer('r_raf')->default(0);
            $table->integer('r_rai')->default(0);
            $table->integer('r_cp')->default(0);
            $table->integer('r_dp')->default(0);
            $table->integer('r_paiement')->default(0);
            $table->date('date')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
