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
        Schema::create('questions', function (Blueprint $table) {
             
            $table->integer('challengeId')->unsigned();
            $table->foreign('challengeId')->references('challengeId')->on('_challenges');
            $table->integer('marks',3)->nullable(false);
            $table->integer('questionId')->primary();
            $table->string('questionText',255)->nullable(false);
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
