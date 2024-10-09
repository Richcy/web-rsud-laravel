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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('field');
            $table->string('office');
            $table->string('experience');
            $table->bigInteger('year');
            $table->bigInteger('month');
            $table->string('alumni');
            $table->string('nip');
            $table->string('str');
            $table->string('sip');
            $table->string('img');
            $table->string('status');
            $table->string('lang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
