<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColumnsFromDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->dropColumn(['experience', 'year', 'month', 'alumni', 'str', 'status', 'lang']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->string('experience')->nullable();
            $table->bigInteger('year')->nullable();
            $table->bigInteger('month')->nullable();
            $table->string('alumni')->nullable();
            $table->string('str')->nullable();
            $table->string('status')->nullable();
            $table->string('lang')->nullable();
        });
    }
}
