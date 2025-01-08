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
        Schema::table('doctor_schedules', function (Blueprint $table) {
            $table->string('senin')->nullable()->change();
            $table->string('selasa')->nullable()->change();
            $table->string('rabu')->nullable()->change();
            $table->string('kamis')->nullable()->change();
            $table->string('jumat')->nullable()->change();
            $table->string('sabtu')->nullable()->change();
            $table->string('minggu')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('doctor_schedules', function (Blueprint $table) {
            $table->string('senin')->nullable(false)->change();
            $table->string('selasa')->nullable(false)->change();
            $table->string('rabu')->nullable(false)->change();
            $table->string('kamis')->nullable(false)->change();
            $table->string('jumat')->nullable(false)->change();
            $table->string('sabtu')->nullable(false)->change();
            $table->string('minggu')->nullable(false)->change();
        });
    }
};
