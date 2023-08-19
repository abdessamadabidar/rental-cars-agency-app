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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_id');
            $table->unsignedBigInteger('client_id');
            $table->dateTime('date_debut');
            $table->dateTime('date_fin');
            $table->string('permis_recto');
            $table->string('permis_verso');
            $table->float('total');
            $table->boolean('isExpired')->default(false);
            $table->timestamps();
            $table->softDeletes('deleted_at');
            $table->foreign('car_id')->references('id')->on('cars')->cascadeOnDelete();
            $table->foreign('client_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
