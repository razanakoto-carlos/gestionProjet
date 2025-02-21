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
        Schema::create('cps', function (Blueprint $table) {
            $table->id();
            $table->date('date')->useCurrent();
            $table->integer('avis_favorable')->default(0);
            $table->text('observations')->nullable();
            $table->unsignedBigInteger('project_id')->unique();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cps');
    }
};
