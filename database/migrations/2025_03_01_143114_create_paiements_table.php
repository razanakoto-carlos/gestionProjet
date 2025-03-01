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
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->integer('p_rpm')->default(0);
            $table->integer('p_rse')->default(0);
            $table->integer('p_cpt')->default(0);
            $table->integer('p_raf')->default(0);
            $table->integer('p_rai')->default(0);
            $table->integer('p_cp')->default(0);
            $table->integer('p_ca')->default(0);
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiements');
    }
};
