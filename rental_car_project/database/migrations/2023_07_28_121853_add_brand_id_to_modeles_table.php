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
        Schema::table('modeles', function (Blueprint $table) {
            $table->unsignedBigInteger('brand_id')->after('name');
            $table->foreign('brand_id')->references('id')->on('marques')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('modeles', function (Blueprint $table) {
            $table->dropColumn('brand_id');
        });
    }
};
