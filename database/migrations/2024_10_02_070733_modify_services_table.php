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
        Schema::table('services', function (Blueprint $table) {
            $table->string('banner')->nullable()->change();
            $table->string('description')->nullable()->change();
            $table->string('lang')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            // Revert back to the previous state
            $table->string('banner')->change();
            $table->string('description')->change();
            $table->string('lang')->change();
        });
    }
};
