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
        Schema::create('p_rpms', function (Blueprint $table) {
            $table->id();
            $table->date('date')->useCurrent();
            $table->integer('pv_Adjudication')->default(0);
            $table->integer('contrat_convention')->default(0);
            $table->integer('bon_de_commande')->default(0);
            //pour les travaux
            $table->integer('conformite_technique_travaux')->default(0);
            $table->integer('pv_de_reception_travaux')->default(0);
            $table->integer('penalite_de_retard_travaux')->default(0);
            //pour les biens
            $table->integer('conformite_technique_biens')->default(0);
            $table->integer('pv_de_reception_biens')->default(0);
            $table->integer('penalite_de_retard_biens')->default(0);
            //pour les services de consultations
            $table->integer('conformite_rapport_facture')->default(0);

            $table->integer('montant_paiement_actuel')->default(0); //input no atao ao
            $table->integer('conformite_dossier_paiement')->default(0);
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
        Schema::dropIfExists('p_rpms');
    }
};
