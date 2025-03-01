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
        Schema::create('p_rais', function (Blueprint $table) {
            $table->id();
            $table->date('date')->useCurrent();
            $table->integer('conformite_rapport')->default(0);
            $table->integer('egalite_facture')->default(0);
            $table->integer('controle_verification')->default(0);
            $table->text('observations');
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
        Schema::dropIfExists('p_rais');
    }
};
