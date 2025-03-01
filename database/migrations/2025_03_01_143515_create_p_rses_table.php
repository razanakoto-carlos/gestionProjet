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
        Schema::create('p_rses', function (Blueprint $table) {
            $table->id();
            $table->date('date')->useCurrent();
            $table->integer('benef_com')->default(0); //pour le montant
            $table->integer('ref_activite_pta')->default(0);
            $table->integer('conformite_aux_activite')->default(0);
            $table->integer('montant_prevu')->default(0);//pour le montant
            $table->integer('observations')->default(0);
            $table->unsignedBigInteger('paiement_id')->unique();
            $table->foreign('paiement_id')->references('id')->on('paiements')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_rses');
    }
};
