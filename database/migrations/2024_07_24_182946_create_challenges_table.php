<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<<< HEAD:database/migrations/2024_07_23_203218_create_challenges_table.php
        Schema::create('challenges', function (Blueprint $table) {            
            $table->unsignedInteger('challengeId')->primary();
            $table->integer('duration');
            $table->string('name');
            $table->date('startDate');
            $table->date('endDate');
            $table->integer('noOfQuestions');            
            $table->timestamps();
========
        Schema::create('_challenges', function (Blueprint $table) {            
            
            $table->integer('challengeId')->primary();
            $table->integer('duration')->nullable(false);
            $table->string('name',25)->nullable(false);
            $table->date('startDate')->nullable(false);
            $table->date('endDate')->nullable(false);
            $table->integer('noOfQuestions')->nullable(false);
>>>>>>>> b3687b9efd2836b87236fad87d0ef4a3df29f7d1:database/migrations/2024_07_24_182946_create_challenges_table.php
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('challenges');
    }
};
