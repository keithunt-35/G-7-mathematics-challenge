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
        Schema::create('_questions', function (Blueprint $table) {            
            $table->timestamps();
            $table->integer('challengeId')->unsigned();
            $table->foreign('challengeId')->references('challengeId')->on('_challenges');
            $table->integer('marks');
            $table->integer('questionId')->primary();
            $table->string('questionText');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_questions');
    }
};
