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
        Schema::create('_answers', function (Blueprint $table) {
            $table->integer('answerId')->primary();
            $table->integer('questionId')->unsigned();
            $table->foreign('questionid')->references('questionId')->on('_questions')->onDelete('cascade');
            $table->string('text');
            $table->boolean('is_Correct');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_answers');
    }
};
