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
        Schema::create('answers', function (Blueprint $table) {
            $table->integer('answerId')->primary();
<<<<<<<< HEAD:database/migrations/2024_07_23_203716_create_answers_table.php
            $table->unsignedInteger('questionId');
            $table->foreign('questionId')->references('questionId')->on('questions');
            $table->string('text');
            $table->boolean('isCorrect');
            $table->timestamps();            
========
            $table->integer('questionId')->unsigned();
            $table->foreign('questionid')->references('questionId')->on('_questions')->onDelete('cascade');
            $table->string('text');
            $table->boolean('is_Correct');
          
>>>>>>>> b3687b9efd2836b87236fad87d0ef4a3df29f7d1:database/migrations/2024_07_24_183048_create_answers_table.php
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
};
