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
<<<<<<<< HEAD:database/migrations/2024_07_23_203442_create_questions_table.php
        Schema::create('questions', function (Blueprint $table) {            
            $table->unsignedInteger('challengeId');
            $table->foreign('challengeId')->references('challengeId')->on('challenges');
            $table->integer('marks');
            $table->unsignedInteger('questionId')->primary();
            $table->string('questionText');            
            $table->timestamps();
========
        Schema::create('questions', function (Blueprint $table) {
             
            $table->integer('challengeId')->unsigned();
            $table->foreign('challengeId')->references('challengeId')->on('_challenges');
            $table->integer('marks',3)->nullable(false);
            $table->integer('questionId')->primary();
            $table->string('questionText',255)->nullable(false);
>>>>>>>> b3687b9efd2836b87236fad87d0ef4a3df29f7d1:database/migrations/2024_07_24_182815_create_questions_table.php
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
};
